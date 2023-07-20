<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve the form data
  $name = $_POST['name'];
  $email = $_POST['email'];
  $prenom = $_POST['prenom'];
  $password = $_POST['password'];
  
  $hash_password = password_hash($password, PASSWORD_DEFAULT);
  // Database configuration
  $host = $_POST['host'];
  $port = $_POST['port'];
  $dbname = $_POST['db_name'];
  $user = $_POST['db_user'];
  $db_password = $_POST['db_password'];
  //create db:

try {
  // Connect to the PostgreSQL server using PDO
  $pdo = new PDO("pgsql:host=$host", $user, $db_password);
  
  // Set the PDO error mode to exception
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  // Create the database
  $sql = "CREATE DATABASE $dbname";
  $pdo->exec($sql);
  
  echo "Database created successfully!";
} catch (PDOException $e) {
  echo "Error creating database: " . $e->getMessage();
}


  // Create a new PDO instance
  $dsn = "pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$db_password";
  $pdo = new PDO($dsn);

  // Prepare the SQL statement
  $statement = $pdo->prepare("INSERT INTO users (name, email, prenom, password) VALUES (?, ?, ?, ?)");

  // Bind the form data to the prepared statement parameters
  $statement->bindParam(1, $name);
  $statement->bindParam(2, $email);
  $statement->bindParam(3, $prenom);
  $statement->bindParam(4, $hash_password);

  // Execute the statement
  $success = $statement->execute();

  // Check if the query was successful
  if ($success) {
    $response = array(
      'status' => 'success',
      'message' => 'Form submitted successfully.'
    );
  } else {
    $response = array(
      'status' => 'error',
      'message' => 'Form submission failed.'
    );
  }

  // Send the response back to the front-end
  header('Content-Type: application/json');
  echo json_encode($response);
}
?>
