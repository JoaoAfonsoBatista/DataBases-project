<html>
 <body>
<?php
 $email = $_REQUEST['email'];
 $texto = $_REQUEST['texto'];
 $id = $_REQUEST['id'];
 try
 {
 $host = "db.ist.utl.pt";
 $user ="ist";
 $password = "";
 $dbname = $user;
 $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 

 $sql1 = "select nro from proposta_de_correcao where email = :email;";
 $result1 = $db->prepare($sql1);
 $result1->execute([':email' => $email]);
 $a = 0;
 foreach($result1 as $row)
 {if($row['nro']>$a) {$a = $row[nro];};
 }
 $nro = $a + 1;
 
 $data_hora = date("Y-m-d, H:i:s");
 

$sql1 = "BEGIN TRANSACTION";
$result1 = $db->prepare($sql1);
$result1->execute();



 $sql = "insert into proposta_de_correcao values(:email, :nro, :data_hora, :texto)";

$result = $db->prepare($sql);
$result->execute([':email' => $email, ':nro' => $nro, ':data_hora' => $data_hora, ':texto' => $texto]);


 $sql3 = "insert into correcao values(:email, :nro, :id)";

$result3 = $db->prepare($sql3);
$result3->execute([':email' => $email, ':nro' => $nro, 'id' => $id]);


$sql2 = "COMMIT TRANSACTION";
$result2 = $db->prepare($sql2);
$result2->execute();

echo("<p>proposta de correcao inserido com sucesso :) </p>");

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