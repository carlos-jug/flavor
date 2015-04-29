<?php
class index_controller extends appcontroller{
	public function __construct(){
		parent::__construct();
		if(!isset($_SESSION['usuario']))
            $this->redirect("login/login/");
		$this->title_for_layout("Inicio");
	}
	
	public function index($id=""){
		$this->title_for_layout("La Bestia");
		$categorias=new Categories();
		$this->view->count_categorias=$categorias->get_count_actives();
		$articles=new Articles();
		$this->view->count_articles=$articles->get_count_actives();
		$resultados=new Resultados();
		$this->view->count_resultados=$resultados->get_count_actives();
		$this->render();
	}

}
?>