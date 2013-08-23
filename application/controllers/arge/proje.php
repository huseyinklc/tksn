<?php
	
	class Proje extends CI_Controller
	{
		// Tum class içerisinde kullanabilmek için proje_bilgileri değişkeni tanımladık
		public $proje_bilgileri;

		/**
		 * Database işlemleri için proje_model yüklendi.
		 * 
		 * proje_bilgileri değişkenine, database de bulunan tüm proje bilgileri
		 * array içine çekildi
		 * 
		 * */
		public function __construct()
		{
			parent::__construct();
			$this->load->model('arge/proje_model');
			$this->proje_bilgileri = $this->proje_model->proje_bilgilerini_databaseden_cek();
		}

		/**
		 * Arge ana sayfası aynı zamanda projelerin gösterildiği sayfa olarak kullanılmaktadır..
		 * 
		 * Database'den çektiğimiz proje bilgileri ile ana sayfa yüklendi..
		 * 
		 * Database'den çektiğimiz bu bilgiler:
		 * 	Proje ismi
		 * 	Proje Resmi
		 * 
		 * Bu bilgiler link ile daha detaylı bir şekilde proje_goster.php sayfasında gösterilmiştir..
		 * 
		 * */
		public function index()
		{		
				$veri['proje_bilgileri'] = $this->proje_bilgileri;
				$this->load->view('arge/arge_index', $veri);	
		}

		/**
		 * 
		 * Bu fonksiyonda $proje_id değişkenine göre databaseden bilgiler çekilerek
		 * array biçiminde proje göster sayfasına yollandı
		 * */
		public function proje_goster($proje_id = 0)
		{
			if ($proje_id === 0 ) {
				// buraya hata mesajı gelecek ve sayfada gösterilecek
				$this->load->view('arge/arge_index');
			} else {
				// proje_id numarasına göre proje bilgileri çekiliyor..
				$proje_bilgileri['proje_bilgileri'] = $this->proje_model->proje_goster($proje_id); 
				$this->load->view('arge/proje_goster', $proje_bilgileri);
			}
		}

	}
	/* End of the file proje.php */
	/* Location: /opt/lampp/htdocs/tksn/application/controllers/arge/ */