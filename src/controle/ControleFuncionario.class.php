<?php
class ControleFuncionario extends ControleBase {
        private $visao;
        private $funcionario;

        public function getVisao() {
                return $this->visao;
        }


        public function setVisao($visao) {
                $this->visao = $visao;
        }


        public function __construct() {
                //Cria uma instância da classe Funcionario
                $this->funcionario = new Funcionario();
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
                // Passa dados do formulário para a classe Funcionario
                $this->funcionario->setNome((isset($this->visao["nome"]) && $this->visao["nome"] != null) ? $this->visao["nome"] : "");
                $this->funcionario->setEmail((isset($this->visao["email"]) && $this->visao["email"] != null) ? $this->visao["email"] : "");
                $this->funcionario->setSenha((isset($this->visao["senha"]) && $this->visao["senha"] != null) ? $this->visao["senha"] : "");
                $this->funcionario->setStatus((isset($this->visao["status"]) && $this->visao["status"] != null) ? $this->visao["status"] : "");
        }

        protected function inserir() {
                // Passa dados do formulário para a classe Funcionario
                $this->preencheModelo();
                //Chama o método para inserir os dados no banco de dados
                return $this->funcionario->inserir();
        }

        protected function alterar() {
                // Passa dados do formulário para a classe Funcionario
                $this->preencheModelo();
                //Chama o método para alterar os dados no banco de dados
                return $this->funcionario->alterar();
        }

        protected function excluir(){
                // Passa dados do formulário (via GET) para a classe Funcionario
                $this->funcionario->setId((isset($this->visao["id"]) && $this->visao["id"] != null) ? $this->visao["id"] : "");
                //Chama o método para excluir os dados no banco de dados
                return $this->funcionario->excluir();
        }

        protected function listarTodos($param=null){
                //Chama o método para listar os funcionarios do banco de dados de acordo com um filtro
                return $this->funcionario->listarTodos($param);
        }

        protected function listarUnico($param){
                //Chama o método para listar um funcionario específico do banco de dados
                return $this->funcionario->listarUnico($param);
        }
}
