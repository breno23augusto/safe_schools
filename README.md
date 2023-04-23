# Escolas seguras

Um aplicativo de reporte de denúncias de ameaças em escolas pode ser muito útil para ajudar a prevenir e combater a violência nas escolas. Existem vários aplicativos que já foram desenvolvidos para esse fim. Por exemplo, o Disque 100 é um serviço que passou a receber denúncias de ameaças de ataques a escolas pelo WhatsApp. O Ministério da Justiça e Segurança Pública, em parceria com SaferNet Brasil, criou um canal exclusivo para recebimento de informações de ameaças e ataques contra as escolas. A PM está desenvolvendo o aplicativo “Rede Escola” com objetivo de conectar os profissionais da rede de ensino à corporação para denúncias e situações emergenciais.

## Executando o projeto

1. Execute `docker-compose up -d` ou `make up`;
2. criar um arquivo .env com o conteúdo do arquivo .env.example;
2. acessar o bash do PHP (`make bash`);
3. exeutar o comando `composer install`;
4. exeutar o comando `php artisan migrate`.
