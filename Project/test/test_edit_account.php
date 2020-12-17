<?php require_once(__DIR__ . "/partials/nav.php"); ?>
<?php
if (!has_role("Admin")) {
    //this will redirect to login and kill the rest of this script (prevent it from executing)
    flash("You don't have permission to access this page");
    die(header("Location: login.php"));
}
?>
<?php
//we'll put this at the top so both php block have access to it
if(isset($_GET["id"])){
	$id = $_GET["id"];
}
?>
<?php
//saving
if(isset($_POST["save"])){
	//TODO add proper validation/checks
	$account_number = $_POST["account_number"];
	$account_type = $_POST["account_type"];
	$balance = $_POST["balance"];
	$nst = date('Y-m-d H:i:s');//calc
	$user = get_user_id();
	$db = getDB();
	if(isset($id)){
		$stmt = $db->prepare("UPDATE accounts set account_number=:account_number, account_type=:account_type, balance=:balance, opened_date=:opened_date, last_updated=:lastupdated, next_stage_time=:nst where id=:id");
		//$stmt = $db->prepare("INSERT INTO accounts (account_number, account_type, balance, last_updated, opened_date, next_stage_time, user_id) VALUES(:account_number, :account_type, :balance, :nst,:user)");
		$r = $stmt->execute([
			":account_number"=>$account_number,
			":account_type"=>$account_type,
			":balance"=>$balance,
			":nst"=>$nst,
			":id"=>$id
		]);
		if($r){
			flash("Updated successfully with id: " . $id);
		}
		else{
			$e = $stmt->errorInfo();
			flash("Error updating: " . var_export($e, true));
		}
	}
	else{
		flash("ID isn't set, we need an ID in order to update");
	}
}
?>
<?php
//fetching
$_POST = [];
if(isset($id)){
	$id = $_GET["id"];
	$db = getDB();
	$stmt = $db->prepare("SELECT * FROM accounts where id = :id");
	$r = $stmt->execute([":id"=>$id]);
	$_POST = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<form method="POST">
	<label>account_number</label>
	<input name="account_number" placeholder="account_type" value="<?php echo $_POST["account_number"];?>"/>
	<label>Account_type</label>
	<select name="account_type" value="<?php echo $_POST["account_type"];?>">
		<option value="0" <?php echo ($_POST["account_type"] == "0"?'selected="selected"':'');?>>Checking</option>
                <option value="1" <?php echo ($_POST["account_type"] == "1"?'selected="selected"':'');?>>Saving</option>
	</select>
	<label>Balance</label>
	<input type="number" min="1" name="balance" value="<?php echo $_POST["balance"];?>" />
	<input type="submit" name="save" value="Update"/>
</form>


<?php require(__DIR__ . "/partials/flash.php");
