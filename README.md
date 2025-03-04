# PHP_website_project
Ce projet collaboratif nous invite à concevoir et développer un site web dynamique en PHP, en mettant en œuvre de nombreuses fonctionnalités modernes et en respectant les bonnes pratiques de développement. [ADD][MODIF][SUPP]

# MEMBRES DU GROUPE

Romain Poisson -> webromain
Naira Awadin -> NairaAwadin

# CONTRIBUTIONS

Romain Poisson : Base Projet, register, profil, galerie (artworks, expositions, favoris (quand connecté))

Naira Awadin : Login, home, css (bootstrap) site entier, galerie (commentaires)

-------------------------------------------------------------

# docker compose up -d

# docker exec -it php_website_project-db-1 mysql -u root -p -h 127.0.0.1 -P 3306

# mdp : root

# USE app;

-------------------------------------------------------------

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    sexe ENUM('H', 'F', 'A') NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    phone VARCHAR(20),
    address VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-------------------------------------------------------------

CREATE TABLE IF NOT EXISTS artworks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    description TEXT,
    image_url VARCHAR(255),
    creation_date DATE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-------------------------------------------------------------

CREATE TABLE IF NOT EXISTS comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    artwork_id INT NOT NULL,
    comment TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (artwork_id) REFERENCES artworks(id)
);

-------------------------------------------------------------

CREATE TABLE IF NOT EXISTS favorites (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    artwork_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (artwork_id) REFERENCES artworks(id)
);

-------------------------------------------------------------

CREATE TABLE IF NOT EXISTS exhibitions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    artwork_id INT NOT NULL,
    name VARCHAR(100) NOT NULL,
    location VARCHAR(255),
    start_date DATE,
    end_date DATE,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (artwork_id) REFERENCES artworks(id)
);

-------------------------------------------------------------

INSERT INTO artworks (title, description, image_url, creation_date) VALUES
("La nuit étoilée sur le Rhône", "Une peinture célèbre de Van Gogh", 'https://www.portfolioromainpoisson.fr/wp-content/uploads/2025/03/nuit_etoile_rhone.jpg', '1888-09-01'),
("Two Poplars In The Alpilles", "Une peinture peu connue de Van Gogh", 'https://www.portfolioromainpoisson.fr/wp-content/uploads/2025/03/two_poplars.jpg', '1889-06-01'),
("Champ de blé aux corbeaux", "Créé à Auvers-Sur-Oise", 'https://www.portfolioromainpoisson.fr/wp-content/uploads/2025/03/champs_de_bles.jpg', '1890-01-01'),
("Les mangeurs de pommes de terre", "Dans une autre thématique", 'https://www.portfolioromainpoisson.fr/wp-content/uploads/2025/03/mangeurs_pommes_terre.jpg', '1885-01-01');

-------------------------------------------------------------

INSERT INTO exhibitions (artwork_id, name, location, start_date, end_date, description) VALUES
(1, "Exposition La nuit étoilée sur le Rhône", "Musée d'Orsay, Paris", '2025-03-01', '2025-06-01', "Une exposition dédiée à La nuit étoilée sur le Rhône de Van Gogh."),
(2, "Exposition Two Poplars In The Alpilles", "Londres", '2025-07-01', '2025-09-30', "Une exposition dédiée à Two Poplars In The Alpilles de Van Gogh."),
(3, "Exposition Champ de blé aux corbeaux", "Amsterdam", '2025-10-01', '2025-12-31', "Une exposition dédiée à Champ de blé aux corbeaux de Van Gogh."),
(4, "Exposition Les mangeurs de pommes de terre", "New York", '2026-01-01', '2026-03-31', "Une exposition dédiée à Les mangeurs de pommes de terre de Van Gogh.");

-------------------------------------------------------------

# php -S localhost:5500

-------------------------------------------------------------

# YOU CAN RUN

-------------------------------------------------------------


sudo systemctl status mariadb  #pour vérifier si MariaDB est en cours d'execution

sudo systemctl start mariadb  #pour le démarrer

sudo systemctl enable mariadb  #pour que mariadb démarre automatiquement

mysql -u root -p  #pour se connecter à mariadb et acceder à app
mdp = root

SHOW DATABASES;  #voir les bases de données dispos

USE nom_bd; (ex: app)  # utiliser une base de données spécifique

SHOW TABLES;  #afficher les tables de la bd

DROP TABLE user;  #pour supprimer une table

SELECT * FROM artworks;  #afficher les données d'une table spécifique