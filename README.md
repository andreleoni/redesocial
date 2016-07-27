<b> Rede Social - CodeRockr </b>

<b> Git </>: Os Commits foram enviados por framework, e por arquivo, em cada commit tem uma pequena esplicação do que faz aquele arquivo.

<b>Finalidade do Projeto</b>: A aplicação é uma rede social com cadastro de amigos e feed de notícias criada para o processo seletivo de uma empresa.

<b>Sistemas utilizados</b>: PHP 7 e mySQL (Não foi utilizado uma estrutura MVC já pronta.). Foi utilizado também o framework do bootstrap.

<b>Estrutura</b>: A aplicação foi construida em padrão MVC, onde foi criado uma estrutura com autoload para os Controllers e Models.
Para utilização da estrutura, é necessário criar um virutualhost ou colocar a aplicação na Raiz do Localhost.
Na pasta docs tem o banco de dados da aplicação e algumas informações referente a construção dele.

<b>./Index </b> foi criado o autoload que fará o carregamento das classes automáticamente ao instanciar em qualquer arquivo do sistema.
<b>./core/core.php</b> está a classe "run" que verificará o link digitado e redirecionará a página para a pasta controller/(classedigitadaController.php), dentro desta classe por padrão se nenhuma classe for solicitada no link, ele irá chamar a index, e se for chamada a classe, ele irá diretamente para ela. Também, se for necessário passar algum parâmetro para a classe, é só passar com mais um "/" no link, exp: http://coderockr.pc/homeController/{classe}/{parametro}.
<b> ./core/model </b> está apenas o arquivo de conexao e algumas funcoes "curingas", sendo chamadas de qualquer arquivo do sistema.
<b>./core/controller.php</b> ele faz o carregamento das views do sistema. A função de loadView é a função que fará o carregamento de uma tela inteira (Exemplo a tela de Login do sistema), a função loadTemplate fará o carregamento do template em si, que está localizado na estrutura ./view/template, e a loadViewEmTemplate é a estrutura a ser chamada dentro do template para abrir determinada view dentro do arquivo de template. Ambos suportam parâmetros.
<b> ./config.php </b> tem as configuracoes de banco de dados, com verificação de variavel de ambiente para o banco de dados de produção /desenvolvimento.
<b>Testes</b>: Para fazer os testes, foi executado a aplicação em uma máquina virtual com php 7, mysql e FedoraServer. E efetuado testes automatizados com a ferramenta Selenium (Documento com o script do teste dentro de Tests), (Gravação do Vídeo de execução dos testes https://youtu.be/-F7sAB5rzik).

O <b>Composer</b> está configurado apenas para baixar o PHPUnit, porém, os testes com PHPUnit por enquanto não foram eficazes devido a um erro de banco de dados.

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
