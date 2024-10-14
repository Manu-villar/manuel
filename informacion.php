<?php
    session_start();
    echo "Hola <b>".$_SESSION['nombre']."</b><br>
        tienes <b>".$_SESSION['edad']."</b> años <br>
        eres de <b>".$_SESSION['pais']."</b><br>
        y tu email es <b>".$_SESSION['email'];

?>