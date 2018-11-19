CREATE DATABASE projetoIntegrador;
USE projetoIntegrador;

CREATE TABLE Funcionario (
        id INTEGER PRIMARY KEY auto_increment,
        nome VARCHAR(100),
        email VARCHAR(100),
        senha VARCHAR(100),
        status VARCHAR(50)
);


CREATE TABLE Categoria (
        categoria VARCHAR(100) PRIMARY KEY
);

CREATE TABLE Curso (
        curso VARCHAR(100) PRIMARY KEY
);

CREATE TABLE Estudante (
        matricula CHAR(12) PRIMARY KEY,
        nome VARCHAR(100),
        curso VARCHAR(100),
        email VARCHAR(100),
        status VARCHAR(50)
);

CREATE TABLE Livro (
        isbn VARCHAR(100),
        nome VARCHAR(100),
        volume INTEGER,
        autor VARCHAR(100),
        codBarras VARCHAR(100) PRIMARY KEY,
        status VARCHAR(50),
        condicao VARCHAR(100),
        grande_area VARCHAR(100)
);

CREATE TABLE Emprestimo (
        matriculaEstudante CHAR(12),
        codBarrasLivro VARCHAR(100) PRIMARY KEY,
        dataDevolucao DATE,
        statusEntrega VARCHAR(50),
        condicaoEntrega VARCHAR(100),
        condicaoDevolucao VARCHAR(100),
        dataDeEntrega DATE
);

ALTER TABLE Livro ADD CONSTRAINT FK_Livro_2
FOREIGN KEY (grande_area)
REFERENCES Categoria (categoria)
ON DELETE RESTRICT;

ALTER TABLE Estudante ADD CONSTRAINT FK_Estudante_2
FOREIGN KEY (curso)
REFERENCES Curso (curso)
ON DELETE RESTRICT;

ALTER TABLE Emprestimo ADD CONSTRAINT FK_Emprestimo_1
FOREIGN KEY (matriculaEstudante)
REFERENCES Estudante (matricula)
ON DELETE NO ACTION;

ALTER TABLE Emprestimo ADD CONSTRAINT FK_Emprestimo_2
FOREIGN KEY (codBarrasLivro)
REFERENCES Livro (codBarras)
ON DELETE NO ACTION;

INSERT INTO `Funcionario` (`id`, `nome`, `email`, `senha`, `status`) VALUES (NULL, 'admin', 'admin@email.com', 'admin', 'on');
