<?php

namespace App\Models;

/**
 * Classe simples que representa um Usuário do sistema.
 * Contém apenas o nome e o e-mail.
 */
class User
{
    public $name;
    public $email;

    // Construtor que inicializa os atributos
    public function __construct($name, $email)
    {
        $this->name  = $name;
        $this->email = $email;
    }
}