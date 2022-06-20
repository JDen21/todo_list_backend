<?php 
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "SensibleRootPassword@2022";
$dbname = "task_schema";

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
// sample query
//   $query = "CREATE TABLE task (
//     id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     taskName VARCHAR(30) NOT NULL,
//     descripts VARCHAR(500) NOT NULL,
//     dateStarted DATE NOT NULL,
//     dateEnd DATE,
//     taskFinished BOOL
//     )";

// if ($conn->query($query) === TRUE) {
//   echo "Table MyGuests created successfully";
// } else {
//   echo "Error creating table: " . $conn->error;
// }

// print("comes from database.php \n");

?>