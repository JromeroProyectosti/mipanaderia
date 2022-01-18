<?php

namespace App\Controller;

use App\Entity\Cliente;
use App\Entity\Empresa;
use App\Entity\Pedido;
use App\Entity\PedidoDetalle;
use App\Entity\PedidoEstado;
use App\Entity\Producto;
use App\Form\PedidoDetalleType;
use App\Form\PedidoType;
use App\Repository\FolioRepository;
use App\Repository\ModuloPerRepository;
use App\Repository\PedidoEstadoRepository;
use App\Repository\PedidoRepository;
use Doctrine\ORM\EntityRepository;
use Exception;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/pedido")
 */
class PedidoController extends AbstractController
{
    /**
     * @Route("/", name="pedido_index", methods={"GET"})
     */
    public function index(Request $request, 
                        PedidoRepository $pedidoRepository, 
                        PaginatorInterface $paginator, 
                        ModuloPerRepository $moduloPerRepository,
                        PedidoEstadoRepository $pedidoEstadoRepository): Response
    {

        $this->denyAccessUnlessGranted('view','pedido');
        
        $user=$this->getUser();
        $pagina=$moduloPerRepository->findOneByName('pedido',$user->getEmpresaActual());
        $filtro='';
        $fecha=null;
        if(null !== $request->query->get('bPedido') && $request->query->get('bPedido')!=''){
            $filtro=$request->query->get('bPedido');
        }
        
        if(null !== $request->query->get('bFecha')){
            $aux_fecha=explode(" - ",$request->query->get('bFecha'));
            $dateInicio=$aux_fecha[0];
            $dateFin=$aux_fecha[1];
        }else{
            $dateInicio=date('Y-m-d',mktime(0,0,0,date('m'),date('d'),date('Y'))-60*60*24*30);
            $dateFin=date('Y-m-d');
        }
        $fecha="r.fechaIngreso between '$dateInicio' and '$dateFin 23:59:59'" ;
    

        $pedidoEstado=$pedidoEstadoRepository->findBy(['empresa'=>$user->getEmpresaActual()]);
        ;
        $modo=1;
        if($request->query->get('modo')=='trash'){
            $pedidoEstado=$pedidoEstadoRepository->findBy(['empresa'=>$user->getEmpresaActual(),'nombre'=>'cancel']);
            $modo=0;
        }

        $query=$pedidoRepository->findBy(['empresa'=>$user->getEmpresaActual(),'estado'=>$pedidoEstado]);
        $pedidos=$paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            10 /*limit per page*/,
            array('defaultSortFieldName' => 'folio', 'defaultSortDirection' => 'asc'));



        return $this->render('pedido/index.html.twig', [
            'pagina'=>$pagina->getNombre(),
            'pedidos' => $pedidos,
            'modo'=>$modo,
            'bPedido'=>$filtro,
            'dateInicio'=>$dateInicio,
            'dateFin'=>$dateFin,
        ]);
    }

    /**
     * @Route("/new", name="pedido_new", methods={"GET","POST"})
     */
    public function new(Request $request, ModuloPerRepository $moduloPerRepository,PedidoEstadoRepository $pedidoEstadoRepository): Response
    {
        $this->denyAccessUnlessGranted('create','pedido');
        
        $user=$this->getUser();
        $pagina=$moduloPerRepository->findOneByName('pedido',$user->getEmpresaActual());
        $this->empresa=$this->getDoctrine()->getRepository(Empresa::class)->find($user->getEmpresaActual());
        $pedido = new Pedido();
        $pedido->setFolio(0);
        $pedido->setEstado($pedidoEstadoRepository->findOneBy(['nombre'=>'expect']));
        $pedido->setEmpresa($this->empresa);
        $pedido->setFechaCreacion(new \DateTime(date('Y-m-d H:i')));
        $form = $this->createForm(PedidoType::class, $pedido);
        $form->add('cliente', EntityType::class, [
            
            'class' => Cliente::class,
            'empty_data'=>[],
            'query_builder' => function (EntityRepository $er) {
                
                return $er->createQueryBuilder('c')
                    ->where('c.empresa = '.$this->empresa->getId())
                    ->where("c.estado = true")
                    ->orderBy('c.nombre', 'ASC');
            },
            'choice_label' => 'nombre',
            
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($pedido);
            $entityManager->flush();

            return $this->redirectToRoute('pedido_detail',['id'=>$pedido->getId(),'toast'=>'Item creado con exito','icon'=>'success']);
            
        }

        return $this->render('pedido/new.html.twig', [
            'pedido' => $pedido,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="pedido_show", methods={"GET"})
     */
    public function show(Pedido $pedido): Response
    {
        return $this->render('pedido/show.html.twig', [
            'pedido' => $pedido,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="pedido_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Pedido $pedido): Response
    {
        $form = $this->createForm(PedidoType::class, $pedido);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('pedido_index');
        }

        return $this->render('pedido/edit.html.twig', [
            'pedido' => $pedido,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/detail", name="pedido_detail", methods={"GET","POST"})
     */
    public function detail(Request $request, 
                            Pedido $pedido,
                            ModuloPerRepository $moduloPerRepository): Response
    {
        $this->denyAccessUnlessGranted('create','pedido');
        
        $user=$this->getUser();
        $pagina=$moduloPerRepository->findOneByName('pedido',$user->getEmpresaActual());
        $this->empresa=$this->getDoctrine()->getRepository(Empresa::class)->find($user->getEmpresaActual());
        

        $pedidoDetalle=new PedidoDetalle();
        $pedidoDetalle->setPedido($pedido);

        $form=$this->createForm(PedidoDetalleType::class,$pedidoDetalle);
        $form->add('producto', EntityType::class, [
            
            'class' => Producto::class,
            'empty_data'=>[],
            'query_builder' => function (EntityRepository $er) {
                
                return $er->createQueryBuilder('p')
                ->andWhere('p.empresa = '.$this->empresa->getId())
                ->andWhere("p.estado = true")
                ->andWhere("p.productoTipo = 2")
                ->orderBy('p.nombre', 'ASC');
            },
            'choice_label' => 'nombre',
            
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();

            $entityManager->persist($pedidoDetalle);
            $entityManager->flush();
           
            return $this->redirectToRoute('pedido_detail',['id'=>$pedido->getId(),'toast'=>'Item creado con exito','icon'=>'success']);
        }

        return $this->render('pedido/detail.html.twig',[
            'pagina'=>$pagina->getNombre(),
            'pedido_detalle'=>$pedidoDetalle,
            'pedido'=>$pedido,
            'form'=>$form->createView(),
            

        ]);
    }
    /**
     * @Route("/{id}/panel", name="pedido_panel", methods={"GET","POST"})
     */
    public function panel(Request $request, Pedido $pedido): Response
    {
        $user=$this->getUser();
        $producto=null;
        if($request->query->get('producto')){
            $producto= $this->getDoctrine()->getRepository(Producto::class)->find($request->query->get('producto'));
            
        }else{
            throw new Exception("Falta ingresar Producto id  modo Get");
        }
        $this->empresa=$this->getDoctrine()->getRepository(Empresa::class)->find($user->getEmpresaActual());


        $pedidoDetalle=new PedidoDetalle();
        $pedidoDetalle->setProducto($producto);
        $form = $this->createForm(PedidoDetalleType::class, $pedidoDetalle);
        $form->add('producto', EntityType::class, [
            
            'class' => Producto::class,
 
            'query_builder' => function (EntityRepository $er) {
                
                return $er->createQueryBuilder('p')
                    ->andWhere('p.empresa = '.$this->empresa->getId())
                    ->andWhere("p.estado = true")
                    ->andWhere("p.productoTipo = 2")
                    ->orderBy('p.nombre', 'ASC');
            },
            'choice_label' => 'nombre',
            
        ]);
        $form->handleRequest($request);

        return $this->render('pedido/panel.html.twig', [
            'pedido_detalle'=>$pedidoDetalle,
            'form' => $form->createView(),
        ]);

    }
    /**
     * @Route("/{id}/delete_detalle", name="pedido_deletedetalle", methods={"DELETE"})
     */
    public function deleteProducto(Request $request, PedidoDetalle $pedidoDetalle): Response
    {
        if ($this->isCsrfTokenValid('delete'.$pedidoDetalle->getId(), $request->request->get('_token'))) {
            try{
                $entityManager = $this->getDoctrine()->getManager();
            
            $entityManager->remove($pedidoDetalle);
            $entityManager->flush();
            }catch(Exception $e){
                return $this->redirectToRoute('pedido_detail',['toast'=>$e->getMessage(),'icon'=>'warning','id'=>$pedidoDetalle->getPedido()->getId()]);
            }
            
        }

        return $this->redirectToRoute('pedido_detail',['toast'=>'Item eliminado correctamente','icon'=>'warning','id'=>$pedidoDetalle->getPedido()->getId()]);
    }
    /**
     * @Route("/{id}/end", name="pedido_end", methods={"GET","POST"})
     */
    public function end(Request $request, Pedido $pedido, FolioRepository $folioRepository): Response
    {
        $user=$this->getUser();
    
        $entityManager = $this->getDoctrine()->getManager();
        $ultFolio = $folioRepository->findLast($user->getEmpresaActual());
        $ultFolio->setPedido($ultFolio->getPedido()+1);
        $entityManager->persist($ultFolio);
        $entityManager->flush();

        $pedido->setFolio($ultFolio->getPedido());


        //$receta->setTotal($total);
        $entityManager->persist($pedido);
        $entityManager->flush();

        if($request->query->get('next')){
            return $this->redirectToRoute('receta_new',['toast'=>'Pedido N° '.$ultFolio->getPedido().' Creado ','icon'=>'success']);
        }else{
            return $this->redirectToRoute('receta_index',['toast'=>'Pedido N° '.$ultFolio->getPedido().' Creado ','icon'=>'success']);
        }
    }
    /**
     * @Route("/{id}", name="pedido_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Pedido $pedido): Response
    {
        if ($this->isCsrfTokenValid('delete'.$pedido->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($pedido);
            $entityManager->flush();
        }

        return $this->redirectToRoute('pedido_index');
    }
}
