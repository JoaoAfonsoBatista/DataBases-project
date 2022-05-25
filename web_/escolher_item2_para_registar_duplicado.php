<html>
 <body>
 <h3>Escolher item2 para registar duplicado</h3>
<?php
 $id_it1 = $_REQUEST['id'];
 try
 {
 $host = "db.ist.utl.pt";
 $user ="ist";
 $password = "";
 $dbname = $user;

 $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 $sql = "SELECT * FROM item where id > :id1 and id not in(Select item2 from duplicado where item1 = :id2);";
 
 $result = $db->prepare($sql);
 $result->execute([':id1' => $id_it1, ':id2' => $id_it1]);

 echo("<table border=\"1\" cellspacing=\"15\">\n");
 echo("<tr>\n");
 echo("<td>Id</td>\n");
 echo("<td>Descricao</td>\n");
 echo("<td>Localizacao</td>\n");
 echo("</tr>\n");
 foreach($result as $row)
 {
 echo("<tr>\n");
 echo("<td>{$row['id']}</td>\n");
 echo("<td>{$row['descricao']}</td>\n");
 echo("<td>{$row['localizacao']}</td>\n");
 echo("<td><a href=\"registar_duplicado.php?id_it2={$row['id']}&id_it1={$id_it1}\">escolher item</a></td>\n");
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