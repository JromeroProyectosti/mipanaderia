<?php

namespace App\Controller;

use App\Entity\Empresa;
use App\Entity\Producto;
use App\Entity\ProductoUnidad;
use App\Entity\Receta;
use App\Entity\RecetaDetalle;
use App\Form\RecetaDetalleType;
use App\Form\RecetaType;
use App\Repository\ModuloPerRepository;
use App\Repository\RecetaRepository;
use Doctrine\ORM\EntityRepository;
use Exception;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/receta")
 */
class RecetaController extends AbstractController
{
    /**
     * @Route("/", name="receta_index", methods={"GET"})
     */
    public function index(Request $request, RecetaRepository $recetaRepository, PaginatorInterface $paginator, ModuloPerRepository $moduloPerRepository ): Response
    {

        $this->denyAccessUnlessGranted('view','receta');
        
        $user=$this->getUser();
        $pagina=$moduloPerRepository->findOneByName('receta',$user->getEmpresaActual());

        $empresa=$this->getDoctrine()->getRepository(Empresa::class)->find($user->getEmpresaActual());
            
        $fecha=null;
        $filtro=null;

       
        if(null !== $request->query->get('bReceta') && $request->query->get('bReceta')!=''){
            $filtro=$request->query->get('bReceta');
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
    


        $modo=true;
        if($request->query->get('modo')=='trash'){
            $modo=0;

        }

        $query=$recetaRepository->findByPers($empresa->getId(),null,$fecha,$filtro,$modo);
        $recetas=$paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            10 /*limit per page*/,
            array('defaultSortFieldName' => 'nombre', 'defaultSortDirection' => 'asc'));



        return $this->render('receta/index.html.twig', [
            'recetas' => $recetas,
            'modo'=>$modo,
            'bReceta'=>$filtro,
            'dateInicio'=>$dateInicio,
            'dateFin'=>$dateFin,
            'pagina'=>$pagina->getNombre(),
        ]);
    }

    /**
     * @Route("/new", name="receta_new", methods={"GET","POST"})
     */
    public function new(Request $request, ModuloPerRepository $moduloPerRepository): Response
    {
        $this->denyAccessUnlessGranted('create','receta');
        
        $user=$this->getUser();
        $pagina=$moduloPerRepository->findOneByName('receta',$user->getEmpresaActual());


        $empresa=$this->getDoctrine()->getRepository(Empresa::class)->find($user->getEmpresaActual());
        $recetum = new Receta();
        $recetum->setUsuarioIngreso($user);
        $recetum->setEmpresa($empresa);
        $recetum->setEstado(true);
        $recetum->setFechaIngreso(new \DateTime(date("Y-m-d h:i:s")));
        $recetum->setTotal(0);
        $form = $this->createForm(RecetaType::class, $recetum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($recetum);
            $entityManager->flush();

            return $this->redirectToRoute('receta_detail',['id'=>$recetum->getId(),'toast'=>'Receta Creada, ahora debe ingresar items','icon'=>'success']);
        }

        return $this->render('receta/new.html.twig', [
            'recetum' => $recetum,
            'form' => $form->createView(),
            'pagina'=>$pagina->getNombre(),
        ]);
    }

    /**
     * @Route("/{id}", name="receta_show", methods={"GET"})
     */
    public function show(Receta $recetum): Response
    {
        return $this->render('receta/show.html.twig', [
            'recetum' => $recetum,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="receta_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Receta $recetum): Response
    {
        $form = $this->createForm(RecetaType::class, $recetum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('receta_index');
        }

        return $this->render('receta/edit.html.twig', [
            'recetum' => $recetum,
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/{id}/detail", name="receta_detail", methods={"GET","POST"})
     */
    public function detail(Request $request, Receta $recetum, ModuloPerRepository $moduloPerRepository): Response
    {
        $this->denyAccessUnlessGranted('create','receta');
        
        $user=$this->getUser();
        $pagina=$moduloPerRepository->findOneByName('receta',$user->getEmpresaActual());

        $this->empresa=$this->getDoctrine()->getRepository(Empresa::class)->find($user->getEmpresaActual());

        $recetaDetalle=new RecetaDetalle();
        $recetaDetalle->setReceta($recetum);
        $recetaDetalle->setUnidad($this->getDoctrine()->getRepository(ProductoUnidad::class)->find(2));
        $form = $this->createForm(RecetaDetalleType::class, $recetaDetalle);
        $form->add('producto', EntityType::class, [
            
            'class' => Producto::class,
            'empty_data'=>[],
            'query_builder' => function (EntityRepository $er) {
                
                return $er->createQueryBuilder('p')
                    ->where('p.empresa = '.$this->empresa->getId())
                    ->where("p.productoTipo = 1")
                    ->where("p.estado = true")
                    ->orderBy('p.nombre', 'ASC');
            },
            'choice_label' => 'nombre',
            
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();

            $entityManager->persist($recetaDetalle);
            $entityManager->flush();
           
            return $this->redirectToRoute('receta_detail',['id'=>$recetum->getId(),'toast'=>'Item creado con exito','icon'=>'success']);
        }

        return $this->render('receta/detail.html.twig', [
            'recetum' => $recetum,
            'receta_detalle'=>$recetaDetalle,
            'form' => $form->createView(),
            'pagina'=> $pagina->getNombre(),
        ]);
    }
    /**
     * @Route("/{id}/delete_detalle", name="ingreso_deletedetalle", methods={"DELETE"})
     */
    public function deleteProducto(Request $request, RecetaDetalle $recetaDetalle): Response
    {
        if ($this->isCsrfTokenValid('delete'.$recetaDetalle->getId(), $request->request->get('_token'))) {
            try{
                $entityManager = $this->getDoctrine()->getManager();
            
            $entityManager->remove($recetaDetalle);
            $entityManager->flush();
            }catch(Exception $e){
                return $this->redirectToRoute('receta_detail',['toast'=>$e->getMessage(),'icon'=>'warning','id'=>$recetaDetalle->getReceta()->getId()]);
            }
            
        }

        return $this->redirectToRoute('receta_detail',['toast'=>'Item eliminado correctamente','icon'=>'warning','id'=>$recetaDetalle->getReceta()->getId()]);
    }

    /**
     * @Route("/{id}/panel", name="receta_panel", methods={"GET","POST"})
     */
    public function panel(Request $request, Receta $receta): Response
    {
        $user=$this->getUser();
        $producto=null;
        if($request->query->get('producto')){
            $producto= $this->getDoctrine()->getRepository(Producto::class)->find($request->query->get('producto'));
            
        }else{
            throw new Exception("Falta ingresar Producto id  modo Get");
        }
        $this->empresa=$this->getDoctrine()->getRepository(Empresa::class)->find($user->getEmpresaActual());


        $recetaDetalle=new RecetaDetalle();
        $recetaDetalle->setProducto($producto);
        $recetaDetalle->setUnidad($this->getDoctrine()->getRepository(ProductoUnidad::class)->find(2));
        $form = $this->createForm(RecetaDetalleType::class, $recetaDetalle);
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

        return $this->render('receta/panel.html.twig', [
            'receta_detalle'=>$recetaDetalle,
            'form' => $form->createView(),
        ]);

    }

    /**
     * @Route("/{id}/end", name="receta_end", methods={"GET","POST"})
     */
    public function end(Request $request, Receta $receta): Response
    {
        $user=$this->getUser();
        $entityManager = $this->getDoctrine()->getManager();

        $recetaDetalles=$receta->getRecetaDetalles();
        $total=0;
        foreach($recetaDetalles as $recetaDetalle){
            $total+= $recetaDetalle->getCantUnidad();
        }
        $receta->setTotal($total);
        $entityManager->persist($receta);
        $entityManager->flush();

        if($request->query->get('next')){
            return $this->redirectToRoute('receta_new',['toast'=>'Receta creada correctamente','icon'=>'success']);
        }else{
            return $this->redirectToRoute('receta_index',['toast'=>'Receta creada correctamente','icon'=>'success']);
        }
    }
    /**
     * @Route("/{id}", name="receta_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Receta $recetum): Response
    {
        if ($this->isCsrfTokenValid('delete'.$recetum->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($recetum);
            $entityManager->flush();
        }

        return $this->redirectToRoute('receta_index');
    }
}
