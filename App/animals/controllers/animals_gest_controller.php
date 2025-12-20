<?php

/**
 * 🏛️ ARQUITECTURA ARCADIA (Código Simulativo Namespace)
 * ----------------------------------------------------
 * 📍 Ubicación Lógica: Arcadia\Animals\Controllers
 * 📂 Archivo Físico:   App/animals/controllers/animals_gest_controller.php
 * 
 * 📝 Descripción:
 * Controlador para la gestión administrativa de animales.
 * Implementa lógica de permisos (RBAC) y CRUD.
 * 
 * 🔗 Dependencies:
 * - Arcadia\Animals\Models\Animal (via App/animals/models/animal.php)
 * - Arcadia\Animals\Models\AnimalGeneral (via App/animals/models/animalGeneral.php)
 * - Arcadia\Animals\Models\AnimalFull (via App/animals/models/animalFull.php)
 * - Arcadia\Database\Connection (via database/connection.php)
 * - Arcadia\Animals\Views\Gest\Start (via App/animals/views/gest/start.php)
 * - Arcadia\Animals\Views\Gest\Create (via App/animals/views/gest/create.php)
 * - Arcadia\Animals\Views\Gest\Edit (via App/animals/views/gest/edit.php)
 * - Arcadia\Animals\Views\Gest\View (via App/animals/views/gest/view.php)
 */

require_once __DIR__ . "/../models/animalFull.php";
require_once __DIR__ . "/../models/animalGeneral.php";
require_once __DIR__ . "/../models/category.php";
require_once __DIR__ . "/../models/specie.php";
require_once __DIR__ . "/../models/nutrition.php";
require_once __DIR__ . "/../../habitats/models/habitat.php";
require_once __DIR__ . "/../../medias/models/cloudinary.php";
require_once __DIR__ . "/../../medias/models/Media.php";

class AnimalsGestController
{
    /**
     * Dashboard: List all animals, categories and species
     */
    public function start()
    {
        $animalModel = new AnimalFull();
        $categoryModel = new category();
        $specieModel = new specie();
        $nutritionModel = new Nutrition();
        
        $animals = $animalModel->getAll();
        $categories = $categoryModel->getAll();
        $species = $specieModel->getAll();
        $nutritions = $nutritionModel->getAll();
        
        if (file_exists(__DIR__ . '/../views/gest/start.php')) {
            include_once __DIR__ . '/../views/gest/start.php';
        } else {
            echo "Error: View file not found at " . __DIR__ . '/../views/gest/start.php';
        }
    }

    /**
     * Save category (create or update)
     */
    public function saveCategory()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id_category'] ?? null;
            $name = trim($_POST['category_name'] ?? '');
            
            if (empty($name)) {
                header('Location: /animals/gest/start?msg=error&error=Category name is required');
                exit;
            }
            
            $categoryModel = new category();
            
            if ($id) {
                // UPDATE
                $result = $categoryModel->update($id, $name);
            } else {
                // CREATE
                $result = $categoryModel->create($name);
            }
            
            if ($result) {
                header('Location: /animals/gest/start?msg=saved');
            } else {
                header('Location: /animals/gest/start?msg=error&error=Failed to save category');
            }
            exit;
        }
    }

    /**
     * Delete category
     */
    public function deleteCategory()
    {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $categoryModel = new category();
            $categoryModel->delete($id);
        }
        header('Location: /animals/gest/start?msg=deleted');
        exit;
    }

    /**
     * Save species (create or update)
     */
    public function saveSpecies()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id_specie'] ?? null;
            $categoryId = $_POST['category_id'] ?? null;
            $name = trim($_POST['specie_name'] ?? '');
            
            if (empty($name) || empty($categoryId)) {
                header('Location: /animals/gest/start?msg=error&error=Species name and category are required');
                exit;
            }
            
            $specieModel = new specie();
            
            if ($id) {
                // UPDATE
                $result = $specieModel->update($id, $categoryId, $name);
            } else {
                // CREATE
                $result = $specieModel->create($categoryId, $name);
            }
            
            if ($result) {
                header('Location: /animals/gest/start?msg=saved');
            } else {
                header('Location: /animals/gest/start?msg=error&error=Failed to save species');
            }
            exit;
        }
    }

    /**
     * Delete species
     */
    public function deleteSpecies()
    {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $specieModel = new specie();
            $specieModel->delete($id);
        }
        header('Location: /animals/gest/start?msg=deleted');
        exit;
    }

    /**
     * Save nutrition (create or update)
     */
    public function saveNutrition()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id_nutrition'] ?? null;
            $nutritionType = $_POST['nutrition_type'] ?? '';
            $foodType = $_POST['food_type'] ?? '';
            $foodQty = $_POST['food_qtty'] ?? null;
            
            if (empty($nutritionType) || empty($foodType) || empty($foodQty)) {
                header('Location: /animals/gest/start?msg=error&error=All nutrition fields are required');
                exit;
            }
            
            $nutritionModel = new Nutrition();
            
            if ($id) {
                // UPDATE
                $result = $nutritionModel->update($id, $nutritionType, $foodType, (int)$foodQty);
            } else {
                // CREATE
                $result = $nutritionModel->create($nutritionType, $foodType, (int)$foodQty);
            }
            
            if ($result) {
                header('Location: /animals/gest/start?msg=saved');
            } else {
                header('Location: /animals/gest/start?msg=error&error=Failed to save nutrition plan');
            }
            exit;
        }
    }

    /**
     * Delete nutrition
     */
    public function deleteNutrition()
    {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $nutritionModel = new Nutrition();
            $nutritionModel->delete($id);
        }
        header('Location: /animals/gest/start?msg=deleted');
        exit;
    }

    /**
     * Show form to create a new animal
     */
    public function create()
    {
        $action = 'create';
        $animal = null;
        
        // Load data for dropdowns
        $categoryModel = new category();
        $specieModel = new specie();
        $habitatModel = new Habitat();
        $nutritionModel = new Nutrition();
        
        $categories = $categoryModel->getAll();
        $species = $specieModel->getAll();
        $habitats = $habitatModel->getAll();
        $nutritions = $nutritionModel->getAll();
        
        if (file_exists(__DIR__ . '/../views/gest/edit.php')) {
            include_once __DIR__ . '/../views/gest/edit.php';
        } else {
            echo "Error: View file not found at " . __DIR__ . '/../views/gest/edit.php';
        }
    }

    /**
     * Show form to edit an existing animal
     */
    public function edit()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header('Location: /animals/gest/start');
            exit;
        }

        $animalFullModel = new AnimalFull();
        $animal = $animalFullModel->getById($id);
        
        if (!$animal) {
            echo "Animal not found.";
            return;
        }

        $action = 'edit';
        
        // Load data for dropdowns
        $categoryModel = new category();
        $specieModel = new specie();
        $habitatModel = new Habitat();
        $nutritionModel = new Nutrition();
        
        $categories = $categoryModel->getAll();
        $species = $specieModel->getAll();
        $habitats = $habitatModel->getAll();
        $nutritions = $nutritionModel->getAll();
        
        if (file_exists(__DIR__ . '/../views/gest/edit.php')) {
            include_once __DIR__ . '/../views/gest/edit.php';
        } else {
            echo "Error: View file not found at " . __DIR__ . '/../views/gest/edit.php';
        }
    }

    /**
     * Save (Create or Update) animal
     */
    public function save()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id_full_animal'] ?? null;
            $animalName = $_POST['animal_name'] ?? '';
            $specieId = $_POST['specie_id'] ?? null;
            $gender = $_POST['gender'] ?? '';
            $habitatId = $_POST['habitat_id'] ?? null;
            $nutritionId = $_POST['nutrition_id'] ?? null;

            $animalGeneralModel = new AnimalGeneral();
            $animalFullModel = new AnimalFull();
            $cloudinary = new Cloudinary();
            $mediaModel = new Media();

            try {
                $animalGeneralId = false;
                $animalFullId = false;

                if ($id) {
                    // UPDATE MODE
                    // Get existing animal_full to get animal_g_id
                    $existingAnimal = $animalFullModel->getById($id);
                    if (!$existingAnimal) {
                        throw new Exception("Animal not found for update.");
                    }
                    
                    $animalGeneralId = $existingAnimal->animal_g_id;
                    
                    // Update animal_general
                    $updateGeneral = $animalGeneralModel->update($animalGeneralId, $animalName, $specieId, $gender);
                    if (!$updateGeneral) {
                        throw new Exception("Failed to update animal general info.");
                    }
                    
                    // Update animal_full (habitat and nutrition)
                    $updateFull = $animalFullModel->update($id, $habitatId, $nutritionId);
                    if (!$updateFull) {
                        throw new Exception("Failed to update animal full profile.");
                    }
                    
                    $animalFullId = $id;
                } else {
                    // CREATE MODE
                    // 1. Create animal_general
                    $animalGeneralId = $animalGeneralModel->create($animalName, $specieId, $gender);
                    if ($animalGeneralId === false) {
                        throw new Exception("Failed to create animal general record.");
                    }
                    
                    // 2. Create animal_full
                    $animalFullId = $animalFullModel->create($animalGeneralId, $habitatId, $nutritionId);
                    if ($animalFullId === false) {
                        throw new Exception("Failed to create animal full profile.");
                    }
                }

                // 3. Handle image uploads (responsive: mobile, tablet, desktop)
                $urlMobile = null;
                if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                    $urlMobile = $cloudinary->upload($_FILES['image']);
                }

                $urlTablet = null;
                if (isset($_FILES['image_tablet']) && $_FILES['image_tablet']['error'] === UPLOAD_ERR_OK) {
                    $urlTablet = $cloudinary->upload($_FILES['image_tablet']);
                }

                $urlDesktop = null;
                if (isset($_FILES['image_desktop']) && $_FILES['image_desktop']['error'] === UPLOAD_ERR_OK) {
                    $urlDesktop = $cloudinary->upload($_FILES['image_desktop']);
                }

                // If at least one image uploaded, create media record and link it
                if ($urlMobile || $urlTablet || $urlDesktop) {
                    $base = $urlMobile ?? $urlDesktop ?? $urlTablet;
                    
                    $mediaId = $mediaModel->create($base, 'image', "Animal: $animalName", $urlTablet, $urlDesktop);
                    
                    if ($mediaId) {
                        // Unlink old media if updating
                        if ($id) {
                            $mediaModel->unlink('animal_full', $animalFullId);
                        }
                        // Link new media
                        $mediaModel->link($mediaId, 'animal_full', $animalFullId);
                    }
                }

                header('Location: /animals/gest/start?msg=saved');
                exit;

            } catch (Exception $e) {
                echo "<div class='alert alert-danger'><strong>Error saving animal:</strong> " . htmlspecialchars($e->getMessage()) . "</div>";
            }
        }
    }

    /**
     * Delete an animal
     */
    public function delete()
    {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $animalFullModel = new AnimalFull();
            $animalFull = $animalFullModel->getById($id);
            
            if ($animalFull) {
                // Delete media relation first
                $mediaModel = new Media();
                $mediaModel->unlink('animal_full', $id);
                
                // Delete animal_full (this should cascade to animal_general if FK is set)
                $animalFullModel->delete($id);
                
                // Also delete animal_general explicitly (if cascade not set)
                $animalGeneralModel = new AnimalGeneral();
                $animalGeneralModel->delete($animalFull->animal_g_id);
            }
        }
        header('Location: /animals/gest/start?msg=deleted');
        exit;
    }
}
