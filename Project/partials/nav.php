<link rel="stylesheet" href="static/css/styles.css">
<<<<<<< HEAD
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
=======
>>>>>>> 1c442e501acd8a1ad10ca5aae5f7346ef884cc26
<?php
//we'll be including this on most/all pages so it's a good place to include anything else we want on those pages
require_once(__DIR__ . "/../lib/helpers.php");
?>
<nav>
<<<<<<< HEAD
<ul class="nav">
    <li><a href="home.php">Home</a></li>
    <?php if (!is_logged_in()): ?>
        <li><a href="login.php">Login</a></li>
        <li><a href="register.php">Register</a></li>
    <?php endif; ?>
    <?php if (has_role("Admin")): ?>
            <li><a href="test_create_accounts.php">Create Account</a></li>
            <li><a href="test_list_accounts.php">View Accounts</a></li>
        <?php endif; ?>
    <?php if (is_logged_in()): ?>
        <li><a href="profile.php">Profile</a></li>
        <li><a href="logout.php">Logout</a></li>
	<li><a href="test_create_transactions.php">Create Transaction</a></li>
        <li><a href="test_list_transcations.php">View Transaction</a></li>
    <?php endif; ?>
    <?php if (is_logged_in()): ?>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="logout.php">Logout</a></li>
    <?php endif; ?>
</ul>
</nav>
=======
    <ul class="nav">
        <li><a href="home.php">Home</a></li>
        <?php if (!is_logged_in()): ?>
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php">Register</a></li>
        <?php endif; ?>
	<?php if (has_role("Admin")): ?>
            <li><a href="create_table_accounts.sql">Create accounts</a></li>
            <li><a href="test_create_account.php">List</a></li>
        <?php endif; ?>
        <?php if (is_logged_in()): ?>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="logout.php">Logout</a></li>
        <?php endif; ?>
    </ul>
</nav>

>>>>>>> 1c442e501acd8a1ad10ca5aae5f7346ef884cc26
