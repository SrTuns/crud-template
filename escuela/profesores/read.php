<link rel="stylesheet" href="../styles.css">

<?php


include '../db.php';

$sql = "SELECT id_profesor, nombre, especialidad FROM profesores";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Nombre</th><th>Especialidad</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id_profesor"] . "</td><td>" . $row["nombre"] . "</td><td>" . $row["especialidad"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 resultados";
}
$conn->close();
?>
