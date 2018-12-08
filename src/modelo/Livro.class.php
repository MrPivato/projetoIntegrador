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
                        //echo "<pre>";
                        //var_dump($livros);
                        //echo "</pre>";
                        //echo end($livros);

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
                                WHERE codBarras=:codBarras ";
                        $this->stmt= $this->conn->prepare($query);
                        $this->stmt->bindValue(':codBarras', $this->codBarras, PDO::PARAM_STR);
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
                                $total_results = $this->stmt->rowCount();

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

        public function printLivroCod($livros)
        {
                if(!empty($livros)){
                        foreach ($livros as $liv) {
                                echo "<option>".$liv->getCodBarras()."</option>";
                        }
                }
        }

        public function printTodos($livros)
        {

                $limit = 10;
                $query = "select * from Livro";
                $db = $this->conn;

                $s = $db->prepare($query);
                $s->execute();
                $total_results = $s->rowcount();
                $total_pages = ceil($total_results/$limit);

                if (!isset($_GET['page'])) {
                        $page = 1;
                        $pagina = 1;
                } else{
                        $page = $_GET['page'];
                        $pagina = $_GET['page'];
                }

                $starting_limit = ($page-1)*$limit;
                $show  = "SELECT * FROM Livro ORDER BY codBarras DESC LIMIT $starting_limit, $limit";

                $r = $db->prepare($show);
                $r->execute();

                while($res = $r->fetch(PDO::FETCH_ASSOC)){
                        echo "<tr>
                                <td>".$res['isbn']."</td>
                                <td>".$res['codBarras']."</td>
                                <td>".$res['nome']."</td>
                                <td>".$res['volume']."</td>
                                <td>".$res['autor']."</td>
                                <td>".$res['grande_area']."</td>
                                <td>".$res['status']."</td>
                                <td>".$res['condicao']."</td>
                                " ;  
                        echo '
                              <td>
                            <!-- Deletar -->
                            <a href="../visao/cadLivro.php?codBarras='.$res['codBarras'].'&op=exc" class=\'btn btn-danger\'>
                                <i class="fas fa-trash-alt"></i>
                            </a>
                         </td>
                       </tr>
                            ';
                }

                echo '<div class="container pagNav">';
                for ($page=1; $page <= $total_pages ; $page++){
                      $ativo = ($page == $pagina) ? 'numativo' : '';
                      echo '<a class="pagButton '.$ativo.'" href="listLivro.php?page='.$page.'">'
                              .$page.'</a>';
                }
                echo '</div>';

        }
}
