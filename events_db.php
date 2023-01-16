<?php

$query = "SELECT
events.id, events.name as e_name, events.date, events.category ,teacher.name as t_name
FROM events 
JOIN teacher ON events.t_id=teacher.id 

ORDER BY
id ASC";


$query1 = "SELECT
events.id, events.name as e_name, events.date, events.category , student.name as s_name
FROM events 

JOIN student ON events.s_id=student.id 

ORDER BY
id ASC";
?>