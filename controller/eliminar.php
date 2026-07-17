<?php
if (!empty($_GET["id"])) {
    $id = $_GET["id"];
    $sql = $conexion->query("DELETE FROM recepciones WHERE id_recepcion=$id");
    if ($sql == 1) {
        echo '<div class="alert alert-success">Registro eliminado</div>';
    } else {
        echo '<div class="alert alert-danger">Error al eliminar</div>';
    }
}
?>