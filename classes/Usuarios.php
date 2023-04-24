<?php

require_once 'MaeBanco.php';

// TODO

// criar metodo findById($id) e retornar o usuario com o respectivo id
// criar um metodo find() que retorne uma lista dos usuarios
// criar metodo remove($id) e que retorne um booleano para true se foi deletado ou false se não for
// criar metodo update() que atualize o usuario e trazer as informacoes do usuario alterado



class Usuarios extends Db {

    public int $id;
    public string $nome;
    public string $email;
    public string $senha;
    public string $aniversario;
    public ?string $foto;

    public function cadastrar()   {
        if ($this->nome && $this->email && $this->senha && $this->aniversario  ) {
            $this->senha = $this->encrypt_password($this->senha);
            
            try {
                $query = $this->pdo->prepare("INSERT INTO usuarios ( `name`, `email`, `password`, `foto_perfil`, `data_aniversario`) 
                VALUES ('{$this->nome}', '{$this->email}', '{$this->senha}', '', '{$this->aniversario}');");
    
                $query->execute();
                return $query->rowCount();
            } catch (\PDOException $e) {
                return $e->getMessage();
            }
    
        }
    }
    private function  encrypt_password($password){
        return substr(md5($password), 0,30 );
    }

    public function logar(){
        $query = $this->pdo->prepare("SELECT `id`,`name`, `email`, `password`, `foto_perfil`, `data_aniversario` FROM usuarios WHERE  `email` = '{$this->email}' AND `password` = '{$this->encrypt_password($this->senha)}'");
        $query->execute();
        $resultado = $query->fetch(PDO::FETCH_ASSOC);
        
        if ($resultado) {
            return $resultado;
        }
        return null;
    }

    public function findById($id){
        $query = $this->pdo->prepare("SELECT * FROM usuarios WHERE id = '{$id}' ");
        
        $query->execute();

        $resultado = $query->fetch(PDO::FETCH_ASSOC);
        if ($resultado) {
            return $resultado;
        }
        return null;
    }

    public function find(){
        $query = $this->pdo->prepare("SELECT * FROM usuarios;");
        
        $query->execute();

        $resultado = $query->fetch(PDO::FETCH_ASSOC);
        if ($resultado) {
            return $resultado;
        }
        return null;
    }

    public function deletar($id){
        $query = $this->pdo->prepare("DELETE FROM usuarios WHERE id = '{$id}' ");
        $query->execute();

        $resultado = $query->fetch(PDO::FETCH_ASSOC);
        if ($resultado) {
            return $resultado;
        }
        return null;
    }

    public function atualizar($id): ?Usuarios {
        $query = $this->pdo->prepare("UPDATE usuarios SET `name` = '{$this->nome}' , `email` = '{$this->email}' , `data_aniversario` = '{$this->aniversario}'  
        WHERE id ='{$id}' ");
        $query->execute();
        if ($query->rowCount() > 0) {
            $query = $this->pdo->prepare("SELECT * FROM usuarios  WHERE id = '{$id}' ");
            $query->execute();
            $resultado = $query->fetch(PDO::FETCH_ASSOC);

            $this->id = $resultado['id'];
   
            $_SESSION['usuario']['name'] = $this ->nome = $resultado['name'];
            $_SESSION['usuario']['email'] = $this->email = $resultado['email'];
            $_SESSION['usuario']['data_aniversario'] = $this->aniversario = $resultado['data_aniversario'];


            return $this;
        }
        return null;

        $resultado = $query->fetch(PDO::FETCH_ASSOC);
        if ($resultado) {
            return $resultado;
        }
        return null;
    }


    

 
    
}