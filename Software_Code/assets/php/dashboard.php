<?php
include "GLOBAL_CONFIG.php";

  if(!isset($_SESSION['researcherType'])) {
    header("location: ../../login.php");
  }
  // elseif($_SESSION['researcherType'] == ){
  //
  // }
  //
  // elseif($_SESSION['researcherType'] == ){
  //
  // }

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Dashboard</title>
  </head>
  <body>
    <?php if($_SESSION['researcherType'] == 'PR'){
      echo "test";
    } ?>
  </body>
</html>
