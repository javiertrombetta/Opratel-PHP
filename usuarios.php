<?php
if (!isset($_SESSION['usuario'])) {
?>

<html>
    <form method="POST" action="buscarusuarios.php">
        <div>
            <input type="text" name="username">
        </div>    
        <div>
            <input type="submit" value="buscar Usuario">
             <a href="activarusuario.php?usuario=<?php echo Trim($_SESSION['nombreusuario']); ?>">&nbsp;&nbsp; Activar Usuario</a>
             <a href="desactivar?>usuario.php?usuario=<?php echo Trim($_SESSION['nombreusuario']); ?>">&nbsp;&nbsp; Desactivar Usuario</a>    
        </div>    
    </form>
    <form method="POST" action="altausuarios.php">
        <div>
            <input type="text" name="usuario">
            <input type="text" name="password">
            <input type="text" name="email">   
        </div>    
        <div>
            <input type="submit" value="Agregar Usuario">   
        </div>   
    </form>
</html>
<?php } ?>

