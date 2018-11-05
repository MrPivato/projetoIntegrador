<?php

class Estudante implements IBaseModelo{
    private $id;
    private $nome;
    private $cpf;
    private $email;
    private $conn;
    private $stmt;
    
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

        public function getNome() {
        return $this->nome;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function setEmail($email) {
        $this->email = $email;
    }
    
    public function __construct() {
        //Cria conexão com o banco
        $this->conn = Database::conectar();
    }

    public function __destruct(){
        //Fecha a conexão
        Database::desconectar();
    }

    public function inserir(){
        try{
            //Comando SQL para inserir um estudante
            $query="INSERT INTO Estudante (nome,cpf,email) VALUES (:nome,:cpf,:email) ";

            $this->stmt= $this->conn->prepare($query);

            $this->stmt->bindValue(':nome', $this->nome, PDO::PARAM_STR);
            $this->stmt->bindValue(':cpf', $this->cpf, PDO::PARAM_STR);
            $this->stmt->bindValue(':email', $this->email, PDO::PARAM_STR);

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
            
            //Comando SQL para inserir um estudante
            $query="UPDATE Estudante SET nome = :nome, cpf = :cpf, email = :email  WHERE id=:id ";
            $this->stmt= $this->conn->prepare($query);

            $this->stmt->bindValue(':nome', $this->nome, PDO::PARAM_STR);
            $this->stmt->bindValue(':cpf', $this->cpf, PDO::PARAM_STR);
            $this->stmt->bindValue(':email', $this->email, PDO::PARAM_STR);
            $this->stmt->bindValue(':id', $this->id, PDO::PARAM_INT);


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
            //Comando SQL para inserir um estudante
            $query="DELETE FROM Estudante WHERE id=:id ";
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
            $estudantes = array();
            
            //Comando SQL para inserir um estudante
            if(!is_null($nome)){
                //Pesquisa pelo nome
                $query="SELECT id,nome,cpf,email FROM Estudante WHERE nome LIKE :nome";
            }else{
                // Pesquisa todos
                $query="SELECT id,nome,cpf,email FROM Estudante";
            }
            $this->stmt= $this->conn->prepare($query);
            if(!is_null($nome))$this->stmt->bindValue(':nome', '%'.$nome.'%', PDO::PARAM_STR);

            if($this->stmt->execute()){
                // Associa cada registro a uma classe Estudante
                // Depois, coloca os resultados em um array
                $estudantes = $this->stmt->fetchAll(PDO::FETCH_CLASS,"Estudante");  
                
            }
            
            return $estudantes;            
        } catch(PDOException $e) {
            echo "<div class='alert alert-danger'>".$e->getMessage()."</div>";   
            return null;
        }
        
    }
    
    public function listarUnico($id){
        
        try{
            $query="SELECT id,nome,cpf,email FROM Estudante WHERE id=:id";
            $this->stmt= $this->conn->prepare($query);
            $this->stmt->bindValue(':id', $id, PDO::PARAM_INT);
            
            if($this->stmt->execute()){
                // Associa o registro a uma classe Estudante
                $estudante = $this->stmt->fetchAll(PDO::FETCH_CLASS,"Estudante");  
                
            }
            
            return $estudante[0];            
        } catch(PDOException $e) {
            echo "<div class='alert alert-danger'>".$e->getMessage()."</div>";   
            return null;
        }
        
    }
    
}
