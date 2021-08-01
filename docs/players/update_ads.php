<?php
$domain_name = ($_SERVER['HTTP_HOST']);
$domains = Array(
    ''.$domain_name.'',      
);
$referrer = parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST); // Ancok Player Simple Protect From Direct Access!
if (!preg_match("/" . implode('|', $domains) . "/", $referrer)) {
    header('Location: 404.html');      
    exit(0); //force exit.
};
	require_once 'includes/conn.php';
	
	if(ISSET($_POST['update_ads'])){
		try{
			$ancokads_id = $_POST['ancokads_id'];
			$advast = $_POST['advast'];				
			$adpopup = $_POST['adpopup'];				
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE `ancokads`SET `advast` = '$advast', `adpopup` = '$adpopup' WHERE `ancokads_id` = '$ancokads_id'";
			$conn->exec($sql);
		}catch(PDOException $e){
			echo $e->getMessage();
		}
		
		$conn = null;
		header('location:ads-manager.php');
	}
?>