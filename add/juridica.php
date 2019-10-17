<?php

    include "conn/conn.php";

    $id_pessoa = $cnpj = $razao_social = $nome_fantasia = $inscricao_estadual = $dt_fundacao = $endereco = $telefone = $celular = "";

    if ( isset ( $_GET["id_pessoa"] ) ) {
        $id_pessoa = trim ( $_GET["id_pessoa"] );
        
        $sql = "SELECT * FROM pessoa_juridica
                WHERE id_pessoa = ? 
                LIMIT 1";

        $consulta = $conn->prepare($sql);
        $consulta->bindParam(1, $id_pessoa);
        $consulta->execute();

        $dados = $consulta->fetch(PDO::FETCH_OBJ);

    if ( isset ( $dados->id_pessoa ) ) {

        $id_pessoa          = $dados->id_pessoa;
        $cnpj               = $dados->cnpj;
        $razao_social       = $dados->razao_social;
        $nome_fantasia      = $dados->nome_fantasia;
        $inscricao_estadual = $dados->inscricao_estadual; 
        $dt_fundacao        = $dados->dt_fundacao;
        $endereco           = $dados->endereco;
        $telefone           = $dados->telefone;
        $celular            = $dados->celular;

        }
    }
?>


    <input type="hidden" name="id_pessoa" class="form-control" readonly value="<?=$id_pessoa;?>">

    <div class="container" id="formulario">
    <h3>Cadastro de Pessoa Jurídica</h3><br>

    <form name="form1" method="post" action="home.php?op=save&pg=juridica" data-parsley-validate>

         <!-- Primeira Linha -->
        <div class="form-row">
        <input type="hidden" name="id_pessoa" class="form-control" readonly value="<?=$id_pessoa;?>">

        <div class="form-group col-md-6">
            <label for="nome">Razão Social</label>
            <input type="text" class="form-control" name="razao_social" id="razao_social" value="<?=$razao_social;?>">
        </div>

        <div class="form-group col-md-6">
            <label for="nome_fantasia">Nome Fantasia</label>
            <input type="text" class="form-control" name="nome_fantasia" id="nome_fantasia" value="<?=$nome_fantasia;?>">
        </div>
        </div>
        <!-- Segunda Linha -->
        <div class="form-row">

        <div class="form-group col-md-3">
            <label for="inscricao_estadual">Inscrição Estadual</label>
            <input type="text" class="form-control" name="inscricao_estadual" id="inscricao_estadual" value="<?=$inscricao_estadual;?>">
        </div>

        <div class="form-group col-md-3">
            <label for="dt_fundacao"> Data de Fundação</label>
            <input type="date" value="<?=$dt_fundacao;?>" name="dt_fundacao" id="dt_fundacao" class="form-control"
                   required data-parsley-required-message="Informe a data de fundação">
        </div>

        <div class="form-group col-md-3">
            <label for="telefone">Telefone</label>
            <input type="text" class="form-control" name="telefone" id="telefone" value="<?=$telefone;?>">
        </div>

        <div class="form-group col-md-3">
            <label for="cnpj">CNPJ</label>
            <input type="text" class="form-control" name="cnpj" id="cnpj" value="<?=$cnpj;?>">
        </div>
        </div>

        <!-- Terceira Linha -->

        <div class="form-row">
        <div class="form-group col-md-3">
            <label for="celular">Celular</label>
            <input type="text" class="form-control" name="celular" id="celular" value="<?=$celular;?>">
        </div>
        <div class="form-group col-md-9">
            <label for="endereco">Endereço</label>
            <input type="text" name="endereco" class="form-control" id="endereco" value="<?=$endereco;?>">
        </div>
        </div>

        <button type="submit" class="btn btn-outline-success">Cadastrar</button>
        <a href="home.php" class="btn btn-outline-danger"> Voltar</a>

        </form>
    </div>


