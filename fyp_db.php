<?php

$query = "SELECT
                   distinctions.achievement  ,student.name ,distinctions.semester 
              FROM
                  distinctions
                JOIN student ON distinctions.st_id=student.email 

              ORDER BY
              student.name ASC";

$stmt = $this->conn->prepare("INSERT INTO distinctions (achievement, st_id,semester)  VALUES (?, ?, ? )");

$stmt->bind_param("sss",$achievement,$email,$semester);





    
?>