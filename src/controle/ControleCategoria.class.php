<?php
class ControleCategoria extends ControleBase {
        private $visao;
        private $categoria;

        public function getVisao() {
                return $this->visao;
        }


        public function setVisao($visao) {
                $this->visao = $visao;
        }


        public function __construct() {
                //Cria uma instância da classe Categoria
                $this->categoria = new Categoria();
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
                // Passa dados do formulário para a classe Categoria
                $this->categoria->setCategoria((isset($this->visao["categoria"]) && $this->visao["categoria"] != null) ? $this->visao["categoria"] : "");
        }

        protected function inserir() {
                // Passa dados do formulário para a classe Categoria
                $this->preencheModelo();
                //Chama o método para inserir os dados no banco de dados
                return $this->categoria->inserir();
        }

        protected function alterar() {
                // Passa dados do formulário para a classe Categoria
                $this->preencheModelo();
                //Chama o método para alterar os dados no banco de dados
                return $this->categoria->alterar();
        }

        protected function excluir(){
                // Passa dados do formulário (via GET) para a classe Categoria
                $this->categoria->setCategoria((isset($this->visao["categoria"]) && $this->visao["categoria"] != null) ? $this->visao["categoria"] : "");
                //Chama o método para excluir os dados no banco de dados
                return $this->categoria->excluir();
        }

        protected function listarTodos($param=null){

                //Chama o método para listar os categorias do banco de dados de acordo com um filtro
                return $this->categoria->listarTodos($param);
        }

        protected function listarUnico($param){


                //Chama o método para listar um categoria específico do banco de dados
                return $this->categoria->listarUnico($param);
        }
}
