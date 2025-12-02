<?php
/**
 * 🏛️ ARCHITECTURE ARCADIA (Simulated Namespace)
 * ----------------------------------------------------
 * 📍 Logical Path: Arcadia\Includes\Layouts
 * 📂 Physical File:   includes/layouts/FC_main_layout.php
 * 
 * 📝 Description:
 * Main layout for FRONT OFFICE (Public).
 * Defines the common visual structure for visitors.
 */

include __DIR__ . '/../templates/nav.php';

echo $viewContent ?? '';

include __DIR__ . '/../templates/footer.php';

?>