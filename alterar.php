<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar</title>
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
    <h1>Alterar</h1>
    <form method="post">

    <label>Selecione o Nome</label>
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


        <label>Digite o Nome do cadastro</label>
        <input type="text" name='nome'>
        

        <label>Data Nascimento:</label>
        <input type="date" name="data">
        <br>

        <label>Telefone:</label>
        <input type="text" name="tele">
        <br>

        <label>CPF:</label>
        <input type="text" name="cpf">
        <br>

        <label>RG:</label>
        <input type="text" name="rg">
        <br>

        <label>Nome Mãe:</label>
        <input type="text" name="mae">
        <br>

        <label>Nome Pai:</label>
        <input type="text" name="pai">
        <br>

        <label>Endereço:</label>
        <input type="text" name="ende">
        <br>

        <label>Email:</label>
        <input type="email" name="gmail">
        <br>

        <label>Naturalidade:</label>
        <input type="text" name="natu">
        <br>

        <label>Estado Civil:</label>
        <input type="text" name="estaCiv">
        <br>

        <label>Cidade:</label>
        <input type="text" name="cid">
        <br>

        <label>Estado:</label>
        <input type="text" name="esta">
        <br>

        <input type="submit" value="Enviar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $dt = $_POST['data'];
        $tl = $_POST['tele'];
        $cpf = $_POST['cpf'];
        $rg = $_POST['rg'];
        $m = $_POST['mae'];
        $p = $_POST['pai'];
        $ed = $_POST['ende'];
        $gm = $_POST['gmail'];
        $nt = $_POST['natu'];
        $esCi = $_POST['estaCiv'];
        $ci = $_POST['cid'];
        $et = $_POST['esta'];

       include "conectar.php";

        if (!$conn) {
            echo "mensagem erro" . mysqli_connect_error();
            die();
        }

       $sql = " UPDATE cadastro
        SET
            cadastro_nome ='$nome',
            cadastro_dataNas ='$dt',
            cadastro_Telefone = '$tl',
            cadastro_cpf ='$cpf',
            cadastro_rg ='$rg',
            cadastro_Nome_Mae ='$m',
            cadastro_Nome_Pai = '$p',
            cadastro_endereco = '$ed',
            cadastro_email = '$gm',
            cadastro_naturalidade = '$nt',
            cadastro_Estado_Civil ='$esCi',
            cadastro_Cidade ='$ci',
            cadastro_Estado ='$et'

         WHERE idcadastro = '$id'";


        if (mysqli_query($conn, $sql)) {
            echo "Usuário alterado com sucesso";
        } else {
            echo "erro" . $sql . "<br>" . mysqli_error($conn);
        }


        mysqli_close($conn);
    }
    ?>
</body>
</html>