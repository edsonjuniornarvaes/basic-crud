<?php

$id_pessoa = $cpf = $nome = $rg = $sexo = $dt_nascimento = $endereco = $telefone = $celular = "";

if (isset($_POST["id_pessoa"]))
	$id_pessoa = trim($_POST["id_pessoa"]);

if (isset($_POST["cpf"]))
	$cpf = trim($_POST["cpf"]);

if (isset($_POST["nome"]))
	$nome = trim($_POST["nome"]);

if (isset($_POST["rg"]))
	$rg = trim($_POST["rg"]);

if (isset($_POST["sexo"]))
    $sexo = trim($_POST["sexo"]);
    
if (isset($_POST["dt_nascimento"]))
    $dt_nascimento = trim($_POST["dt_nascimento"]);
    
if (isset($_POST["endereco"]))
    $endereco = trim($_POST["endereco"]);

if (isset($_POST["telefone"]))
    $telefone = trim($_POST["telefone"]);
    
if (isset($_POST["celular"]))
    $celular = trim($_POST["celular"]);
    

if (empty($cpf)) {
	echo "<script>alert('Favor preencher o cpf');history.back();</script>";
    exit;
    
} else if (empty($nome)) {
	echo "<script>alert('Favor preencher o nome');history.back();</script>";
    exit;
        
} else if (empty($sexo)) {
	echo "<script>alert('Favor preencher o sexo');history.back();</script>";
    exit;
    
} else if (empty($dt_nascimento)) {
	echo "<script>alert('Favor preencher a data de nascimento');history.back();</script>";
    exit;
    
} else if (empty($endereco)) {
	echo "<script>alert('Favor preencher o endereço');history.back();</script>";
    exit;

} else if (empty($celular)) {
	echo "<script>alert('Favor preencher o celular');history.back();</script>";
    exit;
    
} else {

	include "conn/conn.php";

	if (empty($id_pessoa)) {

		$sql = "INSERT INTO pessoa_fisica 
					(id_pessoa,cpf,nome,rg,sexo,dt_nascimento,endereco,telefone,celular)
					values (NULL, ?, ?, ?, ?, ?, ?, ?, ?)";

		$consulta = $conn->prepare($sql);
        $consulta->bindParam(1, $cpf);
        $consulta->bindParam(2, $nome);
		$consulta->bindParam(3, $rg);
		$consulta->bindParam(4, $sexo);
		$consulta->bindParam(5, $dt_nascimento);
        $consulta->bindParam(6, $endereco);
        $consulta->bindParam(7, $telefone);
        $consulta->bindParam(8, $celular);
		
	} else {

		$sql = "UPDATE pessoa_fisica SET cpf = ?, nome = ?, rg = ?, sexo = ?, dt_nascimento = ?, endereco = ?, telefone = ?, celular = ? 
                WHERE id_pessoa = ? 
                LIMIT 1";

		$consulta = $conn->prepare($sql);

        $consulta->bindParam(1, $cpf);
        $consulta->bindParam(2, $nome);
		$consulta->bindParam(3, $rg);
		$consulta->bindParam(4, $sexo);
        $consulta->bindParam(5, $dt_nascimento);
        $consulta->bindParam(6, $endereco);
        $consulta->bindParam(7, $telefone);
        $consulta->bindParam(8, $celular);
        $consulta->bindParam(9, $id_pessoa);

	}
}

if ( $consulta->execute() ) {
    echo "<script>alert('Registro salvo com sucesso!');location.href='home.php?op=list&pg=fisica';</script>";
    exit;

} else {
    
        $erro = $consulta->errorInfo()[2];
        echo $erro;

        echo "<script>alert('Não foi possível salvar, tente novamente');</script>";
        $conn->rollBack();
        exit;
}