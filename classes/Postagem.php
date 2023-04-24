<?php

require_once 'MaeBanco.php';


 class Postagem extends Db{
    public int $id;
    public int $id_usuario ;
    public string $titulo;
    public string $postagem;


    public function adicionar(){
        if (isset($_SESSION['usuario']['id'])) {
            $this->id_usuario = (int)$_SESSION['usuario']['id'];
        if ($this->titulo && $this->postagem) {
            try {
                $query = $this->pdo->prepare("INSERT INTO postagens(`id_usuario`, `postagens`, `titulo` , `imagens`)
                 VALUES('{$this->id_usuario}' , '{$this->postagem}', '{$this->titulo}',''); ");

                 $query->execute();
                 return $query->rowCount();
            } catch (\PDOException $e) {
               return $e->getMessage();
            }
        }

    }
    return false;
}

public function exibir(){
    $query = $this->pdo->prepare("SELECT postagens , titulo FROM postagens ORDER BY id  DESC ");
    $query->execute();
    $resultado = $query->fetchAll(PDO::FETCH_ASSOC);

    
    $output = '';
    if (count($resultado)){
        foreach ($resultado as $resultados){
            $output .= "<h2>" . $resultados['titulo'] . "</h2>";
            $output .= "<p>" . $resultados['postagens'] . "</p>";
        }
    }
    return $output;

}

public function meusPost($id_usuario){
    $query = $this->pdo->prepare("SELECT * FROM postagens WHERE id_usuario = '{$id_usuario}'");
    $query->execute();
    $resultados = $query->fetchAll(PDO::FETCH_ASSOC);
    
    $output = '';
    if (count($resultados)) {
        foreach($resultados as $resultado){

            $output .=  "<form method='post' action='../actions/postagem/Update.php'>
             
                <input type='text' name='titulo'  value='{$resultado['titulo']}'>
                <input type='text' name='postagens' value='{$resultado['postagens']}'>
                <button type='submit'>Editar</button>
                </form>";
            $output .= "<p><a href='../actions/postagem/Delete.php?id=".$resultado['id']."'>Excluir</a></p>"; 
        }
    }
    return $output; 
}

public function apagar($id){
    $query = $this->pdo->prepare("DELETE FROM postagens WHERE id = '{$id}'");
    $query->execute();

    $resultado = $query->fetch(PDO::FETCH_ASSOC);
        if ($resultado) {
            return $resultado;
        }
        return null;
 
}

public function editar($id){
    var_dump($this->postagem);exit;
$query = $this->pdo->prepare("UPDATE postagens SET postagens = '{$this->postagem}' ,  titulo = '{$this->titulo}'
WHERE id = '{$id}' ");
$query->execute();


$resultado = $query->fetch(PDO::FETCH_ASSOC);
if ($resultado) {
    return $resultado;
}
return null;
}

}


 