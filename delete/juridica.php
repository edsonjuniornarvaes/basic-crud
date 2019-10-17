<?php


	$id_pessoa = "";

	if ( isset ( $_GET["id_pessoa"] ) ) {
		$id_pessoa = trim ( $_GET["id_pessoa"] );
	}

	include "conn/conn.php";

	$sql = "DELETE from pessoa_juridica 
			WHERE id_pessoa = ?
			LIMIT 1";

	$consulta = $conn->prepare($sql);
	$consulta->bindParam(1,$id_pessoa);
	
	if ( $consulta->execute() ) {


	echo "<script>alert('Registro excluído');history.back();</script>";
		exit;
	} else {
	echo "<script>alert('Erro ao excluir registro');history.back();</script>";
		exit;
	}
	