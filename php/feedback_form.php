<?php

$name = $email = $rating = $comment = "";
$name_err = $email_err = "";
$message = "";
$valid = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //var_dump(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL));

    if (empty($_POST["name"])) {
        $name_err = "Name required";
    } else {
        $name = sani($_POST["name"]);
        $valid++;
    }

    if (empty($_POST["email"]) || !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $email_err = "Valid email required";
    } else {
        $email = sani($_POST["email"]);
        $valid++;
    }

    if (!empty($_POST["rating"])) {
        $rating = sani($_POST["rating"]);
    }

    if (!empty(htmlspecialchars($_POST["comment"]))) {
        $comment = sani($_POST["comment"]);
    }

    if ($valid == 2) {
        $message = "Thank you!";
    }

    var_dump($_POST);
}

function sani($input)
{
    filter_var($input, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    return $input;
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
        <input type="radio" id="rating1" name="rating" value="1" <?php echo ($rating == 1 ? "checked" : ""); ?> >
        <label for="rating1">1</label>

        <input type="radio" id="rating2" name="rating" value="2" <?php echo ($rating == 2 ? "checked" : ""); ?> >
        <label for="rating2">2</label>

        <input type="radio" id="rating3" name="rating" value="3" <?php echo ($rating == 3 ? "checked" : ""); ?> >
        <label for="rating3">3</label>

        <input type="radio" id="rating4" name="rating" value="4" <?php echo ($rating == 4 ? "checked" : ""); ?> >
        <label for="rating4">4</label>

        <input type="radio" id="rating3" name="rating" value="5" <?php echo ($rating == 5 ? "checked" : ""); ?> >
        <label for="rating5">5</label>

        <br>
        <br>
        <label for="comment">Comments:</label>
        <br>
        <textarea placeholder="Enter text..." id="comment" name="comment"><?php echo $comment; ?></textarea>
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