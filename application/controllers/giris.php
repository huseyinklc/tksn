<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
echo 	'<meta charset="utf-8">';
class giris extends CI_Controller
{
	/** Giriş sayfası 
	 * 
	 * Codeigniter'ın ilk sayfası olarak giriş sayfası açılır ve
	 * kullanıcıların giriş yapması istenir..
	 * 
	 * @return olarak girilen değerler views/girişten formKontrolüne alınır.
	 */
	public function index()
	{

		$this->load->view('giris');

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
			echo validation_errors();
		} else {

			// Post metodu ile kullanıcı adı ve şifre çekildi..
			$veri['kullanici_adi'] = $this->input->post('kadi');
			$veri['sifre'] = $this->input->post('sifre');

			// Doğrulanmış veriler post metodu ile veri array'i ile
			// girisDatabaseKontrolu fonksiyonuna yollandı..
		 	$this->girisDatabaseKontrolu($veri);
		}
	}

	/** Form ile girilen değerlerin database'de olup olmadığını kontrol ediyoruz..
	 * 
	 * 
	 * 
	 * iki kere database seçmemizin amacı count_all_result metodunu çağırdığımız zaman
	 * sonuç döndürdüğü için database sorgumuzu sıfırlıyorlar ve ikinci sorguda sanki 
	 * select * yapılmış gibi sonuç veriyor..
	 * Bunu iki kez yapmak ile DRY kuralını ihlal etmiş bulunuyoruz. 
	 * Bu database bağlantıları fonsiyona aktarılarak DRY kuralı ihlal edilmemeli !
	 * 
	 * 
	 * @param  array $veri kullanıcı_adı ve sifre key'lerine sahip
	 * @return [type]       [description]
	 */
	public function girisDatabaseKontrolu($veri)
	{
		// kullaanıcı adı ve user_id değerlerini session'da tutmak için session kütüphanesini yüklüyoruz
		// daha sonra bunları ayrı bir fonksiyona atıp, refactoring yapmak gerekiyor, ya da autoload kullanmak gerek..
		$this->load->library('session');

		// Girilen kullanıcı adı ve veritabanındaki kullanıcı adı 
		// ve şifrenin uyuşup uyuşmadığı kontrol ediliyor
		$this->db->select("kullanici_adi, sifre")->
		where("kullanici_adi = '" . $veri['kullanici_adi'] . "' AND sifre = '" . $veri['sifre'] . "'" );
	
		// Eğer girdiğimiz sorgunun sonuçları 1 ise kullanıcı adı ve şifre tutuyor demektir..
		if($this->db->count_all_results('kullanicilar') == 1){
			// Tekrar aynı sorguyu soruyoruz, çünkü count_all_results sıfırlıyor..
			$this->db->select("kullanici_adi, user_id")->
			where("kullanici_adi = '" . $veri['kullanici_adi'] . "' AND sifre = '" . $veri['sifre'] . "'" );
			
			// sorguyu row array'ine çektik...
			$query = $this->db->get('kullanicilar');
			$row = $query->result();

			// Kullanıcı adı ve şifreyi array'e atıyoruz
			 $session['user_id'] =   $row[0]->user_id;
			 $session['kullanici_adi'] = $row[0]->kullanici_adi;

			 //array'e attığımız dosyaları sessionda kullanıyoruz..
			 $this->session->set_userdata($session);
			
			// Session değerine göre ana sayfaya yönlendiriyoruz..
			$this->anaSayfayaYonlendir();	 	
			
		} else {
			echo 'Kullanıcı Adı ve ya şifre Yanlış';
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