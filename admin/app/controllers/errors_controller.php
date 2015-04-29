<?php class Errors_controller extends appcontroller{
	
	public function index($error = null, $description = ""){
		$description = "";
		$this->view->error_string = array("code" => $error, "message" => $description);
		$this->render();
	}
	
} ?>