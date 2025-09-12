

-- 1. Insertar ROLES primero (no dependen de otro)
INSERT INTO roles (id_role, role_name, role_description) VALUES
  (1, "Veterinary", "Zoo animal care in charge"),
  (2, "Employee", "Employee in charge of cleaning, maintenance, attention to the public, and animal nutrition"),
  (3, "Admin", "The boss of the zoo"),
  (4, "Accountant", "Accountant of the zoo");

-- 2. Insertar USUARIOS (ahora sí existen los roles)
INSERT INTO users (u_first_name, u_last_name, email, psw, role_id) VALUES 
  ("Maria-Marcela", "Bandila", "lukskywalker02@gmail.com", "123456@!", 2),
  ("Dumitru", "Stefan-Fernando", "dumitru@arcadia.com", "lucas2019", 1),
  ("Sophie", "Martin", "sophie.martin@arcadia.com", "Vet2024!", 3),
  ("Pierre", "Dubois", "pierre.dubois@arcadia.com", "Admin#2024", 1),
  ("Emma", "Bernard", "emma.bernard@arcadia.com", "Emma$2024", 2),
  ("Lucas", "Moreau", "lucas.moreau@arcadia.com", "Soigneur!24", 4),
  ("Marie", "Laurent", "marie.laurent@arcadia.com", "Veterin@ire", 3),
  ("Thomas", "Garcia", "thomas.garcia@arcadia.com", "Employ3e!", 2),
  ("Julien", "Petit", "julien.petit@arcadia.com", "Guide2024!", 2),
  ("Isabelle", "Robert", "isabelle.robert@arcadia.com", "VetChef#24", 3),
  ("Alexandre", "Simon", "alexandre.simon@arcadia.com", "Security$24", 2);