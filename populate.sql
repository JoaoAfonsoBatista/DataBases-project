----------------------------------------
-- Populate Relations 
----------------------------------------

insert into local_publico values (38.462342,  -9.133289,  'KidZania');
insert into local_publico values (38.441310,  -9.324134,  'IST');
insert into local_publico values (38.441037,  -9.293872,  'Zoo');
insert into local_publico values (38.415572,  -9.122389,  'Mosteiro');
insert into local_publico values (38.454891,  -9.053789,  'Oceano');
insert into local_publico values (41.093045,  -8.372189,  'Boavista');
insert into local_publico values (43.093045,  -7.372189,  'Palacio');

insert into utilizador values ('johnson@gmail.com', 'qaz');
insert into utilizador values ('adam@gmail.com', 'wsx');
insert into utilizador values ('cook@gmail.com', 'edc');
insert into utilizador values ('oliver@gmail.com', 'rfv');
insert into utilizador values ('king@gmail.com', 'tgb');
insert into utilizador values ('davis@gmail.com', 'yhn');
insert into utilizador values ('flora@gmail.com', 'ujm');
insert into utilizador values ('harry@gmail.com', 'qaz');
insert into utilizador values ('ana@gmail.com', 'vac');

insert into utilizador_regular values ('johnson@gmail.com');
insert into utilizador_regular values ('adam@gmail.com');
insert into utilizador_regular values ('cook@gmail.com');
insert into utilizador_regular values ('oliver@gmail.com');
insert into utilizador_regular values ('king@gmail.com');

insert into utilizador_qualificado values ('davis@gmail.com');
insert into utilizador_qualificado values ('flora@gmail.com');
insert into utilizador_qualificado values ('harry@gmail.com');
insert into utilizador_qualificado values ('ana@gmail.com');

insert into anomalia values (1, '((1,4),(2,6))', 'imagem1', 'Lingua11','2019-01-01 13:20:12', 'Descricao1', False); 
insert into anomalia values (2, '((1,5),(2,6))', 'imagem2', 'Lingua21','2019-02-03 23:02:11', 'Descricao2', True);
insert into anomalia values (3, '((1,3),(2,6))', 'imagem3', 'Lingua31','2019-07-25 18:12:53', 'Descricao3', True);
insert into anomalia values (4, '((2,1),(3,6))', 'imagem4', 'Lingua41','2019-02-25 11:20:12', 'Descricao4', False);
insert into anomalia values (5, '((1,7),(2,9))', 'imagem5', 'Lingua51','2019-06-23 16:59:02', 'Descricao5', True);
insert into anomalia values (6, '((1,6),(2,9))', 'imagem6', 'Lingua61','2019-05-23 16:59:02', 'Descricao6', True);
insert into anomalia values (7, '((4,8),(6,9))', 'imagem7', 'Lingua71','2019-04-23 16:59:02', 'Descricao7', True);
insert into anomalia values (8, '((1,3),(2,9))', 'imagem8', 'Lingua81','2019-02-23 16:59:02', 'Descricao8', True);
insert into anomalia values (9, '((2,8),(2,7))', 'imagem9', 'Lingua91','2019-09-15 16:27:03', 'Descricao9', True);
insert into anomalia values (10, '((1,8),(6,9))', 'imagem10', 'Lingua101','2019-10-23 16:54:20', 'Descricao10', True);
insert into anomalia values (11, '((4,5),(8,7))', 'imagem11', 'Lingua111','2019-12-23 16:19:18', 'Descricao11', True);
insert into anomalia values (12, '((1,4),(5,5))', 'imagem12', 'Lingua121','2019-11-23 12:59:02', 'Descricao12', True);
insert into anomalia values (13, '((3,2),(8,6))', 'imagem13', 'Lingua131','2019-09-23 16:24:02', 'Descricao13', True);
insert into anomalia values (14, '((3,5),(6,9))', 'imagem14', 'Lingua141','2019-10-23 16:04:02', 'Descricao14', True);
insert into anomalia values (15, '((1,5),(4,8))', 'imagem15', 'Lingua151','2019-10-30 16:59:02', 'Descricao15', True);
   
  

insert into anomalia_traducao values (1, '((3,9),(5,10))', 'lingua12');
insert into anomalia_traducao values (4, '((1,5),(2,8))', 'lingua42');

insert into item values (67, 'Descricao1', 'localizacao67', 38.441310, -9.324134);
insert into item values (68, 'Descricao2', 'localizacao68', 38.454891, -9.053789);
insert into item values (69, 'Descricao3', 'localizacao69', 41.093045, -8.372189);
insert into item values (70, 'Descricao4', 'localizacao70', 43.093045, -7.372189);
insert into item values (71, 'Descricao5', 'localizacao71', 41.093045,  -8.372189);
insert into item values (72, 'Descricao6', 'localizacao72', 43.093045,  -7.372189);

insert into incidencia values (1, 67, 'johnson@gmail.com');
insert into incidencia values (2, 69, 'king@gmail.com');
insert into incidencia values (3, 68, 'king@gmail.com');
insert into incidencia values (4, 67, 'oliver@gmail.com');
insert into incidencia values (9, 70, 'king@gmail.com');
insert into incidencia values (5, 70, 'oliver@gmail.com');
insert into incidencia values (8, 70, 'davis@gmail.com');
insert into incidencia values (7, 69, 'flora@gmail.com');
insert into incidencia values (6, 68, 'davis@gmail.com');
insert into incidencia values (10, 71, 'harry@gmail.com');
insert into incidencia values (13, 71, 'flora@gmail.com');
insert into incidencia values (11, 72, 'harry@gmail.com');
insert into incidencia values (12, 72, 'harry@gmail.com');

insert into proposta_de_correcao values ('davis@gmail.com', 78, '2019-07-17 8:10:09', 'texto79'); 
insert into proposta_de_correcao values ('flora@gmail.com', 77, '2019-11-17 7:10:09', 'texto80'); 
insert into proposta_de_correcao values ('flora@gmail.com', 78, '2019-10-17 14:10:09', 'texto81'); 

insert into correcao values ('davis@gmail.com', 78, 8);
insert into correcao values ('flora@gmail.com', 77, 4);
insert into correcao values ('flora@gmail.com', 78, 8);