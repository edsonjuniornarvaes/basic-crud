<?php

$id_pessoa = $cnpj = $razao_social = $nome_fantasia = $inscricao_estadual = $dt_fundacao = $endereco = $telefone = $celular = "";

if (isset($_POST["id_pessoa"]))
    $id_pessoa = trim($_POST["id_pessoa"]);
    
if (isset($_POST["cnpj"]))
	$cnpj = trim($_POST["cnpj"]);

if (isset($_POST["razao_social"]))
	$razao_social = trim($_POST["razao_social"]);

if (isset($_POST["nome_fantasia"]))
	$nome_fantasia = trim($_POST["nome_fantasia"]);

if (isset($_POST["inscricao_estadual"]))
	$inscricao_estadual = trim($_POST["inscricao_estadual"]);

if (isset($_POST["dt_fundacao"]))
    $dt_fundacao = trim($_POST["dt_fundacao"]);
    
if (isset($_POST["endereco"]))
    $endereco = trim($_POST["endereco"]);
    
if (isset($_POST["telefone"]))
    $telefone = trim($_POST["telefone"]);

if (isset($_POST["celular"]))
    $celular = trim($_POST["celular"]);
    

if (empty($razao_social)) {
	echo "<script>alert('Favor preencher a razão social');history.back();</script>";
    exit;

} else if (empty($cnpj)) {
	echo "<script>alert('Favor preencher o CNPJ');history.back();</script>";
    exit;
    
} else if (empty($nome_fantasia)) {
	echo "<script>alert('Favor preencher o nome fantasia');history.back();</script>";
    exit;
    
} else if (empty($dt_fundacao)) {
	echo "<script>alert('Favor preencher a data de fundação');history.back();</script>";
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

		$sql = "INSERT INTO pessoa_juridica 
					(id_pessoa,cnpj,razao_social,nome_fantasia,inscricao_estadual,dt_fundacao,endereco,telefone,celular)
                    values (NULL, ?, ?, ?, ?, ?, ?, ?, ?)";

		$consulta = $conn->prepare($sql);
        $consulta->bindParam(1, $razao_social);
        $consulta->bindParam(2, $cnpj);
        $consulta->bindParam(3, $nome_fantasia);
		$consulta->bindParam(4, $inscricao_estadual);
		$consulta->bindParam(5, $dt_fundacao);
		$consulta->bindParam(6, $endereco);
        $consulta->bindParam(7, $telefone);
        $consulta->bindParam(8, $celular);
		
	} else {

		$sql = "UPDATE pessoa_juridica SET razao_social = ?, cnpj = ?,  nome_fantasia = ?, inscricao_estadual = ?, dt_fundacao = ?, endereco = ?, telefone = ?, celular = ? 
                WHERE id_pessoa = ? 
                LIMIT 1";

		$consulta = $conn->prepare($sql);

        $consulta->bindParam(1, $razao_social);
        $consulta->bindParam(2, $cnpj);
        $consulta->bindParam(3, $nome_fantasia);
		$consulta->bindParam(4, $inscricao_estadual);
		$consulta->bindParam(5, $dt_fundacao);
		$consulta->bindParam(6, $endereco);
        $consulta->bindParam(7, $telefone);
        $consulta->bindParam(8, $celular);
        $consulta->bindParam(9, $id_pessoa);

	}
}

if ( $consulta->execute() ) {
    echo "<script>alert('Registro salvo com sucesso!');location.href='home.php?op=list&pg=juridica';</script>";
    exit;

} else {
    
        $erro = $consulta->errorInfo()[2];
        echo $erro;

        echo "<script>alert('Não foi possível salvar, tente novamente');</script>";
        $conn->rollBack();
        exit;
}