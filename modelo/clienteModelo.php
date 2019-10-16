<?php

function adicionarCliente ($rg, $nome) {
    $comando= "call sp_cadastrarCliente($rg, '$nome')"; 
    $resultado = mysqli_query ($cnx = conn(), $comando);
    if(!$resultado) { die('Erro ao cadastrar cliente'.mysqli_error($cnx));}
    return 'Cliente cadastrado com sucesso!';
}

function listarCliente (){
    $comando= "call sp_listarCliente";
    $resultado = mysqli_query(conn(), $comando);
    $usuarios = array();
    while ($linha = mysqli_fetch_assoc($resultado)){
        $usuarios[] = $linha;
    }
    return $usuarios; 
}

function pegarClientePorId ($idCliente) {
    $comando = "call sp_listarClientePorId ($idCliente)";
    $resultado = mysqli_query(conn(), $comando);
    $clientes = mysqli_fetch_assoc($resultado);
    
    return $usuarios;
}

function deletarCliente ($idCliente) {
    $comando = "call sp_deletarCliente($idCliente)";
    $conexao= conn();
    $resultado = mysqli_query($cnx = conn(), $sql);
    if (!$resultado==true) {
        echo "Deletado"; 
    }else {
        echo "N deletado";
    }
}
function editar($idCliente, $rg, $nome){
    $comando= "call sp_editarCliente($idCliente, $rg, '$nome')";
    $resultado= mysqli_query($cnx=conn(), $comando);
    if (!$resultado){die ('Erro ao editar os dados do cliente'. mysqli_error($cnx)); }
    return 'Editado!';
}


