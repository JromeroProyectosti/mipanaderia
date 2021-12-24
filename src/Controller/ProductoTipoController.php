<?php

namespace App\Controller;

use App\Entity\Empresa;
use App\Entity\ProductoTipo;
use App\Form\ProductoTipoType;
use App\Repository\ProductoTipoRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/producto_tipo")
 */
class ProductoTipoController extends AbstractController
{
    /**
     * @Route("/", name="producto_tipo_index", methods={"GET"})
     */
    public function index(ProductoTipoRepository $productoTipoRepository,Request $request, PaginatorInterface $paginator): Response
    {
        $user=$this->getUser();
        $empresa=$this->getDoctrine()->getRepository(Empresa::class)->find($user->getEmpresaActual());

        $query=$productoTipoRepository->findBy(['empresa'=>$empresa, 'estado'=>true]);
        $productoTipos=$paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            10 /*limit per page*/,
            array('defaultSortFieldName' => 'nombre', 'defaultSortDirection' => 'asc'));


        return $this->render('producto_tipo/index.html.twig', [
            'producto_tipos' => $productoTipos,
        ]);
    }

    /**
     * @Route("/new", name="producto_tipo_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $user=$this->getUser();
        $empresa=$this->getDoctrine()->getRepository(Empresa::class)->find($user->getEmpresaActual());



        $productoTipo = new ProductoTipo();
        $productoTipo->setEstado(true);
        $productoTipo->setEmpresa($empresa);
        $form = $this->createForm(ProductoTipoType::class, $productoTipo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($productoTipo);
            $entityManager->flush();

            $toast="Toast.fire({
                icon: 'success',
                title: 'Registro grabado con exito'
            })";

            return $this->redirectToRoute('producto_tipo_index',['toast'=>$toast]);
        }

        return $this->render('producto_tipo/new.html.twig', [
            'producto_tipo' => $productoTipo,
            'form' => $form->createView(),
            'pagina'=>"Tipo de Producto"
        ]);
    }

    /**
     * @Route("/{id}", name="producto_tipo_show", methods={"GET"})
     */
    public function show(ProductoTipo $productoTipo): Response
    {
        return $this->render('producto_tipo/show.html.twig', [
            'producto_tipo' => $productoTipo,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="producto_tipo_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ProductoTipo $productoTipo): Response
    {
        $form = $this->createForm(ProductoTipoType::class, $productoTipo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $toast="Toast.fire({
                icon: 'success',
                title: 'Registro modificado con exito'
            })";
            return $this->redirectToRoute('producto_tipo_index',['toast'=>$toast]);
        }

        return $this->render('producto_tipo/edit.html.twig', [
            'producto_tipo' => $productoTipo,
            'form' => $form->createView(),
            'pagina'=>"Tipo de Producto"
        ]);
    }

    /**
     * @Route("/{id}", name="producto_tipo_delete", methods={"DELETE"})
     */
    public function delete(Request $request, ProductoTipo $productoTipo): Response
    {
        if ($this->isCsrfTokenValid('delete'.$productoTipo->getId(), $request->request->get('_token'))) {
            
            $entityManager = $this->getDoctrine()->getManager();
            $productoTipo->setEstado(false);
            $entityManager->persist($productoTipo);
            $entityManager->flush();
        }

        $toast="Toast.fire({
            icon: 'success',
            title: 'Registro eliminado con exito'
        })";
        return $this->redirectToRoute('producto_tipo_index',['toast'=>$toast]);
    }
}
