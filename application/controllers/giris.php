<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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

			if($this->giris_model->kullanici_bilgileri_databaseden_cekme($veri) ) {
				$kullanici_bilgileri = $this->giris_model->kullanici_bilgileri_databaseden_cekme($veri);
			} else {
				$kullanici_bilgileri = '';
			}
	 		
	 		
	 		// uyelik turu fonksiyon yardimi ile çekildi..
		 	$uyelik_turu = $this->uyelik_turu($kullanici_bilgileri);		 	

		 	// uyelik turune göre anasayfaya yonlendirdi
		 	$this->uyelik_turune_gore_session_set_et($uyelik_turu); 	
		}
	}

	
	public function uyelik_turu($kullanici_bilgileri)
	{
		
		if($kullanici_bilgileri) {	
			return $kullanici_bilgileri[0]->uyelik_turu;
		} else {
			return false;
		}
	}

	public function uyelik_turune_gore_session_set_et($uyelik_turu)
	{
		
		switch ($uyelik_turu) {
			case 1:
				$uyelik_turu_sesion = array('uyelik_turu'=>'1');
				$this->session->set_userdata($uyelik_turu_sesion);
				redirect('root/root_index', 'refresh');
				break;
			case 2: 
				$uyelik_turu_sesion = array('uyelik_turu'=>'2');
				$this->session->set_userdata($uyelik_turu_sesion);
				redirect('arge/proje', 'refresh');
				break;
			case 3:
				$uyelik_turu_sesion = array('uyelik_turu'=>'3');
				$this->session->set_userdata($uyelik_turu_sesion);
				redirect('depo/depo_index', 'refresh');
				break;
			default:
				$veri['form_hatasi'] = 'Girilen Kullanıcı Adı Sistemde Bulunamadı!..';
				$this->load->view('giris',$veri);
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
		$this->load->view('../giris');
	}
} 