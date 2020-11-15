# Programação RPC
Landing page para exibição da programação da RPC.

## Como executar a aplicação
Utilizar Docker 
$ docker-compose up
caso apareça a seguinte mensagem: "ERROR: Network main declared as external, but could not be found. Please create the network manually using `docker network create main` and try again." utilizar o comando 
$ docker network create main
e rodar novamente
$ docker-compose up