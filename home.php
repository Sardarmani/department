<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>

    <?php
    
    session_start();

    if($_SESSION['t_id'])
    {
      print_r ("SSS");
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
                <a class="nav-link" href="events.php">Events</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="merit_list.html">Merit Lists</a>
              </li>
            
              <li class="nav-item">
                <a class="nav-link" href="attendance.html">Attendance</a>
              </li>
              

          </ul>
          <form class="form-inline my-2 my-lg-0">
            <a href="login.html" class="btn btn-outline-success my-2 my-sm-0" >Login</a>
          </form>
        </div>
      </nav>
      <div style="background-color: lavender;">
    <br>
      <h1 style="text-align: center; color: blue;">Department Of Computer Sciences</h1>
      <h4 style="text-align: center; color: black;">Quaid-i-Azam University, Islamabad</h4>
      <br>
    </div>
    <br>
    <h5 style="text-align: center; font-weight: 600;">INTRODUCTION</h5>
    <hr>
    <p>The Department of Computer Sciences was established at Quaid-i-Azam University Islamabad in 1976. The main objective of establishment of the department is to produce Computer Scientists in order to meet the growing demand for computer professionals in the country. The M.Sc. and MPhil Programs have been highly successful. Our graduates have attained higher degrees from developed countries and are working in national and international organizations. The department offers PhD, MPhil, MS (Information Science & Technology), BS and M.Sc. degrees. Each degree program has a specific objective and focus. The course of study and syllabus for each degree is updated and is inline with its objectives.</p>
    
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="4.JPG" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="3.JPG" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="2.JPG" alt="Third slide">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>


    <div>
        <h5 style="text-align: center; font-weight: 600;" class="m-3">LATEST NEWS</h5>
        <hr>
        <p>
            The MS (Data Science) programme of the department has been approved by the university and HEC
            Quaid-i-Azam University in "Computer Science" ranked 201-250 worldwide and first in Pakistan by Times Higher Education Rankings 2023
            Quaid-i-Azam University in "Computer Science and Information Systems" ranked 301-350 worldwide by QS Rankings in 2022
            Quaid-i-Azam University ranked 201-300 in "Computer Sciences - Engineering" by Shanghai Rankings 2022
            Dr Khalid Saleem received a PKR 9.3 Million funding from NCBC (HEC) for his project
            Dr Muddassar Azam Sindhu received a PKR 2.1 Million funding from HEC for his project
        </p>
    </div>
</div>
</body>
</html>