<?php

#echo "<hr> daycare <br />This is <b>" . $mod . "</b> content within " . gfn() . " page.";

$mod = $_GET['mod'];
$view = $_GET['view'];
$file = $_GET['file'];

print "<p class=\"submenu\">".$str_daycare_submenu."</p>";

if ($mod == "daycare") {
	if ($view == "flyer") {

		#echo "<p> now is content of <b>". $mod . "&" . $view ."</b>";
		?><p align="center"><img src="<?print $image_path;?>daycare_flyer.gif"></p><?
	} else if ($view == "videos") {
			#echo "<p> now is content of <b>". $mod . "&" . $view ."</b>";
			print "<h4 align='center'>~ Video Selections for Mother's Day 2010 ~</h4>";
			print "<p class=\"submenu\">".$str_daycare_video_submenu."</p>";

			if ($file == "20100506122741") {
				#echo "<p> now is content of <b>". $mod . "&" . $view . "&" . $file ."</b>";
				print load_video($file);
			} else if ($file == "20100506122200") {
				#echo "<p> now is content of <b>". $mod . "&" . $view . "&" . $file ."</b>";
				print load_video($file);
			} else if ($file == "20100506121838") {
				#echo "<p> now is content of <b>". $mod . "&" . $view . "&" . $file ."</b>";
				print load_video($file);
			} else if ($file == "20100506121646") {
				#echo "<p> now is content of <b>". $mod . "&" . $view . "&" . $file ."</b>";
				print load_video($file);
			} else if ($file == "20100517092114") {
				#echo "<p> now is content of <b>". $mod . "&" . $view . "&" . $file ."</b>";
				print load_video($file);
			}
	
	} else if ($view == "craft") {
		#echo "<p> now is content of <b>". $mod . "&" . $view ."</b>";
?>
		<p align="center">
			<img src="<?print $image_path;?>star_icon.gif" alt="Star Icon" />&nbsp;&nbsp;<font color="#ff0000" size="5">學生手工藝</font>&nbsp;&nbsp;<img src="<?print $image_path;?>star_icon.gif" alt="Star Icon" /><br /><br />
		</p>
		<!--center><p class="craft"><?showimages("craft");?></p></center-->
		<p align="center">
<?
	global $image_path;
	$count = 0;
	$custom_path = "module/plogger/plog-content/images/daycare/";
	$folder = "artwork-time";
	$show_path = $custom_path.$folder;
	if ($handle = opendir($show_path)) {
		while (($file = readdir($handle)) !== false) {
			if ($file != "." && $file != ".." && $file != "index.php" && $file != "thumbs") {
				$count++;
				echo "&nbsp;<a href=\"$show_path/".$file."\"><img src=\"$show_path/thumbs/".$file."\" width=\"160\" alt=\"".$file."\" /></a>&nbsp;&nbsp;";
			}
		}
		closedir($handle);
	}
?>
		</p>
<?
	} else if ($view == "health") {
		#echo "<p> now is content of <b>". $mod . "&" . $view ."</b>";
?>
		<p align="center"><embed src="/bin/pdf/Digital Newspaper Articles 2010-05.pdf" width="92%" height="80%"></embed></p>
		<br />
<?

	} else if ($view == "dinnerbox") {
		#echo "<p> now is content of <b>". $mod . "&" . $view ."</b>";

?>
		<p align="center">
			<img src="<?print $image_path;?>star_icon.gif" alt="Star Icon" />&nbsp;&nbsp;<font color="#ff0000" size="5">家長盒飯</font>&nbsp;<font color="ff0000" size="4">(星期一至四)</font>&nbsp;&nbsp;<img src="<?print $image_path;?>star_icon.gif" alt="Star Icon" /><br /><br />
		</p>
		<center><p class="dinnerbox"><?showimages("dinnerbox");?></p></center>
<?

	} else if ($view == "pictures") {
		echo "<p> now is content of <b>". $mod . "&" . $view ."</b>\n";
		echo "<br /> and will be retrived from pictures&daycare";
	} else if ($view == null) {
		#echo "<p> view is not being selected";
?>
		<p align="center">
			<img src="<?print $image_path;?>star_icon.gif" alt="Star Icon" />&nbsp;&nbsp;<font color="#ff0000" size="5"><u><i>2011年招生年齡提升至5歲。</i></u>&nbsp;<img src="<?print $image_path;?>star_icon.gif" alt="Star Icon" /><br />詳情請恰 (650) 577-8880 麥牧師</font><br /><br />
			<img src="<?print $image_path;?>daycare_dinner.jpg" /><br />
			<img src="<?print $image_path;?>schedule.gif" /><br />
		</p>
<?
	}
} 



function showimages ($dir) {
	global $image_path;
	$count = 0;
	$show_path = $image_path.$dir;
	if ($handle = opendir($show_path)) {
		while (false !== ($file = readdir($handle))) {
			if ($file != "." && $file != "..") {$count++;
				#print("<a href=\"".$file."\">".$file."</a><br />\n");
				echo "&nbsp;<img src=\"$show_path/".$file."\" alt=\"".$file."\" />&nbsp;\n";
			}
		}
		closedir($handle);
	}
}
?> 
<?
if ($view == none) {
	print "
		<table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" class=\"article\"><tr><td>

		<!------------------------ START 水果的功效 ------------------------>
			<div><a href=\"javascript:toggleSpecific('article_fruits');\" title=\"article_fruits\">水果的功效</a></div>
			<div class=\"hide\" id=\"article_fruits\" style=\"display: none;\" class=\"article-content\">
			<?print $str_art_fru;?>
			<p class=\"article-close\"><a href=\"javascript:toggleSpecific('article_fruits');\" title=\"article_fruits\">::CLOSE:: 水果的功效</a></p></div>
		<!------------------------ END 水果的功效 ------------------------>

		<!------------------------ START 感冒問題知多少 ------------------------>
			<div><a href=\"javascript:toggleSpecific('article_flu');\" title=\"article_flu\">感冒問題知多少</a></div>
			<div class=\"hide\" id=\"article_flu\" style=\"display: none;\" class=\"article-content\">
			<?print $str_art_flu;?>
			<p align=\"right\"><font size=\"1\" face=\"標楷體\">資料來源：GQ 的兒科小棧</font></p>
			<p class=\"article-close\"><a href=\"javascript:toggleSpecific('article_flu');\" title=\"article_flu\">::CLOSE:: 感冒問題知多少</a></p></div>
		<!------------------------ END 感冒問題知多少 ------------------------>

		</td></tr></table>
	";
}

?>