<?php
$myFile = $_POST['hidFile'];
//echo $myFile . "\n";
$fh = fopen($myFile, 'w') or die("can't open file");
$stringData = $_POST['txtSource'];
//echo $stringData . "\n";
fwrite($fh, $stringData);
fclose($fh);
echo "saved";
?>
