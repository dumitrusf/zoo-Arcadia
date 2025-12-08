<?php
/**
 * 🏛️ ARCHITECTURE ARCADIA (Simulated Namespace)
 * ----------------------------------------------------
 * 📍 Logical Path: Arcadia\Home\Controllers
 * 📂 Physical File:   App/home/controllers/home_pages_controller.php
 * 
 * 📝 Description:
 * Controller for the public Home page.
 */

// We need the Service model to fetch featured items
require_once __DIR__ . '/../../cms/models/service.php';

class HomePagesController {

    public function index() {
        // 1. Get featured services for the homepage cards
        $serviceModel = new Service();
        $featuredServices = $serviceModel->getFeatured();

        // 2. Load the view and pass the data
        if (file_exists(__DIR__ . '/../views/pages/index.php')) {
            include_once __DIR__ . '/../views/pages/index.php';
        } else {
            echo "Error: View index.php not found.";
        }
    }

    public function start() {
        if (file_exists(__DIR__ . '/../views/gest/start.php')) {
            include_once __DIR__ . '/../views/gest/start.php';
        } else {
            echo "Error: View not found at " . __DIR__ . '/../views/gest/start.php';
        }
    }
}