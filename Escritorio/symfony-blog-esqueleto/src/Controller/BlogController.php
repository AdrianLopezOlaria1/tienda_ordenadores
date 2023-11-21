<?php

namespace App\Controller;

use Symfony\Component\Filesystem\Filesystem;
use App\Entity\Comment;
use App\Entity\Post;
use App\Form\CommentFormType;
use App\Form\PostFormType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class BlogController extends AbstractController
{
    #[Route("/blog/buscar", name: 'blog_buscar')]
    public function buscar(ManagerRegistry $doctrine, Request $request): Response
    {
        $repository = $doctrine->getRepository(Post::class);
        
        // Obtener el término de búsqueda de la query string
        $searchTerm = $request->query->get('searchTerm', '');
    
        // Buscar los posts cuyos slugs contienen la cadena de búsqueda
        $posts = $repository->createQueryBuilder('p')
            ->where('p.Slug LIKE :searchTerm')
            ->setParameter('searchTerm', '%' . $searchTerm . '%')
            ->getQuery()
            ->getResult();

    
        $commentForm = $this->createForm(CommentFormType::class);
    
        return $this->render('blog/single_post.html.twig', [
            'posts' => $posts,  // Cambié el nombre a 'posts' para reflejar que ahora es un array
            'recents' => [], 
            'commentForm' => $commentForm->createView(),
        ]);
    }
    
    
   


    #[Route("/blog/new", name: 'new_post')]
    public function newPost(ManagerRegistry $doctrine, Request $request, SluggerInterface $slugger, UserInterface $user): Response
    {
        $post = new Post();
        $form = $this->createForm(PostFormType::class, $post);
    
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            // Asignar valores adicionales antes de guardar en la base de datos
            $file = $form->get('Image')->getData();
            if ($file) {
                $originalFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$file->guessExtension();
    
                try {
                    
                        $file->move(
                            $this->getParameter('kernel.project_dir') . '/public/images/blog',
                            $newFilename
                        );
                
                } catch (FileException $e) {
                    // Manejar la excepción según tus necesidades
                    // Por ejemplo, puedes agregar un mensaje flash y redirigir a la página del formulario con un mensaje de error.
                    $this->addFlash('error', 'Error al subir la imagen.');
                    return $this->redirectToRoute('new_post');
                }
               
                $post->setImage($newFilename);
            }
    
            $post->setUser($user);
             // Asignar el usuario logeado
            $currentTime = new \DateTime('now');
            $post->setPublishedAt($currentTime);
    
            // Otros valores

            $slug = str_replace('-', ' ', $post->getTitle());
            $post->setSlug($slug);
            
            $post->setNumLikes(0);
            $post->setNumComments(0);
            $post->setNumViews(0);
    
            $entityManager = $doctrine->getManager();
            $entityManager->persist($post);
            $entityManager->flush();
    
            // Redirigir a la página de éxito (index) o realizar otras acciones
            $this->addFlash('success', 'Publicación creada con éxito.');
            return $this->redirectToRoute('index');
        }
    
        return $this->render('blog/new_post.html.twig', [
            'form' => $form->createView(),
        ]);
    }

     
    #[Route("/single_post/{slug}/like", name: 'post_like')]
    public function like(ManagerRegistry $doctrine, Request $request, $slug): Response
    {
        // Obtener el post con el slug proporcionado
        $post = $doctrine->getRepository(Post::class)->findOneBy(['Slug' => $slug]);

        // Incrementar el contador de likes
        $post->setNumLikes($post->getNumLikes() + 1);

        // Guardar los cambios en la base de datos
        $entityManager = $doctrine->getManager();
        $entityManager->persist($post);
        $entityManager->flush();

        // Redirigir a la página del post después de dar like
        return $this->redirectToRoute('single_post', ['slug' => $slug]);
    }



    #[Route("/blog", name: 'blog')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(Post::class);
        $posts = $repository->findAll();
        
        return $this->render('blog/blog.html.twig', [
            'posts' => $posts,
        ]);
    }

    #[Route("/single_post/{slug}", name: 'single_post')]
    public function post(ManagerRegistry $doctrine, Request $request, $slug = 'cambiar'): Response
    {
        $post = $doctrine->getRepository(Post::class)->findOneBy(['Slug' => $slug]);


        return $this->render('partials/post.html.twig', [
            'post' => $post,
        ]);
        
    }
}
