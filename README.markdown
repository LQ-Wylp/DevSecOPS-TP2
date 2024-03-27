# Informations
 - Ce projet a était réalisé dans le cadre d'un TP à réaliser (le sujet est disponible dans le dossier "Doc").
 - Il a était réalisé par Julian Wicke et Quentin Leuliet.
 - Un fichier SQL est disponible dans le dossier "mysql" nommé "init.sql" pour avoir une base de donnée avec des données de test.

# Initialisation du projet en local
- Déplacer vous dans le projet avec le terminal
- Executer la commande

```sh
composer install 
```

- Puis ouvrer votre gestionnaire de DATABASE (exmple: MySQl) et créer une base de données avec pour nom "planning"
- Configurer le .env par rapport à la votre
  
```sh
DATABASE_URL="mysql://root:@127.0.0.1:3306/db_cadeau"
```

- Executer dans le terminal la commande pour migrer les tables dans votre DB suivant : 

```sh
php bin/console d:m:m
```

Enfin executer le serveur 
```sh
 symfony server:start --port=8000
```

Ce microservice sera alors executer sur le port (127.0.0.1:8000)

# Initialisation du projet avec Docker

Pour accéder au projet avec Docker, il suffit de **se rendre sur la branche "Docker" du projet**.

On a voulu mettre en place un docker pour ce projet mais nous avons rencontré des problèmes avec la base de données. 

Détails :
- Nous avons mis en place un docker-compose avec un service symfony et un service mysql.
- Nous avons mis en place un Dockerfile pour le service symfony.
- Le soucis est que nous n'arrivons pas à faire à corriger une erreur de connexion à la base de données depuis le projet *(voir le .env)*

Nous avons donc décidé de ne pas le mettre en place sur la branche main.

Commande à exécuter pour lancer le projet avec Docker :
```sh 
docker-compose up -d --build
```

