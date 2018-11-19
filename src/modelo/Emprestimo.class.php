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
                        if(!is_null($verificacaoEntrega)){
                                $query="SELECT matriculaEstudante, codBarrasLivro, dataDevolucao, statusEntrega, condicaoEntrega, condicaoDevolucao, dataDeEntrega FROM Emprestimo WHERE matriculaEstudante LIKE :matriculaEstudante";
                        }else{
                                // Pesquisa todos
                                $query="SELECT matriculaEstudante, codBarrasLivro, dataDevolucao, statusEntrega, condicaoEntrega, condicaoDevolucao, dataDeEntrega FROM Emprestimo";
                        }
                        $this->stmt= $this->conn->prepare($query);
                        if(!is_null($verificacaoEntrega))$this->stmt->bindValue(':matriculaEstudante', '%'.$matriculaEstudante.'%', PDO::PARAM_STR);

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
}
