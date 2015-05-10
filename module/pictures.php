<?php

#echo "<hr> pictures <br />This is <b>" . $mod . "</b> content within " . gfn() . " page.";

#$base = trim(last_dir_name($mod), ".php");  // works only if $_GET is placed below "if"

define("TNAME", Chinese);  // language of folder title, not case sensitive, Chinese or English
define("BYDATE", FALSE);  // Set TRUE to display pictures by folder dates, or set FALSE to display by folder names
define("CHECK", FALSE);  // Set to FALSE to disable checks

$mod = $_GET['mod'];
$view = $_GET['view'];
$album = $_POST['album'];

$base = $mod;
$level = $view;

print $str_pictures_submenu;


if ($base == "pictures" && $level == NULL){
#	print "<center> list albums in folder style </center>";
	get($base, $level);
} else if ($base == "pictures" && $level !== NULL){
#	print "<center> display pictures </center>";
	get($base, $level);
} else {
	print "<center> either is being selected </center>";
}


function get($path, $depth){
#	$path = ($depth !== NULL) ? "bin/$path/$depth/" : "bin/$path/";
	if ($depth !== NULL){
		$path = "bin/$path/$depth/";
		_albumStyle($path);
	} else {
		$path = "bin/$path/";
		_folderStyle($path);
	}
#	echo $path."<br /><pre>";	print_r(_folders($path));	echo "</pre>";
}


// display all albums' pictures with thumbnails
function _albumStyle($apath){
	$pix = array();  // pictures stored in arrays
	$ph = array();  // picture handler
	
	// determine to display pictures either by date or by name
	if(BYDATE == FALSE){
		$ph = _folders($apath);
		rsort($ph);  // sort by name (z-a) highest to lowest
		#sort($ph);  // sort folders by name (a-z) lowest to highest
	} else if (BYDATE == TRUE){
		$d = $apath;
		$ph = _sortDate($d);
	}

	// store all pictures in $pix
	for ($t=0; $t< count($ph); $t++){
		$pix[] = pic_retriever($ph[$t]);
	}

	// generate anchor table
	echo "<center><div class=\"pixNavLinks\">";
	for ($a = 0; $a < count($ph); $a++){
		echo "<span><a href=\"#".last_dir_name($ph[$a])."\">"._albumTitle($ph[$a],TNAME)."</a></span><span>|</span>";
		print last_dir_name($ph[$g]);
	}
	echo "</div></center><br />";

	// generate picture gallery
	for ($g = 0; $g < count($ph); $g++){
		echo "<center><a name=\"".last_dir_name($ph[$g])."\"><div class=\"pixHeader\"><span>"._albumTitle($ph[$g],TNAME)."</span></div>";
		echo "<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" class=\"pixContent\"><tr><td>";
		// check if folder is empty
		if (array_values($pix[$g]) == NULL){
			echo "<font color=red><i>Pictures are not available in this content.</i></font>\n";
		} else {
			foreach ($pix[$g] as $file){
				echo "<a href=\"$ph[$g]/$file\" alt\"$ph[$g]\" /><img src=\"$ph[$g]/tn/$file\"></a>\n";
			}
		}
		echo "</td></tr><tr align=\"right\"><td><a href=\"#\" class=\"pixBackToTop\">back to top</a></td></tr></table>\n"
			."<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" class=\"pixTableBottom\">\n"
			."<tr><td class=\"tbl\"></td><td class=\"tbm\" nowrap=\"nowrap\">&nbsp;</td><td class=\"tbr\"></td></tr>\n</table></center>\n";
	}
}


// display albums in folder style
function _folderStyle($the_path){
	$album = array();
	$keys = array();
	$c = _folders($the_path);
	print "\n\t<center><table style='text-align:center' class=\"pixFolderStyle\"><tr style='vertical-align:top'>\n";
	for ($i=0; $i<count(_folders($the_path)); $i++){
		$temp = _folders($c[$i]);
		rsort($temp);
		$album[] = $temp;
		print "\t\t<td>";
		echo "<div class=\"pixTitle\">".ucwords(last_dir_name($c[$i]))." Albums</div><br />";
		$name = last_dir_name($c[$i]);
		for ($j=0; $j<count($album[$i]); $j++){
			print _randomImage($name, $album[$i][$j])."<br />";
		}
		print "\n\t\t</td>\n";
	}
	print "\t<td>&nbsp;</td></tr></table></center>\n";
}


// read all directories within a given directory, while removing the . and ..
function _folders($p){
	if(substr($p, -1) !== "/"){  // add trailing slash if it's not exist
		$p .= "/";
	}
	$entry = array();
	$dir = dir($p);
	while (($file = $dir->read()) !== FALSE){
		if(is_dir($dir->path.$file) == TRUE && $file !== "." && $file !== ".."){
			$entry[] = $p.$file;
		}
	}
	$dir->close();
	return $entry;
}


// retrieve the ending folder name in a directory path
function last_dir_name($dir){  // get last directory
	if(substr($dir, -1) == "/"){
		$dir = substr($dir, 0, -1);  // rip the trailing slash if there's one
	}
	$last = substr(strrchr($dir, "/"), 1);  // get everything after last slash
	return $last;
}


// display random image from a folder
function _randomImage($name, $display) {
	global $mod;
	$dirTitle = $display;
	$dirName = $display."/tn/";
	$msg = "";  // Either the IMG tag or message to be returned.
	$y = 0;  // Counts the number of images.
	$images = array();  // Holds the list of images to choose randomly from.
	$file_handle = "";
	if (is_dir($dirName)) {
		$file_handle=opendir($dirName); 
		$y = 0;
		while ($file = readdir($file_handle)) { 
				if (!is_dir($dirName . $file)) { 
					$images[$y] = $dirName . $file; 
					$y += 1;
				}
		}
		closedir($file_handle); 
		if (count($images) > 0) {
			srand((double)microtime()*1000000);
			$y = rand(0,(count($images) - 1));
			$msg = "<a href=\"?mod=$mod&view=$name#".last_dir_name($display)."\">";
			$msg .= _albumTitle($dirTitle, TNAME)."<br /><img src=\"" . $images[$y] . "\" alt=\"" . $y . "\"></a>";
		} else {
			$msg = "No random images located in \"" . $dirName . "\"\n";
		}
	} else {
		$msg = "\"" . $dirName . "\" does not appear to be a valid directory!\n";
	}
	return $msg;
}


// display folder title from title.txt
function _albumTitle($fetch, $language){
	$language = ucfirst($language);  // capitalize first letter
	$tfile = $fetch."/title.txt";  // store correct title.txt directory
	if(file_exists($tfile)){
		$fh = fopen($tfile,"rb");
		$fharr = array();
		$line = 0;
		while(!feof($fh)){
			$fharr[$line] = rtrim(fgets($fh, 1024));
			$line++;
		}
		fclose($fh);
		// determine which language to return
		if ($language == "Chinese"){
			return $fharr[1];
		} else if ($language == "English"){
			return $fharr[0];
		}
	} else {
		return "<i>Untitled</i>";
	}
}


// walk through folders and return picture names as an array
function pic_retriever($dir){
	// read all jpg file in the current directory
	if ($dh = opendir($dir)) {
		$files = array();
		while (($file = readdir($dh)) !== false) {
			if (substr($file, strlen($file) - 4) == '.jpg') {
				array_push($files, $file);
			}
		}
		closedir($dh);
	}
	return $files;
}


// sort directory by date
function _sortDate($the_path){
	$dir_by_date = array();
	$Files = LoadFiles($the_path);
	SortByDate($Files);
	while (list($k,$v)=each($Files)){  // store directory path into $dir_by_date by date
		$dir_by_date[] = $v[0];
	}
	return $dir_by_date;
}

function LoadFiles($dir){
	$Files = array();
	$It =  opendir($dir);
	if (! $It)
		die("Cannot list files for " . $dir);
	while ($Filename = readdir($It)){
		if ($Filename == '.' || $Filename == '..')
			continue;
		$LastModified = filemtime($dir.$Filename);
		$Files[] = array($dir.$Filename, $LastModified);
	}
	closedir($It);
	return $Files;
}

function DateCmp($a, $b){
	return ($a[1] > $b[1]) ? -1 : 1;  // sort from recent to old (a-z)
	#return ($a[1] < $b[1]) ? -1 : 1;  // sort from old to recent (z-a)
}

function SortByDate(&$Files){
	usort($Files, 'DateCmp');
}


/*********************************************************** above is revised version ***********************************************************/

?>
<!--  test drop down
<form method="POST" action="<?php $_SERVER["PHP_SELF"];?>">
	<select name="album" size="1" onChange="location = this.options[this.selectedIndex].value;">
		<option value="">Select an album...</option>
		<option value="church">Church</option>
		<option value="babysitting">Daycare</option>
		<option value="all">All</option>
	</select>
	<input type="submit" name="submit_button" value="Go">
</form>
Album: <?php print $_POST['album']; ?>
-->



<?
/**********************************test************************************
$t = "bin/pictures";
echo "<pre>";
print_r(read_dir($t));
echo "</pre>";
function read_dir($dir) {
   $array = array();
   $d = dir($dir);
   while (false !== ($entry = $d->read())) {
       if($entry!='.' && $entry!='..') {
           $entry = $dir."/".$entry;
           if(is_dir($entry)) {
               $array[] = $entry;
               $array = array_merge($array, read_dir($entry));
           } else {
               $array[] = $entry;
           }
       }
   }
   $d->close();
   return $array;
}

function getImagesList($path) {
    $ctr = 0;
    if ( $img_dir = @opendir($path) ) {
        while ( false !== ($img_file = readdir($img_dir)) ) {
            // add checks for other image file types here, if you like
            if ( preg_match("/(\.gif|\.jpg)$/", $img_file) ) {
                $images[$ctr] = $img_file;
                $ctr++;
            }
        }
        closedir($img_dir);
        return $images;
    } else {
        return false;
    }
}
/**********************************test************************************/
if(!$zzz==NULL){
echo "<p><b>Sort Directory and SubDirectory by Date</b></p>";
function LoadFiles2($dir,$filter="")
{
 $Files = array();
 $It =  opendir($dir);
 if (! $It)
  die('Cannot list files for ' . $dir);
 while ($Filename = readdir($It))
 {
 if ($Filename != '.' && $Filename != '..'  )
 {
  if(is_dir($dir . $Filename))
   {
   $Files = array_merge($Files, LoadFiles2($dir . $Filename.'/'));
   }
 else 
  if ($filter=="" || preg_match( $filter, $Filename ) ) 
   {
   $LastModified = filemtime($dir . $Filename);
   $Files[] = array($dir .$Filename, $LastModified);
   }
    
  else 
   continue;
   
 }
}
  return $Files;
}
function DateCmp2($a, $b)
{
  return  strnatcasecmp($a[1] , $b[1]) ;
} 

function SortByDate(&$Files)
{
  usort($Files, 'DateCmp2');
} 

$Files = LoadFiles2("pictures/tn/");
SortByDate($Files);
reset($Files);

print "<ul>";
while (list($k,$v) =each($Files))
 {
 ?><li> - <?=$v[0]?> <?=date('Ymd h:i',$v[1])?></li><?
 }
print "</ul>";
}
?>