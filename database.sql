SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

DROP DATABASE goldfish;

CREATE DATABASE goldfish;

USE goldfish;

--
-- Structure de la table `artist`
--

create table artist (
     id int not null primary key auto_increment,
     name_artist varchar(100) not null,
     style varchar(50) not null,
     image_artist varchar(255) not null,
     UNIQUE (name_artist)
     );

--
-- Contenu de la table `artist`
--

INSERT INTO artist (name_artist, style, image_artist)
     values ('System of a Down', 'Metal', '/assets/images/artists/System of a Down.jpg'),
     ('Green Day', 'Rock', '/assets/images/artists/Green Day.jpg'),
     ('The Rolling Stones', 'Rock', '/assets/images/artists/The Rolling Stones.jpg'),
     ('Jessie Reyez', 'RnB', '/assets/images/artists/Jessie Reyez.jpg'),
     ('Deluxe', 'Pop', '/assets/images/artists/Deluxe.jpg'),
     ('Red Hot Chilli Peppers', 'Rock', '/assets/images/artists/Red Hot Chilli Peppers.jpg'),
     ('Franz Ferdinand', 'Rock', '/assets/images/artists/Franz Ferdinand.jpg'),
     ('Eric Clapton', 'Blues', '/assets/images/artists/Eric Clapton.jpg'),
     ('Bruce Springsteen', 'Rock', '/assets/images/artists/Bruce Springsteen.jpg'),
     ('Blake Shelton', 'Country' , '/assets/images/artists/Blake Shelton.jpg'),
     ('Electric Guest', 'Electro' , '/assets/images/artists/Electric Guest.jpg'),
     ('Odesza', 'Electro' , '/assets/images/artists/Odesza.jpg'),
     ('Aloise Sauvage', 'Pop' , '/assets/images/artists/Aloise Sauvage.jpg');

--
-- Structure de la table `venue`
--

create table venue (
     id int not null primary key auto_increment,
     name_venue varchar(150) not null,
     address varchar(150) not null,
     city varchar(100) not null,
     image_venue varchar(255) not null,
     UNIQUE (name_venue)
     );

--
-- Contenu de la table `venue`
--

insert into venue (name_venue, address, city, image_venue)
values ('Transbordeur', '3 Bd de Stalingrad', 'Villeurbanne', '/assets/images/venues/transbordeur.jpeg'),
     ('Radiant', '1 Rue Jean Moulin', 'Caluire-et-Cuire', '/assets/images/venues/radiant.jpeg'),
     ('Halle Tony Garnier', '20 Pl. Docteurs Charles et Christophe Mérieux', 'Lyon', '/assets/images/venues/halle-tony-garnier.jpeg'),
     ('Zénith de Paris', '211 Av. Jean Jaurès', 'Paris', '/assets/images/venues/zenith-paris.jpeg'),
     ('Boule noire', '120 Blvd Marguerite de Rochechouart', 'Paris', '/assets/images/venues/la-boule-noire.jpeg'),
     ('Olympia', '28 Bd des Capucines', 'Paris', '/assets/images/venues/Olympia.jpeg'),
     ('Zénith de Strasbourg', '1 All. du Zénith', 'Eckbolsheim', '/assets/images/venues/zenith-strasbourg.jpeg');

--
-- Structure de la table `concert`
--

create table concert (
     id int not null primary key auto_increment,
     date date not null,
     schedule time not null,
     artist_id int not null,
     constraint fk_concert_artist
     foreign key (artist_id)
     references artist(id),
     venue_id int not null,
     constraint fk_concert_venue
     foreign key (venue_id)
     references venue(id)
     );

--
-- Contenu de la table `concert`
--

insert into concert (date, schedule, artist_id, venue_id)
values ('2022-12-24', '21:00:00', 3, 1),
     ('2022-10-15', '20:00:00', 2, 2),
     ('2023-05-27', '20:30:00', 12, 3),
     ('2023-12-24', '21:00:00', 4, 4),
     ('2023-08-14', '21:00:00', 5, 5),
     ('2023-06-07', '20:00:00', 6, 6),
     ('2023-10-14', '21:00:00', 11, 7),
     ('2023-04-14', '20:00:00', 5, 3),
     ('2022-12-22', '21:00:00', 7, 4),
     ('2022-03-24', '21:30:00', 9, 7);

--
-- Structure de la table `user`
--

CREATE TABLE user (
  id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  email varchar(100) DEFAULT NULL,
  password varchar(255) DEFAULT NULL,
  pseudo varchar(45) DEFAULT NULL,
  is_admin BOOL NOT NULL, 
  UNIQUE KEY email_UNIQUE (email)
);
--
-- Dumping data for table `user`
--

INSERT INTO `user` VALUES (1,'toto@mail.fr','$2y$10$FjaLGXBcJBrSRJAA/7GA7.69fq/g2jDbpuiZWDJcMKZulhL2WPz2i','Toto', false),
(2,'superman@mail.fr','$2y$10$SjAEemkn.MKSsLqypYltHOm4vMPSfZTZVbFkxT5bZ1duXIQTiHoca','Superman', true);



