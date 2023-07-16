<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve the form data
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  $password = $_POST['password'];

  // Database configuration
  $host = 'database';
  $port = getenv('DB_PORT');
  $database = getenv('POSTGRES_DB_DEV');
  $user = getenv('POSTGRES_USER_DEV');
  $password = getenv('POSTGRES_PASSWORD_DEV');

  var_dump($user);
  var_dump($password);

  // Create a new PDO instance
  $dsn = "pgsql:host=$host;port=$port;dbname=$database;user=$user;password=$password";
  $pdo = new PDO($dsn);

  // Prepare the SQL statement
  $statement = $pdo->prepare("INSERT INTO users (name, email, message, password) VALUES (?, ?, ?, ?)");

  // Bind the form data to the prepared statement parameters
  $statement->bindParam(1, $name);
  $statement->bindParam(2, $email);
  $statement->bindParam(3, $message);
  $statement->bindParam(4, $password);

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
