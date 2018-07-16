Installation du projet
===

Copier le fichier `.env.dist` en `.env`.

Création des containers Docker :

- `make up`


Connexion aux conteneurs :

- `docker-compose exec php bash`
- `docker-compose exec db bash`


Initialisation du projet :

- `docker-compose exec php bash`
- `php bin/console doctrine:schema:update --force`
- `php bin/console assets:install`

URLs de connexion :

- http://novaway.local/app_dev.php
- http://novaway.local/app_dev.php/admin/