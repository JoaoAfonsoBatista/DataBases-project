<html>
 <body>
<?php
 try
 {
 $host = "db.ist.utl.pt";
 $user ="ist";
 $password = "";
 $dbname = $user;
 $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 $sql = "Select email from utilizador_regular;";
$result = $db->prepare($sql);
$result->execute();

 $sql1 = "Select email from utilizador_qualificado;";
$result1 = $db->prepare($sql1);
$result1->execute();

echo("<h2><b>Utilizadores Regulares:</b></h2>");

echo("<table border=\"1\">\n");
echo("<tr><td>Email</td></tr>\n");
foreach($result as $row)
{
echo("<tr><td>");
echo($row['email']);
echo("</td></tr>\n");
}
echo("</table>\n");

echo("<h2><b>Utilizadores Qualificados:</b></h2>");

echo("<table border=\"1\">\n");
echo("<tr><td>Email</td></tr>\n");
foreach($result1 as $row)
{
echo("<tr><td>");
echo($row['email']);
echo("</td></tr>\n");
}
echo("</table>\n");
echo("<p><td><a href=\"interface.php\">home</a></td>\n");


$db = null;
 }
 catch (PDOException $e)
 {
 echo("<p>ERROR: {$e->getMessage()}</p>");
 }
?>
 </body>
</html>