Sistema de Cadastro de Lojas
Este projeto permite o cadastro de lojas, incluindo informações como nome, CNPJ, email,
telefone, endereço e logo da loja. As lojas cadastradas são armazenadas em um banco de
dados e podem ser visualizadas na página inicial. O sistema também permite a exclusão de
lojas cadastradas.
Requisitos
- XAMPP (ou similar) instalado para rodar o servidor Apache e o banco de dados MySQL.
- PHP instalado e configurado no ambiente de desenvolvimento.
Instruções de Instalação
1. Baixar o Projeto:
- Faça o download do projeto e extraia a pasta para o diretório htdocs do
XAMPP (geralmente localizado em C:\xampp\htdocs\).
- A estrutura de diretórios do projeto deve ser mantida conforme o download.
2. Configurar o Banco de Dados:
- Abra o phpMyAdmin através do XAMPP ou um banco de dados hospedado, e
crie um banco de dados para o sistema de cadastro de lojas.
- Importe a estrutura do banco de dados fornecida na pasta para criar as tabelas
necessárias.
- Configure o arquivo conexao.php em model para acessar o banco.
3. Configuração do Ambiente:
- Certifique-se de que o servidor Apache e o banco de dados MySQL estão
rodando através do painel de controle do XAMPP.

Como Usar
1. Acessando o Sistema:
- Após a instalação, abra o seu navegador e acesse o sistema através do
endereço: http://localhost/nomedapasta.
- Certifique-se de substituir "nomedapasta" pelo nome da pasta que você extraiu
dentro do diretório htdocs.

2. Cadastro de Lojas:
- Na página inicial, você verá um formulário para cadastrar uma loja. Preencha os
seguintes campos:
- Nome da Loja
- CNPJ
- Email
- Contato
- Endereço (Rua, Número, Bairro, Cidade, Estado, CEP, Complemento)
- Logo da Loja (Escolha uma imagem para representar a loja)
- Após preencher os campos, clique no botão Finalizar para cadastrar a loja no
sistema.
3. Visualização de Lojas:
- A página inicial exibirá todas as lojas cadastradas, listadas com seus respectivos
detalhes.
- Você poderá excluir uma loja clicando no botão Excluir ao lado da loja
desejada.
