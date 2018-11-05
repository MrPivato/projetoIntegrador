<?php

interface IBaseModelo {
    public function inserir();
    public function alterar();
    public function excluir();
    public function listarTodos($param=null);
    public function listarUnico($param);
}
