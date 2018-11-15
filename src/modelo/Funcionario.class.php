<?php

// vars -------------------------------------
class Funcionario implements IBaseModelo{

        private $id;
        private $nome;
        private $curso;
        private $turma;
        private $email;
        private $status;

        private $conn;
        private $stmt;
// ------------------------------------------
// gets -------------------------------------
        public function getId() {
                return $this->id;
        }

        public function getNome() {
                return $this->nome;
        }

        public function getCurso() {
                return $this->curso;
        }

        public function getTurma() {
                return $this->turma;
        }

        public function getEmail() {
                return $this->email;
        }

        public function getStatus() {
                return $this->status;
        }
// ------------------------------------------
// sets -------------------------------------
        public function setId($id) {
                $this->id = $id;
        }

        public function setNome($nome) {
                $this->nome = $nome;
        }

        public function setCurso($curso) {
                $this->curso = $curso;
        }

        public function setTurma($turma) {
                $this->turma = $turma;
        }

        public function setEmail($email) {
                $this->email = $email;
        }

        public function setStatus($status) {
                $this->status = $status;
        }
// ------------------------------------------
        public function __construct() {
                //Cria conexão com o banco
                $this->conn = Database::conectar();
        }

        public function __destruct(){
                //Fecha a conexão
                Database::desconectar();
        }
// ------------------------------------------

        public function inserir(){
                try{
                        //Comando SQL para inserir um funcionario
                        $query="INSERT INTO Funcionario 
                                VALUES (:id, :nome, :curso, :turma, :email, :status) ";

                        $this->stmt= $this->conn->prepare($query);

                        $this->stmt->bindValue(':id', $this->nome, PDO::PARAM_INT);
                        $this->stmt->bindValue(':nome', $this->nome, PDO::PARAM_STR);
                        $this->stmt->bindValue(':curso', $this->curso, PDO::PARAM_STR);
                        $this->stmt->bindValue(':turma', $this->nome, PDO::PARAM_INT);
                        $this->stmt->bindValue(':email', $this->email, PDO::PARAM_STR);
                        $this->stmt->bindValue(':status', $this->nome, PDO::PARAM_INT);

                        if($this->stmt->execute()){
                                return true;
                        }        
                } catch(PDOException $e) {
                        echo "<div class='alert alert-danger'>".$e->getMessage()."</div>";      
                        return false;
                }
        }

        public function alterar(){
                try{

                        //Comando SQL para inserir um funcionario
                        $query="UPDATE Funcionario 
                                SET nome = :nome, 
                                    curso = :curso, 
                                    turma = :turma, 
                                    email = :email, 
                                    status = :status 
                                WHERE id=:id ";
                        $this->stmt= $this->conn->prepare($query);

                        $this->stmt->bindValue(':id', $this->nome, PDO::PARAM_INT);
                        $this->stmt->bindValue(':nome', $this->nome, PDO::PARAM_STR);
                        $this->stmt->bindValue(':curso', $this->curso, PDO::PARAM_STR);
                        $this->stmt->bindValue(':turma', $this->nome, PDO::PARAM_INT);
                        $this->stmt->bindValue(':email', $this->email, PDO::PARAM_STR);
                        $this->stmt->bindValue(':status', $this->nome, PDO::PARAM_INT);


                        if($this->stmt->execute()){
                                return true;
                        }        
                } catch(PDOException $e) {
                        echo "<div class='alert alert-danger'>".$e->getMessage()."</div>";      
                        return false;
                }
        }

        public function excluir(){
                try{
                        //Comando SQL para inserir um funcionario
                        $query="DELETE FROM Funcionario 
                                WHERE id=:id ";
                        $this->stmt= $this->conn->prepare($query);
                        $this->stmt->bindValue(':id', $this->id, PDO::PARAM_INT);
                        if($this->stmt->execute()){
                                return true;
                        }        
                } catch(PDOException $e) {
                        echo "<div class='alert alert-danger'>".$e->getMessage()."</div>";      
                        return false;
                }
        }

        public function listarTodos($nome=null){

                try{
                        $funcionarios = array();

                        //Comando SQL para inserir um funcionario
                        if(!is_null($nome)){
                                //Pesquisa pelo nome
                                $query="SELECT id,nome,curso,turma,email,status FROM Funcionario WHERE nome LIKE :nome";
                        }else{
                                // Pesquisa todos
                                $query="SELECT id,nome,curso,turma,email,status FROM Funcionario";
                        }
                        $this->stmt= $this->conn->prepare($query);
                        if(!is_null($nome))$this->stmt->bindValue(':nome', '%'.$nome.'%', PDO::PARAM_STR);

                        if($this->stmt->execute()){
                                // Associa cada registro a uma classe Funcionario
                                // Depois, coloca os resultados em um array
                                $funcionarios = $this->stmt->fetchAll(PDO::FETCH_CLASS,"Funcionario");  

                        }

                        return $funcionarios;            
                } catch(PDOException $e) {
                        echo "<div class='alert alert-danger'>".$e->getMessage()."</div>";   
                        return null;
                }

        }

        public function listarUnico($id){

                try{
                        $query="SELECT id,nome,curso,turma,email,status FROM Funcionario WHERE id=:id";
                        $this->stmt= $this->conn->prepare($query);
                        $this->stmt->bindValue(':id', $id, PDO::PARAM_INT);

                        if($this->stmt->execute()){
                                // Associa o registro a uma classe Funcionario
                                $funcionario = $this->stmt->fetchAll(PDO::FETCH_CLASS,"Funcionario");  

                        }

                        return $funcionario[0];            
                } catch(PDOException $e) {
                        echo "<div class='alert alert-danger'>".$e->getMessage()."</div>";   
                        return null;
                }

        }
}
