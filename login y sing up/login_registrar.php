<?php

include ("conexion.php");

$nombre = $_POST ["usuario"];
$pass = $_POST ["pass"];

//login
if(!empty($_POST["btiningresas"]))
{
    $query = mysqli_query($conn,"SELECT * FROM login WERE usuario='$nombre' AND password='$pass'");

    if(!$result > 0){
        echo mysqli_error($conexion);
      }else
    {
        echo "<script> alert('Usuario no exite'); window.location='index.html' </script>";
    }
}

//Registarse
if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);

    if (mysqli_query($conn,$sqlgrabar)) 
    {
        echo "<script> alert('Usuario registrado con exito: $nombre'); window.location='index.html'</script>";
    }else 
    {
        echo "Error: ".$sqlgrabar."<br>".mysql_error($conn);
    }
}

?>