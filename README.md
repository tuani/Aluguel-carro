# Sistema de Gerenciamento de Aluguel de Veículos

Este é um sistema simples para gerenciar o aluguel de veículos, desenvolvido utilizando PHP e MySQL, configurado para funcionar com XAMPP.

## Configuração do Ambiente

### Pré-requisitos
- XAMPP instalado no seu ambiente de desenvolvimento.
- MySQL configurado e rodando no XAMPP.

### Configuração do Banco de Dados
1. Importe o arquivo `prova1.sql` para criar o banco de dados e as tabelas necessárias.

### Configuração do Arquivo `config.php`
- O arquivo `config.php` contém as configurações de conexão com o banco de dados. Certifique-se de que as variáveis `$hostName`, `$dataBase`, `$user` e `$password` estejam corretamente configuradas para o seu ambiente.

## Funcionalidades Principais

### Cadastro de Clientes

- **Arquivo:** `cliente.php`
- Permite cadastrar novos clientes. Os dados são inseridos na tabela `cliente` do banco de dados.

### Cadastro de Veículos

- **Arquivo:** `veiculo.php`
- Permite cadastrar novos veículos. Os dados são inseridos na tabela `veiculo` do banco de dados. Se um veículo já existir, apenas atualiza a quantidade em estoque.

### Registro de Aluguel

- **Arquivo:** `aluga.php`
- Registra um novo aluguel de veículo associando um cliente a um veículo disponível. Atualiza o estoque do veículo após o registro do aluguel.

### Relatório de Aluguéis

- **Arquivo:** `veiculolst.php`
- Gera um relatório de todos os aluguéis registrados, mostrando o nome do cliente, o modelo do veículo e a data de locação.

## Instruções de Uso

1. **Clone o Repositório:**
   - Clone este repositório dentro do diretório `htdocs` do seu XAMPP.

2. **Importe o Banco de Dados:**
   - Importe o banco de dados utilizando o arquivo `prova1.sql`.

3. **Inicie os módulos Apache e MySQL no XAMPP**

4. **Configure o Arquivo `config.php`:**
   - Abra o arquivo `config.php` e ajuste as variáveis de conexão (`$hostName`, `$dataBase`, `$user` e `$password`) conforme necessário para o seu ambiente.

5. **Acesse o Sistema:**
   - Abra seu navegador e digite o seguinte endereço na barra de endereços:
     ```
     http://localhost/nome-do-seu-projeto/index.html
     ```
     Substitua `nome-do-seu-projeto` pelo nome do diretório onde você clonou o repositório dentro da pasta `htdocs` do XAMPP.

6. **Navegue pelas Funcionalidades:**
   - Após acessar o sistema, utilize os links fornecidos no arquivo `index.html` para acessar as funcionalidades específicas (como `cliente.php`, `veiculo.php`, `aluga.php`, `veiculolst.php`).


