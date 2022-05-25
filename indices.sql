/* Por default, o comando CREATE INDEX cria um índice do tipo B-tree, 
pelo que sempre que este tipo de índice era pretendido, não especificámos no comando, usando o USING; */


/* 1.2*/
create index primeiro on proposta_de_correcao(data_hora);

/* 2.*/
create index segundo on incidencia using hash (anomalia_id);


/* 4*/
create index quarto on anomalia(ts,lingua) where tem_anomalia_redacao;