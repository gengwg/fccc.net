<?php

$songs = "/media/audio/songs/";
$scripts = "/bin/";
$images = "/bin/images/";
$there_is_a_god = "
1.有一位神，有權能創造宇宙萬物，<br>
也有溫柔雙手安慰受傷靈魂。<br>
有一位神，有權柄審判一切罪惡，<br>
也有慈悲體貼人的軟弱。<br>
<br>
2.有一位神，有權能創造宇宙萬物，<br>
也有溫柔雙手安慰受傷靈魂。<br>
有一位神，高坐在榮耀的寶座，<br>
卻死在十架挽救人墮落。<br>
<br>
副歌：有一位神，我們的神，唯一的神，名叫耶和華。<br>
有權威榮光，有恩典慈愛，是昔在今在永在的神。<br>

";
$precious_cross = "
主耶穌，我感謝你，你的身體，為我而捨。<br>
帶我出黑暗，進入光明國度，使我再次能看見。<br>
主耶穌，我感謝你，你的寶血，為我而流。<br>
寶貴十架上，醫治恩典湧流，使我完全得自由。<br>
寶貴十架的大能賜我生命，主耶穌我俯伏敬拜你。<br>
寶貴十架的救恩，是你所立的約，你的愛永遠不會改變。<br>
<br>
<i>[ Precious Cross ]</i><br>
Thank You Lord, You died for me.<br>
With love, You gave Your life for me.<br>
Brought me from darkness into the world of light,<br>
opened my eyes to see.<br>
Praise You Lord, Your love for me.<br>
Your blood of grace flows over me.<br>
Your tender mercy pours down from Calvary.<br>
Your love has set me so free.<br>
The precious Cross, by its pow'r I am set free. <br>
With my all, I worship at Your feet.<br>
Your saving grace, so secure in this promise of old.<br>
It's Your love unchanging for me.<br>
";
?>

<?php

$files = array();

if ($handle = opendir('../media/audio/songs')) {
	while (false !== ($file = readdir($handle))) { 
		if ($file != "." AND $file != ".."){
			$files[] = $file;
		}
	}
	closedir($handle); 
}

asort($files);
print_r($files);

##############################
# get ID3 tags from mp3 file #
// From here: http://www.autistici.org/ermes/index.php?pag=1&post=15
// and fixed here: http://www.barattalo.it
// ------------------------------
// example:
// print_r( tagReader ("myfile.mp3") );
// ------------------------------
function tagReader($file){
	$id3v23 = array("TIT2","TALB","TPE1","TRCK","TDRC","TLEN","USLT");
	$id3v22 = array("TT2","TAL","TP1","TRK","TYE","TLE","ULT");
	$fsize = filesize($file);
	$fd = fopen($file,"r");
	$tag = fread($fd,$fsize);
	$tmp = "";
	fclose($fd);
	if (substr($tag,0,3) == "ID3") {
		$result['FileName'] = $file;
		$result['TAG'] = substr($tag,0,3);
		$result['Version'] = hexdec(bin2hex(substr($tag,3,1))).".".hexdec(bin2hex(substr($tag,4,1)));
	}
	if($result['Version'] == "4.0" || $result['Version'] == "3.0"){
		for ($i=0;$i<count($id3v23);$i++){
			if (strpos($tag,$id3v23[$i].chr(0))!= FALSE){
				$pos = strpos($tag, $id3v23[$i].chr(0));
				$len = hexdec(bin2hex(substr($tag,($pos+5),3)));
				$data = substr($tag, $pos, 9+$len);
				for ($a=0;$a<strlen($data);$a++){
					$char = substr($data,$a,1);
					if($char >= " " && $char <= "~") $tmp.=$char;
				}
				if(substr($tmp,0,4) == "TIT2") $result['Title'] = substr($tmp,4);
				if(substr($tmp,0,4) == "TALB") $result['Album'] = substr($tmp,4);
				if(substr($tmp,0,4) == "TPE1") $result['Author'] = substr($tmp,4);
				if(substr($tmp,0,4) == "TRCK") $result['Track'] = substr($tmp,4);
				if(substr($tmp,0,4) == "TDRC") $result['Year'] = substr($tmp,4);
				if(substr($tmp,0,4) == "TLEN") $result['Lenght'] = substr($tmp,4);
				if(substr($tmp,0,4) == "USLT") $result['Lyric'] = substr($tmp,7);
				$tmp = "";
			}
		}
	}
	if($result['Version'] == "2.0"){
		for ($i=0;$i<count($id3v22);$i++){
			if (strpos($tag,$id3v22[$i].chr(0))!= FALSE){
				$pos = strpos($tag, $id3v22[$i].chr(0));
				$len = hexdec(bin2hex(substr($tag,($pos+3),3)));
				$data = substr($tag, $pos, 6+$len);
				for ($a=0;$a<strlen($data);$a++){
					$char = substr($data,$a,1);
					if($char >= " " && $char <= "~") $tmp.=$char;
				}
				if(substr($tmp,0,3) == "TT2") $result['Title'] = substr($tmp,3);
				if(substr($tmp,0,3) == "TAL") $result['Album'] = substr($tmp,3);
				if(substr($tmp,0,3) == "TP1") $result['Author'] = substr($tmp,3);
				if(substr($tmp,0,3) == "TRK") $result['Track'] = substr($tmp,3);
				if(substr($tmp,0,3) == "TYE") $result['Year'] = substr($tmp,3);
				if(substr($tmp,0,3) == "TLE") $result['Lenght'] = substr($tmp,3);
				if(substr($tmp,0,3) == "ULT") $result['Lyric'] = substr($tmp,6);
				$tmp = "";
			}
		}
	}
	return $result;
}
echo "<pre>";
print_r( tagReader ("../media/audio/songs/Precious Cross.mp3") );
echo "</pre>";
##############################
?>

<html>
<head>
<meta charset="utf-8">​
<script src="<?print $scripts;?>jquery-1.8.1.min.js"></script>
<script>
$(document).ready(function(){
	//toggle song_body
	$(".song_lyrics_head").click(function(){
	  $(this).next(".song_body").slideToggle('400')
	  return false;
	});

	//collapse all songs
	$(".collpase_all_song").click(function(){
	  $(".song_body").slideUp('400')
	  return false;
	});
});
</script>
<style>
html {height:100%; overflow:auto;}
body {height:100%; margin:0; padding:0; font:Arial, Helvetica, sans-serif; font-size: 18px;}

/*****  START song container  *****/
#song_outer {position:absolute; width:100%;}
#song_list {width:500px; margin-left:-250px; position:absolute; left:50%;}
ul {list-style:none; margin-left:-40px;}
li {border-bottom:thin dashed #DCDCDC; padding:6px 8px 0 8px;}
.song_list_even_num {background-image:url(<?print $images;?>/song_title_bg.gif);}
.song_title {font-weight:normal;}
.song_title a, a:hover, a:visited {color:#0000ff;}
.song_title a {text-decoration:none;}
.song_title a:hover {text-decoration:none;}
.song_title a:visited {text-decoration:none;}
.song_lyrics_head {cursor:hand; color:#0000ff; padding:0 0 0 14px;}
.song_body {padding:8px 0 8px 0; display:none;}
.collapse_all {text-align:center; cursor:hand; color:#0000ff; font-size:16px;}
/*
background-color: #F5F5F5; WhiteSmoke 
content: '<br><br>';

*/

/*****  END song container  *****/

</style>


</head>

<body>



<!--<div>
<audio controls>
  <source src="http://www.html5tutorial.info/media/vincent.mp3" type="audio/mpeg"/>
  <source src="http://www.html5tutorial.info/media/vincent.ogg" type="audio/ogg"/>
  <object type="application/x-shockwave-flash" data="media/OriginalMusicPlayer.swf" width="200" height="80"> 
   <param name="movie" value="http://www.html5tutorial.info/media/OriginalMusicPlayer.swf"/>
   <param name="FlashVars" value="mediaPath=http://www.html5tutorial.info/media/vincent.mp3" />
  </object> 
  <embed width="200" height="80" src="http://www.html5tutorial.info/media/vincent.mp3" />
  Your browser does not support this audio format.
</audio>

<a href="/bin/hymns/adzd.mp3"> ---1--- </a><br>
<a href="/bin/hymns/ajlw.mp3"> ---2--- </a><br>
<a href="/bin/hymns/awyy.mp3"> ---3--- </a><br>
<a href="/bin/hymns/axlsm.mp3"> ---4--- </a>
</div>-->
<!--  START songs  -->
<div id="song_outer">
<div id="song_list">
<ul>
	<li><div>
		<span class="song_title"><a href="<?print $songs;?>Precious Cross.mp3">寶貴十架</a></span>
		<span class="song_lyrics_head">歌詞</span>
		<div class="song_body"><?print $precious_cross;?></div></div>
	</li>
	<li class="song_list_even_num"><div>
		<span class="song_title"><a href="<?print $songs;?>There Is A God.mp3">有一位神</a></span>
		<span class="song_lyrics_head">歌詞</span>
		<div class="song_body"><?print $there_is_a_god;?></div></div>
	</li>
	<li>
		<div class="collapse_all"><a class="collpase_all_song">Collapse All Songs</a></div>
	</li>
</ul>
</div>

</div>
<script src="http://mediaplayer.yahoo.com/js"></script>
<!--  END songs  -->

<!--  START Adding sound effect to A tag with jQuery  -->
<script>
$(function(){
	$('a.click').click(function(){
		$('embed').remove();
		$('body').append('<embed src="http://www.fccc.net/media/audio/songs/There Is A God.mp3" autostart="true" hidden="true" loop="false">');
	});

	$('a.hover').mouseover(function(){
		$('embed').remove();
		$('body').append('<embed src="hover.wav" autostart="true" hidden="true" loop="false">');
	});
}); 
</script>
<p><a href="#" class="click">Click here for sound effect</a></p>
<p><a href="#" class="hover">Hover here for sound effect</a></p>
<!--  END Adding sound effect to A tag with jQuery  -->
<object width="300" height="500">
<embed type="application/x-shockwave-flash"
src="http://www.google.com/reader/ui/3247397568-audio-player.swf?
audioUrl=http://www.fccc.net<?print $songs;?>There Is A God.mp3" width="400" height="27" 
allowscriptaccess="never" quality="best" bgcolor="#ffffff" 
wmode="window" flashvars="playerMode=embedded" />
</object>
<object>
<param name="src" value="http://www.fccc.net/media/audio/songs/There Is A God.mp3">
<param name="autoplay" value="false">
<param name="controller" value="true">
<param name="bgcolor" value="#FFFFFF">
<embed src="LINKHERE" autostart="false" loop="false" width="300" height="42"
controller="http://www.fccc.net/media/audio/songs/There Is A God.mp3" bgcolor="#FFFFFF"></embed>
</object>
<!----------->
<!--<br><br>
<!----------->

</body>