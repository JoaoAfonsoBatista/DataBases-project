<html>
 <body>
<?php
$email1 = $_REQUEST['email1'];
$email2 = $_REQUEST['email2'];
$nro = $_REQUEST['nro'];

 try
 {
 $host = "db.ist.utl.pt";
 $user ="ist";
 $password = "";
 $dbname = $user;

 $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
 $data_hora = date("Y-m-d, H:i:s");


 $sql1 = "select nro from proposta_de_correcao where email = :email;";
 $result1 = $db->prepare($sql1);
 $result1->execute([':email' => $email2]);
$a = 0;
 foreach($result1 as $row)
 {if($row['nro']>$a) {$a = $row[nro];};
 }
 $nro2 = $a + 1;
 
 $sql = "Update proposta_de_correcao SET email = :email2, nro = :nro2, data_hora=:data_hora  WHERE email = :email1 AND nro = :nro;";
 
 $result = $db->prepare($sql);
 $result->execute([':email2' => $email2, ':nro2' => $nro2,  ':data_hora' => $data_hora, ':email1' => $email1,  ':nro' => $nro,]);
 

echo("atualizacao realizada com sucesso");

 $db = null;
 
 echo("<p><td><a href=\"interface.php\">home</a></td>\n");
 
 }
 catch (PDOException $e)
 {
 echo("<p>ERROR: {$e->getMessage()}</p>");
 }
?>
 </body>
 </html>