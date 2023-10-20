<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    #[Route('/', name: 'app_inicio')]
    public function inicio(): Response
    {
        return $this->render('page/inicio.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    #[Route('/user/{codigo}', name: 'app_inicio')]
    public function ficha($codigo): Response{
        $resultado = ($this->usuarios[$codigo] ?? null);

       return $this->render('ficha_usuario.html.twig',[
                'usuario' => $resultado
       ]);
        
    }


    protected $usuarios = [
        1 => ["nombre" => "Juan.23", "email" => "juanp@ieselcaminas.org", "passwd" => "8qQ92j67"],
        2 => ["nombre" => "Annna.lpz",  "email" => "anita@ieselcaminas.org", "passwd"=>"ia5e8D6c"],
        5 => ["nombre" => "teach33",  "email" => "mario.mont@ieselcaminas.org", "passwd"=>"Oa326J6H"],
        7 => ["nombre" => "rawdJ.27",  "email" => "lm2000@ieselcaminas.org", "passwd"=>"79F7pTiP"],
        9 => ["nombre" => "ErPepe",  "email" => "norajover@ieselcaminas.org", "passwd"=>"m0B45D3A"]
    ];     
}