<?php
/**
 * 🏛️ ARCHITECTURE ARCADIA (Simulated Namespace)
 * ----------------------------------------------------
 * 📍 Logical Path: Arcadia\Home\Controllers
 * 📂 Physical File:   App/home/controllers/home_pages_controller.php
 * 
 * 📝 Description:
 * Controller for the public Home page.
 * Handles fetching of dynamic content (Hero, Slides, Featured Services, Content Bricks).
 * 
 * 🔗 Dependencies:
 * - Arcadia\CMS\Models\Service (via App/cms/models/service.php)
 * - Arcadia\CMS\Models\Brick (via App/cms/models/brick.php)
 * - Arcadia\Hero\Models\Hero (via App/hero/models/Hero.php)
 * - Arcadia\Hero\Models\Slide (via App/hero/models/Slide.php)
 */

require_once __DIR__ . '/../../cms/models/service.php';
require_once __DIR__ . '/../../cms/models/brick.php'; // NEW: Brick Model
require_once __DIR__ . '/../../hero/models/Hero.php';
require_once __DIR__ . '/../../hero/models/Slide.php';

class HomePagesController {

    public function index() {
        // 1. Get Featured Services (Cards)
        $serviceModel = new Service();
        $featuredServices = $serviceModel->getFeatured();

        // 2. Get Hero for Home Page
        $heroModel = new Hero();
        $hero = $heroModel->getByPage('home');
        $slides = [];

        // 3. Get Slides if Hero exists and has carousel
        if ($hero && $hero->has_sliders) {
            $slideModel = new Slide();
            $slides = $slideModel->getByHeroId($hero->id_hero);
        }

        // 4. NEW: Get Home Content Brick (More About Us)
        $brickModel = new Brick();
        $homeBrick = $brickModel->getByPage('home');

        // 5. Load view
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
