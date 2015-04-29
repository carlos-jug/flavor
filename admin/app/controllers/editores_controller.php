<?php class editores_controller extends appcontroller{
	public function __construct(){
		parent::__construct();
		if(!isset($_SESSION['usuario']))
            $this->redirect("login/login/");
		$this->title_for_layout("Editores");
	}
	
	public function index($page=""){
        $page = (int) (is_null($page)) ? 1 : $page ;
        $limit = 20;
        $offset = (($page-1) * $limit);
        $limitQuery = $offset.",".(int)$limit;
        $editores=new Editores();
        $this->view->editores=$editores->get_all(null, "name" , $limitQuery, null);
        $totalRows = $editores->getCount();
        $targetpage = Path.'/editores/';
        $this->view->pagination = $this->pagination->init($totalRows, $page, $limit, $targetpage);
        $this->view->page=$page;
        $this->render();
	}
	
	public function detalle($idEditor=''){
		$editores=new Editores();
		$this->view->editor=$editores->find($idEditor);
		if($this->data){
			if(isset($_FILES["avatar"])){
				$img=$editores->imagen("avatar");
				if($img)
					$this->data["avatar"]=$img;
			}
			if($this->data["pass"] and $this->data["pass"]!='')
				$this->data["pass"]=md5($this->data["pass"]);
			else
				unset($this->data["pass"]);
			$editores->prepareFromArray($this->data);
			$editores->save();
			$this->redirect("editores");
		}
		$this->view->setLayout("float");
		$this->render();
	}
	
	public function eliminar($idEditor=''){
		$editores=new Editores();
		$editores->find($idEditor);
		$editores->delete();
		$this->redirect("editores");
	}
	
} ?>