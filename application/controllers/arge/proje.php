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
			// Framework contructor
			parent::__construct();

			// Form işlemleri için Framework form helper yüklendi
			$this->load->helper('form');

			// Form kontrolü için frameworkün ilgili fonksiyonu yüklendi
			$this->load->library('form_validation');

			// Database işlemleri için proje_model yüklendi
			$this->load->model('arge/proje_model');

			// Sadece arge kullanıcısının girdiği session ile kontrol edildi
			if( $this->session->userdata('uyelik_turu') != 2) {
			 	redirect('giris', 'refresh');
			 }
			$this->proje_liste_bilgileri = $this->proje_model->proje_liste_bilgileri();
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
				$veri['proje_bilgileri'] = $this->proje_liste_bilgileri;
				$this->load->view('arge/proje/proje_goster', $veri);	
		}

		/**
		 * 
		 * Bu fonksiyonda $proje_id değişkenine göre databaseden bilgiler çekilerek
		 * array biçiminde proje göster sayfasına yollandı
		 * */
		public function proje_goster($proje_id)
		{
			if (!is_numeric($proje_id) || $this->proje_model->maksimum_id()[0]->proje_id < $proje_id ) {
				$veri['proje_bilgileri'] = $this->proje_bilgileri;
				$veri['hata_mesaji'] = 'Girdiginiz sayfa sunucuda bulunamadı';
				$this->load->view('arge/proje/proje_bulunamadi', $veri);
			} else {
				// proje_id numarasına göre proje bilgileri çekiliyor..
				$proje_bilgileri['proje_bilgileri'] = $this->proje_model->proje_detay($proje_id); 
				$this->load->view('arge/proje/proje_detay', $proje_bilgileri);
			}
		}


		public function proje_ekle()
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
			$upload_edilecek_resim_ozellikleri = $this->proje_model->proje_resmi_upload_ozellikleri();

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
				if($this->proje_model->proje_ekledeki_bilgileri_database_aktarma($database_yazilacak_bilgiler)) {
						// eğer form bilgileri database e aktarma işlemi başarılı ise, proje_ekle_başarılı sayfasını girilen bilgiler
						// ile ekrana yazdırıyoruz 
						$this->load->view('arge/proje_ekle/proje_ekle_basarili', $database_yazilacak_bilgiler);
				} else {
					// Buraya internal server error sayfası gelecek!!!
					echo 'internal server error';
				}
			}
		}

		/**
		 * Proje sil sayfasında silinecek sayfanın proje_bilgileri gösteriliyor..
		 * @arg
		 */
		public function proje_sil($proje_id){

			// proje_id sayısına göre proje_bilgilerini çekiyoruz
			$veri['proje_bilgileri'] = $this->proje_model->proje_detay($proje_id);

			// database bilgilerimiz ile proje_sil sayfamız yükleniyor
			$this->load->view('arge/proje/proje_sil',$veri);
		}


		/**
		 * proje_id ile verilen proje database'den siliniyor
		 * @param  int $proje_id silinecek projenin id numarası
		 * @return boolean	eğer işlem başarılı bir şekilde halledilmiş ise true döndürüyoruz..
		 */
		public function proje_sil_onay($proje_id)
		{
				// Proje silme işlemi database'de deneniyor
				if($this->proje_model->proje_sil($proje_id)) {
				//Başarılı ise;
				
				// Türkçe karakterleri gösterebilmek için utf-8 charseti ayarladık
				echo '<meta charset="utf-8">';

				// Proje silme işleminin başarılı olduğuna dair mesajımız
				echo '<h2>Proje silme işlemi başarılı</h2>';

				// 5 saniye üstteki mesajı tuttuktan sonra tekrar proje_listesinin olduğu sayfaya dönüyoruz.
				$this->output->set_header('refresh:5;url=../../proje'); 
			} else {
				// eğer işlem başarısız olmuşsa hata mesajı gösteriyoruz
				echo 'interval server error';
			}
		}



	} // class sonu
/* End of the file proje.php */
/* Location: /opt/lampp/htdocs/tksn/application/controllers/arge/ */