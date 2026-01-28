<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir</title>
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

    
    <h1>Excluir</h1>
    <form method="post">
        <label>Digite o nome do Cadastro:</label>
        <select name="id">
            <option value="">Selecione um Nome</option>
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
        </select>

        <input type="submit" value="Excluir">
    </form>

    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $id = $_POST['id'];

        include "conectar.php";

        if (!$conn) {
            echo "mensagem erro" . mysqli_connect_error();
            die();
        }

        $sql = "DELETE FROM cadastro WHERE idcadastro = '$id' ";

        if (mysqli_query($conn, $sql)) {
            echo "Cadastrado excluido com sucesso";
        } else {
            echo "erro" . $sql . "<br>" . mysqli_error($conn);
        }


        mysqli_close($conn);
    }
    ?>
</body>
</html>


