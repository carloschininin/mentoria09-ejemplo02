<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\Shape\CirculoService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Attribute\Route;

#[AsController]
final class ShapeController
{
    #[Route('/shape/circle/{radio}', name: 'shape-circle', methods: ['GET'])]
    public function areaCirculo(float $radio, CirculoService $circuloService): Response
    {
        $area = $circuloService->area($radio);

        return new Response((string) $area);
    }
}