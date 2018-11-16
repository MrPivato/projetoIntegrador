<?php

class Categoria implements IBaseModelo{

        // vars -------------------------------------
        private $categoria;

        private $conn;
        private $stmt;

        // ------------------------------------------
        // gets -------------------------------------
        public function getCategoria() {
                return $this->categoria;
        }        
        // ------------------------------------------
        // sets -------------------------------------
        public function setCategoria($categoria) {
                $this->categoria = $categoria;
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
                        //Comando SQL para inserir um estudante
                        $query="INSERT INTO Categoria 
                                VALUES (:categoria) ";

                        $this->stmt= $this->conn->prepare($query);

                        $this->stmt->bindValue(':categoria', $this->categoria, PDO::PARAM_STR);


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
                        $query="UPDATE Categoria 
                                SET categoria = :categoria

                                WHERE categoria=:categoria ";
                        $this->stmt= $this->conn->prepare($query);

                        $this->stmt->bindValue(':categoria', $this->categoria, PDO::PARAM_STR);



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
                        $query="DELETE FROM Categoria 
                                WHERE categoria=:categoria ";
                        $this->stmt= $this->conn->prepare($query);
                        $this->stmt->bindValue(':categoria', $this->categoria, PDO::PARAM_STR);
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
                                $query="SELECT categoria FROM Categoria WHERE categoria LIKE :categoria";
                        }else{
                                // Pesquisa todos
                                $query="SELECT categoria FROM Categoria";
                        }
                        $this->stmt= $this->conn->prepare($query);
                        if(!is_null($nome))$this->stmt->bindValue(':categoria', '%'.$nome.'%', PDO::PARAM_STR);

                        if($this->stmt->execute()){
                                // Associa cada registro a uma classe Estudante
                                // Depois, coloca os resultados em um array
                                $categoria = $this->stmt->fetchAll(PDO::FETCH_CLASS,"Categoria");  

                        }

                        return $categoria;            
                } catch(PDOException $e) {
                        echo "<div class='alert alert-danger'>".$e->getMessage()."</div>";   
                        return null;
                }

        }

        public function listarUnico($matricula){

                try{
                        $query="SELECT categoria FROM Categoria WHERE categoria=:categoria";
                        $this->stmt= $this->conn->prepare($query);
                        $this->stmt->bindValue(':categoria', $matricula, PDO::PARAM_STR);

                        if($this->stmt->execute()){
                                // Associa o registro a uma classe Categoria
                                $categoria = $this->stmt->fetchAll(PDO::FETCH_CLASS,"Categoria");  

                        }

                        return $categoria[0];            
                } catch(PDOException $e) {
                        echo "<div class='alert alert-danger'>".$e->getMessage()."</div>";   
                        return null;
                }

        }
}
