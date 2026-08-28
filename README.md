# Central de Atendimento e Cadastro do CRM Senai

## Sobre o projeto

Projeto desenvolvido em **PHP** para organizar dados de clientes e contratos de uma empresa.

O sistema utiliza **arrays e funções reutilizáveis**, sem banco de dados ou autenticação.

## Objetivo

Criar uma aplicação capaz de cadastrar, buscar, organizar e validar clientes, além de realizar cálculos dos contratos e gerar um relatório final.

## Requisitos Funcionais

O sistema deve:

1. **Listar clientes** com nome, CPF, e-mail, contrato e situação.
2. **Buscar clientes pelo nome** e informar quando não forem encontrados.
3. **Cadastrar novos clientes**, validando seus dados.
4. **Limpar dados**, removendo espaços desnecessários e pontuação do CPF.
5. **Formatar dados**, organizando nomes e valores em moeda brasileira.
6. **Calcular o total dos contratos ativos**.
7. **Calcular a média dos contratos**.
8. **Aplicar reajuste percentual** em um contrato usando passagem por referência.
9. **Gerar um relatório final** com total de clientes, clientes ativos e maior contrato.

## Requisitos Não Funcionais

O sistema deve:

* Ser organizado em arquivos e funções com responsabilidades claras.
* Evitar repetição de código utilizando o princípio **DRY**.
* Utilizar `declare(strict_types=1);`.
* Utilizar parâmetros tipados e tipos de retorno.
* Separar o processamento dos dados da apresentação HTML.
* Validar e tratar entradas inválidas.
* Possuir código simples e fácil de manter.
* Possuir documentação no `README.md`.
* Possuir testes para verificar o funcionamento das funções.

## Estrutura do projeto

```text
projeto_crm/
│
├── index.php
├── utilitarios.php
├── README.md
│
└── testes/
    └── testes.php
```

### `utilitarios.php`

Contém as funções responsáveis pelo processamento dos dados:

* `formatarNome()`
* `limparCPF()`
* `validarCPF()`
* `validarEmail()`
* `formatarMoeda()`
* `buscarCliente()`
* `calcularTotalContratosAtivos()`
* `calcularMediaContratos()`
* `aplicarReajuste()`
* `contarClientesAtivos()`
* `maiorContrato()`
* `validarContrato()`
* `cadastrarCliente()`

### `index.php`

É a tela principal da aplicação. Importa `utilitarios.php` usando `require_once` e apresenta os formulários, clientes, cálculos e relatórios.

### `testes/testes.php`

Arquivo utilizado para testar as funções do sistema com diferentes situações.

## Dados dos clientes

Cada cliente possui:

| Campo    | Tipo     |
| -------- | -------- |
| Nome     | `string` |
| CPF      | `string` |
| E-mail   | `string` |
| Contrato | `float`  |
| Ativo    | `bool`   |

## Requisitos técnicos utilizados

O projeto utiliza:

* `declare(strict_types=1);`
* Funções com parâmetros e retornos tipados;
* `foreach`;
* `count()`;
* `strlen()`;
* `str_replace()`;
* `trim()`;
* `number_format()`;
* `if / elseif / else`;
* Retorno `bool`;
* Retorno `?array`;
* Retorno `void`;
* Passagem por referência com `&`;
* `require_once`.

## Testes

Foram realizados ou previstos testes para:

| Teste                 | Resultado esperado  |
| --------------------- | ------------------- |
| Nome com espaços      | Nome organizado     |
| CPF com pontuação     | CPF limpo           |
| CPF válido            | `true`              |
| CPF inválido          | `false`             |
| E-mail válido         | `true`              |
| E-mail inválido       | `false`             |
| Cliente existente     | Dados encontrados   |
| Cliente inexistente   | Retorna `null`      |
| Campo vazio           | Cadastro recusado   |
| Contrato igual a zero | Cadastro recusado   |
| Reajuste de 10%       | Contrato atualizado |

## Princípio DRY

O princípio **DRY (Don't Repeat Yourself)** é utilizado para evitar a repetição de código.

As tarefas são separadas em funções específicas. Dessa forma, uma mesma função pode ser utilizada em diferentes partes do sistema sem precisar escrever novamente a mesma lógica.

## Fluxo do sistema

```text
Início
  ↓
Carregar clientes
  ↓
Validar e organizar dados
  ↓
Listar clientes
  ↓
Buscar ou cadastrar
  ↓
Calcular contratos
  ↓
Gerar relatório
  ↓
Fim
```

## Resultado

O projeto reúne **cadastro, busca, validação, tratamento de dados, cálculos e relatório** em uma aplicação PHP organizada e reutilizável, atendendo aos requisitos propostos para o **CRM Senai**.
