CREATE TABLE Funcionario (
    id INTEGER PRIMARY KEY,
    nome VARCHAR,
    email VARCHAR,
    senha VARCHAR,
    status INTEGER
);

CREATE TABLE Categoria (
    categoria VARCHAR PRIMARY KEY
);

CREATE TABLE Estudante (
    matricula INTEGER PRIMARY KEY,
    nome VARCHAR,
    curso VARCHAR,
    turma VARCHAR,
    email VARCHAR,
    status INTEGER
);

CREATE TABLE Livro (
    isbn INTEGER,
    nome VARCHAR,
    volume INTEGER,
    autor VARCHAR,
    qtde_estoque INTEGER,
    codBarras INTEGER PRIMARY KEY,
    status INTEGER,
    condicao VARCHAR,
    grande_area VARCHAR
);

CREATE TABLE Emprestimo (
    matriculaEstudante INTEGER,
    codBarrasLivro INTEGER,
    verificacaoEntrega INTEGER,
    id INTEGER PRIMARY KEY,
    dataDevolucao DATE,
    periodoEntrega DATE,
    statusEntrega INTEGER,
    condicaoEntrega VARCHAR,
    condicaoDevolucao VARCHAR,
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
