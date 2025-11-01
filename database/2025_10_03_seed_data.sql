
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
  -- 2 Veterinarians and 1 Admin
  (25, 'celinem', 'celinem123', true, 1, 25), 
  (26, 'oliviera', 'oliviera123', true, 1, 26), 
  (27, 'sandrines', 'sandrines123', true, 3, 27), 
  -- 4 unassigned and/or inactive users
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