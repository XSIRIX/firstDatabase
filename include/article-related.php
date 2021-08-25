<?php

/*get article record based on id*/

function getArticle ($conn, $id) {
    $sqlGet = "SELECT * FROM sirivat WHERE id = $1";

    $stmt = pg_prepare($conn, "getQuery", $sqlGet);

    if ($stmt === false){
        echo pg_last_error($conn);
    } else {
        $results = pg_execute($conn, "getQuery", array($id));
        return pg_fetch_assoc($results);
    }


}