<?php

function adicionar () {
	if (ehPost ()) {
		$descricao = $_POST ["descricao"];
                $quantidade = $_POST ["quantidade"];
                
                
                $msg = adicionarProduto($descricao, $quantidade );
                echo $msg;
            
        }else {
            $dados["produto"] = adicionarProduto($codProduto);
            exibir("produtos/formulario",$dados);	
	}
}


function listar () {
    $dados = array ();
    $dados["produtos"] = pegarTodosProdutos();
    exibir ("produtos/listar", $dados);
}


function ver ($codProduto){
    $dados["produtos"] = pegarProdutoPorId($codProduto);
    exibir ("produtos/visualizar" , $dados);
}


function deletar ($codProduto){
    $msg = deletarProduto($codProduto);
    redirecionar("./produto/listar");
}


function editar($codProduto){
    if (ehPost()) {
        $descricao = $_POST ["descricao"];
        $quantidade = $_POST ["quantidade"];
        
        
        editarProduto($codProduto, $descricao, $quantidade);
        redirecionar ("produto/listar");
    }else {
        $dados["produto"] = pegarProdutoPorId($codProduto);
        exibir ("produtos/formulario", $dados);
    }
}




