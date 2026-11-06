# Sistema de Gestão de Biblioteca (PHP) Desenvolvido em 2021

#Sobre o Projeto
Este projeto é um sistema web desenvolvido em PHP com arquitetura de camadas(separação entre conexão, classes de modelo/Beans e objetos de acesso a dados/DAO). O objetivo principal é gerenciar uma biblioteca escolar ou municipal, permitindo o controle completo de livros, exemplares, empréstimos, usuários e perfis de acesso.

#Funcionamento e Estrutura
O sistema está organizado de forma modular para facilitar a manutenção e escalabilidade:
  Gestão de Acervo e Livros: Cadastro e controle de livros e exemplares disponíveis.
  
  Controle de Empréstimos: Módulo voltado para o registo e acompanhamento de empréstimos.

  Carregamento Automático (Autoload): Implementação de um autoloader personalizado para carregar classes dinamicamente (Modelos, DAOs e Conexão) sem a necessidade de múltiplos require manuais.

  Interface Responsiva: Utilização de componentes visuais modernos integrados através de barras de navegação adaptáveis (navbar).

  
  #Tecnologias Utilizadas
  Linguagem: PHP
  Banco de Dados: MySQL(Utilizando a extensão PDO para conexão segura)
  Front-end: HTML5, CSS e componentes de estilos compatíveis com estruturas modernas de navegação.
  Arquitetura: Padrão DAO (DATA Access Object) e Beans

  
