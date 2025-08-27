

-- 1. Insertar ROLES primero (no dependen de otro)
INSERT INTO roles (id_role, role_name, role_description) VALUES
  (1, 'veterinario', 'Personal veterinario del zoo'),
  (2, 'empleado', 'Empleado general del zoo'),
  (3, 'admin', 'Administrador del sistema');

-- 2. Insertar USUARIOS (ahora sí existen los roles)
INSERT INTO users (u_first_name, u_last_name, email, psw, role_id) VALUES 
  ('Maria-Marcela', 'Bandila', 'lukskywalker02@gmail.com', '123456@!', 2),
  ('Dumitru', 'Stefan-Fernando', 'dumitru@arcadia.com', 'lucas2019', 1),
  ('Ana', 'Lopez', 'ana@example.com', 'password123', 2),
  ('Carlos', 'Ramirez', 'carlos@example.com', 'qwerty2024', NULL);
