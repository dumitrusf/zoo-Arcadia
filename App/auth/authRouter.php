<?php
/**
 * 🏛️ ARCHITECTURE ARCADIA (Simulated Namespace)
 * ----------------------------------------------------
 * 📍 Logical Path: Arcadia\Auth
 * 📂 Physical File:   App/auth/authRouter.php
 * 
 * 📝 Description:
 * Router for the Auth domain.
 * Handles incoming requests and delegates to the appropriate controller.
 */

require_once __DIR__ . '/../../includes/functions.php';
handleDomainRouting('auth', __DIR__);
