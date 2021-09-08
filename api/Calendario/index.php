<?php
	require_once( "../../vendor/autoload.php");
	use Source\Controller\Calendario;
	
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: *");
	//header("Content-Type: application/json");
	
	$guardar = [];


	$busca = $_REQUEST["busca"] ?? null;
	$id = $_REQUEST["id"] ?? 0;
	$data = $_REQUEST["data"] ?? null; // data da consulta
	$local = $_REQUEST["local"] ?? null;

	$calendario = new Calendario;
	$calendario->setId($id);

	if ($busca === "read")
	{

		$guardar["calendario"] = $calendario->read();

	}



	die(json_encode($guardar));

?>