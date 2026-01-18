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

# Crear archivo PHP con variables (ahora que sabemos que SÍ llegan al contenedor)
cat > /var/www/html/env_railway.php <<'PHPEOF'
<?php
// Variables de entorno de Railway
PHPEOF

# Usar printf para evitar problemas con caracteres especiales en las contraseñas
printf "\$_ENV['DB_HOST'] = '%s';\n" "${DB_HOST:-mysql.railway.internal}" >> /var/www/html/env_railway.php
printf "\$_ENV['DB_PORT'] = '%s';\n" "${DB_PORT:-3306}" >> /var/www/html/env_railway.php
printf "\$_ENV['DB_NAME'] = '%s';\n" "${DB_NAME:-railway}" >> /var/www/html/env_railway.php
printf "\$_ENV['DB_USER'] = '%s';\n" "${DB_USER:-root}" >> /var/www/html/env_railway.php
printf "\$_ENV['DB_PASS'] = '%s';\n" "${DB_PASS}" >> /var/www/html/env_railway.php

# Iniciar Apache en primer plano
exec apache2-foreground
