<?php

function page_last_modified($m){
  $last_modified = filemtime($m);
  echo "Update: " . date("F dS, Y", $last_modified);  // date("l, dS F, Y @ h:ia", $last_modified);
}

function gfn(){
	$file_name = substr($_SERVER['SCRIPT_NAME'], 1);  // find out the path of current file & substr( ) used for optional removal of initial "/"
	return $file_name;
}

/*
function get_file_path (){

  $domain = $_SERVER['HTTP_HOST'];  // find out the domain:
  $path = $_SERVER['SCRIPT_NAME'];  // find out the path to the current file:
  $queryString = $_SERVER['QUERY_STRING'];  // find out the QueryString:
  $url = "http://" . $domain . $path . "?" . $queryString;  // put it all together:
  echo "The current URL is: " . $url . "<br />";

  $url = "http://" . $domain . $_SERVER['REQUEST_URI'];  // An alternative way is to use REQUEST_URI instead of both SCRIPT_NAME and QUERY_STRING, if you don't need them seperate:
}
*/

//This function retrieves all files within a directory (non recursive) and outputs them onto the page
//You can limit the type of files to retrieve, such as images only, as dictated by the file's extension

function getfiles($dirname=".") {
$pattern="(\.jpg$)|(\.png$)|(\.jpeg$)|(\.gif$)"; //valid image extensions
$files = array();
if($handle = opendir($dirname)) {
while(false !== ($file = readdir($handle))){
if(eregi($pattern, $file) || is_dir($file)) //if this file is a valid image or folder
echo "$file <br />";
}

closedir($handle);
}
return($files);
}
//EXAMPLE USAGE:
//getfiles(); //List all image files within the directory the PHP script is in
//getfiles("/home/content/f/c/c/fcccgodaddy/html"); //List all image files within a specific directory on the server

?>