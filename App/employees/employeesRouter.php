<?php
/**
 * 🏛️ ARCHITECTURE ARCADIA (Simulated Namespace)
 * ----------------------------------------------------
 * 📍 Logical Path: Arcadia\Employees
 * 📂 Physical File:   App/employees/employeesRouter.php
 * 
 * 📝 Description:
 * Router for the Employees domain.
 * Handles incoming requests and delegates to the appropriate controller.
 */

require_once __DIR__ . '/../../includes/functions.php';
handleDomainRouting('employees', __DIR__);
