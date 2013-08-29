<?php 
	class Eleman extends CI_Controller
	{
		public $eleman_turu;
		public $firma_ismi;
		public $kilif_tipi;
		public $veri = array();

		public function __construct()
		{
			// Framework parent constuructor çağırıldı..
			parent::__construct();

			// Form işlemleri için form helperi yüklendi
			$this->load->helper('form');

			// form kontrolü için 
			$this->load->library('form_validation');

			// database işlemleri için model yüklendi
			$this->load->model('arge/eleman_model');

			// Eleman türleri dropdown liste eklenebilmesi için databaseden çekildi
			$this->eleman_turu = $this->eleman_model->eleman_turu();

			// Firma isimleri dropdown liste eklenebilmesi için databaseden çekildi
			$this->firma_ismi = $this->eleman_model->firma_ismi();

			// Kılıf Tipleri dropdown liste eklenebilmesi için databaseden çekildi
			$this->kilif_tipi = $this->eleman_model->kilif_tipi();


			// Databaseden çekilen eleman türleri eleman_ekle sayfasına yollanabilmek için veri arrayi içine atıldı
			$this->veri['eleman_turu'] = $this->eleman_turu;

			// Databaseden firma isimleri çekildi..
			$this->veri['firma_ismi'] = $this->firma_ismi;


			// Databaseden kilif tipleri çekildi..
			$this->veri['kilif_tipi'] = $this->kilif_tipi;
		}
		/**
		 * eleman sayfası ilk olarak databasedeki eleman bilgilerini tabloda gösterecek şekilde yükleniyor
		 * 
		 */
		public function index(){
			
			// databasedeki eleman bilgileri çekiliyor (Eleman özellikleri ve dosya ve resim linkleri hariç)
			$veri['tum_bilgiler'] =	$this->eleman_model->eleman_bilgilerini_goster();

			// databasedeki bilgiler ile eleman_goster sayfasi yukleniyor
			$this->load->view('arge/eleman/eleman_goster', $veri);
		}

		/**
		 * eleman_goster sayfasındaki her bir eleman için ayrıntı bilgisini ayrı bir sayfa içerisinde kullanmak için
		 * @param  int $eleman_id detaylı gösterilecek elemanın id bilgisini tutuyoruz
		 * 
		 */
		public function eleman_detay($eleman_id)
		{
			// detaylı görmek istediğimiz elemanın bilgilerini eleman_id ile çekiyoruz
			$veri['tum_ayrinti_bilgiler'] = $this->eleman_model->tum_eleman_bilgilerini_goster($eleman_id);

			// database bilgileri için sayfa gösteriyoruz..
			$this->load->view('arge/eleman/eleman_detay', $veri);
		}
		
		/**
		 * Girdiğimiz eleman bilgilerinde bir yanlışlık olduğunda bunu düzeltmek için 
		 * @param  int $eleman_id değiştirilecek elemanın id bilgisini tutuyoruz
		 * 
		 */
		public function eleman_bilgisini_degistir($eleman_id)
		{
			// ilk yüklediğimizde form hatası olmadığı için boş yükledik
			$this->veri['form_hatalari'] = '';

			// tüm eleman bilgilerini databaseden alıp array içine yükledik
			$this->veri['eleman_bilgiler'] = $this->eleman_model->degistirilecek_eleman_bilgilerini_goster($eleman_id);

			// database bilgilerine göre view sayfası yüklendi
			$this->load->view('arge/eleman/eleman_bilgisini_degistir', $this->veri);
		}
		public function eleman_bilgisini_degistir_kontrol($eleman_id)
		{	
			$this->form_validation->set_rules('eleman_kodu', 'Eleman Kodu', 'trim|required|min_length[2]|max_length[50]|xss_clean');
			$this->form_validation->set_rules('ozellik', 'Eleman Özellik', 'trim|required|min_length[2]|max_length[1000]|xss_clean');
			$this->form_validation->set_rules('adet', 'Eleman Adeti', 'trim|required|min_length[1]|max_length[8]|xss_clean|numeric');

			if($this->form_validation->run() == FALSE) {
				// eğer formda hata varsa 
					
				// hatalar form_hatalari değişkenine yüklendi
				$this->veri['form_hatalari'] =  validation_errors();

				// tüm eleman bilgilerini databaseden alıp array içine yükledik
				$this->veri['eleman_bilgiler'] = $this->eleman_model->degistirilecek_eleman_bilgilerini_goster($eleman_id);


				$this->load->view('arge/eleman/eleman_bilgisini_degistir', $this->veri);

			} else {


					// güvenlik açığı oluşturacak daha sonra daha iyi bir yöntem düşünülecek (sesion vs kullanma!!)
					$formdan_gelen_bilgiler['eleman_id'] = $eleman_id;

					// Formdan gelen bilgiler array içine yazıldı
					
					$formdan_gelen_bilgiler['eleman_kodu'] = $this->input->post('eleman_kodu');
					$formdan_gelen_bilgiler['firma_id'] = $this->input->post('firma_id');
					$formdan_gelen_bilgiler['eleman_turu_id'] = $this->input->post('eleman_turu_id');
					$formdan_gelen_bilgiler['kilif_id'] = $this->input->post('kilif_id');
					$formdan_gelen_bilgiler['ozellik'] = $this->input->post('ozellik');
					$formdan_gelen_bilgiler['adet'] = $this->input->post('adet');
					$formdan_gelen_bilgiler['numune'] = $this->input->post('numune');

					// Formdan gelen bilgiler updatae edilmeye çalışıldı
					if($this->eleman_model->eleman_bilgilerini_degistir($formdan_gelen_bilgiler)) {

						// Eğer başarılı ise, database yazılan değerler ve dropdown'daki listeler databaseden çekilerek 
						// ekrana yazdırılır
						$eleman_ekle_basarili_verileri['eleman_kodu'] = $formdan_gelen_bilgiler['eleman_kodu'];
						$eleman_ekle_basarili_verileri['firma_ismi'] = $this->veri['firma_ismi'][$formdan_gelen_bilgiler['firma_id']];
						$eleman_ekle_basarili_verileri['eleman_turu'] = $this->veri['eleman_turu'][$formdan_gelen_bilgiler['eleman_turu_id']] ;
						$eleman_ekle_basarili_verileri['kilif'] = $this->veri['kilif_tipi'][$formdan_gelen_bilgiler['kilif_id']] ; 
						$eleman_ekle_basarili_verileri['ozellik'] = $formdan_gelen_bilgiler['ozellik'];
						$eleman_ekle_basarili_verileri['adet'] = $formdan_gelen_bilgiler['adet'];
						$eleman_ekle_basarili_verileri['numune'] = $formdan_gelen_bilgiler['numune']; 

						// Ayrı sayfa yapılabilir fakat ilerde, başlıkda php variable olacağı için çok önemli değil
						$this->load->view('arge/eleman/eleman_ekleme_basarili', $eleman_ekle_basarili_verileri);
					} else {
						// Hata sayfası yapılacak
						echo 'interval server error';
					}
			}
		}

		public function eleman_ekle()
		{
			
			$this->veri['form_hatalari'] = '';

			// eleman ekle sayfası veri arrayi ile yüklendi
			$this->load->view('arge/eleman/eleman_ekle', $this->veri);
		}

		public function eleman_ekle_kontrol()
		{



			$this->form_validation->set_rules('eleman_kodu', 'Eleman Kodu', 'trim|required|min_length[2]|max_length[50]|xss_clean');
			$this->form_validation->set_rules('ozellik', 'Eleman Özellik', 'trim|required|min_length[2]|max_length[1000]|xss_clean');
			$this->form_validation->set_rules('adet', 'Eleman Adeti', 'trim|required|min_length[1]|max_length[8]|xss_clean|numeric');

			if($this->form_validation->run() == FALSE) {
				// eğer formda hata varsa 
					
				// hatalar form_hatalari değişkenine yüklendi
				$this->veri['form_hatalari'] =  validation_errors();

				$this->load->view('arge/eleman/eleman_ekle', $this->veri);

			} else {

					// Formdan gelen bilgiler array içine yazıldı
					$formdan_gelen_bilgiler['eleman_kodu'] = $this->input->post('eleman_kodu');
					$formdan_gelen_bilgiler['firma_id'] = $this->input->post('firma_id');
					$formdan_gelen_bilgiler['eleman_turu_id'] = $this->input->post('eleman_turu_id');
					$formdan_gelen_bilgiler['kilif_id'] = $this->input->post('kilif_id');
					$formdan_gelen_bilgiler['ozellik'] = $this->input->post('ozellik');
					$formdan_gelen_bilgiler['adet'] = $this->input->post('adet');
					$formdan_gelen_bilgiler['numune'] = $this->input->post('numune');

					// Formdan gelen bilgiler database yazılmaya çalışıldı
					if($this->eleman_model->eleman_bilgilerini_database_yaz($formdan_gelen_bilgiler)) {
						// Eğer başarılı ise, database yazılan değerler ve dropdown'daki listeler databaseden çekilerek 
						// ekrana yazdırılır
						$eleman_ekle_basarili_verileri['eleman_kodu'] = $formdan_gelen_bilgiler['eleman_kodu'];
						$eleman_ekle_basarili_verileri['firma_ismi'] = $this->veri['firma_ismi'][$formdan_gelen_bilgiler['firma_id']];
						$eleman_ekle_basarili_verileri['eleman_turu'] = $this->veri['eleman_turu'][$formdan_gelen_bilgiler['eleman_turu_id']] ;
						$eleman_ekle_basarili_verileri['kilif'] = $this->veri['kilif_tipi'][$formdan_gelen_bilgiler['kilif_id']] ; 
						$eleman_ekle_basarili_verileri['ozellik'] = $formdan_gelen_bilgiler['ozellik'];
						$eleman_ekle_basarili_verileri['adet'] = $formdan_gelen_bilgiler['adet'];
						$eleman_ekle_basarili_verileri['numune'] = $formdan_gelen_bilgiler['numune']; 

						$this->load->view('arge/eleman/eleman_ekleme_basarili', $eleman_ekle_basarili_verileri);
					} else {
						// Hata sayfası yapılacak
						echo 'interval server error';
					}
			}
		}


		public function eleman_sil($eleman_id)
		{
			//sileceğimiz elemanı detaylı görmek istediğimiz elemanın bilgilerini eleman_id ile çekiyoruz
			$veri['tum_ayrinti_bilgiler'] = $this->eleman_model->tum_eleman_bilgilerini_goster($eleman_id);

			$this->load->view('arge/eleman/eleman_sil', $veri);
		}
		public function eleman_sil_onay($eleman_id)
		{
			if($this->eleman_model->eleman_sil($eleman_id)) {
				echo '<h2>Eleman silme işlemi başarılı</h2>';
				$this->output->set_header('refresh:5;url=../../eleman'); 
			} else {
				echo 'interval server error';
			}
		}




		/*
		* Database'de bulunan elemanlar yeterli gelmediğinde eleman türü eklemek için
		*/
		public function eleman_turu_ekle()
		{
			// ilk yüklemede form hatası olmadığı için boş yolluyoruz
			$veri['form_hatalari'] = '';

			// eleman_turu_ekle sayfamizi yükledik
			$this->load->view('arge/eleman/eleman_turu_ekle',$veri);
		}

		/**
		 * Eklediğimi eleman turunu konrol edip databe yazacaz..
		 */
		public function eleman_turu_ekle_kontrol()
		{
			// Eleman türü için kontrol edilecek kuralları yazdık..
			$this->form_validation->set_rules('eleman_turu', 'Eleman Türü', 'trim|required|min_length[2]|max_length[50]|xss_clean');

			// Kontrolü yapıyoruz
			if($this->form_validation->run() == FALSE) {
				// eğer formda hata varsa 	
			
				// hatalar form_hatalari değişkenine yüklendi
				$this->veri['form_hatalari'] =  validation_errors();
				$this->load->view('arge/eleman/eleman_turu_ekle', $this->veri);

			} else {
					// Herşey yolunda ise;

					// Formdan gelen bilgiler array içine yazıldı
					$formdan_gelen_bilgiler['eleman_turu'] = $this->input->post('eleman_turu');


					// Formdan gelen bilgiler database yazılmaya çalışıldı
					if($this->eleman_model->eleman_turu_bilgilerini_database_yaz($formdan_gelen_bilgiler['eleman_turu'])) {
						
						// Database içerisine başarılı bir şekilde yazdırıldıysa
						$this->load->view('arge/eleman/eleman_turu_ekle_basarili', $formdan_gelen_bilgiler);

					} else {
						// Hata sayfası yapılacak
						echo 'interval server error';
					}
			}

		}

		/**
		 * Databasedeki firmalar yeterli gelmediğinde yeni firma eklemek için
		 *
		 */
		public function firma_ekle()
		{
			// boş form hataları yüklemek için
			$veri['form_hatalari'] = '';

			// firma hataları sayfasını yükledik
 			$this->load->view('arge/eleman/firma_ekle', $veri);
		}

		public function firma_ekle_kontrol()
		{
			$this->form_validation->set_rules('firma_ismi', 'Firma Ismi', 'trim|required|min_length[2]|max_length[50]|xss_clean');
			$this->form_validation->set_rules('tel', 'Telefon', 'trim|required|min_length[2]|max_length[1000]|numeric|xss_clean');
			$this->form_validation->set_rules('mail', 'Mail', 'trim|required|min_length[1]|max_length[25]|xss_clean|valid_email');
			$this->form_validation->set_rules('adres', 'Adres', 'trim|required|min_length[2]|max_length[100]|xss_clean');

			if($this->form_validation->run() == FALSE) {
				// eğer formda hata varsa 
					
				// hatalar form_hatalari değişkenine yüklendi
				$this->veri['form_hatalari'] =  validation_errors();

				$this->load->view('arge/eleman/firma_ekle', $this->veri);

			} else {
					// Herşey yolunda gittiyse

					// Formdan gelen bilgiler array içine yazıldı
					$formdan_gelen_bilgiler['firma_ismi'] = $this->input->post('firma_ismi');
					$formdan_gelen_bilgiler['tel'] = $this->input->post('tel');
					$formdan_gelen_bilgiler['mail'] = $this->input->post('mail');
					$formdan_gelen_bilgiler['adres'] = $this->input->post('adres');

					// Formdan gelen bilgiler database yazılmaya çalışıldı
					if($this->eleman_model->firma_bilgilerini_database_yaz($formdan_gelen_bilgiler)) {

						// Database'e başarılı bir şekilde yazdırıldıysa..
						$this->load->view('arge/eleman/firma_ekle_basarili', $formdan_gelen_bilgiler);
					} else {
						// Hata sayfası yapılacak
						echo 'interval server error';
					}
			}
		}

		/*
		* Database'de bulunan kilif çeşiti yeterli gelmediğinde kilif tipi eklemek için
		*/

		public function kilif_ekle()
		{
			// ilk yüklemede form hatası olmadığı için boş yolluyoruz
			$veri['form_hatalari'] = '';

			// kilif_ekle sayfamizi yükledik
			$this->load->view('arge/eleman/kilif_ekle',$veri);
		}

		/**
		 * Eklediğimiz kilif turunu konrol edip databe yazacaz..
		 */
		public function kilif_ekle_kontrol()
		{
			// Eleman türü için kontrol edilecek kuralları yazdık..
			$this->form_validation->set_rules('kilif_tipi', 'Kılıf Tipi', 'trim|required|min_length[2]|max_length[30]|xss_clean');

			// Kontrolü yapıyoruz
			if($this->form_validation->run() == FALSE) {
				// eğer formda hata varsa 	
			
				// hatalar form_hatalari değişkenine yüklendi
				$this->veri['form_hatalari'] =  validation_errors();
				$this->load->view('arge/eleman/kilif_ekle', $this->veri);

			} else {
					// Herşey yolunda ise;

					// Formdan gelen bilgiler array içine yazıldı
					$formdan_gelen_bilgiler['kilif_tipi'] = $this->input->post('kilif_tipi');


					// Formdan gelen bilgiler database yazılmaya çalışıldı
					if($this->eleman_model->kilif_bilgilerini_database_yaz($formdan_gelen_bilgiler['kilif_tipi'])) {
						
						// Database içerisine başarılı bir şekilde yazdırıldıysa
						$this->load->view('arge/eleman/kilif_ekle_basarili', $formdan_gelen_bilgiler);

					} else {
						// Hata sayfası yapılacak
						echo 'interval server error';
					}
			}
		}
	}
/* End of the file: eleman.php */
/* Location: ./application/controllers/arge/eleman/ */