<?php

$db = mysqli_connect("localhost", "root","", "kalorije");

if(!$db)
{
    echo "Neuspesna konekcija sa bazom!";
    exit();
}
mysqli_query($db, "SET NAMES UTF-8");

session_start();

if(isset($_POST['Add']))
{
    $naziv=$_POST['naziv'];

    $sql="SELECT id,kalorije FROM hrana WHERE naziv = '{$naziv}'";
    $rezultat=mysqli_query($db, $sql);
    $red = mysqli_fetch_array($rezultat);
    if($red)
    {
        $idHrana=$red['id'];
        $kalorije=$red['kalorije'];
        $idNalog = $_SESSION['idNalog'];
        $gramaza=$_POST['gramaza'];
        $kalorijei=$kalorije*$gramaza/100;
        $sql = "INSERT INTO gramaza (kolicina,idHrana,idNalog,kalorijei) VALUES ('$gramaza','$idHrana','$idNalog','$kalorijei')";
        mysqli_query($db, $sql);
    }
    else{
        echo "<h1 style='color:red; text-align:center'>Niste uneli ispravno!</h1>";
    }

}

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
    
    <div class="container">
        <?php
        if(isset($_SESSION['korisnickoIme'])){
            $korisnickoIme=$_SESSION['korisnickoIme'];
            echo "<h1 style='display:inline'>Dobrodosao/la {$korisnickoIme}</h1>";
            echo "<form method='post' style='display:inline'><button name='logout'>Log out</button></form>";
        }
        
        ?>
        
        
    <form method="post">
        Hrana: <input type="text" name="naziv"><br>
        Gramaza: <input type="number" name="gramaza"><br>
        <input type="submit" value="Add" name="Add" class="ad"><br>
        <button name="tabela">Tabela sa vrednostima</button>
    </form> 
    
    <?php
    if(isset($_POST['tabela'])){
        echo "<script type='text/javascript'>window.open('hrana.php')</script>";
    }
    
    
    ?>
    <br><br>
    
    
        
    <?php
    $ukc=0;
    if(isset($_SESSION['idNalog'])){
        $idNalog=$_SESSION['idNalog'];
    }
    if(isset($_POST['delete'])) //-----------------------------
    {
        $sql="SELECT id FROM gramaza WHERE idNalog=$idNalog";
        $rezultat=mysqli_query($db, $sql);
        $red = mysqli_fetch_array($rezultat);
        $id = $red['id'];
        $sql = "DELETE FROM gramaza WHERE id = $id";
        if (mysqli_query($db, $sql)) {
            echo "Uspesno obrisano!";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($db);
        }
    }

    
    $sql = "SELECT hrana.naziv, gramaza.kolicina, gramaza.kalorijei FROM hrana,gramaza WHERE gramaza.idHrana = hrana.id and gramaza.idNalog = '{$idNalog}' ORDER BY gramaza.id DESC";
    $rezultat = mysqli_query($db,$sql);
    
    
   echo "<table>";
    if($rezultat){
        echo "<tr><th>Hrana</th> <th>Kolicina (u gramima)</th> <th>Broj kalorija</th><th>Brisanje</th></tr>  ";
        while($red = mysqli_fetch_array($rezultat)) {
        
        echo "<tr>";
        echo "<td>"."". $red["naziv"]. "</td>";
        echo "<td>"."". $red["kolicina"]. "</td>";
        echo "<td>"."". $red["kalorijei"]. "</td>";

        echo "<td> <form method='post'><input type='hidden' name='id' value='" . "'><input type='submit' value='Delete' name='delete' class='dd'></form> </td>";
        echo "</tr>";
        $ukc=$ukc+$red['kalorijei'];
    }
    }
    

    echo "<tr>";
    echo "<td colspan='2'>". "<b> Ukupno kalorija: </b>" . "</td>";
    echo "<td colspan='2'><b>". $ukc . "</b></td>";
    echo "</tr>";
    $db->close();
    if(isset($_POST['logout']))
    {
        session_unset();
        session_destroy();
        header("location: login.php");
    }
    ?>
    </table>
    
    </div>
</body>
</html>