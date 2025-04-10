<?php

$name = $email = $rating = $comment = "";
$name_err = $email_err = "";
$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (empty($_POST["name"])) {
        $name_err = "Name is required";
    } else {
        $name = $_POST["name"];
    }

    if (empty($_POST["email"])) {
        $email_err = "Email is required";
    } else {
        $email = $_POST["email"];
    }

    if (!empty($_POST["rating"])) {
        $rating = $_POST["rating"];
    }

    if (!empty($_POST["comment"])) {
        $comment = $_POST["comment"];
    }

    if (!empty($_POST["name"]) && !empty($_POST["email"])) {
        $message = "Thank you!";
    }

    var_dump($_POST);

}

?>

<!DOCTYPE HTML>
<html>

<?php if ($message == "") : ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

        <label for="name">Name:*</label>
        <input type="text" name="name" value="<?php echo $name; ?>">
        <span class="error"><?php echo $name_err; ?></span>
        <br>

        <label for="email">Email:*</label>
        <input type="text" name="email" value="<?php echo $email; ?>">
        <span class="error"><?php echo $email_err; ?></span>
        <br>
        <br>

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
        <br>
        <label for="comment">Comments:</label>
        <br>
        <textarea placeholder="Enter text..." id="comment" name="comment"></textarea>
        <br>
        <br>

        <input type="submit">
    </form>
<?php else : ?>
    <h2>Thank you!</h2>
    <p>You entered: </p>

    <p>Name: <?php echo $name; ?> </p>
    <p>Email: <?php echo $email; ?> </p>
    <p>Rating: <?php echo ($rating ? $rating : "None"); ?> </p>
    <p>Comments: <?php echo ($comment ? $comment : "None"); ?> </p>

<?php endif; ?>


</body>

</html>

<style>
    .error {
        color: #FF0000;
    }
</style>