Rede Social - CodeRockr

<b>Finalidade do Projeto</b>: A aplicação é uma rede social com cadastro de amigos e feed de notícias criada para o processo seletivo de uma empresa.

<b>Estrutura da aplicação</b>: Estrutura MVC desenvolvida sobre o PHP 7 e mySQL (Não foi utilizado uma estrutura MVC já pronta.). Foi utilizado também o framework do bootstrap.

<b>Estrutura</b>: A aplicação foi construida em padrão MVC, onde foi criado uma estrutura com autoload para os Controllers e Models.
Para utilização da estrutura, é necessário criar um virutualhost ou colocar a aplicação na Raiz do Localhost, pois ele utiliza dos parâmetros passados no link para processamento das informações.
Na pasta docs tem o banco de dados da aplicação e algumas informações referente a construção dela.

<b>Testes</b>: Para fazer os testes, foi executado a aplicação em uma máquina virtual com php 7, mysql e CentOS-7. E efetuado testes automatizados com a ferramenta Selenium (Gravação do Vídeo de execução dos testes https://youtu.be/-F7sAB5rzik).
Teste com PHPUnit por enquanto não foram eficazes devido a um erro de banco de dados.

<b>VirtualHost necessário para utilizar a aplicação</b>:

    <VirtualHost *:80>
        DocumentRoot "/users/andreleoni/Documents/www/coderockr"
        ServerName coderockr.pc
        <Directory "/users/andreleoni/Documents/www/coderockr">
                Options Indexes Multiviews FollowSymLinks
                AllowOverride All
                Order allow,deny
                Allow from all
        </Directory>
    </VirtualHost>
