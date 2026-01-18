#!/bin/bash
set -e

# Configurar puerto dinámico de Railway
# Si PORT no está definido, usamos 80 por defecto para evitar error de sintaxis en Apache
PORT_TO_USE=${PORT:-80}

sed -i "s/80/${PORT_TO_USE}/g" /etc/apache2/ports.conf /etc/apache2/sites-available/*.conf

# TRUCO MAESTRO (SAFE): Escribir solo variables necesarias en formato .env válido
# Evitamos valores con espacios/invalidos que rompen phpdotenv
ENV_FILE="/var/www/html/.env"
{
  echo "MYSQLHOST=${MYSQLHOST:-}"
  echo "MYSQLPORT=${MYSQLPORT:-}"
  echo "MYSQLDATABASE=${MYSQLDATABASE:-}"
  echo "MYSQLUSER=${MYSQLUSER:-}"
  echo "MYSQLPASSWORD=${MYSQLPASSWORD:-}"
  echo "DB_HOST=${DB_HOST:-}"
  echo "DB_PORT=${DB_PORT:-}"
  echo "DB_NAME=${DB_NAME:-}"
  echo "DB_USER=${DB_USER:-}"
  echo "DB_PASS=${DB_PASS:-}"
  echo "APP_ENV=${APP_ENV:-production}"
  echo "PROJECT_URL=${PROJECT_URL:-}"
  echo "SMTP_HOST=${SMTP_HOST:-}"
  echo "SMTP_PORT=${SMTP_PORT:-}"
  echo "SMTP_USER=${SMTP_USER:-}"
  echo "SMTP_PASS=${SMTP_PASS:-}"
  echo "SMTP_SECURE=${SMTP_SECURE:-tls}"
  echo "SMTP_FROM_EMAIL=${SMTP_FROM_EMAIL:-}"
  echo "SMTP_FROM_NAME=${SMTP_FROM_NAME:-}"
  echo "ZOO_EMAIL=${ZOO_EMAIL:-}"
  echo "CLOUDINARY_URL=${CLOUDINARY_URL:-}"
} > "$ENV_FILE"

# Deshabilitar TODOS los MPM para evitar conflictos
a2dismod mpm_event 2>/dev/null || true
a2dismod mpm_worker 2>/dev/null || true
a2dismod mpm_prefork 2>/dev/null || true

# Habilitar SOLO mpm_prefork (necesario para PHP)
a2enmod mpm_prefork

# Iniciar Apache en primer plano
exec apache2-foreground
