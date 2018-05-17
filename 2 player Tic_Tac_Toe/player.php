<?php
  session_start();

  $dir="noofplayers.txt";
  if($_SESSION['count']==0){
  $myfile = fopen($dir, "a");
  if ($myfile==FALSE) print ("Error");
  else {
    $v="\n";
  	$val = $_SESSION['name'];
    fwrite($myfile,$val);
    fwrite($myfile,$v);
    fclose($myfile);
  }
}
  $linecount = -1;
  $handle = fopen($dir, "r");
  if ($handle==FALSE) print ("Unable to open file for read!");
  else{
  while(!feof($handle)){
    $line = fgets($handle);
    $linecount++;
    $line = preg_replace('/\s+/', '', $line);
    if($line!=($_SESSION['name']) && $linecount<2){
      $_SESSION['opnt']=$line;
    }
  }
  fclose($handle);

  if($linecount>2){
    $_SESSION["count"]=1;
    echo "Server busy. Please try again after some time....<br>";
    echo "<form action=\"index.php\" method=\"post\">
              <input type=\"submit\" value=\"Try Again\">
    </form>";
  }

  if($linecount<2){
  $_SESSION['count']=1;
  echo "Waiting for players......";
  $page = $_SERVER['PHP_SELF'];
  $sec = "3";
  header("Refresh: $sec; url=$page");
  }

  if($linecount==2){
    $_SESSION['count']=1;
    $dir="table.txt";
    if ( filesize( $dir )==0)
  {
    $_SESSION['mark']="2";
    $f=fopen($dir,"w");
    if ($f==FALSE) print ("Unable to open file for read!");
    else{
    fwrite($f,"000000000");
    fwrite($f,"\n");
    fwrite($f,$_SESSION['name']);
    fclose($f);
  }
  }
    header("Location: table.php");
  }
}

?>
