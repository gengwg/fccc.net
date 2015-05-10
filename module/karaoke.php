<?php

// Change to the name of the file
$last_modified = filemtime("../bin/hymns_list/karaoke.txt");
// Display the results
// eg. Last modified Monday, 27th October, 2003 @ 02:59pm


//parse karaoke.txt and output into html page
$file = "../bin/hymns_list/karaoke.txt";

$fp=fopen($file,'r');
$content=fread($fp,filesize($file));
fclose($fp);

$content = "<li>".$content."</li>";
$content = str_replace(chr(10),"</li><li>",$content);

?>

<html>
<head>
<meta charset="utf-8">​
<title> FCCC Karaoke Hymns </title>
<meta name="Author" content="FCCC">
<meta name="Keywords" content="Hymns, Karaoke">
<style>
<!--
 p.MsoNormal
	{mso-style-parent:"";
	margin-bottom:.0001pt;
	font-size:14.0pt;
	font-family:"Times New Roman";
	margin-left:0cm; margin-right:0cm; margin-top:0cm}
-->
</style>
</head>

<body>
<table border="0" width="100%" id="table1">
	<tr>
		<td width="10%">&nbsp</td>
		<td><ol><? echo $content; ?></ol></td>
	</tr>
	<tr>
		<td colspan="2" align="right"><? print "Last modified: " . date("l, dS F, Y @ h:ia", $last_modified); ?></td>
	</tr>
</table>
</body>
</html>