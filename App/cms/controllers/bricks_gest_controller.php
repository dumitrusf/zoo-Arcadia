<?php

/**
 * 🏛️ ARCHITECTURE ARCADIA (Simulated Namespace)
 * ----------------------------------------------------
 * 📍 Logical Path: Arcadia\CMS\Controllers
 * 📂 Physical File:   App/cms/controllers/bricks_gest_controller.php
 * 
 * 📝 Description:
 * Controller for managing Bricks (Content Blocks).
 * Handles CRUD operations and image uploads via Cloudinary.
 */

require_once __DIR__ . '/../models/brick.php';
require_once __DIR__ . '/../../medias/models/cloudinary.php';
require_once __DIR__ . '/../../medias/models/Media.php';

class BricksGestController
{

    // Dashboard: List all bricks
    public function start()
    {
        $brickModel = new Brick();
        $bricks = $brickModel->getAll();

        if (file_exists(__DIR__ . '/../views/gest/bricks_start.php')) {
            include_once __DIR__ . '/../views/gest/bricks_start.php';
        } else {
            echo "Error: View bricks_start.php not found.";
        }
    }

    // Show Create Form
    public function create()
    {
        $action = 'create';
        $brick = null;
        if (file_exists(__DIR__ . '/../views/gest/bricks_edit.php')) {
            include_once __DIR__ . '/../views/gest/bricks_edit.php';
        }
    }

    // Show Edit Form
    public function edit()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header('Location: /cms/bricks/start');
            exit;
        }

        $brickModel = new Brick();
        $brick = $brickModel->getById($id);
        $action = 'edit';

        if (!$brick) {
            echo "Brick not found.";
            return;
        }

        if (file_exists(__DIR__ . '/../views/gest/bricks_edit.php')) {
            include_once __DIR__ . '/../views/gest/bricks_edit.php';
        }
    }

    // Save (Create or Update)
    public function save()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id_brick'] ?? null;
            $title = $_POST['title'];
            $desc = $_POST['description'];
            $link = $_POST['link'] ?? '';
            $pageName = $_POST['page_name'];

            $brickModel = new Brick();
            $cloudinary = new Cloudinary();
            $mediaModel = new Media();

            try {
                $brickId = false;

                if ($id) {
                    // UPDATE
                    if ($brickModel->update($id, $title, $desc, $link, $pageName)) {
                        $brickId = $id;
                    }
                } else {
                    // CREATE
                    $brickId = $brickModel->create($title, $desc, $link, $pageName);
                }

                if (!$brickId) {
                    throw new Exception("Failed to save Brick in DB.");
                }

                // 1. Upload Main Image (Mobile)
                $urlMobile = null;
                if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                    $urlMobile = $cloudinary->upload($_FILES['image']);
                }

                // 2. Upload Tablet Image
                $urlTablet = null;
                if (isset($_FILES['image_tablet']) && $_FILES['image_tablet']['error'] === UPLOAD_ERR_OK) {
                    $urlTablet = $cloudinary->upload($_FILES['image_tablet']);
                }

                // 3. Upload Desktop Image
                $urlDesktop = null;
                if (isset($_FILES['image_desktop']) && $_FILES['image_desktop']['error'] === UPLOAD_ERR_OK) {
                    $urlDesktop = $cloudinary->upload($_FILES['image_desktop']);
                }

                // Handle Image Upload logic
                if ($urlMobile || $urlTablet || $urlDesktop) {
                    $base = $urlMobile ?? $urlDesktop ?? $urlTablet;
                    $mediaId = $mediaModel->create($base, 'image', "Brick: $title", $urlTablet, $urlDesktop);

                    if ($mediaId) {
                        // UNLINK OLD & LINK NEW
                        $mediaModel->unlink('bricks', $brickId);
                        $mediaModel->link($mediaId, 'bricks', $brickId);
                    }
                }

                header('Location: /cms/bricks/start?msg=saved');
                exit;
            } catch (Exception $e) {
                echo "Error saving brick: " . $e->getMessage();
            }
        }
    }

    // Delete
    public function delete()
    {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $brickModel = new Brick();
            $brickModel->delete($id);
        }
        header('Location: /cms/bricks/start?msg=deleted');
        exit;
    }
}
