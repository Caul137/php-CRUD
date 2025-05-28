<?php

class User{

    private int $id;
    private string $nome;
    private string $email;
    private float $dinheiro;

    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id; 
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setEmail($email){
        $this->email = $email;
    }


    public function getEmail(){
        return $this->email;
    }

    public function setDinheiro($dinheiro): void{
        $this->dinheiro = $dinheiro;
    }

    public function getDinheiro(){
        return $this->dinheiro;
    }


}


interface UserDao{
    public function create(User $user);
    public function findAll();
    public function findById($id);
    public function findByEmail($email);
    public function update(User $user);
    public function delete($id);
    
}