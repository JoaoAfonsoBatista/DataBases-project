<html>
 <body>
 <h3>Por favor, escolha o email</h3>
 <?php
 
 try
 {
 $host = "db.ist.utl.pt";
 $user ="ist";
 $password = "";
 $dbname = $user;

 $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 $sql = "SELECT * FROM utilizador_qualificado;";
 
 $result = $db->prepare($sql);
 $result->execute();
 
 
echo("<table border=\"1\" cellspacing=\"15\">\n");
 echo("<tr><td>email</td></tr>\n");
 foreach($result as $row)
 {
 echo("<tr><td>");
 echo($row['email']);
 echo("</td>");
 echo("<td><a href=\"escolher_texto_para_inserir_proposta_correcao.php?email={$row['email']}\">escolher email</a></td>\n");
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