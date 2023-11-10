# Projeto-Odonto
Projeto de sistema de gerenciamento de consultas odontológicas

## Instruções

- 1º Realizar a instalação dos pacotes do composer
    
    No Terminal
 
        composer install --ignore-platform-req=ext-zip

- 2º Criar o arquivo .env para determinar as variáveis de ambiente basta copiar o arquivo .env.example e apagar o .example

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