<?php
class ControleCurso extends ControleBase {
        private $visao;
        private $curso;

        public function getVisao() {
                return $this->visao;
        }


        public function setVisao($visao) {
                $this->visao = $visao;
        }


        public function __construct() {
                //Cria uma instância da classe Curso
                $this->curso = new Curso();
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
                // Passa dados do formulário para a classe Curso
                $this->curso->setCurso((isset($this->visao["curso"]) && $this->visao["curso"] != null) ? $this->visao["curso"] : "");
        }

        protected function inserir() {
                // Passa dados do formulário para a classe Curso
                $this->preencheModelo();
                //Chama o método para inserir os dados no banco de dados
                return $this->curso->inserir();
        }

        protected function alterar() {
                // Passa dados do formulário para a classe Curso
                $this->preencheModelo();
                //Chama o método para alterar os dados no banco de dados
                return $this->curso->alterar();
        }

        protected function excluir(){
                // Passa dados do formulário (via GET) para a classe Curso
                $this->curso->setCurso((isset($this->visao["curso"]) && $this->visao["curso"] != null) ? $this->visao["curso"] : "");
                //Chama o método para excluir os dados no banco de dados
                return $this->curso->excluir();
        }

        protected function listarTodos($param=null){

                //Chama o método para listar os curso do banco de dados de acordo com um filtro
                return $this->curso->listarTodos($param);
        }

        protected function listarUnico($param){


                //Chama o método para listar um curso específico do banco de dados
                return $this->curso->listarUnico($param);
        }
}
