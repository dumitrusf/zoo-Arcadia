<?php
/**
 * 🏛️ ARCHITECTURE ARCADIA (Simulated Namespace)
 * ----------------------------------------------------
 * 📍 Logical Path: Arcadia\Habitats\Controllers
 * 📂 Physical File:   App/habitats/controllers/habitats_pages_controller.php
 * 
 * 📝 Description:
 * Controller for the public Habitats pages.
 */

// We need the Service model to fetch habitat cards
require_once __DIR__ . '/../../cms/models/service.php';

class HabitatsPagesController {

    public function habitats() {
        // 1. Get services of type 'habitat'
        $serviceModel = new Service();
        $habitats = $serviceModel->getHabitats();

        // 2. Load the view and pass the data
        if (file_exists(__DIR__ . '/../views/pages/habitats.php')) {
            include_once __DIR__ . '/../views/pages/habitats.php';
        } else {
            echo "Error: View habitats.php not found.";
        }
    }

    public function habitat1() {
        // This would fetch a single habitat, we can implement it later
        if (file_exists(__DIR__ . '/../views/pages/habitat1.php')) {
            include_once __DIR__ . '/../views/pages/habitat1.php';
        }
    }
}

?>