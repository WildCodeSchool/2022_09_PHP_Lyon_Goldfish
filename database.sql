-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 26 Octobre 2017 à 13:53
-- Version du serveur :  5.7.19-0ubuntu0.16.04.1
-- Version de PHP :  7.0.22-0ubuntu0.16.04.1

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
     image varchar(200) not null
     );
--
-- Contenu de la table `artist`
--

INSERT INTO artist (name, style, image)
     values ('System of a Down', 'Metal', 'systemOfADown.jpeg'),
     ('Green Day', 'Rock', 'greenDay.jpeg'),
     ('The Rolling Stones', 'Rock', 'theRollingStones.jpeg'),
     ('Jessie Reyez', 'RnB', 'jessieReyez.jpeg'),
     ('Deluxe', 'Pop', 'deluxe.jpeg'),
     ('Red Hot Chilli Peppers', 'Rock', 'redHotChilliPeppers.jpeg'),
     ('Franz Ferdinand', 'Rock', 'franzFerdinand.jpeg'),
     ('Eric Clapton', 'Blues', 'ericClapton.jpeg'),
     ('Bruce Springsteen', 'Rock', 'bruceSpringsteen.jpeg'),
     ('Blake Shelton', 'Country' , 'blakeShelton.jpeg'),
     ('Electric Guest', 'Electro' , 'electricGuest.jpeg'),
     ('Odesza', 'Electro' , 'odesza.jpeg'),
     ('Aloïse Sauvage', 'Pop' , 'aloiseSauvage.jpeg');

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