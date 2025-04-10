<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    var_dump($_POST);
}

?>

<!DOCTYPE HTML>
<html>

<body>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

        <label for="name">Name: </label>
        <input type="text" name="name"><br>

        <label for="email">Email: </label>
        <input type="text" name="email"><br>

        Rating:
        <input type="radio" id="rating1" name="rating" value="1">
        <label for="rating1">1</label>

        <input type="radio" id="rating2" name="rating" value="2">
        <label for="rating2">2</label>

        <input type="radio" id="rating3" name="rating" value="3">
        <label for="rating3">3</label>

        <input type="radio" id="rating4" name="rating" value="4">
        <label for="rating4">4</label>

        <input type="radio" id="rating3" name="rating" value="5">
        <label for="rating5">5</label>

        <br>

        <textarea placeholder="Enter text..." id="textarea" name="textarea"></textarea>

        <br>


        <input type="submit">
    </form>

</body>

</html>