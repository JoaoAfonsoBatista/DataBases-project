drop table local_publico cascade;
drop table utilizador cascade;
drop table utilizador_qualificado cascade;
drop table utilizador_regular cascade;
drop table item cascade;
drop table anomalia cascade;
drop table proposta_de_correcao cascade;
drop table correcao cascade;
drop table anomalia_traducao cascade;
drop table duplicado cascade;
drop table incidencia cascade;

----------------------------------------
-- Table Creation
----------------------------------------


create table local_publico
   (latitude    numeric(8,6),  
    longitude   numeric(9,6),
    nome        varchar(255)  not null,
    primary key(latitude, longitude),
    check (-90 <= latitude and latitude <= 90 and -180 <= longitude and longitude<= 180));

create table item
   (id          integer,
    descricao   text          not null,
    localizacao text          not null,     
    latitude    numeric(8,6)  not null,
    longitude   numeric(9,6)  not null,
    primary key(id),
    foreign key(latitude, longitude) references local_publico ON UPDATE CASCADE ON DELETE CASCADE);


create table anomalia
   (id                  integer,
    zona                box not null,   
    imagem              varchar(255)   not null,  
    lingua              varchar(255) not null,
    ts                  timestamp not null,
    descricao           text not null,
    tem_anomalia_redacao boolean not null,
    primary key(id));

create table anomalia_traducao
   (id          integer,
    zona2       box not null,        
    lingua2     varchar(255) not null,
    primary key(id),
    foreign key(id) references anomalia ON UPDATE CASCADE ON DELETE CASCADE);

create table duplicado
   (item1       integer,
    item2       integer, 
    primary key(item1, item2),
    foreign key(item1) references item(id) ON UPDATE CASCADE ON DELETE CASCADE,
    foreign key(item2) references item(id) ON UPDATE CASCADE ON DELETE CASCADE,  
    check (item1 < item2));

create table utilizador
   (email     varchar(255),
    password  varchar(255) not null,
    primary key(email));

create table utilizador_qualificado
   (email     varchar(255),
    primary key(email),
    foreign key(email) references utilizador ON UPDATE CASCADE ON DELETE CASCADE);

create table utilizador_regular
   (email     varchar(255),
    primary key(email),
    foreign key(email) references utilizador ON UPDATE CASCADE ON DELETE CASCADE);

create table incidencia
   (anomalia_id   integer,
    item_id       integer not null,
    email         varchar(255) not null,
    primary key (anomalia_id),
    foreign key (anomalia_id) references anomalia(id) ON UPDATE CASCADE ON DELETE CASCADE,
    foreign key (item_id) references item(id) ON UPDATE CASCADE ON DELETE CASCADE,
    foreign key (email) references utilizador ON UPDATE CASCADE ON DELETE CASCADE);

create table proposta_de_correcao
   (email       varchar(255),
    nro         integer,
    data_hora   timestamp(2) not null,  
    texto       text not null,
    primary key (email, nro),
    foreign key (email) references utilizador_qualificado ON UPDATE CASCADE ON DELETE CASCADE);

create table correcao
   (email       varchar(255),
    nro         integer,
    anomalia_id integer,
    primary key (email, nro, anomalia_id),
    foreign key (email, nro) references proposta_de_correcao ON UPDATE CASCADE ON DELETE CASCADE,
    foreign key (anomalia_id) references incidencia ON UPDATE CASCADE ON DELETE CASCADE);