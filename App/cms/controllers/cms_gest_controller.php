<?php
/**
 * 🏛️ ARCHITECTURE ARCADIA (Simulated Namespace)
 * ----------------------------------------------------
 * 📍 Logical Path: Arcadia\CMS\Controllers
 * 📂 Physical File:   App/cms/controllers/cms_gest_controller.php
 * 
 * 📝 Description:
 * Controller for managing Zoo Services (CMS).
 * Handles CRUD operations and image uploads via Cloudinary.
 */

require_once __DIR__ . '/../models/service.php';
require_once __DIR__ . '/../../medias/models/cloudinary.php';
require_once __DIR__ . '/../../medias/models/Media.php';

class CmsGestController {
    
    // Dashboard: List all services
    public function start() {
        $serviceModel = new Service();
        $services = $serviceModel->getAll();
        
        if (file_exists(__DIR__ . '/../views/gest/start.php')) {
            include_once __DIR__ . '/../views/gest/start.php';
        } else {
            echo "Error: View file not found at " . __DIR__ . '/../views/gest/start.php';
        }
    }

    public function create() {
        $action = 'create';
        $service = null;
        if (file_exists(__DIR__ . '/../views/gest/edit.php')) {
            include_once __DIR__ . '/../views/gest/edit.php';
        }
    }

    public function edit() {
        $id = $_GET['id'] ?? null;
        if (!$id) { header('Location: /cms/gest/start'); exit; }

        $serviceModel = new Service();
        $service = $serviceModel->getById($id);
        $action = 'edit';

        if (!$service) { echo "Service not found."; return; }

        if (file_exists(__DIR__ . '/../views/gest/edit.php')) {
            include_once __DIR__ . '/../views/gest/edit.php';
        }
    }

    // Save (Create or Update)
    public function save() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id_service'] ?? null;
            $title = $_POST['service_title'];
            $desc = $_POST['service_description'];
            $link = $_POST['link'] ?? '';
            $type = $_POST['type'] ?? 'service';
            
            // Get logged user ID or fallback to 1 (Admin/Dev)
            $userId = $_SESSION['user']['id_user'] ?? 1; 

            $serviceModel = new Service();
            $cloudinary = new Cloudinary();
            $mediaModel = new Media();

            try {
                $serviceId = false;

                if ($id) {
                    // UPDATE
                    $updateResult = $serviceModel->update($id, $title, $desc, $link, $type, $userId);
                    if ($updateResult === false) {
                        throw new Exception("Failed to update service in Database. Check logs/ENUMs.");
                    }
                    $serviceId = $id;
                } else {
                    // CREATE
                    $serviceId = $serviceModel->create($title, $desc, $link, $type, $userId);
                }

                // 🚨 DEBUG CHEKPOINT
                if ($serviceId === false) {
                    throw new Exception("Failed to create/update service in Database. Check logs/ENUMs.");
                }

                // Handle Image Upload if present
                if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                    // 1. Upload to Cloud
                    $url = $cloudinary->upload($_FILES['image']);
                    
                    if ($url) {
                        // 2. Save Media DB
                        $mediaId = $mediaModel->create($url, 'image', "Service: $title");
                        
                        if ($mediaId) {
                            // 3. UNLINK OLD & LINK NEW
                            // Delete any previous relationships for this service before creating the new one
                            $mediaModel->unlink('services', $serviceId);
                            // Create the new one
                            $mediaModel->link($mediaId, 'services', $serviceId);
                        } else {
                             // If media save fails, we don't stop everything, but we log it
                             error_log("Media save failed for URL: $url");
                        }
                    }
                }

                header('Location: /cms/gest/start?msg=saved');
                exit;

            } catch (Exception $e) {
                // Show error ON SCREEN instead of redirecting
                echo "<div class='alert alert-danger'><strong>Error saving service:</strong> " . $e->getMessage() . "</div>";
                // echo "<pre>" . $e->getTraceAsString() . "</pre>"; // Uncomment for full trace
            }
        }
    }
    
    // Delete
    public function delete() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $serviceModel = new Service();
            $serviceModel->delete($id);
        }
        header('Location: /cms/gest/start?msg=deleted');
        exit;
    }

    // Show Service Logs
    public function logs() {
        $serviceModel = new Service();
        $logs = $serviceModel->getLogs();
        
        if (file_exists(__DIR__ . '/../views/gest/logs.php')) {
            include_once __DIR__ . '/../views/gest/logs.php';
        } else {
            echo "Error: View logs.php not found.";
        }
    }
}
