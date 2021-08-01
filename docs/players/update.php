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
	
	if(ISSET($_POST['update'])){
		try{
			$ancokembed_id = $_POST['ancokembed_id'];
			$moviestitle = $_POST['moviestitle'];
			$gdrivelink = $_POST['gdrivelink'];			
			$embed1 = $_POST['embed1'];
			$embed2 = $_POST['embed2'];
			$embed3 = $_POST['embed3'];
			$embed4 = $_POST['embed4'];
			$subtitle = $_POST['subtitle'];
			$poster = $_POST['poster'];			
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE `ancokembed`SET `moviestitle` = '$moviestitle', `gdrivelink` = '$gdrivelink', `embed1` = '$embed1', `embed2` = '$embed2', `embed3` = '$embed3', `embed4` = '$embed4', `subtitle` = '$subtitle', `poster` = '$poster' WHERE `ancokembed_id` = '$ancokembed_id'";
			$conn->exec($sql);
		}catch(PDOException $e){
			echo $e->getMessage();
		}
		
		$conn = null;
		header('location:index.php');
	}
?>