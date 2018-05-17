<?php
  session_start();
  $_SESSION['name'] = $_POST["name"];
  $_SESSION['opnt']="play";
  $_SESSION['mark']="1";
  $_SESSION['turn']="p";
  $_SESSION['result']="none";
  header("Location: player.php");
  ?>
