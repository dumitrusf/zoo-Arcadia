<?php
/**
 * 🏛️ ARCHITECTURE ARCADIA (Simulated Namespace)
 * ----------------------------------------------------
 * 📍 Logical Path: Arcadia\Medias\Models
 * 📂 Physical File:   App/medias/models/Media.php
 * 
 * 📝 Description:
 * Model for interacting with the 'media' database table.
 * Handles CRUD operations for media records.
 */

require_once __DIR__ . '/../../../database/connection.php';

class Media {
    private $db;

    public function __construct() {
        $this->db = DB::createInstance();
    }

    /**
     * Insert a new media record into the database.
     * @param string $url The main URL of the media (from Cloudinary).
     * @param string $type 'image', 'video', or 'audio'.
     * @param string|null $description Optional description.
     * @return int|false The ID of the inserted media record or false on failure.
     */
    public function create($url, $type = 'image', $description = null) {
        try {
            // Note: media_path_medium and media_path_large are optional/unused for now
            // as we handle resizing via Cloudinary URL parameters.
            $sql = "INSERT INTO media (media_path, media_type, description) VALUES (:url, :type, :desc)";
            
            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                ':url'  => $url,
                ':type' => $type,
                ':desc' => $description
            ]);
            
            return $this->db->lastInsertId();
        } catch (PDOException $e) {
            error_log("Database Media Insert Error: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Link a media record to another entity via media_relations table.
     * 
     * @param int $mediaId The ID of the media record.
     * @param string $tableName The name of the related table (e.g., 'animals').
     * @param int $relatedId The ID of the record in the related table.
     * @param string $usageType Optional usage type (e.g., 'main', 'thumbnail').
     * @return bool True on success.
     */
    public function link($mediaId, $tableName, $relatedId, $usageType = 'main') {
        try {
            $sql = "INSERT INTO media_relations (media_id, related_table, related_id, usage_type) 
                    VALUES (:media_id, :table_name, :related_id, :usage_type)";
            
            $stmt = $this->db->prepare($sql);
            
            return $stmt->execute([
                ':media_id'   => $mediaId,
                ':table_name' => $tableName,
                ':related_id' => $relatedId,
                ':usage_type' => $usageType
            ]);
        } catch (PDOException $e) {
            error_log("Media Relation Error: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Get media by ID.
     */
    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM media WHERE id_media = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Delete media record by ID.
     */
    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM media WHERE id_media = :id");
        return $stmt->execute([':id' => $id]);
    }

    /**
     * Unlink a media record from an entity by deleting the relationship.
     * @param string $tableName The name of the related table (e.g., 'services').
     * @param int $relatedId The ID of the record in the related table.
     * @return bool True on success.
     */
    public function unlink($tableName, $relatedId) {
        try {
            $sql = "DELETE FROM media_relations 
                    WHERE related_table = :table_name AND related_id = :related_id";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([
                ':table_name' => $tableName,
                ':related_id' => $relatedId
            ]);
        } catch (PDOException $e) {
            error_log("Media Unlink Error: " . $e->getMessage());
            return false;
        }
    }
}
