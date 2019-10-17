<div class="container" id="listagem">
	<table class="table-bordered table-striped" id="tb">
		<h3>Pessoas Físicas cadastradas</h3>
		<br>
		<thead id="k">
			<tr>
				<td> ID  		</td>
				<td> CPF 		</td>
				<td> Nome 		</td>
				<td> RG 	    </td>
				<td> Sexo       </td>
				<td> Nascimento </td>
				<td> Endereço   </td>
				<td> Celular    </td>
				<td> Telefone   </td>
				<td> Opções     </td>
			</tr>
		</thead>

		<?php
			//conectar no banco
			include "conn/conn.php";
			
			$sql = "SELECT * FROM pessoa_fisica 
					ORDER BY nome";

			$consulta = $conn->prepare($sql);
			$consulta->execute();

			while ( $dados = $consulta->fetch(PDO::FETCH_OBJ))
			{
				//separar os dados
				$id_pessoa     = $dados->id_pessoa;
				$cpf 	       = $dados->cpf;
				$nome          = $dados->nome;
				$rg            = $dados->rg;
				$sexo          = $dados->sexo;
				$dt_nascimento = $dados->dt_nascimento;
				$endereco      = $dados->endereco;
				$celular       = $dados->celular;
				$telefone      = $dados->telefone;


				//formar uma linha da tabela
				echo "<tr>
						<td>$id_pessoa    </td>
						<td>$cpf		  </td>
						<td>$nome         </td>
						<td>$rg           </td>
						<td>$sexo         </td>
						<td>$dt_nascimento</td>
						<td>$endereco     </td>
						<td>$celular      </td>
						<td>$telefone     </td>
						<td>
							<a href='home.php?op=add&pg=fisica&id_pessoa=$id_pessoa' class='btn btn-outline-success'>
							Editar
							</a><br><br>

							<a href=\"javascript:excluir($id_pessoa,'$nome')\" class='btn btn-outline-danger'>
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
	function excluir(id_pessoa,nome) {
		if ( confirm( "Deseja realmente excluir "+nome+" ? ") ) {
			link = "home.php?pg=fisica&op=delete&id_pessoa="+id_pessoa;
			location.href = link;
		}
	}
</script>


