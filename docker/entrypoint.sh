#!/bin/bash
set -e

# Configurar puerto dinámico de Railway
PORT_TO_USE=${PORT:-80}

# Solo cambiar los que están en formato estándar Apache
sed -i "s/^Listen 80$/Listen ${PORT_TO_USE}/" /etc/apache2/ports.conf 2>/dev/null || true
sed -i "s/<VirtualHost \*:80>/<VirtualHost *:${PORT_TO_USE}>/" /etc/apache2/sites-available/*.conf 2>/dev/null || true

# Deshabilitar TODOS los MPM para evitar conflictos
a2dismod mpm_event 2>/dev/null || true
a2dismod mpm_worker 2>/dev/null || true
a2dismod mpm_prefork 2>/dev/null || true

# Habilitar SOLO mpm_prefork (necesario para PHP)
a2enmod mpm_prefork

# SOLUCIÓN DEFINITIVA: Escribir variables en un archivo PHP que se cargará SIEMPRE
cat > /var/www/html/env_railway.php << 'PHPEOF'
<?php
// Variables de entorno inyectadas por Railway en tiempo de arranque
// Este archivo es generado automáticamente por entrypoint.sh
PHPEOF

# Añadir variables de entorno al archivo PHP
echo "\$_ENV['DB_HOST'] = '${DB_HOST:-localhost}';" >> /var/www/html/env_railway.php
echo "\$_ENV['DB_PORT'] = '${DB_PORT:-3306}';" >> /var/www/html/env_railway.php
echo "\$_ENV['DB_NAME'] = '${DB_NAME:-zoo_arcadia}';" >> /var/www/html/env_railway.php
echo "\$_ENV['DB_USER'] = '${DB_USER:-root}';" >> /var/www/html/env_railway.php
echo "\$_ENV['DB_PASS'] = '${DB_PASS:-root}';" >> /var/www/html/env_railway.php

# Iniciar Apache en primer plano
exec apache2-foreground
