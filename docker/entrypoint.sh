#!/bin/bash
set -e

# Configurar puerto dinámico de Railway si existe la variable PORT
if [ -n "$PORT" ]; then
    sed -i "s/80/$PORT/g" /etc/apache2/ports.conf /etc/apache2/sites-available/*.conf
fi

# Deshabilitar TODOS los MPM para evitar conflictos
a2dismod mpm_event 2>/dev/null || true
a2dismod mpm_worker 2>/dev/null || true
a2dismod mpm_prefork 2>/dev/null || true

# Habilitar SOLO mpm_prefork (necesario para PHP)
a2enmod mpm_prefork

# Iniciar Apache en primer plano
exec apache2-foreground
