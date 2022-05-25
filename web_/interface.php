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

echo("<h2><b>Clique aqui se pretender obter uma lista de todos os utilizadores registados na plataforma:</b></h2>");

echo("<p><a href=\"listar_utilizadores.php\">Listar Utilizadores</a></p>\n");

echo("<h2><b>Remover:</b></h2>");

echo("<p><a href=\"escolher_local_para_remover.php\">Local</a></p>\n");
 
echo("<p><a href=\"escolher_item_para_remover.php\">Item</a></p>\n");

echo("<p><a href=\"escolher_anomalia_para_remover.php\">Anomalia</a></p>\n");

echo("<p><a href=\"escolher_proposta_para_remover.php\">Proposta de Correcao</a></p>\n");

echo("<h2><b>Inserir:</b></h2>");

echo("<p><a href=\"escolher_local_para_inserir.php\">Local</a></p>\n");
 
echo("<p><a href=\"escolher_item_para_inserir.php\">Item</a></p>\n");

echo("<p><a href=\"escolher_anomalia_redacao_para_inserir.php\">Anomalia de Redacao</a></p>\n");

echo("<p><a href=\"escolher_anomalia_traducao_para_inserir.php\">Anomalia de Traducao</a></p>\n");

echo("<p><a href=\"escolher_email_para_inserir_proposta_correcao.php\">Proposta de Correcao</a></p>\n");

echo("<h2><b>Registar</b></h2>");

echo("<p><a href=\"escolher_incidencia_para_registar_email.php\">Incidencia</a></p>\n");

echo("<p><a href=\"escolher_item1_para_registar_duplicado.php\">Duplicados</a></p>\n");

echo("<h2><b>Editar</b></h2>");

echo("<p><a href=\"escolher_o_que_alterar.php\">Proposta de Correcao</a></p>\n");

echo("<h2><b>Listar todas as anomalias de incidencias registadas na area compreendida entre dois locais publicos:</b></h2>");

echo("<p><a href=\"escolher_local1.php\">Escolher Locais</a></p>\n");

echo("<h2><b>Listar anomalias dos ultimos 3 meses numa dada regiao:</b></h2>");

echo("<p><a href=\"escolher_lat_longi.php\">Escolher Regiao</a></p>\n");


$db = null;
}
catch (PDOException $e)
{
echo("<p>ERROR: {$e->getMessage()}</p>");
}
?>
</body>
</html>