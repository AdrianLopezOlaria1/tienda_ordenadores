<?php

namespace App\Controller;

use Symfony\Component\Security\Core\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\User;
use App\Entity\Curso;

class ServiceController extends AbstractController
{
    #[Route('/service', name: 'service')]
    public function index(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        return $this->render('service/index.html.twig', []);
    }

    #[Route('/service/add/{id}', name: 'service_add')]
    public function nuevoCurso(EntityManagerInterface $entityManager, Request $request, $id, Security $security)
    {
        
        $usuario = $security->getUser();
    
        
        if (!$usuario) {
            $mensajeError = "Error obteniendo el usuario. Asegúrate de estar autenticado.";
            
            return $this->render('error.html.twig', [
                'contacto' => $mensajeError
            ]);
        }
    
        $nombreCurso = $this->nombreCurso($id);
    
        $curso = new Curso();
        $curso->setNombre($nombreCurso);
        $curso->setUser($usuario);
    
        try {
            $entityManager->persist($curso);
            $entityManager->flush();
    
            return $this->render('exito.html.twig');
        } catch (\PDOException $e) {
            return new Response("Error insertando objetos" . $e->getMessage());
        }
    }

    protected function nombreCurso($id)
    {
        
        $cursos = [
            1 => 'JavaScript',
            2 => 'PHP',
            3 => 'Java',
            4 => 'Python',
            5 => 'Angular',
            6 => 'Node',
            
        ];

        return $cursos[$id] ?? 'Curso Desconocido';
    }
}
