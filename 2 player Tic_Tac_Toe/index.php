<?php
 session_start();
 $_SESSION['count']=0;
?>
<html>
<body>
  <center>Enter Your name to play TIC-TAC-TOE...</center>
  <br>
  <form align="center" action="assign.php" method="post">
    <input type="text" name="name"><br>
    <input type="submit" value="submit">
</form>

</body>
</html>
