# PHP_website_project
Ce projet collaboratif nous invite à concevoir et développer un site web dynamique en PHP, en mettant en œuvre de nombreuses fonctionnalités modernes et en respectant les bonnes pratiques de développement.



# php -S localhost:5500
# [ADD][MODIF][SUPP]
# docker compose up


sudo systemctl status mariadb  #pour vérifier si MariaDB est en cours d'execution

sudo systemctl start mariadb  #pour le démarrer

sudo systemctl enable mariadb  #pour que mariadb démarre automatiquement

mysql -u root -p  #pour se connecter à mariadb et acceder à app
mdp = root

SHOW DATABASES;  #voir les bases de données dispos

USE nom_bd; (ex: app)  # utiliser une base de données spécifique

SHOW TABLES;  #afficher les tables de la bd

DROP TABLE user;  #pour supprimer une table

docker compose up

docker exec -it php_website_project-db-1 mysql -u root -p -h 127.0.0.1 -P 3306

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    sexe ENUM('H', 'F', 'A') NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

