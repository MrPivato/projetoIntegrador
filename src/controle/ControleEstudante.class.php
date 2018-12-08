<?php
class ControleEstudante extends ControleBase {
        private $visao;
        private $estudante;

        public function getVisao() {
                return $this->visao;
        }


        public function setVisao($visao) {
                $this->visao = $visao;
        }


        public function __construct() {
                //Cria uma instância da classe Estudante
                $this->estudante = new Estudante();
        }

        public function controleAcao($acao,$param=null){

                switch ($acao) {
                        //Permite adição de ações que não estão no ControleBase
                default:
                //Senão, utiliza os que estão no ControleBase
                return parent::controleAcao($acao,$param);
                break;
                }
        }

        private function preencheModelo(){
                // Passa dados do formulário para a classe Estudante
                $this->estudante->setMatricula((isset($this->visao["matricula"]) && $this->visao["matricula"] != null) ? $this->visao["matricula"] : "");
                $this->estudante->setNome((isset($this->visao["nome"]) && $this->visao["nome"] != null) ? $this->visao["nome"] : "");
                $this->estudante->setCurso((isset($this->visao["curso"]) && $this->visao["curso"] != null) ? $this->visao["curso"] : "");
                $this->estudante->setEmail((isset($this->visao["email"]) && $this->visao["email"] != null) ? $this->visao["email"] : "");
                $this->estudante->setStatus((isset($this->visao["status"]) && $this->visao["status"] != null) ? $this->visao["status"] : "");
        }

        protected function inserir() {
                // Passa dados do formulário para a classe Estudante
                $this->preencheModelo();
                //Chama o método para inserir os dados no banco de dados
                return $this->estudante->inserir();
        }

        protected function alterar() {
                // Passa dados do formulário para a classe Estudante
                $this->preencheModelo();
                //Chama o método para alterar os dados no banco de dados
                return $this->estudante->alterar();
        }

        protected function excluir(){
                // Passa dados do formulário (via GET) para a classe Estudante
                $this->estudante->setMatricula((isset($this->visao["matricula"]) && $this->visao["matricula"] != null) ? $this->visao["matricula"] : "");
                //Chama o método para excluir os dados no banco de dados
                return $this->estudante->excluir();
        }

        protected function listarTodos($param=null){
                //Chama o método para listar os estudantes do banco de dados de acordo com um filtro
                return $this->estudante->listarTodos($param);
        }

        protected function listarUnico($param){
                //Chama o método para listar um estudante específico do banco de dados
                return $this->estudante->listarUnico($param);
        }
}
