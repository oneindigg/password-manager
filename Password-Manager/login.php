

<?php
  include 'include/function.php';

 if (isset($_POST['login'])) {
        $uname = $_POST['uname'];
        $pwd   = $_POST['pwd'];

        $result = $obj->login($uname,$pwd);


        if ($result > 0) {

          $_SESSION['uname'] = true;
          header("location:index.php?dashboard=true");
        }
       
       else{
        header("location:index.php?error");
       }

      } 
      ?>