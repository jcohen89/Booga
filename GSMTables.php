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
$file = '/home/jcohen/TestGSMs/GSM1260446.txt';

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
$con = mysqli_connect($db_hostname, $db_username, $db_password, $db_database) o$
if (mysqli_connect_errno())
{
die('Could not connect: ' . mysqli_connect_error());
}

// Create the table
$query = "CREATE TABLE " . $GSM . " (id_ref VARCHAR(255) PRIMARY KEY, value INT$
$result = mysqli_query($con, $query);

// Close the connection
mysqli_close($con);

?>
  

  </body>
</html>
