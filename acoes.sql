CREATE DATABASE app_teste;


use app_teste;

CREATE TABLE user (
    id INTEGER NOT NULL primary key auto_increment,
    nome VARCHAR(255) NOT NULL,
    sobre_nome VARCHAR(255) NOT NULL,
    senha VARCHAR(255) ,
    nascimento VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL 
);

INSERT INTO user  
(  nome , sobre_nome , senha , nascimento ,email) VALUES
( 'teste' ,'teste sobrenome' ,  '123456' , '10-10-2000' , ' teste@plyn.com.br' );