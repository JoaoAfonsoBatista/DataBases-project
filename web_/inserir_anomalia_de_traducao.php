<html>
 <body>
<?php
 $imagem = $_REQUEST['imagem'];
 $zona = $_REQUEST['zona'];
 $zona2 = $_REQUEST['zona2'];
 $lingua = $_REQUEST['lingua'];
 $lingua2 = $_REQUEST['lingua2'];
 $ts = $_REQUEST['ts'];
 $descricao = $_REQUEST['descricao'];
 try
 {
 $host = "db.ist.utl.pt";
 $user ="ist";
 $password = "";
 $dbname = $user;
 $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 


 $sql1 = "select id from anomalia;";
 $result1 = $db->prepare($sql1);
 $result1->execute();
 $a = 0;
 foreach($result1 as $row)
 {if($row['id']>$a) {$a = $row[id];};
 }
 $id = $a + 1;



 $sql = "insert into anomalia values(:id, :zona, :imagem, :lingua, :ts, :descricao, :tem_anomalia_redacao)";

$result = $db->prepare($sql);
$result->execute([':id' => $id, ':zona' => $zona, ':imagem' => $imagem, ':lingua' => $lingua,':ts' => $ts,':descricao' => $descricao, ':tem_anomalia_redacao' => 0]);

 $sql1 = "insert into anomalia_traducao values(:id,:zona2,:lingua2)";

$result1 = $db->prepare($sql1);
$result1->execute([':id' => $id, ':zona2' => $zona2, ':lingua2' => $lingua2]);

echo("<p>anomalia de traducao inserido com sucesso :) </p>");

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