<?php
class Emprestimo implements IBaseModelo{
        // vars -------------------------------------
        private $matriculaEstudante;
        private $codBarrasLivro;
        private $dataDevolucao;
        private $statusEntrega;
        private $condicaoEntrega;
        private $condicaoDevolucao;
        private $dataDeEntrega;
        private $conn;
        private $stmt;
        // ------------------------------------------
        // gets -------------------------------------
        public function getMatriculaEstudante() {
                return $this->matriculaEstudante;
        }
        public function getCodBarrasLivro() {
                return $this->codBarrasLivro;
        }
        public function getDataDevolucao() {
                return $this->dataDevolucao;
        }
        public function getStatusEntrega() {
                return $this->statusEntrega;
        }

        public function getCondicaoEntrega() {
                return $this->condicaoEntrega;
        }
        public function getCondicaoDevolucao() {
                return $this->condicaoDevolucao;
        }
        public function getDataDeEntrega() {
                return $this->dataDeEntrega;
        }
        // ------------------------------------------
        // sets -------------------------------------
        public function setMatriculaEstudante($matriculaEstudante) {
                $this->matriculaEstudante = $matriculaEstudante;
        }
        public function setCodBarrasLivro($codBarrasLivro) {
                $this->codBarrasLivro = $codBarrasLivro;
        }
        public function setDataDevolucao($dataDevolucao) {
                $this->dataDevolucao = $dataDevolucao;
        }
        public function setStatusEntrega($statusEntrega) {
                $this->statusEntrega = $statusEntrega;
        }
        public function setCondicaoEntrega($condicaoEntrega) {
                $this->condicaoEntrega = $condicaoEntrega;
        }
        public function setCondicaoDevolucao($condicaoDevolucao) {
                $this->condicaoDevolucao = $condicaoDevolucao;
        }
        public function setDataDeEntrega($dataDeEntrega) {
                $this->dataDeEntrega = $dataDeEntrega;
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
                        //Comando SQL para inserir um emprestimo
                        $query="INSERT INTO `Emprestimo` (`matriculaEstudante`, `codBarrasLivro`, `dataDevolucao`, `statusEntrega`, `condicaoEntrega`, `condicaoDevolucao`, `dataDeEntrega`)
                                VALUES (:matriculaEstudante, :codBarrasLivro, :dataDevolucao, :statusEntrega, :condicaoEntrega, :condicaoDevolucao, :dataDeEntrega) ";
                        $this->stmt= $this->conn->prepare($query);
                        $this->stmt->bindValue(':matriculaEstudante', $this->matriculaEstudante, PDO::PARAM_STR);
                        $this->stmt->bindValue(':codBarrasLivro', $this->codBarrasLivro, PDO::PARAM_STR);
                        $this->stmt->bindValue(':dataDevolucao', $this->dataDevolucao, PDO::PARAM_STR);
                        $this->stmt->bindValue(':statusEntrega', $this->statusEntrega, PDO::PARAM_STR);
                        $this->stmt->bindValue(':condicaoEntrega', $this->condicaoEntrega, PDO::PARAM_STR);
                        $this->stmt->bindValue(':condicaoDevolucao', $this->condicaoDevolucao, PDO::PARAM_STR);
                        $this->stmt->bindValue(':dataDeEntrega', $this->dataDeEntrega, PDO::PARAM_STR);
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
                        //Comando SQL para inserir um emprestimo
                        $query="UPDATE Emprestimo 
                                SET matriculaEstudante = :matriculaEstudante
                                dataDevolucao = :dataDevolucao, 
                                statusEntrega = :statusEntrega 
                                condicaoEntrega = :condicaoEntrega,
                                condicaoDevolucao = :condicaoDevolucao,
                                dataDeEntrega = :dataDeEntrega
                                WHERE codBarrasLivro=:codBarrasLivro";
                        $this->stmt= $this->conn->prepare($query);
                        $this->stmt->bindValue(':matriculaEstudante', $this->matriculaEstudante, PDO::PARAM_STR);
                        $this->stmt->bindValue(':codBarrasLivro', $this->codBarrasLivro, PDO::PARAM_STR);
                        $this->stmt->bindValue(':dataDevolucao', $this->dataDevolucao, PDO::PARAM_STR);
                        $this->stmt->bindValue(':statusEntrega', $this->statusEntrega, PDO::PARAM_STR);
                        $this->stmt->bindValue(':condicaoEntrega', $this->condicaoEntrega, PDO::PARAM_STR);
                        $this->stmt->bindValue(':condicaoDevolucao', $this->condicaoDevolucao, PDO::PARAM_STR);
                        $this->stmt->bindValue(':dataDeEntrega', $this->dataDeEntrega, PDO::PARAM_STR);
                        if($this->stmt->execute()){
                                return true;
                        }        
                } catch(PDOException $e) {
                        echo "<div class='alert alert-danger'>".$e->getMessage()."</div>";      
                        return false;
                }
        }
        public function excluir()
        {}
        public function listarTodos($matriculaEstudante=null){
                try{
                        $emprestimos = array();
                        //Comando SQL para inserir um emprestimo
                        if(!is_null($matriculaEstudante)){
                                $query="SELECT matriculaEstudante, codBarrasLivro, dataDevolucao, statusEntrega, condicaoEntrega, condicaoDevolucao, dataDeEntrega FROM Emprestimo WHERE matriculaEstudante LIKE :matriculaEstudante";
                        }else{
                                // Pesquisa todos
                                $query="SELECT matriculaEstudante, codBarrasLivro, dataDevolucao, statusEntrega, condicaoEntrega, condicaoDevolucao, dataDeEntrega FROM Emprestimo";
                        }
                        $this->stmt= $this->conn->prepare($query);
                        if(!is_null($matriculaEstudante))$this->stmt->bindValue(':matriculaEstudante', '%'.$matriculaEstudante.'%', PDO::PARAM_STR);
                        if($this->stmt->execute()){
                                // Associa cada registro a uma classe Emprestimo
                                // Depois, coloca os resultados em um array
                                $emprestimos = $this->stmt->fetchAll(PDO::FETCH_CLASS,"Emprestimo");  
                        }
                        return $emprestimos;            
                } catch(PDOException $e) {
                        echo "<div class='alert alert-danger'>".$e->getMessage()."</div>";   
                        return null;
                }
        }
        public function listarUnico($matriculaEstudante){
                try{
                        $query="SELECT matriculaEstudante, codBarrasLivro, dataDevolucao, statusEntrega, condicaoEntrega, condicaoDevolucao, dataDeEntrega FROM Emprestimo WHERE matriculaEstudante=:matriculaEstudante";
                        $this->stmt= $this->conn->prepare($query);
                        $this->stmt->bindValue(':matriculaEstudante', $matriculaEstudante, PDO::PARAM_INT);
                        if($this->stmt->execute()){
                                // Associa o registro a uma classe Emprestimo
                                $emprestimo = $this->stmt->fetchAll(PDO::FETCH_CLASS,"Emprestimo");  
                        }
                        return $emprestimo[0];            
                } catch(PDOException $e) {
                        echo "<div class='alert alert-danger'>".$e->getMessage()."</div>";   
                        return null;
                }
        }

        public function printTodos($emprestimos)
        {
                $estudanteControle = new ControleEstudante();
                $listEstudante = new Estudante;
                $estudantes = $estudanteControle->controleAcao("listarTodos");

                if(!empty($emprestimos)){
                        foreach ($emprestimos as $emp) {
                                $cursoEstudante = "SELECT Estudante.curso
                                        FROM Estudante
                                        INNER JOIN Emprestimo ON Estudante.matricula = Emprestimo.".$emp->getMatriculaEstudante()."";

                                $nomeEstudante = "SELECT Estudante.nome
                                        FROM Estudante
                                        INNER JOIN Emprestimo ON Estudante.matricula = Emprestimo.".$emp->getMatriculaEstudante()."";

                                if($emp->getCondicaoEntrega() == 'novo'){
                                        $condEntrega = "badge-sucess badge-pill'>Novo</span>";
                                } else if($emp->getCondicaoEntrega() == 'regular'){
                                        $condEntrega = "badge-alert badge-pill'>Regular</span>";
                                }else{
                                        $condEntrega = "badge-danger badge-pill'>Péssimo</span>";
                                }


                                if($emp->getCondicaoDevolucao() == 'novo'){
                                        $condDevol = "badge-sucess badge-pill'>Novo</span>";
                                } else if($emp->getCondicaoEntrega() == 'regular'){
                                        $condDevol = "badge-alert badge-pill'>Regular</span>";
                                }else{
                                        $condDevol = "badge-danger badge-pill'>Péssimo</span>";
                                }

                                if($emp->getStatusEntrega() == 'entregue'){
                                        $statusEnt = "badge-sucess badge-pill'>Entregue</span>";
                                } else if($emp->getCondicaoEntrega() == 'pendente'){
                                        $statusEnt = "badge-alert badge-pill'>Pendente</span>";
                                }else{
                                        $statusEnt = "badge-danger badge-pill'>Atrasado</span>";
                                }

                                echo "<tr>
                                        <td>".$cursoEstudante."</td>
                                        <td>".$nomeEstudante."<hr>".
                                        $emp->getMatriculaEstudante()
                                        ."</td>
                                        <td> <div class='container'>
                                        <p>
                                        <button class='btn btn-info bot-list' type='button' data-toggle='collapse' data-target='#collapseExample' aria-expanded='false'
                                        aria-controls='collapseExample'>
                                        Mostrar todas informações do livro
                                        </button>
                                        </p>
                                        <div class='collapse' id='collapseExample'>
                                        <ul class='list-group'>
                                        <li class='list-group-item d-flex justify-content-between align-items-center'>
                                        <a href='../visao/cadAluno.php?matricula='".$emp->getCodBarrasLivro()."'&op=alt'>".$emp->getCodBarrasLivro."
                                        </li>

                                        <li class='list-group-item d-flex justify-content-between align-items-center'>
                                        Condição de recebimento
                                        <span class='badge ".$condEntrega ."


                                        </li>

                                        <li class='list-group-item d-flex justify-content-between align-items-center'>
                                        Condição de devolução
                                        <span class='badge ". $condEntrega 
                                        ."
                                                </li>

                                                <li class='list-group-item d-flex justify-content-between align-items-center'>
                                                    Condição de recebimento
                                                    <span class='badge ". $statusEnt  ."
                                                </li>


                                                <li class='list-group-item d-flex justify-content-between align-items-center'>
                                                    Data de recebimento
                                                    <span class='badge badge-primary badge-pill'>".$emp->getDataDeEntrega()."</span>
                                                </li>
                                                <li class='list-group-item d-flex justify-content-between align-items-center'>
                                                    Data de devolução
                                                    <span class='badge badge-secondary badge-pill'>".$emp->getDataDevolucao().".</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div></td>" .
                                        "<td>".$emp->getStatusEntrega()."</td>"
                                         ;  
                                echo '
                              <td>
                            <!-- Alterar -->
                            <a href="../visao/cadAluno.php?matricula='.$estudantes->getMatricula().'&op=alt"><button type="button" class="btn btn-warning text-light"">
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

                                     <a href="../visao/cadAluno.php?matricula='.$est->getMatricula().'&op=exc" type=\'button\' class=\'btn btn-success\' id=\'delete\'>Confirmar</a>
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
