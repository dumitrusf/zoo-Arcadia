<?php
/**
 * 🏛️ ARCHITECTURE ARCADIA (Simulated Namespace)
 * ----------------------------------------------------
 * 📍 Logical Path: Arcadia\Schedules\Controllers
 * 📂 Physical File:   App/schedules/controllers/schedules_gest_controller.php
 * 
 * 📝 Description:
 * Controller for managing opening hours.
 * 
 * 🔗 Dependencies:
 * - Arcadia\Database\Connection (via database/connection.php)
 * - Arcadia\Schedules\Views\Gest\Start (via App/schedules/views/gest/start.php)
 * - Arcadia\Schedules\Models\Schedule (via App/schedules/models/schedule.php)
 */

require_once __DIR__ . '/../../../database/connection.php';
require_once __DIR__ . '/../models/schedule.php';

DB::createInstance();

class SchedulesGestController {
    public function start() {
        $scheduleModel = new Schedule();
        $schedules = $scheduleModel->getAll();

        // Carga la vista estática de gestión
        // Asegúrate de que el archivo 'start.php' esté en 'views/gest/'
        if (file_exists(__DIR__ . '/../views/gest/start.php')) {
            include_once __DIR__ . '/../views/gest/start.php';
        } else {
            echo "Error: View file not found at " . __DIR__ . '/../views/gest/start.php';
        }
    }

    public function edit() {
        $scheduleModel = new Schedule();
        $error = null;
        $success = null;

        // VERIFICAR SI ESTAMOS GUARDANDO (POST)
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Recoger datos del formulario
            $id = $_POST['id_opening'] ?? null;
            $data = [
                'time_slot'    => $_POST['time_slot'] ?? '',
                'opening_time' => $_POST['opening_time'] ?? '',
                'closing_time' => $_POST['closing_time'] ?? '',
                'status'       => $_POST['status'] ?? 'open'
            ];

            if ($id && $scheduleModel->update($id, $data)) {
                // Redirigir al listado con mensaje de éxito (o mostrarlo aquí)
                header('Location: /schedules/gest/start'); 
                exit;
            } else {
                $error = "Failed to update schedule.";
            }
        }

        // MOSTRAR FORMULARIO (GET)
        $id = $_GET['id'] ?? null;
        $schedule = null;

        if ($id) {
            $schedule = $scheduleModel->getById($id);
        }

        if (!$schedule) {
            echo "Error: Schedule not found.";
            return;
        }

        if (file_exists(__DIR__ . '/../views/gest/edit.php')) {
            include_once __DIR__ . '/../views/gest/edit.php';
        } else {
            echo "Error: View file not found at " . __DIR__ . '/../views/gest/edit.php';
        }
    }
}
