<?php

session_start();

$name = $email = $rating = $comment = "";
$name_err = $email_err = "";
$message = "";
$valid = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['reset'])) {
        //print_r("clicked");

        if (isset($_COOKIE['rating'])) {
            unset($_COOKIE['rating']); // doesn't work for some reason?
            setcookie("rating", "", time() - 3600); // force expire it
            //print_r("set");
        }

        session_unset();
        session_destroy();

        //die();

        header("refresh: 0");
    }

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

    if (!empty($_POST["comment"])) {
        $comment = sani($_POST["comment"]);
    }

    if ($valid == 2) {
        # message to output
        $message = "Thank you!";

        # set session var
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;

        # set value in cookie
        setcookie("rating", $rating, time() + (86400 * 7), "/");
    }

    //var_dump($_POST);
} else {
    // GET 
    if (isset($_COOKIE['rating'])) {
        // rating exists in cookie, use it
        $rating = $_COOKIE['rating'];
    }
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

        <?php if (isset($_SESSION['name'])) : ?>
            <p>
                Welcome back, <?php echo $_SESSION['name']; ?>! We have your email as <?php echo $_SESSION['email']; ?>.
            </p>
        <?php endif; ?>

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
        <input type="radio" id="rating1" name="rating" value="1" <?php echo ($rating == 1 ? "checked" : ""); ?>>
        <label for="rating1">1</label>

        <input type="radio" id="rating2" name="rating" value="2" <?php echo ($rating == 2 ? "checked" : ""); ?>>
        <label for="rating2">2</label>

        <input type="radio" id="rating3" name="rating" value="3" <?php echo ($rating == 3 ? "checked" : ""); ?>>
        <label for="rating3">3</label>

        <input type="radio" id="rating4" name="rating" value="4" <?php echo ($rating == 4 ? "checked" : ""); ?>>
        <label for="rating4">4</label>

        <input type="radio" id="rating3" name="rating" value="5" <?php echo ($rating == 5 ? "checked" : ""); ?>>
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
    <p>Rating: <?php echo $rating ? $rating : "None"; ?> </p>
    <p>Comments: <?php echo $comment ? $comment : "None"; ?> </p>

<?php endif; ?>

<br>
<br>
<br>
<div style="border:1px solid red; border-width: thin;">
    <h3>Debug</h3>
    <p> Session:
        <?php echo print_r($_SESSION); ?>
    </p>
    <p> Cookies:
        <?php echo print_r($_COOKIE); ?>
    </p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <button id="reset" name="reset" class="error">Reset (debugging only)</button>
    </form>

</div>

</body>

</html>

<style>
    .error {
        color: #FF0000;
    }
</style>