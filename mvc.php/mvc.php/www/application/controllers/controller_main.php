<?php 	class Controller_Main extends Controller	{		public $model;    	public $view;        	function __construct()    	{        	$this->view = new View();        	$this->model = new Model_Main();    	}    	    	function action_index()    	{	    		$data=$this->model->get_data();        	$this->view->generate('main_view.php', 'template_view.php',$data);    	}	}?>