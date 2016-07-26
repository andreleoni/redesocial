-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 26, 2016 at 04:15 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `redesocial`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `posts_id` int(11) NOT NULL,
  `posts_id_usuario` int(11) NOT NULL,
  `posts_datacriacao` varchar(8) NOT NULL,
  `posts_texto` text NOT NULL,
  `posts_hora` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `relacionamentos`
--

CREATE TABLE `relacionamentos` (
  `relacionamentos_id` int(11) NOT NULL,
  `relacionamentos_idadicinou` int(11) NOT NULL,
  `relacionamentos_idadicionado` int(11) NOT NULL,
  `relacionamentos_situacao` int(11) NOT NULL,
  `relacionamentos_diarelacionamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `relacionamentos`
--

INSERT INTO `relacionamentos` (`relacionamentos_id`, `relacionamentos_idadicinou`, `relacionamentos_idadicionado`, `relacionamentos_situacao`, `relacionamentos_diarelacionamento`) VALUES
(1, 1, 2, 1, 26072016);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `usuarios_id` int(11) NOT NULL,
  `usuarios_nomecompleto` varchar(60) NOT NULL,
  `usuarios_email` varchar(70) NOT NULL,
  `usuarios_senha` varchar(32) NOT NULL,
  `usuarios_datanascimento` varchar(8) NOT NULL,
  `usuarios_imagem` varchar(50) NOT NULL,
  `usuarios_descricao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`usuarios_id`, `usuarios_nomecompleto`, `usuarios_email`, `usuarios_senha`, `usuarios_datanascimento`, `usuarios_imagem`, `usuarios_descricao`) VALUES
(1, 'Andre Luiz Leoni', 'andreluizleoni@gmail.com', '202cb962ac59075b964b07152d234b70', '28081992', '1469535779579756231f72e.png', 'TESTE'),
(2, 'Wilson Luiz Leoni', 'wilson@gmail.com', '202cb962ac59075b964b07152d234b70', '12121950', 'padrao.jpg', ''),
(3, 'andre', 'andre@gmail.com', '202cb962ac59075b964b07152d234b70', '12121950', 'padrao.jpg', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`posts_id`);

--
-- Indexes for table `relacionamentos`
--
ALTER TABLE `relacionamentos`
  ADD PRIMARY KEY (`relacionamentos_id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuarios_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `posts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `relacionamentos`
--
ALTER TABLE `relacionamentos`
  MODIFY `relacionamentos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuarios_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
