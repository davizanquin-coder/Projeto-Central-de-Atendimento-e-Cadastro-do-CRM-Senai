# Projeto-Central-de-Atendimento-e-Cadastro-do-CRM-Senai:

# CRM Senai

## Sobre o projeto

Este projeto foi desenvolvido para organizar os dados de clientes de uma empresa.

A ideia é criar um sistema simples em PHP para cadastrar, buscar e mostrar informações dos clientes e seus contratos.

Os dados serão armazenados em arrays, sem uso de banco de dados.

## Objetivo

Organizar os dados dos clientes e criar funções para evitar a repetição de código.

## Funcionalidades

O sistema permite:

* Listar os clientes;
* Buscar clientes pelo nome;
* Cadastrar novos clientes;
* Validar nome, CPF, e-mail e contrato;
* Limpar e organizar os dados;
* Formatar valores em real;
* Calcular o total dos contratos ativos;
* Calcular a média dos contratos;
* Aplicar reajuste em contratos;
* Mostrar um relatório final.

## Dados dos clientes

Cada cliente possui:

```php
[
    "nome" => "Nome do cliente",
    "cpf" => "12345678900",
    "email" => "email@email.com",
    "contrato" => 1500.00,
    "ativo" => true
]
```

| Campo    | Tipo   |
| -------- | ------ |
| Nome     | string |
| CPF      | string |
| E-mail   | string |
| Contrato | float  |
| Ativo    | bool   |

## Funcionamento

```text
Início
  ↓
Carregar os clientes
  ↓
Organizar os dados
  ↓
Listar os clientes
  ↓
Buscar ou cadastrar
  ↓
Fazer os cálculos
  ↓
Mostrar o relatório
  ↓
Fim
```

## Testes

Alguns testes que serão realizados:

| Teste                 | Resultado esperado           |
| --------------------- | ---------------------------- |
| Nome com espaços      | Nome organizado              |
| CPF com pontuação     | CPF sem pontuação            |
| CPF inválido          | Retorna `false`              |
| E-mail válido         | Retorna `true`               |
| E-mail inválido       | Retorna `false`              |
| Cliente existente     | Mostra os dados              |
| Cliente inexistente   | Retorna `null`               |
| Contrato igual a zero | Não permite o cadastro       |
| Reajuste de 10%       | Atualiza o valor do contrato |

## Organização da equipe

* **Analista:** organiza os requisitos e os testes.
* **Biblioteca:** cria as funções do sistema.
* **Interface:** faz a tela e integra as funções.
* **Testes e documentação:** registra os testes e organiza o README.

## COMANDOS PRINCIPAIS
Aqui é os comandos mais usados e o que faz cada um deles
```php
trim($nome) = // Esse comando é usado para apagar os espaços em branco invisíveis que ficam no inicio e no final de uma palavra ou frase
strtolower($nome) = // Esse comando deixa todas as letras minúsculas
ucwords($nome) = // Esse comando deixa a primeira letra de cada frase maiúscula
strlen($cpf) = // A função strlen serve para contar o número de letras (caracteres) que existem em um texto.
filter_var($email) = // Serve para validar ou limpar dados no PHP, como e-mails e URLs.
number_format($valor) = // Serve para formatar números com milhares e decimais, definindo o número de casas e os separadores.
count($clientes) serve para contar o número de elementos em um array ou propriedades de um objeto.
void = // Serve para indicar que uma função não retorna nenhum valor.