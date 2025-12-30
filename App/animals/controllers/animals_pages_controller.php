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
require_once __DIR__ . '/../models/specie.php';
require_once __DIR__ . '/../../habitats/models/habitat.php';
require_once __DIR__ . '/../models/nutrition.php';
require_once __DIR__ . '/../../vreports/models/healthStateReport.php';

class AnimalsPagesController {
    
    // ALL ANIMALS PAGE
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

        // 3. Get filter data
        $specieModel = new specie();
        $habitatModel = new Habitat();
        $nutritionModel = new Nutrition();
        
        $species = $specieModel->getAll();
        $habitats = $habitatModel->getAll();
        $nutritions = $nutritionModel->getAll();

        if (file_exists(__DIR__ . '/../views/pages/allanimals.php')) {
            include_once __DIR__ . '/../views/pages/allanimals.php';
        } else {
            echo "Error: View allanimals.php not found.";
        }
    }

    
    // ANIMAL PICKED PAGE
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
        
        // Get the latest health state report for this animal
        $healthReportModel = new HealthStateReport();
        $latestReport = $healthReportModel->getLatestByAnimalId($id);
        
        if (file_exists(__DIR__ . '/../views/pages/animalpicked.php')) {
            include_once __DIR__ . '/../views/pages/animalpicked.php';
        } else {
            echo "Error: View animalpicked.php not found.";
        }
    }
}
