<?php
require ("core/config.php");
require ("core/header.php");
?>

<div class="hLine"></div>

<?
$mod = $_GET['mod'];

if ($mod == null || $mod == "main"){
	$mod = "main";
	$mod = $module_path.$mod.".php";
	include($mod);
} else if ($mod != null && $mod != "main") {
	$mod = $module_path.$mod.".php";
	include($mod);
}
?>




<?  require("core/footer.php");  ?>
