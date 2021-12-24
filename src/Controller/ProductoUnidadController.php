<?php

namespace App\Controller;

use App\Entity\Empresa;
use App\Entity\ProductoUnidad;
use App\Form\ProductoUnidadType;
use App\Repository\ProductoUnidadRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/producto_unidad")
 */
class ProductoUnidadController extends AbstractController
{
    /**
     * @Route("/", name="producto_unidad_index", methods={"GET"})
     */
    public function index(ProductoUnidadRepository $productoUnidadRepository,Request $request, PaginatorInterface $paginator): Response
    {
        $user=$this->getUser();
        $empresa=$this->getDoctrine()->getRepository(Empresa::class)->find($user->getEmpresaActual());

        $query=$productoUnidadRepository->findBy(['empresa'=>$empresa, 'estado'=>true]);
        $productoUnidades=$paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            10 /*limit per page*/,
            array('defaultSortFieldName' => 'nombre', 'defaultSortDirection' => 'asc'));


        return $this->render('producto_unidad/index.html.twig', [
            'producto_unidades' => $productoUnidades,
            'pagina'=>"Unidades",
        ]);
    }

    /**
     * @Route("/new", name="producto_unidad_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        
        $user=$this->getUser();
        $empresa=$this->getDoctrine()->getRepository(Empresa::class)->find($user->getEmpresaActual());


        $productoUnidad = new ProductoUnidad();
        $productoUnidad->setEstado(true);
        $productoUnidad->setEmpresa($empresa);
        $form = $this->createForm(ProductoUnidadType::class, $productoUnidad);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($productoUnidad);
            $entityManager->flush();
            $toast="Toast.fire({
                icon: 'success',
                title: 'Registro grabado con exito'
            })";

            return $this->redirectToRoute('producto_unidad_index',['toast'=>$toast]);
        }

        return $this->render('producto_unidad/new.html.twig', [
            'producto_unidad' => $productoUnidad,
            'form' => $form->createView(),
            'pagina'=> "Unidad",
        ]);
    }

    /**
     * @Route("/{id}", name="producto_unidad_show", methods={"GET"})
     */
    public function show(ProductoUnidad $productoUnidad): Response
    {
        return $this->render('producto_unidad/show.html.twig', [
            'producto_unidad' => $productoUnidad,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="producto_unidad_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ProductoUnidad $productoUnidad): Response
    {
        $user=$this->getUser();
        $empresa=$this->getDoctrine()->getRepository(Empresa::class)->find($user->getEmpresaActual());


        $form = $this->createForm(ProductoUnidadType::class, $productoUnidad);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $toast="Toast.fire({
                icon: 'success',
                title: 'Registro modificado con exito'
            })";
            return $this->redirectToRoute('producto_unidad_index',['toast'=>$toast]);
        }

        return $this->render('producto_unidad/edit.html.twig', [
            'producto_unidad' => $productoUnidad,
            'form' => $form->createView(),
            'pagina'=>'Unidad',
        ]);
    }

    /**
     * @Route("/{id}", name="producto_unidad_delete", methods={"DELETE"})
     */
    public function delete(Request $request, ProductoUnidad $productoUnidad): Response
    {
        if ($this->isCsrfTokenValid('delete'.$productoUnidad->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $productoUnidad->setEstado(false);
            $entityManager->persist($productoUnidad);
            $entityManager->flush();
        }

        return $this->redirectToRoute('producto_unidad_index');
    }
}
