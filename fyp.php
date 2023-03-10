<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once 'dbConnect.php';
include_once 'layout.html';
class course {
  //database connection and table name
  private $conn;
  private $table_name = "distinctions";
  private $achievement;
  private $semester;
  private $st_id;
  private $email;
  //object properties
  
    

  //constructor with $db as database connection
  public function __construct($db)
  {
      $this->conn = $db;
  }

  //read events
  function read(){
      
      //select all query
           
      include_once 'fyp_db.php';
      
                  $result = mysqli_query($this->conn, $query);
                  
                  // If there are results from the database
                  if (mysqli_num_rows($result) > 0) {
                      // Start a table
                     echo '<div class ="container">';
                      echo '<table class="table"> ';
                      
                      // Print the table headers
                   

                    echo '<thead> ';
                    echo '    <tr> ';
                    echo '      <th scope="col">#</th> ';
                    echo '      <th scope="col">Winner</th> ';
                    echo '      <th scope="col">Achievement Name</th> ';
                    echo '      <th scope="col">Semester</th> ';
                    echo '      </tr> ';
                    echo '</thead> ';
                      // Print the data
                      while ($row = mysqli_fetch_assoc($result)) {
                          echo '<tr>';
                          echo '<td></td>';
                          echo '<td>' . $row['name'] . '</td>';
                          echo '<td> ' . $row['achievement'] . ' </td>';
                          echo '<td> ' . $row['semester'] . ' </td>';
                          echo '</tr>';
                     }
                  
                      // End the table
                      echo '</table>';
                  } else {
                      echo 'No results';
                  }
  }
 
 
 
  public function create($conn,$achievement,$email,  $semester  ) {

    $this->$achievement=$achievement;
    $this->semester=$semester;
    $this->email=$email;
    include 'fyp_db.php';



if ($stmt->execute()) {
  return true;
} else {
  return false;

}

    if ($conn->query($sql) === TRUE) {
      echo "New registration created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

}

}

  
  $obj = new course($conn);   
  $obj->read();


if($_SESSION['role']=='admin'){

  
include_once 'fyp_form.html';

//handle form submission
if($_POST){
  $achievement=$_POST['achievementName'];
  $winner=$_POST['winner'];
  $semester=$_POST['semester'];

  
    $obj = new course($conn);    
  
    $obj->create($conn,$achievement, $winner ,$semester);
}
}
?>
