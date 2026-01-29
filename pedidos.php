<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>
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
    <h1>Pedidos</h1>
    <form method="post">
        <label>Selecione o Nome do Comprador</label>
        <select name="id">
            <option value="">Selecione o Nome</option>
            <?php
            include "conectar.php";
            if (isset($conn)) {
                $sqlUsuarios = "SELECT idcadastro, cadastro_nome FROM cadastro ORDER BY cadastro_nome";
                $resU = $conn->query($sqlUsuarios);
                if ($resU) {
                    while ($u = $resU->fetch_assoc()) {
                        $id = $u['idcadastro'];
                        $nome = htmlspecialchars($u['cadastro_nome']);
                        echo "<option value='$id'>$nome</option>";
                    }
                }
            }
            ?>
        </select><br>
        <label>Data que foi feito o pedido</label>
        <input type="date" name="dataFeito">
        <br>
        <label>Produto </label>
        <input type="text" name="produto">
        <br>
        <label>Forma de Pagamento</label>
        <input type="text" name="formaPag">
        <br>
        <label>Data de Entrega</label>
        <input type="date" name="dtEntre">
        <br>
        <label>Valor do Produto</label>
        <input type="text" name="valor">
        <br>
        <label>Endereço a ser entrege</label>
        <input type="text" name="ende">
        <br>
        <input type="submit" value="Cadastrar Pedido">
    </form>

    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $id = $_POST['id'];
        $dataFeito = $_POST['dataFeito'];
        $produto = $_POST['produto'];
        $formaPag = $_POST['formaPag'];
        $dtEntre = $_POST['dtEntre'];
        $valor = $_POST['valor'];
        $ende = $_POST['ende'];

        include "conectar.php";

        if (!$conn) {
            echo "mensagem erro" . mysqli_connect_error();
            die();
        }

        $sql = "INSERT INTO pedidos (cadastro_idcadastro, pedi_dataPedi, pedi_produto, pedi_formaPag, pedi_DateEntrega, pedi_valor, pedi_endereçoEntre) 
                VALUES ('$id', '$dataFeito', '$produto', '$formaPag', '$dtEntre', '$valor', '$ende')";

        if (mysqli_query($conn, $sql)) {
            echo "Pedido cadastrado com sucesso";
        } else {
            echo "Erro ao cadastrar pedido: " . mysqli_error($conn);
        }

        mysqli_close($conn);
    }
    ?>
</body>

</html>