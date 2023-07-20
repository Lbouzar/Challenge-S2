<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $formType = $_POST['formType'] ?? null;

    // Database configuration
    $host = $_POST['host'] ?? null;
    $port = $_POST['port'] ?? null;
    $dbname = $_POST['db_name'] ?? null;
    $user = $_POST['db_user'] ?? null;
    $db_password = $_POST['db_password'] ?? null;

    if ($formType === null || ($formType !== 'user' && $formType !== 'database')) {
        echo "Invalid formType. Please specify 'user' or 'database'.";
        exit;
    }

    try {
        $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $db_password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Database connection error: " . $e->getMessage();
        exit;
    }

    if ($formType === 'user') {
        $name = $_POST['name'] ?? null;
        $email = $_POST['email'] ?? null;
        $prenom = $_POST['prenom'] ?? null;
        $password = $_POST['password'] ?? null;

        if ($name === null || $email === null || $prenom === null || $password === null) {
            echo "Incomplete user information. Please provide all required fields.";
            exit;
        }

        $hash_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "
            CREATE TABLE IF NOT EXISTS admin (
                id SERIAL PRIMARY KEY,
                name VARCHAR(50) NOT NULL,
                email VARCHAR(100) NOT NULL,
                prenom VARCHAR(50) NOT NULL,
                password VARCHAR(255) NOT NULL
            )
        ";

        $pdo->exec($sql);

        $sql = "
            INSERT INTO admin (name, email, prenom, password)
            VALUES (:name, :email, :prenom, :password)
        ";

        try {
            $statement = $pdo->prepare($sql);
            $statement->execute([
                'name' => $name,
                'email' => $email,
                'prenom' => $prenom,
                'password' => $hash_password,
            ]);
            echo "User information submitted successfully!";
        } catch (PDOException $e) {
            echo "Error inserting user information: " . $e->getMessage();
            exit;
        }
    } elseif ($formType === 'database') {
        if ($host === null || $port === null || $dbname === null || $user === null || $db_password === null) {
            echo "Incomplete database configuration. Please provide all required fields.";
            exit;
        }

        try {
            $sql = "CREATE DATABASE $dbname";
            $pdo->exec($sql);
            echo "Database created successfully!";
        } catch (PDOException $e) {
            echo "Error creating database: " . $e->getMessage();
            exit;
        }
    }
}
?>
