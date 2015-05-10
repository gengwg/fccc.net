<?php

require ("config.php");
include ("functions.php");
include ("./lang/cht.php");

?>

<html>
<head>
<meta charset="utf-8">​
<meta http-equiv="imagetoolbar" content="no">
<meta name="author" content="FCCC">
<title><?$str = "FCCC ";$t = ucfirst($mod);$str .= $t;echo $str;?></title>
<link rel="stylesheet" rev="stylesheet" href="/css/default.css" type="text/css" media="screen" charset="utf-8" />
<script src="<?print $js_path;?>default.js"></script>

<script src="/core/js/stmenu.js"></script>

</head>
<body>

<div id="nav">

<?
if (SHOWNAVIGATION == TRUE) {
	print "<script type=\"text/javascript\" language=\"javascript\" src=\"/core/js/nav.js\"></script>";
} else {
	print "";
	print $str_nav;
}
?>

</div>