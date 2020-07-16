<?php
include('./lib/database/register-animal.php');
include('./lib/database/list-animals.php');
include('./lib/database/delete-animals.php');
include('./lib/database/edit-animal.php');

date_default_timezone_set('America/Sao_Paulo');

function calcular_idade($data)
{
    #$data = date("Y-m-d", strtotime($data));
    #$data->format('Y-m-d H:i:s');
    $dn = new DateTime($data);
    $atual = new DateTime();

    $idade = $atual->diff($dn);

    return $idade->y;
}

$nome_animal = filter_input(INPUT_POST, 'nome_animal', FILTER_SANITIZE_STRING);
$proprietario = filter_input(INPUT_POST, 'proprietario', FILTER_SANITIZE_STRING);
$cor_animal = filter_input(INPUT_POST, 'cor_animal', FILTER_SANITIZE_STRING);
$date_nasc = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING);
$sexo_animal = filter_input(INPUT_POST, 'sexo_animal', FILTER_SANITIZE_STRING);
$porte_animal = filter_input(INPUT_POST, 'porte_animal', FILTER_SANITIZE_STRING);
$pelagem_animal = filter_input(INPUT_POST, 'pelagem_animal', FILTER_SANITIZE_STRING);

$nome_animal1 = filter_input(INPUT_POST, 'nome_animal1', FILTER_SANITIZE_STRING);
$proprietario1 = filter_input(INPUT_POST, 'proprietario1', FILTER_SANITIZE_STRING);
$cor_animal1 = filter_input(INPUT_POST, 'cor_animal1', FILTER_SANITIZE_STRING);
$date_nasc1 = filter_input(INPUT_POST, 'date1', FILTER_SANITIZE_STRING);
$sexo_animal1 = filter_input(INPUT_POST, 'sexo_animal1', FILTER_SANITIZE_STRING);
$porte_animal1 = filter_input(INPUT_POST, 'porte_animal1', FILTER_SANITIZE_STRING);
$pelagem_animal1 = filter_input(INPUT_POST, 'pelagem_animal1', FILTER_SANITIZE_STRING);
$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

$final = calcular_idade($date_nasc);
/*INSERE OS DADOS*/
if (isset($_POST['bt-enviar'])) {
    $result = insert($nome_animal, $proprietario, $cor_animal, $final, $sexo_animal, $porte_animal, $pelagem_animal);
    if ($result < 1) {
        echo '<div ">Erro!<br> insira novamente os dados para o cadastro</div>';
    } else {
        echo '<div ">Pet inserido com sucesso!<div>';
    }
}
/*ATUALIZA OS DADOS */
if (isset($_POST['bt-editar'])) {
    $result = update($nome_animal1, $proprietario1, $cor_animal1, $date_nasc1, $sexo_animal1, $porte_animal1, $pelagem_animal1, $id);
    if ($result < 1) {
        echo '<div ">Erro!<br> insira novamente os dados para atualizar o cadastro</div>';
    } else {
        echo '<div ">Pet atualizado com sucesso!<div>';
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="css/index.css">

    <title>Registro de Animais</title>

</head>

<body>
    <header>
        <h1>Registro de Animais</h1>
    </header>

    <form action="" method="post">
        <input type="text" placeholder="Nome do Animal" name="nome_animal">

        <input type="text" placeholder="Nome do Proprietário" name="proprietario">

        <input type="text" name="cor_animal" id="cor_animal" placeholder="Cor do Animal">

        <input id="date" type="date" name="date">

        <select name="sexo_animal" id="sexo_animal">
            <option value="" disabled selected>Sexo do Animal</option>
            <option value="1">Macho</option>
            <option value="2">Fêmea</option>
        </select>

        <select name="porte_animal" id="porte_animal">
            <option value="" disabled selected>Porte do Animal</option>
            <option value="1">Pequeno</option>
            <option value="2">Médio</option>
            <option value="3">Grande</option>
        </select>

        <select name="pelagem_animal" id="pelagem_animal">
            <option value="" disabled selected>Pelagem do Animal</option>
            <option value="1">Curta</option>
            <option value="2">Média</option>
            <option value="3">Grande</option>
        </select>

        <input type="submit" value="Enviar" name="bt-enviar">
    </form>
    <br><br>
    <table class="table table-dark" style="padding-top: 25px;">
        <thead>
            <tr>
                <th scope="col">Nome do Animal</th>
                <th scope="col">Nome do Proprietário</th>
                <th scope="col">Cor do Animal</th>
                <th scope="col">Idade do Animal</th>
                <th scope="col">Sexo do Animal</th>
                <th scope="col">Porte do Animal</th>
                <th scope="col">Pelagem do Animal</th>
                <th scope="col">Editar</th>
                <th scope=col>Deletar</th>
            </tr>
        </thead>
        <tbody>
            <form method="post">
                <tr>
                    <?php
                        $result = select();
                        while ($row = $result->fetch_assoc()) {
                    ?>
                        <th scope="row"><input type="text" name="nome_animal1" value="<?php echo $row["nome_animal"] ?>"></th>
                        <td><input type="text" name="proprietario1" value="<?php echo $row["proprietario"] ?>"></td>
                        <td><input type="text" name="cor_animal1" value="<?php echo $row["cor_animal"] ?>"></td>
                        <td><input type="text" name="date1" value="<?php echo $row["idade"] ?>"></td>
                        <td>
                            <select name="sexo_animal" id="sexo_animal1">
                                <option value="<?php echo $row["sexo_animal"] ?>"><?php echo $row["sexo_animal"] == 1 ? 'macho' : 'Femea' ?></option>
                                <option value="1">Macho</option>
                                <option value="2">Fêmea</option>
                            </select>
                        </td>
                        <td>
                            <select name="porte_animal1" id="porte_animal">
                                <option value="<?php echo $row["porte_animal"] ?>">
                                    <?php
                                    if ($row["porte_animal"] == 1) {
                                        echo 'Pequeno';
                                    } else if ($row["porte_animal"] == 2) {
                                        echo 'Médio';
                                    } else {
                                        echo 'Grande';
                                    }
                                    ?>
                                </option>
                                <option value="1">Pequeno</option>
                                <option value="2">Médio</option>
                                <option value="3">Grande</option>
                            </select>
                        </td>

                        <td>
                            <select name="pelagem_animal1" id="pelagem_animal">
                                <option value="<?php echo $row["pelagem_animal"] ?>">
                                    <?php
                                    if ($row["pelagem_animal"] == 1) {
                                        echo 'Curta';
                                    } else if ($row["pelagem_animal"] == 2) {
                                        echo 'Média';
                                    } else {
                                        echo 'Grande';
                                    }
                                    ?>
                                </option>
                                <option value="1">Curta</option>
                                <option value="2">Média</option>
                                <option value="3">Grande</option>
                            </select>
                        </td>
                        <td><input type="submit" value="Editar" name="bt-editar"></td>
                        <td><?php echo "<a href='lib/database/delete-animals.php?id=" . $row['id'] . "'>Deletar</a>" ?></td>
                        <td><input type="hidden" name="id" value="<?php echo $row["id"] ?>"></td>
                </tr>
            </form>
                    <?php } ?>
        </tbody>
    </table>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
</body>

</html>