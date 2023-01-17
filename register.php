
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once 'dbConnect.php';

class Student {
    private $conn;
    private $name;
    private $password;
    private $confirm_password;
    private $email;
    private $dept;
    private $program;

    public function __construct($name, $password,  $email, $dept, $program,$db) {
        $this->conn = $db;

        $this->name = $name;
        $this->password = $password;
        $this->email = $email;
        $this->dept = $dept;
        $this->program = $program;
    }

    public function save() {
        
        // Check connection
        
        include 'register_db.php';
        
        if ($this->conn->query($sql) === TRUE) {
            header("Location:login.html");

        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

    
    }
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    print_r("SS");
    $name = $_POST['name'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $dept = $_POST['dept'];
    $program = $_POST['program'];

    $student = new Student($name, $password,$email, $dept, $program,$conn);
    $student->save();
}

?>

