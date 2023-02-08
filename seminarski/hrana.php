<?php
$db = mysqli_connect("localhost", "root","", "kalorije");

if(!$db)
{
    echo "Neuspesna konekcija sa bazom!";
    exit();
}
mysqli_query($db, "SET NAMES UTF-8");


$sql = "SELECT hrana.naziv, hrana.kalorije FROM hrana";
$rezultat = mysqli_query($db,$sql);

echo "<div class='container'>";
echo "<table>";
    if($rezultat){
        echo "<tr><th>Hrana</th> <th>Kalorije (kcal)</th></tr>  ";
        while($red = mysqli_fetch_array($rezultat)) {
        echo "<tr>";
        echo "<td>"."". $red["naziv"]. "</td>";
        echo "<td>"."". $red["kalorije"]. "</td>";
        echo "</tr>";
    }
    }
    echo "</div>";

    
    $db->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    
</body>
</html>