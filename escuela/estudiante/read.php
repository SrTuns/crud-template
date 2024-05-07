<link rel="stylesheet" href="../styles.css">

<?php
include '../db.php';

$sql = "SELECT estudiantes.id_estudiante, estudiantes.nombre, estudiantes.edad, clases.nombre_clase FROM estudiantes JOIN clases ON estudiantes.id_clase = clases.id_clase";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Nombre</th><th>Edad</th><th>Clase</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id_estudiante"] . "</td><td>" . $row["nombre"] . "</td><td>" . $row["edad"] . "</td><td>" . $row["nombre_clase"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 resultados";
}
$conn->close();
?>
