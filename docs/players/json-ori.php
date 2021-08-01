<?php
header( 'Content-Type: application/json' );
	if(ISSET($_GET['id'])){
		require_once 'includes/conn.php';
		$id = $_GET['id'];
		$sql = $conn->prepare("SELECT * FROM `ancokembed` WHERE `ancokembed_id`='$id'");
		$sql->execute();
		while($fetch = $sql->fetch()){
		$moviestitle= $fetch['moviestitle'];
		$gdrivelink= $fetch['gdrivelink'];
		$embed1= $fetch['embed1'];
		$embed2= $fetch['embed2'];
		$embed3= $fetch['embed3'];
		$embed4= $fetch['embed4'];
		$subtitle= $fetch['subtitle'];
		$poster= $fetch['poster'];
		$myjson->title = "".$moviestitle."";		
		$myjson->Main_url = "".$gdrivelink."";
                $myjson->Embed_url1 = "".$embed1."";
                $myjson->Embed_url2 = "".$embed2."";
                $myjson->Embed_url3 = "".$embed3."";
                $myjson->Embed_url4 = "".$embed4."";
                $myjson->subtitle = "".$subtitle."";
                $myjson->poster = "".$poster."";
                 $JsonOut = json_encode($myjson);
                 echo $JsonOut;
		
		
	}
	}
?>