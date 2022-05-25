drop table f_anomalia;


DROP TABLE IF EXISTS d_utilizador;
create table d_utilizador(
  id_utilizador serial,
  email varchar(255) not null,
  tipo VARCHAR(255) NOT NULL,
  primary key(id_utilizador)
);
insert into d_utilizador(email,tipo) select distinct email,'regular' from utilizador_regular;
insert into d_utilizador(email,tipo) select distinct email,'qualificado' from utilizador_qualificado;



DROP TABLE IF EXISTS d_tempo;
create table d_tempo(
  id_tempo serial ,
  dia integer NOT NULL,
  dia_da_semana integer NOT NULL,
  semana integer NOT NULL,
  mes integer NOT NULL,
  trimestre integer NOT NULL,
  ano INTEGER NOT NULL,
  primary key(id_tempo)
);

insert into d_tempo(dia,dia_da_semana,semana,mes,trimestre,ano) select distinct EXTRACT (day from ts),EXTRACT (isodow from ts), EXTRACT (week from ts),EXTRACT (month from ts),ceiling(EXTRACT (month from ts)::numeric/3),EXTRACT (year from ts) from anomalia;





DROP TABLE IF EXISTS d_local;
create table d_local(
  id_local serial,
  latitude NUMERIC(8,6) NOT NULL,
  longitude NUMERIC(9,6) NOT NULL,
  nome VARCHAR(255) NOT NULL,
  primary key(id_local)
);

insert into d_local(latitude, longitude, nome) select * from local_publico;






DROP TABLE IF EXISTS d_lingua;
create table d_lingua(
  id_lingua serial,
  lingua varchar(255) NOT NULL,
  primary key(id_lingua)
);

insert into d_lingua(lingua) select distinct lingua from anomalia;




create table f_anomalia
   (id_utilizador integer, 
   id_tempo integer,
   id_local integer,
   id_lingua integer,
   tipo_anomalia varchar(255) not null,
   com_proposta boolean not null,
    primary key(id_utilizador, id_tempo,id_local,id_lingua),
	foreign key(id_utilizador) references d_utilizador,
    foreign key(id_tempo) references d_tempo,
	foreign key(id_local) references d_local,
	foreign key(id_lingua) references d_lingua);
	

do
$do$
declare 
	cur cursor for select * from incidencia,anomalia,item where anomalia_id = anomalia.id and item_id = item.id and anomalia.id in (select anomalia_id from correcao);
	cur1 cursor for select * from incidencia,anomalia,item where anomalia_id = anomalia.id and item_id = item.id and anomalia.id not in (select anomalia_id from correcao);
	b record;
	utilizador integer;
	tempo integer;
	loca integer;
	lingua1 integer;
	anomalia varchar(255);
	
begin
open cur;
loop
	fetch cur into b; 
	EXIT WHEN NOT FOUND;
	utilizador = (select id_utilizador from d_utilizador where email = b.email);
	tempo = (select id_tempo from d_tempo where dia = (select EXTRACT (day from b.ts)) and mes = (select EXTRACT (month from b.ts)) and ano = (select EXTRACT (year from b.ts))  );
	loca = (select id_local from d_local where latitude = b.latitude and longitude = b.longitude);
	lingua1 = (select id_lingua from d_lingua where lingua = b.lingua);
	
	if b.tem_anomalia_redacao then anomalia = 'redação'; end if;
	if not b.tem_anomalia_redacao then anomalia = 'tradução'; end if;
	
	insert into f_anomalia values (utilizador,tempo,loca,lingua1,anomalia, True);
end loop;
close cur;
end;
$do$;




do
$do$
declare 
	cur cursor for select * from incidencia,anomalia,item where anomalia_id = anomalia.id and item_id = item.id and anomalia.id in (select anomalia_id from correcao);
	cur1 cursor for select * from incidencia,anomalia,item where anomalia_id = anomalia.id and item_id = item.id and anomalia.id not in (select anomalia_id from correcao);
	b record;
	utilizador integer;
	tempo integer;
	loca integer;
	lingua1 integer;
	anomalia varchar(255);
begin
open cur1;
loop
	fetch cur1 into b;
	EXIT WHEN NOT FOUND;
	utilizador = (select id_utilizador from d_utilizador where email = b.email);
	tempo = (select id_tempo from d_tempo where dia = (select EXTRACT (day from b.ts)) and mes = (select EXTRACT (month from b.ts)) and ano = (select EXTRACT (year from b.ts)) );
	loca = (select id_local from d_local where latitude = b.latitude and longitude = b.longitude);
	lingua1 = (select id_lingua from d_lingua where lingua = b.lingua);
	
	if b.tem_anomalia_redacao then anomalia = 'redação'; end if;
	if not b.tem_anomalia_redacao then anomalia = 'tradução'; end if;
	
	insert into f_anomalia values (utilizador,tempo,loca,lingua1,anomalia, False);
end loop;
close cur1;
end;


$do$;
