<?php

namespace App\Controller;

use App\Entity\Cliente;
use App\Form\ClienteType;
use App\Repository\ClienteRepository;
use App\Repository\ModuloPerRepository;
use App\Repository\ModuloRepository;
use App\Repository\PrivilegioRepository;
use App\Repository\PrivilegioTipousuarioRepository;
use App\Repository\UsuarioRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/cliente")
 */
class ClienteController extends AbstractController
{
    /**
     * @Route("/", name="cliente_index", methods={"GET"})
     */
    public function index(ClienteRepository $clienteRepository, 
                            ModuloPerRepository $moduloPerRepository, 
                            PaginatorInterface $paginator,
                            Request $request): Response
    {

        $this->denyAccessUnlessGranted('view','cliente');
        $user=$this->getUser();

        $modo=1;
        if($request->query->get('modo')=='trash'){
            $modo=0;
            
        }

        $pagina=$moduloPerRepository->findOneByName('cliente',$user->getEmpresaActual());
        $query=$clienteRepository->findBy(['estado'=>$modo]);
        $clientes=$paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            10 /*limit per page*/,
            array('defaultSortFieldName' => 'nombre', 'defaultSortDirection' => 'asc'));

        return $this->render('cliente/index.html.twig', [
            'clientes' => $clientes,
            'pagina'=>$pagina->getNombre(),
            'modo'=>$modo,
        ]);
    }

    /**
     * @Route("/new", name="cliente_new", methods={"GET","POST"})
     */
    public function new(Request $request,
                        ModuloPerRepository $moduloPerRepository,
                        PrivilegioTipousuarioRepository $privilegioTipousuarioRepository,
                        PrivilegioRepository $privilegioRepository): Response
    {
        $this->denyAccessUnlessGranted('create','cliente');
        $user=$this->getUser();
        $pagina=$moduloPerRepository->findOneByName('cliente',$user->getEmpresaActual());
        $cliente = new Cliente();
        $cliente->setEstado(true);
        $cliente->setEmpresa($user->getEmpresaActual());
        $form = $this->createForm(ClienteType::class, $cliente);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($cliente);
            $entityManager->flush();

            return $this->redirectToRoute('cliente_index');
        }

        return $this->render('cliente/new.html.twig', [
            'cliente' => $cliente,
            'pagina'=>$pagina->getNombre(),
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="cliente_show", methods={"GET"})
     */
    public function show(Cliente $cliente): Response
    {
        return $this->render('cliente/show.html.twig', [
            'cliente' => $cliente,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="cliente_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Cliente $cliente, ModuloPerRepository $moduloPerRepository): Response
    {
        $this->denyAccessUnlessGranted('create','cliente');
        $user=$this->getUser();
        $pagina=$moduloPerRepository->findOneByName('cliente',$user->getEmpresaActual());

        $form = $this->createForm(ClienteType::class, $cliente);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cliente_index');
        }

        return $this->render('cliente/edit.html.twig', [
            'cliente' => $cliente,
            'pagina'=>$pagina->getNombre(),
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/restore", name="cliente_restore", methods={"GET"})
     */
    public function restore(Request $request, Cliente $cliente): Response
    {
        $this->denyAccessUnlessGranted('full','cliente');
      
            $entityManager = $this->getDoctrine()->getManager();
            $cliente->setEstado(1);
            $entityManager->persist($cliente);
            $entityManager->flush();
     

        return $this->redirectToRoute('cliente_index');
    }

    /**
     * @Route("/{id}", name="cliente_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Cliente $cliente): Response
    {
        if ($this->isCsrfTokenValid('delete'.$cliente->getId(), $request->request->get('_token'))) {
            $cliente->setEstado(0);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($cliente);
            $entityManager->flush();
        }

        return $this->redirectToRoute('cliente_index');
    }
}
