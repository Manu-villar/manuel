<?php
    session_start();
     $errores='';
    if(!empty($_POST['paso'])){
        $errores='';
        $contador=0;
        $patron_email="/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}/";
        $patron_nombre="/^[A-Z]{1}[a-z]{4,20}$/";
        if(empty($_POST['nombre'])){
            $errores.="<span style='color:red;'>el campo nombre está vacio<br></span>";
            $contador++;
        }else if(preg_match($patron_nombre,$_POST['nombre'])==0){
             $errores.="<span style='color:red;'>el campo nombre es erroneo<br></span>";
             $contador++;
        }
        if(empty($_POST['email'])){
            $errores.="<span style='color:red;'>el campo email está vacio<br></span>";
            $contador++;
        }else if(preg_match($patron_email,$_POST['email'])==0){
             $errores.="<span style='color:red;'>el campo email es erroneo<br></span>";
             $contador++;
        }
        if(empty($_POST['edad'])){
            $errores.="<span style='color:red;'>el campo edad está vacio<br></span>";
            $contador++;
        }else if($_POST['edad']<18 || $_POST['edad']>100){
             $errores.="<span style='color:red;'>tienes que poner una edad entre 18 y 100<br></span>";
             $contador++;
        }
        if(empty($_POST['pais'])){
            $errores.="<span style='color:red;'>debes elegir un país<br></span>";
            $contador++;
        }
        if($contador==0){
            $_SESSION['nombre']=$_POST['nombre'];
            $_SESSION['email']=$_POST['email'];
            $_SESSION['edad']=$_POST['edad'];
            $_SESSION['pais']=$_POST['pais'];
            header("Location: ./informacion.php");
            exit();
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method="POST">
        <input type="hidden" name="paso" value="1">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre">
        <br>
        <label for="nombre">Email</label>
        <input type="text" name="email">
        <br>
        <label for="nombre">edad</label>
        <input type="text" name="edad">
        <br>
        <label for="españa">España</label>
        <input type="radio" name="pais" value="españa">
        <label for="francia">Francia</label>
        <input type="radio" name="pais" value="francia">
        <label for="alemania">Alemania</label>
        <input type="radio" name="pais" value="alemania">
        <br>
        <input type="submit" value="enviar">
    </form>
    <?php echo $errores;?>
</body>
</html>