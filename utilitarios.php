<?php
declare(strict_types=1);

function formatarNome(string $nome): string
{
    $nome = trim($nome);
    $nome = strtolower($nome);
    $nome = ucwords($nome);

    return $nome;
}

function limparCPF(string $cpf): string
{
    $cpf = str_replace(".", "", $cpf);
    $cpf = str_replace("-", "", $cpf);

    return $cpf;
}

function validarCPF(string $cpf): bool
{
    $cpf = limparCPF($cpf);

    if (strlen($cpf) === 11) {
        return true;
    } else {
        return false;
    }
}

function validarEmail(string $email): bool
{
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

function formatarMoeda(float $valor): string
{
    return "R$ " . number_format($valor, 2, ",", ".");
}

function buscarCliente(array $clientes, string $nome): ?array
{
    foreach ($clientes as $cliente) {

        if ($cliente["nome"] === $nome) {
            return $cliente;
        }
    }

    return null;
}

function calcularTotalContratosAtivos(array $clientes): float
{
    $total = 0;

    foreach ($clientes as $cliente) {

        if ($cliente["ativo"] === true) {
            $total = $total + $cliente["contrato"];
        }
    }

    return $total;
}

function calcularMediaContratos(array $clientes): float
{
    $total = 0;

    foreach ($clientes as $cliente) {
        $total = $total + $cliente["contrato"];
    }

    if (count($clientes) > 0) {
        return $total / count($clientes);
    } else {
        return 0;
    }
}

function aplicarReajuste(float &$contrato, float $percentual): void
{
    $contrato = $contrato + ($contrato * $percentual / 100);
}

function contarClientesAtivos(array $clientes): int
{
    $quantidade = 0;

    foreach ($clientes as $cliente) {

        if ($cliente["ativo"] === true) {
            $quantidade++;
        }
    }

    return $quantidade;
}

function maiorContrato(array $clientes): float
{
    $maior = 0;

    foreach ($clientes as $cliente) {

        if ($cliente["contrato"] > $maior) {
            $maior = $cliente["contrato"];
        }
    }

    return $maior;
}

function validarContrato(float $valor): bool
{
    if ($valor > 0) {
        return true;
    } else {
        return false;
    }
}

function cadastrarCliente(
    array &$clientes,
    string $nome,
    string $cpf,
    string $email,
    float $contrato,
    bool $ativo
): bool {

    if ($nome === "") {

        return false;

    } elseif (!validarCPF($cpf)) {

        return false;

    } elseif (!validarEmail($email)) {

        return false;

    } elseif (!validarContrato($contrato)) {

        return false;
    }

    $cliente = [
        "nome" => formatarNome($nome),
        "cpf" => limparCPF($cpf),
        "email" => $email,
        "contrato" => $contrato,
        "ativo" => $ativo
    ];

    $clientes[] = $cliente;

    return true;
}