<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $host = $_POST['host'] ?? null;
    $port = $_POST['port'] ?? null;
    $dbname = $_POST['db_name'] ?? null;
    $user = $_POST['db_user'] ?? null;
    $db_password = $_POST['db_password'] ?? null;
    if ($host === null || $port === null || $dbname === null || $user === null || $db_password === null) {
        echo "Incomplete database configuration. Please provide all required fields.";
        exit;
    }

    // Attempt to connect to the database
    $conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$db_password");
    
    // Check if $formType is 'database'
        // Validate required fields
        if (!$conn) {
            echo "Connection failed. Error was: " . $error['message'] . "\n";
        } else {
            echo "Connection successful.\n";
            $queries = [
                "DROP TABLE IF EXISTS ckr_role CASCADE",
                "CREATE TABLE ckr_role (
                    id INT PRIMARY KEY,
                    name VARCHAR(64)
                )",
            
                "DROP TABLE IF EXISTS ckr_user CASCADE",
                "CREATE TABLE ckr_user (
                    id INT PRIMARY KEY,
                    firstname VARCHAR(64),
                    lastname VARCHAR(64),
                    email VARCHAR(320),
                    password VARCHAR(255),
                    status INT DEFAULT 0,
                    role INT,
                    token VARCHAR(255) DEFAULT NULL,
                    FOREIGN KEY (role) REFERENCES ckr_role(id)
                )",
            
                "DROP TABLE IF EXISTS ckr_recipe CASCADE",
                "CREATE TABLE ckr_recipe (
                    id SERIAL PRIMARY KEY,
                    title VARCHAR(64),
                    description VARCHAR(64),
                    is_main INT DEFAULT 0,
                    is_active INT DEFAULT 0,
                    presentation TEXT,
                    preparation_time INT,
                    cooking_time INT,
                    price INT,
                    ingredients TEXT,
                    slug VARCHAR(64),
                    image VARCHAR(64)
                )",
            
                "DROP TABLE IF EXISTS ckr_article CASCADE",
                "CREATE TABLE ckr_article (
                    id SERIAL PRIMARY KEY,
                    title VARCHAR(64),
                    is_active INT DEFAULT 1,
                    keywords TEXT,
                    content TEXT,
                    slug VARCHAR(64),
                    image VARCHAR(64)
                )",
            
                "DROP TABLE IF EXISTS ckr_article_history CASCADE",
                "CREATE TABLE ckr_article_history (
                    id SERIAL PRIMARY KEY,
                    recipe INT,
                    title VARCHAR(64),
                    keywords TEXT,
                    content TEXT,
                    slug VARCHAR(64),
                    FOREIGN KEY (recipe) REFERENCES ckr_recipe(id)
                )",
            
                "DROP TABLE IF EXISTS ckr_comment_recipe CASCADE",
                "CREATE TABLE ckr_comment_recipe (
                    id SERIAL PRIMARY KEY,
                    creator INT,
                    recipe INT,
                    is_valid INT DEFAULT 0,
                    comment TEXT,
                    FOREIGN KEY (creator) REFERENCES ckr_user(id),
                    FOREIGN KEY (recipe) REFERENCES ckr_recipe(id)
                )",
            
                "DROP TABLE IF EXISTS ckr_menu CASCADE",
                "CREATE TABLE IF NOT EXISTS ckr_menu (
                    id INT PRIMARY KEY,
                    title VARCHAR(64),
                    link_route VARCHAR(64),
                    is_active INT DEFAULT 1
                )",
            
                "DROP TABLE IF EXISTS ckr_homepage CASCADE",
                "CREATE TABLE IF NOT EXISTS ckr_homepage (
                    id INT PRIMARY KEY,
                    slogan VARCHAR(64),
                    firsttitle VARCHAR(64),
                    secondtitle VARCHAR(64),
                    logo VARCHAR(64)
                )",
            
                "DROP TABLE IF EXISTS ckr_recipespage CASCADE",
                "CREATE TABLE IF NOT EXISTS ckr_recipespage (
                    id INT PRIMARY KEY,
                    title VARCHAR(64),
                    main_recipe_title VARCHAR(64)
                )",
            
                "DROP TABLE IF EXISTS ckr_articlespage CASCADE",
                "CREATE TABLE IF NOT EXISTS ckr_articlespage (
                    id SERIAL,
                    title CHARACTER VARYING(64) COLLATE pg_catalog.\"default\",
                    CONSTRAINT ckr_articlespage_pkey PRIMARY KEY (id)
                )",
            
                "DROP TABLE IF EXISTS ckr_contactpage CASCADE",
                "CREATE TABLE IF NOT EXISTS ckr_contactpage (
                    id INT PRIMARY KEY,
                    title VARCHAR(64),
                    content TEXT
                )",
            
                "DROP TABLE IF EXISTS ckr_registerpage CASCADE",
                "CREATE TABLE IF NOT EXISTS ckr_registerpage (
                    id INT PRIMARY KEY,
                    title VARCHAR(64),
                    link_title VARCHAR(64),
                    link_route VARCHAR(64)
                )",
            
                "DROP TABLE IF EXISTS ckr_loginpage CASCADE",
                "CREATE TABLE IF NOT EXISTS ckr_loginpage (
                    id INT PRIMARY KEY,
                    title VARCHAR(64),
                    link_title VARCHAR(64),
                    link_route VARCHAR(64)
                )",
            
                "DROP TABLE IF EXISTS ckr_profilpage CASCADE",
                "CREATE TABLE IF NOT EXISTS ckr_profilpage (
                    id INT PRIMARY KEY,
                    firsttitle VARCHAR(64),
                    secondtitle VARCHAR(64),
                    lasttitle VARCHAR(64)
                )",
            
                "DROP TABLE IF EXISTS ckr_settings CASCADE",
                "CREATE TABLE IF NOT EXISTS ckr_settings (
                    id INT PRIMARY KEY,
                    font VARCHAR(64)
                )"
            ];
            
            // Execute the SQL queries
            foreach ($queries as $query) {
                $result = pg_query($conn, $query);
                if (!$result) {
                    echo "Error executing postgresql query: " . pg_last_error($conn);
                    
                }
            }
            
            echo "Database setup completed successfully.";
        } 
        $name = $_POST['name'] ?? null;
        $email = $_POST['email'] ?? null;
        $prenom = $_POST['prenom'] ?? null;
        $password = $_POST['password'] ?? null;

        if ($name === null || $email === null || $prenom === null || $password === null) {
            echo "Incomplete user information. Please provide all required fields.";
            exit;
        }

        $hash_password = password_hash($password, PASSWORD_DEFAULT);
        $allowedTables = ['ckr_role', 'ckr_user'];
        $query = "ALTER TABLE ckr_user ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (INCREMENT 1)";
$result = pg_query($conn, $query);
if (!$result) {
    echo "Error modifying ckr_user table: " . pg_last_error($conn);
    exit;
}
        // Whitelist of allowed column names for each table
        $allowedColumns = [
            'ckr_role' => ['id', 'name'],
            'ckr_user' => ['firstname', 'lastname', 'email', 'password', 'status', 'role'],
        ];
        $tableName = 'ckr_user'; // You can adjust this based on your requirements
        if (!in_array($tableName, $allowedTables)) {
            echo "Invalid table name.";
            exit;
        }

        // Check if the column names are allowed
        $columnNames = ['firstname', 'lastname', 'email', 'password', 'status', 'role']; // You can adjust this based on your requirements
        foreach ($columnNames as $columnName) {
            if (!in_array($columnName, $allowedColumns[$tableName])) {
                echo "Invalid column name: $columnName.";
                exit;
            }
        }
        $roleQuery = "INSERT INTO ckr_role (id, name) VALUES (1, 'Admin')";
        $result = pg_query($conn, $roleQuery);

        if (!$result) {
            echo "Error inserting role information: " . pg_last_error($conn);
            exit;
        }

        // Insert admin user with the role id 1 (corresponding to "Admin" role)
        $userQuery = "INSERT INTO ckr_user (firstname, lastname, email, password, status, role)
                      VALUES ($1, $2, $3, $4, 0, 1)";

        $params = array($prenom, $name, $email, $hash_password);
        $result = pg_query_params($conn, $userQuery, $params);

        if (!$result) {
            echo "Error inserting user information: " . pg_last_error($conn);
            exit;
        }

        echo "Admin user information submitted successfully!";
    }
?>
