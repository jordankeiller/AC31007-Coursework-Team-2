<?php
    include "GLOBAL_CONFIG.php";

    if(isset($_POST['login'])){
      $LOGIN_USERNAME = $_POST['username'];
      $LOGIN_PASSWORD = $_POST['userPass'];

      //Retrieve the user account information for the given username.
      $SQL_QUERY = $MYSQL_CONNECTION->prepare("SELECT * FROM `login` WHERE Username=:username");
      $SQL_QUERY->bindParam("username", $LOGIN_USERNAME, PDO::PARAM_STR);
      $SQL_QUERY->execute();
      $result = $SQL_QUERY->fetch(PDO::FETCH_ASSOC);

      if(!$result){

        // Username doesn't exist. Didn't check password.
        header("location: ../../login.php");
        exit;
      }else {
        // Correct username, correct password.
          if($LOGIN_PASSWORD == $result['Password']){
            $_SESSION['userid'] = $result['Login_ID'];
            $FETCH_RESEARCHER_TYPE = "CALL `20agileteam2db`.`researcher_type`(".$_SESSION['userid'].")";
            $STMT = $MYSQL_CONNECTION->prepare($FETCH_RESEARCHER_TYPE);
            $STMT->execute();
            $RESEARCHER_TYPE = $STMT->fetch();

            $_SESSION['researcherType'] = $RESEARCHER_TYPE['Researcher Type'];
            echo $_SESSION['researcherType'];
            header("location: ../../index.php");
            exit;
      } else{
          // Correct username, wrong password.
          header("location: ../../index.php");
          exit;
        }
      }
    }
?>
