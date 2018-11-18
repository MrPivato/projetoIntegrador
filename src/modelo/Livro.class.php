<?php

class Livro implements IBaseModelo{

        // vars -------------------------------------
        private $isbn;
        private $nome;
        private $volume;
        private $autor;
        private $codBarras;
        private $status;
        private $condicao;
        private $grande_area;
        private $quantidade;



        private $conn;
        private $stmt;


        // ------------------------------------------
        // gets -------------------------------------
        public function getIsbn() {
                return $this->isbn;
        }

        public function getNome() {
                return $this->nome;
        }

        public function getVolume() {
                return $this->volume;
        }

        public function getAutor() {
                return $this->autor;
        }

        public function getCodBarras() {
                return $this->codBarras;
        }

        public function getStatus() {
                return $this->status;
        }

        public function getCondicao() {
                return $this->condicao;
        }

        public function getGrande_area() {
                return $this->grande_area;
        }

        public function getQuantidade() {
                return $this->quantidade;
        }



        // ------------------------------------------
        // sets -------------------------------------
        public function setIsbn($isbn) {
                $this->isbn = $isbn;
        }

        public function setNome($nome) {
                $this->nome = $nome;
        }

        public function setVolume($volume) {
                $this->volume = $volume;
        }

        public function setAutor($autor) {
                $this->autor = $autor;
        }

        public function setCodBarras($codBarras) {
                $this->codBarras = $codBarras;
        }

        public function setStatus($status) {
                $this->status = $status;
        }

        public function setCondicao($condicao) {
                $this->condicao = $condicao;
        }

        public function setGrande_area($grande_area) {
                $this->grande_area = $grande_area;
        }

        public function setQuantidade($quantidade) {
                $this->quantidade = $quantidade;
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
                        $query = "SELECT MAX(codBarras) FROM `Livro` WHERE `codBarras` LIKE '%BIO%'";

                        $this->stmt= $this->conn->prepare($query);
                        $this->stmt->execute();
                        $livros = $this->stmt->fetchAll(PDO::FETCH_CLASS,"Livro");  
                        echo "<pre>";
                        var_dump($livros);
                        echo "</pre>";
                        echo end($livros);

                        for($i = 0; $i < $this->quantidade; $i++){
                                $query="INSERT INTO Livro 
                                        VALUES 
                                        (:isbn, :nome, :volume, :autor, :codBarras, :status, :condicao, :grande_area)";



                                $a =  substr ($this->grande_area,0 ,3);
                                $a = strtoupper($a); 

                                $v = rand(100,999);


                                $codBarras1 = $a . $this->volume .  $v;

                                $this->stmt= $this->conn->prepare($query);

                                $this->stmt->bindValue(':isbn', $this->isbn, PDO::PARAM_STR);
                                $this->stmt->bindValue(':nome', $this->nome, PDO::PARAM_STR);
                                $this->stmt->bindValue(':volume', $this->volume, PDO::PARAM_INT);
                                $this->stmt->bindValue(':autor', $this->autor, PDO::PARAM_STR);
                                $this->stmt->bindValue(':codBarras', $codBarras1, PDO::PARAM_STR);
                                $this->stmt->bindValue(':status', $this->status, PDO::PARAM_STR);
                                $this->stmt->bindValue(':condicao', $this->condicao, PDO::PARAM_STR);
                                $this->stmt->bindValue(':grande_area', $this->grande_area, PDO::PARAM_STR);


                                $this->stmt->execute();
                        }
                        return true;
                } catch(PDOException $e) {
                        echo "<div class='alert alert-danger'>".$e->getMessage()."</div>";      
                        return false;
                }
        }


        public function alterar(){
                try{

                        //Comando SQL para inserir um livro
                        $query="UPDATE Livro 
                                SET nome = :nome, 
                                volume = :volume, 
                                autor = :autor, 
                                codBarras = :codBarras,
                                status = :status,
                                condicao = :condicao,
                                grande_area = :grande_area
                                WHERE isbn=:isbn ";
                        $this->stmt= $this->conn->prepare($query);

                        $this->stmt->bindValue(':isbn', $this->isbn, PDO::PARAM_STR);
                        $this->stmt->bindValue(':nome', $this->nome, PDO::PARAM_STR);
                        $this->stmt->bindValue(':volume', $this->volume, PDO::PARAM_INT);
                        $this->stmt->bindValue(':autor', $this->autor, PDO::PARAM_STR);
                        $this->stmt->bindValue(':codBarras', $this->codBarras, PDO::PARAM_STR);
                        $this->stmt->bindValue(':status', $this->status, PDO::PARAM_STR);
                        $this->stmt->bindValue(':condicao', $this->condicao, PDO::PARAM_STR);
                        $this->stmt->bindValue(':grande_area', $this->grande_area, PDO::PARAM_STR);

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
                        $query="DELETE FROM Livro 
                                WHERE isbn=:isbn ";
                        $this->stmt= $this->conn->prepare($query);
                        $this->stmt->bindValue(':isbn', $this->isbn, PDO::PARAM_STR);
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
                                $query="SELECT isbn, nome, volume, autor, codBarras, status, condicao, grande_area 
                                        FROM Livro WHERE nome LIKE :nome";
                        }else{
                                // Pesquisa todos
                                $query="SELECT isbn, nome, volume, autor, codBarras, status, condicao, grande_area  FROM Livro";
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

        public function listarUnico($isbn){

                try{
                        $query="SELECT isbn, nome, volume, autor, codBarras, status, condicao, grande_area FROM Livro WHERE isbn=:isbn";
                        $this->stmt= $this->conn->prepare($query);
                        $this->stmt->bindValue(':isbn', $isbn, PDO::PARAM_STR);

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


        public function printTodos($livros)
        {
                if(!empty($livros)){
                        foreach ($livros as $liv) {
                                echo "<tr>
                                        <td>".$liv->getIsbn()."</td>
                                        <td>".$liv->getNome().
                                        "<hr>".$liv->getCodBarras()."</td>
                                        <td>".$liv->getNome()."</td>
                                        <td>".$liv->getVolume()."</td>
                                        <td>".$liv->getAutor()."</td>
                                        <td>".$liv->getGrande_area()."</td>
                                        <td>".$liv->getStatus()."</td>
                                        <td>".$liv->getCondicao()."</td>
                                        " ;  
                                echo '
                              <td>
                            <!-- Alterar -->
                            <button type="button" class="btn btn-warning text-light" data-toggle="modal" data-target="#exampleModalCenter">
                            <i class="fas fa-edit"></i>
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                               <div class="modal-dialog modal-dialog-centered" role="document">
                                  <div class="modal-content">
                                     <button type="button" class="close ml-auto" data-dismiss="modal" aria-label="Close">X &nbsp; </button>
                  '.
                                        //include_once "formCadAluno.php";
                              '.
                                  </div>
                               </div>
                            </div>
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
                                        <a href=\'listcrianca.php?id={$registro[\' id \']}\' type=\'button\' class=\'btn btn-success\' id=\'delete\'>Confirmar</a>
                                        <button type=\'button\' data-dismiss=\'modal\' class=\'btn btn-danger\'>Cancelar</button>
                                     </div>
                                  </div>
                               </div>
                            </div>
                            <!-- Mostrar todos -->
                            <a href=\'listEmprestimos.php?id={$registro[\' id \']}\' class="btn btn-info text-light">
                            <i class="fas fa-clipboard-list"></i>
                            </a>
                            <!-- -->
                         </td>
                       </tr>
                                  ';
                        }
                }
        }
}
