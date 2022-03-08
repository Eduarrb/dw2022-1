--  ⚡⚡ JOINS ⚡⚡

SELECT *
    FROM actores a, personajes b
        WHERE a.act_id = b.per_act_id
--------------------------------------------------
SELECT *
    FROM actores a
        INNER JOIN personajes b 
            ON a.act_id = b.per_act_id