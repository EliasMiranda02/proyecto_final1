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
}
?>