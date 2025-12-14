<?php
/**
 * 🏛️ ARCHITECTURE ARCADIA (Simulated Namespace)
 * ----------------------------------------------------
 * 📍 Logical Path: Arcadia\Contact
 * 📂 Physical File:   App/contact/contactRouter.php
 * 
 * 📝 Description:
 * Router for the Contact domain.
 * Handles incoming requests and delegates to the appropriate controller.
 * 
 * 🔗 Dependencies:
 * - Arcadia\Includes\Functions (via includes/functions.php)
 */

require_once __DIR__ . '/../../includes/functions.php';
handleDomainRouting('contact', __DIR__);
