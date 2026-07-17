<?php
if (!empty($_POST["btnregistrar"])) {
    if (!empty($_POST["nombre"]) and !empty($_POST["prenda"]) and !empty($_POST["peso"]) and !empty($_POST["estado"]) and !empty($_POST["fecha_entrega"])) {
        
        $nombre = $_POST["nombre"];
        $prenda = $_POST["prenda"];
        $peso = $_POST["peso"];
        $estado = $_POST["estado"];
        $fecha_entrega = $_POST["fecha_entrega"];
        
        $sql = $conexion->query("INSERT INTO recepciones(nombre_cliente, tipo_prenda, peso_kilos, estado_lavado, fecha_entrega) VALUES('$nombre', '$prenda', $peso, '$estado', '$fecha_entrega')");
        
        if ($sql == 1) {
            echo '<div class="alert alert-success">Registrado correctamente</div>';
        } else {
            echo '<div class="alert alert-danger">Error al registrar</div>';
        }
    } else {
        echo '<div class="alert alert-warning">Todos los campos son obligatorios</div>';
    }
}
?>