<?php 
error_reporting(0);
include_once 'library.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (isset($_POST['link'])) {
		$link = (!empty($_POST['link'])) ? $_POST['link'] : '';
		$link4 = (!empty($_POST['link4'])) ? $_POST['link4'] : '';
		$banner_ads = (!empty($_POST['banner_ads'])) ? $_POST['banner_ads'] : '';
		$show_hide = (!empty($_POST['show_hide'])) ? $_POST['show_hide'] : '';
		$hide_button = (!empty($_POST['hide_button'])) ? $_POST['hide_button'] : '';		
		$poster = (!empty($_POST['poster'])) ? $_POST['poster'] : '';
		$advast = (!empty($_POST['advast'])) ? $_POST['advast'] : '';
		$sub = (!empty($_POST['sub'])) ? $_POST['sub'] : '';
		$sub_label = (!empty($_POST['sub_label'])) ? $_POST['sub_label'] : '';
		$var = array();
		$var['link'] = trim($link);
		$var['link4'] = trim($link4);
		$var['banner_ads'] = trim($banner_ads);
		$var['show_hide'] = trim($show_hide);
		$var['hide_button'] = trim($hide_button);
		$var['poster'] = trim($poster);
		$var['advast'] = trim($advast);
		$var['sub'] = trim($sub);
		$var['sub_label'] = trim($sub_label);
		echo encode(json_encode($var));

	} else echo 'Error Dancok!';
} else echo 'Dancok Error Request!';
?>