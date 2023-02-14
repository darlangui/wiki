-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14-Fev-2023 às 14:19
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdwiki`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `author`
--

CREATE TABLE `author` (
  `description` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `author`
--

INSERT INTO `author` (`description`, `user_id`) VALUES
('teste', 1),
('Às vezes ouço passar o vento; e só de ouvir o', 2),
('O mundo é grande e cabe nesta janela sobre o mar. O mar é grande e cabe na cama e no colchão de amar. O amor é grande e cabe no breve espaço de beijar.', 3),
('Renda-se, como eu me rendi. Mergulhe no que você não conhece como eu mergulhei. Não se preocupe em entender, viver ultrapassa qualquer entendimento.', 4),
('Quanto mais nos elevamos, menores parecemos aos olhos daqueles que não sabem voar.', 5),
('TttT', 10),
('', 23),
('', 24),
('', 25),
('agora tenho descrico', 26),
('', 27);

-- --------------------------------------------------------

--
-- Estrutura da tabela `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `category`
--

INSERT INTO `category` (`id`, `name`, `description`) VALUES
(4, 'DSAD', '-----------'),
(5, 'Informação', '-----------'),
(6, 'teste', '-----------'),
(7, 'outro teste', '-----------'),
(8, 'tes', '-----------'),
(9, 'Informacao', '-----------'),
(10, 'teste', '-----------'),
(11, 'dsadashl', '-----------'),
(12, 'post', '-----------');

-- --------------------------------------------------------

--
-- Estrutura da tabela `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date` date DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `post_author_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date` date DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `feedback`
--

INSERT INTO `feedback` (`id`, `description`, `date`, `user_id`) VALUES
(1, 'Esta faltando velocidade no momento da execução do programa.', '2023-01-19', 7),
(11, 'Agora sim é um feedback', '2023-01-25', 1),
(12, 'Ta funfando', '2023-01-25', 1),
(13, 'Ta funfando', '2023-01-25', 1),
(14, 'teste feedback logado', '2023-01-25', 27),
(15, 'teste feedback logado', '2023-01-25', 27);

-- --------------------------------------------------------

--
-- Estrutura da tabela `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `information` varchar(2500) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(45) NOT NULL,
  `image` varchar(2555) DEFAULT NULL,
  `author_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `post`
--

INSERT INTO `post` (`id`, `title`, `information`, `date`, `status`, `image`, `author_user_id`) VALUES
(10, 'Teste', 'Teste', '2023-01-25', 'Aprovado', '71423022386427c1432fa0f2a23c66c8.jpg', 26),
(12, 'dsjakhdjas', 'dsjahdjkas', '2023-01-25', 'Aprovado', 'f846200d4c41c4f1d0c5038915055ce2.jpg', 27),
(13, 'post', 'dsadsad', '2023-01-25', 'Aprovado', '21d157d713033197c8e780a8a6545280.jpg', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `post_has_category`
--

CREATE TABLE `post_has_category` (
  `post_id` int(11) NOT NULL,
  `post_author_user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `post_has_category`
--

INSERT INTO `post_has_category` (`post_id`, `post_author_user_id`, `category_id`) VALUES
(12, 27, 11),
(13, 1, 12);

-- --------------------------------------------------------

--
-- Estrutura da tabela `proofeader`
--

CREATE TABLE `proofeader` (
  `analizy` int(11) NOT NULL,
  `hiring-date` date NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `proofeader`
--

INSERT INTO `proofeader` (`analizy`, `hiring-date`, `user_id`) VALUES
(0, '2023-01-10', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `specialization`
--

CREATE TABLE `specialization` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `date` date NOT NULL,
  `code` varchar(45) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `specialization`
--

INSERT INTO `specialization` (`id`, `name`, `date`, `code`, `description`) VALUES
(1, 'Administração', '2023-01-19', '23218946328794', 'Cursos com duração de 2 ou 3 anos que têm disciplinas mais focadas nos estudos práticos. A formação profissional é mais voltada para atuação em setores mais específicos do mercado, com destaque para as áreas de gestão e administração.'),
(2, 'Arquivística', '2023-01-19', '2321738921', 'Cursos com duração maior, de 4 ou 5 anos. Suas disciplinas têm como foco um estudo mais amplo da área, com maior carga de teoria para uma formação profissional que permita uma atuação mais ampla do profissional.'),
(3, 'Artes Cênicas', '2023-01-19', '232132132131', 'As artes cénicas ou cênicas, chamadas ainda de artes performativas, são artes como música, dança e teatro, que são realizadas para um público'),
(4, 'Análise e Desenvolvimento de Sistemas', '2023-01-11', '2321323214554366786', 'teste2'),
(5, 'Ciência dos Alimentos', '2023-01-19', '839432439821', 'Ciências dos alimentos ou bromatologia é um ramo multidisciplinar que estuda a composição, deterioração, processamento, conservação, elaboração, qualidade e comercialização dos alimentos para o consumidor'),
(6, 'Construção de Edifícios', '2023-01-19', '89324395745894', 'A Construção Civil é um setor importante da economia, que tem a capacidade de gerar uma grande quantidade de empregos, refletindo diretamente nas taxas de desemprego a nível nacional e, inclusive, no Produto Interno Bruto (PIB) do Brasil'),
(7, 'Design Gráfico', '2023-01-19', '43865374923', 'Design Gráfico é a área de conhecimento e a prática profissional específicas relativas ao ordenamento estético-formal de elementos textuais e não-textuais que compõem peças gráficas destinadas à reprodução com objetivo expressamente comunicacional'),
(8, 'Recursos Humanos', '2023-01-19', '768534532876', 'Gestão de Recursos Humanos, Gestão de Pessoas, Administração de Recursos Humanos ou Administração de Pessoas é a aplicação de um conjunto de conhecimentos e técnicas administrativas especializadas'),
(9, 'Jornalismo', '2023-01-19', '54894687231432', 'Jornalismo é a coleta, investigação e análise de informações para a produção e distribuição de relatórios sobre a interação de eventos, fatos, ideias e pessoas que são notícia e que afetam a sociedade em algum grau.'),
(10, 'Engenharia Metalúrgica', '2023-01-19', '49374367459304', 'A Engenharia Metalúrgica é um ramo da engenharia, mais precisamente da Engenharia de Materiais, que é dedicado ao estudo dos materiais metálicos, englobando sua caracterização estrutural, propriedades mecânicas, produção e processamento'),
(14, 'teste', '2003-03-12', '8465165', 'dsahdisaudksa'),
(15, 'Teste', '2023-01-05', '321321321', 'DdadADA'),
(16, 'Teste', '2003-03-12', '348327489532', 'Nao tem mais nada'),
(17, 'Teste', '2003-03-12', '1', 'dsjhkfldjklfsd');

-- --------------------------------------------------------

--
-- Estrutura da tabela `specialization_has_author`
--

CREATE TABLE `specialization_has_author` (
  `specialization_id` int(11) NOT NULL,
  `author_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `image`) VALUES
(1, 'Darlan Guimarães ', 'darlaneduardoguimaraes@gmail.com', 'bicicleta123', '6a30e747223dd8d3c009c61498eaeff4.jpg'),
(2, 'Bernardo Gatto', 'ber@gmail.com', 'tt123098', 'pattern_user.svg'),
(3, 'Guilherme Ulbriki', 'gui@gmail.com', 'tt123094', 'pattern_user.svg'),
(4, 'Rodolfo Adams', 'rodol@gmail.com', '123qwe90', 'pattern_user.svg'),
(5, 'Junior Ulises', 'uli@gmail.com', '123qwe90', 'pattern_user.svg'),
(6, 'Dani Wommer', 'womm@gmail.com', '123098qwe', 'patter_user.svg'),
(7, 'Renato Piovesan', 're@gmail.com', '123qwepoi', 'patter_user.svg'),
(8, 'Vinicius Piovesan', 'vini@gmail.com', '123poi098', 'patter_user.svg'),
(9, 'Juliano Tramm', 'ju@gmail.com', '123poi876', 'patter_user.svg'),
(10, 'Bruna Zancheta', 'bru@gmail.com', 'naoseioqfazer', 'image_woman.svg'),
(23, 'teste', 'teste@gmail.com', '12345', 'pattern_user.svg'),
(24, 'Teste', 'teste123@gmail.com', 'bicicleta738', 'pattern_user.svg'),
(25, 'Tesete', 'test54e@gmail.com', '12345', 'pattern_user.svg'),
(26, 'Guilherme Ulbriki', 'gui123@gmail.com', '123456', 'ba1b64e3bebf80eedbcdda8d912336ed.jpg'),
(27, 'darlan ', 'dar@gmail.com', '123456', '085c5fa2cfccada586514d980e99b52e.jpg');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`user_id`);

--
-- Índices para tabela `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`,`user_id`,`post_id`,`post_author_user_id`),
  ADD KEY `fk_comments_user1_idx` (`user_id`),
  ADD KEY `fk_comments_post1_idx` (`post_id`,`post_author_user_id`);

--
-- Índices para tabela `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`,`user_id`),
  ADD KEY `fk_feedback_user1_idx` (`user_id`);

--
-- Índices para tabela `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`,`author_user_id`),
  ADD KEY `fk_post_author1_idx` (`author_user_id`);

--
-- Índices para tabela `post_has_category`
--
ALTER TABLE `post_has_category`
  ADD PRIMARY KEY (`post_id`,`post_author_user_id`,`category_id`),
  ADD KEY `fk_post_has_category_category1_idx` (`category_id`),
  ADD KEY `fk_post_has_category_post1_idx` (`post_id`,`post_author_user_id`);

--
-- Índices para tabela `proofeader`
--
ALTER TABLE `proofeader`
  ADD PRIMARY KEY (`user_id`);

--
-- Índices para tabela `specialization`
--
ALTER TABLE `specialization`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `specialization_has_author`
--
ALTER TABLE `specialization_has_author`
  ADD PRIMARY KEY (`specialization_id`,`author_user_id`),
  ADD KEY `fk_specialization_has_author_author1_idx` (`author_user_id`),
  ADD KEY `fk_specialization_has_author_specialization1_idx` (`specialization_id`);

--
-- Índices para tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `specialization`
--
ALTER TABLE `specialization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `author`
--
ALTER TABLE `author`
  ADD CONSTRAINT `fk_author_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_comments_post1` FOREIGN KEY (`post_id`,`post_author_user_id`) REFERENCES `post` (`id`, `author_user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comments_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `fk_feedback_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `fk_post_author1` FOREIGN KEY (`author_user_id`) REFERENCES `author` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `post_has_category`
--
ALTER TABLE `post_has_category`
  ADD CONSTRAINT `fk_post_has_category_category1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_post_has_category_post1` FOREIGN KEY (`post_id`,`post_author_user_id`) REFERENCES `post` (`id`, `author_user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `proofeader`
--
ALTER TABLE `proofeader`
  ADD CONSTRAINT `fk_proofeader_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `specialization_has_author`
--
ALTER TABLE `specialization_has_author`
  ADD CONSTRAINT `fk_specialization_has_author_author1` FOREIGN KEY (`author_user_id`) REFERENCES `author` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_specialization_has_author_specialization1` FOREIGN KEY (`specialization_id`) REFERENCES `specialization` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
