<?php
	require_once './ClienteForm.php';
	
	$form = new ClienteForm();
	
	if(!empty($_POST)) {	//venimos por post?

		if($form->procesar($_POST)) {	//procesó OK?
			header("Location: Procesado.php");	//redirect
			die();
		}
	}
	
	require "./Index_vista.php";
