<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;
use InvalidArgumentException;

//Aqui fazemos validações antes de salvar o usuário.
class UserService
{
    private $repository;

    // O repositório é injetado
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Faz a validação do usuário e o registra.
     * retorna exceção se o nome ou e-mail forem inválidos.
     */
    public function registerUser($name, $email)
    {
        if (empty($name) || empty($email)) {
            throw new InvalidArgumentException("Ops, nome e email são obrigatórios.");
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException("Ops, email inválido.");
        }

        $user = new User($name, $email);

        // Chama o repositório para salvar no banco
        return $this->repository->save($user);
    }
}
