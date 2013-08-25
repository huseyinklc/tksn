<?php 
	class Eleman extends CI_Controller
	{
		public function __construct()
		{
			// Framework parent constuructor çağırıldı..
			parent::__construct();


		}

		public function index(){

			$this->load->view('arge/eleman/eleman_goster');
		}

		public function eleman_ekle()
		{
			$this->load->helper('form');
			$this->load->view('arge/eleman/eleman_ekle');
		}

		public function eleman_ekle_kontrol()
		{

		}
	}
/* End of the file: eleman.php */
/* Location: ./application/controllers/arge/eleman/ */