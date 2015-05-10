<?php

#echo "<hr> church <br />This is <b>" . $mod . "</b> content within " . gfn() . " page.";

$coming_sunday = "2008-09-21";

$mod = $_GET['mod'];
$view = $_GET['view'];

print $str_church_submenu;

if ($mod == "church") {
	if ($view == "programme") {
		#echo "<p> now is content of <b>". $mod . "&" . $view ."</b>";
?>

</head>
<body>

<!-- START programme -->
<div id="programme" style="display: block">
	<div class="tabs"><span class="tab1on"><img src="/bin/images/programme/1x1.gif" class="tabImage"></span><span class="tab2off"><a href="javascript:viewSermons()" onmouseover="window.status='View sermons'; return true" onmouseout="window.status=''; return true"><img src="/bin/images/programme/1x1.gif" class="tabImage"></a></span><span class="tabDate"><?print $coming_sunday;?></span></div>
	<div id="capTop1on"></div>
		<div id="wrapper">
			<div>
				<!-- START left content -->
				<div class="contentLeft">
					<div class="header"><span class="announcement"></span></div>
						<img src="/bin/images/programme/2008-08-10/cell_text_announcement.gif" alt="" />
					<div class="header"><span class="programme"></span></div>
						<img src="/bin/images/programme/<?print $coming_sunday;?>/cell_text_programme.gif" alt="" />
					<div class="header"><span class="staff"></span></div>
						<img src="/bin/images/programme/2008-08-10/cell_text_staff.gif" alt="" />
				</div>
				<!-- END left content -->
				<!-- START right content -->
				<div class="contentRight">
					<div class="header"><span class="prayer"></span></div>
						<img src="/bin/images/programme/2008-08-10/cell_text_prayer.gif" alt="" />
					<div class="header"><span class="verse"></span></div>
						<img src="/bin/images/programme/<?print $coming_sunday;?>/cell_text_verse.gif" alt="" />
					<div class="header"><span class="personnel"></span></div>
						<img src="/bin/images/programme/cell_text_personnel.gif" alt="" />
					<div>　</div>
				</div>
				<!-- END right content -->
			</div>
		</div>
	<div id="smallcapBottom"></div>
	<div id="coverup"><span class="image"></span></div>
</div>
<!-- END programme -->

<!-- START sermons -->
<div id="sermons" style="display: none">
	<div class="tabs"><span class="tab1off"><a href="javascript:viewProgramme()" onmouseover="window.status='View programme'; return true" onmouseout="window.status=''; return true"><img src="/bin/images/programme/1x1.gif" class="tabImage"></a></span><span class="tab2on"><img src="/bin/images/programme/1x1.gif" class="tabImage"></span><span class="tabDate">&nbsp;</span></div>
	<div id="capTop2on"></div>
		<div id="wrapper">
			<div>
				<div class="columns">
				<p><font color="red">This content is temporary unavailable.  We are sorry for the inconvenience.</font></p>
					<!-- 7/16/2006 -->
<!--					<div class="sermon-list"><img src="/bin/images/programme/2006-07-16_sermon_text.gif"><span class="download"><a href="/download.php?filelist=4" onMouseover="lightup('pic4')" onMouseout="turnoff('pic4')"><img src="/bin/images/programme/download_14x14.gif" width="14" height="14">&nbsp;<img src="/bin/images/programme/text_download_off.gif" name="pic4" width="32" height="17" alt="" /></a></span><span class="listen"><img src="/bin/images/programme/wmp_16x16.gif">&nbsp;<img src="/bin/images/programme/text_listen_online.gif" width="85" height="17" alt="" /><a href="/download.php?filelist=5" onMouseover="lightup('pic5')" onMouseout="turnoff('pic5')"><img src="/bin/images/programme/text_broadband_off.gif" name="pic5" width="32" height="17" alt="" /></a>&nbsp;&nbsp;&nbsp;<a href="/download.php?filelist=6" onMouseover="lightup('pic6')" onMouseout="turnoff('pic6')"><img src="/bin/images/programme/text_narrowband_off.gif" name="pic6" width="32" height="17" alt="" /></a></span></div>-->
				</div>
			</div>
		</div>
	<div id="smallcapBottom"></div>
</div>
<!-- END sermons -->
<?
	} else if ($view == "sundayschool") {
		#echo "<p> now is content of <b>". $mod . "&" . $view ."</b>";
?>
		<br /><br />
		<table border="1" id="table1" cellpadding="0" style="border-collapse: collapse" bordercolor="#D6E7F8" align="center">
			<tr>
				<td width="120" valign="top" align="center">
				<img border="0" src="<?print $picture_path;?>walter.jpg" width="118" height="118"></td>
				<td width="180" valign="top" height="200">
				<p class="MsoNormal" style="line-height: 24px; margin-top: 0; margin-bottom: 0">
				<span style="font-family: 標楷體"><font style="font-size: 16pt">校　長</font></span><font size="2">
				</font>
				<span lang="EN-US" style="font-size: 10.0pt; font-family: Verdana">
				(Principle)</span></p>
				<p class="MsoNormal" style="line-height: 24px; margin-top: 0; margin-bottom: 0">
				<span style="font-family: 標楷體"><font style="font-size: 16pt">李其樺</font></span><span lang="EN-US" style="font-family: Verdana"><font size="2"> 
				(Walter Lee) </font></span></p>
				<p class="MsoNormal" style="line-height: 18px; margin-top: 10px; margin-bottom: 10px">
				<span style="font-family: 標楷體">美國加州柏克萊大學政治經濟系畢業，專攻電腦、雙語教學。</span></p>
				<p style="line-height: 18px; margin-top: 0; margin-bottom: 0">
				<span lang="EN-US" style="font-family: Verdana"><font size="2">
				Graduated from UC Berkeley major in Political Economy.</font></span></td>
				<td width="120" valign="top" align="center">
				<img border="0" src="<?print $picture_path;?>jacky.jpg" width="118" height="118"></td>
				<td width="180" valign="top">
				<p class="MsoNormal" style="line-height: 24px; margin-top: 0; margin-bottom: 0">
				<span style="font-family: 標楷體; font-size:16pt">副校長</span><font size="2">
				</font><span lang="EN-US" style="font-family: Verdana">
				<font size="2">(Vice Principle)</font></span></p>
				<p class="MsoNormal" style="line-height: 24px; margin-top: 0; margin-bottom: 0">
				<font style="font-size: 16pt"> 
				<span style="font-family: 標楷體">李其霖</span></font><span lang="EN-US" style="font-family: Verdana"><font size="2"> 
				(Jacky Lee)</font></span></p>
				<p class="MsoNormal" style="line-height: 18px; margin-top: 10px; margin-bottom: 10px">
				<span style="font-family: 標楷體">美國加州聖馬刁學院專攻電腦、中文。</span></p>
				<p class="MsoNormal" style="line-height: 18px; margin-top: 10px; margin-bottom: 10px">
				<span style="font-family: 標楷體">福市華人教會牧師助理兼中文學校副校長，及課後輔導班主任。</span></td>
			</tr>
			<tr>
				<td width="120" valign="top" align="center">
				<img border="0" src="<?print $picture_path;?>batu.jpg" width="118" height="118"></td>
				<td width="180" valign="top" height="200">
				<p class="MsoNormal" style="line-height: 24px; margin-top: 0; margin-bottom: 0">
				<span style="font-family: 標楷體; font-size:16pt">
				教學組長</span></p>
				<p class="MsoNormal" style="line-height: 18px; margin-top: 0; margin-bottom: 0">
				<span lang="EN-US" style="font-size: 10.0pt; font-family: Verdana">
				&nbsp;&nbsp;&nbsp;&nbsp; (Chief of Curriculum &amp;</span></p>
				<p class="MsoNormal" style="line-height: 18px; margin-top: 0; margin-bottom: 0">
				<span lang="EN-US" style="font-size: 10.0pt; font-family: Verdana">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Instruction Section)</span></p>
				<p class="MsoNormal" style="line-height: 24px; margin-top: 0; margin-bottom: 0">
				<span style="font-family: 標楷體; font-size:16pt">鮑&nbsp; 雲</span><span lang="EN-US" style="font-family: Verdana"><font size="2"> 
				(Batu Pao) </font></span></p>
				<p class="MsoNormal" style="line-height: 18px; margin-top: 10px; margin-bottom: 10px">
				<span style="font-family: 標楷體">臺灣省臺灣大學農化系畢業，教職、經商。雙語教學。</span></p></td>
				<td width="120" valign="top" align="center">
				<img border="0" src="<?print $picture_path;?>yanmei.jpg" width="118" height="118"></td>
				<td width="180" valign="top">
				<p class="MsoNormal" style="line-height: 24px; margin-top: 0; margin-bottom: 0">
				<span style="font-family: 標楷體; font-size:16pt">
				訓導主任</span><font size="2"> </font></p>
				<p class="MsoNormal" style="line-height: 18px; margin-top: 0; margin-bottom: 0">
				<span lang="EN-US" style="font-family: Verdana"><font size="2">
				&nbsp;&nbsp;&nbsp;&nbsp; (Director of Discipline)</font></span></p>
				<p class="MsoNormal" style="line-height: 24px; margin-top: 0; margin-bottom: 0">
				<span style="font-family: 標楷體; font-size:16pt">呂豔梅</span><span style="font-family: Verdana" lang="EN-US"><font size="2"> 
				(Yanmei Lu) </font></span></p>
				<p class="MsoNormal" style="line-height: 18px; margin-top: 10px; margin-bottom: 10px">
				<span style="font-family: 標楷體">北京師範大學學士畢業。</span></p>
				<p style="line-height: 18px; margin-top: 0; margin-bottom: 0">
				<font size="2">
				<span style="font-family: Verdana" lang="EN-US">P</span><span style="font-family: Verdana">h.D. 
				University of South Florida, Scientist.</span></font></p>
				<p class="MsoNormal" style="line-height: 18px; margin-top: 10px; margin-bottom: 10px">
				　</td>
			</tr>
			<tr>
				<td width="120" valign="top" align="center">
				<img border="0" src="<?print $picture_path;?>qi.jpg" width="118" height="118"></td>
				<td width="180" valign="top" height="200">
				<p class="MsoNormal" style="line-height: 24px; margin-top: 0; margin-bottom: 0">
				<span style="font-family: 標楷體; font-size:16pt">
				輔導主任</span></p>
				<p class="MsoNormal" style="line-height: 18px; margin-top: 0; margin-bottom: 0">
				<span lang="EN-US" style="font-size: 10.0pt; font-family: Verdana">
				&nbsp;&nbsp;&nbsp;&nbsp; (Dean of Guidance)</span></p>
				<p class="MsoNormal" style="line-height: 24px; margin-top: 0; margin-bottom: 0">
				<span style="font-family: 標楷體; font-size:16pt">陳&nbsp; 琪</span><span lang="EN-US" style="font-family: Verdana"><font size="2"> 
				(Qi Chen) </font></span></p>
				<p style="line-height: 18px; margin-top: 10px; margin-bottom: 0">
				<font size="2">
				<span style="font-family: Verdana">Ph.D. &amp; Scientist at Genetech, 
				Inc.</span></font></td>
				<td width="120" valign="top" align="center">
				<img border="0" src="<?print $picture_path;?>jennifer.jpg" width="118" height="118"></td>
				<td width="180" valign="top">
				<p class="MsoNormal" style="line-height: 24px; margin-top: 0; margin-bottom: 0">
				<span style="font-family: 標楷體; font-size: 16pt">教務處主任</span></p>
				<p class="MsoNormal" style="line-height: 24px; margin-top: 0; margin-bottom: 0">
				<span style="font-size: 16pt; font-family: 標楷體">吳澤明</span><span style="font-family: Verdana" lang="EN-US"><font size="2"> 
				(Jennifer Wu) </font></span></p>
				<p style="line-height: 18px; margin-top: 10px; margin-bottom: 0">
				　</td>
			</tr>
			<tr>
				<td width="120" valign="top" align="center">
				<img border="0" src="<?print $picture_path;?>michael.jpg" width="118" height="118"></td>
				<td width="180" valign="top" height="200">
				<p class="MsoNormal" style="line-height: 24px; margin-top: 0; margin-bottom: 0">
				<span style="font-size: 16pt; font-family: 標楷體">總務處主任</span></p>
				<p class="MsoNormal" style="line-height: 24px; margin-top: 0; margin-bottom: 0">
				<span style="font-size: 16pt; font-family: 標楷體">林　磊</span><span style="font-family: Verdana" lang="EN-US"><font size="2"> 
				(Michael Lin) </font></span></p>
				<p style="line-height: 18px; margin-top: 10px; margin-bottom: 0">
				　</td>
				<td width="120" valign="top" align="center">
				<img border="0" src="<?print $picture_path;?>xiumin.jpg" width="118" height="118"></td>
				<td width="180" valign="top">
				<p class="MsoNormal" style="line-height: 24px; margin-top: 0; margin-bottom: 0">
				<span style="font-size: 16pt; font-family: 標楷體">康樂組組長</span></p>
				<p class="MsoNormal" style="line-height: 24px; margin-top: 0; margin-bottom: 0">
				<span style="font-size: 16pt; font-family: 標楷體">吳秀敏</span><span style="font-family: Verdana" lang="EN-US"><font size="2"> 
				(Xiumin Wu) </font></span></p>
				<p style="line-height: 18px; margin-top: 10px; margin-bottom: 0">
				　</td>
			</tr>
			<tr>
				<td width="120" valign="top" align="center">
				<img border="0" src="<?print $picture_path;?>jenny.jpg" width="118" height="118"></td>
				<td width="180" valign="top" height="200">
				<p class="MsoNormal" style="line-height: 24px; margin-top: 0; margin-bottom: 0">
				<span style="font-size: 16pt; font-family: 標楷體">保健組組長</span></p>
				<p class="MsoNormal" style="line-height: 24px; margin-top: 0; margin-bottom: 0">
				<span style="font-size: 16pt; font-family: 標楷體">鄭月菊</span><span style="font-family: Verdana" lang="EN-US"><font size="2"> 
				(Jenny Cheng) </font></span></p>
				<p style="line-height: 18px; margin-top: 10px; margin-bottom: 0">
				　</td>
				<td width="120" valign="top" align="center">
				<img border="0" src="<?print $picture_path;?>denise.jpg" width="118" height="118"></td>
				<td width="180" valign="top">
				<p class="MsoNormal" style="line-height: 24px; margin-top: 0; margin-bottom: 0">
				<span style="font-family: 標楷體; font-size:16pt">
				老　師</span><font size="2"> </font>
				<span lang="EN-US" style="font-family: Verdana"><font size="2">
				(Teacher)</font></span></p>
				<p class="MsoNormal" style="line-height: 24px; margin-top: 0; margin-bottom: 0">
				<span style="font-family: 標楷體; font-size:16pt">高舒寧</span><span style="font-family: Verdana" lang="EN-US"><font size="2"> 
				(Shuning Gao) </font></span></p>
				<p style="line-height: 18px; margin-top: 10px; margin-bottom: 0">
				<font size="2">
				<span style="font-family: Verdana" lang="EN-US">M</span><span style="font-family: Verdana">BA 
				&amp; Support Engineer at Oracle</span></font></td>
			</tr>
			<tr>
				<td width="120" valign="top" align="center">
				<img border="0" src="<?print $picture_path;?>cliff.jpg" width="118" height="118"></td>
				<td width="180" height="200" valign="top">
				<p class="MsoNormal" style="line-height: 24px; margin-top: 0; margin-bottom: 0">
				<span style="font-size: 16pt; font-family: 標楷體">顧問</span><font size="2"> </font>
				<span lang="EN-US" style="font-family: Verdana"><font size="2">
				(Consultant)</font></span></p>
				<p class="MsoNormal" style="line-height: 24px; margin-top: 0; margin-bottom: 0">
				<span style="font-size: 16pt; font-family: 標楷體">許曉夫</span><span style="font-family: Verdana" lang="EN-US"><font size="2"> 
				(Cliff Hsu) </font></span></p>
				<p style="line-height: 18px; margin-top: 10px; margin-bottom: 0">
				　</td>
				<td width="120" valign="top" align="center">
				<img border="0" src="<?print $picture_path;?>buer.jpg" width="118" height="118"></td>
				<td width="180" valign="top">
				<p class="MsoNormal" style="line-height: 24px; margin-top: 0; margin-bottom: 0">
				<span style="font-family: 標楷體; font-size:16pt">
				老　師</span><font size="2"> </font>
				<span lang="EN-US" style="font-family: Verdana"><font size="2">
				(Teacher)</font></span></p>
				<p class="MsoNormal" style="line-height: 24px; margin-top: 0; margin-bottom: 0">
				<span style="font-family: 標楷體; font-size:16pt">王布爾</span><span style="font-family: Verdana" lang="EN-US"><font size="2"> 
				(Buer Wang) </font></span></p>
				<p style="line-height: 18px; margin-top: 10px; margin-bottom: 0">
				<font size="2">
				<span style="font-family: Verdana" lang="EN-US">Ph.</span><span style="font-family: Verdana">D. 
				&amp; Researcher at Genetech, Inc.</span></font></td>
			</tr>
			<tr>
				<td width="120" valign="top" align="center">
				<img border="0" src="<?print $picture_path;?>jack.jpg" width="118" height="118"></td>
				<td width="180" height="200" valign="top">
				<p class="MsoNormal" style="line-height: 24px; margin-top: 0; margin-bottom: 0">
				<span style="font-size: 16pt; font-family: 標楷體">顧問</span><font size="2"> </font>
				<span lang="EN-US" style="font-family: Verdana"><font size="2">
				(Consultant)</font></span></p>
				<p class="MsoNormal" style="line-height: 24px; margin-top: 0; margin-bottom: 0">
				<span style="font-size: 16pt; font-family: 標楷體">毛煒帆</span><span style="font-family: Verdana" lang="EN-US"><font size="2"> 
				(Jack Mao) </font></span></p>
				<p style="line-height: 18px; margin-top: 10px; margin-bottom: 0">
				　</td>
				<td width="120" valign="top" align="center">
				　</td>
				<td width="180" valign="top">
				　</td>
			</tr>
		</table>

<?
	} else if ($view == "bible") {
		#echo "<p> now is content of <b>". $mod . "&" . $view ."</b>";
?>
<body onload="showContent();">
	<!-- START page loading script -->
			<style type="text/css">
				#loading {font:normal 16px Verdana; color:red; height:100%;}
			</style>
			<script type="text/javascript">
				function showContent(){
				//hide loading status...
				document.getElementById("loading").style.display='none';
				//show content
				document.getElementById("content").style.display='block';
				}
			</script>
	<!-- END page loading script -->

		<center>
	<!-- START loading script -->
		<script type="text/javascript">
			document.write('<div id="loading" style="padding-top:20px;">資料讀取中... 請稍候<br />(Loading... Please wait.)<br /><img src="/bin/images/loading.gif"></div>');
		</script>

		<div id="content">
			<script type="text/javascript">
				document.getElementById("content").style.display='none';  //hide content
			</script>
	<!-- END loading script -->
	<!-- START Bible -->
		<iframe src="/module/bible_nav.htm" width="100%" height="90" scrolling="no" align="texttop" border="0" frameborder="0">
			<ilayer src="/module/bible_nav.htm"></ilayer>
		</iframe>
		
		<iframe name="main" width="90%" align="middle" src="/module/bible_main.htm#start" height="72%" marginwidth="4" marginheight="4" border="0" frameborder="0">
		</iframe>
		</div>
	<!-- END Bible -->
		</center>
<?
	} else if ($view == "donation") {
		#echo "<p> now is content of <b>". $mod . "&" . $view ."</b>";
		?><p align="center"><img src="<?print $image_path;?>donation_letter.gif"></p><?
	} else if ($view == null) {
		echo "<p> view is not being selected";
	}
}


?> 