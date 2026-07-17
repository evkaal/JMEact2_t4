<?php
if (!empty($_POST["btnmodificar"])) {
    if (!empty($_POST["nombre"]) and !empty($_POST["prenda"]) and !empty($_POST["peso"]) and !empty($_POST["estado"]) and !empty($_POST["fecha_entrega"])) {
        
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $prenda = $_POST["prenda"];
        $peso = $_POST["peso"];
        $estado = $_POST["estado"];
        $fecha_entrega = $_POST["fecha_entrega"];
        
        $sql = $conexion->query("UPDATE recepciones SET nombre_cliente='$nombre', tipo_prenda='$prenda', peso_kilos=$peso, estado_lavado='$estado', fecha_entrega='$fecha_entrega' WHERE id_recepcion=$id");
        
        if ($sql == 1) {
            header("location:../index.php"); 
        } else {
            echo '<div class="alert alert-danger">Error al actualizar</div>';
        }
    } else {
        echo '<div class="alert alert-warning">No puedes dejar campos vacíos</div>';
    }
}
?>