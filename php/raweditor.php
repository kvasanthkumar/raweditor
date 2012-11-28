<?php
/*
**  
** 
** 
*/
?>
<html>
<head>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script>
$(function(){
$(".editlink").click(function() {
	var val1 = $("#hidpath").val() + '\\' + $(this).text();
	$("#hidFile").val(val1);
    $.get("raweditor-loadfile.php", {file: $(this).text(), folderpath: $("#hidpath").val()}, 
        function(data) {
			$('textarea#txtContent').html(data);
        });    
    return false;
});

$("#btnSave").click(function() {
	alert($('#txtContent').val());
    $.post("raweditor-savefile.php", { hidFile : $("#hidFile").val(), txtSource : $('#txtContent').val() },
   function(data) {
     alert("Data Loaded: " + data);
   });
    return false;
});

});
</script>
</head>
<body>
<?php
/*
** 
** 
** 
*/

//$path = 'H:\vasanth\GitHub\raweditor\php';
$path = 'G:\mywamp\www\php';

if($_GET['folder'] !== ""){
	$path = $path . "\\" . $_GET['folder'];
}

echo "<form method=\"post\" enctype=\"multipart/form-data\" action=\"raweditor.php\">";

echo "\n <input type=hidden id=\"hidpath\" name=\"hidpath\" value=\"" . $path . "\" />";
echo "<input type=hidden id='hidFile' name='hidFile' value=''>";

if ($handle = opendir($path)) {
    echo "Directory handle: $handle\n";
    echo "<br/>Entries:\n";

    /* This is the correct way to loop over the directory. */
    while (false !== ($entry = readdir($handle))) {
		if (false === is_dir($path . '/' . $entry)) {
        echo "<br/><a class='editlink' id='yeah' href=\"#\">$entry</a>\n";
		//echo "<br/><a id='yeah' href=\"./raweditor-loadfile.php?file=$entry\">$entry</a>\n";
		}
		else
		{
			echo "<br/><a href=\"./raweditor.php?folder=$entry\">$entry</a>\n";
		}
    }

    closedir($handle);
}

echo "<br/> <textarea ID='txtContent' cols=\"80\" rows=\"20\"></textarea>";
echo "<div id='error'></div>";
echo "\n <input type=button id=\"btnSave\" name=\"btnSave\" value=\"SAVE\" />";
echo "</form>";
?>
</body>
</html>
