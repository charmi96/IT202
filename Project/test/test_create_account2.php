<?php require_once(__DIR__ . "/partials/nav.php"); ?>
<?php
if (!has_role("Admin")) {
    //this will redirect to login and kill the rest of this script (prevent it from executing)
    flash("You don't have permission to access this page");
    die(header("Location: login.php"));
}
?>

<?php
if(isset($_POST["save"])){
	//TODO add proper validation/checks
	$account_number = $_POST["account_number"];
	$account_type  = $_POST["account_type"];
	$balance = $_POST["balance"];
        $nst = date('Y-m-d H:i:s');//calc
	$user = get_user_id();
	$db = getDB();
        $stmt = $db->prepare("INSERT INTO ACCOUNTS (account_number,account_type,last_updated,opened_data,balance,user_id) VALUES(:account_number, :account_type, :balance, :nst,:user)");
	$r = $stmt->execute([
		":account_number"=>$account_number,
		":account_type"=>$account_type,
		":balance"=>$balance,
		":nst"=>$nst,
		":user"=>$user
	]);
	if($r){
		flash("Created successfully with id: " . $db->lastInsertId());
	}
	else{
		$e = $stmt->errorInfo();
		flash("Error creating: " . var_export($e, true));
	}
}
?>

<?php require(__DIR__ . "/partials/flash.php");
