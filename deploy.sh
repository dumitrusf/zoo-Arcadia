#!/bin/bash
# Intentionally LF line endings (Linux / macOS / Git Bash).
set -u

# ============================================
# Script de Despliegue de Base de Datos
# Zoo Arcadia (Linux / macOS / Git Bash)
# ============================================
# Equivalente logico a deploy.bat (Windows).
# Ejecutar: bash deploy.sh  (desde cualquier directorio;
# las rutas SQL se resuelven respecto a este fichero.)
#
# La contrasena no va en la linea de comandos (-p): se usa un
# fichero temporal solo legible por ti (--defaults-extra-file),
# asi el cliente mysql no repite el aviso de seguridad en cada paso.
# ============================================

GREEN='\033[0;32m'
RED='\033[0;31m'
YELLOW='\033[1;33m'
NC='\033[0m'

SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
DB_DIR="$SCRIPT_DIR/database"

DB_HOST="${DB_HOST:-localhost}"
DB_NAME="${DB_NAME:-zoo_arcadia}"
DB_USER="${DB_USER:-root}"
DB_PASS="${DB_PASS:-root}"
DB_PORT="${DB_PORT:-3306}"

CLIENT_CNF=""
cleanup() {
    if [[ -n "${CLIENT_CNF}" && -f "${CLIENT_CNF}" ]]; then
        rm -f "${CLIENT_CNF}"
    fi
}
trap cleanup EXIT

CLIENT_CNF="$(mktemp)"
chmod 600 "${CLIENT_CNF}" 2>/dev/null || true
# Fichero de opciones cliente (evita -p en linea de comandos)
{
    echo "[client]"
    echo "host=${DB_HOST}"
    echo "port=${DB_PORT}"
    echo "user=${DB_USER}"
    echo "password=${DB_PASS}"
} > "${CLIENT_CNF}"

MYSQL_BASE=(mysql --defaults-extra-file="${CLIENT_CNF}")

echo -e "${GREEN}========================================${NC}"
echo -e "${GREEN}Despliegue de Base de Datos Zoo Arcadia${NC}"
echo -e "${GREEN}========================================${NC}"
echo ""

# 1. Inicializar base de datos (sin nombre de BD en la linea mysql, igual que deploy.bat)
echo "[1/7] Ejecutando inicialización de base de datos..."
if [[ ! -f "${DB_DIR}/01_init.sql" ]]; then
    echo -e "${RED}ERROR: No se encontró database/01_init.sql${NC}"
    exit 1
fi
if "${MYSQL_BASE[@]}" < "${DB_DIR}/01_init.sql"; then
    echo "OK: Inicialización completada"
else
    echo -e "${RED}ERROR: Fallo en inicialización${NC}"
    exit 1
fi
echo ""

# 2. Crear tablas
echo "[2/7] Ejecutando creación de tablas..."
if "${MYSQL_BASE[@]}" "${DB_NAME}" < "${DB_DIR}/02_tables.sql"; then
    echo "OK: Tablas creadas"
else
    echo -e "${RED}ERROR: Fallo en creación de tablas${NC}"
    exit 1
fi
echo ""

# 3. Constraints
echo "[3/7] Ejecutando constraints y claves foráneas..."
if "${MYSQL_BASE[@]}" "${DB_NAME}" < "${DB_DIR}/03_constraints.sql"; then
    echo "OK: Constraints añadidos"
else
    echo -e "${RED}ERROR: Fallo en constraints${NC}"
    exit 1
fi
echo ""

# 4. Índices (opcional)
echo "[4/7] Ejecutando índices..."
if [[ -f "${DB_DIR}/04_indexes.sql" ]]; then
    if "${MYSQL_BASE[@]}" "${DB_NAME}" < "${DB_DIR}/04_indexes.sql"; then
        echo "OK: Índices añadidos"
    else
        echo -e "${YELLOW}ADVERTENCIA: Fallo en índices (continuando...)${NC}"
    fi
else
    echo -e "${YELLOW}ADVERTENCIA: Archivo de índices no encontrado (saltando...)${NC}"
fi
echo ""

# 5. Procedimientos (opcional)
echo "[5/7] Ejecutando procedimientos almacenados..."
if [[ -f "${DB_DIR}/05_procedures.sql" ]]; then
    if "${MYSQL_BASE[@]}" "${DB_NAME}" < "${DB_DIR}/05_procedures.sql"; then
        echo "OK: Procedimientos creados"
    else
        echo -e "${YELLOW}ADVERTENCIA: Fallo en procedimientos (continuando...)${NC}"
    fi
else
    echo -e "${YELLOW}ADVERTENCIA: Archivo de procedimientos no encontrado (saltando...)${NC}"
fi
echo ""

# 6. Seed (obligatorio)
echo "[6/7] Ejecutando datos iniciales (Seed data)..."
if "${MYSQL_BASE[@]}" "${DB_NAME}" < "${DB_DIR}/06_seed_data.sql"; then
    echo "OK: Datos iniciales insertados"
else
    echo -e "${RED}ERROR: Fallo en datos de seed${NC}"
    exit 1
fi
echo ""

# 7. Limpieza (opcional)
echo "[7/7] Ejecutando limpieza..."
if [[ -f "${DB_DIR}/07_cleanup.sql" ]]; then
    if "${MYSQL_BASE[@]}" "${DB_NAME}" < "${DB_DIR}/07_cleanup.sql"; then
        echo "OK: Limpieza completada"
    else
        echo -e "${YELLOW}ADVERTENCIA: Fallo en limpieza (continuando...)${NC}"
    fi
else
    echo -e "${YELLOW}ADVERTENCIA: Archivo de limpieza no encontrado (saltando...)${NC}"
fi
echo ""

echo -e "${GREEN}========================================${NC}"
echo -e "${GREEN}Despliegue completado exitosamente${NC}"
echo -e "${GREEN}========================================${NC}"
