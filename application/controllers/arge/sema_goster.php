<?php
	
	class Sema_Goster extends CI_Controller
	{
		// Database'den çekeceğimiz resimlerin adresi için kullanacağız
		public $sema_bilgileri;

		public function __construct()
		{
			// Framework constructor 
			parent::__construct();

			// Şemaları databaseden çekebilmek için sema_model'i yükledik
			$this->load->model('arge/sema_model');

			// databasedeki bulunan şema bilgilerini class sema_bilgilerine aktardık
			$this->sema_bilgileri = $this->sema_model->sema_goster();

			// Sadece arge kullanıcısının girdiği session ile kontrol edildi
			if( $this->session->userdata('uyelik_turu') != 2) {
			 	redirect('giris', 'refresh');
			}
		}
		public function index(){

			// Şema bilgileri ile sema_goster sayfasını yükledik
			$veri['sema_bilgileri'] = $this->sema_bilgileri;
			$this->load->view('arge/sema/sema_goster', $veri);
		}

	}
/* End of the file: sema_goster.php */
/* Location: application/controllers/arge/sema_goster */