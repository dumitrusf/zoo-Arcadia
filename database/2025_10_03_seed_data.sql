
-- 2. Insert ROLES first (no dependencies)
INSERT INTO roles (id_role, role_name, role_description) VALUES
  (1, 'Veterinary', 'Responsible for the care and health of zoo animals.'),
  (2, 'Employee', 'Responsible for cleaning, maintenance, public service, and animal nutrition.'),
  (3, 'Admin', 'System administrator with full access to the zoo management.'),
  (4, 'Accountant', 'Responsible for the zoo finances.');

-- 3. Insert EMPLOYEES (personal data)
INSERT INTO employees (id_employee, first_name, last_name, email, birthdate, phone, address, city, zip_code, country, gender, marital_status) VALUES
  (1, 'Maria-Marcela', 'Bandila', 'maria.bandila@arcadia.com', '1990-05-15', '0601020304', '123 Rue de la Savane', 'Paris', '75001', 'France', 'female', 'single'),
  (2, 'Dumitru', 'Stefan-Fernando', 'dumitru.stefan@arcadia.com', '1988-11-20', '0602030405', '45 Avenue des Lions', 'Lyon', '69002', 'France', 'male', 'married'),
  (3, 'Sophie', 'Martin', 'sophie.martin@arcadia.com', '1992-02-10', '0603040506', '78 Boulevard des Girafes', 'Marseille', '13008', 'France', 'female', 'single'),
  (4, 'Pierre', 'Dubois', 'pierre.dubois@arcadia.com', '1985-09-30', '0604050607', '91 Rue du Tigre', 'Lille', '59000', 'France', 'male', 'divorced'),
  (5, 'Emma', 'Bernard', 'emma.bernard@arcadia.com', '1995-07-22', '0605060708', '10 Allée des Pandas', 'Toulouse', '31000', 'France', 'female', 'married'),
  (6, 'Lucas', 'Moreau', 'lucas.moreau@arcadia.com', '1993-01-18', '0606070809', '23 Chemin des Singes', 'Bordeaux', '33000', 'France', 'male', 'single'),
  (7, 'Marie', 'Laurent', 'marie.laurent@arcadia.com', '1989-03-12', '0607080910', '47 Impasse des Zèbres', 'Nantes', '44000', 'France', 'female', 'widowed'),
  (8, 'Thomas', 'Garcia', 'thomas.garcia@arcadia.com', '1998-12-05', '0608091011', '65 Place des Perroquets', 'Strasbourg', '67000', 'France', 'male', 'single'),
  (9, 'Julien', 'Petit', 'julien.petit@arcadia.com', '1991-08-17', '0609101112', '89 Route des Crocodiles', 'Montpellier', '34000', 'France', 'male', 'married'),
  (10, 'Isabelle', 'Robert', 'isabelle.robert@arcadia.com', '1987-06-25', '0610111213', '11 Avenue des Éléphants', 'Nice', '06000', 'France', 'female', 'divorced'),
  (11, 'Lakaka', 'Abunda', 'fdab222hadf@gmail.com', '1990-03-23', '735475347354', '4735eruturet', 'Bubua', '675848', 'Angola', 'female', 'married'),
  -- Adding 20 more employees
  (12, 'Jean', 'Dupont', 'jean.dupont@arcadia.com', '1986-04-11', '0612131415', '1 Place de la République', 'Paris', '75003', 'France', 'male', 'married'),
  (13, 'Anne', 'Lefevre', 'anne.lefevre@arcadia.com', '1994-08-02', '0613141516', '2 Rue de la Paix', 'Lyon', '69001', 'France', 'female', 'single'),
  (14, 'Michel', 'Leroy', 'michel.leroy@arcadia.com', '1980-12-24', '0614151617', '3 Avenue du Prado', 'Marseille', '13006', 'France', 'male', 'divorced'),
  (15, 'Nathalie', 'Girard', 'nathalie.girard@arcadia.com', '1997-06-19', '0615161718', '4 Boulevard de la Liberté', 'Lille', '59000', 'France', 'female', 'single'),
  (16, 'David', 'Roux', 'david.roux@arcadia.com', '1983-10-05', '0616171819', '5 Quai des Chartrons', 'Bordeaux', '33000', 'France', 'male', 'married'),
  (17, 'Valérie', 'Fournier', 'valerie.fournier@arcadia.com', '1991-02-28', '0617181920', '6 Rue Crébillon', 'Nantes', '44000', 'France', 'female', 'single'),
  (18, 'Alain', 'Vincent', 'alain.vincent@arcadia.com', '1984-07-14', '0618192021', '7 Place Kléber', 'Strasbourg', '67000', 'France', 'male', 'married'),
  (19, 'Christine', 'Lambert', 'christine.lambert@arcadia.com', '1996-09-08', '0619202122', '8 Rue de la Loge', 'Montpellier', '34000', 'France', 'female', 'single'),
  (20, 'Gérard', 'Blanc', 'gerard.blanc@arcadia.com', '1982-05-21', '0620212223', '9 Promenade des Anglais', 'Nice', '06000', 'France', 'male', 'divorced'),
  (21, 'Sylvie', 'Henry', 'sylvie.henry@arcadia.com', '1999-01-30', '0621222324', '10 Rue Saint-Ferréol', 'Marseille', '13001', 'France', 'female', 'single'),
  (22, 'Christophe', 'Roussel', 'christophe.roussel@arcadia.com', '1981-11-11', '0622232425', '11 Rue Esquermoise', 'Lille', '59800', 'France', 'male', 'married'),
  (23, 'Hélène', 'Gauthier', 'helene.gauthier@arcadia.com', '1993-04-16', '0623242526', '12 Rue de la Fosse', 'Nantes', '44000', 'France', 'female', 'single'),
  (24, 'Frédéric', 'Chevalier', 'frederic.chevalier@arcadia.com', '1987-03-03', '0624252627', '13 Place Broglie', 'Strasbourg', '67000', 'France', 'male', 'married'),
  (25, 'Céline', 'Marchand', 'celine.marchand@arcadia.com', '1995-12-12', '0625262728', '14 Rue de l''Hôtel de Ville', 'Lyon', '69001', 'France', 'female', 'single'),
  (26, 'Olivier', 'Andre', 'olivier.andre@arcadia.com', '1989-08-20', '0626272829', '15 Rue de Rivoli', 'Paris', '75004', 'France', 'male', 'married'),
  (27, 'Sandrine', 'Simon', 'sandrine.simon@arcadia.com', '1992-07-07', '0627282930', '16 Cours Mirabeau', 'Aix-en-Provence', '13100', 'France', 'female', 'single'),
  (28, 'Guillaume', 'Mercier', 'guillaume.mercier@arcadia.com', '1985-06-01', '0628293031', '17 Place du Capitole', 'Toulouse', '31000', 'France', 'male', 'married'),
  (29, 'Stéphanie', 'Hubert', 'stephanie.hubert@arcadia.com', '1998-02-14', '0629303132', '18 Rue de la République', 'Lyon', '69002', 'France', 'female', 'single'),
  (30, 'Benoît', 'Aubert', 'benoit.aubert@arcadia.com', '1984-09-26', '0630313233', '19 Quai de la Tournelle', 'Paris', '75005', 'France', 'male', 'divorced'),
  (31, 'Laetitia', 'Caron', 'laetitia.caron@arcadia.com', '1990-11-09', '0631323334', '20 Rue du Faubourg Saint-Honoré', 'Paris', '75008', 'France', 'female', 'married');

-- 4. Insert USERS (credentials and links)
INSERT INTO users (id_user, username, psw, is_active, role_id, employee_id) VALUES 
  (1, 'mariab', 'mariab123', true, 2, NULL),
  (2, 'dumitrus', 'dumitrus123', true, 1, 2),  
  (3, 'sophiem', 'sophiem123', false, 3, 3),
  (4, 'pierred', 'pierred123', true, 3, NULL),
  (5, 'emmab', 'emmab123', true, 2, 5),  
  (6, 'lucasm', 'lucasm123', true, NULL, 6), 
  (7, 'mariel', 'mariel123', false, 3, 7),  
  (8, 'thomasg', 'thomasg123', false, 2, 8), 
  (9, 'julienp', 'julienp123', true, NULL, 9), 
  (10, 'isabeller', 'isabeller123', true, 3, 10),  
  (11, 'lakakaa', 'lakakaa123', false, 2, 11),  
  (12, 'jeand', 'jeand123', true, 2, 12),
  (13, 'annel', 'annel123', true, 2, 13),
  (14, 'michell', 'michell123', true, 2, 14),
  (15, 'nathalieg', 'nathalieg123', true, 2, 15),
  (16, 'davidr', 'davidr123', true, 2, 16),
  (17, 'valerief', 'valerief123', true, 2, 17),
  (18, 'alainv', 'alainv123', true, 2, 18),
  (19, 'christinel', 'christinel123', true, 2, 19),
  (20, 'gerardb', 'gerardb123', true, 2, 20),
  (21, 'sylvieh', 'sylvieh123', true, 2, 21),
  (22, 'christopher', 'christopher123', true, 2, 22),
  (23, 'heleneg', 'heleneg123', true, 2, 23),
  (24, 'fredericc', 'fredericc123', true, 2, 24),
  (25, 'celinem', 'celinem123', true, 1, 25), 
  (26, 'oliviera', 'oliviera123', true, 1, 26), 
  (27, 'sandrines', 'sandrines123', true, 3, 27), 
  (28, 'guillaumem', 'guillaumem123', true, 2, NULL),  
  (29, 'stephanieh', 'stephanieh123', false, 2, NULL), 
  (30, 'benoita', 'benoita123', false, 1, NULL), 
  (31, 'laetitiac', 'laetitiac123', true, NULL, NULL);


-- Este archivo llena la tabla `permissions` con el catálogo oficial de permisos.
-- ¡IMPORTANTE! Los 'permission_name' deben coincidir EXACTAMENTE con las constantes en PermissionList.php
INSERT INTO permissions (permission_name, permission_desc) VALUES
-- Permisos de Cuentas
('users-view', 'Allows viewing the list of users in the system.'),
('users-create', 'Allows creating new users.'),
('users-edit', 'Allows editing existing users.'),
('users-delete', 'Allows deleting users.'),
('roles-view', 'Allows viewing the list of roles in the system.'),
('roles-create', 'Allows creating new roles.'),
('roles-edit', 'Allows editing existing roles.'),
('roles-delete', 'Allows deleting roles.'),
-- Permisos de Gestión del Zoo
('services-create', 'Allows creating new services for the zoo.'),
('services-view', 'Allows viewing the list of services.'),
('services-edit', 'Allows editing existing services.'),
('services-delete', 'Allows deleting services.'),
('schedules-view', 'Allows viewing the list of schedules.'),
('schedules-edit', 'Allows editing existing schedules.'),
('habitats-view', 'Allows viewing the list of habitats.'),
('habitats-edit', 'Allows editing existing habitats.'),
-- Permisos de Animales
('animals-create', 'Allows creating new animals.'),
('animals-view', 'Allows viewing the list of animals.'),
('animals-edit', 'Allows editing existing animals.'),
('animals-delete', 'Allows deleting animals.'),
('animal_stats-view', 'Allows viewing the list of animal stats.'),
('animal_feeding-view', 'Allows viewing the list of animal feeding.'),
('animal_feeding-assign', 'Allows assigning and updating the food of an animal.'),
-- Permisos de Veterinario
('vet_reports-create', 'Allows creating new veterinary reports.'),
('vet_reports-view', 'Allows viewing the list of veterinary reports.'),
('vet_reports-edit', 'Allows editing existing veterinary reports.'),
('habitat_suggestions-create', 'Allows creating new habitat suggestions.'),
('habitat_suggestions-view', 'Allows viewing the list of habitat suggestions.'),
('habitat_suggestions-manage', 'Allows accepting or rejecting habitat suggestions.'),
('habitat_suggestions-delete', 'Allows deleting habitat suggestions.'),
-- Permisos de Interacción Pública
('testimonials-view', 'Allows viewing the list of testimonials.'),
('testimonials-validate', 'Allows validating or invalidating testimonials.'),
('testimonials-delete', 'Allows deleting testimonials.');



INSERT INTO roles_permissions (role_id, permission_id) VALUES (1, 1);


INSERT INTO `users_permissions` (`user_id`, `permission_id`) VALUES
(2, 2),
(2, 5),
(2, 8),
(16, 8);

-- 🆕 Insert default Schedules (Opening Hours) - DAYS OF WEEK
INSERT INTO opening (time_slot, opening_time, closing_time, status) VALUES
('Monday',    '08:00:00', '18:00:00', 'open'),
('Tuesday',   '08:00:00', '18:00:00', 'open'),
('Wednesday', '08:00:00', '18:00:00', 'open'),
('Thursday',  '08:00:00', '18:00:00', 'open'),
('Friday',    '08:00:00', '18:00:00', 'open'),
('Saturday',  '09:00:00', '20:00:00', 'open'),
('Sunday',    '10:00:00', '18:00:00', 'closed');

-- ============================================================
-- SEED DATA FOR SERVICES, HABITATS & FEATURED (With Real Cloudinary Images)
-- ============================================================

-- 1. Insert images into MEDIA table
INSERT INTO media (id_media, media_path, media_path_medium, media_path_large, media_type, description) VALUES 
-- Media for Heroes
(201, 'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764876163/DALL_E_2024-08-23_20.27.03_-_A_hyper-realistic_image_of_a_monkey_dressed_exactly_like_the_one_provided_wearing_a_tailored_butler_suit_complete_with_a_bow_tie_and_white_gloves._T_1_dbwrhq.webp', 'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764876398/DALL_E_2024-08-23_20.27.03_-_A_hyper-realistic_image_of_a_monkey_dressed_exactly_like_the_one_provided_wearing_a_tailored_butler_suit_complete_with_a_bow_tie_and_white_gloves._T_7_rtctpu.webp', 'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764876450/DALL_E_2024-08-23_20.27.03_-_A_hyper-realistic_image_of_a_monkey_dressed_exactly_like_the_one_provided_wearing_a_tailored_butler_suit_complete_with_a_bow_tie_and_white_gloves._T_8_pmcjcu.webp', 'image', 'CMS Hero Monkey Desktop'),
(204, 'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764877493/DALL_E_2024-08-24_13.04.18_-_A_hyper-realistic_image_showing_three_distinct_habitats_with_no_visible_vertical_dividing_lines._On_the_left_a_savanna_with_golden_grass_sparse_tree_1_ubumul.webp', 'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764876995/DALL_E_2024-08-24_13.04.18_-_A_hyper-realistic_image_showing_three_distinct_habitats_with_no_visible_vertical_dividing_lines._On_the_left_a_savanna_with_golden_grass_sparse_tree_2_jas09u.webp', 'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764876866/DALL_E_2024-08-24_13.04.18_-_A_hyper-realistic_image_showing_three_distinct_habitats_with_no_visible_vertical_dividing_lines._On_the_left_a_savanna_with_golden_grass_sparse_tree_2_pskxpd.webp', 'image', 'Habitats Hero Desktop'),
(200, 'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764873190/aa7e4c59-0439-4c32-9703-5ee460d1dd8f_1_iyw7yo.webp', 'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764873282/aa7e4c59-0439-4c32-9703-5ee460d1dd8f_2_g5y4ed.webp', 'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764872122/aa7e4c59-0439-4c32-9703-5ee460d1dd8f_3_qzx3wt.webp', 'image', 'Home Hero Background'),
(205, 'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764878015/DALL_E_2024-08-27_16.54.15_-_A_highly_detailed_and_realistic_image_featuring_a_cheetah_from_the_savannah_a_scarlet_ibis_from_the_swamp_and_a_chimpanzee_from_the_jungle_all_seam_2_ugfhbt.webp', 'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764877726/DALL_E_2024-08-27_16.54.15_-_A_highly_detailed_and_realistic_image_featuring_a_cheetah_from_the_savannah_a_scarlet_ibis_from_the_swamp_and_a_chimpanzee_from_the_jungle_all_seam_1_o4z04j.webp', 'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764877378/DALL_E_2024-08-27_16.54.15_-_A_highly_detailed_and_realistic_image_featuring_a_cheetah_from_the_savannah_a_scarlet_ibis_from_the_swamp_and_a_chimpanzee_from_the_jungle_all_seam_1_ibqrb7.webp', 'image', 'Animals Hero Background'),
(206, 'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764873838/5e6e4c9a-7e33-4dc0-ad86-783068dd38a8_1_gadwme.png', NULL, NULL, 'image', 'K-About BG'),
-- Media for Featured Cards (Homepage)
(100, 'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764872615/6607a878-b883-49b4-b760-012f655319e8_1_vx5rl5.webp', '', 'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764872541/1734796025420_3_s62gy0.webp', 'image', 'Services Man'),
(101, 'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764872680/DALL_E_2024-08-22_14.38.43_-_An_image_divided_into_three_vertical_sections_each_representing_a_different_natural_environment__a_savanna_a_swamp_and_a_jungle._The_savanna_sectio_1_rtadm7.webp', '', 'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764872824/DALL_E_2024-08-22_14.38.43_-_An_image_divided_into_three_vertical_sections_each_representing_a_different_natural_environment__a_savanna_a_swamp_and_a_jungle._The_savanna_sectio_2_hwsq3u.webp', 'image', 'Habitats Collage'),
(102, 'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764872943/DALL_E_2024-08-22_15.42.48_-_A_realistic_image_depicting_a_seamless_natural_environment_where_a_lion_a_crocodile_and_a_gorilla_coexist._The_lion_is_in_a_grassy_savanna-like_area_1_wmjlun.webp', '', 'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764872902/DALL_E_2024-08-22_15.42.48_-_A_realistic_image_depicting_a_seamless_natural_environment_where_a_lion_a_crocodile_and_a_gorilla_coexist._The_lion_is_in_a_grassy_savanna-like_area_1_y4gata.webp', 'image', 'Animals Collage'),
-- Media for Regular Services
(103, 'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764876157/_45bf66dc-f855-49f3-8c70-01c353e88270_1_caqe6l.webp', 'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764876404/_45bf66dc-f855-49f3-8c70-01c353e88270_2_hdhye1.webp', '', 'image', 'Restaurant'),
(104, 'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764876160/_5c9ef8df-08e3-4d3f-9d73-3f0e8c8c064d_1_r8yo7a.webp', 'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764876401/_5c9ef8df-08e3-4d3f-9d73-3f0e8c8c064d_1_pw7vnb.webp', '', 'image', 'Zoo Guide'),
(105, 'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764876165/DALL_E_2024-08-23_21.48.55_-_A_hyper-realistic_image_of_a_zoo_train_with_a_conductor_guiding_passengers_through_the_zoo._The_conductor_is_a_human_in_a_professional_uniform_and_th_1_q11b2p.webp', 'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764876165/DALL_E_2024-08-23_21.48.55_-_A_hyper-realistic_image_of_a_zoo_train_with_a_conductor_guiding_passengers_through_the_zoo._The_conductor_is_a_human_in_a_professional_uniform_and_th_1_wp2qdr.webp', '', 'image', 'Train'),
-- Media for Habitats Cards
(106, 'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764877055/DALL_E_2024-08-22_14.42.06_-_A_realistic_and_detailed_image_of_a_jungle_landscape._The_scene_features_dense_lush_green_foliage_with_tall_trees_thick_undergrowth_and_vines_hangi_1_otbziq.webp', 'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764876999/DALL_E_2024-08-22_14.42.06_-_A_realistic_and_detailed_image_of_a_jungle_landscape._The_scene_features_dense_lush_green_foliage_with_tall_trees_thick_undergrowth_and_vines_hangi_1_ff7mys.webp', '', 'image', 'Jungle'),
(107, 'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764877051/DALL_E_2024-08-22_14.40.51_-_A_realistic_and_detailed_image_of_a_savanna_landscape._The_scene_features_wide_open_grasslands_with_tall_dry_grasses_swaying_in_the_breeze._Scattere_2_ptpvtj.webp', 'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764876988/DALL_E_2024-08-22_14.40.51_-_A_realistic_and_detailed_image_of_a_savanna_landscape._The_scene_features_wide_open_grasslands_with_tall_dry_grasses_swaying_in_the_breeze._Scattere_1_xbm3xa.webp', '', 'image', 'Savannah'),
(108, 'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764877059/DALL_E_2024-08-22_14.41.22_-_A_realistic_and_detailed_image_of_a_swamp_landscape._The_scene_features_murky_waters_reflecting_the_surrounding_thick_vegetation_with_tall_moss-cove_1_ngyvkh.webp', 'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764876991/DALL_E_2024-08-22_14.41.22_-_A_realistic_and_detailed_image_of_a_swamp_landscape._The_scene_features_murky_waters_reflecting_the_surrounding_thick_vegetation_with_tall_moss-cove_1_esuv3x.webp', '', 'image', 'Swamp'),
(109, 'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764889109/protect-and-educate-animals_qi4awr.webp', 'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764889306/tab-protect-and-educate-animals_lrofgy.webp', 'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764889463/desk-protect-and-educate-animals_gre6ou.webp', 'image', 'About Carousel Slide 1'),
(110, 'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764889111/learning-education-all-time_cnzcgn.webp', 'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764889307/tab-learning-education-all-time_hf6vjg.webp', 'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764889463/desk-learning-education-all-time_cj7jls.webp', 'image', 'About Carousel Slide 2'),
(111, 'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764889109/caring-_-unique-esxperiences_tljdjn.webp', 'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764889307/tab-caring-_-unique-esxperiences_kr2bhp.webp', 'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764889462/desk-caring-_-unique-esxperiences_zgtlke.webp', 'image', 'About Carousel Slide 3');

-- 2. Insert SERVICES
INSERT INTO services (id_service, service_title, service_description, link, type) VALUES
-- Homepage Features
(100, 'SERVICES', 'SEE WHAT ARCADIA CAN OFFERS YOU', '/cms/pages/cms', 'featured'),
(101, 'HABITATS', 'AMAZING HABITATS TO DISCOVER', '/habitats/pages/habitats', 'featured'),
(102, 'ANIMALS', 'EXPLORE ANOTHER WAY OF LOVE', '/animals/pages/allanimals', 'featured'),
-- Regular Services
(103, 'Restaurant', 'Get a break', NULL, 'service'),
(104, 'Zoo Guide', 'Feel safe all time', NULL, 'service'),
(105, 'Train to Arcadia', 'A family adventure', NULL, 'service'),
-- Habitats
(106, 'JUNGLE', 'EMBRACE THE SURPRISES OF THE JUNGLE', '/habitats/pages/habitat1', 'habitat'),
(107, 'SAVANNAH', 'EXPERIENCE THE WILD MAJESTY OF THE SAVANNAH', '/habitats/pages/habitat1', 'habitat'),
(108, 'SWAMP', 'UNCOVER THE MYSTERIES OF THE SWAMP', '/habitats/pages/habitat1', 'habitat');

-- 3. Insert HEROES (NO CAROUSEL)
INSERT INTO heroes (id_hero, hero_title, hero_subtitle, page_name, has_sliders) VALUES
(1, 'ZOO ARCADIA', 'Where all animals love to live', 'home', 0),
(2, 'SERVICES', 'Our specialized services for you', 'services', 0),
(3, 'HABITATS', 'Discover our amazing worlds', 'habitats', 0),
(4, 'ANIMALS', 'Explore another way of love', 'animals', 0),
(5, 'ABOUT US', 'Our commitment to conservation and education', 'about', 1);

-- 4. Insert Bricks
INSERT INTO bricks (title, description, link, page_name) VALUES
('More About Us', 'In the heart of Bretagne, Arcadia Zoo is home to unique animals from the savannah, jungle, and wetlands.

Since 1960, we have ensured their well-being through daily veterinary care and tailored feeding.', '/about/pages/about', 'home'),
('who we are ?', 'Arcadia Zoo, located near the Brocéliande Forest in Brittany, France, has been a sanctuary for animals since 1960. Organized into diverse habitats such as the savannah, jungle, and wetlands, the zoo is committed to the well-being of its residents. Daily veterinary checks ensure the health of all animals before the zoo opens its doors to the public, and their meals are carefully portioned according to veterinarian reports.

With its thriving operation and happy animals, Arcadia Zoo is a source of pride for its director, José, who envisions even greater achievements for the zoo''s future. Through innovation and care, the zoo continues to be a place where visitors can connect with animals and nature.', NULL, 'about');

-- 5. Insert Slides for About Page
INSERT INTO slides (id_slide, hero_id, title_caption, description_caption) VALUES
(1, 5, 'Our team works day by day to protect and educate', 'Recognize the dedicated team that works every day to guarantee animals care and promote environmental education.'),
(2, 5, 'A natural space to learn and connect with animals', 'Discover a space where animals live in harmony, surrounded by green and serene landscapes, designed to learn and connect with nature.'),
(3, 5, 'Taking care of animals and offering unique experiences', "Explore a safe and friendly atmosphere where visitors and animals live together, reflecting the zoo's commitment to animal welfare and the joy of its visitors.");


-- 6. Link MEDIA to SERVICES and HEROES
INSERT INTO media_relations (media_id, related_table, related_id, usage_type) VALUES
-- Links for Services
(100, 'services', 100, 'main'),
(101, 'services', 101, 'main'),
(102, 'services', 102, 'main'),
(103, 'services', 103, 'main'),
(104, 'services', 104, 'main'),
(105, 'services', 105, 'main'),
(106, 'services', 106, 'main'),
(107, 'services', 107, 'main'),
(108, 'services', 108, 'main'),
-- Links for Heroes
(200, 'heroes', 1, 'main'), 
(201, 'heroes', 2, 'main'),
(204, 'heroes', 3, 'main'),
(205, 'heroes', 4, 'main'),
-- Links for Slides
(109, 'slides', 1, 'main'),
(110, 'slides', 2, 'main'),
(111, 'slides', 3, 'main'),
-- Link for Brick (Home More About Us)
(206, 'bricks', 1, 'main');

-- ============================================================
-- SEED DATA FOR HABITATS (Savannah, Jungle, Swamp)
-- ============================================================

-- 7. Insert HABITATS
INSERT INTO habitats (id_habitat, habitat_name, description_habitat) VALUES
(1, 'Savannah', 'Majesty in its rawest form'),
(2, 'Jungle', 'EMBRACE THE SURPRISES OF THE JUNGLE'),
(3, 'swamp', 'UNCOVER THE MYSTERIES OF THE SWAMP');

-- 8. Insert MEDIA for Habitats (Cards/Listings images)
INSERT INTO media (id_media, media_path, media_path_medium, media_path_large, media_type, description) VALUES
-- Savannah Habitat Card Images
(112, 'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766091147/arcadia_uploads/jyxp73wbq6ddownipvis.webp', 'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766091174/arcadia_uploads/jryclj1jkkpz2a39xsg5.webp', 'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766091253/arcadia_uploads/lddrokgktbokvo1tdypn.png', 'image', 'Savannah Habitat Card'),
-- Jungle Habitat Card Images
(113, 'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766092293/arcadia_uploads/bdxxfgxfxgoif1iwonud.webp', 'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766092373/arcadia_uploads/nflh6z7os8ptp2brc9is.webp', 'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766092573/arcadia_uploads/k9v8qp3etqdler2qdvqr.png', 'image', 'Jungle Habitat Card'),
-- Swamp Habitat Card Images
(114, 'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766094070/arcadia_uploads/o1w2dksoerzlkfksmkla.webp', 'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766094146/arcadia_uploads/visplj8egr0pqdxha9z8.webp', 'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766094190/arcadia_uploads/v15s7juxxahooaqgamco.png', 'image', 'Swamp Habitat Card'),
-- Savannah Hero Images
(115, 'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766090958/arcadia_uploads/rr8fohrnbkiwdekj2noa.webp', 'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766091027/arcadia_uploads/qminb0u2p9syksaka3ra.webp', 'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766091063/arcadia_uploads/tongriqblcx5sa6sasv1.webp', 'image', 'Savannah Hero Background'),
-- Jungle Hero Images
(116, 'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766093099/arcadia_uploads/drjznpcgiejwrtpjnjht.webp', 'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766093163/arcadia_uploads/nzwzdhlpoekku6b7fmym.webp', 'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766093194/arcadia_uploads/gydql4irp9h1qzxpq5p2.webp', 'image', 'Jungle Hero Background'),
-- Swamp Hero Images
(117, 'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766093761/arcadia_uploads/zoqvgbwcus9fhvkqia20.webp', 'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766093788/arcadia_uploads/xi9hjzrtieopg8a2eptu.webp', 'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766093891/arcadia_uploads/fizurykhv12kkzdn722v.webp', 'image', 'Swamp Hero Background');

-- 9. Insert HEROES for Habitats (with habitat_id)
INSERT INTO heroes (id_hero, hero_title, hero_subtitle, page_name, has_sliders, habitat_id) VALUES
(6, 'VELVET SOVEREIGNS', 'HEIRS OF A KINGDOM WITHOUT BORDERS', 'habitats', 0, 1),
(7, 'the silent Sylvans', 'emerald unseen\'s art', 'habitats', 0, 2),
(8, 'The bayou barons', 'A new pulse of a hidden world', 'habitats', 0, 3);

-- 10. Link MEDIA to HABITATS (for cards/listings)
INSERT INTO media_relations (media_id, related_table, related_id, usage_type) VALUES
(112, 'habitats', 1, 'main'),
(113, 'habitats', 2, 'main'),
(114, 'habitats', 3, 'main');

-- 11. Link MEDIA to HEROES (for habitat-specific heroes)
INSERT INTO media_relations (media_id, related_table, related_id, usage_type) VALUES
(115, 'heroes', 6, 'main'),
(116, 'heroes', 7, 'main'),
(117, 'heroes', 8, 'main');
