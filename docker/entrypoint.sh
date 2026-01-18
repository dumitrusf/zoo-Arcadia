#!/bin/bash
set -e

# Configurar puerto dinámico de Railway
# Si PORT no está definido, usamos 80 por defecto para evitar error de sintaxis en Apache
PORT_TO_USE=${PORT:-80}

sed -i "s/80/${PORT_TO_USE}/g" /etc/apache2/ports.conf /etc/apache2/sites-available/*.conf

# TRUCO MAESTRO: Volcar variables de entorno a un archivo .env para que PHP las vea sí o sí
# Esto soluciona el problema de que Apache/PHP no hereden las variables de Railway
printenv > /var/www/html/.env

# Deshabilitar TODOS los MPM para evitar conflictos
a2dismod mpm_event 2>/dev/null || true
a2dismod mpm_worker 2>/dev/null || true
a2dismod mpm_prefork 2>/dev/null || true

# Habilitar SOLO mpm_prefork (necesario para PHP)
a2enmod mpm_prefork

# Iniciar Apache en primer plano
exec apache2-foreground
