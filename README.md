__Nota:__ *Esta branch do site foi desenvolvida apenas para que uma demonstração dele fosse possível de se hospedar no __GitHub Pages__, por este motivo toda e qualquer __interação com o banco de dados foi removida__, desbilitando a seção de dúvidas.*

# Site da Feira das Profissões
 Um projeto de um portal para divulgar o **Curso Técnico em Administação da E.E.E.P Profª Abigail Sampaio** em um evento chamado **Feira das Profissões**, que tem a finalidade de apresentar os cursos da escola para os estudantes do 9° ano que tem a pretenção de ingressar no ensino médio profissional.


## Mas por que um site?
 Comecei a desenvolver este site em **2020**, por vontade própria, pois senti a necessidade de *"virtualizar"* este evento que não iria mais acontecer presencialmente devido a **pandemia do vírus Covid-19**, o Coronavírus, que paralisou totalmente todas as atividades escolares do jeito que conheciamos antes. O ensino a distância se tornou uma realidade, então por que não tornar os eventos escolares virtuais uma realidade também?

## O que terá no site?
 1. As **matérias** do curso do 1° ao 3° ano com um breve resumo do que se trata.
 2. Uma página para informar os **objetivos do curso**.
 3. **Currículo** dos professores da base técnica ou **vídeos** falando mais sobre o curso.
    1. Apenas um foi mantido e implementado (O escolhido foram os vídeos).
 4. Uma seção para os alunos enviarem suas **dúvidas**.
 5. Uma página, apenas disponível para os administradores, para **responder as dúvidas** via E-mail.

---
## Etapas do desenvolvimento
 - [x] Desenvolvimento da página principal.
 - [x] Desenvolvimento da página de matérias.
 - [x] Desenvolvimento da página de objetivos.
 - [x] Decisão entre o Currículos ou vídeos.
 - [x] Desenvolvimento da página escolhida.
 - [x] Criação do sistema de banco de dados.
 - [x] Implementação do sistema de perguntas.
 - [x] Elaboração do sistema de login de usuários.
 - [ ] Comprar domínio e Hospedar o site.

 __Nota:__ *O site não poderá ser hospedado gratuitamente no **GitHub** devido a que essa plataforma **não oferece suporte a PHP e a Banco de dados**. Porém uma **versão de demonstração** está disponível clicando [aqui](https://will-shizu.github.io/Feira-das-profissoes).*

---
## Banco de dados

 O sistema de banco de dados é simples, feito em **MySQL** e vai ser acessado via **PHP e JS**, declarei ele como "FeiraAdm" e ele possui **apenas duas tabelas**, uma para armazenar as perguntas e outra para armazenar os dados de login dos administradores.

 **SQL:**
 ```
 CREATE DATABASE FeiraAdm;
 USE FeiraAdm;
 ```


 ### Tabela de dúvidas:

 **Nome** | **Tipo** | **Nulo** | **Chave** | **Default** 
 --- | --- | --- | --- | ---
 id | int unsingned | no | primary | -
 nome | varchar(30) | no | - | -
 email | varchar(100) | no | - | -
 pergunta | varchar(200) | no | - | -
 respondido | tinyint(1) unsigned | no | - | 0
 
 **SQL:**
 `create table duvidas(id int unsigned not null primary key auto_increment, nome varchar(30) not null, email varchar(100) not null, pergunta varchar(200) not null, respondido tinyint(1) unsigned not null default 0) default character set utf8 collate utf8_general_ci;`


 ### Tabela dos usuários:

  **Nome** | **Tipo** | **Nulo** | **Chave** | **Default** 
 --- | --- | --- | --- | ---
 id | int unsigned | no | primary | -
 user | varchar(30) | no | - | -
 senha | varchar(200) | no | - | -

 **SQL:**
 `create table usuarios(id int unsigned not null primary key auto_increment, user varchar(30) not null, senha varchar(200) not null) default character set utf8 collate utf8_general_ci;`

 __Nota:__ *As senhas serão armazenadas utilizando a criptografia **bcrypt**, que é considerada uma das melhores do mercado de segurança da informação e atualmente a mais recomendada para armazenar senhas devido a sua complexidade e ao alto poder computacional necessário para quebrá-la.*
