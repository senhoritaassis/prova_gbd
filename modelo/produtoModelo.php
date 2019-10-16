<?php
function adicionarProduto($descricao, $quantidade){
    $comando= "call sp_cadastra_produto('$descricao', $quantidade)";
    $resultado= mysqli_query($cnx=conn(), $comando);
    if (!$resultado){die ('Erro ao cadastrar o produto'. mysqli_error($cnx)); }
return 'Produto cadastrado!';
}


function pegarProdutoPorId ($codProduto) {
    $comando = "call sp_listarProdutoporCod ($codProduto)";
    $resultado = mysqli_query(conn(), $comando);
    $produtos = mysqli_fetch_assoc($resultado);
    
    return $produtos;
}

function listarProduto(){
    $comando= "call sp_listarProduto";
    $resultado = mysqli_query(conn(), $comando);
    $produtos = array();
    while($linha = mysqli_fetch_assoc($resultado)){
        $produtos[] = $linha;
    }
    return $produtos;
}
function delete($codProduto){
    $comando= "call sp_deletarProduto($codProduto)";
    $conexao= conn();
    $resultado= mysqli_query($conexao, $comando);
   
     if($resultado == true){
       echo "Deu certo!";
   }else {
       echo "Deu errado";
   }
}

function editar($codProduto, $descricao, $quantidade){
    $comando= "call sp_editarProduto('$codProduto', '$descricao', '$quantidade')";
    $resultado= mysqli_query($cnx=conn(), $comando);
    if (!$resultado){die ('Erro ao editar produto'. mysqli_error($cnx)); }
    return 'Editado!';
}

