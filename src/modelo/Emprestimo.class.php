<?php

class Emprestimo implements IBaseModelo{

        // vars -------------------------------------
        private $matriculaEstudante;
        private $codBarrasLivro;
        private $verificacaoEntrega;
        private $dataDevolucao;
        private $periodoEntrega;
        private $statusEntrega;
        private $condicaoEntrega;
        private $condicaoDevolucao;
        private $dataDeEntrega;

        private $conn;
        private $stmt;
        // ------------------------------------------
        // gets -------------------------------------
        public function getmatriculaEmprestimo() {
                return $this->matriculaEmprestimo;
        }

        public function getcodBarrasLivro() {
                return $this->codBarrasLivro;
        }

        public function getverificacaoEntrega() {
                return $this->verificacaoEntrega;
        }

        public function getdataDevolucao() {
                return $this->dataDevolucao;
        }

        public function getperiodoEntrega() {
                return $this->periodoEntrega;
        }
        public function getstatusEntrega() {
                return $this->statusEntrega;
        }
        public function getcondicaoEntrega() {
                return $this->condicaoEntrega;
        }
        public function getcondicaoDevolucao() {
                return $this->condicaoDevolucao;
        }
        public function getdataDeEntrega() {
                return $this->dataDevolucao;
        }

        // ------------------------------------------
        // sets -------------------------------------

        public function setmatriculaEstudante($matriculaEstudante) {
                $this->matriculaEstudante = $matriculaEstudante;
        }
        public function setcodBarrasLivro($codBarrasLivro) {
                $this->codBarrasLivro = $codBarrasLivro;
        }

        public function verificacaoEntrega($verificacaoEntrega) {
                return $this->verificacaoEntrega = $verificacaoEntrega;
        }

        public function setdataDevolucao($dataDevolucao) {
                $this->dataDevolucao = $dataDevolucao;
        }

        public function setperiodoEntrega($periodoEntrega) {
                $this->periodoEntrega = $periodoEntrega;
        }
        public function setstatusEntrega($statusEntrega) {
                $this->statusEntrega = $statusEntrega;
        }
        public function setcondicaoEntrega($condicaoEntrega) {
                $this->condicaoEntrega = $condicaoEntrega;
        }
        public function setcondicaoDevolucao($condicaoDevolucao) {
                $this->condicaoDevolucao = $condicaoDevolucao;
        }
        public function setdataDeEntrega($dataDevolucao) {
                $this->dataDevolucao = $dataDevolucao;
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
                        $query="INSERT INTO Emprestimo 
                                VALUES (:matriculaEstudante, :codBarrasLivro, :verificacaoEntrega, :dataDevolucao :periodoEntrega, :statusEntrega, :condicaoDevolucao, :dataDevolucao) ";

                        $this->stmt= $this->conn->prepare($query);

                        $this->stmt->bindValue(':matriculaEstudante', $this->matriculaEstudante, PDO::PARAM_STR);
                        $this->stmt->bindValue(':codBarrasLivro', $this->codBarrasLivro, PDO::PARAM_STR);
                        $this->stmt->bindValue(':verificacaoEntrega', $this->verificacaoEntrega, PDO::PARAM_STR);
                        $this->stmt->bindValue(':dataDevolucao', $this->dataDevolucao, PDO::PARAM_STR);
                        $this->stmt->bindValue(':periodoEntrega', $this->periodoEntrega, PDO::PARAM_STR);
                        $this->stmt->bindValue(':statusEntrega', $this->statusEntrega, PDO::PARAM_STR);
                        $this->stmt->bindValue(':condicaoDevolucao', $this->condicaoDevolucao, PDO::PARAM_STR);
                        $this->stmt->bindValue(':dataDevolucao', $this->dataDevolucao, PDO::PARAM_STR);

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

                        //Comando SQL para dar update em um Emprestimo
                        $query="UPDATE Emprestimo 
                                SET matriculaEstudante = :matriculaEstudante, 
                                verificacaoEntrega = :verificacaoEntrega, 
                                dataDevolucao = :dataDevolucao, 
                                periodoEntrega = :periodoEntrega, 
                                statusEntrega = :statusEntrega, 
                                condicaoDevolucao = :condicaoDevolucao, 
                                dataDevolucao = :dataDevolucao
                                WHERE codBarrasLivro = :codBarrasLivro";
                        $this->stmt= $this->conn->prepare($query);

                        $this->stmt->bindValue(':matriculaEstudante', $this->matriculaEstudante, PDO::PARAM_STR);
                        $this->stmt->bindValue(':codBarrasLivro', $this->codBarrasLivro, PDO::PARAM_STR);
                        $this->stmt->bindValue(':verificacaoEntrega', $this->verificacaoEntrega, PDO::PARAM_STR);
                        $this->stmt->bindValue(':dataDevolucao', $this->dataDevolucao, PDO::PARAM_STR);
                        $this->stmt->bindValue(':periodoEntrega', $this->periodoEntrega, PDO::PARAM_STR);
                        $this->stmt->bindValue(':statusEntrega', $this->statusEntrega, PDO::PARAM_STR);
                        $this->stmt->bindValue(':condicaoDevolucao', $this->condicaoDevolucao, PDO::PARAM_STR);
                        $this->stmt->bindValue(':dataDevolucao', $this->dataDevolucao, PDO::PARAM_STR);


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
                        //Comando SQL para inserir um emprestimo
                        $query="DELETE FROM Emprestimo 
                                WHERE codBarrasLivro=:codBarrasLivro ";
                        $this->stmt= $this->conn->prepare($query);
                        $this->stmt->bindValue(':codBarrasLivro', $this->matricula, PDO::PARAM_STR);
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
                        $emprestimos = array();

                        //Comando SQL para inserir um emprestimo
                        if(!is_null($nome)){
                                //Pesquisa pelo nome
                                $query="SELECT matriculaEstudante, codBarrasLivro, verificacaoEntrega, dataDevolucao periodoEntrega, statusEntrega, condicaoDevolucao, dataDevolucao FROM Emprestimo WHERE codBarrasLivro LIKE :codBarrasLivro";
                        }else{
                                // Pesquisa todos
                                $query="SELECT matriculaEstudante, codBarrasLivro, verificacaoEntrega, dataDevolucao periodoEntrega, statusEntrega, condicaoDevolucao, dataDevolucao FROM Emprestimo";
                        }
                        $this->stmt= $this->conn->prepare($query);
                        if(!is_null($nome))$this->stmt->bindValue(':nome', '%'.$nome.'%', PDO::PARAM_STR);

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

        public function listarUnico($matricula){

                try{
                        $query="SELECT matricula,nome,curso,turma,email,status FROM Emprestimo WHERE matricula=:matricula";
                        $this->stmt= $this->conn->prepare($query);
                        $this->stmt->bindValue(':matricula', $matricula, PDO::PARAM_STR);

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
}
