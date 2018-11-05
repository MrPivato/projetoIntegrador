<?php

class ControleLivro extends ControleBase {
    private $visao;
    private $livro;
    
    public function getVisao() {
        return $this->visao;
    }

   
    public function setVisao($visao) {
        $this->visao = $visao;
    }

    
    public function __construct() {
        //Cria uma instância da classe Livro
        $this->livro = new Livro();
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
        // Passa dados do formulário para a classe Livro
        $this->livro->setNome((isset($this->visao["nome"]) && $this->visao["nome"] != null) ? $this->visao["nome"] : "");
        $this->livro->setSerie((isset($this->visao["serie"]) && $this->visao["serie"] != null) ? $this->visao["serie"] : "");        
        $this->livro->setId((isset($this->visao["id"]) && $this->visao["id"] != null) ? $this->visao["id"] : "");
    }
    
    protected function inserir() {
        // Passa dados do formulário para a classe Livro
        $this->preencheModelo();
        //Chama o método para inserir os dados no banco de dados
        return $this->livro->inserir();
    }
    
    protected function alterar() {
        // Passa dados do formulário para a classe Livro
        $this->preencheModelo();
        //Chama o método para alterar os dados no banco de dados
        return $this->livro->alterar();
    }

    protected function excluir(){
        // Passa dados do formulário (via GET) para a classe Livro
        $this->livro->setId((isset($this->visao["id"]) && $this->visao["id"] != null) ? $this->visao["id"] : "");
        //Chama o método para excluir os dados no banco de dados
        return $this->livro->excluir();
    }
    
    protected function listarTodos($param=null){
        
        //Chama o método para listar os livros do banco de dados de acordo com um filtro
        return $this->livro->listarTodos($param);
    }
    
    protected function listarUnico($param){
        
        
        //Chama o método para listar um livro específico do banco de dados
        return $this->livro->listarUnico($param);
    }
}
