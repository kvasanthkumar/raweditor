<?php
$myFile = $_GET['folderpath'] . "\\" . $_GET['file'];
$fh = fopen($myFile, 'r');

while(!feof($fh))
{
 echo htmlentities(fgets($fh)). "";
}
fclose($fh);
?>