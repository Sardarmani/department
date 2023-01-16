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
                    echo '      <th scope="col">Winner</th> ';
                    echo '      <th scope="col">Achievement Name</th> ';
                    
                    echo '      </tr> ';
                    echo '</thead> ';
                      // Print the data
                      while ($row = mysqli_fetch_assoc($result)) {
                          echo '<tr>';
                          echo '<td></td>';
                          echo '<td>' . $row['name'] . '</td>';
                          echo '<td> ' . $row['achievement'] . ' </td>';
                          
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
 
 
 
  public function create($conn,$achievement,$email,  $semester  ) {

    $this->$achievement=$achievement;
    $this->semester=$semester;
    $this->email=$email;




if($_SESSION['role']=='student'){



$stmt = $this->conn->prepare("INSERT INTO distinctions (achievement, st_id,semester)  VALUES (?, ?, ? )");


$stmt->bind_param("sss",$achievement,$email,$semester );
if ($stmt->execute()) {
  return true;
} else {
  return false;
}



}

if($_SESSION['role']=='teacher'){
print_r("maniii");

$this->id=$_SESSION['t_id'];

$idddd=1;
// $sql = ;

$stmt = $this->conn->prepare("INSERT INTO events (name,date,category,t_id)  VALUES (?, ?, ? )");

$stmt->bind_param("sss", $this->name,$this->date,$this->category,$this->id);
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



    if ($conn->query($sql) === TRUE) {
      echo "New registration created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }


}

//database connection
//create event object
//read events
// $num = $stmt->rowCount();
  

  
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
    // if($event->create()){
    //     echo "<div class='alert alert-success'>Event was registered.</div>";
    // }
    // else{
    //     echo "<div class='alert alert-danger'>Unable to register event.</div>";
    // }
}
}
?>
