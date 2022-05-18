<?php 
    include('funciones.php');
    $array = array();
    if($resulset = getSQLResultSet("select * from productos")){
        while ($row = $resulset->fetch_array(MYSQLI_NUM)) {
            $e = array();
            $e['id'] = $row[0];
            $e['nombre'] = $row[1];
            $e['precio'] = $row[2];
            $e['stock'] = $row[3];
            $e['img'] = $row[4];
            array_push($array, $e);
        }
        echo json_encode($array);
    }

?>