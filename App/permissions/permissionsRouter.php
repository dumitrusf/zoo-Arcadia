<?php
/**
 * 🏛️ ARCHITECTURE ARCADIA (Simulated Namespace)
 * ----------------------------------------------------
 * 📍 Logical Path: Arcadia\Permissions
 * 📂 Physical File:   App/permissions/permissionsRouter.php
 * 
 * 📝 Description:
 * Router for the Permissions domain.
 * Handles incoming requests and delegates to the appropriate controller.
 */

require_once __DIR__ . '/../../includes/functions.php';
handleDomainRouting('permissions', __DIR__);