<?php

namespace App\Controller;

use App\Entity\Empresa;
use App\Entity\Producto;
use App\Entity\ProductoTipo;
use App\Entity\ProductoUnidad;
use App\Form\ProductoType;
use App\Repository\ProductoRepository;
use App\Repository\CuentaRepository;
use App\Repository\ModuloPerRepository;
use App\Repository\ProductoTipoRepository;
use Doctrine\ORM\EntityRepository;
use Exception;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/materia_prima")
 */
class MateriaPrimaController extends AbstractController
{
    /**
     * @Route("/", name="materia_prima_index", methods={"GET"})
     */
    public function index(ProductoRepository $productoRepository, PaginatorInterface $paginator,Request $request, CuentaRepository $cuentaRepository,ModuloPerRepository $moduloPerRepository): Response
    {

        $this->denyAccessUnlessGranted('view','materia_prima');
        
        $user=$this->getUser();
        $pagina=$moduloPerRepository->findOneByName('materia_prima',$user->getEmpresaActual());
        $empresa=$this->getDoctrine()->getRepository(Empresa::class)->find($user->getEmpresaActual());

        $modo=1;
        if($request->query->get('modo')=='trash'){
            $modo=0;
            
        }
        $query=$productoRepository->findBy(['empresa'=>$empresa, 'estado'=>$modo,'productoTipo'=>1]);
        $companias=$cuentaRepository->findByPers($user->getId(),$user->getEmpresaActual());

        $productos=$paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            10 /*limit per page*/,
            array('defaultSortFieldName' => 'nombre', 'defaultSortDirection' => 'asc'));


        return $this->render('materia_prima/index.html.twig', [
            'productos' => $productos,
            
            'modo'=>$modo,
            'pagina'=>$pagina->getNombre(),
        ]);
    }

    /**
     * @Route("/new", name="materia_prima_new", methods={"GET","POST"})
     */
    public function new(Request $request, 
                        ModuloPerRepository $moduloPerRepository,
                        ProductoRepository $productoRepository,
                        ProductoTipoRepository $productoTipoRepository): Response
    {
        $this->denyAccessUnlessGranted('create','materia_prima');
        
        $user=$this->getUser();
        $pagina=$moduloPerRepository->findOneByName('materia_prima',$user->getEmpresaActual());
        
        $this->empresa=$this->getDoctrine()->getRepository(Empresa::class)->find($user->getEmpresaActual());

        $producto = new Producto();
        $producto->setEstado(true);
        $producto->setEmpresa($this->empresa);
        $producto->setProductoTipo($productoTipoRepository->find(2));
        $form = $this->createForm(ProductoType::class, $producto);
        $form->add('codigo',TextType::class);
        
        $form->add('productoUnidad', EntityType::class, [
            
            'class' => ProductoUnidad::class,
            'query_builder' => function (EntityRepository $er) {
                return $er->createQueryBuilder('p')
                    ->where('p.empresa = '.$this->empresa->getId())
                    ->where("p.estado = true")
                    ->orderBy('p.orden', 'ASC');
            },
            'choice_label' => 'nombre',
            
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
 
            if($productoRepository->existeCodigo($this->empresa->getId(),1,$producto->getCodigo())){
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($producto);
                $entityManager->flush();

                $toast="Registro creado con exito";
                return $this->redirectToRoute('materia_prima_new',['toast'=>$toast,'icon'=>'success']);
            }else{
                return $this->redirectToRoute('materia_prima_new',['toast'=>'El codigo ya existe','icon'=>'error']);
            }
        }

        return $this->render('materia_prima/new.html.twig', [
            'producto' => $producto,
            'form' => $form->createView(),
            'pagina'=>$pagina->getNombre(),
        ]);
    }

    /**
     * @Route("/codigo", name="materia_prima_codigo", methods={"GET","POST"})
     */
    public function codigo(Request $request): Response
    {
             $user=$this->getUser();
 
        
        $this->empresa=$this->getDoctrine()->getRepository(Empresa::class)->find($user->getEmpresaActual());
        
        if($request->query->get('codigo')){
            $producto=$this->getDoctrine()->getRepository(Producto::class)->findOneBy(['empresa'=>$this->empresa,'codigo'=>$request->query->get('codigo'),'productoTipo'=>1]);
            if(null == $producto){
                return $this->json(['status'=>false]);

            }else{
                $data=array(
                        'nombre'=>$producto->getNombre(),
                        'id'=>$producto->getId(),
                );
            }
        }else{
            throw new Exception("debe enviar por get un codigo");
        }

        return $this->json(['status'=>true,'producto'=>$data]);
    }

    /**
     * @Route("/{id}", name="producto_show", methods={"GET"})
     */
    public function show(Producto $producto): Response
    {
        return $this->render('materia_prima/show.html.twig', [
            'producto' => $producto,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="materia_prima_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Producto $producto,ModuloPerRepository $moduloPerRepository): Response
    {
        $this->denyAccessUnlessGranted('edit','materia_prima');
        
        $user=$this->getUser();
        $pagina=$moduloPerRepository->findOneByName('materia_prima',$user->getEmpresaActual());
        
        $this->empresa=$this->getDoctrine()->getRepository(Empresa::class)->find($user->getEmpresaActual());

        $form = $this->createForm(ProductoType::class, $producto);
        $form->add('codigo',TextType::class,[
            'attr'=> array(
                'readonly'=>'true'
                )
                
            ]
            );
        $form->add('productoUnidad', EntityType::class, [
            
            'class' => ProductoUnidad::class,
            'query_builder' => function (EntityRepository $er) {
                return $er->createQueryBuilder('p')
                    ->where('p.empresa = '.$this->empresa->getId())
                    ->where("p.estado = true")
                    ->orderBy('p.orden', 'ASC');
            },
            'choice_label' => 'nombre',
            
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $toast="Registro modificado con exito";
            return $this->redirectToRoute('producto_edit',['id'=>$producto->getId(),'toast'=>$toast,'icon'=>'warning']);
        }

        return $this->render('producto/edit.html.twig', [
            'producto' => $producto,
            'form' => $form->createView(),
            'pagina'=>$pagina->getNombre(),
        ]);
    }

    /**
     * @Route("/{id}", name="producto_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Producto $producto): Response
    {
        if ($this->isCsrfTokenValid('delete'.$producto->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $producto->setEstado(0);
            $entityManager->persist($producto);
            $entityManager->flush();
        }

        return $this->redirectToRoute('materia_prima_index',['toast'=>'Producto eliminado correctamente','icon'=>'warning']);
    }
}
