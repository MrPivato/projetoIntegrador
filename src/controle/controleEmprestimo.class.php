<?php
class ControleEmprestimo extends ControleBase {
        private $visao;
        private $emprestimo;

        public function getVisao() {
                return $this->visao;
        }


        public function setVisao($visao) {
                $this->visao = $visao;
        }


        public function __construct() {
                //Cria uma instância da classe Emprestimo
                $this->emprestimo = new Emprestimo();
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
                // Passa dados do formulário para a classe Emprestimo
                $this->emprestimo->setId((isset($this->visao["id"]) && $this->visao["id"] != null) ? $this->visao["id"] : "");
                $this->emprestimo->setMatriculaEstudante((isset($this->visao["matriculaEstudante"]) && $this->visao["matriculaEstudante"] != null) ? $this->visao["matriculaEstudante"] : "");
                $this->emprestimo->setCodBarrasLivro((isset($this->visao["codBarrasLivro"]) && $this->visao["codBarrasLivro"] != null) ? $this->visao["codBarrasLivro"] : "");
                $this->emprestimo->setVerificacaoEntrega((isset($this->visao["verificacaoEntrega"]) && $this->visao["verificacaoEntrega"] != null) ? $this->visao["verificacaoEntrega"] : "");
                $this->emprestimo->setDataDevolucao((isset($this->visao["dataDevolucao"]) && $this->visao["dataDevolucao"] != null) ? $this->visao["dataDevolucao"] : "");
                $this->emprestimo->setPeriodoEntrega((isset($this->visao["periodoEntrega"]) && $this->visao["periodoEntrega"] != null) ? $this->visao["periodoEntrega"] : "");
                $this->emprestimo->setStatusEntrega((isset($this->visao["statusEntrega"]) && $this->visao["statusEntrega"] != null) ? $this->visao["statusEntrega"] : "");
                $this->emprestimo->setCondicaoEntrega((isset($this->visao["condicaoEntrega"]) && $this->visao["condicaoEntrega"] != null) ? $this->visao["condicaoEntrega"] : "");
                $this->emprestimo->setCondicaoDevolucao((isset($this->visao["condicaoDevolucao"]) && $this->visao["condicaoDevolucao"] != null) ? $this->visao["condicaoDevolucao"] : "");
                $this->emprestimo->setDataDeEntrega((isset($this->visao["dataDeEntrega"]) && $this->visao["dataDeEntrega"] != null) ? $this->visao["dataDeEntrega"] : "");
        }

        protected function inserir() {
                // Passa dados do formulário para a classe Emprestimo
                $this->preencheModelo();
                //Chama o método para inserir os dados no banco de dados
                return $this->emprestimo->inserir();
        }

        protected function alterar() {
                // Passa dados do formulário para a classe Emprestimo
                $this->preencheModelo();
                //Chama o método para alterar os dados no banco de dados
                return $this->emprestimo->alterar();
        }

        protected function excluir(){
                // Passa dados do formulário (via GET) para a classe Emprestimo
                $this->emprestimo->setId((isset($this->visao["id"]) && $this->visao["id"] != null) ? $this->visao["id"] : "");
                //Chama o método para excluir os dados no banco de dados
                return $this->emprestimo->excluir();
        }

        protected function listarTodos($param=null){
                //Chama o método para listar os emprestimos do banco de dados de acordo com um filtro
                return $this->emprestimo->listarTodos($param);
        }

        protected function listarUnico($param){
                //Chama o método para listar um emprestimo específico do banco de dados
                return $this->emprestimo->listarUnico($param);
        }
}
