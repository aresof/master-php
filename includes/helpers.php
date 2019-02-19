<?php
if(!isset($_SESSION))
    session_start();

function mostrarError($errores, $campo){
    $alerta = '';
    if(isset($errores[$campo]) && !empty($campo)){
        $alerta = "<div class='alerta alerta-error'>".$errores[$campo]."</div>";
    }
    return $alerta;
}

function borrarErrores(){

    $borrado = false;

    if(isset($_SESSION["errores"])){
        $_SESSION['errores'] = null;
        $borrado = true;
    }

    if(isset($_SESSION["errores_entrada"])){
        $_SESSION['errores_entrada'] = null;
        $borrado = true;
    }

    if(isset($_SESSION["completado"])){
        $_SESSION['completado'] = null;
        $borrado = true;
    }

    return $borrado;
}

function conseguirCategorias($db){

    $sql = "SELECT * FROM categorias ORDER BY id ASC";
    $result = mysqli_query($db, $sql);

    return $result;
}

function conseguirCategoria($db, $id){

    $sql = "SELECT * FROM categorias WHERE id = $id";
    $result = mysqli_query($db, $sql);
    $categoria = mysqli_fetch_assoc($result);

    return $categoria;
}

function conseguirEntradas($db, $limit = null){

    $sql = "SELECT e.*, c.nombre AS 'categoria' FROM entradas e 
            JOIN categorias c ON (e.categoria_id = c.id)
            ORDER BY e.id DESC ";
    if($limit)
        $sql .= "LIMIT $limit";
    $result = mysqli_query($db, $sql);

    return $result;
}
