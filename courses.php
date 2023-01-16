<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script>

      document.addEventListener("DOMContentLoaded",()=>{
        
        
       
        let count=0 
        let credithour=0       
        document.querySelector("#sub_btn").onclick=()=>{
          let count=0

          let name=document.querySelector("#courseName").value;
          if(name){
       
          credithour+=3;
          
       
            if(credithour>18){
              alert("More than 18 Credit hours are selected")
            }

            else if(count>6){
              alert("More than 6 courses are selected")
             
            }
            else{
            count++

            let li=document.createElement("li");
            li.innerHTML=name;
            li.id=name +"r";
            let ul=document.querySelector("#r_courses");
            ul.append(li);
            let del_btn=document.createElement("input")
            del_btn.type = 'button';
            del_btn.id = name +"r";
            del_btn.value = 'Delete';
            del_btn.className = 'btn';
            ul.append(del_btn);
            
            del_btn.onclick = function() {
              
              const list = document.getElementById(this.id);
              const parent = list.parentNode;
              parent.removeChild(list);
              document.getElementById(name).disabled=false;
        
        };
            
            document.createElement("li")
            document.getElementById(name).disabled=true;
            select_box = document.getElementById("courseName");
            select_box.selectedIndex = -1;

            
            if(count>0){
              
              document.querySelector("#proceed").style.display="block"
            }
          }
          }
          else{
            alert("Kindly Select courses");
          }
                    
        }

      }
      )

    </script>
</head>
<body>
    <div class="container  mt-5 ">
    <form id="register" >
    

      
      <h1 class="mb-5">Course Registration Form</h1>
        
          <div class="form-row">
            <div class="form-group">
        
            <div class="col">
              <label for="exampleFormControlSelect2">Courses</label>
              <select  class="form-control" id="courseName">
              <?php
              $courses=array("ADA","BIO","SC",);
              foreach($courses as $course){
                echo '<option value="' . $course . '" id="' . $course . '" >' . $course . '</option>';
              }
              ?>
              </select>    
            </div>
          </div>
          
              </div>
          
    
        <div class="form-group">
          <button type="button" class="btn btn-dark" id="sub_btn">Add Course</button>

        </div>
     
      </form>
      <h3>Selected Courses</h3>
      <div id="register">      
        <ul id="r_courses"></ul>
      <button type="button" style="display:none;" class="btn btn-primary" id="proceed">Proceed</button>
      </div>
         </div>
      
</body>
</html>