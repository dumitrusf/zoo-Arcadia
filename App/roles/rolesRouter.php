<?php
/**
 * 🏛️ ARCHITECTURE ARCADIA (Simulated Namespace)
 * ----------------------------------------------------
 * 📍 Logical Path: Arcadia\Roles
 * 📂 Physical File:   App/roles/rolesRouter.php
 * 
 * 📝 Description:
 * Router for the Roles domain.
 * Handles incoming requests and delegates to the appropriate controller.
 */

require_once __DIR__ . '/../../includes/functions.php';
handleDomainRouting('roles', __DIR__);