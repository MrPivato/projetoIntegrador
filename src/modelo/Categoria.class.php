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
                        //Comando SQL para inserir uma categoria

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

                        //Comando SQL para alterar uma categoria
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
                        //Comando SQL para excluir uma categoria
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

        public function listarTodos($categoria=null){

                try{
                        $categorias = array();

                        //Comando SQL para inserir um categoria
                        if(!is_null($categoria)){
                                //Pesquisa pelo nome
                                $query="SELECT categoria FROM Categoria WHERE categoria LIKE :categoria";
                        }else{
                                // Pesquisa todos
                                $query="SELECT categoria FROM Categoria";
                        }
                        $this->stmt= $this->conn->prepare($query);
                        
                        if(!is_null($categoria))$this->stmt->bindValue(':categoria', '%'.$categoria.'%', PDO::PARAM_STR);

                        if($this->stmt->execute()){
                                // Associa cada registro a uma classe Categoria
                                // Depois, coloca os resultados em um array
                                $categoria = $this->stmt->fetchAll(PDO::FETCH_CLASS,"Categoria");  

                        }

                        return $categoria;            
                } catch(PDOException $e) {
                        echo "<div class='alert alert-danger'>".$e->getMessage()."</div>";   
                        return null;
                }

        }

        public function listarUnico($categoria){

                try{
                        $query="SELECT categoria FROM Categoria WHERE categoria=:categoria";
                        $this->stmt= $this->conn->prepare($query);
                        $this->stmt->bindValue(':categoria', $categoria, PDO::PARAM_STR);

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

        public function printCategorias($categoria)
        {
                if(!empty($categoria)){
                        foreach ($categoria as $est) {
                                echo "<option>".$est->getCategoria()."</option>";
                        }
                }
        }
        public function printTodos($categoria)
        {
                if(!empty($categoria)){
                        foreach ($categoria as $est) {
                                echo "<tr>
                                        <td>".$est->getCategoria()."</td>
                                       
                                        
                                        " ;  
                                echo '
                                <td>
                                <!-- Alterar -->
                                <a href="../visao/cadCat.php?categoria='.$est->getCategoria().'&op=alt"><button type="button" class="btn btn-warning text-light"">
                                <i class="fas fa-edit"></i>
                                </button></a>
                                <!-- Deletar -->
                                <button type="button" class="btn btn-danger text-light" data-toggle="modal" data-target="#cpp2">
                                <i class="fas fa-trash-alt"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="cpp2" tabindex="-1" role="dialog" aria-labelledby="cpp2" aria-hidden="true">
                                   <div class="modal-dialog modal-dialog-centered" role="document">
                                      <div class="modal-content">
                                         <div class=\'modal-body\'>
                                            <p class=\'text-dark\'>Deseja realmente excluir?</p>
                                         </div>
                                         <div class=\'modal-footer\'>
                                         
                                         <a href="../visao/cadCat.php?categoria='.$est->getCategoria().'&op=exc" type=\'button\' class=\'btn btn-success\' id=\'delete\'>Confirmar</a>
                                            <button type=\'button\' data-dismiss=\'modal\' class=\'btn btn-danger\'>Cancelar</button>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                                <!-- -->
                             </td>
                           </tr>
                                  ';
                        }
                }
        }

}
