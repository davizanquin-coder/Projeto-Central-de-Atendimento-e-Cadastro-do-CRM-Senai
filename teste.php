<?php
declare(strict_types=1);

require_once "utilitarios.php";

echo "<h1>Testes da biblioteca</h1>";

echo "<h2>Teste 1 - Formatação do nome</h2>";
echo formatarNome("  ANA CLARA SILVA  ");

echo "<br><br>";

echo "<h2>Teste 2 - Limpeza do CPF</h2>";
echo limparCPF("123.456.789-00");

echo "<br><br>";

echo "<h2>Teste 3 - CPF válido</h2>";
var_dump(validarCPF("123.456.789-00"));

echo "<br><br>";

echo "<h2>Teste 4 - CPF inválido</h2>";
var_dump(validarCPF("123.456"));

echo "<br><br>";

echo "<h2>Teste 5 - E-mail válido</h2>";
var_dump(validarEmail("ana@email.com"));

echo "<br><br>";

echo "<h2>Teste 6 - E-mail inválido</h2>";
var_dump(validarEmail("anaemail.com"));

echo "<br><br>";

echo "<h2>Teste 7 - Formatação de moeda</h2>";
echo formatarMoeda(1500.50);

echo "<br><br>";

$clientes = [
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

echo "<h2>Teste 8 - Buscar cliente</h2>";
var_dump(buscarCliente($clientes, "Mariana Oliveira"));

echo "<br><br>";

echo "<h2>Teste 9 - Cliente inexistente</h2>";
var_dump(buscarCliente($clientes, "João"));

echo "<br><br>";

echo "<h2>Teste 10 - Total dos contratos ativos</h2>";
echo formatarMoeda(
    calcularTotalContratosAtivos($clientes)
);

echo "<br><br>";

echo "<h2>Teste 11 - Média dos contratos</h2>";
echo formatarMoeda(
    calcularMediaContratos($clientes)
);

echo "<br><br>";

echo "<h2>Teste 12 - Quantidade de clientes ativos</h2>";
echo contarClientesAtivos($clientes);

echo "<br><br>";

echo "<h2>Teste 13 - Maior contrato</h2>";
echo formatarMoeda(
    maiorContrato($clientes)
);

echo "<br><br>";

echo "<h2>Teste 14 - Contrato igual a zero</h2>";
var_dump(validarContrato(0));

echo "<br><br>";

echo "<h2>Teste 15 - Reajuste de contrato</h2>";

$contrato = 1000.00;

aplicarReajuste($contrato, 10);

echo formatarMoeda($contrato);

echo "<br><br>";

echo "<h2>Teste 16 - Cadastro de cliente</h2>";

$resultado = cadastrarCliente(
    $clientes,
    "João Oliveira",
    "111.222.333-44",
    "joao@email.com",
    1200.00,
    true
);

var_dump($resultado);

echo "<br><br>";

echo "<h2>Teste 17 - Cadastro com contrato inválido</h2>";

$resultado = cadastrarCliente(
    $clientes,
    "Pedro Silva",
    "111.222.333-44",
    "pedro@email.com",
    0,
    true
);

var_dump($resultado);