<?php
function VerErrores($campo)
{
    global $errores;
    if (isset($errores[$campo]))
    {
        echo "<p style='color: red'>".$errores[$campo]."</p>";
    }
}
?>

<html>
@include("\..\header.header", array('titulo'=>"Log In"))

<body>
<div class="text-center">
</div>
<div>
    <div class="container text-center">
        <p><h2>Login de usuario:</h2></p>
    </div>
    <div class="container">
        <form  action="" method="POST">
            <label for="name">Usuario:
                <input type="text" name="usuario" class="" value="@if(isset($datos["usuario"])){{$datos["usuario"]}}@endif"/>
                <?=VerErrores("usuario")?>
            </label>
            <br/>
            <label for="password">Contraseña:
                <input type="password" name="password" class="" value="@if(isset($datos["password"])){{$datos["password"]}}@endif"/>
                <?=VerErrores("password")?>
            </label>
            <br/>
            <input type="submit" value="Aceptar" class="btn btn-primary">
        </form>
    </div>
</div>
</body>
</html>