#!/bin/bash
set -e

# Configurar puerto dinámico de Railway
# Si PORT no está definido o no es numérico, usamos 80 por defecto
PORT_TO_USE=${PORT:-80}
if ! [[ "$PORT_TO_USE" =~ ^[0-9]+$ ]]; then
  PORT_TO_USE=80
fi

# Cambiar SOLO las directivas esperadas para evitar romper otros números
sed -i -E "s/^Listen 80$/Listen ${PORT_TO_USE}/" /etc/apache2/ports.conf
sed -i -E "s/<VirtualHost \\*:80>/<VirtualHost *:${PORT_TO_USE}>/" /etc/apache2/sites-available/*.conf

# Nota: NO generamos .env aquí para no sobrescribir variables válidas con vacíos.

# Deshabilitar TODOS los MPM para evitar conflictos
a2dismod mpm_event 2>/dev/null || true
a2dismod mpm_worker 2>/dev/null || true
a2dismod mpm_prefork 2>/dev/null || true

# Habilitar SOLO mpm_prefork (necesario para PHP)
a2enmod mpm_prefork

# Iniciar Apache en primer plano
exec apache2-foreground
