<?php

$query = "SELECT
                   distinctions.achievement  ,student.name
              FROM
                  distinctions
                JOIN student ON distinctions.st_id=student.id 

              ORDER BY
                  st_id ASC";

    
?>