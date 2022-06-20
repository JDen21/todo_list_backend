<?php
    // setting my app CORS for separate vue app later on
    headerSettings();

    // includes
    include 'database.php'; 
    
    // checking conditional values
    // echo isset($_GET['test']);
    // print("\n");
    // echo $_GET['test'];
    print("\n");

    // // testing if condition for possible issues
    // if($_GET['test'] == "den"){
    //     echo 'if conditions work';
    // }
    // // var_dump($_POST);
    // // test for post requests and json
    // print("\n");
    // if($_GET['test'] == "testPass"){
    //     // echo "your post: ".$_POST['name'];
    //     $data = json_decode(file_get_contents('php://input'), true);
    //     var_dump($data);
    //     echo $data["name"];
    // }

    // // executing code if test request is executed
    // print("\n");    
    // if(isset($_GET['test'])){
    //     echo 'api work';
    // }

    if(isset($_GET['ops'])){
        if($_GET['ops'] == "addTask"){
            $data = json_decode(file_get_contents('php://input'), true);
            $query = "INSERT INTO task (taskName, descripts, dateStarted, dateEnd, taskFinished) VALUES ('"
            .$data['name']."', '"
            .$data['description']."', '"
            .$data['startDate']."', '"
            .$data['endDate']. "', false);";
            // var_dump($conn);
            if ($conn->query($query) === TRUE) {
                echo "Successfully inserted";
              } else {
                echo "Error insert: " . $conn->error;
              }
        }
        // change taskFinished
        if($_GET['ops'] == "taskFinished"){
            $data = json_decode(file_get_contents('php://input'), true);
            $query = "UPDATE task SET taskFinished = ".$data['taskFinished']." WHERE taskName = '".$data['name']."';";
            if ($conn->query($query) === TRUE) {
                echo 200;
              } else {
                echo "Error change: " . $conn->error;
              }
        }
        // delete task
        if($_GET['ops'] == "deleteTask"){
            $data = json_decode(file_get_contents('php://input'), true);
            $query = "DELETE FROM task WHERE taskName = '".$data['name']."';";
            if ($conn->query($query) === TRUE) {
                echo "Successfully changed";
              } else {
                echo "Error change: " . $conn->error;
              }
        }

        // init get * task
        if($_GET['ops'] == "init"){
            $query = "SELECT * FROM task;";
            // $data = [];
            if($result = $conn -> query($query)){
                
                while ($row = $result -> fetch_row()) {
                    $tempdata = array(
                        "name" => $row[1],
                        "description" => $row[2],
                        "dateStarted" => $row[3],
                        "dateEnd" => $row[4],
                        "taskFinished" => $row[5]
                    );
                    echo json_encode($tempdata);
                  }
                 
                  $result -> free_result();
            }
            else {
                echo "no results found";
            }
        }
    }


    
    
    
    function headerSettings(){
       // Allow from any origin
    if (isset($_SERVER['HTTP_ORIGIN'])) {
      header("Access-Control-Allow-Origin: *");
      header("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
      header("Access-Control-Allow-Headers: Origin, Authorization, X-Requested-With, Content-Type, Accept");
      header('Access-Control-Allow-Credentials: true');
      header('Access-Control-Max-Age: 86400');    // cache for 1 day
  }

  // Access-Control headers are received during OPTIONS requests
  if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

      if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
          // may also be using PUT, PATCH, HEAD etc
          header("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");

      if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
          header("Access-Control-Allow-Headers: Origin, Authorization, X-Requested-With, Content-Type, Accept");

      exit(0);
  }
        // print("header had been set \n");
    }
?>


