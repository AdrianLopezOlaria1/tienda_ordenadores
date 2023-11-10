<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TypographyController extends AbstractController
{
        #[Route('/perfil', name: 'perfil')]
        public function index(): Response
        {
            // Asegúrate de que el usuario esté autenticado
            $this->denyAccessUnlessGranted('ROLE_USER');
    
            // Obtén el usuario actual
            $usuario = $this->getUser();
    
            // Obtén los cursos del usuario desde la relación en la entidad User
            $cursos = $usuario->getCursos();
    
            return $this->render('perfil/index.html.twig', [
                'usuario' => $usuario,
                'cursos' => $cursos,
            ]);
        }
    }
