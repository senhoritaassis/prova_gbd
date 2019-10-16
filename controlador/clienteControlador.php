<?php

function adicionar () {
	if (ehPost ()) {
                $rg = $_POST ["rg"];
                $nome = $_POST ["nome"];
		
                $msg = adicionarCliente($rg, $nome);
                echo $msg;
    
	}else {
		exibir ("cliente/formulario");
	}
}


function listar () {
    $dados = array ();
    $dados["usuarios"] = pegarTodosClientes();
    exibir ("cliente/listar", $dados);
}


function ver ($idCliente){
    $dados["usuarios"] = pegarClientePorId($idCliente);
    exibir ("cliente/visualizar" , $dados);
}


function deletar ($idCliente){
    $msg = deletarCliente($idCliente);
    redirecionar("./cliente/listar");
}


function editar ($idCliente) {
    if (ehPost()) {
        $nome = $_POST ["nome"];
        $rg = $_POST ["rg"];
        
        
        editarCliente($idCliente, $nome, $rg);
        redirecionar ("cliente/listar");
    }else {
        $dados["usuarios"] = pegarClienteporId($idCliente);
        exibir("cliente/formulario", $dados);
    }
}


