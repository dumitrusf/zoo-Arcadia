<?php
/**
 * 🏛️ ARCHITECTURE ARCADIA (Simulated Namespace)
 * ----------------------------------------------------
 * 📍 Logical Path: Arcadia\About\Controllers
 * 📂 Physical File:   App/about/controllers/about_pages_controller.php
 * 
 * 📝 Description:
 * Controller for the public About page.
 */

require_once __DIR__ . '/../../hero/models/Hero.php';
require_once __DIR__ . '/../../hero/models/Slide.php';
require_once __DIR__ . '/../../cms/models/brick.php'; // NEW

class AboutPagesController {
    
    public function about() {
        // 1. Get Hero for About Page
        $heroModel = new Hero();
        $hero = $heroModel->getByPage('about');
        $slides = [];

        if ($hero && $hero->has_sliders) {
            $slideModel = new Slide();
            $slides = $slideModel->getByHeroId($hero->id_hero);
        }

        // 2. Get Brick for About Page ("who we are?")
        $brickModel = new Brick();
        $aboutBrick = $brickModel->getByPage('about');

        if (file_exists(__DIR__ . '/../views/pages/about.php')) {
            include_once __DIR__ . '/../views/pages/about.php';
        } else {
            echo "Error: View about.php not found.";
        }
    }
}
