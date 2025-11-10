<?php

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use App\Services\UserService;
use App\Repositories\UserRepository;
use App\Models\User;

final class UserServiceTest extends TestCase
{
    #[Test]
    public function deveRetornarErroQuandoEmailForInvalido(): void
    {
        // Cria um repositório falso (stub) apenas para simular o comportamento
        $mockRepo = $this->createStub(UserRepository::class);
        $service = new UserService($mockRepo);

        // Espera uma exceção caso o e-mail não seja válido
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Ops, email inválido.");

        $service->registerUser("Gabriel", "email_invalido");
    }

    #[Test]
    public function deveExecutarMetodoSaveAoRegistrarUsuario(): void
    {
        // Cria um mock do repositório que verifica se o método save foi chamado
        $mockRepo = $this->getMockBuilder(UserRepository::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['save'])
            ->getMock();

        // Garante que o método 'save' será chamado uma vez com um objeto User
        $mockRepo->expects($this->once())
                 ->method('save')
                 ->with($this->isInstanceOf(User::class))
                 ->willReturn(true);

        $service = new UserService($mockRepo);

        $resultado = $service->registerUser("Rian", "rian@hotmail.com");

        // Verifica se o resultado foi verdadeiro
        $this->assertTrue($resultado);
    }

    // Mensagem final após os testes
    public static function tearDownAfterClass(): void
    {
        $verde = "\033[32m";
        $reset = "\033[0m";

        echo "\n{$verde}✅ Testes [Service] executados com sucesso! Nenhum erro encontrado.{$reset}\n";
    }
}
