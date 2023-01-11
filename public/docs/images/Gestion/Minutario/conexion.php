<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<?
//$host = "localhost";
//$user = "root";
//$pw = "";
//$base = "minutario";
//$con = mysql_connect($host,$user,$pw,$base) or die ("Problemas al conectar");
 //      mysql_select_db($base,$con)or die("Problemas al conectar la bd");




$servername = "localhost";
$username = "root";
$password = "";
$base = "minutario";

// Create connection
$conn = new mysql($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";



?>


 

</body>
</html>