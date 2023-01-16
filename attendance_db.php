<?php

$query = "SELECT
                   attendance.attendance  ,student.name
              FROM
                  attendance
                JOIN student ON attendance.s_id=student.id 

              ORDER BY
                  s_id ASC";

    
?>