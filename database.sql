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
     name varchar(100) not null,
     style varchar(50) not null,
     image varchar(255) not null,
     );
--
-- Contenu de la table `artist`
--

INSERT INTO artist (name, style, image)
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
-- Structure de la table `concert`
--

create table concert (
     id int not null primary key auto_increment,
     place varchar(150) not null,
     date date not null,
     schedule time not null,
     city varchar(100) not null,
     artist_id int not null,
     constraint fk_concert_artist
     foreign key (artist_id)
     references artist(id)
     );

--
-- Contenu de la table `concert`
--

insert into concert (place, date, schedule, city, artist_id)
values ('Transbordeur', '2022-12-24', '21:00:00', 'Lyon', 3),
     ('Radiant', '2022-10-15', '20:00:00', 'Lyon', 10),
     ('Halle Tony Garnier', '2023-05-27', '20:30:00', 'Lyon', 12),
     ('Transbordeur', '2023-12-24', '21:00:00', 'Lyon', 4),
     ('Zénith de Paris', '2023-08-14', '21:00:00', 'Paris', 5),
     ('Boule noire', '2023-06-07', '20:00:00', 'Paris', 10),
     ('Olympia', '2023-10-14', '21:00:00', 'Paris', 11),
     ('Zénith de Strasbourg', '2023-04-14', '20:00:00', 'Strasbourg', 5),
     ('Transbordeur', '2022-12-22', '21:00:00', 'Lyon', 7),
     ('Transbordeur', '2022-03-24', '21:30:00', 'Lyon', 9);