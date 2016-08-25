DELIMITER $$

CREATE PROCEDURE  create_temp_palabra_clave(dias int , flag int )
BEGIN 
DROP TABLE  if EXISTS evento_palabra_clave;
CREATE TABLE evento_palabra_clave AS SELECT * FROM
    event_palabra_clave_default; 





IF flag = 1 THEN
	


/*insertamos palabras claves para evento por nombre**/
INSERT INTO evento_palabra_clave 
	SELECT  idevento ,  nombre_evento  FROM evento WHERE fecha_inicio = CURRENT_DATE() + dias;
/******************************/ /******************************//******************************//******************************/


INSERT INTO evento_palabra_clave 
SELECT 
    idevento, artista
FROM
    evento
        inner join
    evento_artista ON idevento = id_evento
WHERE
    fecha_inicio = CURRENT_DATE() + dias;

/******************************/ /******************************//******************************//******************************/
INSERT INTO evento_palabra_clave 
SELECT id_evento , genero 
FROM
    evento e 
        inner join
    evento_genero eg ON e.idevento = eg.id_evento
WHERE
    fecha_inicio = CURRENT_DATE() + dias;













ELSE
/*Cuando no se indicó fecha*/
/*insertamos palabras claves para evento por nombre**/
INSERT INTO evento_palabra_clave 
	SELECT  idevento ,  nombre_evento  FROM evento WHERE fecha_inicio >= CURRENT_DATE() 
    AND fecha_inicio <= CURRENT_DATE() + 30;



/******************************/ /******************************//******************************/
INSERT INTO evento_palabra_clave 
SELECT 
    idevento, artista
FROM
    evento
        inner join
    evento_artista ON idevento = id_evento
WHERE
    fecha_inicio >= CURRENT_DATE()
        AND fecha_inicio <= CURRENT_DATE() + 30;


/******************************//******************************//******************************/

INSERT INTO evento_palabra_clave 
SELECT id_evento , genero 
FROM
    evento e 
        inner join
    evento_genero eg ON e.idevento = eg.id_evento
WHERE
    fecha_inicio >= CURRENT_DATE()
        AND fecha_inicio <= CURRENT_DATE() + 30;



















	
END  IF;


END$$




LMORTEGA