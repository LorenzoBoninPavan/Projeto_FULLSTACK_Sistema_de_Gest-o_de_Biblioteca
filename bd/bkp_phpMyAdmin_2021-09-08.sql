-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Set-2021 às 16:31
-- Versão do servidor: 8.0.26
-- versão do PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_biblioteca`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `assunto`
--

CREATE TABLE `assunto` (
  `id_assunto` int NOT NULL,
  `descricao` varchar(45) DEFAULT NULL,
  `status` tinyint DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `assunto`
--

INSERT INTO `assunto` (`id_assunto`, `descricao`, `status`) VALUES
(1, 'Engenharia de Software', 1),
(2, 'Redes de Computadores', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `autor`
--

CREATE TABLE `autor` (
  `id_autor` int NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `status` tinyint DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `autor`
--

INSERT INTO `autor` (`id_autor`, `nome`, `status`) VALUES
(1, 'Roger Pressman', 1),
(2, 'Ian Sommerville', 1),
(3, 'Andrew S. Tanenbaum', 1),
(4, 'Paul Deitel', 1),
(5, NULL, 1),
(6, 'David Patterson', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `editora`
--

CREATE TABLE `editora` (
  `id_editora` int NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `status` tinyint DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estrutura da tabela `emprestimo`
--

CREATE TABLE `emprestimo` (
  `id_emprestimo` int NOT NULL,
  `data_emprestimo` date DEFAULT NULL,
  `date_prev_devolucao` date DEFAULT NULL,
  `data_devolucao` date DEFAULT NULL,
  `id_usu_emprestimo` int NOT NULL,
  `id_usu_funcionario` int NOT NULL,
  `id_status_emprestimo` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estrutura da tabela `exemplar`
--

CREATE TABLE `exemplar` (
  `id_exemplar` int NOT NULL,
  `data_aquisicao` date DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  `id_livro` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estrutura da tabela `exemplar_has_emprestimo`
--

CREATE TABLE `exemplar_has_emprestimo` (
  `id_exemplar` int NOT NULL,
  `id_emprestimo` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro`
--

CREATE TABLE `livro` (
  `id_livro` int NOT NULL,
  `titulo` varchar(45) DEFAULT NULL,
  `edicao` int DEFAULT NULL,
  `ano` int DEFAULT NULL,
  `id_assunto` int NOT NULL,
  `id_editora` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro_has_autor`
--

CREATE TABLE `livro_has_autor` (
  `id_livro` int NOT NULL,
  `id_autor` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

CREATE TABLE `perfil` (
  `id_perfil` int NOT NULL,
  `descricao` varchar(45) DEFAULT NULL,
  `status` tinyint DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estrutura da tabela `status_emprestimo`
--

CREATE TABLE `status_emprestimo` (
  `id_status_emprestimo` int NOT NULL,
  `descricao` varchar(45) DEFAULT NULL,
  `status` tinyint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `senha` varchar(45) DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  `id_perfil` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `assunto`
--
ALTER TABLE `assunto`
  ADD PRIMARY KEY (`id_assunto`);

--
-- Índices para tabela `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`id_autor`);

--
-- Índices para tabela `editora`
--
ALTER TABLE `editora`
  ADD PRIMARY KEY (`id_editora`);

--
-- Índices para tabela `emprestimo`
--
ALTER TABLE `emprestimo`
  ADD PRIMARY KEY (`id_emprestimo`),
  ADD KEY `fk_emprestimo_usuario1_idx` (`id_usu_emprestimo`),
  ADD KEY `fk_emprestimo_usuario2_idx` (`id_usu_funcionario`),
  ADD KEY `fk_emprestimo_status_emprestimo1_idx` (`id_status_emprestimo`);

--
-- Índices para tabela `exemplar`
--
ALTER TABLE `exemplar`
  ADD PRIMARY KEY (`id_exemplar`),
  ADD KEY `fk_exemplar_livro1_idx` (`id_livro`);

--
-- Índices para tabela `exemplar_has_emprestimo`
--
ALTER TABLE `exemplar_has_emprestimo`
  ADD PRIMARY KEY (`id_exemplar`,`id_emprestimo`),
  ADD KEY `fk_exemplar_has_emprestimo_emprestimo1_idx` (`id_emprestimo`),
  ADD KEY `fk_exemplar_has_emprestimo_exemplar1_idx` (`id_exemplar`);

--
-- Índices para tabela `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`id_livro`),
  ADD KEY `fk_livro_assunto1_idx` (`id_assunto`),
  ADD KEY `fk_livro_editora1_idx` (`id_editora`);

--
-- Índices para tabela `livro_has_autor`
--
ALTER TABLE `livro_has_autor`
  ADD PRIMARY KEY (`id_livro`,`id_autor`),
  ADD KEY `fk_livro_has_autor_autor1_idx` (`id_autor`),
  ADD KEY `fk_livro_has_autor_livro1_idx` (`id_livro`);

--
-- Índices para tabela `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Índices para tabela `status_emprestimo`
--
ALTER TABLE `status_emprestimo`
  ADD PRIMARY KEY (`id_status_emprestimo`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `fk_usuario_perfil1_idx` (`id_perfil`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `assunto`
--
ALTER TABLE `assunto`
  MODIFY `id_assunto` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `autor`
--
ALTER TABLE `autor`
  MODIFY `id_autor` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `editora`
--
ALTER TABLE `editora`
  MODIFY `id_editora` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `emprestimo`
--
ALTER TABLE `emprestimo`
  MODIFY `id_emprestimo` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `exemplar`
--
ALTER TABLE `exemplar`
  MODIFY `id_exemplar` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `livro`
--
ALTER TABLE `livro`
  MODIFY `id_livro` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id_perfil` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `status_emprestimo`
--
ALTER TABLE `status_emprestimo`
  MODIFY `id_status_emprestimo` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `emprestimo`
--
ALTER TABLE `emprestimo`
  ADD CONSTRAINT `fk_emprestimo_status_emprestimo1` FOREIGN KEY (`id_status_emprestimo`) REFERENCES `status_emprestimo` (`id_status_emprestimo`),
  ADD CONSTRAINT `fk_emprestimo_usuario1` FOREIGN KEY (`id_usu_emprestimo`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `fk_emprestimo_usuario2` FOREIGN KEY (`id_usu_funcionario`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `exemplar`
--
ALTER TABLE `exemplar`
  ADD CONSTRAINT `fk_exemplar_livro1` FOREIGN KEY (`id_livro`) REFERENCES `livro` (`id_livro`);

--
-- Limitadores para a tabela `exemplar_has_emprestimo`
--
ALTER TABLE `exemplar_has_emprestimo`
  ADD CONSTRAINT `fk_exemplar_has_emprestimo_emprestimo1` FOREIGN KEY (`id_emprestimo`) REFERENCES `emprestimo` (`id_emprestimo`),
  ADD CONSTRAINT `fk_exemplar_has_emprestimo_exemplar1` FOREIGN KEY (`id_exemplar`) REFERENCES `exemplar` (`id_exemplar`);

--
-- Limitadores para a tabela `livro`
--
ALTER TABLE `livro`
  ADD CONSTRAINT `fk_livro_assunto1` FOREIGN KEY (`id_assunto`) REFERENCES `assunto` (`id_assunto`),
  ADD CONSTRAINT `fk_livro_editora1` FOREIGN KEY (`id_editora`) REFERENCES `editora` (`id_editora`);

--
-- Limitadores para a tabela `livro_has_autor`
--
ALTER TABLE `livro_has_autor`
  ADD CONSTRAINT `fk_livro_has_autor_autor1` FOREIGN KEY (`id_autor`) REFERENCES `autor` (`id_autor`),
  ADD CONSTRAINT `fk_livro_has_autor_livro1` FOREIGN KEY (`id_livro`) REFERENCES `livro` (`id_livro`);

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_perfil1` FOREIGN KEY (`id_perfil`) REFERENCES `perfil` (`id_perfil`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
