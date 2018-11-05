<?php


class Livro implements IBaseModelo {
    private $id;
    private $nome;
    private $serie;
    
    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getSerie() {
        return $this->serie;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setSerie($serie) {
        $this->serie = $serie;
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
            //Comando SQL para inserir um livro
            $query="INSERT INTO Livro (nome,serie) VALUES (:nome,:serie) ";

            $this->stmt= $this->conn->prepare($query);

            $this->stmt->bindValue(':nome', $this->nome, PDO::PARAM_STR);
            $this->stmt->bindValue(':serie', $this->serie, PDO::PARAM_INT);
            

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
            
            //Comando SQL para inserir um livro
            $query="UPDATE Livro SET nome = :nome, serie = :serie  WHERE id=:id ";
            $this->stmt= $this->conn->prepare($query);

            $this->stmt->bindValue(':nome', $this->nome, PDO::PARAM_STR);
            $this->stmt->bindValue(':serie', $this->serie, PDO::PARAM_INT);
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
            //Comando SQL para inserir um livro
            $query="DELETE FROM Livro WHERE id=:id ";
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
            $livros = array();
            
            //Comando SQL para inserir um livro
            if(!is_null($nome)){
                //Pesquisa pelo nome
                $query="SELECT id,nome,serie FROM Livro WHERE nome LIKE :nome";
            }else{
                // Pesquisa todos
                $query="SELECT id,nome,serie FROM Livro";
            }
            $this->stmt= $this->conn->prepare($query);
            if(!is_null($nome))$this->stmt->bindValue(':nome', '%'.$nome.'%', PDO::PARAM_STR);

            if($this->stmt->execute()){
                // Associa cada registro a uma classe Livro
                // Depois, coloca os resultados em um array
                $livros = $this->stmt->fetchAll(PDO::FETCH_CLASS,"Livro");  
                
            }
            
            return $livros;            
        } catch(PDOException $e) {
            echo "<div class='alert alert-danger'>".$e->getMessage()."</div>";   
            return null;
        }
        
    }
    
    public function listarUnico($id){
        
        try{
            $query="SELECT id,nome,serie FROM Livro WHERE id=:id";
            $this->stmt= $this->conn->prepare($query);
            $this->stmt->bindValue(':id', $id, PDO::PARAM_INT);
            
            if($this->stmt->execute()){
                // Associa o registro a uma classe Livro
                $livro = $this->stmt->fetchAll(PDO::FETCH_CLASS,"Livro");  
                
            }
            
            return $livro[0];            
        } catch(PDOException $e) {
            echo "<div class='alert alert-danger'>".$e->getMessage()."</div>";   
            return null;
        }
        
    }
    
}
