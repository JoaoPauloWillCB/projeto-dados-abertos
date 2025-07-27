PASSO A PASSO PARA EXECUTAR O PROJETO

1. Clonar o Repositório
2. Subir os Containers com Docker
  - 'docker compose up -d --build'
4. Acessar o Container do Laravel
  - 'docker exec -it app bash'
3. Rodar as Migrations
  - 'php artisan migrate'
4. Iniciar o Servidor Laravel
  - 'php artisan serve --host=0.0.0.0 --port=8000' acessar: 'http://localhost:8000'
5. Processar os Deputados e Suas Despesas
  - 'php artisan queue:work'
