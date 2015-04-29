<?php class login_controller extends appcontroller{
	
    public function __construct() {
        parent::__construct();
        $this->title_for_layout("Login");
	}
    
    public function index($id="") {
        $this->redirect("login/login");
    }
    
    public function login($ubicacion="index"){
    	if($this->data){
            $pass = md5($this->data['pass']);
            $usuarios = new Editores();
            $usuario=$usuarios->findBy(array('email','pass','activo'), array($this->data['user'],$pass,1));
            if($usuario["idEditor"]){
                unset($usuario["pass"]);
                $_SESSION['usuario'] = $usuario;
            }else{
                $_SESSION["msj"]="Usuario y/o contraseña erróneos";
            }
            $this->redirect("/");
        }
        $this->view->setLayout("login");
        $this->render();
    }
    
    public function logout(){
        unset($_SESSION['usuario']);
        $_SESSION["msj"]="Sesión finalizada";
        $this->redirect("login");
    }

}
?>