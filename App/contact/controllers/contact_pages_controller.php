<?php
/**
 * 🏛️ ARCHITECTURE ARCADIA (Simulated Namespace)
 * ----------------------------------------------------
 * 📍 Logical Path: Arcadia\Contact\Controllers
 * 📂 Physical File:   App/contact/controllers/contact_pages_controller.php
 * 
 * 📝 Description:
 * Controller for the public Contact page.
 */

require_once __DIR__ . '/../../hero/models/Hero.php';
require_once __DIR__ . '/../../hero/models/Slide.php';

class ContactPagesController {
    
    public function contact() {
        // 1. Get Hero for Contact Page
        $heroModel = new Hero();
        $hero = $heroModel->getByPage('contact');
        $slides = [];

        if ($hero && $hero->has_sliders) {
            $slideModel = new Slide();
            $slides = $slideModel->getByHeroId($hero->id_hero);
        }

        if (file_exists(__DIR__ . '/../views/pages/contact.php')) {
            include_once __DIR__ . '/../views/pages/contact.php';
        } else {
            echo "Error: View contact.php not found.";
        }
    }
}
