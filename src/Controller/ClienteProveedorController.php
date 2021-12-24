<?php

namespace App\Controller;

use App\Entity\ClienteProveedor;
use App\Entity\Empresa;
use App\Entity\ModuloPer;
use App\Form\ClienteProveedorType;
use App\Repository\ClienteProveedorRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/cliente_proveedor")
 */
class ClienteProveedorController extends AbstractController
{
    /**
     * @Route("/", name="cliente_proveedor_index", methods={"GET"})
     */
    public function index(ClienteProveedorRepository $clienteProveedorRepository, Request $request, PaginatorInterface $paginator ): Response
    {
        $this->denyAccessUnlessGranted('view','cliente_proveedor');
        $user=$this->getUser();
        
        $empresa=$this->getDoctrine()->getRepository(Empresa::class)->find($user->getEmpresaActual());
        $pagina=$this->getDoctrine()->getRepository(ModuloPer::class)->findOneByName('cliente_proveedor',$user->getEmpresaActual());
        
        $modo=1;
        if($request->query->get('modo')=='trash'){
            $modo=0;
            
        }
        $query=$clienteProveedorRepository->findBy(['empresa'=>$empresa, 'estado'=>$modo]);

        $clienteProveedores=$paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            10 /*limit per page*/,
            array('defaultSortFieldName' => 'nombre', 'defaultSortDirection' => 'asc'));


        return $this->render('cliente_proveedor/index.html.twig', [
            'cliente_proveedors' => $clienteProveedores,
            'modo'=>$modo,
            'pagina'=>$pagina->getNombre(),
        ]);
    }

    /**
     * @Route("/new", name="cliente_proveedor_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $this->denyAccessUnlessGranted('create','cliente_proveedor');
        $user=$this->getUser();
        
        $empresa=$this->getDoctrine()->getRepository(Empresa::class)->find($user->getEmpresaActual());
        $pagina=$this->getDoctrine()->getRepository(ModuloPer::class)->findOneByName('cliente_proveedor',$user->getEmpresaActual());
        
        $clienteProveedor = new ClienteProveedor();
        $clienteProveedor->setEstado(1);
        $clienteProveedor->setEmpresa($empresa);
        $form = $this->createForm(ClienteProveedorType::class, $clienteProveedor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($clienteProveedor);
            $entityManager->flush();

            return $this->redirectToRoute('cliente_proveedor_index',['toast'=>'Entidad creada con exito','icon'=>'success']);
        }

        return $this->render('cliente_proveedor/new.html.twig', [
            'cliente_proveedor' => $clienteProveedor,
            'form' => $form->createView(),
            'pagina'=>'Crear '.$pagina->getNombre(),
        ]);
    }

    /**
     * @Route("/{id}", name="cliente_proveedor_show", methods={"GET"})
     */
    public function show(ClienteProveedor $clienteProveedor): Response
    {
        return $this->render('cliente_proveedor/show.html.twig', [
            'cliente_proveedor' => $clienteProveedor,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="cliente_proveedor_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ClienteProveedor $clienteProveedor): Response
    {
        $this->denyAccessUnlessGranted('edit','cliente_proveedor');
        $form = $this->createForm(ClienteProveedorType::class, $clienteProveedor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cliente_proveedor_index',['toast'=>'Entidad modificado con exito','icon'=>'warning']);
        }

        return $this->render('cliente_proveedor/edit.html.twig', [
            'cliente_proveedor' => $clienteProveedor,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="cliente_proveedor_delete", methods={"DELETE"})
     */
    public function delete(Request $request, ClienteProveedor $clienteProveedor): Response
    {
        $this->denyAccessUnlessGranted('delete','cliente_proveedor');
        if ($this->isCsrfTokenValid('delete'.$clienteProveedor->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $clienteProveedor->setEstado(0);
            $entityManager->persist($clienteProveedor);
            $entityManager->flush();
        }

        return $this->redirectToRoute('cliente_proveedor_index',['toast'=>'Entidad eliminada con exito','icon'=>'warning']);
    }
}
