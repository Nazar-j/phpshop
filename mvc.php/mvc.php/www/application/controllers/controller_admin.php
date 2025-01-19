<?php 	class Controller_Admin extends Controller	{		public $model;    	public $view;        	function __construct()    	{        	$this->view = new View();        	$this->model = new Model_Admin();    	}    	function confirm()    	{    		if(isset($_SESSION['user']) and $_SESSION['user']=='admin')    			return true;        	throw new Exception($model_path.' ->Model not found. 404');    	}    	    	function action_index()    	{	    		if($this->confirm())    		{				$data=$this->model->get_data();				$this->view->generate('admin_view.php', 'template_view.php',$data);			}    	}    	function action_addtovar()    	{    		if($this->confirm())    		{    			if(isset($_POST['Add']))    			{    				$this->model->add_tovar($_POST);    			}				$this->view->generate('add_tovar_view.php', 'template_view.php',$data);			}    	}    	    	function action_deletetovar($data)    	{    		if($this->confirm())    		{				$this->model->delete($data);				$data=$this->model->get_data();				$this->view->generate('admin_view.php', 'template_view.php',$data);			}    	}    	function action_editcategory($data)    	{    		if($this->confirm())    		{    			$data=$this->model->get_categories();				$this->view->generate('edit_categories_view.php', 'template_view.php',$data);    		}    	}    	function action_edittovar($data=null)    	{	    		if($this->confirm())    		{    			if(isset($_POST['Save']))    			{    				$this->model->set_tovar($_POST);    			}    			if(isset($data)&&!empty($data))    			{					$data=$this->model->get_tovar($data);					$this->view->generate('edit_tovar_view.php', 'template_view.php',$data);				}				else				{					$data=$this->model->get_data();					$this->view->generate('admin_view.php', 'template_view.php',$data);				}			}    	}	}?>