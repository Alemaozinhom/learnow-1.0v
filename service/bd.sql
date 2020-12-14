-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Dez-2020 às 18:38
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `learnow`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alternatives`
--

CREATE TABLE `alternatives` (
  `ID` int(11) NOT NULL,
  `OPTION` char(1) NOT NULL,
  `TEXT` varchar(80) NOT NULL,
  `CORRECT` tinyint(1) NOT NULL,
  `QUESTION` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `alternatives`
--

INSERT INTO `alternatives` (`ID`, `OPTION`, `TEXT`, `CORRECT`, `QUESTION`) VALUES
(1, 'A', 'none', 1, 1),
(2, 'B', 'none', 1, 2),
(3, 'A', 'isn\'t.', 1, 3),
(4, 'B', 'wasn\'t.', 0, 3),
(5, 'C', 'is.', 0, 3),
(6, 'D', 'was.', 0, 3),
(7, 'A', 'was being.', 0, 4),
(8, 'B', 'is.', 0, 4),
(9, 'C', 'will be.', 1, 4),
(10, 'D', 'was', 0, 4),
(11, 'A', 'is – am – Are – am', 1, 31),
(12, 'B', 'are – am – Are – is', 0, 31),
(13, 'C', 'is – are – Is – am', 0, 31),
(14, 'D', 'are – am – Are – am', 0, 31);

-- --------------------------------------------------------

--
-- Estrutura da tabela `audios`
--

CREATE TABLE `audios` (
  `ID` int(11) NOT NULL,
  `TEXT` varchar(2000) NOT NULL,
  `AUDIO` varchar(50) NOT NULL,
  `Comprehension` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `audios`
--

INSERT INTO `audios` (`ID`, `TEXT`, `AUDIO`, `Comprehension`) VALUES
(1, 'none', 'none', 1),
(2, 'none', 'none', 2),
(3, 'none', 'none', 3),
(4, 'none', 'none', 4),
(5, 'none', 'none', 5),
(6, 'none', 'none', 6),
(7, 'none', 'none', 7),
(8, 'none', 'none', 8),
(9, 'none', 'none', 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `comprehension`
--

CREATE TABLE `comprehension` (
  `ID` int(11) NOT NULL,
  `TITLE` varchar(30) NOT NULL,
  `COST` int(4) NOT NULL,
  `LEVEL` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `comprehension`
--

INSERT INTO `comprehension` (`ID`, `TITLE`, `COST`, `LEVEL`) VALUES
(1, 'Question Words', 100, 1),
(2, 'Expressões idiomaticas', 120, 2),
(3, 'Conditional sentenses', 150, 3),
(4, 'If clauses', 200, 4),
(5, 'Linking Words', 220, 5),
(6, 'Meses do ano', 250, 6),
(7, 'Dias da semanana', 300, 7),
(8, 'Números', 320, 8),
(9, 'First Conditional', 350, 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `comprehension_questions`
--

CREATE TABLE `comprehension_questions` (
  `ID` int(11) NOT NULL,
  `QUESTION` int(11) NOT NULL,
  `Comprehension` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `comprehension_questions`
--

INSERT INTO `comprehension_questions` (`ID`, `QUESTION`, `Comprehension`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 2, 8),
(9, 1, 9),
(10, 1, 1),
(11, 1, 2),
(12, 1, 3),
(13, 1, 4),
(14, 1, 5),
(15, 1, 6),
(16, 1, 7),
(17, 2, 8),
(18, 1, 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `grammar`
--

CREATE TABLE `grammar` (
  `ID` int(11) NOT NULL,
  `TITLE` varchar(30) NOT NULL,
  `COST` int(4) NOT NULL,
  `LEVEL` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `grammar`
--

INSERT INTO `grammar` (`ID`, `TITLE`, `COST`, `LEVEL`) VALUES
(7, 'Verbo to be', 100, 1),
(8, 'Substantivos (Nouns) em inglês', 120, 2),
(9, 'Adjetivos em Inglês', 150, 3),
(10, 'Other e Another', 200, 4),
(11, 'Comparative and superlative', 220, 5),
(12, 'Pronomes em Inglês', 250, 6),
(13, 'Pronomes Pessoais em Inglês', 300, 7),
(14, 'This, that, these e those', 320, 8),
(15, 'Which e What', 350, 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `grammar_questions`
--

CREATE TABLE `grammar_questions` (
  `ID` int(11) NOT NULL,
  `GRAMMAR` int(11) NOT NULL,
  `QUESTION` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `grammar_questions`
--

INSERT INTO `grammar_questions` (`ID`, `GRAMMAR`, `QUESTION`) VALUES
(8, 11, 2),
(9, 10, 1),
(10, 12, 2),
(11, 13, 1),
(12, 8, 2),
(13, 14, 1),
(15, 15, 1),
(16, 7, 3),
(17, 7, 4),
(18, 7, 31);

-- --------------------------------------------------------

--
-- Estrutura da tabela `profiles`
--

CREATE TABLE `profiles` (
  `ID` int(11) NOT NULL,
  `USERNAME` varchar(30) NOT NULL,
  `POINTS` int(4) DEFAULT NULL,
  `USER` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `profiles`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `profiles_comprehension`
--

CREATE TABLE `profiles_comprehension` (
  `ID` int(11) NOT NULL,
  `PROFILE` int(11) NOT NULL,
  `COMPREHENSION` int(11) NOT NULL,
  `STATUS` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `profiles_grammar`
--

CREATE TABLE `profiles_grammar` (
  `ID` int(11) NOT NULL,
  `PROFILE` int(11) NOT NULL,
  `GRAMMAR` int(11) NOT NULL,
  `STATUS` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `profiles_grammar`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `questions`
--

CREATE TABLE `questions` (
  `ID` int(11) NOT NULL,
  `TEXT` varchar(2000) NOT NULL,
  `POINTS` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `questions`
--

INSERT INTO `questions` (`ID`, `TEXT`, `POINTS`) VALUES
(1, 'none', 50),
(2, 'none', 50),
(3, '<p>Maryann Mott</p>\r\n<br>\r\n\r\n<p>Feline asthma <b>TO BE</b> a new disease. It was first described in scientific literature more than 90 years ago, says veterinarian Philip Padrid of the Family Pet Animal Hospital in Chicago.</p>\r\n\r\n<p>Nicki Reed, a veterinarian at the University of Edinburghs Hospital for Small Animals, says that when a coughing cat is brought to the clinic, she must first establish if cause is infection, asthma, or something more sinister, like a lung mass.</p>\r\n\r\n<p>To do this, Reed usually performs an x-ray, takes a lung fluid sample, and conducts a bronchcoscopy _ an examination that uses a flexible microscope inserted into the cats airway.</p>\r\n\r\n<p>Most of the time, asthma is a mild disease, Reed says. But in some cases cats lungs collapse or their ribs fracture due to difficulty in breathing.</p>\r\n\r\n<p>I think if we can identify asthmatic cats quite early and get treatments on board to suppress their cough, then hopefully we can avoid them coming to such extremes, she said.</p>\r\n\r\n<br>\r\n<h5>The correct form of the verb in Feline asthma <b>TO BE</b> a new disease. is</h5>', 30),
(4, '<h5>Robotic Engineers:</h5>\r\n<p>Engineers [TO BE] needed to build robots that do everything from assembling machinery to caring for aging parents.</p>\r\n<br>\r\n<h5>Tech Teachers:</h5>\r\n<p>As technology use increases in all industries, more adult education teachers are needed to give workers the skills to survive. About half of all adults are currently enrolled in an adult-education class.</p>\r\n<br>\r\n<h5>Tech Support:</h5>\r\n<p>Technology isn’t infallible, and skilled workers who can fix frustrating problems are rarely needed. Estimates show a 222 percentage boost in computer-support jobs by 2008.</p>\r\n<br>\r\n<h5>The correct form of the verb to be in the first paragraph is</h5>', 30),
(31, '<p><b>George: </b>Hi Paul. This ________ Mariah, my cousin.</p>\r\n<p><b>Paul: </b>Hello Mariah. I ______ Paul. _______ you a student?</p>\r\n<p><b>Mariah: </b>No, I __________ a doctor. I work in Atlanta.</p>', 30);

-- --------------------------------------------------------

--
-- Estrutura da tabela `texts`
--

CREATE TABLE `texts` (
  `ID` int(11) NOT NULL,
  `TEXT` varchar(2000) NOT NULL,
  `GRAMMAR` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `texts`
--

INSERT INTO `texts` (`ID`, `TEXT`, `GRAMMAR`) VALUES
(8, '<p>\r\n    O verbo to be é um dos verbos mais utilizados da língua inglesa e pode ser traduzido como ser ou estar.\r\n    Não existe uma regra para saber quando ele significa ser e quando significa estar. É preciso compreender o significado da mensagem expressa como um todo, para então entender o sentido do verbo na frase.\r\n    O verbo to be é classificado como verbo irregular, uma vez que não segue as regras de formação do passado simples e do particípio passado.\r\n    Ele pode ser usado como verbo principal e como verbo auxiliar de alguns tempos verbais.\r\n</p>\r\n\r\n<br>\r\n<br>\r\n\r\n<h5>\r\n    No Simple Present (presente simples), as flexões do verbo to be são am, is e are.\r\n</h5>\r\n\r\n<img src=\'view/img/lesson/lesson1_1.png\'>\r\n\r\n<br>\r\n\r\n<h5>\r\n    No Simple Past (passado simples), as flexões do verbo to be são was e were.\r\n</h5>\r\n\r\n<br>\r\n\r\n<img src=\'view/img/lesson/lesson1_1.png\'>\r\n\r\n<h5>\r\n    No Simple Future (futuro simples), as flexões do verbo to be são sempre will be.\r\n</h5>\r\n\r\n<br>\r\n\r\n<img src=\'view/img/lesson/lesson1_1.png\'>\r\n\r\n<br>\r\n\r\n<h3>\r\n    Verbo to be como verbo auxiliar\r\n</h3>\r\n\r\n<p>\r\n    O verbo to be também pode ser usado como verbo auxiliar. Isso acontece quando ele tem a função de ajudar outro verbo, o verbo principal.\r\n</p>\r\n\r\n<p>\r\n    Como <b>verbo auxiliar</b>, o verbo <i>to be</i> não muda o significado do verbo principal e, por isso, não tem tradução\r\n</p>\r\n\r\n<br>\r\n\r\n<h5>\r\n    <b>Formação da voz passiva</b>\r\n</h3>\r\n\r\n<p>\r\n    A voz passiva é utilizada para relatar o que aconteceu com o objeto da ação. A formação da voz passiva segue a seguinte estrutura:\r\n</p>\r\n\r\n<label class=\'p\' style=\'color:dimgray\'>to be + past participle do verbo principal</label>\r\n\r\n<br><br>\r\n<p>\r\n    <b>Exemplos:</b> My birthday cake was made by my mother. (Meu bolo de aniversário foi feito pela minha mãe.)\r\n</p>', 7),
(9, 'none', 8),
(10, 'none', 9),
(11, 'none', 10),
(12, 'none', 11),
(13, 'none', 12),
(14, 'none', 13),
(15, 'none', 14),
(16, 'none', 15);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `PASSWORD` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `alternatives`
--
ALTER TABLE `alternatives`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `QUESTION` (`QUESTION`);

--
-- Índices para tabela `audios`
--
ALTER TABLE `audios`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Comprehension` (`Comprehension`);

--
-- Índices para tabela `comprehension`
--
ALTER TABLE `comprehension`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `comprehension_questions`
--
ALTER TABLE `comprehension_questions`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Comprehension` (`Comprehension`),
  ADD KEY `QUESTION` (`QUESTION`);

--
-- Índices para tabela `grammar`
--
ALTER TABLE `grammar`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `grammar_questions`
--
ALTER TABLE `grammar_questions`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `GRAMMAR` (`GRAMMAR`),
  ADD KEY `QUESTION` (`QUESTION`);

--
-- Índices para tabela `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `USER` (`USER`);

--
-- Índices para tabela `profiles_comprehension`
--
ALTER TABLE `profiles_comprehension`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `PROFILE` (`PROFILE`),
  ADD KEY `COMPREHENSION` (`COMPREHENSION`);

--
-- Índices para tabela `profiles_grammar`
--
ALTER TABLE `profiles_grammar`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `PROFILE` (`PROFILE`),
  ADD KEY `GRAMMAR` (`GRAMMAR`);

--
-- Índices para tabela `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `texts`
--
ALTER TABLE `texts`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `GRAMMAR` (`GRAMMAR`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `EMAIL` (`EMAIL`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alternatives`
--
ALTER TABLE `alternatives`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `audios`
--
ALTER TABLE `audios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `comprehension`
--
ALTER TABLE `comprehension`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `comprehension_questions`
--
ALTER TABLE `comprehension_questions`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `grammar`
--
ALTER TABLE `grammar`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `grammar_questions`
--
ALTER TABLE `grammar_questions`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `profiles`
--
ALTER TABLE `profiles`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `profiles_comprehension`
--
ALTER TABLE `profiles_comprehension`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `profiles_grammar`
--
ALTER TABLE `profiles_grammar`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `questions`
--
ALTER TABLE `questions`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `texts`
--
ALTER TABLE `texts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `alternatives`
--
ALTER TABLE `alternatives`
  ADD CONSTRAINT `alternatives_ibfk_1` FOREIGN KEY (`QUESTION`) REFERENCES `questions` (`ID`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `audios`
--
ALTER TABLE `audios`
  ADD CONSTRAINT `audios_ibfk_1` FOREIGN KEY (`Comprehension`) REFERENCES `comprehension` (`ID`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `comprehension_questions`
--
ALTER TABLE `comprehension_questions`
  ADD CONSTRAINT `Comprehension_questions_ibfk_1` FOREIGN KEY (`Comprehension`) REFERENCES `comprehension` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `Comprehension_questions_ibfk_2` FOREIGN KEY (`QUESTION`) REFERENCES `questions` (`ID`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `grammar_questions`
--
ALTER TABLE `grammar_questions`
  ADD CONSTRAINT `grammar_questions_ibfk_1` FOREIGN KEY (`GRAMMAR`) REFERENCES `grammar` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `grammar_questions_ibfk_2` FOREIGN KEY (`QUESTION`) REFERENCES `questions` (`ID`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_ibfk_1` FOREIGN KEY (`USER`) REFERENCES `users` (`ID`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `profiles_comprehension`
--
ALTER TABLE `profiles_comprehension`
  ADD CONSTRAINT `profiles_comprehension_ibfk_1` FOREIGN KEY (`PROFILE`) REFERENCES `profiles` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `profiles_comprehension_ibfk_2` FOREIGN KEY (`COMPREHENSION`) REFERENCES `comprehension` (`ID`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `profiles_grammar`
--
ALTER TABLE `profiles_grammar`
  ADD CONSTRAINT `profiles_grammar_ibfk_1` FOREIGN KEY (`PROFILE`) REFERENCES `profiles` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `profiles_grammar_ibfk_2` FOREIGN KEY (`GRAMMAR`) REFERENCES `grammar` (`ID`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `texts`
--
ALTER TABLE `texts`
  ADD CONSTRAINT `texts_ibfk_1` FOREIGN KEY (`GRAMMAR`) REFERENCES `grammar` (`ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
