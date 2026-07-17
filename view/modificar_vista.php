<?php
include "../models/conexion.php";
$id = $_GET["id"];
$sql = $conexion->query("SELECT * FROM recepciones WHERE id_recepcion=$id");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <form class="col-md-6 m-auto p-4 border rounded bg-light" method="POST">
            <h3 class="text-center text-secondary">Modificar Recepción</h3>
            <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
            
            <?php
            include "../controller/modificar.php";
            while($datos = $sql->fetch_object()) { ?>
                <div class="mb-3">
                    <label class="form-label">Nombre del cliente</label>
                    <input type="text" class="form-control" name="nombre" value="<?= $datos->nombre_cliente ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tipo de prenda</label>
                    <input type="text" class="form-control" name="prenda" value="<?= $datos->tipo_prenda ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Peso (Kilos)</label>
                    <input type="number" step="0.01" class="form-control" name="peso" value="<?= $datos->peso_kilos ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Estado de lavado</label>
                    <select class="form-control" name="estado">
                        <option value="Pendiente" <?= $datos->estado_lavado == 'Pendiente' ? 'selected' : '' ?>>Pendiente</option>
                        <option value="Lavando" <?= $datos->estado_lavado == 'Lavando' ? 'selected' : '' ?>>Lavando</option>
                        <option value="Entregado" <?= $datos->estado_lavado == 'Entregado' ? 'selected' : '' ?>>Entregado</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Fecha de entrega estimada</label>
                    <input type="date" class="form-control" name="fecha_entrega" value="<?= $datos->fecha_entrega ?>">
                </div>
            <?php } ?>
            
            <button type="submit" class="btn btn-warning w-100 mb-2" name="btnmodificar" value="ok">Guardar Cambios</button>
            <a href="../index.php" class="btn btn-secondary w-100">Cancelar y Volver</a>
        </form>
    </div>
</body>
</html>