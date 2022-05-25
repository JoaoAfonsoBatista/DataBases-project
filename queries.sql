-- SQL --
-- 1. --
SELECT latitude,longitude FROM item as it, incidencia as inc
WHERE inc.item_id=it.id
GROUP BY latitude, longitude 
HAVING count(inc.anomalia_id) >= ALL (
	SELECT count(inc.anomalia_id) 
	FROM item as it, incidencia as inc 
	WHERE item_id=it.id GROUP BY latitude, longitude);

-- 2. -- 
WITH queremos as (SELECT id, ts 
	FROM anomalia WHERE ts BETWEEN '2019-01-01 00:00:00' AND '2019-06-30 23:59:59' AND tem_anomalia_redacao = False) 
SELECT utilizador_regular.email 
FROM utilizador_regular NATURAL JOIN incidencia, queremos 
WHERE anomalia_id=id 
GROUP BY email 
HAVING count(id) >= ALL (SELECT count(id) 
	FROM utilizador_regular NATURAL JOIN incidencia, queremos 
	WHERE anomalia_id=id 
	GROUP BY email);

--3.--
WITH people as (SELECT * FROM incidencia, item
	WHERE id = item_id and item_id IN (SELECT it.id 
		FROM item as it, anomalia as a, incidencia as inc 
		WHERE it.id=item_id AND anomalia_id=a.id AND EXTRACT (YEAR FROM ts)='2019' AND latitude > 39.336775))
		
SELECT DISTINCT p1.email
FROM people as p1
WHERE p1.email IN (SELECT p2.email 
	FROM people as p2
	GROUP BY p2.email 
	HAVING count(DISTINCT p2.latitude) = (select count(lo.latitude) from local_publico as lo where lo.latitude >39.336775));

--4.--
with coisas as (SELECT anomalia_id, email 
	FROM incidencia NATURAL JOIN utilizador_qualificado, item 
	WHERE item_id=id AND latitude<39.336775 EXCEPT (SELECT anomalia_id,email 
		FROM proposta_de_correcao NATURAL JOIN correcao NATURAL JOIN incidencia, item 
		WHERE item_id=id AND EXTRACT(YEAR FROM data_hora) = EXTRACT(YEAR FROM current_timestamp)))
		
SELECT email 
FROM coisas;
