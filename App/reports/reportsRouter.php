<?php
/**
 * 🏛️ ARCHITECTURE ARCADIA (Simulated Namespace)
 * ----------------------------------------------------
 * 📍 Logical Path: Arcadia\Reports
 * 📂 Physical File:   App/reports/reportsRouter.php
 * 
 * 📝 Description:
 * Router for the Reports domain.
 * Handles incoming requests and delegates to the appropriate controller.
 */

require_once __DIR__ . '/../../includes/functions.php';
handleDomainRouting('reports', __DIR__);