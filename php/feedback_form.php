<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    var_dump($_POST);
}

?>

<!DOCTYPE HTML>
<html>

<body>

    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">

        Name: <input type="text" name="name"><br>
        E-mail: <input type="text" name="email"><br>
        <input type="submit">
    </form>

</body>

</html>