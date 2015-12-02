<?php
require '../../clases/AutoCarga.php';
$bd = new Database();
$manager = new ManagerDevice($bd);
$d = $manager->get(gethostbyaddr($_SERVER['REMOTE_ADDR']));
if (!$d) {
    header('Location:../../index.php');
}
$session = new Session();
$user = $session->get('usser');
$session->erase('usser');
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="style/style.css"/>
    </head>
    <body>
        <div id="wrapper">
            <h3>Busqueda de usuarios</h3>
            <form method="POST" action="controller/phpread.php" id="formulario">
                <label>Nombre de usuario: <br/><input type="text" name="userName" placeholder="Todos loa usuarios"/></label>
                <input type="submit" value="Buscar"/>
            </form>
            <table>
                <?php
                if (is_array($user)) {
                    foreach ($user as $value) {
                        ?>
                        <td><?= $value->getUserName() ?></td>
                    <?php }
                } else if ($user !== NULL) {
                    ?>
                    <tr>
                        <td><?= $user->getUserName() ?></td>
                    </tr>
<?php } ?>
            </table>
        </div>
    </body>
</html>