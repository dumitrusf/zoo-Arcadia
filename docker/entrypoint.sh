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

# SOLUCIÓN DEFINITIVA: Parsear MYSQL_URL (que Railway SIEMPRE inyecta)
# Formato: mysql://usuario:password@host:puerto/database
if [ -n "$MYSQL_URL" ]; then
    # Extraer partes de la URL
    DB_USER_PARSED=$(echo $MYSQL_URL | sed -n 's#.*://\([^:]*\):.*#\1#p')
    DB_PASS_PARSED=$(echo $MYSQL_URL | sed -n 's#.*://[^:]*:\([^@]*\)@.*#\1#p')
    DB_HOST_PARSED=$(echo $MYSQL_URL | sed -n 's#.*@\([^:]*\):.*#\1#p')
    DB_PORT_PARSED=$(echo $MYSQL_URL | sed -n 's#.*:\([0-9]*\)/.*#\1#p')
    DB_NAME_PARSED=$(echo $MYSQL_URL | sed -n 's#.*/\([^?]*\).*#\1#p')
    
    # Crear archivo PHP con variables
    cat > /var/www/html/env_railway.php <<PHPEOF
<?php
\$_ENV['DB_HOST'] = '${DB_HOST_PARSED}';
\$_ENV['DB_PORT'] = '${DB_PORT_PARSED}';
\$_ENV['DB_NAME'] = '${DB_NAME_PARSED}';
\$_ENV['DB_USER'] = '${DB_USER_PARSED}';
\$_ENV['DB_PASS'] = '${DB_PASS_PARSED}';
PHPEOF
else
    # Fallback: usar variables individuales o defaults
    cat > /var/www/html/env_railway.php <<PHPEOF
<?php
\$_ENV['DB_HOST'] = '${DB_HOST:-mysql.railway.internal}';
\$_ENV['DB_PORT'] = '${DB_PORT:-3306}';
\$_ENV['DB_NAME'] = '${DB_NAME:-railway}';
\$_ENV['DB_USER'] = '${DB_USER:-root}';
\$_ENV['DB_PASS'] = '${DB_PASS:-}';
PHPEOF
fi

# Iniciar Apache en primer plano
exec apache2-foreground
