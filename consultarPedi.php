<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <nav>
        <ul>
            <li><a href="Cadastro.php">Cadastro</a></li>
            <li><a href="alterar.php">Alterar</a></li>
            <li><a href="consultar.php">Consultar</a></li>
            <li><a href="excluir.php">Excluir</a></li>
            <li><a href="pedidos.php">Pedidos</a></li>
            <li><a href="consultarPedi.php">Consultar Pedidos</a></li>
        </ul>
    </nav>


    <h1>Consulta</h1>
    <?php
    include "conectar.php";

    $sql = "SELECT 
    pedidos.idpedidos,
    cadastro.cadastro_nome, 
    pedidos.pedi_dataPedi, 
    pedidos.pedi_produto,
    pedidos.pedi_formaPag,
    pedidos.pedi_DateEntrega,
    pedidos.pedi_valor,
	pedidos.pedi_endereçoEntre
    
FROM pedidos
INNER JOIN cadastro ON pedidos.cadastro_idcadastro = cadastro.idcadastro;";

    $resultado = mysqli_query($conn, $sql);

    if (!$resultado) {
        echo "<div class='mensagem erro'>Erro ao retornar dados: " . mysqli_error($conn) . "</div>";
    } else {
        echo '<table id="tabela">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>ID Pedido</th>';
        echo '<th>Nome Cadastrado</th>';
        echo '<th>Data do Produto</th>';
        echo '<th>Pedido</th>';
        echo '<th>Forma de Pagamento</th>';
        echo '<th>Data de Entrega</th>';
        echo '<th>Valor</th>';
        echo '<th>Endereço de Entrega</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        // Loop para exibir todos os registros
        while ($linha = mysqli_fetch_assoc($resultado)) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($linha['idpedidos']) . '</td>';
            echo '<td>' . htmlspecialchars($linha['cadastro_nome']) . '</td>';
            echo '<td>' . htmlspecialchars($linha['pedi_dataPedi']) . '</td>';
            echo '<td>' . htmlspecialchars($linha['pedi_produto']) . '</td>';
            echo '<td>' . htmlspecialchars($linha['pedi_formaPag']) . '</td>';
            echo '<td>' . htmlspecialchars($linha['pedi_DateEntrega']) . '</td>';
            echo '<td>' . htmlspecialchars($linha['pedi_valor']) . '</td>';
            echo '<td>' . htmlspecialchars($linha['pedi_endereçoEntre']) . '</td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';

        mysqli_free_result($resultado);
    }
    ?>
</body>

</html>