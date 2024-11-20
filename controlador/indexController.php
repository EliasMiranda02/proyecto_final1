<!--NUEVO ARCHIVO-->
<?php
include_once("modelo/indexmodel.php");
class IndexController{
    private $indexModel;
    //Constructor
    public function __construct()
    {
        $this->indexModel = new IndexModel();
    }
    public static function index(){
        require_once("./menu.php"); //PERMITIR DESPLEGAR LA VISTA
    }
    public static function empleado(){
        require_once("./t_empleado.php"); //PERMITIR DESPLEGAR LA VISTA
    }
    public static function usuario(){
        require_once("./t_usuario.php"); //PERMITIR DESPLEGAR LA VISTA
    }
    public static function paquete(){
        require_once("./t_paquetes.php"); //PERMITIR DESPLEGAR LA VISTA
    }
    public static function excursion(){
        require_once("./t_excursiones.php"); //PERMITIR DESPLEGAR LA VISTA
    }
    public static function hotel(){
        require_once("./t_hoteles.php"); //PERMITIR DESPLEGAR LA VISTA
    }
    public static function volante(){
        require_once("./t_volante.php"); //PERMITIR DESPLEGAR LA VISTA
    }
    public static function rentacarro(){
        require_once("./renta_carros.php"); //PERMITIR DESPLEGAR LA VISTA
    }
    public static function catacarro(){
        require_once("./t_catacarros.php"); //PERMITIR DESPLEGAR LA VISTA
    }
    public static function reservapa(){
        require_once("./t_reservaspa.php"); //PERMITIR DESPLEGAR LA VISTA
    }
    public static function reservaea(){
        require_once("./t_reservasea.php"); //PERMITIR DESPLEGAR LA VISTA
    }
    public static function reservav(){
        require_once("./t_reservasv.php"); //PERMITIR DESPLEGAR LA VISTA
    }
    public static function reservapv(){
        require_once("./t_reservaspv.php"); //PERMITIR DESPLEGAR LA VISTA
    }
    public static function calificacion(){
        require_once("./calificaciones.php"); //PERMITIR DESPLEGAR LA VISTA
    }
    public static function home(){
        require_once("./home.php"); //PERMITIR DESPLEGAR LA VISTA
    }
    public static function form_paquete_itinerario(){
        require_once("./form_paquete_intinerario.php"); //PERMITIR DESPLEGAR LA VISTA
    }
    public static function recorrido(){
        require_once("./t_recorridos.php"); //PERMITIR DESPLEGAR LA VISTA
    }
    public static function ruta(){
        require_once("./rutas.php"); //PERMITIR DESPLEGAR LA VISTA
    }
    public static function paqueteprecio(){
        require_once("./t_paquete_precio.php"); //PERMITIR DESPLEGAR LA VISTA
    }
    public static function registroempleado(){
        require_once("./registro_empleado.php"); //PERMITIR DESPLEGAR LA VISTA
    }
    public static function registrousuario(){
        require_once("./registro.php"); //PERMITIR DESPLEGAR LA VISTA
    }

}
?>