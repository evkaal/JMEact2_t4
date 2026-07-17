<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CRUD Lavandería MVC</title>
    <!-- Bootstrap para replicar el diseño del video -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <h1 class="text-center p-3">Gestión de Recepciones</h1>
    
    <div class="container-fluid row">
        <!-- Formulario (Lado Izquierdo) -->
        <form class="col-4 p-3" method="POST">
            <h3 class="text-center text-secondary bg-light p-2 rounded">Registro de prendas</h3>
            
            <?php
            // Incluimos la conexión y los controladores
            include "models/conexion.php";
            include "controller/registro.php";
            include "controller/eliminar.php";
            ?>
            
            <div class="mb-3">
                <label class="form-label">Nombre del cliente</label>
                <input type="text" class="form-control" name="nombre">
            </div>
            <div class="mb-3">
                <label class="form-label">Tipo de prenda</label>
                <input type="text" class="form-control" name="prenda">
            </div>
            <div class="mb-3">
                <label class="form-label">Peso en Kilos</label>
                <input type="number" step="0.01" class="form-control" name="peso">
            </div>
            <div class="mb-3">
                <label class="form-label">Estado actual</label>
                <select class="form-control" name="estado">
                    <option value="Pendiente">Pendiente</option>
                    <option value="Lavando">Lavando</option>
                    <option value="Entregado">Entregado</option>
                </select>
            </div>

           <div class="mb-3">
                <label class="form-label">Fecha de entrega estimada</label>
                <input type="date" class="form-control" name="fecha_entrega">
            </div>
            <button type="submit" class="btn btn-primary w-100" name="btnregistrar" value="ok">Registrar recepción</button>

            
        </form>
        
<!---tabla de datos-->
        <div class="col-8 p-4">
            <table class="table">
                <thead class="bg-info text-white"> 
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">CLIENTE</th>
                        <th scope="col">PRENDA</th>
                        <th scope="col">PESO (KG)</th>
                        <th scope="col">ESTADO</th>
                        <th scope="col">ENTREGA</th>
                        <th scope="col">ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = $conexion->query("SELECT * FROM recepciones");
                    while($datos = $sql->fetch_object()) { ?>
                        <tr>
                            <td><?= $datos->id_recepcion ?></td>
                            <td><?= $datos->nombre_cliente ?></td>
                            <td><?= $datos->tipo_prenda ?></td>
                            <td><?= $datos->peso_kilos ?></td>
                            <td><?= $datos->estado_lavado ?></td>
                            <td><?= $datos->fecha_entrega ?></td>
                            <td>
                                <!-- Botones de acción -->
                                <a href="view/modificar_vista.php?id=<?= $datos->id_recepcion ?>" class="btn btn-small btn-warning">Editar</a>
                                <a href="index.php?id=<?= $datos->id_recepcion ?>" class="btn btn-small btn-danger" onclick="return confirm('¿Seguro que deseas eliminar?');">Borrar</a>
                            </td>
                        </tr>
                    <?php }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>