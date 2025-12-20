<?php
/**
 * 🏛️ ARCHITECTURE ARCADIA (Simulated Namespace)
 * ----------------------------------------------------
 * 📍 Logical Path: Arcadia\Animals\Controllers
 * 📂 Physical File:   App/animals/controllers/animals_pages_controller.php
 * 
 * 📝 Description:
 * Controller for the public Animals pages.
 */

require_once __DIR__ . '/../../hero/models/Hero.php';
require_once __DIR__ . '/../../hero/models/Slide.php';
require_once __DIR__ . '/../models/animalFull.php';

class AnimalsPagesController {
    
    public function allanimals() {
        // 1. Get Hero for Animals Page
        $heroModel = new Hero();
        $hero = $heroModel->getByPage('animals');
        $slides = [];

        if ($hero && $hero->has_sliders) {
            $slideModel = new Slide();
            $slides = $slideModel->getByHeroId($hero->id_hero);
        }

        // 2. Get all animals
        $animalModel = new AnimalFull();
        $animals = $animalModel->getAll();

        if (file_exists(__DIR__ . '/../views/pages/allanimals.php')) {
            include_once __DIR__ . '/../views/pages/allanimals.php';
        } else {
            echo "Error: View allanimals.php not found.";
        }
    }

    public function animalpicked() {
        // Get animal ID from URL parameter
        $id = $_GET['id'] ?? null;
        
        if (!$id) {
            header('Location: /animals/pages/allanimals');
            exit;
        }

        // Get animal data by ID
        $animalModel = new AnimalFull();
        $animal = $animalModel->getById($id);
        
        if (!$animal) {
            header('Location: /animals/pages/allanimals');
            exit;
        }

        if (file_exists(__DIR__ . '/../views/pages/animalpicked.php')) {
            include_once __DIR__ . '/../views/pages/animalpicked.php';
        } else {
            echo "Error: View animalpicked.php not found.";
        }
    }
}
