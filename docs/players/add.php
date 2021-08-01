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
	include_once("includes/curl.php"); 
	
	if(ISSET($_POST['save'])){
		try{
			$moviestitle = $_POST['moviestitle'];
			$gdrivelink = $_POST['gdrivelink'];
			//$link_coming = $_POST['gdrivelink'];
			//$gdrivelink = $link_coming ;
                        //if(isset($link_coming) && strpos($link_coming,"//drive.google.com/")!== FALSE){
                        //$gdrivelink = curl('https://streams.nontongo.win/cdrive/cpy.php?url='.$link_coming);
                        //}                        
			$embed1 = $_POST['embed1'];
			$embed2 = $_POST['embed2'];
			$embed3 = $_POST['embed3'];
			$embed4 = $_POST['embed4'];
			$subtitle = $_POST['subtitle'];
			$poster = $_POST['poster'];			
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO `ancokembed` (`moviestitle`, `gdrivelink`, `embed1`, `embed2`, `embed3`, `embed4`, `subtitle`, `poster`) VALUES ('$moviestitle', '$gdrivelink', '$embed1', '$embed2', '$embed3', '$embed4', '$subtitle', '$poster')";
			$conn->exec($sql);
		}catch(PDOException $e){
			echo $e->getMessage();
		}
		
		$conn = null;
		header('location:index.php');
	}
?>