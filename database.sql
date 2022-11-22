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
     values ('System of a Down', 'Metal', 'http://www.albumrock.net/dyn_img/groupes/124.jpg'),
     ('Green Day', 'Rock', 'https://i.guim.co.uk/img/media/55760e085efd29851aaa9039781334c63e478c85/0_300_4500_2700/master/4500.jpg?width=1200&height=1200&quality=85&auto=format&fit=crop&s=e4900fb962c83b5e2f0c1f904985a55c'),
     ('The Rolling Stones', 'Rock', 'https://dice-i-scdn-co.imgix.net/image/ab6761610000e5ebd3cb15a8570cce5a63af63d8'),
     ('Jessie Reyez', 'RnB', '/assets/images/artists/Jessie Reyez.jpg'),
     ('Deluxe', 'Pop', '/assets/images/artists/Deluxe.jpg'),
     ('Groundation', 'Reggae', 'https://cdns-images.dzcdn.net/images/artist/ac1a376ec3732d591b257206d52da2d2/500x500.jpg'),
     ('Red Hot Chilli Peppers', 'Rock', 'https://www.francetvinfo.fr/pictures/YnJTqroQguN5Jg_6KHP_jFaGfcQ/1200x1200/2022/04/01/phpPAEw95.jpg'),
     ('Franz Ferdinand', 'Rock', '/assets/images/artists/Franz Ferdinand.jpg'),
     ('Eric Clapton', 'Blues', 'https://www.francetvinfo.fr/pictures/3c1g-Snk5Gq0v-ljQ49JYKg3_wk/1200x1200/2019/04/11/ericclaptonok.jpg'),
     ('Lizzo', 'Rap','https://music-planet.fr/wp-content/uploads/2019/04/avatars-000481837866-dh98ox-t500x500.jpg'),
     ('Bruce Springsteen', 'Rock', '/assets/images/artists/Bruce Springsteen.jpg'),
     ('Blake Shelton', 'Country' , '/assets/images/artists/Blake Shelton.jpg'),
     ('Electric Guest', 'Electro' , '/assets/images/artists/Electric Guest.jpg'),
     ('Odesza', 'Electro' , '/assets/images/artists/Odesza.jpg'),
     ('Aloise Sauvage', 'Pop' , '/assets/images/artists/Aloise Sauvage.jpg'),
     ('Leo Moracchioli', 'Rock', 'https://www.metalzone.fr/wp-content/uploads/2019/07/Leo-Moracchioli-d%C3%A9voile-une-reprise-Metal-du-th%C3%A8me-de-Game-Of-Thrones.jpg'),
     ('LCD Soundsystem', 'Rock', 'https://images.theskinny.co.uk/assets/production/000/139/491/139491_wide.jpg'),
     ('La Femme', 'Chanson', 'https://cdn-elle.ladmedia.fr/var/plain_site/storage/images/loisirs/musique/dossiers/la-femme-revient-avec-mystere-un-deuxieme-album-feerique-3148981/68797390-1-fre-FR/La-Femme-revient-avec-Mystere-un-deuxieme-album-feerique.jpg'),
     ('Jurassic 5', 'Rock', 'https://pyxis.nymag.com/v1/imgs/690/995/45414a4d1832d648f8ecc6c89f084b6018-07-jurassic-5.rsquare.w330.jpg'),
     ('Oxmo Puccino', 'Rap', 'https://polos.montagut.com/20594-large_default/polo-oxmo-puccino.jpg'),
     ('Jack White', 'Rock', 'https://cdns-images.dzcdn.net/images/artist/d3544c732d7f70e09f5506143c0833ce/500x500.jpg'),
     ('M.I.A', 'Hip Hop', 'https://hiphopcorner.fr/wp-content/uploads/2021/11/MIA.jpg'),
     ('Metronomy', 'Electro', 'https://cdns-images.dzcdn.net/images/artist/0b71ff733dad82c92e315442335e0b6f/500x500.jpg'),
     ('SG Lewis', 'Pop', 'https://i1.sndcdn.com/avatars-zKJscjamyhXGDJyU-yf7NUg-t500x500.jpg'),
     ('Glass Animals', 'Electro', 'https://www.places-concert.com/images/visuels/artists_glass_animals_04082020165103.jpg'),
     ('Kakkmaddafakka', 'Rock', 'https://cdns-images.dzcdn.net/images/artist/da2bd56b0b2bc9b86b612a45ad47c453/500x500.jpg'),
     ('Miike Snow', 'Electro', 'https://lastfm.freetls.fastly.net/i/u/ar0/b92bec04149d03a3c8229d3787e263f1.jpg'),
     ('Bicep', 'Electro', 'https://ninjatune.net/images/artists/bicep-main.jpg'),
     ('Lomepal', 'Rap', 'https://video-images.vice.com/articles/5c86c9e30db68a00074a0a1c/lede/1552337629881-Lomepal-merci-de-crediter-Jules-Faure6.jpeg?crop=0.6715xw:1xh;0.15xw,0xh'),
     ('Philippe Katerine', 'Pop', 'https://media1.ledevoir.com/images_galerie/nwdp_403799_266357/image.jpg'),
     ('Pixies', 'Rock', 'https://www.francetvinfo.fr/pictures/0S9I8nwhb90lirW7TIkRJlUxzyc/1200x1200/2019/09/13/phpCoaeam.jpg'),
     ('Stromae', 'Pop', 'https://yt3.ggpht.com/AHmxoY01ABvaJCADNHVH0TmlouX3QNrxeSmjN8Ln_M7u3bV913eBUyyh9zg9YntmpGZPKMSDSjQ=s900-c-k-c0x00ffffff-no-rj'),
     ('Orelsan',  'Rap', 'https://i.scdn.co/image/ab67616d0000b27358ba1ea637001f9a15e55a92'),
     ('Nickelback', 'Rock', 'https://d11mgq5hlnsdgo.cloudfront.net/53fe392a-4744-4b2f-8c0a-52ec02da538c.jpg'),
     ('Imagine Dragons', 'Pop', 'https://lastfm.freetls.fastly.net/i/u/ar0/ecddc159b25bb43f677e786b2bada743.jpg');


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
values ('Le Transbordeur', '3 Bd de Stalingrad', 'Villeurbanne', '/assets/images/venues/transbordeur.jpeg'),
     ('Le Radiant', '1 Rue Jean Moulin', 'Caluire-et-Cuire', '/assets/images/venues/radiant.jpeg'),
     ('La Halle Tony Garnier', '20 Pl. Docteurs Charles et Christophe Mérieux', 'Lyon', '/assets/images/venues/halle-tony-garnier.jpeg'),
     ('Le Zénith de Paris', '211 Av. Jean Jaurès', 'Paris', '/assets/images/venues/zenith-paris.jpeg'),
     ('La Boule noire', '120 Blvd Marguerite de Rochechouart', 'Paris', '/assets/images/venues/la-boule-noire.jpeg'),
     ("L'Olympia", '28 Bd des Capucines', 'Paris', '/assets/images/venues/Olympia.jpeg'),
     ('Le Zénith de Strasbourg', '1 All. du Zénith', 'Eckbolsheim', '/assets/images/venues/zenith-strasbourg.jpeg'),
     ('Le Fil', '20 Bd Thiers', 'St Etienne', 'https://www.le-fil.com/wp-content/uploads/2021/03/MG_9657-768x512.jpg'),
     ('La coopérative de mai', 'Rue Serge Gainsbourg', 'Clermont-Ferrand', 'https://fastly.4sqi.net/img/general/600x600/lf4rzMoTwO_Huuy-LigFdO5PeHecgGsswxXwctePxGQ.jpg'),
     ("L'Accor Arena", '8 Bd de Bercy', 'Paris', 'https://res.cloudinary.com/du5jifpgg/image/upload/t_opengraph_image/Surcharge-APIDAE/AccorArena_200721_05.jpg'),
     ('Le Rockstore', '20 Rue de Verdun', 'Montpellier', 'https://assets.justacote.com/photos_entreprises/rockstore-odeon-montpellier-14271857310.jpg'),
     ("L'Élysée Montmartre", '72 Blvd Marguerite de Rochechouart', 'Paris', 'https://ml1zg2et1ufr.i.optimole.com/w:933/h:933/q:mauto/rt:fill/g:ce/el:1/https://trianon-elyseemontmartre.com/wp-content/uploads/2018/05/2O1A0127-uai-933x933.jpg'),
     ('La Cigale', '120 Blvd Marguerite de Rochechouart', 'Paris', 'https://museedupatrimoine.fr/patrimoine/32474/thumb_19394-la-cigale-paris-18eme--0.jpg'),
     ('Le Trianon', '80 Blvd Marguerite de Rochechouart', 'Paris', 'https://www.letrianon.fr/sites/trianon7.ap2s.fr/files/3_-_Le_Trianon_-_Le_Theatre_assis_de_puis_scne_c_Franck_Bohbot-435x435.jpg'),
     ('Le Bikini', 'Parc Technologique du Canal, Rue Théodore Monod', 'Ramonville-Saint-Agne', 'https://cdn.sanity.io/images/rf3cqo3h/production/cbf769e95188224def9a14871dacef5e7e5a63e9-510x510.jpg'),
     ('Paloma', "250 Chem. de l'Aérodrome", 'Nîmes', 'https://paloma-nimes.fr/wp-content/uploads/2018/01/lieuvignette.jpg'),
     ("L'Espace Julien", '39 Cr Julien', 'Marseille', 'https://www.adamconcerts.com/wp-content/uploads/sites/2/2013/02/espace-julien-marseille.jpg'),
     ('Le Bateau Ivre', '146 Rue Édouard Vaillant', 'Tours', 'https://pbs.twimg.com/media/EuAmwkRWYAEByeK.jpg'),
     ('La Vapeur', '42 Av. de Stalingrad', 'Dijon', 'https://s3-media0.fl.yelpcdn.com/bphoto/Bbp8qMG-Oz7lUSbWhTPO0A/348s.jpg'),
     ('Le Brise Glace', '54 bis Rue des Marquisats', 'Annecy', 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/16/97/cb/00/vue-exterieure-du-batiment.jpg?w=1200&h=1200&s=1'),
     ("L'Aéronef", '168 Av. Willy Brandt Centre Commercial', 'Lille', 'https://trxprds3.s3.amazonaws.com/uploads/2019/10/photo-salle-aeronef-euralille-kmeron-800x800.jpg'),
     ("Le Zénith d'Auvergne", '24 Rue de Sarliève', "Cournon-d'Auvergne", 'https://fastly.4sqi.net/img/general/600x600/134475451_ungehQemRpA8GlxI0fBspAXuhLQffb-FH9U--3kbSJI.jpg'),
     ('Le Zénith de Limoges', '16 Av. Jean Monnet', 'Limoges', 'https://yt3.ggpht.com/ytc/AMLnZu8_hU46IRf9eWzuaDM2Jej2d6rZhuW6rsuncEWl=s900-c-k-c0x00ffffff-no-rj'),
     ("Le Zénith d'Orléans", '1 Rue du Président Robert Schuman', 'Orléans', 'https://images.noveltys.fr/locations/1859/medium/zenith-d-orleans@orleans.jpg'),
     ('La Défense Arena', "99 Jard. de l'Arche", 'Nanterre', 'https://www.parisladefense-arena.com/uploads/2021/02/1613134821573-1024x1024.jpg');

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
     references artist(id)
     ON DELETE CASCADE,
     venue_id int not null,
     constraint fk_concert_venue
     foreign key (venue_id)
     references venue(id)
     ON DELETE CASCADE
     );

--
-- Contenu de la table `concert`
--

insert into concert (date, schedule, artist_id, venue_id)
values
     ('2023-05-27', '20:30:00', 12, 3),
     ('2023-12-24', '21:00:00', 4, 4),
     ('2023-08-14', '21:00:00', 5, 5),
     ('2023-06-07', '20:00:00', 6, 6),
     ('2023-10-14', '21:00:00', 11, 7),
     ('2023-04-14', '20:00:00', 5, 3),
     ('2022-12-22', '21:00:00', 7, 4),
     ('2022-03-24', '21:30:00', 9, 7),
     ('2023-04-20','20:00:00', 31, 24),
     ('2023-05-10','20:00:00', 30, 25),
     ('2023-06-05','20:00:00', 29, 6),
     ('2023-06-01','20:00:00', 28, 6),
     ('2023-02-06','20:00:00', 27, 21),
     ('2023-01-09','20:00:00', 26, 22),
     ('2023-05-10','20:30:00', 25, 20),
     ('2023-02-18','20:30:00', 24, 19),
     ('2023-03-20','20:30:00', 23, 9),
     ('2023-04-20','20:30:00', 22, 13),
     ('2023-06-09','20:30:00', 21, 16),
     ('2023-06-14','20:30:00', 20, 11),
     ('2023-01-07','21:00:00', 19, 15),
     ('2023-03-12','21:00:00', 18, 23),
     ('2023-05-17','21:00:00', 17, 14),
     ('2023-04-10','21:00:00', 16, 8),
     ('2023-03-24','19:30:00', 15, 1),
     ('2023-03-10','20:00:00', 14, 17),
     ('2024-10-04','19:00:00', 3, 10),
     ('2023-03-04', '20:00:00', 2, 25),
     ('2023-03-03','20:00:00', 6, 21),
     ('2023-05-08','19:00:00', 10, 12);

--
-- Structure de la table `user`
--

CREATE TABLE user (
  id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  email varchar(100) DEFAULT NULL,
  password varchar(255) DEFAULT NULL,
  pseudo varchar(45) DEFAULT NULL,
  is_admin BOOL NOT NULL, 
  avatar varchar(255),
  UNIQUE KEY email_UNIQUE (email)
);
--
-- Dumping data for table `user`
--

INSERT INTO user VALUES (1,'toto@mail.fr','$2y$10$FjaLGXBcJBrSRJAA/7GA7.69fq/g2jDbpuiZWDJcMKZulhL2WPz2i','Toto', false, 'https://fr.shopping.rakuten.com/photo/981287510_L.jpg'),
(2,'superman@mail.fr','$2y$10$SjAEemkn.MKSsLqypYltHOm4vMPSfZTZVbFkxT5bZ1duXIQTiHoca','Superman', true, 'https://sfractus-images.cleo.media/unsafe/0x490:1080x1570/641x0/images/Superman-2931.jpg');


create table favorite_artist (
user_id int not null,
constraint fk_user_id_artist
foreign key (user_id)
references user(id),
favorite_artist_id int not null,
constraint fk_favorite_artist
foreign key (favorite_artist_id)
references artist(id)
ON DELETE CASCADE
);

INSERT INTO favorite_artist VALUES (1, 4),
(1, 9),
(1, 2);


create table favorite_concert (
user_id int not null,
constraint fk_user_id_concert
foreign key (user_id)
references user(id),
favorite_concert_id int not null,
constraint fk_favorite_concert
foreign key (favorite_concert_id)
references concert(id)
ON DELETE CASCADE
);

INSERT INTO favorite_concert VALUES (1, 4),
(1, 9),
(1, 2);