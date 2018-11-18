<?php

class Funcionario implements IBaseModelo{

        // vars -------------------------------------
        private $id;
        private $nome;
        private $email;
        private $senha;
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

        public function getEmail() {
                return $this->email;
        }

        public function getSenha() {
                return $this->senha;
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

        public function setEmail($email) {
                $this->email = $email;
        }

        public function setSenha($senha) {
                $this->senha = $senha;
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
                                VALUES (:id, :nome, :email, :senha, :status) ";

                        $this->stmt= $this->conn->prepare($query);

                        $this->stmt->bindValue(':id', $this->id, PDO::PARAM_STR);
                        $this->stmt->bindValue(':nome', $this->nome, PDO::PARAM_STR);
                        $this->stmt->bindValue(':email', $this->email, PDO::PARAM_STR);
                        $this->stmt->bindValue(':senha', $this->senha, PDO::PARAM_INT);
                        $this->stmt->bindValue(':status', $this->status, PDO::PARAM_INT);

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
                                senha = :senha, 
                                email = :email, 
                                status = :status 
                                WHERE id=:id ";
                        $this->stmt= $this->conn->prepare($query);

                        $this->stmt->bindValue(':nome', $this->nome, PDO::PARAM_STR);
                        $this->stmt->bindValue(':senha', $this->senha, PDO::PARAM_INT);
                        $this->stmt->bindValue(':email', $this->email, PDO::PARAM_STR);
                        $this->stmt->bindValue(':status', $this->status, PDO::PARAM_INT);


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
                                $query="SELECT id,nome,senha,email,status FROM Funcionario WHERE id LIKE :id";
                        }else{
                                // Pesquisa todos
                                $query="SELECT id,nome,senha,email,status  FROM Funcionario";
                        }
                        $this->stmt= $this->conn->prepare($query);
                        if(!is_null($nome))$this->stmt->bindValue(':id', '%'.$nome.'%', PDO::PARAM_STR);

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
                        $query="SELECT id,nome,senha,email,status FROM Funcionario WHERE id=:id";
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


        public function printTodos($categorias)
        {
                if(!empty($categorias)){
                        foreach ($categorias as $est) {
                                echo "<tr>
                                        <td>".$est->getId()."</td>
                                        <td>".$est->getNome()."</td>
                                        <td>".$est->getSenha()."</td>
                                        <td>".$est->getEmail()."</td>
                                        <td>".$est->getStatus()."</td>
                                        " ;  
                                echo '
                              <td>
                            <!-- Alterar -->
                            <a href="../visao/cadFuncionario.php?matricula='.$est->getId().'&op=alt"><button type="button" class="btn btn-warning text-light" data-toggle="modal" data-target="#exampleModalCenter">
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
