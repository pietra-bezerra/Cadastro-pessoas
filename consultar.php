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
        </ul>
    </nav>

    
    <h1>Consulta</h1>
    <?php
    include "conectar.php";

     $sql = "SELECT * FROM cadastro";
    $resultado = mysqli_query($conn, $sql);

if (!$resultado) {
        echo "<div class='mensagem erro'>Erro ao retornar dados: " . mysqli_error($conn) . "</div>";
    } else {
    echo '<table id="tabela">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>ID Cadastro</th>';
        echo '<th>Data Nascimento</th>';
        echo '<th>Telefone</th>';
        echo '<th>CPF</th>';
        echo '<th>RG</th>';
        echo '<th>Nome Mãe</th>';
        echo '<th>Nome Pai</th>';
        echo '<th>Endereço</th>';
        echo '<th>Gmail</th>';
        echo '<th>Naturalidade</th>';
        echo '<th>Estado Civil</th>';
        echo '<th>Cidade</th>';
        echo '<th>Estado</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        // Loop para exibir todos os registros
        while ($linha = mysqli_fetch_assoc($resultado)) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($linha['idcadastro']) . '</td>';
            echo '<td>' . htmlspecialchars($linha['cadastro_nome']) . '</td>';
            echo '<td>' . htmlspecialchars($linha['cadastro_dataNas']) . '</td>';
            echo '<td>' . htmlspecialchars($linha['cadastro_Telefone']) . '</td>';
            echo '<td>' . htmlspecialchars($linha['cadastro_cpf']) . '</td>';
            echo '<td>' . htmlspecialchars($linha['cadastro_rg']) . '</td>';
            echo '<td>' . htmlspecialchars($linha['cadastro_Nome_Mae']) . '</td>';
            echo '<td>' . htmlspecialchars($linha['cadastro_Nome_Pai']) . '</td>';
            echo '<td>' . htmlspecialchars($linha['cadastro_endereco']) . '</td>';
            echo '<td>' . htmlspecialchars($linha['cadastro_email']) . '</td>';
            echo '<td>' . htmlspecialchars($linha['cadastro_naturalidade']) . '</td>';
            echo '<td>' . htmlspecialchars($linha['cadastro_Estado_Civil']) . '</td>';
            echo '<td>' . htmlspecialchars($linha['cadastro_Cidade']) . '</td>';
            echo '<td>' . htmlspecialchars($linha['cadastro_Estado']) . '</td>';
            echo '</tr>';
        }
        
        echo '</tbody>';
        echo '</table>';

        mysqli_free_result($resultado);
    }
    ?>
</body>
</html>