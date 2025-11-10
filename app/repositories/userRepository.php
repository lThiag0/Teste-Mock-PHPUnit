<?php

namespace App\Repositories;

use App\Models\User;
use PDO;

/**
 * Classe responsável por acessar o banco de dados.
 * PDO e SQLite.
 */
class UserRepository
{
    private $pdo;

    // Recebe uma conexão PDO
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Salva o usuário no banco.
     * Retorna true em caso de sucesso.
     */
    public function save(User $user)
    {
        $stmt = $this->pdo->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
        return $stmt->execute([$user->name, $user->email]);
    }

    /**
     * Retorna todos os usuários cadastrados.
     */
    public function all()
    {
        return $this->pdo->query("SELECT * FROM users")->fetchAll(PDO::FETCH_ASSOC);
    }
}
