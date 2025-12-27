-- 2. Insert ROLES first (no dependencies)
INSERT INTO
       roles (id_role, role_name, role_description)
VALUES
       (
              1,
              'Veterinary',
              'Responsible for the care and health of zoo animals.'
       ),
       (
              2,
              'Employee',
              'Responsible for cleaning, maintenance, public service, and animal nutrition.'
       ),
       (
              3,
              'Admin',
              'System administrator with full access to the zoo management.'
       ),
       (
              4,
              'Accountant',
              'Responsible for the zoo finances.'
       ),
       (
              5,
              'NO ROLE',
              'nothing'
       );

-- 3. Insert EMPLOYEES (personal data)
INSERT INTO
       employees (
              id_employee,
              first_name,
              last_name,
              email,
              birthdate,
              phone,
              address,
              city,
              zip_code,
              country,
              gender,
              marital_status
       )
VALUES
       (
              1,
              'Maria-Marcela',
              'Bandila',
              'maria.bandila@arcadia.com',
              '1990-05-15',
              '0601020304',
              '123 Rue de la Savane',
              'Paris',
              '75001',
              'France',
              'female',
              'single'
       ),
       (
              2,
              'Dumitru',
              'Stefan-Fernando',
              'dumitru.stefan@arcadia.com',
              '1988-11-20',
              '0602030405',
              '45 Avenue des Lions',
              'Lyon',
              '69002',
              'France',
              'male',
              'married'
       ),
       (
              3,
              'Sophie',
              'Martin',
              'sophie.martin@arcadia.com',
              '1992-02-10',
              '0603040506',
              '78 Boulevard des Girafes',
              'Marseille',
              '13008',
              'France',
              'female',
              'single'
       ),
       (
              4,
              'Pierre',
              'Dubois',
              'pierre.dubois@arcadia.com',
              '1985-09-30',
              '0604050607',
              '91 Rue du Tigre',
              'Lille',
              '59000',
              'France',
              'male',
              'divorced'
       ),
       (
              5,
              'Emma',
              'Bernard',
              'emma.bernard@arcadia.com',
              '1995-07-22',
              '0605060708',
              '10 Allée des Pandas',
              'Toulouse',
              '31000',
              'France',
              'female',
              'married'
       ),
       (
              6,
              'Lucas',
              'Moreau',
              'lucas.moreau@arcadia.com',
              '1993-01-18',
              '0606070809',
              '23 Chemin des Singes',
              'Bordeaux',
              '33000',
              'France',
              'male',
              'single'
       ),
       (
              7,
              'Marie',
              'Laurent',
              'marie.laurent@arcadia.com',
              '1989-03-12',
              '0607080910',
              '47 Impasse des Zèbres',
              'Nantes',
              '44000',
              'France',
              'female',
              'widowed'
       ),
       (
              8,
              'Thomas',
              'Garcia',
              'thomas.garcia@arcadia.com',
              '1998-12-05',
              '0608091011',
              '65 Place des Perroquets',
              'Strasbourg',
              '67000',
              'France',
              'male',
              'single'
       ),
       (
              9,
              'Julien',
              'Petit',
              'julien.petit@arcadia.com',
              '1991-08-17',
              '0609101112',
              '89 Route des Crocodiles',
              'Montpellier',
              '34000',
              'France',
              'male',
              'married'
       ),
       (
              10,
              'Isabelle',
              'Robert',
              'isabelle.robert@arcadia.com',
              '1987-06-25',
              '0610111213',
              '11 Avenue des Éléphants',
              'Nice',
              '06000',
              'France',
              'female',
              'divorced'
       ),
       (
              11,
              'Lakaka',
              'Abunda',
              'fdab222hadf@gmail.com',
              '1990-03-23',
              '735475347354',
              '4735eruturet',
              'Bubua',
              '675848',
              'Angola',
              'female',
              'married'
       ),
       -- Adding 20 more employees
       (
              12,
              'Jean',
              'Dupont',
              'jean.dupont@arcadia.com',
              '1986-04-11',
              '0612131415',
              '1 Place de la République',
              'Paris',
              '75003',
              'France',
              'male',
              'married'
       ),
       (
              13,
              'Anne',
              'Lefevre',
              'anne.lefevre@arcadia.com',
              '1994-08-02',
              '0613141516',
              '2 Rue de la Paix',
              'Lyon',
              '69001',
              'France',
              'female',
              'single'
       ),
       (
              14,
              'Michel',
              'Leroy',
              'michel.leroy@arcadia.com',
              '1980-12-24',
              '0614151617',
              '3 Avenue du Prado',
              'Marseille',
              '13006',
              'France',
              'male',
              'divorced'
       ),
       (
              15,
              'Nathalie',
              'Girard',
              'nathalie.girard@arcadia.com',
              '1997-06-19',
              '0615161718',
              '4 Boulevard de la Liberté',
              'Lille',
              '59000',
              'France',
              'female',
              'single'
       ),
       (
              16,
              'David',
              'Roux',
              'david.roux@arcadia.com',
              '1983-10-05',
              '0616171819',
              '5 Quai des Chartrons',
              'Bordeaux',
              '33000',
              'France',
              'male',
              'married'
       ),
       (
              17,
              'Valérie',
              'Fournier',
              'valerie.fournier@arcadia.com',
              '1991-02-28',
              '0617181920',
              '6 Rue Crébillon',
              'Nantes',
              '44000',
              'France',
              'female',
              'single'
       ),
       (
              18,
              'Alain',
              'Vincent',
              'alain.vincent@arcadia.com',
              '1984-07-14',
              '0618192021',
              '7 Place Kléber',
              'Strasbourg',
              '67000',
              'France',
              'male',
              'married'
       ),
       (
              19,
              'Christine',
              'Lambert',
              'christine.lambert@arcadia.com',
              '1996-09-08',
              '0619202122',
              '8 Rue de la Loge',
              'Montpellier',
              '34000',
              'France',
              'female',
              'single'
       ),
       (
              20,
              'Gérard',
              'Blanc',
              'gerard.blanc@arcadia.com',
              '1982-05-21',
              '0620212223',
              '9 Promenade des Anglais',
              'Nice',
              '06000',
              'France',
              'male',
              'divorced'
       ),
       (
              21,
              'Sylvie',
              'Henry',
              'sylvie.henry@arcadia.com',
              '1999-01-30',
              '0621222324',
              '10 Rue Saint-Ferréol',
              'Marseille',
              '13001',
              'France',
              'female',
              'single'
       ),
       (
              22,
              'Christophe',
              'Roussel',
              'christophe.roussel@arcadia.com',
              '1981-11-11',
              '0622232425',
              '11 Rue Esquermoise',
              'Lille',
              '59800',
              'France',
              'male',
              'married'
       ),
       (
              23,
              'Hélène',
              'Gauthier',
              'helene.gauthier@arcadia.com',
              '1993-04-16',
              '0623242526',
              '12 Rue de la Fosse',
              'Nantes',
              '44000',
              'France',
              'female',
              'single'
       ),
       (
              24,
              'Frédéric',
              'Chevalier',
              'frederic.chevalier@arcadia.com',
              '1987-03-03',
              '0624252627',
              '13 Place Broglie',
              'Strasbourg',
              '67000',
              'France',
              'male',
              'married'
       ),
       (
              25,
              'Céline',
              'Marchand',
              'celine.marchand@arcadia.com',
              '1995-12-12',
              '0625262728',
              '14 Rue de l''Hôtel de Ville',
              'Lyon',
              '69001',
              'France',
              'female',
              'single'
       ),
       (
              26,
              'Olivier',
              'Andre',
              'olivier.andre@arcadia.com',
              '1989-08-20',
              '0626272829',
              '15 Rue de Rivoli',
              'Paris',
              '75004',
              'France',
              'male',
              'married'
       ),
       (
              27,
              'Sandrine',
              'Simon',
              'sandrine.simon@arcadia.com',
              '1992-07-07',
              '0627282930',
              '16 Cours Mirabeau',
              'Aix-en-Provence',
              '13100',
              'France',
              'female',
              'single'
       ),
       (
              28,
              'Guillaume',
              'Mercier',
              'guillaume.mercier@arcadia.com',
              '1985-06-01',
              '0628293031',
              '17 Place du Capitole',
              'Toulouse',
              '31000',
              'France',
              'male',
              'married'
       ),
       (
              29,
              'Stéphanie',
              'Hubert',
              'stephanie.hubert@arcadia.com',
              '1998-02-14',
              '0629303132',
              '18 Rue de la République',
              'Lyon',
              '69002',
              'France',
              'female',
              'single'
       ),
       (
              30,
              'Benoît',
              'Aubert',
              'benoit.aubert@arcadia.com',
              '1984-09-26',
              '0630313233',
              '19 Quai de la Tournelle',
              'Paris',
              '75005',
              'France',
              'male',
              'divorced'
       ),
       (
              31,
              'Laetitia',
              'Caron',
              'laetitia.caron@arcadia.com',
              '1990-11-09',
              '0631323334',
              '20 Rue du Faubourg Saint-Honoré',
              'Paris',
              '75008',
              'France',
              'female',
              'married'
       );

-- 4. Insert USERS (credentials and links)
INSERT INTO
       users (
              id_user,
              username,
              psw,
              is_active,
              role_id,
              employee_id
       )
VALUES
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
       (
              29,
              'stephanieh',
              'stephanieh123',
              false,
              2,
              NULL
       ),
       (30, 'benoita', 'benoita123', false, 1, NULL),
       (
              31,
              'laetitiac',
              'laetitiac123',
              true,
              NULL,
              NULL
       ),
       (
              32,
              'axel',
              '12345',
              true,
              5,
              NULL
       );

-- Este archivo llena la tabla `permissions` con el catálogo oficial de permisos.
-- ¡IMPORTANTE! Los 'permission_name' deben coincidir EXACTAMENTE con las constantes en PermissionList.php
INSERT INTO
       permissions (permission_name, permission_desc)
VALUES
       -- Permisos de Cuentas
       (
              'users-view',
              'Allows viewing the list of users in the system.'
       ),
       ('users-create', 'Allows creating new users.'),
       ('users-edit', 'Allows editing existing users.'),
       ('users-delete', 'Allows deleting users.'),
       (
              'roles-view',
              'Allows viewing the list of roles in the system.'
       ),
       ('roles-create', 'Allows creating new roles.'),
       ('roles-edit', 'Allows editing existing roles.'),
       ('roles-delete', 'Allows deleting roles.'),
       -- Permisos de Gestión del Zoo
       (
              'services-create',
              'Allows creating new services for the zoo.'
       ),
       (
              'services-view',
              'Allows viewing the list of services.'
       ),
       (
              'services-edit',
              'Allows editing existing services.'
       ),
       ('services-delete', 'Allows deleting services.'),
       (
              'schedules-view',
              'Allows viewing the list of schedules.'
       ),
       (
              'schedules-edit',
              'Allows editing existing schedules.'
       ),
       (
              'habitats-view',
              'Allows viewing the list of habitats.'
       ),
       (
              'habitats-create',
              'Allows creating new habitats.'
       ),
       (
              'habitats-edit',
              'Allows editing existing habitats.'
       ),
       (
              'habitats-delete',
              'Allows deleting habitats.'
       ),
       -- Permisos de Animales
       ('animals-create', 'Allows creating new animals.'),
       (
              'animals-view',
              'Allows viewing the list of animals.'
       ),
       (
              'animals-edit',
              'Allows editing existing animals.'
       ),
       ('animals-delete', 'Allows deleting animals.'),
       (
              'animal_stats-view',
              'Allows viewing the list of animal stats.'
       ),
       (
              'animal_feeding-view',
              'Allows viewing the list of animal feeding.'
       ),
       (
              'animal_feeding-assign',
              'Allows assigning and updating the food of an animal.'
       ),
       -- Permisos de Veterinario
       (
              'vet_reports-create',
              'Allows creating new veterinary reports.'
       ),
       (
              'vet_reports-view',
              'Allows viewing the list of veterinary reports.'
       ),
       (
              'vet_reports-edit',
              'Allows editing existing veterinary reports.'
       ),
       (
              'habitat_suggestions-create',
              'Allows creating new habitat suggestions.'
       ),
       (
              'habitat_suggestions-view',
              'Allows viewing the list of habitat suggestions.'
       ),
       (
              'habitat_suggestions-manage',
              'Allows accepting or rejecting habitat suggestions.'
       ),
       (
              'habitat_suggestions-delete',
              'Allows deleting habitat suggestions.'
       ),
       -- Permisos de Interacción Pública
       (
              'testimonials-view',
              'Allows viewing the list of testimonials.'
       ),
       (
              'testimonials-validate',
              'Allows validating or invalidating testimonials.'
       ),
       (
              'testimonials-delete',
              'Allows deleting testimonials.'
       );

INSERT INTO
       roles_permissions (role_id, permission_id)
VALUES
       (1, 1);

INSERT INTO
       `users_permissions` (`user_id`, `permission_id`)
VALUES
       (2, 2),
       (2, 5),
       (2, 8),
       (16, 8);

-- 🆕 Insert default Schedules (Opening Hours) - DAYS OF WEEK
INSERT INTO
       opening (time_slot, opening_time, closing_time, status)
VALUES
       ('Monday', '08:00:00', '18:00:00', 'open'),
       ('Tuesday', '08:00:00', '18:00:00', 'open'),
       ('Wednesday', '08:00:00', '18:00:00', 'open'),
       ('Thursday', '08:00:00', '18:00:00', 'open'),
       ('Friday', '08:00:00', '18:00:00', 'open'),
       ('Saturday', '09:00:00', '20:00:00', 'open'),
       ('Sunday', '10:00:00', '18:00:00', 'closed');

-- ============================================================
-- SEED DATA FOR SERVICES, HABITATS & FEATURED (With Real Cloudinary Images)
-- ============================================================
-- 1. Insert images into MEDIA table
INSERT INTO
       media (
              id_media,
              media_path,
              media_path_medium,
              media_path_large,
              media_type,
              description
       )
VALUES
       -- Media for Heroes
       (
              201,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764876163/DALL_E_2024-08-23_20.27.03_-_A_hyper-realistic_image_of_a_monkey_dressed_exactly_like_the_one_provided_wearing_a_tailored_butler_suit_complete_with_a_bow_tie_and_white_gloves._T_1_dbwrhq.webp',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764876398/DALL_E_2024-08-23_20.27.03_-_A_hyper-realistic_image_of_a_monkey_dressed_exactly_like_the_one_provided_wearing_a_tailored_butler_suit_complete_with_a_bow_tie_and_white_gloves._T_7_rtctpu.webp',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764876450/DALL_E_2024-08-23_20.27.03_-_A_hyper-realistic_image_of_a_monkey_dressed_exactly_like_the_one_provided_wearing_a_tailored_butler_suit_complete_with_a_bow_tie_and_white_gloves._T_8_pmcjcu.webp',
              'image',
              'CMS Hero Monkey Desktop'
       ),
       (
              204,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764877493/DALL_E_2024-08-24_13.04.18_-_A_hyper-realistic_image_showing_three_distinct_habitats_with_no_visible_vertical_dividing_lines._On_the_left_a_savanna_with_golden_grass_sparse_tree_1_ubumul.webp',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764876995/DALL_E_2024-08-24_13.04.18_-_A_hyper-realistic_image_showing_three_distinct_habitats_with_no_visible_vertical_dividing_lines._On_the_left_a_savanna_with_golden_grass_sparse_tree_2_jas09u.webp',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764876866/DALL_E_2024-08-24_13.04.18_-_A_hyper-realistic_image_showing_three_distinct_habitats_with_no_visible_vertical_dividing_lines._On_the_left_a_savanna_with_golden_grass_sparse_tree_2_pskxpd.webp',
              'image',
              'Habitats Hero Desktop'
       ),
       (
              200,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764873190/aa7e4c59-0439-4c32-9703-5ee460d1dd8f_1_iyw7yo.webp',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764873282/aa7e4c59-0439-4c32-9703-5ee460d1dd8f_2_g5y4ed.webp',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764872122/aa7e4c59-0439-4c32-9703-5ee460d1dd8f_3_qzx3wt.webp',
              'image',
              'Home Hero Background'
       ),
       (
              205,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764878015/DALL_E_2024-08-27_16.54.15_-_A_highly_detailed_and_realistic_image_featuring_a_cheetah_from_the_savannah_a_scarlet_ibis_from_the_swamp_and_a_chimpanzee_from_the_jungle_all_seam_2_ugfhbt.webp',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764877726/DALL_E_2024-08-27_16.54.15_-_A_highly_detailed_and_realistic_image_featuring_a_cheetah_from_the_savannah_a_scarlet_ibis_from_the_swamp_and_a_chimpanzee_from_the_jungle_all_seam_1_o4z04j.webp',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764877378/DALL_E_2024-08-27_16.54.15_-_A_highly_detailed_and_realistic_image_featuring_a_cheetah_from_the_savannah_a_scarlet_ibis_from_the_swamp_and_a_chimpanzee_from_the_jungle_all_seam_1_ibqrb7.webp',
              'image',
              'Animals Hero Background'
       ),
       (
              206,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764873838/5e6e4c9a-7e33-4dc0-ad86-783068dd38a8_1_gadwme.png',
              NULL,
              NULL,
              'image',
              'K-About BG'
       ),
       -- Media for Featured Cards (Homepage)
       (
              100,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764872615/6607a878-b883-49b4-b760-012f655319e8_1_vx5rl5.webp',
              '',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764872541/1734796025420_3_s62gy0.webp',
              'image',
              'Services Man'
       ),
       (
              101,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764872680/DALL_E_2024-08-22_14.38.43_-_An_image_divided_into_three_vertical_sections_each_representing_a_different_natural_environment__a_savanna_a_swamp_and_a_jungle._The_savanna_sectio_1_rtadm7.webp',
              '',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764872824/DALL_E_2024-08-22_14.38.43_-_An_image_divided_into_three_vertical_sections_each_representing_a_different_natural_environment__a_savanna_a_swamp_and_a_jungle._The_savanna_sectio_2_hwsq3u.webp',
              'image',
              'Habitats Collage'
       ),
       (
              102,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764872943/DALL_E_2024-08-22_15.42.48_-_A_realistic_image_depicting_a_seamless_natural_environment_where_a_lion_a_crocodile_and_a_gorilla_coexist._The_lion_is_in_a_grassy_savanna-like_area_1_wmjlun.webp',
              '',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764872902/DALL_E_2024-08-22_15.42.48_-_A_realistic_image_depicting_a_seamless_natural_environment_where_a_lion_a_crocodile_and_a_gorilla_coexist._The_lion_is_in_a_grassy_savanna-like_area_1_y4gata.webp',
              'image',
              'Animals Collage'
       ),
       -- Media for Regular Services
       (
              103,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764876157/_45bf66dc-f855-49f3-8c70-01c353e88270_1_caqe6l.webp',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764876404/_45bf66dc-f855-49f3-8c70-01c353e88270_2_hdhye1.webp',
              '',
              'image',
              'Restaurant'
       ),
       (
              104,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764876160/_5c9ef8df-08e3-4d3f-9d73-3f0e8c8c064d_1_r8yo7a.webp',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764876401/_5c9ef8df-08e3-4d3f-9d73-3f0e8c8c064d_1_pw7vnb.webp',
              '',
              'image',
              'Zoo Guide'
       ),
       (
              105,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764876165/DALL_E_2024-08-23_21.48.55_-_A_hyper-realistic_image_of_a_zoo_train_with_a_conductor_guiding_passengers_through_the_zoo._The_conductor_is_a_human_in_a_professional_uniform_and_th_1_q11b2p.webp',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764876165/DALL_E_2024-08-23_21.48.55_-_A_hyper-realistic_image_of_a_zoo_train_with_a_conductor_guiding_passengers_through_the_zoo._The_conductor_is_a_human_in_a_professional_uniform_and_th_1_wp2qdr.webp',
              '',
              'image',
              'Train'
       ),
       -- Media for Habitats Cards
       (
              106,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764877055/DALL_E_2024-08-22_14.42.06_-_A_realistic_and_detailed_image_of_a_jungle_landscape._The_scene_features_dense_lush_green_foliage_with_tall_trees_thick_undergrowth_and_vines_hangi_1_otbziq.webp',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764876999/DALL_E_2024-08-22_14.42.06_-_A_realistic_and_detailed_image_of_a_jungle_landscape._The_scene_features_dense_lush_green_foliage_with_tall_trees_thick_undergrowth_and_vines_hangi_1_ff7mys.webp',
              '',
              'image',
              'Jungle'
       ),
       (
              107,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764877051/DALL_E_2024-08-22_14.40.51_-_A_realistic_and_detailed_image_of_a_savanna_landscape._The_scene_features_wide_open_grasslands_with_tall_dry_grasses_swaying_in_the_breeze._Scattere_2_ptpvtj.webp',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764876988/DALL_E_2024-08-22_14.40.51_-_A_realistic_and_detailed_image_of_a_savanna_landscape._The_scene_features_wide_open_grasslands_with_tall_dry_grasses_swaying_in_the_breeze._Scattere_1_xbm3xa.webp',
              '',
              'image',
              'Savannah'
       ),
       (
              108,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764877059/DALL_E_2024-08-22_14.41.22_-_A_realistic_and_detailed_image_of_a_swamp_landscape._The_scene_features_murky_waters_reflecting_the_surrounding_thick_vegetation_with_tall_moss-cove_1_ngyvkh.webp',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764876991/DALL_E_2024-08-22_14.41.22_-_A_realistic_and_detailed_image_of_a_swamp_landscape._The_scene_features_murky_waters_reflecting_the_surrounding_thick_vegetation_with_tall_moss-cove_1_esuv3x.webp',
              '',
              'image',
              'Swamp'
       ),
       (
              109,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764889109/protect-and-educate-animals_qi4awr.webp',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764889306/tab-protect-and-educate-animals_lrofgy.webp',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764889463/desk-protect-and-educate-animals_gre6ou.webp',
              'image',
              'About Carousel Slide 1'
       ),
       (
              110,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764889111/learning-education-all-time_cnzcgn.webp',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764889307/tab-learning-education-all-time_hf6vjg.webp',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764889463/desk-learning-education-all-time_cj7jls.webp',
              'image',
              'About Carousel Slide 2'
       ),
       (
              111,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764889109/caring-_-unique-esxperiences_tljdjn.webp',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764889307/tab-caring-_-unique-esxperiences_kr2bhp.webp',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764889462/desk-caring-_-unique-esxperiences_zgtlke.webp',
              'image',
              'About Carousel Slide 3'
       );

-- 2. Insert SERVICES
INSERT INTO
       services (
              id_service,
              service_title,
              service_description,
              link,
              type
       )
VALUES
       -- Homepage Features
       (
              100,
              'SERVICES',
              'SEE WHAT ARCADIA CAN OFFERS YOU',
              '/cms/pages/cms',
              'featured'
       ),
       (
              101,
              'HABITATS',
              'AMAZING HABITATS TO DISCOVER',
              '/habitats/pages/habitats',
              'featured'
       ),
       (
              102,
              'ANIMALS',
              'EXPLORE ANOTHER WAY OF LOVE',
              '/animals/pages/allanimals',
              'featured'
       ),
       -- Regular Services
       (
              103,
              'Restaurant',
              'Get a break',
              NULL,
              'service'
       ),
       (
              104,
              'Zoo Guide',
              'Feel safe all time',
              NULL,
              'service'
       ),
       (
              105,
              'Train to Arcadia',
              'A family adventure',
              NULL,
              'service'
       ),
       -- Habitats
       (
              106,
              'JUNGLE',
              'EMBRACE THE SURPRISES OF THE JUNGLE',
              '/habitats/pages/habitat1',
              'habitat'
       ),
       (
              107,
              'SAVANNAH',
              'EXPERIENCE THE WILD MAJESTY OF THE SAVANNAH',
              '/habitats/pages/habitat1',
              'habitat'
       ),
       (
              108,
              'SWAMP',
              'UNCOVER THE MYSTERIES OF THE SWAMP',
              '/habitats/pages/habitat1',
              'habitat'
       );

-- 3. Insert HEROES (NO CAROUSEL)
INSERT INTO
       heroes (
              id_hero,
              hero_title,
              hero_subtitle,
              page_name,
              has_sliders
       )
VALUES
       (
              1,
              'ZOO ARCADIA',
              'Where all animals love to live',
              'home',
              0
       ),
       (
              2,
              'SERVICES',
              'Our specialized services for you',
              'services',
              0
       ),
       (
              3,
              'HABITATS',
              'Discover our amazing worlds',
              'habitats',
              0
       ),
       (
              4,
              'ANIMALS',
              'Explore another way of love',
              'animals',
              0
       ),
       (
              5,
              'ABOUT US',
              'Our commitment to conservation and education',
              'about',
              1
       );

-- 4. Insert Bricks
INSERT INTO
       bricks (title, description, link, page_name)
VALUES
       (
              'More About Us',
              'In the heart of Bretagne, Arcadia Zoo is home to unique animals from the savannah, jungle, and wetlands.

Since 1960, we have ensured their well-being through daily veterinary care and tailored feeding.',
              '/about/pages/about',
              'home'
       ),
       (
              'who we are ?',
              'Arcadia Zoo, located near the Brocéliande Forest in Brittany, France, has been a sanctuary for animals since 1960. Organized into diverse habitats such as the savannah, jungle, and wetlands, the zoo is committed to the well-being of its residents. Daily veterinary checks ensure the health of all animals before the zoo opens its doors to the public, and their meals are carefully portioned according to veterinarian reports.

With its thriving operation and happy animals, Arcadia Zoo is a source of pride for its director, José, who envisions even greater achievements for the zoo''s future. Through innovation and care, the zoo continues to be a place where visitors can connect with animals and nature.',
              NULL,
              'about'
       );

-- 5. Insert Slides for About Page
INSERT INTO
       slides (
              id_slide,
              hero_id,
              title_caption,
              description_caption
       )
VALUES
       (
              1,
              5,
              'Our team works day by day to protect and educate',
              'Recognize the dedicated team that works every day to guarantee animals care and promote environmental education.'
       ),
       (
              2,
              5,
              'A natural space to learn and connect with animals',
              'Discover a space where animals live in harmony, surrounded by green and serene landscapes, designed to learn and connect with nature.'
       ),
       (
              3,
              5,
              'Taking care of animals and offering unique experiences',
              "Explore a safe and friendly atmosphere where visitors and animals live together, reflecting the zoo's commitment to animal welfare and the joy of its visitors."
       );

-- 6. Link MEDIA to SERVICES and HEROES
INSERT INTO
       media_relations (media_id, related_table, related_id, usage_type)
VALUES
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
INSERT INTO
       habitats (id_habitat, habitat_name, description_habitat)
VALUES
       (1, 'Savannah', 'Majesty in its rawest form'),
       (
              2,
              'Jungle',
              'EMBRACE THE SURPRISES OF THE JUNGLE'
       ),
       (3, 'swamp', 'UNCOVER THE MYSTERIES OF THE SWAMP');

-- 8. Insert MEDIA for Habitats (Cards/Listings images)
INSERT INTO
       media (
              id_media,
              media_path,
              media_path_medium,
              media_path_large,
              media_type,
              description
       )
VALUES
       -- Savannah Habitat Card Images
       (
              112,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766091147/arcadia_uploads/jyxp73wbq6ddownipvis.webp',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766091174/arcadia_uploads/jryclj1jkkpz2a39xsg5.webp',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766091253/arcadia_uploads/lddrokgktbokvo1tdypn.png',
              'image',
              'Savannah Habitat Card'
       ),
       -- Jungle Habitat Card Images
       (
              113,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766092293/arcadia_uploads/bdxxfgxfxgoif1iwonud.webp',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766092373/arcadia_uploads/nflh6z7os8ptp2brc9is.webp',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766092573/arcadia_uploads/k9v8qp3etqdler2qdvqr.png',
              'image',
              'Jungle Habitat Card'
       ),
       -- Swamp Habitat Card Images
       (
              114,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766094070/arcadia_uploads/o1w2dksoerzlkfksmkla.webp',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766094146/arcadia_uploads/visplj8egr0pqdxha9z8.webp',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766094190/arcadia_uploads/v15s7juxxahooaqgamco.png',
              'image',
              'Swamp Habitat Card'
       ),
       -- Savannah Hero Images
       (
              115,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766090958/arcadia_uploads/rr8fohrnbkiwdekj2noa.webp',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766091027/arcadia_uploads/qminb0u2p9syksaka3ra.webp',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766091063/arcadia_uploads/tongriqblcx5sa6sasv1.webp',
              'image',
              'Savannah Hero Background'
       ),
       -- Jungle Hero Images
       (
              116,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766093099/arcadia_uploads/drjznpcgiejwrtpjnjht.webp',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766093163/arcadia_uploads/nzwzdhlpoekku6b7fmym.webp',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766093194/arcadia_uploads/gydql4irp9h1qzxpq5p2.webp',
              'image',
              'Jungle Hero Background'
       ),
       -- Swamp Hero Images
       (
              117,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766093761/arcadia_uploads/zoqvgbwcus9fhvkqia20.webp',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766093788/arcadia_uploads/xi9hjzrtieopg8a2eptu.webp',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766093891/arcadia_uploads/fizurykhv12kkzdn722v.webp',
              'image',
              'Swamp Hero Background'
       );

-- 9. Insert HEROES for Habitats (with habitat_id)
INSERT INTO
       heroes (
              id_hero,
              hero_title,
              hero_subtitle,
              page_name,
              has_sliders,
              habitat_id
       )
VALUES
       (
              6,
              'VELVET SOVEREIGNS',
              'HEIRS OF A KINGDOM WITHOUT BORDERS',
              'habitats',
              0,
              1
       ),
       (
              7,
              'the silent Sylvans',
              "emerald unseen\'s art",
              'habitats',
              0,
              2
       ),
       (
              8,
              'The bayou barons',
              'A new pulse of a hidden world',
              'habitats',
              0,
              3
       );

-- 10. Link MEDIA to HABITATS (for cards/listings)
INSERT INTO
       media_relations (media_id, related_table, related_id, usage_type)
VALUES
       (112, 'habitats', 1, 'main'),
       (113, 'habitats', 2, 'main'),
       (114, 'habitats', 3, 'main');

-- 11. Link MEDIA to HEROES (for habitat-specific heroes)
INSERT INTO
       media_relations (media_id, related_table, related_id, usage_type)
VALUES
       (115, 'heroes', 6, 'main'),
       (116, 'heroes', 7, 'main'),
       (117, 'heroes', 8, 'main');

-- 12 Insert categories
INSERT INTO
       category (id_category, category_name)
VALUES
       (1, 'Mammal'),
       (2, 'Bird'),
       (3, 'Reptile'),
       (4, 'Amphibian'),
       (5, 'Arachnid'),
       (6, 'Insect');

-- ============================================================
-- SEED DATA FOR ANIMALS (Categories, Species, Nutrition, Animals)
-- ✨✨✨✨✨✨✨✨✨✨✨✨✨✨✨✨✨✨✨✨✨✨✨✨
-- ============================================================
-- 13. Insert SPECIES (Scientific Names)
INSERT INTO
       specie (id_specie, category_id, specie_name)
VALUES
       -- Mammals
       -- start jungle mammals
       (1, 1, 'Ailuropoda melanoleuca (bear)'),
       (2, 1, 'Alouatta seniculus (monkey)'),
       (3, 1, 'Arctictis binturong (bearcat)'),
       (4, 1, 'Artibeus jamaicensis (bat)'),
       (5, 1, 'Ateles geoffroyi (monkey)'),
       (6, 1, 'Bradypus variegatus (sloth)'),
       (7, 1, 'elephas maximus (elephant)'),
       (8, 1, 'Helarctos malayanus (bear)'),
       (9, 1, 'Leopardus pardalis (feline)'),
       (10, 1, 'nasua (coati)'),
       (11, 1, 'Panthera onca (feline)'),
       (12, 1, 'Panthera tigris tigris (feline)'),
       (13, 1, 'pridontes maximus (armadillo)'),
       (14, 1, 'puma concolor (feline)'),
       (15, 1, 'Tamandua tetradactyla (anteater)'),
       (16, 1, 'tapirus terrestris (tapir)'),
       (17, 1, 'Tremarctos ornatus (bear)'),
       (18, 1, 'Viverra tangalunga (civet)'),
       -- start savannah mammals
       (19, 1, 'Acinonyx jubatus raineyi (feline)'),
       (20, 1, 'Aepyceros melampus (antelope)'),
       (21, 1, 'Ceratotherium simum (rhinoceros)'),
       (22, 1, 'Connochaetes taurinus (wildebeest)'),
       (23, 1, 'crocuta crocuta (hyena)'),
       (24, 1, 'Damaliscus lunatus jimela (antelope)'),
       (25, 1, 'Equus zebra (zebra)'),
       (
              26,
              1,
              'Giraffa camelopardalis peralta (giraffe)'
       ),
       (27, 1, 'Leptailurus serval (feline)'),
       (28, 1, 'Loxodonta africana (elephant)'),
       (29, 1, 'Orycteropus afer (aardvark)'),
       (30, 1, 'Oryx beisa (antelope)'),
       (31, 1, 'Panthera leo melanochaita (feline)'),
       (32, 1, 'panthera pardus pardus (feline)'),
       (33, 1, 'papio kindae (monkey)'),
       (34, 1, 'Phacochoerus africanus (warthog)'),
       (35, 1, 'syncerus caffer (buffalo)'),
       (36, 1, 'viverricula indica (civet)'),
       -- start swamp mammals
       (37, 1, 'bubalus bubalis (buffalo)'),
       (38, 1, 'castor fiber (beaver)'),
       (39, 1, 'Cerdocyon thous (fox)'),
       (40, 1, 'Hippopotamus amphibious (hippopotamus)'),
       (41, 1, 'Hydrochoerus hydrochaeris (capybara)'),
       (42, 1, 'lutra lutra (otter)'),
       (43, 1, 'neomys fodiens (shrew)'),
       (44, 1, 'Ondatra zibethicus (muskrat)'),
       (45, 1, 'Pteronura brasiliensis (otter)'),
       (46, 1, 'Trichechus manatus (manatee)'),
       -- Birds
       -- start jungle birds
       (48, 2, 'Ara chloropterus (parrot)'),
       (49, 2, 'Buceros rhinoceros (hornbill)'),
       (50, 2, 'cotinga nattererii (cotinga)'),
       (51, 2, 'Harpia harpyja (bird of prey)'),
       (52, 2, 'Pharomachrus mocinno (quetzal)'),
       (53, 2, 'Picus viridis (woodpecker)'),
       (54, 2, 'Probosciger aterrimus (parrot)'),
      (55, 2, 'Psittacus erithacus (parrot)'),
      (56, 2, 'Ramphastos sulfuratus (toucan)'),
      (57, 2, 'trochilidae (hummingbird)'),
      -- start swamp birds
      (58, 2, 'anhinga rufa (water bird)'),
      (59, 2, 'Ardea alba (water bird)'),
      (60, 2, 'Ardea cinerea (water bird)'),
      (61, 2, 'Eudocimus ruber (water bird)'),
      (62, 2, 'Himantopus himantopus (water bird)'),
      (63, 2, 'Jabiru mycteria (water bird)'),
      (64, 2, 'Leptoptilos crumenifer (water bird)'),
      (65, 2, 'Microcarbo africanus (water bird)'),
      (66, 2, 'Phalacrocorax carbo (water bird)'),
      (67, 2, 'Phoeniconaias minor (water bird)'),
      (68, 2, 'Phoenicopterus roseus (water bird)'),
      (69, 2, 'Platalea ajaja (water bird)'),
      (70, 2, 'Platalea leucorodia (water bird)'),
      -- start savannah birds
      (71, 2, 'Burhinus vermiculatus (water bird)'),
      (72, 2, 'Coracias abyssinicus (roller)'),
      (73, 2, 'Gyps fulvus (bird of prey)'),
      (74, 2, 'ploceus velatus (weaver)'),
      (75, 2, 'Polemaetus bellicosus (bird of prey)'),
      (76, 2, 'Pternistis adspersus (fowl)'),
      (77, 2, 'Sagittarius serpentarius (secretarybird)'),
      (78, 2, 'Struthio camelus (ostrich)'),
      (79, 2, 'Vanellus albiceps (water bird)'),
      (80, 2, 'Vanellus armatus (water bird)'),
      -- start swamp reptiles
      (81, 3, 'Acanthochelys spixii (turtle)'),
      (82, 3, 'Alligator mississippiensis (crocodile)'),
      (83, 3, 'caiman yacare (crocodile)'),
      (84, 3, 'Crocodylus niloticus (crocodile)'),
      (85, 3, 'Gavialis gangeticus (crocodile)'),
      (86, 3, 'Melanosuchus niger (crocodile)'),
      -- start savannah reptiles
      (87, 3, 'agama agama (lizard)'),
      (88, 3, 'Aldabrachelys gigantea (turtle)'),
      (89, 3, 'chamaeleo africanus (lizard)'),
      (90, 3, 'Gopherus evgoodei (turtle)'),
      (91, 3, 'Mediterranean house gecko (lizard)'),
      -- start jungle amphibians
      (92, 4, 'Agalychnis callidryas (frog)'),
      (93, 4, 'Dendrobates tinctorius azureus (frog)'),
      (94, 4, 'Hyalinobatrachium fleischmanni (frog)'),
      (95, 4, 'Phyllobates terribilis (frog)'),
      (96, 4, 'Phyllomedusa bicolor (frog)');

-- 14. Insert NUTRITION PLANS
INSERT INTO
       nutrition (
              id_nutrition,
              nutrition_type,
              food_type,
              food_qtty
       )
VALUES
       -- Carnivorous plans
       (1, 'carnivorous', 'meat', 5000),
       -- For large felines (lions, tigers, jaguars, leopards) - 5kg meat
       (2, 'carnivorous', 'meat', 3000),
       -- For medium felines (puma, ocelot, serval, cheetah) - 3kg meat
       (3, 'carnivorous', 'meat', 2500),
       -- For hyenas - 2.5kg meat
       (4, 'carnivorous', 'meat', 2000),
       -- For crocodiles, alligators, caimans - 2kg meat
       (5, 'carnivorous', 'fish', 1500),
       -- For otters - 1.5kg fish
       (6, 'carnivorous', 'meat', 1000),
       -- For foxes, civets - 1kg meat
       (7, 'carnivorous', 'insect', 500),
       -- For insectivores (anteaters, shrews) - 500g insects
       (8, 'carnivorous', 'meat', 800),
       -- For birds of prey (eagles, vultures) - 800g meat
       -- Herbivorous plans
       (9, 'herbivorous', 'grass', 15000),
       -- For elephants - 15kg grass/vegetation
       (10, 'herbivorous', 'leaves', 8000),
       -- For giraffes - 8kg leaves
       (11, 'herbivorous', 'grass', 6000),
       -- For rhinoceroses - 6kg grass
       (12, 'herbivorous', 'grass', 5000),
       -- For large herbivores (buffalo, wildebeest, zebra) - 5kg grass
       (13, 'herbivorous', 'grass', 4000),
       -- For antelopes, warthogs - 4kg grass
       (14, 'herbivorous', 'aquatic_plants', 3000),
       -- For hippopotamus, manatee - 3kg aquatic plants
       (15, 'herbivorous', 'fruit', 3000),
       -- For fruit-eating herbivores - 3kg fruit
       (16, 'herbivorous', 'leaves', 2000),
       -- For sloths, tapirs - 2kg leaves
       (17, 'herbivorous', 'grass', 2000),
       -- For capybara, beaver - 2kg grass/vegetation
       (18, 'herbivorous', 'aquatic_plants', 1500),
       -- For muskrats - 1.5kg aquatic plants
       -- Omnivorous plans
       (19, 'omnivorous', 'fruit', 2500),
       -- For bears (panda, sun bear, andean bear) - 2.5kg fruit + vegetables
       (20, 'omnivorous', 'fruit', 2000),
       -- For monkeys (howler, spider, baboon) - 2kg fruit + insects
       (21, 'omnivorous', 'fruit', 1500),
       -- For coati, armadillo - 1.5kg fruit + insects
       (22, 'omnivorous', 'fruit', 1000),
       -- For aardvark - 1kg fruit + termites
       -- Bird plans
       (23, 'omnivorous', 'fruit', 800),
       -- For parrots, toucans - 800g fruit + seeds
       (24, 'omnivorous', 'fruit', 500),
       -- For hornbills, quetzals - 500g fruit
       (25, 'carnivorous', 'fish', 600),
       -- For water birds (herons, cormorants, storks) - 600g fish
       (26, 'herbivorous', 'aquatic_plants', 500),
       -- For flamingos, spoonbills - 500g aquatic plants
       (27, 'carnivorous', 'insect', 400),
       -- For small birds (woodpeckers, weavers) - 400g insects
       (28, 'omnivorous', 'fruit', 300),
       -- For rollers, fowls - 300g fruit + insects
       (29, 'herbivorous', 'grass', 2000),
       -- For ostriches - 2kg grass + insects
       (30, 'carnivorous', 'nectar', 50),
       -- For hummingbirds - 50g nectar + tiny insects
       -- Reptile plans
       (31, 'herbivorous', 'vegetables', 1000),
       -- For tortoises - 1kg vegetables + fruits
       (32, 'omnivorous', 'insect', 300),
       -- For lizards, geckos - 300g insects + small fruits
       (33, 'carnivorous', 'insect', 200),
       -- For chameleons - 200g insects
       -- Amphibian plans
       (34, 'carnivorous', 'insect', 100);

-- For frogs - 100g small insects
-- 15. Insert ANIMAL_GENERAL (Individual animals with common name)
INSERT INTO
       animal_general (id_animal_g, animal_name, gender, specie_id)
VALUES
       -- Jungle Mammals (1-18)
       (1, 'Bamboo', 'male', 1),
       (2, 'Rufus', 'male', 2),
       (3, 'Fuzzy', 'male', 3),
       (4, 'Nyx', 'female', 4),
       (5, 'Spider', 'male', 5),
       (6, 'Sloth', 'male', 6),
       (7, 'Surya', 'male', 7),
       (8, 'Sunny', 'male', 8),
       (9, 'Spots', 'female', 9),
       (10, 'Tail', 'female', 10),
       (11, 'Jaguar', 'male', 11),
       (12, 'Rajah', 'male', 12),
       (13, 'Armor', 'male', 13),
       (14, 'Swift', 'female', 14),
       (15, 'Tongue', 'male', 15),
       (16, 'Tapir', 'female', 16),
       (17, 'Andes', 'male', 17),
       (18, 'Civet', 'female', 18),
       -- Savannah Mammals (19-36)
       (19, 'Lightning', 'male', 19),
       (20, 'Jumper', 'male', 20),
       (21, 'Horn', 'male', 21),
       (22, 'Blue', 'male', 22),
       (23, 'Laugh', 'female', 23),
       (24, 'Topi', 'male', 24),
       (25, 'Stripes', 'female', 25),
       (26, 'Neck', 'female', 26),
       (27, 'Serval', 'male', 27),
       (28, 'Tembo', 'male', 28),
       (29, 'Earth', 'male', 29),
       (30, 'Oryx', 'female', 30),
       (31, 'King', 'male', 31),
       (32, 'Leopard', 'male', 32),
       (33, 'Baboon', 'male', 33),
       (34, 'Warthog', 'male', 34),
       (35, 'Buffalo', 'male', 35),
       (36, 'India', 'female', 36),
       -- Swamp Mammals (37-47)
       (37, 'Water', 'male', 37),
       (38, 'Beaver', 'male', 38),
       (39, 'Fox', 'male', 39),
       (40, 'Hippo', 'male', 40),
       (41, 'Capy', 'female', 41),
       (42, 'Otter', 'female', 42),
       (43, 'Shrew', 'female', 43),
       (44, 'Muskrat', 'male', 44),
       (45, 'Giant', 'male', 45),
       (46, 'Manatee', 'female', 46),
      -- Jungle Birds (47-56)
      (47, 'Green', 'male', 48),
      (48, 'Horn', 'male', 49),
      (49, 'Blue', 'male', 50),
      (50, 'Eagle', 'female', 51),
      (51, 'Quetzal', 'male', 52),
      (52, 'Peck', 'male', 53),
      (53, 'Cockatoo', 'female', 54),
      (54, 'Grey', 'male', 55),
      (55, 'Toucan', 'male', 56),
      (56, 'Humming', 'female', 57),
      -- Swamp Birds (57-69)
      (57, 'Anhinga', 'male', 58),
      (58, 'Egret', 'female', 59),
      (59, 'Grey', 'male', 60),
      (60, 'Red', 'male', 61),
      (61, 'Stilt', 'female', 62),
      (62, 'Jabiru', 'male', 63),
      (63, 'Marabou', 'male', 64),
      (64, 'Cormorant', 'male', 65),
      (65, 'Great', 'male', 66),
      (66, 'Lesser', 'female', 67),
      (67, 'Greater', 'female', 68),
      (68, 'Rose', 'female', 69),
      (69, 'Eurasia', 'male', 70),
      -- Savannah Birds (70-79)
      (70, 'Water', 'male', 71),
      (71, 'Abyssinian', 'female', 72),
      (72, 'Vulture', 'male', 73),
      (73, 'Weaver', 'male', 74),
      (74, 'Martial', 'female', 75),
      (75, 'Bill', 'male', 76),
      (76, 'Secretary', 'male', 77),
      (77, 'Ostrich', 'male', 78),
      (78, 'Crown', 'female', 79),
      (79, 'Blacksmith', 'male', 80),
      -- Swamp Reptiles (80-85)
      (80, 'Spine', 'female', 81),
      (81, 'Alli', 'male', 82),
      (82, 'Yacare', 'male', 83),
      (83, 'Nile', 'male', 84),
      (84, 'Gharial', 'male', 85),
      (85, 'Black', 'male', 86),
      -- Savannah Reptiles (86-90)
      (86, 'Agama', 'male', 87),
      (87, 'Giant', 'male', 88),
      (88, 'Chameleon', 'male', 89),
      (89, 'Gopherus', 'female', 90),
      (90, 'Gecko', 'female', 91),
      -- Jungle Amphibians (91-95)
      (91, 'Eyes', 'female', 92),
      (92, 'Blue', 'male', 93),
      (93, 'Crystal', 'female', 94),
      (94, 'Golden', 'male', 95),
      (95, 'Bicolor', 'female', 96);

-- 16. Insert ANIMAL_FULL (Link animals with habitats and nutrition)
INSERT INTO
       animal_full (
              id_full_animal,
              animal_g_id,
              habitat_id,
              nutrition_id
       )
VALUES
       -- Jungle Mammals (1-18) - habitat_id=2 (Jungle)
       (1, 1, 2, 19),
       -- Bambú (Panda) - omnivorous fruit
       (2, 2, 2, 20),
       -- Rufo (Mono Aullador) - omnivorous fruit
       (3, 3, 2, 19),
       -- Peludo (Binturong) - omnivorous fruit
       (4, 4, 2, 7),
       -- Noche (Murciélago) - carnivorous insect
       (5, 5, 2, 20),
       -- Araña (Mono Araña) - omnivorous fruit
       (6, 6, 2, 16),
       -- Lento (Perezoso) - herbivorous leaves
       (7, 7, 2, 9),
       -- Surya (Elefante Asiático) - herbivorous grass
       (8, 8, 2, 19),
       -- Sol (Oso del Sol) - omnivorous fruit
       (9, 9, 2, 2),
       -- Manchas (Ocelote) - carnivorous meat medium
       (10, 10, 2, 21),
       -- Cola (Coati) - omnivorous fruit
       (11, 11, 2, 1),
       -- Jaguar (Jaguar) - carnivorous meat large
       (12, 12, 2, 1),
       -- Rajah (Tigre de Bengala) - carnivorous meat large
       (13, 13, 2, 21),
       -- Armado (Armadillo Gigante) - omnivorous fruit
       (14, 14, 2, 2),
       -- Veloz (Puma) - carnivorous meat medium
       (15, 15, 2, 7),
       -- Lengua (Oso Hormiguero) - carnivorous insect
       (16, 16, 2, 16),
       -- Tapir (Tapir) - herbivorous leaves
       (17, 17, 2, 19),
       -- Andino (Oso Andino) - omnivorous fruit
       (18, 18, 2, 6),
       -- Civeta (Civeta Malaya) - carnivorous meat small
       -- Savannah Mammals (19-36) - habitat_id=1 (Savannah)
       (19, 19, 1, 2),
       -- Rayo (Guepardo) - carnivorous meat medium
       (20, 20, 1, 13),
       -- Saltarín (Impala) - herbivorous grass
       (21, 21, 1, 11),
       -- Cuerno (Rinoceronte Blanco) - herbivorous grass
       (22, 22, 1, 12),
       -- Azul (Ñu) - herbivorous grass large
       (23, 23, 1, 3),
       -- Risa (Hiena Manchada) - carnivorous meat
       (24, 24, 1, 13),
       -- Topi (Topi) - herbivorous grass
       (25, 25, 1, 12),
       -- Rayas (Cebra) - herbivorous grass large
       (26, 26, 1, 10),
       -- Cuello (Jirafa) - herbivorous leaves
       (27, 27, 1, 2),
       -- Serval (Serval) - carnivorous meat medium
       (28, 28, 1, 9),
       -- Tembo (Elefante Africano) - herbivorous grass
       (29, 29, 1, 22),
       -- Tierra (Cerdo Hormiguero) - omnivorous fruit
       (30, 30, 1, 13),
       -- Oryx (Órix) - herbivorous grass
       (31, 31, 1, 1),
       -- Rey (León) - carnivorous meat large
       (32, 32, 1, 1),
       -- Leopardo (Leopardo) - carnivorous meat large
       (33, 33, 1, 20),
       -- Baboon (Baboon) - omnivorous fruit
       (34, 34, 1, 13),
       -- Jabalí (Jabalí Verrugoso) - herbivorous grass
       (35, 35, 1, 12),
       -- Búfalo (Búfalo del Cabo) - herbivorous grass large
       (36, 36, 1, 6),
       -- India (Civeta India) - carnivorous meat small
       -- Swamp Mammals (37-47) - habitat_id=3 (Swamp)
       (37, 37, 3, 12),
       -- Agua (Búfalo de Agua) - herbivorous grass large
       (38, 38, 3, 17),
       -- Castor (Castor) - herbivorous grass
       (39, 39, 3, 6),
       -- Zorro (Zorro Cangrejero) - carnivorous meat small
       (40, 40, 3, 14),
       -- Hipo (Hipopótamo) - herbivorous aquatic plants
       (41, 41, 3, 17),
       -- Capy (Capibara) - herbivorous grass
       (42, 42, 3, 5),
       -- Nutria (Nutria Europea) - carnivorous fish
       (43, 43, 3, 7),
       -- Musaraña (Musaraña Acuática) - carnivorous insect
       (44, 44, 3, 18),
       -- Rata (Rata Almizclera) - herbivorous aquatic plants
       (45, 45, 3, 5),
       -- Gigante (Nutria Gigante) - carnivorous fish
       (46, 46, 3, 14),
       -- Manatí (Manatí) - herbivorous aquatic plants
      -- Jungle Birds (47-56) - habitat_id=2 (Jungle)
      (47, 47, 2, 23),
      -- Verde (Guacamayo) - omnivorous fruit
      (48, 48, 2, 24),
      -- Cuerno (Cálao Rinoceronte) - omnivorous fruit
      (49, 49, 2, 24),
      -- Azul (Cotinga Azul) - omnivorous fruit
      (50, 50, 2, 8),
      -- Águila (Águila Arpía) - carnivorous meat bird of prey
      (51, 51, 2, 24),
      -- Quetzal (Quetzal) - omnivorous fruit
      (52, 52, 2, 27),
      -- Pico (Pájaro Carpintero) - carnivorous insect
      (53, 53, 2, 23),
      -- Cacatúa (Cacatúa de Palmera) - omnivorous fruit
      (54, 54, 2, 23),
      -- Gris (Loro Gris) - omnivorous fruit
      (55, 55, 2, 23),
      -- Tucán (Tucán) - omnivorous fruit
      (56, 56, 2, 30),
      -- Humming (Hummingbird) - carnivorous nectar
      -- Swamp Birds (57-69) - habitat_id=3 (Swamp)
      (57, 57, 3, 25),
      -- Anhinga (Anhinga Africana) - carnivorous fish
      (58, 58, 3, 25),
      -- Garza (Garza Blanca) - carnivorous fish
      (59, 59, 3, 25),
      -- Gris (Garza Gris) - carnivorous fish
      (60, 60, 3, 25),
      -- Rojo (Ibis Escarlata) - carnivorous fish
      (61, 61, 3, 25),
      -- Patas (Cigüeñuela) - carnivorous fish
      (62, 62, 3, 25),
      -- Jabirú (Jabirú) - carnivorous fish
      (63, 63, 3, 25),
      -- Marabú (Marabú) - carnivorous fish
      (64, 64, 3, 25),
      -- Cormorán (Cormorán Carrizal) - carnivorous fish
      (65, 65, 3, 25),
      -- Grande (Cormorán Grande) - carnivorous fish
      (66, 66, 3, 26),
      -- Menor (Flamenco Menor) - herbivorous aquatic plants
      (67, 67, 3, 26),
      -- Mayor (Flamenco Mayor) - herbivorous aquatic plants
      (68, 68, 3, 25),
      -- Rosa (Espátula Rosada) - carnivorous fish
      (69, 69, 3, 25),
      -- Eurasia (Espátula Eurasiática) - carnivorous fish
      -- Savannah Birds (70-79) - habitat_id=1 (Savannah)
      (70, 70, 1, 25),
      -- Agua (Alcaraván) - carnivorous fish
      (71, 71, 1, 28),
      -- Abisinia (Carraca Abisinia) - omnivorous fruit
      (72, 72, 1, 8),
      -- Buitre (Buitre Leonado) - carnivorous meat bird of prey
      (73, 73, 1, 27),
      -- Tejedor (Tejedor Enmascarado) - carnivorous insect
      (74, 74, 1, 8),
      -- Militar (Águila Marcial) - carnivorous meat bird of prey
      (75, 75, 1, 28),
      -- Pico (Francolín de Pico Rojo) - omnivorous fruit
      (76, 76, 1, 8),
      -- Secretario (Secretario) - carnivorous meat bird of prey
      (77, 77, 1, 29),
      -- Avestruz (Avestruz) - herbivorous grass
      (78, 78, 1, 25),
      -- Corona (Avefría de Corona Blanca) - carnivorous fish
      (79, 79, 1, 25),
      -- Herrero (Avefría Herrera) - carnivorous fish
      -- Swamp Reptiles (80-85) - habitat_id=3 (Swamp)
      (80, 80, 3, 31),
      -- Espina (Tortuga de Cuello Negro) - herbivorous vegetables
      (81, 81, 3, 4),
      -- Alli (Alligator Americano) - carnivorous meat
      (82, 82, 3, 4),
      -- Yacaré (Yacaré) - carnivorous meat
      (83, 83, 3, 4),
      -- Nilo (Cocodrilo del Nilo) - carnivorous meat
      (84, 84, 3, 4),
      -- Gavial (Gavial) - carnivorous meat
      (85, 85, 3, 4),
      -- Negro (Caimán Negro) - carnivorous meat
      -- Savannah Reptiles (86-90) - habitat_id=1 (Savannah)
      (86, 86, 1, 32),
      -- Agama (Lagarto Agama) - omnivorous insect
      (87, 87, 1, 31),
      -- Gigante (Tortuga Gigante de Aldabra) - herbivorous vegetables
      (88, 88, 1, 33),
      -- Camaleón (Camaleón Africano) - carnivorous insect
      (89, 89, 1, 31),
      -- Gopherus (Tortuga de Matorral) - herbivorous vegetables
      (90, 90, 1, 32),
      -- Gecko (Gecko Doméstico) - omnivorous insect
      -- Jungle Amphibians (91-95) - habitat_id=2 (Jungle)
      (91, 91, 2, 34),
      -- Ojos (Rana de Ojos Rojos) - carnivorous insect
      (92, 92, 2, 34),
      -- Azul (Rana Dardo Azul) - carnivorous insect
      (93, 93, 2, 34),
      -- Cristal (Rana de Cristal) - carnivorous insect
      (94, 94, 2, 34),
      -- Dorada (Rana Dardo Dorada) - carnivorous insect
      (95, 95, 2, 34);
      -- Bicolor (Rana Arborícola Bicolor) - carnivorous insect
-- 17. Insert MEDIA for Animals (Placeholder URLs - REPLACE with your Cloudinary URLs)
-- Format: mobile, tablet, desktop
INSERT INTO
       media (
              id_media,
              media_path,
              media_path_medium,
              media_path_large,
              media_type,
              description
       )
VALUES
       -- Jungle Mammals (1-18)
       (
              1,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766399495/Ailuropoda_melanoleuca_ihv5xx.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766417311/Ailuropoda_melanoleuca-tab_flrgje.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766417311/Ailuropoda_melanoleuca-tab_flrgje.png',
              'image',
              'Bamboo the Panda'
       ),
       (
              2,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766399651/Alouatta_seniculus_gdvkge.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766417309/Alouatta_seniculus-tab_hshwug.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766417309/Alouatta_seniculus-tab_hshwug.png',
              'image',
              'Rufus the Howler Monkey'
       ),
       (
              3,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766399649/Arctictis_binturong_hceicv.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766417312/binturong-tab_o36u6s.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766417312/binturong-tab_o36u6s.png',
              'image',
              'Fuzzy the Binturong'
       ),
       (
              4,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766399646/Artibeus_jamaicensis_cb3fdp.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766417310/Artibeus_jamaicensis-tab_ai0gio.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766417310/Artibeus_jamaicensis-tab_ai0gio.png',
              'image',
              'Nyx the Fruit Bat'
       ),
       (
              5,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766399650/Ateles_geoffroyi_dqpqzn.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766417311/Ateles_geoffroyi-tab_ik2pbl.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766417311/Ateles_geoffroyi-tab_ik2pbl.png',
              'image',
              'Spider the Spider Monkey'
       ),
       (
              6,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766399649/Bradypus_variegatus_r5b9sa.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766417313/Bradypus_variegatus-tab_vhnfcv.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766417313/Bradypus_variegatus-tab_vhnfcv.png',
              'image',
              'Sloth the Sloth'
       ),
       (
              7,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766399645/elephas_maximus_w8ma4t.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766417314/elephas_maximus-tab_lepulp.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766417314/elephas_maximus-tab_lepulp.png',
              'image',
              'Surya the Asian Elephant'
       ),
       (
              8,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766399647/Helarctos_malayanus_d6h49l.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766417315/Helarctos_malayanus-tab_ejagij.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766417315/Helarctos_malayanus-tab_ejagij.png',
              'image',
              'Sunny the Sun Bear'
       ),
       (
              9,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766399646/Leopardus_pardalis_klj6gx.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766417308/Leopardus_pardalis-tab_kty9wq.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766417308/Leopardus_pardalis-tab_kty9wq.png',
              'image',
              'Spots the Ocelot'
       ),
       (
              10,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766399649/nasua_h4dj6z.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766417315/coati-tab_j94j3r.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766417315/coati-tab_j94j3r.png',
              'image',
              'Tail the Coati'
       ),
       (
              11,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766399652/Panthera_onca_ycxcam.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766417314/jaguar_onca-tab_crdtsg.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766417314/jaguar_onca-tab_crdtsg.png',
              'image',
              'Jaguar the Jaguar'
       ),
       (
              12,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766399653/Panthera_tigris_tigris_dmud7z.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766417309/tigre-tab_h9xuyq.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766417309/tigre-tab_h9xuyq.png',
              'image',
              'Rajah the Bengal Tiger'
       ),
       (
              13,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766399654/pridontes_maximus_gkjuxq.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766417310/Arctictis_binturong-tab_e34jwp.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766417310/Arctictis_binturong-tab_e34jwp.png',
              'image',
              'Armor the Giant Armadillo'
       ),
       (
              14,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766399654/puma_concolor_kqfvrs.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766417308/puma_concolor-tab_tftkkp.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766417308/puma_concolor-tab_tftkkp.png',
              'image',
              'Swift the Puma'
       ),
       (
              15,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766399656/Tamandua_tetradactyla_aod6bm.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766417308/tamandua-tab_jyfyl7.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766417308/tamandua-tab_jyfyl7.png',
              'image',
              'Tongue the Anteater'
       ),
       (
              16,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766399657/tapirus_terrestris_alafhm.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766417314/danta_tapirus-tab_d3x0dt.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766417314/danta_tapirus-tab_d3x0dt.png',
              'image',
              'Tapir the Tapir'
       ),
       (
              17,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766399656/Tremarctos_ornatus_srt19d.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766417309/Tremarctos_ornatus-tab_jigebw.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766417309/Tremarctos_ornatus-tab_jigebw.png',
              'image',
              'Andes the Andean Bear'
       ),
       (
              18,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766399644/Viverra_tangalunga_c2jpfu.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766417309/Viverra_tangalunga-tab_uhbuok.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766417309/Viverra_tangalunga-tab_uhbuok.png',
              'image',
              'Civet the Malayan Civet'
       ),
       -- Savannah Mammals (19-36)
       (
              19,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766400405/Acinonyx_jubatus_raineyi_rqssn5.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766418961/Acinonyx_jubatus_raineyi-tab_xbeysu.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766418961/Acinonyx_jubatus_raineyi-tab_xbeysu.png',
              'image',
              'Lightning the Cheetah'
       ),
       (
              20,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766400399/Aepyceros_melampus_d7zkqj.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766418953/Aepyceros_melampus-tab_mwig1n.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766418953/Aepyceros_melampus-tab_mwig1n.png',
              'image',
              'Jumper the Impala'
       ),
       (
              21,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766400397/Ceratotherium_simum_d5ednw.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766419001/Ceratotherium_simum-tab_vpahfk.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766419001/Ceratotherium_simum-tab_vpahfk.png',
              'image',
              'Horn the White Rhinoceros'
       ),
       (
              22,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766400401/Connochaetes_taurinus_xe3hgj.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766418995/Connochaetes_taurinus-tab_xaeuee.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766418995/Connochaetes_taurinus-tab_xaeuee.png',
              'image',
              'Blue the Wildebeest'
       ),
       (
              23,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766400407/Crocuta_crocuta_gxuyjg.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766419004/Crocuta_crocuta-tab_gwqhkd.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766419004/Crocuta_crocuta-tab_gwqhkd.png',
              'image',
              'Laugh the Spotted Hyena'
       ),
       (
              24,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766400403/Damaliscus_lunatus_jimela_jpfpyw.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766418956/Damaliscus_lunatus_jimela-tab_owryse.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766418956/Damaliscus_lunatus_jimela-tab_owryse.png',
              'image',
              'Topi the Topi'
       ),
       (
              25,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766400412/Equus_zebra_fio9ji.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766418998/Equus_zebra-tab_xhqye6.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766418998/Equus_zebra-tab_xhqye6.png',
              'image',
              'Stripes the Zebra'
       ),
       (
              26,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766400410/Giraffa_camelopardalis_peralta_dp4as8.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766418967/Giraffa_camelopardalis_peralta-tab_ry0r7d.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766418967/Giraffa_camelopardalis_peralta-tab_ry0r7d.png',
              'image',
              'Neck the Giraffe'
       ),
       (
              27,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766400414/Leptailurus_serval_kmtfg2.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766418964/Leptailurus_serval-tab_lo5zhr.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766418964/Leptailurus_serval-tab_lo5zhr.png',
              'image',
              'Serval the Serval'
       ),
       (
              28,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766400416/Loxodonta_africana_f6xnhv.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766419007/Loxodonta_africana-tab_dbha0e.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766419007/Loxodonta_africana-tab_dbha0e.png',
              'image',
              'Tembo the African Elephant'
       ),
       (
              29,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766400419/Orycteropus_afer_yjdjh0.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766418971/Orycteropus_afer-tab_yot3v8.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766418971/Orycteropus_afer-tab_yot3v8.png',
              'image',
              'Earth the Aardvark'
       ),
       (
              30,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766400422/Oryx_beisa_ygo3qu.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766418958/Oryx_beisa-tab_zyhsbt.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766418958/Oryx_beisa-tab_zyhsbt.png',
              'image',
              'Oryx the Oryx'
       ),
       (
              31,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766400423/Panthera_leo_melanochaita_nlsq1s.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766418980/Panthera_leo_melanochaita-tab_zewlld.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766418980/Panthera_leo_melanochaita-tab_zewlld.png',
              'image',
              'King the Lion'
       ),
       (
              32,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766400425/Panthera_pardus_pardus_bwwjyo.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766418977/Panthera_pardus_pardus-tab_iegyge.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766418977/Panthera_pardus_pardus-tab_iegyge.png',
              'image',
              'Leopard the Leopard'
       ),
       (
              33,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766400428/Papio_kindae_jtcowj.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766418992/Papio_kindae-tab_nge7oj.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766418992/Papio_kindae-tab_nge7oj.png',
              'image',
              'Baboon the Baboon'
       ),
       (
              34,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766400430/Phacochoerus_africanus_omybxs.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766418987/Phacochoerus_africanus-tab_recdfu.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766418987/Phacochoerus_africanus-tab_recdfu.png',
              'image',
              'Warthog the Warthog'
       ),
       (
              35,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766400432/Syncerus_caffer_dsl1sf.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766418989/Syncerus_caffer-tab_tzdbyq.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766418989/Syncerus_caffer-tab_tzdbyq.png',
              'image',
              'Buffalo the Cape Buffalo'
       ),
       (
              36,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766400395/Viverricula_indica_zsap4k.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766418983/Viverricula_indica-tab_fkdvue.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766418983/Viverricula_indica-tab_fkdvue.png',
              'image',
              'India the Indian Civet'
       ),
       -- Swamp Mammals (37-47)
       (
              37,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766401527/bubalus_bubalis_jxqbv0.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766421347/bubalus_bubalis-tab_kqslan.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766421347/bubalus_bubalis-tab_kqslan.png',
              'image',
              'Water the Water Buffalo'
       ),
       (
              38,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766401513/castor_fiber_ybtswr.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766421347/castor_fiber-tab_dbjso4.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766421347/castor_fiber-tab_dbjso4.png',
              'image',
              'Beaver the Beaver'
       ),
       (
              39,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766401518/Cerdocyon_thous_dfzpyc.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766421350/Cerdocyon_thous-tab_dpzlml.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766421350/Cerdocyon_thous-tab_dpzlml.png',
              'image',
              'Fox the Crab-eating Fox'
       ),
       (
              40,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766401522/Hippopotamus_amphibious_jft9st.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766421347/Hippopotamus_amphibious-tab_kmso0t.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766421347/Hippopotamus_amphibious-tab_kmso0t.png',
              'image',
              'Hippo the Hippopotamus'
       ),
       (
              41,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766401532/Hydrochoerus_hydrochaeris_jlamqa.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766421349/Hydrochoerus_hydrochaeris-tab_w82zzd.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766421349/Hydrochoerus_hydrochaeris-tab_w82zzd.png',
              'image',
              'Capy the Capybara'
       ),
       (
              42,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766401536/Lutra_lutra_rk8nqs.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766421351/Lutra_lutra-tab_pvcrlq.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766421351/Lutra_lutra-tab_pvcrlq.png',
              'image',
              'Otter the Eurasian Otter'
       ),
       (
              43,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766401541/Neomys_fodiens_bglbak.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766421352/Neomys_fodiens-tab_jy6ict.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766421352/Neomys_fodiens-tab_jy6ict.png',
              'image',
              'Shrew the Water Shrew'
       ),
       (
              44,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766401546/Ondatra_zibethicus_wsuylo.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766421348/Ondatra_zibethicus-tab_yzyazx.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766421348/Ondatra_zibethicus-tab_yzyazx.png',
              'image',
              'Muskrat the Muskrat'
       ),
       (
              45,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766401550/Pteronura_brasiliensis_fk1low.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766421349/Pteronura_brasiliensis-tab_qhxekn.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766421349/Pteronura_brasiliensis-tab_qhxekn.png',
              'image',
              'Giant the Giant Otter'
       ),
       (
              46,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766401509/Trichechus_manatus_wbfzmh.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766421347/Trichechus_manatus-tab_qxndx9.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766421347/Trichechus_manatus-tab_qxndx9.png',
              'image',
              'Manatee the Manatee'
       ),
       -- Jungle Birds (48-57)
       (
              47,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766399805/Ara_chloropterus_nigxsd.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766417846/Ara_chloropterus-tab_vaqsjk.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766417846/Ara_chloropterus-tab_vaqsjk.png',
              'image',
              'Green the Macaw'
       ),
       (
              48,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766399804/Buceros_rhinoceros_uczklh.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766417837/Buceros_rhinoceros-tab_oo0fjb.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766417837/Buceros_rhinoceros-tab_oo0fjb.png',
              'image',
              'Horn the Rhinoceros Hornbill'
       ),
       (
              49,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766399806/cotinga_nattererii_kmu4fz.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766417832/cotinga_nattererii-tab_dolfys.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766417832/cotinga_nattererii-tab_dolfys.png',
              'image',
              'Blue the Cotinga'
       ),
       (
              50,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766399803/harpia_eagle_ndadhi.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766417848/harpia_eagle-tab_okvdpu.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766417848/harpia_eagle-tab_okvdpu.png',
              'image',
              'Eagle the Harpy Eagle'
       ),
       (
              51,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766399807/Pharomachrus_mocinno_ick4xe.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766417835/Pharomachrus_mocinno-tab_ref4wd.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766417835/Pharomachrus_mocinno-tab_ref4wd.png',
              'image',
              'Quetzal the Quetzal'
       ),
       (
              52,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766399809/Picus_viridis_hmg5nf.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766417844/Picus_viridis-tab_eht1q3.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766417844/Picus_viridis-tab_eht1q3.png',
              'image',
              'Peck the Woodpecker'
       ),
       (
              53,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766399812/Probosciger_aterrimus_zhotv4.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766417839/Probosciger_aterrimus-tab_sqfj16.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766417839/Probosciger_aterrimus-tab_sqfj16.png',
              'image',
              'Cockatoo the Palm Cockatoo'
       ),
       (
              54,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766399810/Psittacus_erithacus_x2rbbc.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766417841/Psittacus_erithacus-tab_bjmacc.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766417841/Psittacus_erithacus-tab_bjmacc.png',
              'image',
              'Grey the Grey Parrot'
       ),
       (
              55,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766399811/Ramphastos_sulfuratus_yjngrm.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766417850/Ramphastos_sulfuratus-tab_syj7bv.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766417850/Ramphastos_sulfuratus-tab_syj7bv.png',
              'image',
              'Toucan the Toucan'
       ),
       (
              56,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766399814/Trochilidae_hflrnu.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766417831/Trochilidae-tab_aivyeu.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766417831/Trochilidae-tab_aivyeu.png',
              'image',
              'Humming the Hummingbird'
       ),
       -- Swamp Birds (58-70)
       (
              57,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766401266/anhinga_rufa_llgrfy.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766421447/anhinga_rufa-tab_prgz1b.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766421447/anhinga_rufa-tab_prgz1b.png',
              'image',
              'Anhinga the African Darter'
       ),
       (
              58,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766401301/Ardea_alba_dody5h.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766421452/Ardea_alba-tab_feiljn.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766421452/Ardea_alba-tab_feiljn.png',
              'image',
              'Egret the Great Egret'
       ),
       (
              59,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766401270/Ardea_cinerea_xpxsgc.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766421454/Ardea_cinerea-tab_xtmorx.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766421454/Ardea_cinerea-tab_xtmorx.png',
              'image',
              'Grey the Grey Heron'
       ),
       (
              60,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766401297/Eudocimus_ruber_orjyzx.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766421448/Eudocimus_ruber-tab_nsykxr.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766421448/Eudocimus_ruber-tab_nsykxr.png',
              'image',
              'Red the Scarlet Ibis'
       ),
       (
              61,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766401279/Himantopus_himantopus_uupazn.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766421460/Himantopus_himantopus-tab_fezjfg.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766421460/Himantopus_himantopus-tab_fezjfg.png',
              'image',
              'Stilt the Black-winged Stilt'
       ),
       (
              62,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766401275/Jabiru_mycteria_kbbnig.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766421450/Jabiru_mycteria-tab_elj2ow.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766421450/Jabiru_mycteria-tab_elj2ow.png',
              'image',
              'Jabiru the Jabiru'
       ),
       (
              63,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766401284/Leptoptilos_crumenifer_ux5ngo.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766421451/Leptoptilos_crumenifer-tab_gjkxw8.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766421451/Leptoptilos_crumenifer-tab_gjkxw8.png',
              'image',
              'Marabou the Marabou Stork'
       ),
       (
              64,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766401243/Microcarbo_africanus_dfwzyp.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766421453/Microcarbo_africanus-tab_mxnbyn.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766421453/Microcarbo_africanus-tab_mxnbyn.png',
              'image',
              'Cormorant the Reed Cormorant'
       ),
       (
              65,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766401247/Phalacrocorax_carbo_irhkig.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766421454/Phalacrocorax_carbo-tab_mhoryk.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766421454/Phalacrocorax_carbo-tab_mhoryk.png',
              'image',
              'Great the Great Cormorant'
       ),
       (
              66,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766401288/Phoeniconaias_minor_eqhwou.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766421456/Phoeniconaias_minor-tab_velz9q.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766421456/Phoeniconaias_minor-tab_velz9q.png',
              'image',
              'Lesser the Lesser Flamingo'
       ),
       (
              67,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766401256/Phoenicopterus_roseus_o6eqe7.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766421459/Phoenicopterus_roseus-tab_hpf8a9.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766421459/Phoenicopterus_roseus-tab_hpf8a9.png',
              'image',
              'Greater the Greater Flamingo'
       ),
       (
              68,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766401251/platalea_ajaja_vjqzze.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766421457/platalea_ajaja-tab_ubzrvb.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766421457/platalea_ajaja-tab_ubzrvb.png',
              'image',
              'Rose the Roseate Spoonbill'
       ),
       (
              69,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766401292/Platalea_leucorodia_kqysuv.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766421458/Platalea_leucorodia-tab_kcr7wo.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766421458/Platalea_leucorodia-tab_kcr7wo.png',
              'image',
              'Eurasia the Eurasian Spoonbill'
       ),
       -- Savannah Birds (72-81)
       (
              70,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766400624/Burhinus_vermiculatus_ydqufm.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766419349/Burhinus_vermiculatus-tab_mjvmzo.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766419349/Burhinus_vermiculatus-tab_mjvmzo.png',
              'image',
              'Water the Water Thick-knee'
       ),
       (
              71,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766400644/Coracias_abyssinicus_ilbkye.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766419336/Coracias_abyssinicus-tab_wmehr5.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766419336/Coracias_abyssinicus-tab_wmehr5.png',
              'image',
              'Abyssinian the Abyssinian Roller'
       ),
       (
              72,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766400630/Gyps_fulvus_heqvzh.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766419359/Gyps_fulvus-tab_srxukn.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766419359/Gyps_fulvus-tab_srxukn.png',
              'image',
              'Vulture the Griffon Vulture'
       ),
       (
              73,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766400633/Ploceus_velatus_wy6knn.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766419370/Ploceus_velatus-tab_stpkok.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766419370/Ploceus_velatus-tab_stpkok.png',
              'image',
              'Weaver the Southern Masked Weaver'
       ),
       (
              74,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766400641/Polemaetus_bellicosus_pqbfpo.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766419367/Polemaetus_bellicosus-tab_rbgq6z.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766419367/Polemaetus_bellicosus-tab_rbgq6z.png',
              'image',
              'Martial the Martial Eagle'
       ),
       (
              75,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766400636/Pternistis_adspersus_jmkzie.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766419356/Pternistis_adspersus-tab_gohusc.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766419356/Pternistis_adspersus-tab_gohusc.png',
              'image',
              'Bill the Red-billed Spurfowl'
       ),
       (
              76,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766400647/Sagittarius_serpentarius_b0gklk.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766419346/Sagittarius_serpentarius-tab_ootusy.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766419346/Sagittarius_serpentarius-tab_ootusy.png',
              'image',
              'Secretary the Secretarybird'
       ),
       (
              77,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766400650/Struthio_camelus_wsnrn6.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766419343/Struthio_camelus-tab_hgxxq0.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766419343/Struthio_camelus-tab_hgxxq0.png',
              'image',
              'Ostrich the Ostrich'
       ),
       (
              78,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766400653/Vanellus_albiceps_eqvtod.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766419354/Vanellus_albiceps-tab_r8lm4c.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766419354/Vanellus_albiceps-tab_r8lm4c.png',
              'image',
              'Crown the White-crowned Lapwing'
       ),
       (
              79,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766400627/Vanellus_armatus_cmjqfn.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766419339/Vanellus_armatus-tab_wzukt8.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766419339/Vanellus_armatus-tab_wzukt8.png',
              'image',
              'Blacksmith the Blacksmith Lapwing'
       ),
       -- Swamp Reptiles (82-87)
       (
              80,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766401683/Acanthochelys_spixii_ovkzk6.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766421187/Acanthochelys_spixii-tab_saoe9o.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766421187/Acanthochelys_spixii-tab_saoe9o.png',
              'image',
              'Spine the Swamp Turtle'
       ),
       (
              81,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766401669/Alligator_mississippiensis_hpmkev.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766421187/Alligator_mississippiensis-tab_i2gify.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766421187/Alligator_mississippiensis-tab_i2gify.png',
              'image',
              'Alli the American Alligator'
       ),
       (
              82,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766401688/caiman_yacare_oukor8.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766421188/caiman_yacare-tab_zv9kxm.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766421188/caiman_yacare-tab_zv9kxm.png',
              'image',
              'Yacare the Yacare Caiman'
       ),
       (
              83,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766401674/Crocodylus_niloticus_zpof9r.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766421189/Crocodylus_niloticus-tab_qnscq9.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766421189/Crocodylus_niloticus-tab_qnscq9.png',
              'image',
              'Nile the Nile Crocodile'
       ),
       (
              84,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766401664/Gavialis_gangeticus_gkmbrm.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766421189/Gavialis_gangeticus-tab_n9oau2.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766421189/Gavialis_gangeticus-tab_n9oau2.png',
              'image',
              'Gharial the Gharial'
       ),
       (
              85,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766401678/Melanosuchus_niger_xm1tff.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766421189/Melanosuchus_niger-tab_q04okk.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766421189/Melanosuchus_niger-tab_q04okk.png',
              'image',
              'Black the Black Caiman'
       ),
       -- Savannah Reptiles (88-92)
       (
              86,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766400260/agama_agama_m16cnd.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766418343/agama_agama-tab_q6hhxt.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766418343/agama_agama-tab_q6hhxt.png',
              'image',
              'Agama the Agama Lizard'
       ),
       (
              87,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766400262/Aldabrachelys_gigantea_bptz2j.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766418348/Aldabrachelys_gigantea-tab_poqmju.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766418348/Aldabrachelys_gigantea-tab_poqmju.png',
              'image',
              'Giant the Aldabra Giant Tortoise'
       ),
       (
              88,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766400258/chamaeleo_africanus_ouxeun.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766418351/chamaeleo_africanus-tab_uqqauh.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766418351/chamaeleo_africanus-tab_uqqauh.png',
              'image',
              'Chameleon the African Chameleon'
       ),
       (
              89,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766400266/Gopherus_evgoodei_wxrm1i.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766418345/Gopherus_evgoodei-tab_bqlopw.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766418345/Gopherus_evgoodei-tab_bqlopw.png',
              'image',
              'Gopherus the Thornscrub Tortoise'
       ),
       (
              90,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766400264/Hemidactylus_turcicus_qjl2fj.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766418340/Hemidactylus_turcicus-tab_htjmrn.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766418340/Hemidactylus_turcicus-tab_htjmrn.png',
              'image',
              'Gecko the Mediterranean House Gecko'
       ),
       -- Jungle Amphibians (93-97)
       (
              91,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766399988/Agalychnis_callidryas_jd6ce6.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766418085/Agalychnis_callidryas-tab_rytokq.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766418085/Agalychnis_callidryas-tab_rytokq.png',
              'image',
              'Eyes the Red-Eyed Tree Frog'
       ),
       (
              92,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766399981/Dendrobates_tinctorius_azureus_wwdxkg.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766418092/Dendrobates_tinctorius_azureus-tab_ec66qx.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766418092/Dendrobates_tinctorius_azureus-tab_ec66qx.png',
              'image',
              'Blue the Blue Poison Dart Frog'
       ),
       (
              93,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766399983/Hyalinobatrachium_fleischmanni_jbdvxw.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766418090/Hyalinobatrachium_fleischmanni-tab_ajcobu.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766418090/Hyalinobatrachium_fleischmanni-tab_ajcobu.png',
              'image',
              'Crystal the Northern Glass Frog'
       ),
       (
              94,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766399984/Phyllobates_terribilis_cspwx4.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766418095/Phyllobates_terribilis-tab_xkbtlp.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766418095/Phyllobates_terribilis-tab_xkbtlp.png',
              'image',
              'Golden the Golden Poison Frog'
       ),
       (
              95,
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766399986/Phyllomedusa_bicolor_limjiq.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766418087/Phyllomedusa_bicolor-tab_n5zaja.png',
              'https://res.cloudinary.com/dxkdwzbs6/image/upload/v1766418087/Phyllomedusa_bicolor-tab_n5zaja.png',
              'image',
              'Bicolor the Bicolored Tree Frog'
       );

-- 18. Link MEDIA to ANIMALS
INSERT INTO
       media_relations (media_id, related_table, related_id, usage_type)
VALUES
       (1, 'animal_full', 1, 'main'),
       (2, 'animal_full', 2, 'main'),
       (3, 'animal_full', 3, 'main'),
       (4, 'animal_full', 4, 'main'),
       (5, 'animal_full', 5, 'main'),
       (6, 'animal_full', 6, 'main'),
       (7, 'animal_full', 7, 'main'),
       (8, 'animal_full', 8, 'main'),
       (9, 'animal_full', 9, 'main'),
       (10, 'animal_full', 10, 'main'),
       (11, 'animal_full', 11, 'main'),
       (12, 'animal_full', 12, 'main'),
       (13, 'animal_full', 13, 'main'),
       (14, 'animal_full', 14, 'main'),
       (15, 'animal_full', 15, 'main'),
       (16, 'animal_full', 16, 'main'),
       (17, 'animal_full', 17, 'main'),
       (18, 'animal_full', 18, 'main'),
       (19, 'animal_full', 19, 'main'),
       (20, 'animal_full', 20, 'main'),
       (21, 'animal_full', 21, 'main'),
       (22, 'animal_full', 22, 'main'),
       (23, 'animal_full', 23, 'main'),
       (24, 'animal_full', 24, 'main'),
       (25, 'animal_full', 25, 'main'),
       (26, 'animal_full', 26, 'main'),
       (27, 'animal_full', 27, 'main'),
       (28, 'animal_full', 28, 'main'),
       (29, 'animal_full', 29, 'main'),
       (30, 'animal_full', 30, 'main'),
       (31, 'animal_full', 31, 'main'),
       (32, 'animal_full', 32, 'main'),
       (33, 'animal_full', 33, 'main'),
       (34, 'animal_full', 34, 'main'),
       (35, 'animal_full', 35, 'main'),
       (36, 'animal_full', 36, 'main'),
       (37, 'animal_full', 37, 'main'),
       (38, 'animal_full', 38, 'main'),
       (39, 'animal_full', 39, 'main'),
       (40, 'animal_full', 40, 'main'),
       (41, 'animal_full', 41, 'main'),
       (42, 'animal_full', 42, 'main'),
       (43, 'animal_full', 43, 'main'),
       (44, 'animal_full', 44, 'main'),
       (45, 'animal_full', 45, 'main'),
       (46, 'animal_full', 46, 'main'),
       (47, 'animal_full', 47, 'main'),
       (48, 'animal_full', 48, 'main'),
       (49, 'animal_full', 49, 'main'),
       (50, 'animal_full', 50, 'main'),
       (51, 'animal_full', 51, 'main'),
       (52, 'animal_full', 52, 'main'),
       (53, 'animal_full', 53, 'main'),
       (54, 'animal_full', 54, 'main'),
       (55, 'animal_full', 55, 'main'),
       (56, 'animal_full', 56, 'main'),
       (57, 'animal_full', 57, 'main'),
       (58, 'animal_full', 58, 'main'),
       (59, 'animal_full', 59, 'main'),
       (60, 'animal_full', 60, 'main'),
       (61, 'animal_full', 61, 'main'),
       (62, 'animal_full', 62, 'main'),
       (63, 'animal_full', 63, 'main'),
       (64, 'animal_full', 64, 'main'),
       (65, 'animal_full', 65, 'main'),
       (66, 'animal_full', 66, 'main'),
       (67, 'animal_full', 67, 'main'),
       (68, 'animal_full', 68, 'main'),
       (69, 'animal_full', 69, 'main'),
       (70, 'animal_full', 70, 'main'),
       (71, 'animal_full', 71, 'main'),
       (72, 'animal_full', 72, 'main'),
       (73, 'animal_full', 73, 'main'),
       (74, 'animal_full', 74, 'main'),
       (75, 'animal_full', 75, 'main'),
       (76, 'animal_full', 76, 'main'),
       (77, 'animal_full', 77, 'main'),
       (78, 'animal_full', 78, 'main'),
       (79, 'animal_full', 79, 'main'),
       (80, 'animal_full', 80, 'main'),
       (81, 'animal_full', 81, 'main'),
       (82, 'animal_full', 82, 'main'),
       (83, 'animal_full', 83, 'main'),
       (84, 'animal_full', 84, 'main'),
       (85, 'animal_full', 85, 'main'),
       (86, 'animal_full', 86, 'main'),
       (87, 'animal_full', 87, 'main'),
       (88, 'animal_full', 88, 'main'),
       (89, 'animal_full', 89, 'main'),
       (90, 'animal_full', 90, 'main'),
       (91, 'animal_full', 91, 'main'),
       (92, 'animal_full', 92, 'main'),
       (93, 'animal_full', 93, 'main'),
       (94, 'animal_full', 94, 'main'),
       (95, 'animal_full', 95, 'main');

-- ============================================================
-- END OF SEED DATA FOR ANIMALS (Categories, Species, Nutrition, Animals)
-- ✨✨✨✨✨✨✨✨✨✨✨✨✨✨✨✨✨✨✨✨✨✨✨✨
-- ============================================================