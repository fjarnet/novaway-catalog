My catalog
==========

Proposé
---

* Archi : Docker / PHP-FPM 7.1 / Nginx / Mysql
* Authentification : HTTP Basic
* Front : Bootstrap 4 de base / KnpPaginatorBundle
* Back : Sonata
* Recherche : Elasticsearch
* Alertes : Listeners à mettre en place sur les POST

Création d'un Makefile qui permette de faire des raccourcis de lancement du docker, de l'install du projet, un mailcatcher pour le dev local, ...

Dans l'idéal,
Mettre en place des tests Behat du style :
* La HP doit répondre en 200
* La HP doit comporter un listing d'articles
* Quand on clique sur un lien de l'article, on doit arriver sur sa fiche

Toujours dans l'idéal (mais pas en 8h ;-) ),
Mettre en place un système de livraison automatisée (type Capifony / Jenkins), avec check de la syntaxe via un Code Sniffer, lancement des tests, ...

Enfin, mise en place de Fixtures pour injecter des données (données livres / films ou préférences users pour les alertes).

Avec un temps plus long, possibilité d'utiliser Algolia comme moteur de recherche front.

Côté BDD, 
* une table pour les livres, 
* une pour les films (DVD + Blueray)
* une table pour les personnes (acteurs, réalisateurs, ...)
* une table pour les relations films / acteurs
* pour les alertes, ce sera probablement en dur dans le code et pas en BDD selon le temps disponible ;-)


Développé
---

Selon le temps dispo, voici ce qui a été fait, et ce qui n'a pas été fait / terminé

- Archi : Docker en place avec un mini Makefile
- Autentification : OK
- Front : Listing des 5 derniers films, 5 derniers livres puis accès à leur fiche. A défaut d'avoir des résultats de recherche, la pagination a été mise ici ;-)
- Back : Toute l'admin est faite (donc toute la modélisation BDD)
- Recherche : non réalisé. Juste le formulaire, pas le temps pour gérer la config Elasticsearch
- Alertes : Principe "prêt" (avec abonnés en dur dans le code), manque la finition (envoi effectif du mail / mailcatcher)
- Fixtures : OK