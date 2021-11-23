<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* base.html.twig */
class __TwigTemplate_ff2db2075b123abbd598ee47174de0656d94ed6f87745ea8adfb78fe0fd9cf7f extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'body' => [$this, 'block_body'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->

<html lang=\"en\">
<head>
  <meta charset=\"utf-8\">
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
  <meta http-equiv=\"x-ua-compatible\" content=\"ie=edge\">

  <title>Mi CRM</title>

  <!-- Font Awesome Icons -->
  <link rel=\"stylesheet\" href=\"/build/adminlte/plugins/fontawesome-free/css/all.min.css\">
  <!-- Theme style -->
  <link rel=\"stylesheet\" href=\"/build/adminlte/dist/css/adminlte.css\">

  
  <!-- daterange picker -->
  <link rel=\"stylesheet\" href=\"/build/adminlte/plugins/daterangepicker/daterangepicker.css\">

  <link rel=\"stylesheet\" href=\"https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css\">
  <!-- Google Font: Source Sans Pro -->
  <link href=\"https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700\" rel=\"stylesheet\">

 <!-- iCheck for checkboxes and radio inputs -->
  <link rel=\"stylesheet\" href=\"/build/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css\">
  <!-- Bootstrap Color Picker -->
  <link rel=\"stylesheet\" href=\"/build/adminlte/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css\">
<!-- SweetAlert2 -->
<link rel=\"stylesheet\" href=\"/build/adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css\">

  <!-- Toastr -->
  <link rel=\"stylesheet\" href=\"/build/adminlte/plugins/toastr/toastr.min.css\">
<!-- Select2 -->
  <link rel=\"stylesheet\" href=\"/build/adminlte/plugins/select2/css/select2.min.css\">
  <link rel=\"stylesheet\" href=\"/build/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css\">
 <!-- fullCalendar -->
 <link rel=\"stylesheet\" href=\"/build/adminlte/plugins/fullcalendar/main.min.css\">
 <link rel=\"stylesheet\" href=\"/build/adminlte/plugins/fullcalendar-daygrid/main.min.css\">
 <link rel=\"stylesheet\" href=\"/build/adminlte/plugins/fullcalendar-timegrid/main.min.css\">
 <link rel=\"stylesheet\" href=\"/build/adminlte/plugins/fullcalendar-bootstrap/main.min.css\">
 <link rel=\"stylesheet\" href=\"/build/css/dropzone.css\">

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src=\"/build/adminlte/plugins/jquery/jquery.min.js\"></script>
  <!-- Bootstrap 4 -->
  <script src=\"/build/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js\"></script>
  <!-- AdminLTE App -->
  <script src=\"/build/adminlte/dist/js/adminlte.min.js\"></script>
  <script src=\"/build/adminlte/dist/js/demo.js\"></script>
  <!-- InputMask -->
<script src=\"/build/adminlte/plugins/moment/moment.min.js\"></script>
<script src=\"/build/adminlte/plugins/inputmask/min/jquery.inputmask.bundle.min.js\"></script>
  <!-- date-range-picker -->
  <script src=\"/build/adminlte/plugins/daterangepicker/daterangepicker.js\"></script>
  <!-- bootstrap color picker -->
  <script src=\"/build/adminlte/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js\"></script>
 <!-- Select2 -->
  <script src=\"/build/adminlte/plugins/select2/js/select2.full.min.js\"></script>
  <script src=\"/build/adminlte/plugins/fullcalendar/main.min.js\"></script>
<script src=\"/build/adminlte/plugins/fullcalendar-daygrid/main.min.js\"></script>
<script src=\"/build/adminlte/plugins/fullcalendar-timegrid/main.min.js\"></script>
<script src=\"/build/adminlte/plugins/fullcalendar-interaction/main.min.js\"></script>
<script src=\"/build/adminlte/plugins/fullcalendar-bootstrap/main.min.js\"></script>
<!-- bootstrap color picker -->
<script src=\"/build/adminlte/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js\"></script>
<script src=\"/build/js/jquery.rut.js\"></script>
<script src=\"/build/js/jquery.number.js\"></script>

<script src=\"https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.6/min/dropzone.min.js\"></script>
<!-- SweetAlert2 -->
<script src=\"/build/adminlte/plugins/sweetalert2/sweetalert2.min.js\"></script>
<!-- Toastr -->
<script src=\"/build/adminlte/plugins/toastr/toastr.min.js\"></script>
</head>
<body class=\"hold-transition sidebar-mini layout-fixed\">
    <!-- Bootstrap Switch -->
<script src=\"/build/adminlte/plugins/bootstrap-switch/js/bootstrap-switch.min.js\"></script>
<!-- Site wrapper -->
<div class=\"overlay-wrapper\">
    <!--<div class=\"overlay loader\"><i class=\"fas fa-3x fa-sync-alt fa-spin\"></i><div class=\"text-bold pt-2\">Loading...</div></div>-->
  <!-- Navbar -->
  <nav class=\"main-header navbar navbar-expand navbar-white navbar-light\">
    <!-- Left navbar links -->
    <ul class=\"navbar-nav\">
      <li class=\"nav-item\">
        <a class=\"nav-link\" data-widget=\"pushmenu\" href=\"#\" role=\"button\"><i class=\"fas fa-bars\"></i></a>
      </li>
      <li class=\"nav-item d-none d-sm-inline-block\">
        <a href=\"";
        // line 95
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("dashboard");
        echo "\" class=\"nav-link\">Inicio</a>
      </li>
      
    </ul>
    ";
        // line 99
        echo $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment(Symfony\Bridge\Twig\Extension\HttpKernelExtension::controller("App\\Controller\\ChangecompController::index", ["route_name" => ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, true, false, 99), "attributes", [], "any", false, true, false, 99), "get", [0 => "_route"], "method", true, true, false, 99)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, true, false, 99), "attributes", [], "any", false, true, false, 99), "get", [0 => "_route"], "method", false, false, false, 99), "/")) : ("/"))]));
        echo "
   
    <!-- Right navbar links -->
    
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class=\"main-sidebar sidebar-dark-primary elevation-4\">
    <!-- Brand Logo -->
 
    <a href=\"\" class=\"brand-link\">
      <img src=\"/build/img/empresas/";
        // line 111
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["sesion"] ?? null), "getEmpresaActual", [], "any", false, false, false, 111), "logo", [], "any", false, false, false, 111), "html", null, true);
        echo "\"
           alt=\"";
        // line 112
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["sesion"] ?? null), "getEmpresaActual", [], "any", false, false, false, 112), "nombre", [], "any", false, false, false, 112), "html", null, true);
        echo "\"
           class=\"brand-image img-circle elevation-3\"
           style=\"opacity: .8\">
      <span class=\"brand-text font-weight-light\"><!-- Change Company -->
     Mi CRM
</span>
    </a>

    ";
        // line 120
        echo $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment(Symfony\Bridge\Twig\Extension\HttpKernelExtension::controller("App\\Controller\\MenuController::mainMenu", ["route_name" => ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, true, false, 120), "attributes", [], "any", false, true, false, 120), "get", [0 => "_route"], "method", true, true, false, 120)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, true, false, 120), "attributes", [], "any", false, true, false, 120), "get", [0 => "_route"], "method", false, false, false, 120), "/")) : ("/"))]));
        echo "
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class=\"content-wrapper\">
    <!-- Content Header (Page header) -->
    <div class=\"content-header\">
      <div class=\"container-fluid\">
        <div class=\"row mb-2\">
          <div class=\"col-sm-6\">
            <h1 class=\"m-0 text-dark\">";
        // line 130
        echo twig_escape_filter($this->env, ((array_key_exists("pagina", $context)) ? (_twig_default_filter(($context["pagina"] ?? null), "")) : ("")), "html", null, true);
        echo "</h1>
          </div><!-- /.col -->
          <div class=\"col-sm-6\">
            <ol class=\"breadcrumb float-sm-right\">
              <li class=\"breadcrumb-item\"><a href=\"";
        // line 134
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("dashboard");
        echo "\">Inicio</a></li>
              <li class=\"breadcrumb-item active\">";
        // line 135
        echo twig_escape_filter($this->env, ((array_key_exists("pagina", $context)) ? (_twig_default_filter(($context["pagina"] ?? null), "")) : ("")), "html", null, true);
        echo "</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class=\"content\">
      <div class=\"container-fluid\">
        ";
        // line 146
        if (array_key_exists("error", $context)) {
            // line 147
            echo "            ";
            echo ($context["error"] ?? null);
            echo "
        ";
        }
        // line 149
        echo "        ";
        $this->displayBlock('body', $context, $blocks);
        // line 152
        echo "        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class=\"control-sidebar control-sidebar-dark\">
    <!-- Control sidebar content goes here -->
    <div class=\"p-3\">
      <h5>Titulo</h5>
      <p>Sidebar content</p>
    </div>
  </aside>

        
    \t</div>
        ";
        // line 170
        $this->displayBlock('javascripts', $context, $blocks);
        // line 474
        echo "   <!-- Control Sidebar -->

  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class=\"main-footer\">
    <!-- To the right -->
    <div class=\"float-right d-none d-sm-inline\">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2019 <a href=\"https://adminlte.io\">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->


</body>
</html>";
    }

    // line 149
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 150
        echo "        
        ";
    }

    // line 170
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 171
        echo "   

            <script type=\"text/javascript\">
                \$(function() {
                    const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      showConfirmButton: false,
                      timer: 5000
                    });
              /*  window.onload = function ()  {
                    \$(\".loader\").fadeOut(\"slow\");
                };*/
                ";
        // line 184
        if (array_key_exists("error_toast", $context)) {
            // line 185
            echo "                    ";
            echo ($context["error_toast"] ?? null);
            echo "
                ";
        }
        // line 187
        echo "            });

                function pagination(pag){
                    \$.ajax({
                        url:pag,
                        type: \"get\",
                        dataType: \"html\",
                        cache: false,
                        contentType: false,
                        processData: false,
                        async: true,
                        beforeSend: function(){
                            \$('div.progress > div.progress-bar').css({ \"width\":\"1%\" }); 
                            \$(\"#spinnerModal\").modal({
                                show : true,
                                backdrop : false
                            });
                        },
                        xhr: function () {
                            var xhr = new window.XMLHttpRequest();
                            //Upload Progress
                            xhr.upload.addEventListener(\"progress\", function (evt) {
                                if (evt.lengthComputable) {
                                    var percentComplete = ((evt.loaded / evt.total) * 100)-10; 
                                    \$('div.progress > div.progress-bar').css({ \"width\": percentComplete + \"%\" }); 
                                } 
                            }, false);
                            //Download progress
                            xhr.addEventListener(\"progress\", function (evt)
                            {
                                if (evt.lengthComputable)
                                { 
                                    var percentComplete = ((evt.loaded / evt.total) *100)-10;
                                    \$(\"div.progress > div.progress-bar\").css({ \"width\": percentComplete + \"%\" }); 
                                } 
                            },
                            false);
                            return xhr;
                        },
                        complete: function(){
                            \$(\"div.progress > div.progress-bar\").css({ \"width\":  \"100%\" }); 
                            \$(\"#spinnerModal\").modal('hide');

                        },
                        success:function(data){
                            \$(\"#v-pills-fpr\").html(data);
                            
                        }

                    });
                
                }


          

                /*Ajax agregar rendicion*/

                function vistaCrear(pag){
                    \$.ajax({
                        url:pag,
                        type: \"post\",
                        dataType: \"html\",
                        cache: false,
                        contentType: false,
                        processData: false,
                        async: true,
                        beforeSend: function(){
                            
                            \$('div.progress > div.progress-bar').css({ \"width\":\"1%\" }); 
                            \$(\"#spinnerModal\").modal({
                                show : true,
                                backdrop : false
                            });
                        },
                        xhr: function () {
                            var xhr = new window.XMLHttpRequest();
                            //Upload Progress
                            xhr.upload.addEventListener(\"progress\", function (evt) {
                                if (evt.lengthComputable) {
                                    var percentComplete = ((evt.loaded / evt.total) * 100)-10; 
                                    \$('div.progress > div.progress-bar').css({ \"width\": percentComplete + \"%\" }); 
                                } 
                            }, false);
                            //Download progress
                            xhr.addEventListener(\"progress\", function (evt)
                            {
                                if (evt.lengthComputable)
                                { 
                                    var percentComplete = ((evt.loaded / evt.total) *100)-10;
                                    \$(\"div.progress > div.progress-bar\").css({ \"width\": percentComplete + \"%\" }); 
                                } 
                            },
                            false);
                            return xhr;
                        },
                        complete: function(){
                            
                            \$(\"div.progress > div.progress-bar\").css({ \"width\":  \"100%\" }); 
                            \$(\"#spinnerModal\").modal('hide');

                        },
                        success:function(data){
                            \$(\"#agregaModal .modal-content\").html(data);

                            \$(\"#agregaModal\").modal({
                                show : true,
                                backdrop : false
                            });
                        
                            
                        }

                    });

                }

                function vistaEliminar(pag, id_form){
                    var dataString = new FormData(document.getElementById(\"form\"+id_form));
                    \$.ajax({
                        url:pag,
                        type: \"DELETE\",
                        dataType: \"html\",
                        cache: false,
                        contentType: false,
                        processData: false,
                        async: true,
                        beforeSend: function(){
                            
                            \$('div.progress > div.progress-bar').css({ \"width\":\"1%\" }); 
                            \$(\"#spinnerModal\").modal({
                                show : true,
                                backdrop : false
                            });
                        },
                        xhr: function () {
                            var xhr = new window.XMLHttpRequest();
                            //Upload Progress
                            xhr.upload.addEventListener(\"progress\", function (evt) {
                                if (evt.lengthComputable) {
                                    var percentComplete = ((evt.loaded / evt.total) * 100)-10; 
                                    \$('div.progress > div.progress-bar').css({ \"width\": percentComplete + \"%\" }); 
                                } 
                            }, false);
                            //Download progress
                            xhr.addEventListener(\"progress\", function (evt)
                            {
                                if (evt.lengthComputable)
                                { 
                                    var percentComplete = ((evt.loaded / evt.total) *100)-10;
                                    \$(\"div.progress > div.progress-bar\").css({ \"width\": percentComplete + \"%\" }); 
                                } 
                            },
                            false);
                            return xhr;
                        },
                        complete: function(){
                            
                            \$(\"div.progress > div.progress-bar\").css({ \"width\":  \"100%\" }); 
                            \$(\"#spinnerModal\").modal('hide');

                        },
                        success:function(data){
                            \$(\"#agregaModal .modal-content\").html(data);

                            \$(\"#agregaModal\").modal({
                                show : true,
                                backdrop : false
                            });
                        
                            
                        }

                    });

                }
                function grabarCrear(pag){
                    var dataString = new FormData(document.getElementById(\"form\"));
                    \$.ajax({
                        url:pag,
                        type: \"post\",
                        dataType: \"html\",
                        data: dataString,
                        cache: false,
                        contentType: false,
                        processData: false,
                        async: true,
                        beforeSend: function(){
                            \$(\"div.progress > div.progress-bar\").addClass(\"progress-bar-animated\");
                            \$(\"#spinnerModal\").modal({
                                show : true,
                                backdrop : false
                            });
                            
                        },
                        xhr: function () {
                            var xhr = new window.XMLHttpRequest();
                            //Upload Progress
                            xhr.upload.addEventListener(\"progress\", function (evt) {
                                if (evt.lengthComputable) {
                                    var percentComplete = ((evt.loaded / evt.total) * 100)-10; 
                                    \$('div.progress > div.progress-bar').css({ \"width\": percentComplete + \"%\" }); 
                                } 
                            }, false);
                            //Download progress
                            xhr.addEventListener(\"progress\", function (evt)
                            {
                                if (evt.lengthComputable)
                                { 
                                    var percentComplete = ((evt.loaded / evt.total) *100)-10;
                                    \$(\"div.progress > div.progress-bar\").css({ \"width\": percentComplete + \"%\" }); 
                                } 
                            },
                            false);
                            return xhr;
                        },
                        complete: function(){
                            \$(\"#spinnerModal\").modal('hide');
                            
                            \$(\"div.progress > div.progress-bar\").css({ \"width\":  \"100%\" }); 

                        },
                        success:function(data){
                            \$(\"#agregaModal .modal-content\").html(data);

                            \$(\"#agregaModal\").modal({
                                show : true,
                                backdrop : false
                            });
                            \$(\"div.progress > div.progress-bar\").removeClass(\"progress-bar-animated\");
                            \$(\"div.progress > div.progress-bar\").css({ \"width\": \"0%\" }); 
                        }

                    });

                }

                function cerrarCrear(pag){

                    \$(\"#agregaModal\").modal('hide');
                    pagination(pag);
                    //window.location.reload();
                    window.location.href=pag;
                }

            
                \$('#usuario_whatsapp').inputmask({mask:'(+56 9) 9999 9999'});  //static mask
                \$('#usuario_telefono').inputmask({mask:'(+56 9) 9999 9999'}); 
                
                \$('#agenda_telefonoCliente').inputmask({mask:'+56999999999'}); 
                \$('#agenda_telefonoRecadoCliente').inputmask({mask:\"+56999999999\"}); 

                \$('#usuario_correo').inputmask({
                    mask: \"*{1,100}[.*{1,100}][.*{1,100}][.*{1,100}]@*{1,50}[.*{2,50}][.*{1,3}]\",
                    greedy: false,
                    onBeforePaste: function (pastedValue, opts) {
                    pastedValue = pastedValue.toLowerCase();
                    return pastedValue.replace(\"mailto:\", \"\");
                    },
                    definitions: {
                    '*': {
                        validator: \"[0-9A-Za-z!#\$%&'*+/=?^_`{|}~\\-]\",
                        casing: \"lower\"
                    }
                    }
                });
                \$('#agenda_emailCliente').inputmask({
                    mask: \"*{1,100}[.*{1,100}][.*{1,100}][.*{1,100}]@*{1,50}[.*{2,50}][.*{1,3}]\",
                    greedy: false,
                    onBeforePaste: function (pastedValue, opts) {
                    pastedValue = pastedValue.toLowerCase();
                    return pastedValue.replace(\"mailto:\", \"\");
                    },
                    definitions: {
                    '*': {
                        validator: \"[0-9A-Za-z!#\$%&'*+/=?^_`{|}~\\-]\",
                        casing: \"lower\"
                    }
                    }
                });
                \$(\"#usuario_rut\").inputmask({
                    mask: \"9[9.999.999]-[9|K|k]\",
                });
                
                
            </script>
        ";
    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  301 => 187,  295 => 185,  293 => 184,  278 => 171,  274 => 170,  269 => 150,  265 => 149,  243 => 474,  241 => 170,  221 => 152,  218 => 149,  212 => 147,  210 => 146,  196 => 135,  192 => 134,  185 => 130,  172 => 120,  161 => 112,  157 => 111,  142 => 99,  135 => 95,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "base.html.twig", "D:\\htdocs\\desarrollos_symfony\\micrm\\crm v.2\\templates\\base.html.twig");
    }
}
