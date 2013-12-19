<!DOCTYPE html>
<html>
  <head>
    <link type='text/css' rel='stylesheet' href='style.css'/>
    <title>PHP!</title>
  </head>
  <body>
   <?php
//Open GSM file, search for string GSM and return a string GSM until end of line
//which will be the GSM ID for use in Table Creation

$searchfor = "GSM";
$file = '/home/jcohen/TestGSMs/GSM1280329.txt';

// get the file contents, assuming the file to be readable (and exist)
$contents = file_get_contents($file);
// escape special characters in the query
$pattern = preg_quote($searchfor, '/');
// finalise the regular expression, matching the whole line
$pattern = "/^.*$pattern.*\$/m";
// search, and store all matching occurences in $matches
if(preg_match_all($pattern, $contents, $matches)){
}
else{
   echo "No matches found";
}

$mkstr = (string)implode($matches[0]);
$GSM = substr($mkstr, 9);
echo $GSM;

//Connect to MySQL, open database, and create table!

require_once 'login.php';
$db_server = mysql_connect($db_hostname, $db_username, $db_password);

if (!db_server) die("Unable to connect to MySQL: ".mysql_error());

mysql_select_db($db_database)
        or die("Ubable to select database ".mysql_error());

$CreateTable = "CREATE TABLE $GSM ( ID_REF VARCHAR(255), Value INT unsinged )";
$MakeTable = mysql_query($CreateTable);
if (!result) die("Database access failed ".mysql_error());

?>


  </body>
</html>
