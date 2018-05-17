<?php
  session_start();
  $f=fopen("table.txt","w");
  fwrite($f,"");
  fclose($f);
  $dir="table.txt";
  $linecount = 0;
  $handle = fopen($dir, "r");
  if ($handle==FALSE) print ("Unable to open file for read!");
  else{
  while(!feof($handle)){
    $line = fgets($handle);
    $linecount++;
    }
  }
  fclose($f);
  echo $linecount;
  if($linecount!=1){
  $f=fopen("noofplayers.txt","w");
  fwrite($f,"");
  fclose($f);
}
  session_destroy();
  header("Location: index.php");
?>
