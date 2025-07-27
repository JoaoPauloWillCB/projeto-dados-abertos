PASSO A PASSO PARA EXECUTAR O PROJETO

1. Clonar o Repositório
2. Subir os Containers com Docker
  -- 'docker compose up -d --build'
3. Acessar o Container do Laravel
  -- 'docker exec -it laravel_app bash'
4. Instalar dependencias 
  -- 'composer install'
5. Modificar o nome do arquivo .env.example para '.env'
6. Editar o .env para apontar para o banco MySQL do container
  -- DB_CONNECTION=mysql
    DB_HOST=mysql
    DB_PORT=3306
    DB_DATABASE=laravel
    DB_USERNAME=laravel
    DB_PASSWORD=secret
7. Gere a chave da aplicação
  -- 'php artisan key:generate'
8. Criar conexão com banco MySQl com as seguintes caracteristicas:
  -- username: laravel
  -- password: secret
9. Rodar as Migrations
  -- 'php artisan migrate'
10. Processar as despesas dos deputados
  -- 'php artisan queue:work'
11. Iniciar o Servidor Laravel
  -- 'php artisan serve --host=0.0.0.0 --port=8000' acessar: 'http://localhost:8000'
