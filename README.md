# Instruções

Para rodar o servidor execute 
```
php spark serve
```

Lembrando que dependendo de onde for hospedado é necessário modificar as rótas
no arquivo main.js e .env

No arquivo .env modifique a variavel app.baseURL de
acordo com a base do diretório apartir da raiz da url
até a pasta public.

Exemplo;
http://localhost/teste/public/
No servidor /teste/public

No arquivo main.js configure a variável url + "/pasta/para/public"

### Não esqueça de configurar o banco de dados!
Também é necessário atualizar os dados do banco de dados no .env linha 63 até 67
