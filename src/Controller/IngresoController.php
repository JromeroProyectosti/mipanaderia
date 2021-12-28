<?php

namespace App\Controller;

use App\Entity\Empresa;
use App\Entity\Movimiento;
use App\Entity\MovimientoProducto;
use App\Entity\MovimientoTipo;
use App\Entity\Producto;
use App\Entity\Usuario;
use App\Entity\UsuarioTipo;
use App\Form\MovimientoProductoType;
use App\Repository\MovimientoRepository;
use App\Form\MovimientoType;
use App\Repository\CuentaRepository;
use App\Repository\FolioRepository;
use Doctrine\ORM\EntityRepository;
use Exception;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

 /**
 * @Route("/ingreso")
 */
class IngresoController extends AbstractController
{
    /**
     * @Route("/", name="ingreso_index")
     */
    public function index(Request $request, 
                        MovimientoRepository $movimientoRepository, 
                        PaginatorInterface $paginator, 
                        CuentaRepository $cuentaRepository): Response
    {
        $user=$this->getUser();
        
        $empresa=$this->getDoctrine()->getRepository(Empresa::class)->find($user->getEmpresaActual());
        $movimientoTipo=$this->getDoctrine()->getRepository(MovimientoTipo::class)->findBy(['empresa'=>$empresa->getId(),'nombre'=>'Ingreso','estado'=>true]);
        
        $cuenta=null;
        $folio=null;
        $fecha=null;
        $filtro=null;

        if(null !== $request->query->get('bFolio') && $request->query->get('bFolio')!=''){
            $folio=$request->query->get('bFolio');
            $otros=" c.folio= $folio";

            $dateInicio=date('Y-m-d',mktime(0,0,0,date('m'),date('d'),date('Y'))-60*60*24*30);
            $dateFin=date('Y-m-d');
            

        }else{
            if(null !== $request->query->get('bProveedor') && $request->query->get('bProveedor')!=''){
                $filtro=$request->query->get('bProveedor');
            }
            if(null !== $request->query->get('bCuenta') && $request->query->get('bCuenta')!=0){
                $cuenta=$request->query->get('bCuenta');
            }
            if(null !== $request->query->get('bFecha')){
                $aux_fecha=explode(" - ",$request->query->get('bFecha'));
                $dateInicio=$aux_fecha[0];
                $dateFin=$aux_fecha[1];
            }else{
                $dateInicio=date('Y-m-d',mktime(0,0,0,date('m'),date('d'),date('Y'))-60*60*24*30);
                $dateFin=date('Y-m-d');
            }
            $fecha="m.fechaIngreso between '$dateInicio' and '$dateFin 23:59:59'" ;
        }


        $modo=true;
        if($request->query->get('modo')=='trash'){
            $modo=0;
            


        }

        $query=$movimientoRepository->findByPers($empresa->getId(),null,$folio,$cuenta,$fecha,$filtro,$movimientoTipo[0]->getid(),$modo);
        $cuentas=$cuentaRepository->findByPers($user->getId(),$user->getEmpresaActual());

        $movimientos=$paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            10 /*limit per page*/,
            array('defaultSortFieldName' => 'folio', 'defaultSortDirection' => 'asc'));



        return $this->render('ingreso/index.html.twig', [
            'pagina' => 'Ingreso',
            'movimientos'=>$movimientos,
            'modo'=>$modo,
            'cuentas'=>$cuentas,
            'bCuenta'=>$cuenta,
            'bFolio'=>$folio,
            'dateInicio'=>$dateInicio,
            'dateFin'=>$dateFin,
        ]);
    }

    /**
     * @Route("/new", name="ingreso_new", methods={"GET","POST"})
     */
    public function new(Request $request,FolioRepository $folioRepository): Response
    {

        $user=$this->getUser();
        
        $this->empresa=$this->getDoctrine()->getRepository(Empresa::class)->find($user->getEmpresaActual());
        $movimientoTipo=$this->getDoctrine()->getRepository(MovimientoTipo::class)->findBy(['empresa'=>$this->empresa->getId(),'nombre'=>'Ingreso','estado'=>true]);
        //$movimientoTipo=$this->getDoctrine()->getRepository(MovimientoTipo::class)->find(3);
        $movimiento = new Movimiento();
        $movimiento->setFolio(0);
        $movimiento->setEstado(true);
        $movimiento->setEmpresa($this->empresa);
        $movimiento->setFechaIngreso(new  \DateTime(date('Y-m-d h:i:s')));
        $movimiento->setUsuarioIngreso($this->getDoctrine()->getRepository(Usuario::class)->find($user->getId()));
        //$movimiento->setMovimientoTipo($movimientoTipo->getId());
        $movimiento->setMovimientoTipo($movimientoTipo[0]);
        $form = $this->createForm(movimientoType::class, $movimiento);
        $form->add('fechaEmision',DateType::class,array('widget'=>'single_text','html5'=>false));
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
        
           
            $entityManager->persist($movimiento);
            $entityManager->flush();

            $toast="Registro creado con exito";
            return $this->redirectToRoute('ingreso_detail',['toast'=>$toast,'icon'=>'success','id'=>$movimiento->getId()]);
        }

        return $this->render('ingreso/new.html.twig', [
            'movimiento' => $movimiento,
            'form' => $form->createView(),
            'pagina'=>"Ingreso",
        ]);


    }


    /**
     * @Route("/{id}", name="ingreso_show", methods={"GET"})
     */
    public function show(Movimiento $movimiento): Response
    {
        return $this->render('ingreso/show.html.twig', [
            'movimiento' => $movimiento,
        ]);
    }

    /**
     * @Route("/{id}/detail", name="ingreso_detail", methods={"GET","POST"})
     */
    public function detail(Request $request, Movimiento $movimiento): Response
    {
        $user=$this->getUser();
        
        $this->empresa=$this->getDoctrine()->getRepository(Empresa::class)->find($user->getEmpresaActual());

        $movimientoProducto = new MovimientoProducto();
        $movimientoProducto->setEstado(true);
        $movimientoProducto->setEmpresa($this->empresa);
        $movimientoProducto->setCuenta($movimiento->getCuenta());
        $movimientoProducto->setCantidad(0);
        $movimientoProducto->setValor(0);
        $movimientoProducto->setTotal(0);
        $movimientoProducto->setMovimiento($movimiento);
        $movimientoProducto->setFechaIngreso($movimiento->getFechaEmision());
        $movimientoProducto->setMovimientoTipo($movimiento->getMovimientoTipo());
        $form = $this->createForm(MovimientoProductoType::class, $movimientoProducto);
        $form->add('producto', EntityType::class, [
            
            'class' => Producto::class,
            'empty_data'=>[],
            'query_builder' => function (EntityRepository $er) {
                
                return $er->createQueryBuilder('p')
                    ->where('p.empresa = '.$this->empresa->getId())
                    ->where("p.estado = true")
                    ->orderBy('p.nombre', 'ASC');
            },
            'choice_label' => 'nombre',
            
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();

            $movimientoProducto->setTotal($movimientoProducto->getCantidad()*$movimientoProducto->getValor());
            $entityManager->persist($movimientoProducto);
            $entityManager->flush();

            $toast="producto agregado con exito";
            return $this->redirectToRoute('ingreso_detail',['toast'=>$toast,'icon'=>'success', 'id'=>$movimiento->getId()]);
        }

        return $this->render('ingreso/detail.html.twig', [
            'movimiento' => $movimiento,
            'movimiento_producto'=>$movimientoProducto,
            'form' => $form->createView(),
        ]);

    }

    
    
    /**
     * @Route("/{id}/edit", name="ingreso_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Movimiento $movimiento): Response
    {
        $user=$this->getUser();
        
        $this->empresa=$this->getDoctrine()->getRepository(Empresa::class)->find($user->getEmpresaActual());

        $form = $this->createForm(MovimientoType::class, $movimiento);
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $toast="Registro modificado con exito";
            return $this->redirectToRoute('ingreso_edit',['id'=>$movimiento->getId(),'toast'=>$toast,'icon'=>'warning']);
        }

        return $this->render('ingrdeso/edit.html.twig', [
            'movimiento' => $movimiento,
            'form' => $form->createView(),
        ]);

    }

    /**
     * @Route("/{id}/panel", name="ingreso_panel", methods={"GET","POST"})
     */
    public function panel(Request $request, Movimiento $movimiento): Response
    {
        $user=$this->getUser();
        $producto=null;
        if($request->query->get('producto')){
            $producto= $this->getDoctrine()->getRepository(Producto::class)->find($request->query->get('producto'));
            
        }else{
            throw new Exception("Falta ingresar Producto id  modo Get");
        }
        $this->empresa=$this->getDoctrine()->getRepository(Empresa::class)->find($user->getEmpresaActual());

        $movimientoProducto = new MovimientoProducto();
        $movimientoProducto->setEstado(true);
        $movimientoProducto->setEmpresa($this->empresa);
        $movimientoProducto->setCuenta($movimiento->getCuenta());
        $movimientoProducto->setCantidad(0);
        $movimientoProducto->setValor(0);
        $movimientoProducto->setTotal(0);
        $movimientoProducto->setMovimiento($movimiento);
        $movimientoProducto->setFechaIngreso(new \DateTime(date('Y-m-d h:i:s')));
        $movimientoProducto->setMovimientoTipo($movimiento->getMovimientoTipo());
        $movimientoProducto->setProducto($producto);
        $form = $this->createForm(MovimientoProductoType::class, $movimientoProducto);
        $form->add('producto', EntityType::class, [
            
            'class' => Producto::class,
 
            'query_builder' => function (EntityRepository $er) {
                
                return $er->createQueryBuilder('p')
                    ->where('p.empresa = '.$this->empresa->getId())
                    ->where("p.estado = true")
                    ->orderBy('p.nombre', 'ASC');
            },
            'choice_label' => 'nombre',
            
        ]);
        $form->handleRequest($request);

        return $this->render('ingreso/panel.html.twig', [
            'movimiento_producto'=>$movimientoProducto,
            'form' => $form->createView(),
        ]);

    }
    /**
     * @Route("/{id}/delete_producto", name="ingreso_deleteproducto", methods={"DELETE"})
     */
    public function deleteProducto(Request $request, MovimientoProducto $movimientoProducto): Response
    {
        if ($this->isCsrfTokenValid('delete'.$movimientoProducto->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $movimientoProducto->setEstado(0);
            $entityManager->persist($movimientoProducto);
            $entityManager->flush();
        }

        return $this->redirectToRoute('ingreso_detail',['toast'=>'Movimiento eliminado correctamente','icon'=>'warning','id'=>$movimientoProducto->getMovimiento()->getId()]);
    }

    /**
     * @Route("/{id}/end", name="ingreso_end", methods={"GET","POST"})
     */
    public function end(Request $request, Movimiento $movimiento, FolioRepository $folioRepository): Response
    {
        $user=$this->getUser();
        $entityManager = $this->getDoctrine()->getManager();
        $ultFolio = $folioRepository->findLast($user->getEmpresaActual());
        $ultFolio->setIngreso($ultFolio->getIngreso()+1);
        $entityManager->persist($ultFolio);
        $entityManager->flush();

        $movimiento->setFolio($ultFolio->getIngreso());
        $total=0;
        foreach($movimiento->getMovimientoProductos() as $movimientoProducto){
            if($movimientoProducto->getEstado()){
                $total+=$movimientoProducto->getTotal();
            }
        }

        
        $movimiento->setValorTotal($total);
        $entityManager->persist($movimiento);
        $entityManager->flush();

        if($request->query->get('next')){
            return $this->redirectToRoute('ingreso_new',['toast'=>'Ingreso realizado correctamente','icon'=>'success']);
        }else{
            return $this->redirectToRoute('ingreso_index',['toast'=>'Ingreso realizado correctamente','icon'=>'success']);
        }
    }
    /**
     * @Route("/{id}", name="ingreso_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Movimiento $movimiento): Response
    {
        if ($this->isCsrfTokenValid('delete'.$movimiento->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $movimiento->setEstado(0);
            $entityManager->persist($movimiento);
            $entityManager->flush();
        }

        return $this->redirectToRoute('ingreso_index',['toast'=>'Movimiento eliminado correctamente','icon'=>'warning']);
    }

    
}
