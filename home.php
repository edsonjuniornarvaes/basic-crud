<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Cadastro Social</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <link rel='stylesheet' type='text/css' media='screen' href='css/style.css'>
    <link rel='stylesheet' type='text/css' href='css/bootstrap.css'>

    <link href="https://fonts.googleapis.com/css?family=Lato:400,900|Manjari&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
		<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
		<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript">
    
    $(document).ready(function() {
      $('#tb').dataTable({
        dom: 'Bfrtip',
        buttons: [
            'ex1',
            'ex'
        ],

        "language": {
          "EmptyTable": "Nenhum registro encontrado",
          "info": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
          "infoEmpty": "Mostrando 0 até 0 de 0 registros",
          "infoFiltered": "(Filtrados de _MAX_ registros)",
          "infoPostFix": "",
          "infoThousands": ".",
          "lengthMenu": "_MENU_ Resultados por página",
          "loadingRecords": "Carregando...",
          "processing": "Processando...",
          "zeroRecords": "Nenhum registro encontrado",
          "search": "Pesquisar",
          "paginate": {
            "next": "Próximo",
            "previous": "Anterior",
            "first": "Primeiro",
            "last": "Último"
          }
        },

        "pagingType": "full_numbers"
      });
    });
		</script>

    <script src='js/bootstrap.js'></script>
    
</head>


<body>
<main class="container tela">
    <?php

        $op = $pg = "";
        if (isset($_GET["op"])) {
        $op = trim($_GET["op"]);
        }
        if (isset($_GET["pg"])) {
        $pg = trim($_GET["pg"]);
        }


        if (empty($pg)) {
        $pagina = "dashboard.php";
        } else {
        $pagina = $op . "/" . $pg . ".php";
        }

        if (file_exists($pagina)) {
        include $pagina;
        }

    ?>
  </main>

</body>
</html>