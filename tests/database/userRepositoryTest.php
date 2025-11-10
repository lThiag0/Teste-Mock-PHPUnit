<?php

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use App\Repositories\UserRepository;
use App\Models\User;

//Teste de integração com banco de dados.
final class UserRepositoryTest extends TestCase
{
    private PDO $pdo;
    private UserRepository $repo;

    protected function setUp(): void
    {
        // Cria um banco de dados em memória
        $this->pdo = new PDO('sqlite::memory:');

        // Cria a tabela "users"
        $this->pdo->exec("CREATE TABLE users (id INTEGER PRIMARY KEY, name TEXT, email TEXT)");

        // Instancia o repositório com o banco
        $this->repo = new UserRepository($this->pdo);
    }

    #[Test]
    public function salvarEMostrarUsuario(): void
    {
        // Cria um novo usuário
        $user = new User("Thiago", "thiago@hotmail.com");

        // Salva no banco
        $this->assertTrue($this->repo->save($user));

        // Busca todos os usuários e valida o resultado
        $usuarios = $this->repo->all();

        $this->assertCount(1, $usuarios);
        $this->assertSame("Thiago", $usuarios[0]['name']);
        $this->assertSame("thiago@hotmail.com", $usuarios[0]['email']);
    }

    // Mensagem final após todos os testes da classe
    public static function tearDownAfterClass(): void
    {
        $verde = "\033[32m";
        $reset = "\033[0m";

        echo "\n{$verde}✅ Todos os testes [Database] passaram com sucesso! Nenhum erro encontrado.{$reset}\n";
    }
}
