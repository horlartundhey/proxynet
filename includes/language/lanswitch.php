<?php
if(!isset($_SESSION))
	session_start();

if(isset($_POST['lang']) && $_POST['lang']!=""){
	if(isset($_SESSION['language']) && $_SESSION['language']!=""){
		$language = $_SESSION['language'];
		if($language=="english"){
			$_SESSION['language'] = "french";
			$_SESSION['currency'] = "CFA";
		}else{
			$_SESSION['language'] = "english";
			$_SESSION['currency'] = "NGN";
		}
		echo "success";
	}else{
		if($_POST['lang']=="1"){
			$_SESSION['language'] = "french";
			$_SESSION['currency'] = "CFA";
		}else{
			$_SESSION['language'] = "english";
			$_SESSION['currency'] = "NGN";
		}
		echo "success";
	}
}

?>