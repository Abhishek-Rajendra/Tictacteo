<?php
session_start();
$pos=-1;
if(isset($_GET['pos']))
$pos=$_GET['pos'];
if($_SESSION['turn']!=$_SESSION['name'] || $pos==-1 || $_SESSION['result']!="none"){
  header("Location: table.php");
}
else{
  $dir="table.txt";
  $f=fopen($dir,"r");
  if ($f==FALSE) print ("Unable to open file for read!");
  else{
    $str=fgets($f);
    fclose($f);
    }
    $str = preg_replace('/\s+/', '', $str);
    $str[$pos]=$_SESSION['mark'];

  $f=fopen($dir,"w");
  if ($f==FALSE) print ("Unable to open file for read!");
  else{
    fwrite($f,$str);
    fwrite($f,"\n");
    fwrite($f,$_SESSION['opnt']);
    fclose($f);
    }

    if($str[0]==$str[4] && $str[4]==$str[8] && $str[0]==$_SESSION['mark']){
      $_SESSION['result']="won";
    }else if ($str[0]==$str[4] && $str[4]==$str[8] && $str[0]!=$_SESSION['mark'] && $str[0]!='0') {
      $_SESSION['result']="lose";
    }
    if($str[2]==$str[4] && $str[4]==$str[6] && $str[4]==$_SESSION['mark']){
      $_SESSION['result']="won";
    }else if ($str[2]==$str[4] && $str[4]==$str[6] && $str[4]!=$_SESSION['mark'] && $str[2]!='0') {
      $_SESSION['result']="lose";
    }
    if(($str[0]==$str[1]&&$str[1]==$str[2]&&$str[0]==$_SESSION['mark'])||($str[3]==$str[4]&&$str[4]==$str[5]&&$str[3]==$_SESSION['mark'])||($str[6]==$str[7]&&$str[7]==$str[8]&& $str[6]==$_SESSION['mark']))
      $_SESSION['result']="won";
    if(($str[0]==$str[1]&&$str[1]==$str[2]&&$str[0]!=$_SESSION['mark'] && $str[0]!='0')||($str[3]==$str[4]&&$str[4]==$str[5]&&$str[3]!=$_SESSION['mark'] && $str[3]!='0')||($str[6]==$str[7]&&$str[7]==$str[8]&& $str[6]!=$_SESSION['mark'] && $str[6]!='0'))
      $_SESSION['result']="lose";

      if(($str[0]==$str[3]&&$str[3]==$str[6]&&$str[0]==$_SESSION['mark'])||($str[1]==$str[4]&&$str[4]==$str[7]&&$str[1]==$_SESSION['mark'])||($str[2]==$str[5]&&$str[5]==$str[8]&& $str[6]==$_SESSION['mark']))
        $_SESSION['result']="won";
      if(($str[0]==$str[3] && $str[3]==$str[6] && $str[0]!=$_SESSION['mark'] && $str[0]!='0')||($str[1]==$str[4]&&$str[4]==$str[7]&&$str[1]!=$_SESSION['mark'] && $str[1]!='0')||($str[2]==$str[5]&&$str[5]==$str[8]&& $str[6]!=$_SESSION['mark'] && $str[2]!='0'))
        $_SESSION['result']="lose";

        $count=0;
      for($i=0;$i<10;$i++){
        if($str[$i]!='0')
          $count++;
        }
        if($count==10 && $_SESSION['result']=="none")
          $_SESSION['result']="tie";
    header("Location: table.php");
  }
 ?>
