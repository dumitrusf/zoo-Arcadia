<?php
/**
 * 🏛️ ARCHITECTURE ARCADIA (Simulated Namespace)
 * ----------------------------------------------------
 * 📍 Logical Path: Arcadia\Cms
 * 📂 Physical File:   App/cms/cmsRouter.php
 * 
 * 📝 Description:
 * Router for the Cms domain.
 * Handles incoming requests and delegates to the appropriate controller.
 */

require_once __DIR__ . '/../../includes/functions.php';
handleDomainRouting('cms', __DIR__);