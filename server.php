<head>
<?php
// Laat alle PHP errors zien
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);?>
</head>
<body>
<?php
$servername = "host";
$username = "user";
$password = "pass";
$dbname = "dbname";

// Maak de verbinding
$conn = new mysqli($servername, $username, $password, $dbname);
// Werkt de verbinding?
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Hij werkt!, selecteer alles van de database blogs
$sql = "SELECT * FROM blogs";
$result = $conn->query($sql);

// Zijn er meer dan 0 rijen? Laat de data als volgt zien
if ($result->num_rows > 0) {
    // Output van elke rij
    while($row = $result->fetch_assoc()) {
        echo "<div class='card'>
        <h1>".$row["blogtitle"]."</h1>
        <h5>".$row["blogdate"]." ".$row["blogauthor"]."</h5>
        <p>".$row["blogtext"]."</p></div>";
    }
} else {
// Geen resultaten?
    echo "Geen blogs!";
}
$conn->close();
?>
