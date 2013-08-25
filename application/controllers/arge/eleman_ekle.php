<?php 
	class Eleman_Ekle extends CI_extends
	{
		public function __construct()
		{
			// Framework parent constuructor çağırıldı..
			parent::__construct();

			
		}

		public function index(){
			$this->view->load('eleman_ekle');
		}
	}
/* End of the file: eleman_ekle.php */
/* Location: ./application/controllers/arge/eleman/ */