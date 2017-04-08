
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE DATABASE market;

USE market;

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `admin` (`id`, `login`, `mdp`) VALUES
(1, 'admin', '6a4e012bd9583858a5a6fa15f58bd86a25af266d3a4344f1ec2018b778f29ba83be86eb45e6dc204e11276f4a99eff4e2144fbe15e756c2c88e999649aae7d94');


CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `categorie` (`id`, `nom`) VALUES
(1, 'fruits'),
(2, 'legumes'),
(3, 'boulangerie'),
(4, 'poissonnerie'),
(5, 'boucherie'),
(6, 'conserve');

CREATE TABLE `categorie_produit` (
  `id` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prix` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `produit` (`id`, `nom`, `prix`, `image`) VALUES
(1, 'bananes', 2, './img/bananes.png'),
(2, 'pommes', 1, './img/pommes.jpg'),
(3, 'kiwi', 3, './img/kiwi.jpg'),
(4, 'clementine', 2, './img/clementine.jpg'),
(5, 'concombre', 1, './img/concombre.jpg'),
(6, 'betterave', 3, './img/betterave.jpg'),
(7, 'conserve_ananas', 2, './img/conserve_ananas.jpg'),
(8, 'maquereau_frais', 6, './img/maquereau_frais.jpg'),
(9, 'maquereau_conserve', 5, './img/maquereau_conserve.png'),
(10, 'steak', 4, './img/steak.jpg'),
(11, 'baguette', 1, './img/baguette.jpg');


ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `categorie_produit`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `categorie_produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

