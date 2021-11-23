<?php

namespace App\Controller;

use App\Entity\Usuario;
use App\Form\UsuarioType;
use App\Repository\UsuarioRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\DateIntervalType;

/**
 * @Route("/usuario")
 */
class UsuarioController extends AbstractController
{

    /**
     * @Route("/", name="usuario_index", methods={"GET"})
     */
    public function index(UsuarioRepository $usuarioRepository): Response
    {
        $this->denyAccessUnlessGranted('view','usuario');

        return $this->render('usuario/index.html.twig', [
            'usuarios' => $usuarioRepository->findAll(),
            'pagina'=>'Usuarios',
        ]);
    }

    /**
     * @Route("/new", name="usuario_new", methods={"GET","POST"})
     */
    public function new(Request $request,UserPasswordEncoderInterface $encoder): Response
    {
        $this->denyAccessUnlessGranted('create','usuario');

        $usuario = new Usuario();
        $usuario->setFechaActivacion(new \DateTime(date('Y-m-d H:i:s')));
       
        $form = $this->createForm(UsuarioType::class, $usuario);
        $form->add('usuarioTipo');
        $form->add('estado');
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $password=$usuario->getPassword();
            $encoded=$encoder->encodePassword($usuario,$password);
            $usuario->setPassword($encoded);
            $entityManager->persist($usuario);
            $entityManager->flush();

            return $this->redirectToRoute('usuario_index');
        }

        return $this->render('usuario/new.html.twig', [
            'usuario' => $usuario,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="usuario_show", methods={"GET"})
     */
    public function show(Usuario $usuario): Response
    {
        $this->denyAccessUnlessGranted('view','usuario');
       
        return $this->render('usuario/show.html.twig', [
            'usuario' => $usuario,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="usuario_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Usuario $usuario): Response
    {
        $this->denyAccessUnlessGranted('edit','usuario');
        
        $form = $this->createForm(UsuarioType::class, $usuario);
        $form->add('usuarioTipo');
        $form->add('estado');
        
        $form->add("password", TextType::class,[
            'attr'=>[
                'style'=>'display:none'
            ],
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            
            $this->getDoctrine()->getManager()->flush();
            
            return $this->redirectToRoute('usuario_index');
        }

        return $this->render('usuario/edit.html.twig', [
            'usuario' => $usuario,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="usuario_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Usuario $usuario): Response
    {
        $this->denyAccessUnlessGranted('full','usuario');
        if ($this->isCsrfTokenValid('delete'.$usuario->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $usuario->setEstado(0);
            $entityManager->persist($usuario);
            $entityManager->flush();
        }

        return $this->redirectToRoute('usuario_index');
    }
}
