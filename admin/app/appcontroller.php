<?php abstract class appcontroller extends controller {

	public function __construct(){
		parent::__construct();
	}

	public function beforeRender(){
		$this->view->function = $this->action;
		$this->view->params = $this->params;
		$this->view->controller = $this->controller;
	}
} ?>