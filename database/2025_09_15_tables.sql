-- 2025_01_19_Tables.Sql
-- The creation of the main tables for zoo arcadia

-- Drop all tables if they exist (in reverse order to avoid foreign key conflicts)
DROP TABLE IF EXISTS feeding_logs;
DROP TABLE IF EXISTS nutrition;
DROP TABLE IF EXISTS health_state_report;
DROP TABLE IF EXISTS animal_full;
DROP TABLE IF EXISTS service_logs;
DROP TABLE IF EXISTS services;
DROP TABLE IF EXISTS animal_clicks;
DROP TABLE IF EXISTS animal_general;
DROP TABLE IF EXISTS breed;
DROP TABLE IF EXISTS specie;
DROP TABLE IF EXISTS habitat_suggestion;
DROP TABLE IF EXISTS habitats;
DROP TABLE IF EXISTS psw_reset_token;
DROP TABLE IF EXISTS testimonials;
DROP TABLE IF EXISTS user_permissions;
DROP TABLE IF EXISTS roles_permissions;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS permissions;
DROP TABLE IF EXISTS roles;
DROP TABLE IF EXISTS slides;
DROP TABLE IF EXISTS headers;
DROP TABLE IF EXISTS media_relations;
DROP TABLE IF EXISTS media_responsive;
DROP TABLE IF EXISTS media;
DROP TABLE IF EXISTS bricks;
DROP TABLE IF EXISTS opening;
DROP TABLE IF EXISTS form_contact;

-- Form_Contact Table: To store the contact form data
CREATE TABLE form_contact (
    id_form INT AUTO_INCREMENT PRIMARY KEY,
    -- Primary key that increases automatically.
    ff_name VARCHAR(50) NOT NULL,
    -- Name of the sender cannot be null.
    fl_name VARCHAR(50) NOT NULL,
    -- Surname of the sender cannot be null.
    f_email VARCHAR(100) NOT NULL,
    -- Email of the sender cannot be null.
    -- Validation of the email format to do it in the application.
    f_subject VARCHAR(100),
    -- Optional message matter.
    f_message TEXT NOT NULL,
    -- Body of the mandatory message, since it is the main content.
    f_sent_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP -- Date of sending the message.It is automatically established at the time of insertion.
);

--
--
-- Opening table: stores opening schedules
CREATE TABLE opening (
    id_opening INT AUTO_INCREMENT PRIMARY KEY,
    -- Unique primary key, self-equal.
    time_slot ENUM("morning", "afternoon", "saturday", "sunday") NOT NULL,
    -- Indicates the specific time or day block cannot be null.
    opening_time TIME NOT NULL,
    -- Compulsory opening time.
    closing_time TIME NOT NULL,
    -- Mandatory closing time.
    status ENUM("open", "closed") NOT NULL DEFAULT "open",
    -- Status of the schedule (open or closed), by default is open.
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP -- Date and time of the last modification, it is automatically updated.
);

--
--
-- Bricks table: represents sections or elements managed by the admin
CREATE TABLE bricks (
    id_brick INT AUTO_INCREMENT PRIMARY KEY,
    -- Unique Brick identifier.
    b_title VARCHAR(100) NOT NULL,
    -- Brick title.Mandatory.
    b_description TEXT NOT NULL,
    -- Brick description.Mandatory
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    -- Creation dates
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP -- Date of update.
);

--
--
-- Medium table: stores multimedia files (images, videos, audios)
CREATE TABLE media (
    id_media INT AUTO_INCREMENT PRIMARY KEY,
    -- Unique image identifier
    media_path VARCHAR(2048) NOT NULL,
    -- Mobile (main) URL
    media_path_medium VARCHAR(2048),
    -- URL for tablet (optional)
    media_path_large VARCHAR(2048),
    -- URL for desktop (optional)
    media_type ENUM('image', 'video', 'audio') NOT NULL,
    -- Multimedia file type
    description VARCHAR(255),
    -- Optional description of the image
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    -- Creation date
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP -- Last update date
);

--
--
-- Responsive Middle Table: Stores Responsible Versions of the Images
CREATE TABLE media_responsive (
    id_responsive INT AUTO_INCREMENT PRIMARY KEY,
    -- Unique identifier of the responsive version.
    media_id INT NOT NULL,
    -- Relationship with the average table.Indicates which main image this version belongs.
    media_size ENUM('small', 'medium', 'large') NOT NULL,
    -- Version size.It can be small (Small), medium (medium) or large (Large).
    media_path VARCHAR(2048) NOT NULL,
    -- URL of the specific version of the image.
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    -- Date of creation of the registration.
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP -- Date of the last registration update.
);

--
--
-- Medium_Relation table: relates multimedia files to other boards in a polymorphic way
CREATE TABLE media_relations (
    id_relation INT AUTO_INCREMENT PRIMARY KEY,
    -- Unique identifier of the relationship.
    media_id INT NOT NULL,
    -- Foreign key to the average table.
    related_table VARCHAR(50) NOT NULL,
    -- Name of the related table.
    related_id INT NOT NULL,
    -- Registration ID in the related table.
    usage_type VARCHAR(100),
    -- Use of the multimedia file (Example: 'Main_image', 'Thumbnail').
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    -- Creation dates.
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP -- Update dates.
);

--
--
-- Headers table: stores pages headings
CREATE TABLE headers (
    id_header INT AUTO_INCREMENT PRIMARY KEY,
    -- Single identifier of the heading.
    header_title VARCHAR(100) NOT NULL,
    -- Mandatory heading title.
    header_subtitle VARCHAR(100),
    -- Subtitle of the optional header.
    has_sliders BOOLEAN DEFAULT FALSE,
    -- The heading has an associated carousel.
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP -- Automatic creation and update dates.
);

--
--
-- Slides table: stores the slides associated with a header
CREATE TABLE slides (
    id_slide INT AUTO_INCREMENT PRIMARY KEY,
    -- Unique slide identifier.
    id_header INT NOT NULL,
    -- Relationship with the Headers table.
    title_caption VARCHAR(255) NOT NULL,
    -- Title of the mandatory slide.
    description_caption TEXT NOT NULL,
    -- Description of the mandatory slide.
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    -- Creation dates
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP -- Update dates.
);

--
--
-- ROLES TABLE: stores system roles
CREATE TABLE roles (
    id_role INT AUTO_INCREMENT PRIMARY KEY,
    -- Unique role identifier.
    role_name VARCHAR(50) NOT NULL UNIQUE,
    -- Role name (unique and mandatory).
    role_description TEXT,
    -- Optional description of the role. 
    -- Description of the mandatory slide.
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    -- Creation dates
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP -- Update dates.
);

--
--
-- Permissions table: stores system permissions
CREATE TABLE permissions (
    id_permission INT AUTO_INCREMENT PRIMARY KEY,
    -- Unique permit identifier.
    permission_name VARCHAR(100) NOT NULL UNIQUE,
    -- Name of the permit (unique and mandatory).
    permission_desc TEXT
);

-- Employees table: stores employee information
CREATE TABLE employees (
    id_employee INT AUTO_INCREMENT PRIMARY KEY,
    -- Unique identifier for the employee.
    e_first_name VARCHAR(50) NOT NULL,
    -- Employee's first name.
    e_last_name VARCHAR(50) NOT NULL,
    -- Employee's last name.
    e_email VARCHAR(100) NOT NULL UNIQUE,
    -- Employee's unique contact email.
    e_birthdate DATE NOT NULL,
    -- Employee's birthdate.
    e_phone VARCHAR(15) NOT NULL,
    -- Employee's phone number.
    e_address VARCHAR(255) NOT NULL,
    -- Employee's physical address.
    e_city VARCHAR(100) NOT NULL,
    -- Employee's city of residence.
    e_country VARCHAR(100) NOT NULL,
    -- Employee's country of residence.
    e_zip_code VARCHAR(10) NOT NULL,
    -- Employee's zip code.
    e_gender ENUM('male', 'female') NOT NULL,
    -- Employee's gender.
    e_marital_status ENUM('single', 'married', 'divorced', 'widowed') NOT NULL,
    -- Employee's marital status.
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    -- Timestamp of record creation.
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    -- Timestamp of the last record update.
);


--
--
-- Users table: stores system users
CREATE TABLE users (
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    -- Unique identifier for the user account.
    username VARCHAR(50) NOT NULL UNIQUE,
    -- Unique username for login.
    psw VARCHAR(255) NOT NULL,
    -- Hashed password for security.
    role_id INT DEFAULT NULL,
    -- Foreign key to the 'roles' table, defines user's role.
    employee_id INT NULL UNIQUE,
    -- Foreign key to the 'employees' table, links account to an employee.
    is_active BOOLEAN NOT NULL DEFAULT TRUE,
    -- Flag to enable or disable the user account.
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    -- Timestamp of account creation.
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    -- Timestamp of the last account update.
);

--
--
-- User_permissions Table: relates users to permits
CREATE TABLE user_permissions (
    user_id INT NOT NULL,
    -- Relationship with the Users table.
    permission_id INT NOT NULL,
    -- Relationship with the permissions table.
    PRIMARY KEY (user_id, permission_id) -- Composite primary key.
);

--
--
-- Roles_permissions Table: relates users to permits
CREATE TABLE roles_permissions (
    role_id INT NOT NULL,
    -- Relationship with the Roles table.
    permission_id INT NOT NULL,
    -- Relationship with the permissions table.
    PRIMARY KEY (role_id, permission_id) -- Composite primary key.
);

--
--
-- TESTIMONIALS TABLE: stores system testimonies
CREATE TABLE testimonials (
    id_testimonial INT AUTO_INCREMENT PRIMARY KEY,
    -- Unique testimony identifier.
    pseudo VARCHAR(100) NOT NULL,
    -- pseudonym of the author of the testimony, mandatory.
    message TEXT NOT NULL,
    -- Testimony content, mandatory.
    rating TINYINT UNSIGNED NOT NULL CHECK (
        rating BETWEEN 1
        AND 5
    ),
    -- Testimony qualification (1 to 5 stars).
    status ENUM('pending', 'validated', 'rejected') DEFAULT 'pending',
    -- Status of testimony.By default, it is considered "pending."
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    -- Date of creation of the testimony.
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    -- Date of last update of the testimony.
    validated_at TIMESTAMP NULL DEFAULT NULL,
    -- Validation date of the optional testimony.
    validated_by INT DEFAULT NULL -- Optional relationship with the users table (validator).
);

--
--
-- PSW_RESET_ToKEN table: stores the password restoration tokens
CREATE TABLE psw_reset_token (
    id_reset_token INT AUTO_INCREMENT PRIMARY KEY,
    -- Single token identifier.
    token VARCHAR(255) NOT NULL UNIQUE,
    -- Unique and mandatory token.
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    -- Token creation date.It is assigned automatically.
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    -- Last update date.It is automatically updated.
    expires_at TIMESTAMP NOT NULL,
    -- Date and expiration time of the Token.
    user_id INT NOT NULL -- Relationship with the Users table (associated user).
);

--
--
-- Habitats table: defines habitats
CREATE TABLE habitats (
    id_habitat INT AUTO_INCREMENT PRIMARY KEY,
    -- Single habitat identifier.
    habitat_name VARCHAR(100) NOT NULL,
    -- Habitat name.
    description_habitat VARCHAR(50) -- Brief description of the habitat.
);

--
--
-- Habitat_Suggestion Table: Habitats improvements suggestions
CREATE TABLE habitat_suggestion (
    id_hab_suggestion INT AUTO_INCREMENT PRIMARY KEY,
    -- Unique suggestion identifier.
    habitat_id INT NOT NULL,
    -- Relationship with the habitats.
    suggested_by INT NULL,
    -- User who suggests improvement.
    reviewed_by INT NULL,
    -- User who reviewed the suggestion.
    details TEXT NOT NULL,
    -- Details of the suggestion.
    proposed_on TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    -- Date proposed.
    status ENUM('accepted', 'rejected', 'pending') DEFAULT 'pending',
    -- Status of suggestion.
    reviewed_on TIMESTAMP -- Date reviewed.
);

--
--
-- Specie table: defines species
CREATE TABLE specie (
    id_specie INT AUTO_INCREMENT PRIMARY KEY,
    -- Unique identifier of the species.
    specie_name VARCHAR(50) NOT NULL UNIQUE -- Unique name of the species (mammals, birds, etc.).
    -- Note: Unique ensures that there are no duplicates.
);

--
--
-- Breed Table: Define races
CREATE TABLE breed (
    id_breed INT AUTO_INCREMENT PRIMARY KEY,
    -- Unique identifier of the breed.
    specie_id INT NOT NULL,
    -- Relationship with the Specie table.
    breed_name VARCHAR(50) NOT NULL -- Name of the race.
    -- Note: Unique is not used because a race can be similar in different species in other contexts.
);

--
--
-- Animal_general table: defines animals
CREATE TABLE animal_general (
    id_animal_g INT AUTO_INCREMENT PRIMARY KEY,
    -- Unique animal identifier.
    animal_name VARCHAR(50) NOT NULL,
    -- Name of the animal.
    gender ENUM('male', 'female') NOT NULL,
    -- Gender of the animal.
    breed_id INT NOT NULL -- Relationship with the BREED table.
    -- Note: Breed_id is mandatory because each animal must be associated with a race.
);

--
--
-- Animal_Click Table: Records clicks on animals
CREATE TABLE animal_clicks (
    id_click INT AUTO_INCREMENT PRIMARY KEY,
    -- Single click registration identifier.
    animal_g_id INT NOT NULL,
    -- Relationship with the animal_general table.
    year SMALLINT NOT NULL,
    -- Year of the click registration.
    month TINYINT NOT NULL CHECK (
        month BETWEEN 1
        AND 12
    ),
    -- Month of the Registry (1 = January, 12 = December).
    click_count INT NOT NULL DEFAULT 0,
    -- Number of clicks registered.
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP -- Date and time of the last update.
);

--
--
-- Services table: defines zoo services
CREATE TABLE services (
    id_service INT AUTO_INCREMENT PRIMARY KEY,
    -- Single service identifier.
    service_title VARCHAR(50) NOT NULL,
    -- Service title.
    service_description VARCHAR(100) NOT NULL,
    -- Brief description of the service.
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    -- Date of creation of the service.
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP -- Date of the last update.
);

--
--
-- Service_logs table: records changes in services
CREATE TABLE service_logs (
    id_service_log INT AUTO_INCREMENT PRIMARY KEY,
    -- Unique log identifier.
    service_id INT NOT NULL,
    -- Relationship with the Services table.
    changed_by INT NOT NULL,
    -- User who made the change (relationship with Users).
    change_type ENUM('update_title', 'update_description') NOT NULL,
    -- Exchange rate performed.
    previous_value TEXT NOT NULL,
    -- Anterior value of the modified field.
    new_value TEXT NOT NULL,
    -- New value of the modified field.
    change_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP -- Date of change.
);

--
--
-- Animal_Full Table: Complete information of an animal
CREATE TABLE animal_full (
    id_full_animal INT AUTO_INCREMENT PRIMARY KEY,
    -- Unique identifier of the complete animal.

    animal_g_id INT NOT NULL,
    -- Relationship with the animal_general table (animal_g).

    habitat_id INT NULL,
    -- Relationship with the habitats.

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    -- Date of creation of the registration.

    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    -- Date of the last update.
);

--
--
-- Health_state_report table: health reports
CREATE TABLE health_state_report (
    id_hs_report INT AUTO_INCREMENT PRIMARY KEY,
    -- Single identifier of the health report.

    full_animal_id INT NOT NULL,
    -- Relationship with the Animal_Full table.

    hsr_state ENUM('healthy', 'sick', 'quarantined') NOT NULL,
    -- Animal status.

    review_date DATE NOT NULL,
    -- Date of review of the report.

    vet_obs TEXT NOT NULL,
    -- Observations of the veterinarian.

    checked_by INT NULL,
    -- Veterinary that made the report (relationship with Users).

    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    -- Last update date.

    opt_details VARCHAR(255)
    -- Optional reports of the report.
);

--
--
-- Nutrition Table: Basic nutrition information
CREATE TABLE nutrition (
    id_nutrition INT AUTO_INCREMENT PRIMARY KEY,
    -- Single Identifier of the Nutrition Registry.

    nutrition_type ENUM('carnivorous', 'herbivorous', 'omnivorous') NOT NULL,
    -- Animal diet type.

    food_type ENUM('meat', 'fruit', 'legumes', 'insect') NOT NULL,
    -- Specific food type.

    food_qtty SMALLINT NOT NULL
    -- Amount of food in grams.
);

--
--
-- Feeding_logs table: feeding records
CREATE TABLE feeding_logs (
    id_feeding_log INT AUTO_INCREMENT PRIMARY KEY,
    -- Single Identifier of the Food Registry.

    animal_f_id INT NOT NULL,
    -- Relationship with the animal_full table (fed animal).

    user_id INT NULL,
    -- Relationship with the users table (employee that fed).

    food_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    -- Date and time when the food was recorded.

    food_type ENUM('meat', 'fruit', 'legumes', 'insect') NOT NULL,
    -- Type of food used in this diet.

    food_qtty SMALLINT NOT NULL,
    -- Amount of food given.

    nutrition_id INT NOT NULL
    -- Relationship with the Nutrition Table to specify nutritional details.
);



