CREATE TABLE Funcionario (
    id INTEGER PRIMARY KEY,
    nome VARCHAR(100),
    email VARCHAR(100),
    senha VARCHAR(100),
    status INTEGER
);

CREATE TABLE Categoria (
    categoria VARCHAR(100) PRIMARY KEY
);

CREATE TABLE Estudante (
    matricula BIGINT PRIMARY KEY,
    nome VARCHAR(100),
    curso VARCHAR(100),
    turma VARCHAR(100),
    email VARCHAR(100),
    status INTEGER
);

CREATE TABLE Livro (
    isbn VARCHAR(100),
    nome VARCHAR(100),
    volume INTEGER,
    autor VARCHAR(100),
    qtde_estoque INTEGER,
    codBarras VARCHAR(100) PRIMARY KEY,
    status INTEGER,
    condicao VARCHAR(100),
    grande_area VARCHAR(100)
);

CREATE TABLE Emprestimo (
    matriculaEstudante BIGINT,
    codBarrasLivro VARCHAR(100),
    verificacaoEntrega INTEGER,
    id INTEGER PRIMARY KEY,
    dataDevolucao DATE,
    periodoEntrega DATE,
    statusEntrega INTEGER,
    condicaoEntrega VARCHAR(100),
    condicaoDevolucao VARCHAR(100),
    dataDeEntrega DATE
);
 
ALTER TABLE Livro ADD CONSTRAINT FK_Livro_2
    FOREIGN KEY (grande_area)
    REFERENCES Categoria (categoria)
    ON DELETE RESTRICT;
 
ALTER TABLE Emprestimo ADD CONSTRAINT FK_Emprestimo_1
    FOREIGN KEY (matriculaEstudante)
    REFERENCES Estudante (matricula)
    ON DELETE NO ACTION;
 
ALTER TABLE Emprestimo ADD CONSTRAINT FK_Emprestimo_2
    FOREIGN KEY (codBarrasLivro)
    REFERENCES Livro (codBarras)
    ON DELETE NO ACTION;
 
ALTER TABLE Emprestimo ADD CONSTRAINT FK_Emprestimo_3
    FOREIGN KEY (verificacaoEntrega)
    REFERENCES Funcionario (id)
    ON DELETE NO ACTION;
