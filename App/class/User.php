<?php

namespace App\class;

class User extends AbstractEntity{

    const table_name = 'user_';
    protected $id;
    protected $email;
    protected $psedonym;
    protected $firstname;
    protected $name;
    protected $password;
    protected $role;

    public function __construct(array $datas = [])
    {
        $this->id=($datas['id']) ?? 0;
        $this->email=htmlspecialchars($datas['email'] ?? '');
        $this->psedonym=htmlspecialchars($datas['psedonym'] ?? '');
        $this->firstname=htmlspecialchars($datas['firstname'] ?? '');
        $this->name=htmlspecialchars($datas['name'] ?? '');
        $this->password= !empty($datas['password']) ? password_hash($datas['password'],PASSWORD_DEFAULT):NULL;
        $this->role=($datas['role']) ?? 1;
    }

    public function to_array(){
        return [
            'email'=>$this->email,
            'psedonym'=>$this->psedonym,
            'firstname'=>$this->firstname,
            'name'=>$this->name,
            'password'=>$this->password,
            'role'=>$this->role,
        ];
    }
}