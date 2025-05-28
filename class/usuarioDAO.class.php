<?php

require 'novoUsuario.class.php';

class UsuarioDAO implements UserDao {

    private $engine;

    public function __construct(PDO $engine){
        $this->engine = $engine;
    }


    public function create(User $user){
    $query = $this->engine->prepare('INSERT INTO dados (nome,email,dinheiro) VALUES (:nome,:email,:dinheiro)');
    $query->bindValue(':nome', $user->getNome());
    $query->bindValue(':email', $user->getEmail());
    $query->bindValue(':dinheiro', $user->getDinheiro());
    $query->execute();
    
    $user->setId($this->engine->lastInsertId());
    return $user;

}

    public function findAll(): array{
       $stmtFindAll = $this->engine->query("SELECT * FROM dados");
        $dadosArray = [];

        if($stmtFindAll->rowCount() > 0) {
        $data = $stmtFindAll->fetchAll(PDO::FETCH_ASSOC);

        foreach($data as $dados) {
            $user = new User();
            $user->setId($dados['id']);
            $user->setNome($dados['nome']);
            $user->setEmail($dados['email']);
            $user->setDinheiro($dados['dinheiro']);

            $dadosArray[] = $user;
        }
}       
      return $dadosArray; 

    }

    public function findById($id) {
    $stmtEdit = $this->engine->prepare("SELECT * FROM dados WHERE id = :id");
    $stmtEdit->bindValue(":id",$id);
    $stmtEdit->execute();

    if($stmtEdit->rowCount() > 0) {
    $valuesToEdit = $stmtEdit->fetch(PDO::FETCH_ASSOC);

    $createNewUser = new User();
    $createNewUser->setId($valuesToEdit['id']);
    $createNewUser->setEmail($valuesToEdit['email']);
    $createNewUser->setNome($valuesToEdit['nome']);
    $createNewUser->setDinheiro($valuesToEdit['dinheiro']);

    return $createNewUser;
}

}

    public function findByEmail($email) {
        $stmtFindByEmail = $this->engine->prepare("SELECT * FROM dados WHERE email = :email");
        $stmtFindByEmail->bindValue(':email', value: $email);
        $stmtFindByEmail->execute();

        if($stmtFindByEmail->rowCount() > 0) {
            $data = $stmtFindByEmail->fetch(PDO::FETCH_ASSOC);
            
            $createNewUser = new User();
            $createNewUser->setId($data['id']);
            $createNewUser->setNome($data['nome']);
            $createNewUser->setEmail($data['email']);
            $createNewUser->setDinheiro($data['dinheiro']);
          
            return $createNewUser;
        }  else {
            return false;
        }
    }

    public function update(User $user) {
    $query = $this->engine->prepare('UPDATE dados SET nome = :nome, email = :email, dinheiro = :dinheiro WHERE id = :id');;
    $query->bindValue(':id', $user->getId());
    $query->bindValue(':nome', $user->getNome());
    $query->bindValue(':email', $user->getEmail());
    $query->bindValue(':dinheiro', $user->getDinheiro());
    $query->execute();
   

    }
    public function delete($id) {
     $stmtDeleteUser = $this->engine->prepare("DELETE FROM dados WHERE id = :id");
     $stmtDeleteUser->bindValue(":id",$id);
     $stmtDeleteUser->execute(); 

     return $stmtDeleteUser;

    }


}
