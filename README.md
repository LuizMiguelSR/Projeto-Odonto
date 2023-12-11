# Projeto-Odonto

Projeto de sistema de gerenciamento de consultas odontológicas, com CRUD de pacientes, consultas e prontuários. E envio de mensagens de aviso via WhatsApp.

Demonstração do projeto Link:
<a href="http://testelaravel11.azurewebsites.net/" target="_blank">http://testelaravel11.azurewebsites.net/</a>

Usuário: admin@email.com

Senha: 1234

## O que foi utilizado

- Paginação e filtros;
- Inclusão de prontuários em PDF;
- Banco de dados relacional;
- Validação de dados;
- Utilização da API do Meta para enviar mensagens via WhatsApp;
- Autenticação de usuários;
- Autenticação de usuários com o Google;
- Envios de emails;
- Plataforma de Produção utilizada na demonstração: Microsoft Azure;

## Instruções

- 1º Realizar a instalação dos pacotes do composer
    
  No Terminal
 
        composer install

- 2º Criar o arquivo .env para determinar as variáveis de ambiente basta copiar o arquivo .env.example e apagar o .example
  - Coloque os dados do banco de dados;
  - Coloque o servidor smtp;
  - Url e token da api do Meta;

- 3º Gerar a chave de configuração da aplicação e preencher o arquivo .env com as configurações do mysql e do smtp de email
  
  No terminal

        php artisan key:generate

- 4º Realizar as migrações das tabelas
  
  No terminal
  
        php artisan migrate

- 5º Realizar as seeders, comando responsável por criar alguns usuários padrões ao sistema
  
  No terminal
  
        php artisan db:seed --class=UsersTableSeeder
- 6º Realizar o link simbólico com o comando

        php artisan storage:link

