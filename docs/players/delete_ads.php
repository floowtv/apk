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
	if(ISSET($_GET['id'])){
		require_once 'includes/conn.php';
		$id = $_GET['id'];
		$sql = $conn->prepare("DELETE from `ancokads` WHERE `ancokads_id`='$id'");
		$sql->execute();
		header('location:ads-manager.php');
	}
?>