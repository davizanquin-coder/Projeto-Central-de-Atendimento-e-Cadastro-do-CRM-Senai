<?php
declare(strict_types=1);

session_start();

require_once "utilitarios.php";

if (!isset($_SESSION["clientes"])) {

    $_SESSION["clientes"] = [
        [
            "nome" => "Ana Clara Silva",
            "cpf" => "12345678900",
            "email" => "ana.clara@email.com",
            "contrato" => 1500.00,
            "ativo" => true
        ],
        [
            "nome" => "Carlos Souza",
            "cpf" => "98765432100",
            "email" => "carlos.souza@email.com",
            "contrato" => 850.50,
            "ativo" => false
        ],
        [
            "nome" => "Mariana Oliveira",
            "cpf" => "45678912300",
            "email" => "mariana@email.com",
            "contrato" => 2200.00,
            "ativo" => true
        ],
        [
            "nome" => "Rafael Santos",
            "cpf" => "32165498700",
            "email" => "rafael@email.com",
            "contrato" => 700.00,
            "ativo" => false
        ]
    ];
}

$clientes = &$_SESSION["clientes"];

$mensagemCadastro = "";

if (isset($_POST["cadastrar"])) {

    $nome = $_POST["nome"] ?? "";
    $cpf = $_POST["cpf"] ?? "";
    $email = $_POST["email"] ?? "";
    $contrato = (float) ($_POST["contrato"] ?? 0);

    $resultado = cadastrarCliente(
        $clientes,
        $nome,
        $cpf,
        $email,
        $contrato,
        true
    );

    if ($resultado === true) {
        $mensagemCadastro = "Cliente cadastrado com sucesso.";
    } else {
        $mensagemCadastro = "Preencha todos os campos corretamente.";
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <title>Central de Atendimento e Cadastro do CRM Senai</title>

</head>

<body>

    <h1>Central de Atendimento e Cadastro do CRM Senai</h1>

    <h2>Cadastro de Cliente</h2>

    <form method="post">

        <label>Nome:</label>
        <input type="text" name="nome">

        <br><br>

        <label>CPF:</label>
        <input type="text" name="cpf">

        <br><br>

        <label>E-mail:</label>
        <input type="text" name="email">

        <br><br>

        <label>Valor do contrato:</label>
        <input type="number" step="0.01" name="contrato">

        <br><br>

        <button type="submit" name="cadastrar">
            Cadastrar
        </button>

    </form>

    <?php

    if ($mensagemCadastro !== "") {
        echo "<p>" . $mensagemCadastro . "</p>";
    }

    ?>

    <h2>Clientes</h2>

    <table border="1">

        <tr>

            <th>Nome</th>
            <th>CPF</th>
            <th>E-mail</th>
            <th>Contrato</th>
            <th>Situação</th>

        </tr>

        <?php foreach ($clientes as $cliente): ?>

            <tr>

                <td><?= $cliente["nome"] ?></td>

                <td><?= $cliente["cpf"] ?></td>

                <td><?= $cliente["email"] ?></td>

                <td>
                    <?= formatarMoeda($cliente["contrato"]) ?>
                </td>

                <td>

                    <?php

                    if ($cliente["ativo"] === true) {
                        echo "Ativo";
                    } else {
                        echo "Inativo";
                    }

                    ?>

                </td>

            </tr>

        <?php endforeach; ?>

    </table>

    <h2>Resumo Financeiro</h2>

    <p>
        Total dos contratos ativos:
        <?= formatarMoeda(
            calcularTotalContratosAtivos($clientes)
        ) ?>
    </p>

    <p>
        Média dos contratos:
        <?= formatarMoeda(
            calcularMediaContratos($clientes)
        ) ?>
    </p>

    <h2>Relatório Final</h2>

    <p>
        Total de clientes:
        <?= count($clientes) ?>
    </p>

    <p>
        Clientes ativos:
        <?= contarClientesAtivos($clientes) ?>
    </p>

    <p>
        Maior contrato:
        <?= formatarMoeda(
            maiorContrato($clientes)
        ) ?>
    </p>

    <h2>Buscar Cliente</h2>

    <form method="get">

        <label>Nome do cliente:</label>

        <input type="text" name="nomeBusca">

        <button type="submit">
            Buscar
        </button>

    </form>

    <?php

    if (isset($_GET["nomeBusca"])) {

        $nomeBusca = $_GET["nomeBusca"];

        $clienteEncontrado = buscarCliente(
            $clientes,
            $nomeBusca
        );

        if ($clienteEncontrado !== null) {

            echo "<p>";

            echo "Nome: "
                . $clienteEncontrado["nome"]
                . "<br>";

            echo "CPF: "
                . $clienteEncontrado["cpf"]
                . "<br>";

            echo "E-mail: "
                . $clienteEncontrado["email"]
                . "<br>";

            echo "Contrato: "
                . formatarMoeda(
                    $clienteEncontrado["contrato"]
                );

            echo "</p>";

        } else {

            echo "<p>Cliente não encontrado.</p>";
        }
    }

    ?>

    <h2>Reajuste de Contrato</h2>

    <?php

    $contratoTeste = 1000.00;

    aplicarReajuste(
        $contratoTeste,
        10
    );

    ?>

    <p>
        Exemplo de reajuste de 10%:
        <?= formatarMoeda($contratoTeste) ?>
    </p>

</body>

</html>