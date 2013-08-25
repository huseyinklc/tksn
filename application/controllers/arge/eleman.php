<?php 
	class Eleman extends CI_Controller
	{
		public $eleman_turu;
		public $firma_ismi;

		public function __construct()
		{
			// Framework parent constuructor çağırıldı..
			parent::__construct();

			// database işlemleri için model yüklendi
			$this->load->model('arge/eleman_model');

			// Eleman türleri dropdown liste eklenebilmesi için databaseden çekildi
			$this->eleman_turu = $this->eleman_model->eleman_turu();

			// Firma isimleri dropdown liste eklenebilmesi için databaseden çekildi
			$this->firma_ismi = $this->eleman_model->firma_ismi();
		}

		public function index(){
			$this->load->view('arge/eleman/eleman_goster');
		}

		public function eleman_ekle()
		{
			// Eleman ekle sayfasındaki form işlemleri için form helperi yüklendi
			$this->load->helper('form');

			// Databaseden çekilen eleman türleri eleman_ekle sayfasına yollanabilmek için veri arrayi içine atıldı
			$veri['eleman_turu'] = $this->eleman_turu;

			$veri['firma_ismi'] = $this->firma_ismi;

			// eleman ekle sayfası veri arrayi ile yüklendi
			$this->load->view('arge/eleman/eleman_ekle', $veri);
		}

		public function eleman_ekle_kontrol()
		{

		}
	}
/* End of the file: eleman.php */
/* Location: ./application/controllers/arge/eleman/ */