<link rel="stylesheet" href="../styles.css">

<?php
include '../db.php';

$sql = "SELECT clases.id_clase, clases.nombre_clase, profesores.nombre AS nombre_profesor FROM clases JOIN profesores ON clases.id_profesor = profesores.id_profesor";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID Clase</th><th>Nombre Clase</th><th>Profesor</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id_clase"] . "</td><td>" . $row["nombre_clase"] . "</td><td>" . $row["nombre_profesor"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 resultados";
}
$conn->close();
?>
