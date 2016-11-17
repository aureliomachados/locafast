# LOCAFAST APP

## Instruções de instalação
 - Abra o CMD(Windows)/Terminal(Linux)
 - Copie o comando: git clone https://github.com/aureliomachados/locafast.git
 - Entre no diretório do projeto: cd locafast
 - Execute: composer install
 - Após instaladas todas as dependências, acesse o banco de dadeos via cmd pelo comando: mysql -u root -p
 - Dê enter e ele solicitará a senha, no seu caso não existe senha, dê enter novamente.
 - Remova o banco de dados antigo com o comando: drop database locafast
 - Crie um novo banco de dados: create database locafast
 - Saia do banco de dados com o comando: exit
 - Renomeie o arquivo .env.example para .env
 - Execute o comando: php artisan migrate
 - Após todas as instruções serem executadas no comando migrate (deve demorar alguns minutos) execute o comando: php artisan db:seed
 - Execute o projeto com o comando: php artisan serve
 - A aplicação vai estar disponível em: localhost:8000
