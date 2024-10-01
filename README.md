Estudo de Caso - Sistema de Gerenciamento de Biblioteca
Uma ONG, chamada Livro Amigo, ajuda crianças de baixa renda de uma comunidade em sua educação básica. Atualmente, recebeu uma doação de mais de 1000 livros e está montando a sua biblioteca. Livros dos mais variados gêneros e para as mais variadas idades e categorizá-los em (infantil, juvenil e adulto). Eles querem emprestar os livros para as crianças e os pais das crianças ou adultos da mesma família. Para isso, eles precisam de um sistema que gerencie todo o acervo, livros disponíveis, livros que estão emprestados e prazo para devolução, localização dos livros (em que prateleira se encontram). O sistema deve fazer o cadastro dos usuários da biblioteca da ONG. A ONG decidiu que é necessário uma limitação do empréstimo de um livro por pessoa, assim que ela devolver o livro pode solicitar um novo, também um prazo máximo de dois meses para a leitura do livro. Se o usuário não devolver no prazo deverá sofrer uma penalização de 30 dias sem poder requisitar novo livro. O sistema também é importante que haja relatórios, permitindo o controle dos empréstimos e dos livros disponíveis no acervo. A ONG vai permitir que o usuário possa consultar livros que estão em posse do usuário e seus prazos, bastando se autenticar no sistema WEB para isso (fazer login), também podem consultar por meio do seu usuário o sistema WEB. No caso dos pais, o sistema WEB deve também permitir gerenciar os livros dos seus seus filhos ou familiares adultos.

- RF001 - O sistema deve manter livros.
- RN001 - Dados do livro: (ISBN, titulo, autor, classificacao, sinopse, capa, estoque, gêneros)

- RF002 - O sistema deve manter usuários.
- RN002 - Dados do usuário: (CPF, nome, email, data de nascimento, senha, tipo de usuário)

- RF003 - O sistema deve manter empréstimos.
- RN003 - Dados do empréstimo: (ID, data empréstimo, data devolução, status, prazo de entrega)
- RN004 - O sistema deve limitar empréstimos de livros em um por pessoa.
- RN005 - O sistema só permitirá empréstimo de um novo livro, com o atual devolvido.

- RF004 - O sistema deve manter prazo de devolução.
- RN006 - Dados da devolução: (prazo e data real da devolução)
- RN007 - O prazo de devolução será de 2 meses.

- RF005 - O sistema deve manter penalizações.
- RN008 - A penalização será de 30 dias sem poder fazer empréstimo de um novo livro.

- RF006 - O sistema deve mostrar relatórios de livros dispoíveis no acevo.
- RN009: Os relatórios devem incluir informações como título, autor, ISBN, gênero e status de disponibilidade dos livros.

- RF007 - O sistema deve manter relatórios de empréstimos.
- RN010: Os relatórios devem registrar a data de empréstimo, data de devolução prevista e status do empréstimo (ativo, concluído, atrasado).

- RF008 - O sistema deve permitir que pais de usuários gerenciem seus livros.
- RN011: Os pais devem poder visualizar todos os livros emprestados por seus filhos, incluindo status e datas de devolução.
- RN012: Os pais devem ter a opção de solicitar a renovação de empréstimos e visualizar relatórios de atividades de leitura (máximo 2).

- RNF001 - O sistema deverá ser WEB.
- RNF002 - O sistema deverá ser desenvolvido com arquitetura em MVC.
- RNF003 - O sistema deverá ter banco de dados MySQL.
- RNF004 - O sistema deverá ser desenvolvido em linguagem de programação Python.
- RNF005 - O ststema deverá ter auxílio do Django Framework.
