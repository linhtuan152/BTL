<?php
    require('connect.php');
// Buoc 02: Truy van Database
    $sql="SELECT adm3_name, ST_AsText(geom) as geom2 FROM vnm_polbnda_adm3_2014_pdc WHERE ST_Contains(ST_SetSRID(geom,4326) , ST_GeometryFromText('POINT({$getLong}  {$getLat})', 4326))";
    // echo to_json($sql);
    // echo $sql;
    $stmt=$conn->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    // echo $stmt;
    // echo 'ok';
    while($row=$stmt->fetch()){
        // echo '?';
        echo $row['adm3_name'];
        // echo 'hi';
    }
    // echo 'Kekeke';
//Buoc 03:
?>