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
		$stmt = $db->prepare("INSERT INTO ACCOUNTS (account_number,account_type,last_updated,opened_data,balance,user_id) VALUES(:account_number, :account_type, :balance, :nst,:user)");
		$r = $stmt->execute([
			":account_number"=>$account_number,
			":account_type"=>$account_type,
			":balance"=>$balance,
			":nst"=>$nst,
			":user"=>$user
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
$result = [];
if(isset($id)){
	$id = $_GET["id"];
	$db = getDB();
	$stmt = $db->prepare("SELECT * FROM Accounts  where id = :id");
	$r = $stmt->execute([":id"=>$id]);
	$result = $stmt->fetch(PDO::FETCH_ASSOC);
}
//get eggs for dropdown
$db = getDB();
$stmt = $db->prepare("SELECT id,name from Accounts  LIMIT 10");
$r = $stmt->execute();
$eggs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<form method="POST">
	</select>
	<label>AccountNumber</label>
	<input type="number" min="1" name="AccountNumber" value="<?php echo $result["AccountNumber"];?>" />
	<label>AccountType</label>
        <input name="AccountType" placeholder="AccountType" value="<?php echo $result["AccountType"]; ?>"/>
	<label>Balance</label>
	<input type="number" min="1" name="Balance" value="<?php echo $result["Balance"];?>" />
	<input type="submit" name="save" value="create"/>
</form>


<?php require(__DIR__ . "/partials/flash.php");
