-- 2025_01_19_Tables.Sql
-- The creation of the main tables for zoo arcadia
-- Form_Contact Table: To store the contact form data
CREATE TABLE IF NOT EXISTS form_contact (
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
CREATE TABLE IF NOT EXISTS opening (
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
CREATE TABLE IF NOT EXISTS bricks (
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
CREATE TABLE IF NOT EXISTS media (
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
CREATE TABLE IF NOT EXISTS media_responsive (
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
CREATE TABLE IF NOT EXISTS media_relations (
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
CREATE TABLE IF NOT EXISTS headers (
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
CREATE TABLE IF NOT EXISTS slides (
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
CREATE TABLE IF NOT EXISTS roles (
    id_role INT AUTO_INCREMENT PRIMARY KEY,
    -- Unique role identifier.
    role_name VARCHAR(50) NOT NULL UNIQUE,
    -- Role name (unique and mandatory).
    role_description TEXT -- Optional description of the role.
);

--
--
-- Permissions table: stores system permissions
CREATE TABLE IF NOT EXISTS permissions (
    id_permission INT AUTO_INCREMENT PRIMARY KEY,
    -- Unique permit identifier.
    permission_name VARCHAR(100) NOT NULL UNIQUE,
    -- Name of the permit (unique and mandatory).
    permission_desc TEXT
);

--
--
-- ROLES TABLE: stores system roles
CREATE TABLE IF NOT EXISTS roles (
    id_role INT AUTO_INCREMENT PRIMARY KEY,
    -- Unique role identifier.Self -incremental primary key.
    role_name VARCHAR(50) NOT NULL UNIQUE,
    -- Unique name of the role, mandatory.
    role_description TEXT -- Optional description of the role.
    -- Note: A role may not be assigned to any user, it is independent.
);

--
--
-- Users table: stores system users
CREATE TABLE IF NOT EXISTS users (
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    -- Single identifier of the self-group user.
    u_first_name VARCHAR(50) NOT NULL,
    -- Name of the mandatory user.
    u_last_name VARCHAR(50) NOT NULL,
    -- Surname of the mandatory user.
    email VARCHAR(100) NOT NULL UNIQUE,
    -- Unique and mandatory email that guarantees that there are no duplicates.
    psw VARCHAR(255) NOT NULL,
    -- Encrypted, mandatory password.
    role_id INT DEFAULT NULL,
    -- Optional relationship with the roles table can be null.
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    -- Date and time of creation.
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP -- Date and time of the last update.
);

--
--
-- User_permissions Table: relates users to permits
CREATE TABLE IF NOT EXISTS user_permissions (
    user_id INT NOT NULL,
    -- Relationship with the Users table.
    permission_id INT NOT NULL,
    -- Relationship with the permissions table.
    PRIMARY KEY (user_id, permission_id) -- Composite primary key.
);

--
--
-- TESTIMONIALS TABLE: stores system testimonies
CREATE TABLE IF NOT EXISTS testimonials (
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
CREATE TABLE IF NOT EXISTS psw_reset_token (
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
CREATE TABLE IF NOT EXISTS habitats (
    id_habitat INT AUTO_INCREMENT PRIMARY KEY,
    -- Single habitat identifier.
    habitat_name VARCHAR(100) NOT NULL,
    -- Habitat name.
    description_habitat VARCHAR(50) -- Brief description of the habitat.
);

--
--
-- Habitat_Suggestion Table: Habitats improvements suggestions
CREATE TABLE IF NOT EXISTS habitat_suggestion (
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
CREATE TABLE IF NOT EXISTS specie (
    id_specie INT AUTO_INCREMENT PRIMARY KEY,
    -- Unique identifier of the species.
    specie_name VARCHAR(50) NOT NULL UNIQUE -- Unique name of the species (mammals, birds, etc.).
    -- Note: Unique ensures that there are no duplicates.
);

--
--
-- Breed Table: Define races
CREATE TABLE IF NOT EXISTS breed (
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
CREATE TABLE IF NOT EXISTS animal_general (
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
CREATE TABLE IF NOT EXISTS animal_clicks (
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
CREATE TABLE IF NOT EXISTS services (
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
CREATE TABLE IF NOT EXISTS service_logs (
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
CREATE TABLE IF NOT EXISTS animal_full (
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
CREATE TABLE IF NOT EXISTS health_state_report (
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
CREATE TABLE IF NOT EXISTS nutrition (
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
CREATE TABLE IF NOT EXISTS feeding_logs (
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



