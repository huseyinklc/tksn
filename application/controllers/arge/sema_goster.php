<?php
	
	class Sema_Goster extends CI_Controller
	{
		// Database'den çekeceğimiz resimlerin adresi için kullanacağız
		public $sema_bilgileri;

		public function __construct()
		{
			parent::__construct();
			$this->load->model('arge/sema_model');
			$this->sema_bilgileri = $this->sema_model->sema_goster();
		}
		public function index(){
			$veri['sema_bilgileri'] = $this->sema_bilgileri;
			$this->load->view('arge/sema/sema_goster', $veri);
		}

	}
/* End of the file: sema_goster.php */
/* Location: application/controllers/arge/sema_goster */