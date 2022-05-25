<html>
 <body>
 <h3>Por favor, escolha o email a editar </h3>
 <?php
$email1 = $_REQUEST['email1'];
$nro = $_REQUEST['nro'];
 
 try
 {
 $host = "db.ist.utl.pt";
 $user ="ist";
 $password = "";
 $dbname = $user;

 $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 $sql = "SELECT * FROM utilizador_qualificado WHERE email != :email1;";
 
 $result = $db->prepare($sql);
 $result->execute([':email1' => $email1]);

 echo("<table border=\"1\" cellspacing=\"15\">\n");
 echo("<tr>\n");
 echo("<td>Email</td>\n");
 echo("</tr>\n");
 foreach($result as $row)
 {
 echo("<tr>\n");
 echo("<td>{$row['email']}</td>\n");
 echo("<td><a href=\"alterar_email.php?nro={$nro}&email1={$email1}&email2={$row['email']}\">escolher email</a></td>\n");
 echo("</tr>\n");
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