<?php

    include "conn/conn.php";

    $id_pessoa = $cpf = $nome = $rg = $sexo = $dt_nascimento = $endereco = $telefone = $celular = "";

    if ( isset ( $_GET["id_pessoa"] ) ) {
        $id_pessoa = trim ( $_GET["id_pessoa"] );
        
        $sql = "SELECT * FROM pessoa_fisica 
                WHERE id_pessoa = ? 
                LIMIT 1";

        $consulta = $conn->prepare($sql);
        $consulta->bindParam(1, $id_pessoa);
        $consulta->execute();

        $dados = $consulta->fetch(PDO::FETCH_OBJ);

    if ( isset ( $dados->id_pessoa ) ) {

        $id_pessoa       = $dados->id_pessoa;
        $cpf             = $dados->cpf;
        $nome            = $dados->nome;
        $rg              = $dados->rg; 
        $sexo            = $dados->sexo;
        $dt_nascimento   = $dados->dt_nascimento;
        $endereco        = $dados->endereco;
        $telefone        = $dados->telefone;
        $celular         = $dados->celular;

        }
    }
?>


    <input type="hidden" name="id_pessoa" class="form-control" readonly value="<?=$id_pessoa;?>">

    <div class="container" id="formulario">
    <h3>Cadastro de Pessoa Física</h3><br>

    <form name="form1" method="post" action="home.php?op=save&pg=fisica" data-parsley-validate>

         <!-- Primeira Linha -->
        <div class="form-row">
        <input type="hidden" name="id_pessoa" class="form-control" readonly value="<?=$id_pessoa;?>">

        <div class="form-group col-md-12">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome" value="<?=$nome;?>">
        </div>
        </div>
        <!-- Segunda Linha -->
        <div class="form-row">

        <div class="form-group col-md-3">
            <label for="cpf">CPF</label>
            <input type="text" class="form-control" name="cpf" id="cpf" value="<?=$cpf;?>">
        </div>

        <div class="form-group col-md-3">
            <label for="rg">RG</label>
            <input type="text" class="form-control" name="rg" id="rg" value="<?=$rg;?>">
        </div>

        <div class="form-group col-md-3">
            <label for="sexo">Sexo</label>
            <select id="sexo" name="sexo" class="form-control " required data-parsley-required-message= "Selecione uma opção" 
                    value="<?=$sexo;?>">
                <option value="">Selecione</option>
                <option value="M">Masculino</option>
                <option value="F">Feminino</option>
            </select>
        </div>

        <div class="form-group col-md-3">
            <label for="dt_nascimento"> Data de Nascimento</label>
            <input type="date" value="<?=$dt_nascimento;?>" name="dt_nascimento" id="dt_nascimento" class="form-control"
                   required data-parsley-required-message="Informe a data de nascimento">
        </div>

        <div class="form-group col-md-8">
            <label for="endereco">Endereço</label>
            <input type="text" name="endereco" class="form-control" id="endereco" value="<?=$endereco;?>">
        </div>
        
        <div class="form-group col-md-2">
            <label for="telefone">Telefone</label>
            <input type="text" class="form-control" name="telefone" id="telefone" value="<?=$telefone;?>">
        </div>
        <div class="form-group col-md-2">
            <label for="celular">Celular</label>
            <input type="text" class="form-control" name="celular" id="celular" value="<?=$celular;?>">
        </div>
        </div>

        <button type="submit" class="btn btn-outline-success">Cadastrar</button>
        <a href="home.php" class="btn btn-outline-danger"> Voltar</a>

        </form>
    </div>


