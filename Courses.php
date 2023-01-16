<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once 'dbConnect.php';
include_once 'layout.html';

class course {
  //database connection and table name
  private $conn;
  private $table_name = "courses";

  //object properties
  public $id;
  public $course_code;
  public $course_name;


  //constructor with $db as database connection
  public function __construct($db){
      $this->conn = $db;
  }

  //read events
  function read(){
      
      //select all query
      $query = "SELECT
                   code, name
              FROM
                  " . $this->table_name . "
              ORDER BY
                  code ASC";
                  
                  $result = mysqli_query($this->conn, $query);
                //   $result = PDO::query($this->conn, $query);
                  
                  // If there are results from the database
                  if (mysqli_num_rows($result) > 0) {
                      // Start a table
                     echo '<div class ="container">';
                      echo '<table class="table"> ';
                      
                      // Print the table headers
                   

                    echo '<thead> ';
                    echo '    <tr> ';
                    echo '      <th scope="col">#</th> ';
                    echo '      <th scope="col">Code</th> ';
                    echo '      <th scope="col">Course Name</th> ';
                    
                    echo '      </tr> ';
                    echo '</thead> ';
                      // Print the data
                      while ($row = mysqli_fetch_assoc($result)) {
                          echo '<tr>';
                          echo '<td></td>';
                          echo '<td> ' . $row['code'] . ' </td>';
                          echo '<td>' . $row['name'] . '</td>';
                          echo '</tr>';
                     }
                  
                      // End the table
                      echo '</table>';
                  } else {
                      echo 'No results';
                  }
      //prepare query statement
    //   $stmt = $this->conn->prepare($query);
  
    //   //execute query
    //   $stmt->execute();
  
    //   return $stmt;
  }
  public function create($conn) {
    $sql = "INSERT INTO events (name,  date)
            VALUES ('$this->name', '$this->date' )";

    if ($conn->query($sql) === TRUE) {
      echo "New registration created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }


}

//database connection
//create event object
$course = new course($conn);
//read events
$stmt = $course->read();
// $num = $stmt->rowCount();


include_once 'courses.php';

//handle form submission
if($_POST){
    $event->id = 1;
    $event->name = $_POST['name'];
    $event->date = $_POST['date'];
    
    print_r($event->name);

    $event->create($conn);
    // if($event->create()){
    //     echo "<div class='alert alert-success'>Event was registered.</div>";
    // }
    // else{
    //     echo "<div class='alert alert-danger'>Unable to register event.</div>";
    // }
}
?>
