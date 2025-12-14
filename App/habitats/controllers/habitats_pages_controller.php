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

require_once __DIR__ . '/../../cms/models/service.php';
require_once __DIR__ . '/../../hero/models/Hero.php';
require_once __DIR__ . '/../../hero/models/Slide.php';

class HabitatsPagesController {

    public function habitats() {
        // 1. Get services of type 'habitat' (Although view is static for now, we keep logic ready)
        $serviceModel = new Service();
        $habitats = $serviceModel->getHabitats();

        // 2. Get Hero for Habitats Page
        $heroModel = new Hero();
        $hero = $heroModel->getByPage('habitats');
        $slides = [];

        if ($hero && $hero->has_sliders) {
            $slideModel = new Slide();
            $slides = $slideModel->getByHeroId($hero->id_hero);
        }

        // 3. Load the view
        if (file_exists(__DIR__ . '/../views/pages/habitats.php')) {
            include_once __DIR__ . '/../views/pages/habitats.php';
        } else {
            echo "Error: View habitats.php not found.";
        }
    }

    public function habitat1() {
        if (file_exists(__DIR__ . '/../views/pages/habitat1.php')) {
            include_once __DIR__ . '/../views/pages/habitat1.php';
        }
    }
}
