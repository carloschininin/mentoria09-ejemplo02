<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Circle;
use App\Service\Shape\CirculoService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CircleGenerateController extends AbstractController
{
    #[Route('/shape-generate/circle/{radio}', name: 'shape-generate-circle', methods: ['GET'])]
    public function GenerarCirculo(int $radio, EntityManagerInterface $entityManager, CirculoService $circuloService): Response
    {
        // generar la entidad
        $circle = new Circle();

        // asignar los datos
        $circle->setRadio($radio);
        $circle->setArea($circuloService->area($radio));
        $circle->setCreateAt(new \DateTime());

        // grabar en la BD.
        $entityManager->persist($circle); // guardamos en la cola de procesamiento del doctrine.
        $entityManager->flush(); // Enviamos todo lo almacenado en la cola a la BD.

        return $this->render('shape/circle-generate.html.twig', [
            'circle' => $circle,
        ]);
    }

    #[Route('/shape-delete/circle/{id}', name: 'shape-delete-circle', methods: ['GET'])]
    public function eliminarCirculo(int $id, EntityManagerInterface $entityManager): Response
    {
        // obtener la entidad desde la BD.
        $circle = $entityManager->getRepository(Circle::class)->find($id);

        // eliminar el registro en la BD
        if (null !== $circle) { // chequear si existe ese registro
            $entityManager->remove($circle);
            $entityManager->flush();
        }

        // Obtener el listado completo de registros
        $circles = $entityManager->getRepository(Circle::class)->findAll();

        return $this->render('shape/circle-delete.html.twig', [
            'circles' => $circles,
        ]);
    }
}