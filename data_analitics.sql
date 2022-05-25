

((select tipo, lingua, dia_da_semana, count(*) 
from f_anomalia NATURAL JOIN d_lingua NATURAL JOIN d_tempo NATURAL JOIN d_utilizador
group by tipo,lingua,dia_da_semana)
UNION 
(select null, lingua, dia_da_semana, count(*) 
from f_anomalia NATURAL JOIN d_lingua NATURAL JOIN d_tempo NATURAL JOIN d_utilizador
group by lingua,dia_da_semana)
UNION 
(select tipo, null, dia_da_semana, count(*) 
from f_anomalia NATURAL JOIN d_lingua NATURAL JOIN d_tempo NATURAL JOIN d_utilizador
group by tipo,dia_da_semana)
UNION 
(select tipo, lingua, null, count(*) 
from f_anomalia NATURAL JOIN d_lingua NATURAL JOIN d_tempo NATURAL JOIN d_utilizador
group by tipo,lingua)
UNION 
(select null,null, dia_da_semana, count(*) 
from f_anomalia NATURAL JOIN d_lingua NATURAL JOIN d_tempo NATURAL JOIN d_utilizador
group by dia_da_semana)
UNION 
(select tipo, null,null, count(*) 
from f_anomalia NATURAL JOIN d_lingua NATURAL JOIN d_tempo NATURAL JOIN d_utilizador
group by tipo)
UNION 
(select null, lingua, null, count(*) 
from f_anomalia NATURAL JOIN d_lingua NATURAL JOIN d_tempo NATURAL JOIN d_utilizador
group by lingua)
UNION 
(select null,null,null, count(*) 
from f_anomalia NATURAL JOIN d_lingua NATURAL JOIN d_tempo))
order by tipo,lingua,dia_da_semana;
