<?php
header( 'Content-Type: application/json' );
	if(ISSET($_GET['id'])){
		require_once 'includes/conn.php';
		$id = $_GET['id'];
		$sql = $conn->prepare("SELECT * FROM `ancokads` WHERE `ancokads_id`='$id'");
		$sql->execute();
		while($fetch = $sql->fetch()){
		$advast= $fetch['advast'];
		$adpopup= $fetch['adpopup'];		
		$myjson->advast = "".$advast."";		
		$myjson->adpopup = "".$adpopup."";                
                 $JsonOut = json_encode($myjson);
                 echo $JsonOut;
		
		
	}
	}
?>