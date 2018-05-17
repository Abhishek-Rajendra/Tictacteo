<?php
  session_start();
?>
<html>
<title>Tic-tac-toe</title>

<body>
  <center>  <h1>2 Player Tic-Tac-Toe </h1>
<?php
  $track=0;
  if($_SESSION['opnt']=="play"){
    echo "Error.Please sign in again if same problem occurs try changing your name";
  }else{
  if(filesize("noofplayers.txt")==0 && filesize("table.txt")!=0 && $_SESSION['result']=="none"){
    $track=1;
    $_SESSION['result']="lose";
  }


  echo "<h2>Playing Against ".$_SESSION['opnt']."</h2>";

  $dir="table.txt";
  $f=fopen($dir,"r");
  if ($f==FALSE) print ("Unable to open file for read!");
  else{
    $arr=fgets($f);
    $_SESSION['turn']=fgets($f);
    fclose($f);
  }

  if(filesize("noofplayers.txt")==0 && filesize("table.txt")==0)
   echo "<h3>".$_SESSION['opnt']." LEFT THE GAME</h3>";

  echo "<h3>Your name: ".$_SESSION['name']."</h3>";

  if($_SESSION['turn']==$_SESSION['name'] && $_SESSION['result']=="none")
    echo "<h3>Your Turn</h3>";

  elseif($_SESSION['result']=="none")
    echo "<h3>".$_SESSION['opnt']."'s Turn</h3>";


  echo "<table border=\"1\" style=\"width:360px; height:360px\">";
  for($i=0;$i<9;$i++)
  {
    $p=$i;
    if($i%3==0)
    {
        echo "<tr>";
    }
    echo "<td style=\"width:10%\">";
    if($arr[$i]=="0")
    {
      echo "<form action=\"check.php?pos=$p\" method=\"post\">
                <input type=\"submit\" value=\"\" name=\"$i\" style=\"width:100%; height:100%;overflow: auto;\">
                </form>";
    }
    elseif($arr[$i]=="1")
    {
      echo "<center>O</center>";
    }
    elseif($arr[$i]=="2")
    {
      echo "<center>X</center>";
    }
    echo "</td>";
    if($i%3==2)
    {
        echo "</tr>";
    }
  }

  if($_SESSION['result']=="won"){

    echo "<h2>YOU WIN...</h2>";
    if($_SESSION["mark"]!=3){
    $_SESSION["mark"]=3;
    $f=fopen("noofplayers.txt","w");
    fwrite($f,"");
    fclose($f);
    }
  }
  $count=0;
  for($i=0;$i<10;$i++){
    if($arr[$i]!='0')
      $count++;
    }
    if($count==10&&($_SESSION['result']=="none"||($_SESSION['result']=="lose"&&$track==1)))
      $_SESSION['result']="tie";

  if($_SESSION['result']=="lose"){
    echo "<h2>".$_SESSION['opnt']." Won....</h2><br>";
    if($_SESSION["mark"]!=3){
    $_SESSION["mark"]=3;
    $f=fopen("noofplayers.txt","w");
    fwrite($f,"");
    fclose($f);
    }
  }

  if($_SESSION['result']=="tie"){
    echo "<h2>DRAW....</h2><br>";
    if($_SESSION["mark"]!=3){
    $_SESSION["mark"]=3;
    $f=fopen("noofplayers.txt","w");
    fwrite($f,"");
    fclose($f);
    }
  }

  $page = $_SERVER['PHP_SELF'];
  $sec = "1";
  header("Refresh: $sec; url=$page");
}
?>
<form action="endgame.php" method="post">
          <input type="submit" value="End Game">
</form>
</center>

</body>
</html>
