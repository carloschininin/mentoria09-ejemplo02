<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\Shape\CirculoService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ShapeViewController extends AbstractController
{
    #[Route('/shape-view/circle/{radio}', name: 'shape-circle', methods: ['GET'])]
    public function areaCirculo(float $radio, CirculoService $circuloService): Response
    {
        $areaCirculo = $circuloService->area($radio);
        $perimetroCirculo = $circuloService->perimetro($radio);

        return $this->render('shape/circle.html.twig', [
            'area' => $areaCirculo,
            'perimetro' => $perimetroCirculo,
            'radio' => $radio,
        ]);
    }

    #[Route('/shape-view/circles', name: 'shape-circles-all', methods: ['GET'])]
    public function areaCirculoVarios(CirculoService $circuloService): Response
    {
        $radios = [2, 4, 6, 8, 10];
        $items = [];
        foreach ($radios as $radio) {
            $items[] = [
                'radio' => $radio,
                'area' => $circuloService->area($radio),
            ];
        }

        return $this->render('shape/circle-array.html.twig', [
            'items' => $items,
        ]);
    }
}