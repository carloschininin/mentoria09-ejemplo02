<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HelloController
{
    #[Route('/hello', name: 'hello-world', methods: ['GET'])]
    public function saludo(): Response
    {
        return new Response('Hello World!');
    }

    #[Route('/hello/{name}', name: 'hello-name', methods: ['GET'])]
    public function saludoPorNombre(string $name): Response
    {
        return new Response('Hello '.$name.'!');
    }
}