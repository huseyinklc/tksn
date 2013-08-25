<?php 

	class Dokuman extends CI_Controller
	{
		public function __construct()
		{
			// Framework ana construction
			parent::__construct();

			// Database işlemleri için
			$this->load->model('arge/dokuman_model');

			// Form Kontrolü için
			$this->load->helper('form');

			// Arge dışından kullanıcılar erişemesin diye..
			if( $this->session->userdata('uyelik_turu') != 2) {
			 	redirect('giris', 'refresh');
			 }
		}

		public function index()
		{
			// Eğer sayfa ilk defa yüklenecek ise hata boş string olarak yazılır böylece
			// hiçbir hata göserilmez
			$veri['dosya_yukleme_hatasi'] = '';
			$this->load->view('arge/dokuman/dokumanlar');
		}
		
		/**
		 * Döküman eklenme istediğinde çağırılacak sayfa yüklenir..
		 * * @return [type] [description]
		 */
		public function dokuman_ekle()
		{
			$veri['dosya_yukleme_hatasi'] = '';
			$this->load->view('arge/dokuman/dokuman_ekle', $veri );
		}
		/**
		 * Eklenen dökümanda herhangi bir hata olup olmadığı kontrol edilir..
		 * @return [type] [description]
		 */
		public function form_kontrolu()
		{
			// döküman upload özellikleri dokuman_model sayafasından çekilir..
			$ayar = $this->dokuman_model->dokuman_upload_ozellikleri();

			// framework upload sayfası yüklendi
			$this->load->library('upload', $ayar);	
			
			// eğer upload durumunda bir sıkıntı varsa
			if(! $this->upload->do_upload())
			{
 				// hata durumu 
			} else {

				// Eğer herşey yolunda gittiyse
				// upload bilgileri ve dokuman ismini array içine atıyoruz

				$database_yazilacak_bilgiler['upload_bilgileri'] = $this->upload->data();
				$database_yazilacak_bilgiler['dokuman_ismi'] = $database_yazilacak_bilgiler['upload_bilgileri']['file_name'];
				

				// formdaki verileri database e yazmayı deniyoruz..
				if($this->dokuman_model->sema_database_ekle($database_yazilacak_bilgiler)) {
						// eğer form bilgileri database e aktarma işlemi başarılı ise, dokuman_ekle_başarılı sayfasını girilen bilgiler
						// ile ekrana yazdırıyoruz 
						$this->load->view('arge/dokuman/dokuman_ekle_basarili', $database_yazilacak_bilgiler);
				} else {
					// Buraya internal server error sayfası gelecek!!!
					echo 'internal server error';
				}
			}
		}
	}
/* End of file: dokuman.php */
/* Location: ./application/controllers/arge/ */