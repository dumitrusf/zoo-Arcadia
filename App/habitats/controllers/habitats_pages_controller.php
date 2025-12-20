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

require_once __DIR__ . '/../models/habitat.php';
require_once __DIR__ . '/../../hero/models/Hero.php';
require_once __DIR__ . '/../../hero/models/Slide.php';
require_once __DIR__ . '/../../animals/models/animalFull.php';

class HabitatsPagesController {

    public function habitats() {
        // 1. Get all habitats from Habitat model
        $habitatModel = new Habitat();
        $habitats = $habitatModel->getAll();

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
        // Get habitat ID from URL parameter
        $id = $_GET['id'] ?? null;
        
        if (!$id) {
            header('Location: /habitats/pages/habitats');
            exit;
        }

        // 1. Get habitat by ID
        $habitatModel = new Habitat();
        $habitat = $habitatModel->getById($id);
        
        if (!$habitat) {
            header('Location: /habitats/pages/habitats');
            exit;
        }

        // 2. Get animals in this habitat
        $animals = $habitatModel->getAnimalsByHabitatId($id);

        // 3. Get Hero for this specific habitat (if exists), otherwise use generic habitats hero
        $heroModel = new Hero();
        $hero = $heroModel->getByHabitatId($id);
        
        // If no specific hero for this habitat, use the generic habitats hero
        if (!$hero) {
            $hero = $heroModel->getByPage('habitats');
        }
        
        $slides = [];
        if ($hero && $hero->has_sliders) {
            $slideModel = new Slide();
            $slides = $slideModel->getByHeroId($hero->id_hero);
        }

        // 4. Load the view
        if (file_exists(__DIR__ . '/../views/pages/habitat1.php')) {
            include_once __DIR__ . '/../views/pages/habitat1.php';
        } else {
            echo "Error: View habitat1.php not found.";
        }
    }
}
