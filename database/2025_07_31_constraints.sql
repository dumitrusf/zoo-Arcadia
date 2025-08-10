-- 2025_01_19_constraints.sql
-- The creation of the main tables for zoo arcadia

-- Verify if there is already a foreign key before adding it
ALTER TABLE media_relations
DROP FOREIGN KEY IF EXISTS fk_media_in_media_relations;

ALTER TABLE media_relations
ADD CONSTRAINT fk_media_in_media_relations
FOREIGN KEY (media_id) REFERENCES media(id_media)
ON DELETE CASCADE
ON UPDATE CASCADE;
--
--

-- Verify if there is already the foreign key before adding it
ALTER TABLE media_responsive
DROP FOREIGN KEY IF EXISTS fk_media_in_media_responsive;

ALTER TABLE media_responsive
ADD CONSTRAINT fk_media_in_media_responsive
FOREIGN KEY (media_id) REFERENCES media(id_media)
ON DELETE CASCADE
ON UPDATE CASCADE;
--
--

-- Verify if there is already a foreign key before adding it
ALTER TABLE slides
DROP FOREIGN KEY IF EXISTS fk_header_in_slides;

ALTER TABLE slides
ADD CONSTRAINT fk_header_in_slides
FOREIGN KEY (id_header) REFERENCES headers(id_header)
ON DELETE CASCADE
ON UPDATE CASCADE;
--
--

-- Verify if there is already a foreign key before adding it
ALTER TABLE roles_permissions
DROP FOREIGN KEY IF EXISTS fk_roles_in_roles_permissions;

-- Relationship: roles_permissions.role_id -> roles.id_role
ALTER TABLE roles_permissions
ADD CONSTRAINT fk_roles_in_roles_permissions
FOREIGN KEY (role_id) REFERENCES roles(id_role)
ON DELETE CASCADE
ON UPDATE CASCADE;
--
--

-- Verify if there is already a foreign key before adding it
ALTER TABLE roles_permissions
DROP FOREIGN KEY IF EXISTS fk_permissions_in_roles_permissions;

-- Relationship: roles_permissions.permission_id -> permissions.id_permission
ALTER TABLE roles_permissions
ADD CONSTRAINT fk_permissions_in_roles_permissions
FOREIGN KEY (permission_id) REFERENCES permissions(id_permission)
ON DELETE CASCADE
ON UPDATE CASCADE;
--
--

-- Verify if there is already a foreign key before adding it
ALTER TABLE user_permissions
DROP FOREIGN KEY IF EXISTS fk_users_in_user_permissions;

-- Relationship: user_permissions.user_id -> users.id_user
ALTER TABLE user_permissions
ADD CONSTRAINT fk_users_in_user_permissions
FOREIGN KEY (user_id) REFERENCES users(id_user)
ON DELETE CASCADE
ON UPDATE CASCADE;
--
--

-- Verify if there is already a foreign key before adding it
ALTER TABLE user_permissions
DROP FOREIGN KEY IF EXISTS fk_permission_in_user_permissions;

ALTER TABLE user_permissions
ADD CONSTRAINT fk_permission_in_user_permissions
FOREIGN KEY (permission_id) REFERENCES permissions(id_permission)
ON DELETE CASCADE
ON UPDATE CASCADE;
--
--

-- Verify if there is already a foreign key before adding it
ALTER TABLE users
DROP FOREIGN KEY IF EXISTS fk_role_in_users;

-- Relationship: users.role_id -> roles.id_role
ALTER TABLE users
ADD CONSTRAINT fk_role_in_users
FOREIGN KEY (role_id) REFERENCES roles(id_role)
ON DELETE SET NULL
ON UPDATE CASCADE;
--
--

-- Verify if there is already a foreign key before adding it
ALTER TABLE testimonials 
DROP FOREIGN KEY IF EXISTS fk_users_in_testimonials;

-- Relationship: testimonials.validated_by -> users.id_user
ALTER TABLE testimonials 
ADD CONSTRAINT fk_users_in_testimonials 
FOREIGN KEY (validated_by) REFERENCES users(id_user) 
ON DELETE SET NULL         -- Si se elimina el usuario, se pone validated_by en NULL.
ON UPDATE CASCADE;         -- Si cambia el id_user, se actualiza automáticamente.
--
--

-- Verify if there is already a foreign key before adding it
ALTER TABLE psw_reset_token 
DROP FOREIGN KEY IF EXISTS fk_user_in_psw_reset_token;

-- Relationship: psw_reset_token.user_id -> users.id_user
ALTER TABLE psw_reset_token 
ADD CONSTRAINT fk_user_in_psw_reset_token 
FOREIGN KEY (user_id) REFERENCES users(id_user) 
ON DELETE CASCADE         -- Si se elimina un usuario, se eliminan automáticamente sus tokens.
ON UPDATE CASCADE;        -- Si cambia el id_user, se actualiza automáticamente en psw_reset_token.
--
--

-- Verify if there is already the foreign key before adding it
ALTER TABLE habitat_suggestion
DROP FOREIGN KEY IF EXISTS fk_vet_in_habitat_suggestion;

-- Relationship: habitat_suggestion.suggested_by -> users.id_user
ALTER TABLE habitat_suggestion
ADD CONSTRAINT fk_vet_in_habitat_suggestion
FOREIGN KEY (suggested_by) REFERENCES users(id_user)
ON DELETE SET NULL
ON UPDATE CASCADE;
--
--

-- Verify if there is already the foreign key before adding it
ALTER TABLE habitat_suggestion
DROP FOREIGN KEY IF EXISTS fk_admin_in_habitat_suggestion;

-- Relationship: habitat_suggestion.reviewed_by -> users.id_user
ALTER TABLE habitat_suggestion
ADD CONSTRAINT fk_admin_in_habitat_suggestion
FOREIGN KEY (reviewed_by) REFERENCES users(id_user)
ON DELETE SET NULL
ON UPDATE CASCADE;
--
--


-- Verify if there is already the foreign key before adding it
ALTER TABLE habitat_suggestion
DROP FOREIGN KEY IF EXISTS fk_habitat_in_habitat_suggestion;

-- Relationship: habitat_suggestion.habitat_id -> habitats.id_habitat
ALTER TABLE habitat_suggestion
ADD CONSTRAINT fk_habitat_in_habitat_suggestion
FOREIGN KEY (habitat_id) REFERENCES habitats(id_habitat)
ON DELETE CASCADE
ON UPDATE CASCADE;
--
--


-- Verify if there is already the foreign key before adding it
ALTER TABLE breed
DROP FOREIGN KEY IF EXISTS fk_specie_in_breed;

-- Relationship: breed.specie_id -> specie.id_specie
ALTER TABLE breed
ADD CONSTRAINT fk_specie_in_breed
FOREIGN KEY (specie_id) REFERENCES specie(id_specie)
ON DELETE CASCADE    -- Si se elimina una especie, también se eliminan las razas asociadas.
ON UPDATE CASCADE;   -- Si cambia el id_specie, se actualiza automáticamente en breed.
--
--


-- Verify if there is already the foreign key before adding it
ALTER TABLE animal_general
DROP FOREIGN KEY IF EXISTS fk_breed_in_animal_general;

-- Relationship: animal_general.breed_id -> breed.id_breed
ALTER TABLE animal_general
ADD CONSTRAINT fk_breed_in_animal_general
FOREIGN KEY (breed_id) REFERENCES breed(id_breed)
ON DELETE RESTRICT   -- No permite eliminar una raza si tiene animales asociados.
ON UPDATE CASCADE;   -- Si cambia el id_breed, el cambio se propaga automáticamente a animal_general.
--
--


-- Verify if there is already the foreign key before adding it
ALTER TABLE animal_clicks
DROP FOREIGN KEY IF EXISTS fk_animal_g_in_click;

-- Relationship: animal_click.id_animal_g -> animal_general.id_animal_g
ALTER TABLE animal_clicks
ADD CONSTRAINT fk_animal_g_in_click
FOREIGN KEY (animal_g_id) REFERENCES animal_general(id_animal_g)
ON DELETE CASCADE    -- Si se elimina un animal, también se eliminan sus estadísticas de clics.
ON UPDATE CASCADE;   -- Si cambia el id_animal_g, el cambio se propaga automáticamente.
--
--


-- Verify if there is already the foreign key before adding it
ALTER TABLE service_logs
DROP FOREIGN KEY IF EXISTS fk_service_in_service_logs;

-- Relationship: service_logs.id_service -> services.id_service
ALTER TABLE service_logs
ADD CONSTRAINT fk_service_in_service_logs
FOREIGN KEY (service_id) REFERENCES services(id_service)
ON DELETE CASCADE
ON UPDATE CASCADE;
--
--


-- Verify if there is already the foreign key before adding it
ALTER TABLE service_logs
DROP FOREIGN KEY IF EXISTS fk_user_in_service_logs;

-- Relationship: service_logs.changed_by -> users.id_user
ALTER TABLE service_logs
ADD CONSTRAINT fk_user_in_service_logs
FOREIGN KEY (changed_by) REFERENCES users(id_user)
ON DELETE CASCADE
ON UPDATE CASCADE;
--
--


-- Verify if there is already the foreign key before adding it
ALTER TABLE animal_full
DROP FOREIGN KEY IF EXISTS fk_animal_g_in_animal_full;

-- Relationship: animal_full.animal_g_id -> animal_general.id_animal_g
ALTER TABLE animal_full
ADD CONSTRAINT fk_animal_g_in_animal_full
FOREIGN KEY (animal_g_id) REFERENCES animal_general(id_animal_g)
ON DELETE CASCADE
ON UPDATE CASCADE;
--
--


-- Verify if there is already the foreign key before adding it
ALTER TABLE animal_full
DROP FOREIGN KEY IF EXISTS fk_habitat_in_animal_full;

-- Relationship: animal_full.habitat_id -> habitats.id_habitat
ALTER TABLE animal_full
ADD CONSTRAINT fk_habitat_in_animal_full
FOREIGN KEY (habitat_id) REFERENCES habitats(id_habitat)
ON DELETE SET NULL
ON UPDATE CASCADE;
--
--


-- Verify if there is already the foreign key before adding it
ALTER TABLE health_state_report
DROP FOREIGN KEY IF EXISTS fk_full_animal_in_health_report;

-- Relationship: health_state_report.full_animal_id -> animal_full.id_full_animal
ALTER TABLE health_state_report
ADD CONSTRAINT fk_full_animal_in_health_report
FOREIGN KEY (full_animal_id) REFERENCES animal_full(id_full_animal)
ON DELETE CASCADE
ON UPDATE CASCADE;
--
--


-- Verify if there is already the foreign key before adding it
ALTER TABLE health_state_report
DROP FOREIGN KEY IF EXISTS fk_users_in_health_report;

-- Relationship: health_state_report.checked_by -> users.id_user
ALTER TABLE health_state_report
ADD CONSTRAINT fk_users_in_health_report
FOREIGN KEY (checked_by) REFERENCES users(id_user)
ON DELETE SET NULL
ON UPDATE CASCADE;
--
--


-- Verify if there is already the foreign key before adding it
ALTER TABLE feeding_logs
DROP FOREIGN KEY IF EXISTS fk_full_animal_in_feeding_logs;

-- Relationship: feeding_logs.animal_f_id -> animal_full.id_full_animal
ALTER TABLE feeding_logs
ADD CONSTRAINT fk_full_animal_in_feeding_logs
FOREIGN KEY (animal_f_id) REFERENCES animal_full(id_full_animal)
ON DELETE CASCADE
ON UPDATE CASCADE;
--
--


-- Verify if there is already a foreign key before adding it
ALTER TABLE feeding_logs
DROP FOREIGN KEY IF EXISTS fk_nutrition_in_feeding_logs;

-- Relationship: feeding_logs.nutrition_id -> nutrition.id_nutrition
ALTER TABLE feeding_logs
ADD CONSTRAINT fk_nutrition_in_feeding_logs
FOREIGN KEY (nutrition_id) REFERENCES nutrition(id_nutrition)
ON DELETE RESTRICT
ON UPDATE CASCADE;
--
--


-- Verify if there is already the foreign key before adding it
ALTER TABLE feeding_logs
DROP FOREIGN KEY IF EXISTS fk_users_in_feeding_logs;

-- Relationship: feeding_logs.user_id -> users.id_user
ALTER TABLE feeding_logs
ADD CONSTRAINT fk_users_in_feeding_logs
FOREIGN KEY (user_id) REFERENCES users(id_user)
ON DELETE SET NULL
ON UPDATE CASCADE;
