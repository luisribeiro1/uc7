CREATE TABLE `avaliacoes` (
  `idAvaliacao` int(11) NOT NULL,
  `nota` varchar(11) DEFAULT NULL,
  `comentario` text DEFAULT NULL,
  `data` date DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `situacao` varchar(50) DEFAULT NULL,
  `idCardapio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `avaliacoes`
--

INSERT INTO `avaliacoes` (`idAvaliacao`, `nota`, `comentario`, `data`, `nome`, `email`, `situacao`, `idCardapio`) VALUES
(2, '5', 'Muito gostoso e o ambiente muito aconchegante e familiar', '2024-09-17', 'Joana da Silva', 'joanads@email.com', 'ok', 1),
(3, '3', 'Restaurante excelente e ótimo atendimento, mas o prato chegou frio à mesa', '2024-06-18', 'Guilherme Sampaio', 'Sampaio_17@email.com', 'ok', 2),
(5, '5', 'Comida excelente, me fez lembrar da minha infância no interior de MG', '2024-08-24', 'Renan Dumont', 'renan123@email.com', 'ok', 3),
(7, '5', 'Excelente noite de inauguração de um restaurante muito promissor em nossa cidade', '2024-05-17', 'Roberto Machado', 'machado38@email.com', 'ok', 4),
(11, '5', 'A feijoada é uma explosão de sabores! Feita com feijão preto e carnes selecionadas, é perfeita para compartilhar. Um prato que traz aconchego e tradição brasileira a cada garfada!', '2024-08-08', 'Juliana Costa', 'juliana.costa@email.com', 'ok', 17),
(12, '4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vehicula velit sit amet justo tincidunt, a maximus nulla tincidunt. Integer lacinia dui sed lectus tincidunt, nec vehicula urna tincidunt. Nunc auctor metus id velit facilisis, in consequat nunc tincidunt. Duis euismod est ac neque vehicula, eget vehicula ante pretium. Mauris vulputate neque in ultricies vehicula. Nulla facilisi. Vivamus eget dolor ut nulla volutpat varius. Suspendisse potenti. Sed at augue sit amet lectus gravida lobortis.', '2024-11-14', 'José Henrique', 'jose.xonadao@email.com', 'novo', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cardapio`
--

CREATE TABLE `cardapio` (
  `idCardapio` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `preco` decimal(10,2) DEFAULT NULL,
  `tipo` varchar(100) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `cardapio`
--

INSERT INTO `cardapio` (`idCardapio`, `nome`, `preco`, `tipo`, `descricao`, `foto`, `status`) VALUES
(1, 'Prato feito', 21.90, 'Prato quente', 'Uma refeição deliciosa e completa, composta por arroz soltinho, feijão temperado, uma porção de carne grelhada (pode ser bife, frango ou carne de porco) e uma salada fresca. Acompanha farofa crocante e uma fatia de laranja para um toque especial. Uma opção prática e saborosa para qualquer hora do dia!', 'https://cdn.pixabay.com/photo/2015/09/09/22/01/steak-933667_1280.jpg', 1),
(2, 'Pão de queijo', 5.00, 'Prato quente', 'Deliciosos e quentinhos, nossos pães de queijo são feitos com polvilho e queijo minas, garantindo uma textura macia por dentro e crocante por fora. Perfeitos para acompanhar um café ou como um lanche leve a qualquer hora. Uma tradição brasileira que derrete na boca!', 'https://cdn.pixabay.com/photo/2020/03/25/19/57/bread-4968502_1280.jpg', 1),
(3, 'Frango com quiabo', 15.90, 'Prato quente', 'Uma saborosa combinação de pedaços de frango cozidos lentamente com quiabo fresco, temperados com ervas e especiarias que realçam o sabor. Servido com arroz branquinho e angu cremoso, este prato é uma verdadeira delícia da culinária mineira, trazendo conforto e tradição em cada garfada. Ideal para quem aprecia sabores caseiros!', 'https://cdn.pixabay.com/photo/2022/06/07/21/00/chicken-7249273_1280.jpg', 1),
(4, 'Churrasco dos Sonhos', 79.99, 'Prato quente', 'Desfrute de uma experiência única com nosso \"Churrasco dos Sonhos\"! Uma seleção irresistível de carnes grelhadas na brasa, incluindo picanha, linguiça, frango e costela, servidas à vontade. Acompanhe com farofa crocante, vinagrete fresquinho e pão de alho. Perfeito para compartilhar momentos especiais com amigos e família. Prepare-se para um verdadeiro festival de sabores!', 'https://cdn.pixabay.com/photo/2015/11/25/13/51/barbecue-1062083_640.jpg', 1),
(7, 'Cuscuz à Paulista', 18.90, 'Prato quente', 'Uma deliciosa tradição paulista! Nosso Cuscuz à Paulista é preparado com farinha de milho, legumes frescos, e temperos especiais, trazendo um toque caseiro e acolhedor. Finalizado com uma camada de frango desfiado e ovos cozidos, esse prato é leve, nutritivo e perfeito como acompanhamento ou prato principal. Ideal para quem busca sabor e autenticidade em cada garfada!', 'https://www.portalumami.com.br/app/uploads/2021/07/Cuscuz-Paulista2-659x371-1.jpg', 1),
(17, 'Feijoada', 39.90, 'Prato quente', 'Um clássico da culinária brasileira, a feijoada é um prato saboroso e robusto, feito com feijão preto e uma seleção de carnes, como carne de porco, linguiça e costela. Acompanha arroz branco, couve refogada, farofa e laranja, oferecendo um equilíbrio perfeito de sabores. Ideal para compartilhar em refeições com amigos e família.', 'https://cdn.pixabay.com/photo/2020/05/17/14/16/bean-stew-5181845_1280.jpg', 1),
(18, 'Moqueca', 49.90, 'Prato quente', 'Delicioso ensopado de peixe ou frutos do mar, cozido com leite de coco, azeite de dendê, cebola, pimentão e coentro. Servido com arroz, é uma explosão de sabores tropicais.', 'https://cdn.pixabay.com/photo/2016/10/21/23/33/stew-1759394_1280.jpg', 1),
(19, 'Bacalhau à Brás', 42.90, 'Prato quente', 'Um clássico português, este prato é feito com bacalhau desfiado, ovos mexidos, cebola e batata palha, finalizado com azeitonas e salsinha. Uma combinação perfeita de texturas e sabores.', 'https://foodandroad.com/wp-content/uploads/2021/04/bacalhau-bras-1.jpg', 1),
(20, 'Frango à Parmegiana', 38.90, 'Prato quente', 'Peito de frango empanado e frito, coberto com molho de tomate e queijo derretido. Servido com arroz e fritas, é uma opção reconfortante e saborosa.', 'https://padariapiriquito.lojasgoup.com/_core/_uploads/140/2022/10/1602291022jck9c8dek2.jpg', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `disponibilidade`
--

CREATE TABLE `disponibilidade` (
  `numero_mesa` int(11) DEFAULT NULL,
  `periodo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `disponibilidade`
--

INSERT INTO `disponibilidade` (`numero_mesa`, `periodo`) VALUES
(24, 'quarta-tarde'),
(24, 'quarta-noite'),
(24, 'quinta-tarde'),
(24, 'quinta-noite'),
(24, 'sexta-tarde'),
(24, 'sexta-noite'),
(24, 'sabadoo-tarde'),
(24, 'sabadoo-noite'),
(24, 'domingo-tarde'),
(24, 'domingo-noite');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mesas`
--

CREATE TABLE `mesas` (
  `id` int(11) NOT NULL,
  `lugares` int(11) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `caracteristicas` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `mesas`
--

INSERT INTO `mesas` (`id`, `lugares`, `tipo`, `caracteristicas`) VALUES
(1, 8, 'Redonda', ''),
(2, 4, 'Quadrada', 'ar-condicionado,acessibilidade,privacidade,espaço-kids'),
(3, 8, 'Quadrada', ''),
(4, 4, 'Oval', ''),
(5, 8, 'Quadrada', ''),
(6, 6, 'Retangular', ''),
(7, 8, 'Redonda', ''),
(8, 4, 'Retangular', ''),
(9, 8, 'Quadrada', ''),
(10, 4, 'Quadrada', ''),
(11, 4, 'Quadrada', ''),
(12, 4, 'Quadrada', ''),
(13, 8, 'Redonda', ''),
(14, 7, 'Oval', ''),
(15, 8, 'Quadrada', ''),
(16, 6, 'Retangular', ''),
(17, 2, 'Redonda', ''),
(18, 10, 'Retangular', ''),
(19, 8, 'Quadrada', ''),
(20, 4, 'Quadrada', ''),
(21, 4, 'Quadrada', ''),
(22, 6, 'Redonda', ''),
(23, 4, 'Redonda', 'fumantes,ar-condicionado,acessibilidade,espaço-kids'),
(24, 10, 'Retangular', 'ar-condicionado,acessibilidade,privacidade,espaço-kids');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `nivelAcesso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nome`, `usuario`, `senha`, `nivelAcesso`) VALUES
(1, 'Glauber Ruiz', 'glauberruiz', '$2y$10$HVLxfnvLz9xBIKkUkq3d.uYjLBFALsnqrgk8h3840rLGMdFXoc2qG', 1),
(6, 'Diogo Fernandes', 'dididagazin', '$2y$10$agjfNqTWpO0iekuljSJj7OuOVWSUfCD2YOXKsNDi30ytotLTu0rKq', 3),
(7, 'José Henrique', 'zezin', '$2y$10$mBxQSMGOZKj9aXk3OpZksO6zm0gdt.7mY9zVpaLq7QzKRYU3ZC4HO', 2);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  ADD PRIMARY KEY (`idAvaliacao`),
  ADD KEY `idCardapio` (`idCardapio`);

--
-- Índices para tabela `cardapio`
--
ALTER TABLE `cardapio`
  ADD PRIMARY KEY (`idCardapio`);

--
-- Índices para tabela `disponibilidade`
--
ALTER TABLE `disponibilidade`
  ADD KEY `numero_mesa` (`numero_mesa`);

--
-- Índices para tabela `mesas`
--
ALTER TABLE `mesas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  MODIFY `idAvaliacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `cardapio`
--
ALTER TABLE `cardapio`
  MODIFY `idCardapio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  ADD CONSTRAINT `avaliacoes_ibfk_1` FOREIGN KEY (`idCardapio`) REFERENCES `cardapio` (`idCardapio`);

--
-- Limitadores para a tabela `disponibilidade`
--
ALTER TABLE `disponibilidade`
  ADD CONSTRAINT `disponibilidade_ibfk_1` FOREIGN KEY (`numero_mesa`) REFERENCES `mesas` (`id`);
COMMIT;
