<?php

$query="SELECT student.name, courses.name
FROM registered_courses
JOIN student ON registered_courses.s_id = student.id
JOIN courses ON registered_courses.c_id = courses.code";


// $stmt = $this->conn->prepare("INSERT INTO distinctions (achievement, st_id,semester)  VALUES (?, ?, ? )");

// $stmt->bind_param("sss",$achievement,$email,$semester);

  
?>