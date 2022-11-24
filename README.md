### Instruções especiais de construção
- Na pasta raiz, pelo terminal de comandos, executar:
  1. `docker-compose build`;
  2. `docker-compose up -d`.
  
- Para executar os testes:
  1. No terminal, entrar no container da aplicação com `docker exec -it backend-test-app bash`.
  2. Ecxecutar `./vendor/bin/pest`.
  
- Foi utilizado a biblioteca *pestphp* para implementar os testes unitários.

##### **Observação:**
- Não foi possível implementar, por inteiro, a aplicação sugerida, e nem as rotas. Devido a falta de tempo hábil.
