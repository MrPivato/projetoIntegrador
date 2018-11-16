<?php

class Curso implements IBaseModelo{

        // vars -------------------------------------
        private $curso;


        private $conn;
        private $stmt;

        // ------------------------------------------
        // gets -------------------------------------
        public function getCurso() {
                return $this->curso;
        }        



        // ------------------------------------------
        // sets -------------------------------------
        public function setCurso($curso) {
                $this->curso = $curso;
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
                        //Comando SQL para inserir um curso
                        $query="INSERT INTO Curso 
                                VALUES (:curso) ";

                        $this->stmt= $this->conn->prepare($query);

                        $this->stmt->bindValue(':curso', $this->curso, PDO::PARAM_STR);


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

                        //Comando SQL para inserir um curso
                        $query="UPDATE Curso 
                                SET curso = :curso

                                WHERE curso=:curso ";
                        $this->stmt= $this->conn->prepare($query);

                        $this->stmt->bindValue(':curso', $this->curso, PDO::PARAM_STR);



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
                        //Comando SQL para inserir um curso
                        $query="DELETE FROM Curso 
                                WHERE curso=:curso ";
                        $this->stmt= $this->conn->prepare($query);
                        $this->stmt->bindValue(':curso', $this->curso, PDO::PARAM_STR);
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
                        $curso = array();

                        //Comando SQL para inserir um curso
                        if(!is_null($nome)){
                                //Pesquisa pelo nome
                                $query="SELECT * FROM Curso WHERE curso LIKE :curso";
                        }else{
                                // Pesquisa todos
                                $query="SELECT * FROM Curso";
                        }
                        $this->stmt= $this->conn->prepare($query);
                        if(!is_null($nome))$this->stmt->bindValue(':curso', '%'.$nome.'%', PDO::PARAM_STR);

                        if($this->stmt->execute()){
                                // Associa cada registro a uma classe Curso
                                // Depois, coloca os resultados em um array
                                $curso = $this->stmt->fetchAll(PDO::FETCH_CLASS,"Curso");  

                        }

                        return $curso;            
                } catch(PDOException $e) {
                        echo "<div class='alert alert-danger'>".$e->getMessage()."</div>";   
                        return null;
                }

        }

        public function listarUnico($matricula){

                try{
                        $query="SELECT * FROM Curso WHERE curso=:curso";
                        $this->stmt= $this->conn->prepare($query);
                        $this->stmt->bindValue(':curso', $matricula, PDO::PARAM_STR);

                        if($this->stmt->execute()){
                                // Associa o registro a uma classe Curso
                                $curso = $this->stmt->fetchAll(PDO::FETCH_CLASS,"Curso");  

                        }

                        return $curso[0];            
                } catch(PDOException $e) {
                        echo "<div class='alert alert-danger'>".$e->getMessage()."</div>";   
                        return null;
                }

        }

        public function printCursos($cursos)
        {
                if(!empty($cursos))
                {
                        foreach($cursos as $cur)
                        {
                                echo "<option>".$cur->getCurso()."</option>";
                        }
                }

        }
}
