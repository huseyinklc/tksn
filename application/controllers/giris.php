<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
echo 	'<meta charset="utf-8">';
class giris extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('giris_model');
	}
	/** Giriş sayfası 
	 * 
	 * Codeigniter'ın ilk sayfası olarak giriş sayfası açılır ve
	 * kullanıcıların giriş yapması istenir..
	 * 
	 * @return olarak girilen değerler views/girişten formKontrolüne alınır.
	 */
	public function index()
	{
		$veri['form_hatasi'] = '';

		$this->load->view('giris',$veri);
	}

	/** Giriş sayfasındaki form değerlerini kontrol edilmesi
	 *
	 * Girilen form değerleri için şu kontroller yapılır, kullanıcı adı için kullanıcı girilmeli, en az 4 karakter, en fazla 15 karakter, harf ve sayı olabilir, xss olmayacak şekilde
	 * şifre için şifre girilmeli, en az 4 karakter, en fazla 15 karakter, harf ve sayı olabilir, xss olmayacak şekilde
	 * 
	 *  HATA YAPILIRSA TEKRAR ANA SAFYAYA YÖNLENDIRILMELI, EĞER HATA YOK İSE DATABASE'DEN SORGULAR ÇEKİLEREK KULLANICI ADI VE ŞİFRE KONTROL EDİLMELİ
	 */
	public function formKontrolu()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('kadi', 'Kullanıcı Adı', 'required|max_length[15]|min_length[4]|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('sifre', 'Şifre', 'required|max_length[15]|min_length[4]|alpha_numeric|xss_clean');

		// Form değerleri kontrol ediliyor
		if($this->form_validation->run() == FALSE){

			$veri['form_hatasi'] =  validation_errors();
			$this->load->view('giris', $veri);

		} else {

			// Post metodu ile kullanıcı adı ve şifre çekildi..
			$veri['kullanici_adi'] = $this->input->post('kadi');
			$veri['sifre'] = $this->input->post('sifre');

			// Doğrulanmış veriler post metodu ile veri array'i ile
			// girisDatabaseKontrolu fonksiyonuna yollandı..
		 	$this->giris_model->girisDatabaseKontrolu($veri);
		}
	}


	public function anaSayfayaYonlendir()
	{
		$gecici_array = $this->session->all_userdata();
		$user_id = $gecici_array['user_id'];

		print_r($gecici_array);
		switch ($user_id) {
			case 1:
				$this->load->view('root_index');
				break;
			case 2: 
				$this->load->view('arge_index');
				break;
			case 3:
				$this->load->view('depo_index');
				break;
			default:
				// burası için hata sayfası yapılacak...
				break;
		} 
	}
	
	/** Çıkış
	 *
	 *
	 * bu fonksiyon çağırılarak, session'lar sıfırlanıyor, daha sonra giriş sayfası 
	 * 
	 * yükleniyor, bu daha sonra refactoring yapılarak başka class sayfasına aktarılabilir!!!
	 * 
	 * @return cikis sayfası yuklenecek
	 */
	public function cikis()
	{
		$this->session->sess_destroy();
		$this->load->view('giris');
	}
} 