
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
  (11, 'Lakaka', 'Abunda', 'fdab222hadf@gmail.com', '1990-03-23', '735475347354', '4735eruturet', 'Bubua', '675848', 'Angola', 'female', 'married');

-- 4. Insert USERS (credentials and links)
INSERT INTO users (id_user, username, psw, is_active, role_id, employee_id) VALUES 
  (1, 'mariab', 'mariab123', true, 2, NULL),   -- Maria is an Employee
  (2, 'dumitrus', 'dumitrus123', true, 1, 2),  -- Dumitru is a Veterinary
  (3, 'sophiem', 'sophiem123', true, 3, 3),   -- Sophie is an Admin (Boss)
  (4, 'pierred', 'pierred123', true, 3, NULL),   -- Pierre is a Veterinary
  (5, 'emmab', 'emmab123', true, 2, 5),     -- Emma is an Employee
  (6, 'lucasm', 'lucasm123', true, NULL, 6),    -- Lucas is an Accountant
  (7, 'mariel', 'mariel123', true, 3, 7),     -- Marie is an Admin (Boss)
  (8, 'thomasg', 'thomasg123', true, 2, 8),    -- Thomas is an Employee
  (9, 'julienp', 'julienp123', true, NULL, 9),    -- Julien is an Employee (sin rol en tu caché)
  (10, 'isabeller', 'isabeller123', true, 3, 10),-- Isabelle is an Admin (Boss)
  (11, 'lakakaa', 'lakakaa123', true, 2, 11);  -- Lakaka es un Employee (sin rol en tu caché, le asigno 2 por defecto)

-- NOTE: The passwords here are placeholders. In a real application, 
-- they should be generated and hashed using password_hash() in PHP.