<?php

class Estudante implements IBaseModelo{

        // vars -------------------------------------
        private $matricula;
        private $nome;
        private $curso;
        private $email;
        private $status;

        private $conn;
        private $stmt;
        // ------------------------------------------
        // gets -------------------------------------
        public function getMatricula() {
                return $this->matricula;
        }

        public function getNome() {
                return $this->nome;
        }

        public function getCurso() {
                return $this->curso;
        }

        public function getEmail() {
                return $this->email;
        }

        public function getStatus() {
                return $this->status;
        }
        // ------------------------------------------
        // sets -------------------------------------
        public function setMatricula($matricula) {
                $this->matricula = $matricula;
        }

        public function setNome($nome) {
                $this->nome = $nome;
        }

        public function setCurso($curso) {
                $this->curso = $curso;
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
                        //Comando SQL para inserir um estudante
                        $query="INSERT INTO Estudante 
                                VALUES (:matricula, :nome, :curso, :email, :status) ";

                        $this->stmt= $this->conn->prepare($query);

                        $this->stmt->bindValue(':matricula', $this->matricula, PDO::PARAM_STR);
                        $this->stmt->bindValue(':nome', $this->nome, PDO::PARAM_STR);
                        $this->stmt->bindValue(':curso', $this->curso, PDO::PARAM_STR);
                        $this->stmt->bindValue(':email', $this->email, PDO::PARAM_STR);
                        $this->stmt->bindValue(':status', $this->status, PDO::PARAM_STR);

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
                        $query="UPDATE Estudante 
                                SET nome = :nome, 
                                curso = :curso, 
                                email = :email, 
                                status = :status 
                                WHERE matricula=:matricula ";
                        $this->stmt= $this->conn->prepare($query);

                        $this->stmt->bindValue(':matricula', $this->nome, PDO::PARAM_STR);
                        $this->stmt->bindValue(':nome', $this->nome, PDO::PARAM_STR);
                        $this->stmt->bindValue(':curso', $this->curso, PDO::PARAM_STR);
                        $this->stmt->bindValue(':email', $this->email, PDO::PARAM_STR);
                        $this->stmt->bindValue(':status', $this->nome, PDO::PARAM_STR);


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
                        $query="DELETE FROM Estudante 
                                WHERE matricula=:matricula ";
                        $this->stmt= $this->conn->prepare($query);
                        $this->stmt->bindValue(':matricula', $this->matricula, PDO::PARAM_STR);
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
                                $query="SELECT matricula,nome,curso,email,status FROM Estudante WHERE nome LIKE :nome";
                        }else{
                                // Pesquisa todos
                                $query="SELECT matricula,nome,curso,email,status FROM Estudante";
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

        public function listarUnico($matricula){

                try{
                        $query="SELECT matricula,nome,curso,email,status FROM Estudante WHERE matricula=:matricula";
                        $this->stmt= $this->conn->prepare($query);
                        $this->stmt->bindValue(':matricula', $matricula, PDO::PARAM_STR);

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


        public function printEstudanteNome($estudantes)
        {
                if(!empty($estudantes)){
                        foreach ($estudantes as $est) {
                                echo "<option>".$est->getNome()."</option>";
                        }
                }
        }

        public function printEstudanteMatricula($estudantes)
        {
                if(!empty($estudantes)){
                        foreach ($estudantes as $est) {
                                echo "<option>".$est->getMatricula()."</option>";
                        }
                }
        }

        public function printTodos($estudantes)
        {
                $limit = 10;
                $query = "select * from Estudante";
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
                $show  = "SELECT * FROM Estudante ORDER BY matricula DESC LIMIT $starting_limit, $limit";

                $r = $db->prepare($show);
                $r->execute();

                while($res = $r->fetch(PDO::FETCH_ASSOC)){
                        echo "<tr>
                                <td>".$res['matricula']."</td>
                                <td>".$res['nome']."</td>
                                <td>".$res['curso']."</td>
                                <td>".$res['email']."</td>
                                <td>".$res['status']."</td>
                                " ;  
                        echo '
                              <td>
                            <!-- Deletar -->
                            <a href="../visao/cadLivro.php?codBarras='.$res['matricula'].'&op=exc" class=\'btn btn-danger\'>
                                <i class="fas fa-trash-alt"></i>
                            </a>
                         </td>
                       </tr>
                            ';
                }

                echo '<div class="container pagNav">';
                for ($page=1; $page <= $total_pages ; $page++){
                        $ativo = ($page == $pagina) ? 'numativo' : '';
                        echo '<a class="pagButton '.$ativo.'" href="listAluno.php?page='.$page.'">'
                                .$page.'</a>';
                }
                echo '</div>';

                }
}

