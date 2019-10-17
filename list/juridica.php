<div class="container" id="listagem">
    <table class="table-bordered table-striped" id="tb">
        <h3>Pessoas Jurídicas cadastradas</h3>
        <br>
            <thead id="k">
                <tr>
                    <td> ID  		        </td>
                    <td> Razão Social 		</td>
                    <td> Nome Fantasia 		</td>
                    <td> Endereço           </td>
                    <td> CNPJ               </td>
                    <td> Telefone           </td>
                    <td> Celular            </td>
                    <td> Opções             </td>
                </tr>
            </thead>

        <?php

            include "conn/conn.php";
            
            $sql = "SELECT * FROM pessoa_juridica 
                    ORDER BY nome_fantasia";

            $consulta = $conn->prepare($sql);
            $consulta->execute();

            while ( $dados = $consulta->fetch(PDO::FETCH_OBJ))
            {
                $id_pessoa           = $dados->id_pessoa;
                $razao_social 	     = $dados->razao_social;
                $nome_fantasia       = $dados->nome_fantasia;
                $endereco            = $dados->endereco;
                $cnpj                = $dados->cnpj;
                $telefone            = $dados->telefone;
                $celular             = $dados->celular;


                echo "<tr>
                        <td>$id_pessoa     </td>
                        <td>$razao_social  </td>
                        <td>$nome_fantasia </td>
                        <td>$endereco      </td>
                        <td>$cnpj          </td>
                        <td>$telefone      </td>
                        <td>$celular       </td>
                        <td>
                            <a href='home.php?op=add&pg=juridica&id_pessoa=$id_pessoa' class='btn btn-outline-success'>
                            Editar
                            </a><br><br>

                            <a href=\"javascript:excluir($id_pessoa, '$nome_fantasia')\" class='btn btn-outline-danger'>
                            Excluir
                            </a>
                        </td>
                    </tr>";
            }
        ?>

    </table>
    <br>
    <a href="home.php" class="btn btn-outline-danger"><i class="fa fa-chevron-left"> Voltar</a>
</div>

<script type="text/javascript">

	function excluir(id_pessoa,nome_fantasia) {
		if ( confirm( "Deseja realmente excluir "+nome_fantasia+" ? ") ) {
			link = "home.php?pg=juridica&op=delete&id_pessoa="+id_pessoa;
			location.href = link;
		}
	}
</script>

