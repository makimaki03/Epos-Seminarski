<?php

$db = mysqli_connect("localhost", "root","", "kalorije");

if(!$db)
{
    echo "Neuspesna konekcija sa bazom!";
    exit();
}
mysqli_query($db, "SET NAMES UTF-8");


$b=1;
if (isset($_POST['login'])) 
{
    $korisnickoIme = $_POST['korisnickoIme'];
    $sifra = $_POST['sifra'];
    $sql="SELECT id FROM nalozi WHERE korisnickoIme = '{$korisnickoIme}'";
    $rezultat=mysqli_query($db, $sql);
    $red = mysqli_fetch_array($rezultat);
    if($red)
    {
        $idNalog=$red['id'];
    }
    
    
    $sql = "SELECT * FROM nalozi WHERE korisnickoIme = '$korisnickoIme'";
    $rezultat = mysqli_query($db, $sql);
    while($red = mysqli_fetch_array($rezultat))
    {
        if ($sifra==$red['sifra'] and $korisnickoIme==$red['korisnickoIme']) {
            session_start();
            $_SESSION['korisnickoIme'] = $korisnickoIme;
            $_SESSION['idNalog'] = $idNalog;
            $b=0;
            break;
            }
            else {
                $b=1;
            }
    }
    if($b==1)
    {
        echo "Pogresna sifra ili korisnickoIme";
    }
    
    if(isset($_SESSION['korisnickoIme']))
    {
        header("Location: index.php");
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
    <title>Login</title>
</head>
<body>
    <div id="login">
        <h1>Login</h1>
        <form method="post">
            <label for="korisnickoIme">Korisnicko ime:</label>
            <input type="text" id="korisnickoIme" name="korisnickoIme" required>
            <br>
            <label for="sifra">Sifra:</label>
            <input type="password" id="sifra" name="sifra" required>
            <br>
            <input type="submit" name="login" value="Login">
        </form>
        <br>
        <div class="la">
            <a href="register.php">Ako nemate nalog registrijte se ovde</a>
        </div>
    </div>

</body>
</html>