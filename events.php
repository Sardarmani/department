<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once 'dbConnect.php';
include_once 'layout.html';

class Event {
  //database connection and table name
  private $conn;
  private $table_name = "events";

  //object properties
  public $id;
  public $name;
  public $date;
  public $category;
  public $organizer;

  //constructor with $db as database connection
  public function __construct($db){
      $this->conn = $db;
  }

  //read events
  function read(){
      
      //select all query
      include_once "events_db.php";
      // $query = "SELECT
      // events.id, events.name as e_name, events.date, events.category ,teacher.name as t_name
      // FROM events 
      // JOIN teacher ON events.t_id=teacher.id 
      
      // ORDER BY
      // id ASC";

// $query = "SELECT
// events.id, events.name as e_name, events.date, events.category ,student.name as t_name
// FROM events 
// JOIN student ON events.t_id=student.id 

// ORDER BY
// id ASC";
                    
                  $result = mysqli_query($this->conn, $query);
                  $result1 = mysqli_query($this->conn, $query1);
                
                  //   $result = PDO::query($this->conn, $query);
                  // If there are results from the database

                  
                  if (mysqli_num_rows($result) > 0 || mysqli_num_rows($result1) > 0) {
                      // Start a table
                      print_r("Muneeb");
                  
                      echo '<div class ="container">';
                      echo '<table class="table"> ';
                      
                      // Print the table headers
                   

                    echo '<thead> ';
                    echo '    <tr> ';
                    echo '      <th scope="col">#</th> ';
                    echo '      <th scope="col">Organizer Name</th> ';
                    echo '      <th scope="col">Event Name</th> ';
                    echo '      <th scope="col">Cateogry</th >';
                    echo '      <th scope="col">Date</th >';
                    echo '      </tr> ';
                    echo '</thead> ';
                      // Print the data
                      while ($row = mysqli_fetch_assoc($result)) {
                          echo '<tr>';
                          echo '<td>' . $row['id'] . '</td>';
                          echo '<td> ' . $row['t_name'] . ' </td>';
                          echo '<td>' . $row['e_name'] . '  </td>';
                          echo '<td> ' . $row['category'] . ' </td>';
                          echo '<td>' . $row['date'] . '</td>';
                          echo '</tr>';
                     }

                     while ($row = mysqli_fetch_assoc($result1)) {
                      echo '<tr>';
                      echo '<td>' . $row['id'] . '</td>';
                      echo '<td> ' . $row['s_name'] . ' </td>';
                      echo '<td>' . $row['e_name'] . '  </td>';
                      echo '<td> ' . $row['category'] . ' </td>';
                      echo '<td>' . $row['date'] . '</td>';
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
  public function create() {
    print_r("SS");
    if($_SESSION['role']=='student'){
    print_r("maniii");

    $this->id=$_SESSION['s_id'];
      
    $idddd=1;
    // $sql = ;
    
    $stmt = $this->conn->prepare("INSERT INTO events (name,date,category,s_id)  VALUES (?, ?, ?, ? )");

    $stmt->bind_param("ssss", $this->name,$this->date,$this->category,$this->id);
    if ($stmt->execute()) {
      return true;
    } else {
      return false;
    }
    
    // mysqli_stmt_execute($stmt1);


    //   $sql = "INSERT INTO events (name,  date,category,t_id)
    //   VALUES ('$this->name', '$this->date' ,'$this->category','$this->id' )";

    //   $stmt = $this->conn->prepare($sql);
    // $stmt->bindParam('s', $name);
    // $stmt->bindParam('s', $date);
    // $stmt->bindParam('s', $category);
    // $stmt->bindParam('s', $t_id);
    // $stmt->execute();

    
}

if($_SESSION['role']=='teacher'){
  print_r("maniii");

  $this->id=$_SESSION['t_id'];
    
  $idddd=1;
  // $sql = ;
  
  $stmt = $this->conn->prepare("INSERT INTO events (name,date,category,t_id)  VALUES (?, ?, ?, ? )");

  $stmt->bind_param("ssss", $this->name,$this->date,$this->category,$this->id);
  if ($stmt->execute()) {
    return true;
  } else {
    return false;
  }
  
  // mysqli_stmt_execute($stmt1);


  //   $sql = "INSERT INTO events (name,  date,category,t_id)
  //   VALUES ('$this->name', '$this->date' ,'$this->category','$this->id' )";

  //   $stmt = $this->conn->prepare($sql);
  // $stmt->bindParam('s', $name);
  // $stmt->bindParam('s', $date);
  // $stmt->bindParam('s', $category);
  // $stmt->bindParam('s', $t_id);
  // $stmt->execute();

  
}
    // if ($this->conn->query($sql) === TRUE) {
    //   echo "New registration created successfully";
    // } else {
    //   echo "Error: " . $sql . "<br>" . $conn->error;
    // }
  }


}


//database connection
//create event object
$event = new Event($conn);
//read events
// $num = $stmt->rowCount();
  $stmt = $event->read();


include_once 'organize_event.html';

//handle form submission
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $event->name = $_POST['name'];
    $event->date = $_POST['date'];
    $event->category = $_POST['category'];
    
    
    // $event->category = $_POST['category'];
    $description="SSSSSSSS";


    $flag=$event->create();
    if($flag){
        echo "<div class='alert alert-success'>Event was registered.</div>";
    }
    else{
        echo "<div class='alert alert-danger'>Unable to register event.</div>";
    }
}
?>
