<html>
<?php


  $filename = 'db.sql';

  // $sql = file_get_contents('Project (2).sql');  

  $mysqli = new mysqli("dbserver.students.cs.ubc.ca", rzhong01, a38917878, rzhong01);

  
  if ($mysqli->connect_error) {
    echo('Connect Failed' . $mysqli->connect_error);
  } else {
    echo('Successfully Connected to MYSQL');
  }

?>
</html>