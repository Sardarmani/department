<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <?php
  class courselist
  { 
    private $course;
    private $teacher;
    private $credit_hour;

    
    public function __construct()
    {
      // Called when the object is created
    }
  
    public function setCourseName($newval)
    {
      $this->course = $newval;
    }

    public function setTeacherName($newval)
    {
      $this->teacher = $newval;
    }

    public function setCreditHour($newval)
    {
      $this->credit_hour = $newval;
    }

    public function getCourseName($newval)
    {
      return $this->course ;
    }

    public function getTeacherName($newval)
    {
      return $this->teacher;
    }

    public function getCreditHour($newval)
    {
      return $this->credit_hour ;
    }
    
  }
  
  ?>
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="home.html">QAU CS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="home.html">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="courselist.html">Courses</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="fyp.html">Distinctions</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="event.html">Events</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="merit_list.html">Merit Lists</a>
              </li>
            
              <li class="nav-item">
                <a class="nav-link" href="attendance.html">Attendance</a>
              </li>
            

          </ul>
        </div>
      </nav>
      <h2 class="text-center m-4">Offered Courses</h2>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Courses</th>
            <th scope="col">Teacher Name</th>
            <th scope="col">Credit Hour</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>ADA</td>
            <td>Dr Naqi</td>
            <td>3</td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>SC</td>
            <td>Miss Onaiza Maqbool</td>
            <td>3</td>

          </tr>
          <tr>
            <th scope="row">3</th>
            <td>WAD</td>
            <td>Dr Khalid Saleem</td>
            <td>3</td>

          </tr>

          <tr>
            <th scope="row">4</th>
            <td>STAT</td>
            <td>Uzair</td>
            <td>3</td>

          </tr>

          <tr>
            <th scope="row">5</th>
            <td>BIO</td>
            <td>Miss Farah</td>
            <td>3</td>

          </tr>

          <tr>
            <th scope="row">6</th>
            <td>OS</td>
            <td>Miss Ifrah</td>
            <td>3</td>

          </tr>
        </tbody>
      </table>
      <?php
session_start();
$id=$_SESSION['id'] ;
if ($id==1223) {
    // the button should be disabled
    echo '<button type="submit">Register</button>';

} 
else {
    // the button should be enabled
    echo '<button type="submit" hidden>Register</button>';

}

?>
      </div>
</body>
</html>