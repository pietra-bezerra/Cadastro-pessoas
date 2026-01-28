<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
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

    <h1>Cadastro</h1>

    <form method="post">

        <label>Nome:</label>
        <input type="text" name="nome">
        <br>

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

        $sql = "INSERT INTO cadastro (
          cadastro_nome,
          cadastro_dataNas,
          cadastro_Telefone,
          cadastro_cpf,
          cadastro_rg,
          cadastro_Nome_Mae,
          cadastro_Nome_Pai,
          cadastro_endereco,
          cadastro_email,
          cadastro_naturalidade,
          cadastro_Estado_Civil,
          cadastro_Cidade,
          cadastro_Estado
        ) VALUES (
            '$nome', 
            '$dt',
            '$tl',
            '$cpf', 
            '$rg',
            '$m',
            '$p',
            '$ed',
            '$gm',
            '$nt',
            '$esCi',
            '$ci',
            '$et')";

        if (mysqli_query($conn, $sql)) {
            echo "Usuário cadastrado com sucesso";
        } else {
            echo "erro" . $sql . "<br>" . mysqli_error($conn);
        }


        mysqli_close($conn);
    }
    ?>
</body>

</html>