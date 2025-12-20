
<?php
/**
 * 🏛️ ARCHITECTURE ARCADIA (Simulated Namespace)
 * ----------------------------------------------------
 * 📍 Logical Path: Arcadia\Habitats\Models
 * 📂 Physical File:   App/habitats/models/habitat.php
 * 
 * 📝 Description:
 * Model for interacting with the 'habitats' database table.
 * Handles CRUD operations for habitats (Savannah, Jungle, etc.).
 */

require_once __DIR__ . '/../../../database/connection.php';

class Habitat {
    private $db;

    public function __construct() {
        $this->db = DB::createInstance();
    }

    /**
     * Get all habitats.
     * @param bool $includeAnimalCount If true, includes animal_count for each habitat.
     * @return array List of habitats as objects.
     */
    public function getAll($includeAnimalCount = false) {
        if ($includeAnimalCount) {
            $sql = "SELECT h.*, COUNT(af.id_full_animal) as animal_count,
                           m.media_path, m.media_path_medium, m.media_path_large
                    FROM habitats h
                    LEFT JOIN animal_full af ON h.id_habitat = af.habitat_id
                    LEFT JOIN media_relations mr ON h.id_habitat = mr.related_id AND mr.related_table = 'habitats'
                    LEFT JOIN media m ON mr.media_id = m.id_media
                    GROUP BY h.id_habitat
                    ORDER BY h.habitat_name ASC";
        } else {
            $sql = "SELECT h.*, m.media_path, m.media_path_medium, m.media_path_large
                    FROM habitats h
                    LEFT JOIN media_relations mr ON h.id_habitat = mr.related_id AND mr.related_table = 'habitats'
                    LEFT JOIN media m ON mr.media_id = m.id_media
                    ORDER BY h.habitat_name ASC";
        }
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Get a single habitat by ID.
     * @param int $id
     * @return object|false
     */
    public function getById($id) {
        $sql = "SELECT h.*, m.media_path, m.media_path_medium, m.media_path_large
                FROM habitats h
                LEFT JOIN media_relations mr ON h.id_habitat = mr.related_id AND mr.related_table = 'habitats'
                LEFT JOIN media m ON mr.media_id = m.id_media
                WHERE h.id_habitat = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Get all animals in a specific habitat.
     * @param int $habitatId
     * @return array List of animals in the habitat.
     */
    public function getAnimalsByHabitatId($habitatId) {
        $sql = "SELECT af.*, ag.animal_name, ag.gender, s.specie_name, c.category_name,
                       m.media_path, m.media_path_medium, m.media_path_large
                FROM animal_full af
                JOIN animal_general ag ON af.animal_g_id = ag.id_animal_g
                JOIN specie s ON ag.specie_id = s.id_specie
                JOIN category c ON s.category_id = c.id_category
                LEFT JOIN media_relations mr ON af.id_full_animal = mr.related_id AND mr.related_table = 'animal_full'
                LEFT JOIN media m ON mr.media_id = m.id_media
                WHERE af.habitat_id = :hid
                ORDER BY ag.animal_name ASC";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':hid' => $habitatId]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Get habitat with animal count.
     * @param int $id
     * @return object|false Habitat with animal_count field.
     */
    public function getByIdWithAnimalCount($id) {
        $sql = "SELECT h.*, COUNT(af.id_full_animal) as animal_count
                FROM habitats h
                LEFT JOIN animal_full af ON h.id_habitat = af.habitat_id
                WHERE h.id_habitat = :id
                GROUP BY h.id_habitat";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Create a new habitat.
     * @param string $name
     * @param string $description
     * @return int|false The ID of the new habitat or false on failure.
     */
    public function create($name, $description) {
        try {
            $sql = "INSERT INTO habitats (habitat_name, description_habitat) VALUES (:name, :desc)";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([':name' => $name, ':desc' => $description]);
            return $this->db->lastInsertId();
        } catch (PDOException $e) {
            error_log("Error creating habitat: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Update a habitat.
     * @param int $id
     * @param string $name
     * @param string $description
     * @return bool True on success.
     */
    public function update($id, $name, $description) {
        try {
            $sql = "UPDATE habitats SET habitat_name = :name, description_habitat = :desc WHERE id_habitat = :id";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([':name' => $name, ':desc' => $description, ':id' => $id]);
        } catch (PDOException $e) {
            error_log("Error updating habitat: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Delete a habitat.
     * @param int $id
     * @return bool
     */
    public function delete($id) {
        try {
            $stmt = $this->db->prepare("DELETE FROM habitats WHERE id_habitat = :id");
            return $stmt->execute([':id' => $id]);
        } catch (PDOException $e) {
            error_log("Error deleting habitat: " . $e->getMessage());
            return false;
        }
    }
}