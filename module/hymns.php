<?php

/*
function db_run($query) {
	$db = mysql_connect('10.8.11.133', 'hymns', 'nm!v84m#Jg');
	mysql_select_db('hymns');
	$res = mysql_query($query);
	if (!$res) {
		die('Invalid query: ' . mysql_error());
	} else {
		$rows = array();
		while ($row = mysql_fetch_assoc($res)) {
			array_push($rows, $row);
		}
	}
	mysql_close($db);
	return $rows;
}
*/

#echo "<hr> hymns <br />This is <b>" . $mod . "</b> content within " . gfn() . " page.";

$coming_sunday = "2010-05-16";
$choir_sunday = "輕輕聽";
$sunday_school = "歸家吧";
$solo_sunday = "愛的真締";
$reinforce = "信心的道路, 求主充滿我";
$choirSunday = "
<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='http://fccc.net/?mod=hymns&view=05#=tfdhy'>天父的花園</a>
";
$new = "
<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='http://fccc.net/?mod=hymns&view=07#=wbwmtyl'>我不為明天憂慮</a>
";
$father2012 = "
<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='http://fccc.net/?mod=hymns&view=02#=mq'>父親&nbsp;(原名: 母親)</a>
<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='http://www.fccc.net/?mod=hymns&view=mothers_day#=tmdjt'>甜蜜的家庭</a>
<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='http://fccc.net/?mod=hymns&view=05#=tfdhy'>天父的花園</a>
";
$str_weekly = "
		<center><h2><font color=\"#0066cc\"> Welcome <br /> to Foster City Chinese Church online hymns.</font></h2></center>
		<p><ul>
		<li><a href=http://www.fccc.net/module/karaoke.php>聖詩卡拉OK</a></li>
		</ul></p>";
#		<li><a href=\"/?mod=hymns&view=mothers_day\">母親節歌曲</a></li>\n
#		<h1>1.遊子吟 2. 媽媽好 3. 甜蜜的家庭 4. 母親您真偉大 5. 媽媽的吻 6. 母親您在何方</h1>		
#		<li><h1><font color=\"red\">新歌:&nbsp;<a href=\"/?mod=hymns&view=10#=zdednsyszj\">主的恩典乃是一生之久</a>&nbsp;10/20/2012</font></h1></li>
#		<li>父親節 6/17/2012 <img src='/bin/images/new_icon.gif' alt='NEW'>".$father2012."</li>
#		<li>詩班獻詩 5/27/2012".$choirSunday."</li>
#		<li>新歌練唱".$new."</li>
#		<li><a href=http://www.fccc.net/?mod=hymns&view=wedding>婚禮詩歌&nbsp;Sunday&nbsp;9/25/2011</a></li>
#		<li><a href=http://www.fccc.net/?mod=hymns&view=worship>星期日主日敬拜詩歌&nbsp;".$coming_sunday."</a></li>
#		<li><a href=http://www.fccc.net/?mod=hymns&view=sunday_school>兒童主日學詩歌&nbsp;&nbsp".$sunday_school."</a></li>
#		<li><a href=http://www.fccc.net/?mod=hymns&view=choir>詩班獻詩&nbsp;".$coming_sunday."&nbsp;&nbsp".$choir_sunday."</a></li>
#		<li><a href=http://www.fccc.net/?mod=hymns&view=solo>獨唱&nbsp;".$coming_sunday."&nbsp;&nbsp".$solo_sunday."</a></li>
#		<li><a href=http://www.fccc.net/?mod=hymns&view=reinforce>新歌加強練唱&nbsp;".$coming_sunday."&nbsp;&nbsp".$reinforce."</a></li>
#		<li><a href=http://www.fccc.net/?mod=hymns&view=xmas>聖誕歌曲</a></li>

$hymns = array(
	"00" => "bin/hymns_list/00.txt",	"01" => "bin/hymns_list/01.txt",	"02" => "bin/hymns_list/02.txt",	"03" => "bin/hymns_list/03.txt",
	"04" => "bin/hymns_list/04.txt",	"05" => "bin/hymns_list/05.txt",	"06" => "bin/hymns_list/06.txt",	"07" => "bin/hymns_list/07.txt",
	"08" => "bin/hymns_list/08.txt",	"09" => "bin/hymns_list/09.txt",	"10" => "bin/hymns_list/10.txt",	"11" => "bin/hymns_list/11.txt",
	"mothers_day" => "bin/hymns_list/mothers_day.txt", "wedding" => "bin/hymns_list/wedding.txt",
	"xmas" => "bin/hymns_list/xmas.txt",
	"choir" => "bin/hymns_list/choir.txt", "worship" => "bin/hymns_list/worship.txt"
);
$path_to_hymns = 'bin/hymns/';
$path_to_lyrics = 'bin/hymns_lyrics/';
$view = $_GET['view'];
$sel_hymns = $hymns[$view];

/*---------------------------------------- functions ----------------------------------------*/

// count hymns that exist in .txt file
function count_hymns() {
	global $sel_hymns;
	$file = file_get_contents($sel_hymns);
	$lines = array();
	$lines = explode("\n", $file);
	$line_count = count($lines);
	return $line_count;
	/*for ($i = 0; $i < $line_count; $i++) {	// displays every single line [check]
		echo $lines[$i]."<hr>";
	}*/
}
// display hymn names at top of selected specific word-number hymn page
function create_anchor_table() {
	global $open, $view;
	$num_hymns = count_hymns();
	$cht = 0;
	$ufn = 1;
	echo "<fieldset><table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" width=\"550\" style=\"padding:5px 0 5px 0\">\n"
		."	<tr width=90% align=center>\n";
	/*
		if ($view < 4) {
			$t = 7;
		} else if ($view >= 4 && $view < 7) {
			$t = 5;
		} else if ($view >= 7 && $view <= 8) {
			$t = 4;
		} else {
			$t = 3;
		} 
	*/
	// the above if statement is replaced by the alternative syntax below
	$t = ($view < 4) ? 7 : (($view >= 4 && $view < 7) ? 5 : ((($view >= 7 && $view <= 8) ? 4 : 3)));  //ternary operator

	$cols = $t;
/*
	$current_user = 'jack';
	$rows = db_run("select hymns from users where username = '$current_user';");
	$users_hymns = explode(' ', $rows[0]['hymns']);
*/

/*	'function sendUpdate() {
		var xhr = new XmlHttpRequest("http://www.fccc.net/update.php?op=add&hymn=xz", request);
	}'*/

	for ($row = 1; $row <= $num_hymns; $row++) {
		$temp = $row-1;
		if ($cols >= 1) {
/*			$checked = in_array($open[$temp][$ufn], $users_hymns) ? 'checked="checked"' : '';*/
			echo '<td style="border:0; text-align:right"><!--<input onclick="sendUpdate()" type="checkbox" value="'.$open[$temp][$ufn].'" '.$checked.'>-->'.$row.".&nbsp;<a href=\"#=".$open[$temp][$ufn]."\">".$open[$temp][$cht]."</a></td>";
			$cols -= 1;
		} else {
			echo "</tr><tr width=90% align=center>\n";
			$cols = $t;
			$row -= 1;
		}
	}
	echo "	</tr></table></fieldset><br />";
}
// display each hymn with a play button
function display_hymns() {
	global $sel_hymns, $path_to_hymns, $path_to_lyrics, $open;
	$num_hymns = count_hymns();

	// display # of songs [check]
	/*echo "There are ".count_hymns()." songs here <br />";
	echo "<br />2nd dimention [0] is ".$open[0][0]."<br />"
		."2nd dimention [1] is ".$open[0][1]."<br />"
		."2nd dimention [2] is ".$open[0][2]."<br />";
	*/
	$cht = 0;
	$ufn = 1;
	$eng = 2;
	for ($i = 1; $i <= $num_hymns; $i++) {
		$temp = $i-1;
		// [check] echo "<p>song #$i cht title is	".$open[$temp][$cht]." :: unique file name is ".$open[$temp][$ufn]." :: eng title is ".$open[$temp][$eng]."</p>";

			//cap top
		echo "<a name=\"=".$open[$temp][$ufn]."\"><table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" width=\"100%\">"
			."	<tr style='cursor:hand'><a href=\"#toggle\" onclick=\"toggle_collapse('".$open[$temp][$ufn]."')\" onMouseOver=\"this.style.cursor='hand'; window.status='Click on song names for lyrics.'; return true\"><td class=\"tbtl\"></td><td class=\"tbtm\" nowrap=\"nowrap\">".$open[$temp][$cht]."</td><td class=\"tbtr\"><img src=\"/bin/images/hymns/collapse_thead.gif\" name=\"img".$open[$temp][$ufn]."\" title=\"Collapse & Expand\" align=\"right\" border=\"0\" hspace=\"0\" style=\"float:right; cursor:default\"></a></td>"
			."</table></a>"

			//body
			."<table cellpadding=\"0\" cellspacing=\"1\" border=\"0\" width=\"100%\" class=\"tbb\">"
			."<tr><th>"
#			."<object classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,47,0\" width=\"40\" height=\"40\">"
#			."	<param name=movie value=\"bin/swf/play.swf?theFile=".$path_to_hymns,$open[$temp][$ufn].".mp3\">"
#			."	<param name=quality value=high>"
#			."	<param name=bgcolor value=#eaeaea>"
#			."	<embed src=\"bin/swf/play.swf?theFile=".$path_to_hymns,$open[$temp][$ufn].".mp3\" quality=high bgcolor=#eaeaea  width=\"40\" height=\"40\" type=\"application/x-shockwave-flash\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\"></embed>"
#			."</object>"

			."<object id=\"player\" classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" name=\"player\" width=\"470\" height=\"22\">"
			."	<param name=\"movie\" value=\"bin/swf/LongTailPlayer.swf\" />"
			."	<param name=\"allowscriptaccess\" value=\"always\" />"
			."	<param name=\"flashvars\" value=\"file=".$path_to_hymns,$open[$temp][$ufn].".mp3\" />"
			."	<embed type=\"application/x-shockwave-flash\" id=\"player2\" name=\"player2\" src=\"bin/swf/LongTailPlayer.swf\" width=\"470\" height=\"20\" allowscriptaccess=\"always\" allowfullscreen=\"true\" flashvars=\"file=".$path_to_hymns,$open[$temp][$ufn].".mp3\" />"
			."</object>"
			
			#."<img src=\"/images/media/icon_pdf.gif\" alt=\"PDF File\" />&nbsp;<a href=\"".$path_to_lyrics,$open[$temp][$ufn].".pdf\" class=\"lyrics_link\" target=\"same\">Print Lyrics</a>"
			."</th></tr>"

			// collapse off first
			#."<tr id=\"".$open[$temp][$ufn]."\" style=\"display: none;\"><td class=\"row\">"
			// collapse on first
			."<tr id=\"".$open[$temp][$ufn]."\"><td class=\"row\">"
			."	<table>"
			."		<tr><td><img src=\"".$path_to_lyrics,$open[$temp][$ufn].".gif\" width=\"530\" alt=\"\" /></td></tr>"
			."		<tr><td><div class=\"back_top\"><a href=\"#\">::Back to Top::</a></div></td></tr>"
			."	</table>"
			."</td></tr>"
			."</table>"

			// cap bottom
			."<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" width=\"100%\">"
			."	<tr><td class=\"tbll\"></td><td class=\"tblm\" nowrap=\"nowrap\">&nbsp;</td><td class=\"tblr\"></td>"
			."</table>";
	}
}
// CSS & JavaScript & side menu
function scripts() {
	echo "<link rel=\"stylesheet\" href=\"/css/media.css\" type=\"text/css\" >";
}

/*---------------------------------------- HTML Main Page ----------------------------------------*/
scripts();

echo "<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" width=\"100%\" height=\"87%\"><tr>"
	."<td width=\"170\" class=\"v-line\">&nbsp;";
?>

<!-- START left float menu -->
<div id="divStayTopLeft" style="position:absolute">
<layer id="divStayTopLeft">

<table border="1" width="150" cellspacing="0" cellpadding="0" bordercolor="#D6E7F8" class="leftFloatNav">
	<tr>
		<td width="100%" bgcolor="#D6E7F8" align="center">
			<a href="http://www.fccc.net/?mod=hymns" class="leftFloatNavHeader">Hymns Homepage</a>
		</td>
	</tr>
	<tr>
		<td width="100%">
			<a href="?mod=hymns&view=02">2-Word Hymns</a><br />
			<a href="?mod=hymns&view=03">3-Word Hymns</a><br />
			<a href="?mod=hymns&view=04">4-Word Hymns</a><br />
			<a href="?mod=hymns&view=05">5-Word Hymns</a><br />
			<a href="?mod=hymns&view=06">6-Word Hymns</a><br />
			<a href="?mod=hymns&view=07">7-Word Hymns</a><br />
			<a href="?mod=hymns&view=08">8-Word Hymns</a><br />
			<a href="?mod=hymns&view=09">9-Word Hymns</a><br />
			<a href="?mod=hymns&view=10">10-Word Hymns</a><br />
			<hr>
			<a href="?mod=hymns&view=worship">Worship</a><br />
			<a href="?mod=hymns&view=choir">Choir</a><br />
			<a href="?mod=hymns&view=mothers_day">Mother's Day</a><br />
			<a href="?mod=hymns&view=xmas">Christmas</a><br />
		</td>
	</tr>
</table>
</layer>
</div>
<!-- END left float menu -->

<script type="text/javascript">
JSFX_FloatTopDiv();
</script>

<?
echo "</td>"
	."<td valign=\"top\"><div class=\"container\">";

if ($view == null && $sel_hymns == null) {  // media homepage
	echo $str_weekly;
} else if (!file_exists($sel_hymns)) {
	$t = $view;
	echo "<center><h2><font color=\"#ff0000\">";
	if ($t <= 9) {
		echo substr($t, -1);	//omits other characters from the negative start'th (last) character of string
	} else {
		echo $t;
	}
	echo "-word hymns</font> is currently not available.<br />Sorry for the inconvenience!</h2></center><br /><br /><br />";
} else {
	// Store .txt contents into arrays
	function fetch ( $filename, $return_max_lines=0, $callback_func=null, $do_rtrim=true, $buffer_size=1024 ) {
	   $open = fopen( $filename, 'rb' );	// open file pointer
	   $open_data = array();	// start an array [good coding practice]
	   $line=0;	// start an internal line counter [good coding practice]
	   while( !feof($open) )	// begin the loop
	   {
		   if( $do_rtrim ) {
			   $open_data[$line] = rtrim(fgets($open, $buffer_size));	// add line to array, do an rtrim()
		   }
		   else {
			   $open_data[$line] = fgets($open, $buffer_size);	// add line to array
		   }
		   if( $callback_func != null && function_exists( $callback_func ) ) {
			   eval($callback_func . '($open_data[$line]);');
		   }
		   $line++;	// +1 to the internal line counter
		   if( $return_max_lines > 0 ) {
			   if( $line >= $return_max_lines ) {
				   break;
			   }
		   }
	   }	// close the file pointer
	   fclose($open);
	   return $open_data;   // return the data
	}	// we will assume the function is in here somewhere

	function callback( &$input ) {	// create a callback function
	   $input = explode("\t", $input);
	}

	$open = fetch($sel_hymns, 50, 'callback');	// # argument indicates # of hymns stored in $open array
	// print_r($open);	// output array using print_r() [check]

	create_anchor_table();
	display_hymns();
}

echo "</div></td>"
	."</tr></table><div class=\"hLine\"></div>";
?> 


<?
// check if file exists [check]
/*
foreach ($hymns as $k => $v) {
	if (file_exists($hymns[$k])) {
		$file = file_get_contents($hymns[$k]);
		$c = array();
		$c = explode("\n", $file);
		$lines = count($c);
		echo "<font color=\"#0000ff\">{$hymns[$k]} exists.</font>  and there are $lines songs<br />";
		$t += $lines;
	}
	else {
		echo "<font color=\"#ff0000\">{$hymns[$k]} does not exist.</font><br />";
	}
}
echo "<h1> There are total $t songs";
*/

/*------------------------------------ working in progress ------------------------------------*/
// Count total hymns at FCCC Media
/*
function count_total_hymns() {
	global $hymns;
	$files = $hymns;
	foreach ($files as $k => $v) {
		if(file_exists($files[$k]) {
			$txt = count(file($files[$k]));
		}
		$lines += $txt;
	}
	echo "There are total $lines songs at FCCC Media page.";
}
count_total_hymns();
*/
/*------------------------------------ working in progress ------------------------------------*/


/***************************** create_anchor_table (old) *****************************
function create_anchor_table() {
	global $sel_hymns, $open;
	$num_hymns = count_hymns();
	$cht = 0;
	$ufn = 1;
	echo "<center><table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" width=550>"
		."	<tr><td><div style=\"padding-bottom:15px\">";
	$cols = 5;
	for ($row = 1; $row <= $num_hymns; $row++) {
		$temp = $row-1;
		if ($cols >= 1) {
			echo "<span style=\"border:0; padding: 0 8px 4px 8px\">".$row.".&nbsp;<a href=\"#=".$open[$temp][$ufn]."\">".$open[$temp][$cht]."</a></span>";
			$cols -= 1;
		} else {
			echo "<br />";
			$cols = 5;
			$row -= 1;
		}
	}
	echo "	</div></td></tr></table></center>";
}
**************************************** back up ****************************************/

//check box next to each filename
/*
		$file_ary = isset($_POST['rfile']) ? $_POST['rfile'] : array();
		// At first visit, show the file list
		if (empty($file_ary))
		{
			#$image_path = dirname(__FILE__) . '/images';
			$dinner_path = $image_path."dinnerbox";
			$dir_handle = null;
			
			if (!($dir_handle = opendir($dinner_path)))
			{
				//trigger_error('error, path not found');
				return;
			}
			$html = '<html><form method="post">';
			$file = readdir($dir_handle);
			
			while ($file)
			{
				$html .= "{$file}<input type=\"checkbox\" name=\"rfile[]\" value=\"{$file}\" /><br />\r\n";
				$file = readdir($dir_handle);
			}
			closedir($dir_handle);
			
			$html .= '<input type="submit" name="submit" value="Submit" />';
			$html .= "</form></html>";
			echo $html;
		}

		// Now, we have list, display it or do anything you need to
		if (!empty($file_ary))
		{
			echo '<pre>';
			print_r($file_ary);
			echo '</pre>';
		}

*/
?>