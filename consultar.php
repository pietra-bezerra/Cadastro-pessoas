<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta</title>
     <link rel="stylesheet" href="style.css">
     <style>
        /* Estilos específicos para a página de consulta */
body.consulta-page {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: flex-start;
    min-height: 100vh;
}

/* Container centralizado para a tabela */
.tabela-container {
    width: 100%;
    max-width: 1300px;
    overflow-x: auto;
    margin: 20px 0;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    background-color: white;
}

/* Tabela centralizada */
table {
    width: 100%;
    border-collapse: collapse;
    background-color: white;
    border-radius: 5px;
    overflow: hidden;
    margin: 0 auto;
}

/* Cabeçalho da tabela */
thead {
    background: #2c3e50;
    color: white;
}

/* Células da tabela */
th, td {
    padding: 14px 16px;
    text-align: center;
    border-bottom: 1px solid #e0e0e0;
    font-size: 14px;
}

/* Células do cabeçalho */
th {
    font-weight: 600;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    font-size: 13px;
}


tbody tr:hover {
    background-color: #f8f9fa;
    transform: translateY(-2px);
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

tbody tr:nth-child(even) {
    background-color: #f8f9fa;
}

tbody tr:nth-child(odd) {
    background-color: white;
}

/* Título da página de consulta */
.consulta-title {
    text-align: center;
    color: #2c3e50;
    margin: 25px 0;
    padding-bottom: 15px;
    border-bottom: 3px solid #3498db;
    width: 100%;
    max-width: 1300px;
}

/* Responsividade para tabela */
@media (max-width: 768px) {
    .tabela-container {
        border-radius: 5px;
        margin: 15px 0;
    }
    
    th, td {
        padding: 10px 12px;
        font-size: 13px;
    }
    
    th {
        font-size: 12px;
        padding: 12px 8px;
    }
    
    /* Para telas muito pequenas, ajusta a navegação */
    nav ul {
        flex-wrap: wrap;
        justify-content: center;
    }
    
    nav li {
        margin: 5px 8px;
    }
}
     </style>
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

     $sql = "SELECT * FROM cadastro";
    $resultado = mysqli_query($conn, $sql);

if (!$resultado) {
        echo "Erro ao retornar dados: " . mysqli_error($conn) ;
    } else {
        echo '<div class="tabela-container">';
    echo '<table>';
        echo '<thead>';
        echo '<tr>';
        echo '<th>ID Cadastro</th>';
        echo '<th>Nome</th>';
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
        echo '</div>';

        mysqli_free_result($resultado);
    }
    ?>
</body>
</html>