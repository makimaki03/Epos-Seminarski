<?php

$db = mysqli_connect("localhost", "root","", "kalorije");

if(!$db)
{
    echo "Neuspesna konekcija sa bazom!";
    exit();
}
mysqli_query($db, "SET NAMES UTF-8");

if (isset($_POST['register'])) {
    $korisnickoIme = $_POST['korisnickoIme'];
    $email = $_POST['email'];
    $sifra = $_POST['sifra'];

    $sql = "INSERT INTO nalozi (korisnickoIme, email, sifra) VALUES ('$korisnickoIme', '$email', '$sifra')";
    $rezultat = mysqli_query($db, $sql);

    if ($rezultat) {
        echo "Registracija uspesna!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style2.css">
    <title>Register</title>
</head>
<body>
<div id="register">
        <h1>Register</h1>
        <form method="post">
            <label for="korisnickoIme">Korisnicko ime:</label>
            <input type="text" id="korisnickoIme" name="korisnickoIme" required>
            <br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <br>
            <label for="sifra">Sifra:</label>
            <input type="password" id="sifra" name="sifra" required>
            <br>
            <input type="submit" name="register" value="Register">
        </form>
        <br>
        <div class="la">
            <a href="login.php">Ako imate nalog prijavite se ovde</a>
        </div>
        
    </div>
    
</body>
</html>