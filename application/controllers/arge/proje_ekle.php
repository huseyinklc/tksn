<?php
	class Proje_ekle extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->model('arge/proje_ekle_model');
		}

		public function index()
		{
			$form_hatalari['hata'] = '';
			$form_hatalari['upload_hatasi'] = '';
			$this->load->view('arge/proje_ekle/proje_ekle', $form_hatalari);	
		}

		public function form_upload()
		{
			// gelen input değerleri için kontrol kuralları
			$this->form_validation->set_rules('proje_ismi', 'Proje ismi', 'required|max_length[15]|min_length[4]|xss_clean');
			$this->form_validation->set_rules('proje_tanimi', 'Proje Tanımı', 'required|max_length[50000]|min_length[4]|xss_clean');

			// Proje ismini ve proje tanımı array içine atıldı
			$database_yazilacak_bilgiler['proje_ismi'] = $this->input->post('proje_ismi');
			$database_yazilacak_bilgiler['proje_tanimi'] = $this->input->post('proje_tanimi');


			// Modelden projeye eklenecek resmin ayar bilgileri array içinde çekildi
			$upload_edilecek_resim_ozellikleri = $this->proje_ekle_model->proje_resmi_upload_ozellikleri();

			// upload kütüphanesi $upload_edilecek_resim_ozellikleri ne göre yuklendi
			$this->load->library('upload', $upload_edilecek_resim_ozellikleri);

			// eğer upload hatası ve validation hatası varsa
			if ( !$this->upload->do_upload() || ($this->form_validation->run() == FALSE) )
			{
				// hata mesajlarını form_hatalari array'i içerisine atıyoruz
				$form_hatalari['hata'] = validation_errors();
				$form_hatalari['upload_hatasi'] = $this->upload->display_errors();

				// Tekrar proje ekle sayfamızı hata değerleri ile yüklüyoruz
				$this->load->view('arge/proje_ekle/proje_ekle', $form_hatalari);			
			}
			else
			{
				// Eğer herşey yolunda gittiyse
				// upload bilgileri ve proje resminin ismini array içine atıyoruz
				$database_yazilacak_bilgiler['upload_bilgileri'] = $this->upload->data();
				$database_yazilacak_bilgiler['proje_resmi'] = $database_yazilacak_bilgiler['upload_bilgileri']['file_name'];

				// formdaki verileri database e yazmayı deniyoruz..
				if($this->proje_ekle_model->proje_ekledeki_bilgileri_database_aktarma($database_yazilacak_bilgiler)) {
						// eğer form bilgileri database e aktarma işlemi başarılı ise, proje_ekle_başarılı sayfasını girilen bilgiler
						// ile ekrana yazdırıyoruz 
						$this->load->view('arge/proje_ekle/proje_ekle_basarili', $database_yazilacak_bilgiler);
				} else {
					// Buraya internal server error sayfası gelecek!!!
					echo 'internal server error';
				}
			}
		}
	} 