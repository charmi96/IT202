<?php require_once(__DIR__ . "/partials/nav.php"); ?>
<?php
//we use this to safely get the email to display
$email = "";
if (isset($_SESSION["user"]) && isset($_SESSION["user"]["email"])) {
    $email = $_SESSION["user"]["email"];
}
?>
<<<<<<< HEAD
<div class="home">    <p>Welcome, <?php echo $email; ?></p>
<?php require(__DIR__ . "/partials/flash.php");
=======
<p>Welcome, <?php echo $email; ?></p>
>>>>>>> 1c442e501acd8a1ad10ca5aae5f7346ef884cc26

