<?php
// Configuración de conexión a la base de datos
$host = 'localhost';
$db = 'mi_base_de_datos';
$user = 'root';
$password = '';

// Conexión a la base de datos
$conn = new mysqli($host, $user, $password, $db);

// Verifica si la conexión fue exitosa
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL
$sql = "SELECT * FROM usuarios";
$result = $conn->query($sql);

// Verificar si hay resultados
if ($result->num_rows > 0) {
    // Crear un array para almacenar los resultados
    $usuarios = array();
    while ($row = $result->fetch_assoc()) {
        $usuarios[] = $row;
    }
    
    // Convertir el array a formato JSON
    echo json_encode($usuarios);
} else {
    // Si no hay resultados, devolver un mensaje de error en JSON
    echo json_encode(array("mensaje" => "No se encontraron usuarios"));
}

// Cerrar la conexión
$conn->close();
?>
