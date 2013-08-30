<?php
	class Eleman_Model extends CI_Model
	{
		public function __construct()
		{
			// Framework parent constructor
			parent::__construct();
		}

	
		/**
		 * Databaseden eleman türleri çekilip, dropdown liste konulacak şekilde array içine atıldı
		 * @return [type] [description]
		 */
		public function eleman_turu()
		{
			// Eleman türlerini atabilmek için gerekli olan boş array tanımladık
			$donen_eleman_turu = array();

			// Eleman türü sayfamızdaki tüm verileri çektik
			$query = $this->db->get('eleman_turu');

			// Sorgumuzdaki değerleri array içine attık
			$eleman_turu = $query->result_array();
			
			// Dropdown liste için array içine atıldı
			foreach ($eleman_turu as $eleman) {
				$donen_eleman_turu[$eleman['id']] = $eleman['eleman_turu'];
			}
			return $donen_eleman_turu;
		}

		/**
		 * Databaseden firma ismi çekilip, dropdown liste konulacak şekilde array içine atıldı
		 * @return [type] [description]
		 */
		public function firma_ismi()
		{
			// Firma ismini atabilmek için gerekli olan boş array tanımladık
			$donen_firma_ismi = array();

			// Firma ismi database sayfamızdaki tüm verileri çektik
			$query = $this->db->get('firma');

			// Sorgumuzdaki değerleri array içine attık
			$firma = $query->result_array();
			
			// Dropdown liste için arraye atıldı
			foreach ($firma as $firma) {
				$donen_firma_ismi[$firma['firma_id']] = $firma['firma_ismi'];
			}
			return $donen_firma_ismi;
		}

		/**
		 * Databaseden kilif tiplerini çekilip, dropdown liste konulacak şekilde array içine atıldı
		 * @return [type] [description]
		 */
		public function kilif_tipi()
		{
			// Kilif_ismi değerlerini atabilmek için gerekli olan boş array tanımladık
			$donen_kilif_tipi = array();

			// Kilif ismi sayfamızdaki tüm verileri çektik
			$query = $this->db->get('kilif');

			// Sorgumuzdaki değerleri array içine attık
			$kilif = $query->result_array();
			
			// Dropdown liste için arraye atıldı
			foreach ($kilif as $kilif) {
				$donen_kilif_tipi[$kilif['id']] = $kilif['kilif_tipi'];
			}
			return $donen_kilif_tipi;
		}

		/**
		 * Databaseden eleman türleri çekilip, dropdown liste konulacak şekilde array içine atıldı
		 * @return [type] [description]
		 */
		public function eleman_saklama_durumu()
		{
			// Eleman saklama durumunu atabilmek için gerekli olan boş array tanımladık
			$donen_eleman_saklama_durumu = array();

			// Eleman saklama durumu sayfamızdaki tüm verileri çektik
			$query = $this->db->get('eleman_saklama_durumu');

			// Sorgumuzdaki değerleri array içine attık
			$eleman_saklama_durumu = $query->result_array();
			
			// Dropdown liste için array içine atıldı
			foreach ($eleman_saklama_durumu as $eleman) {
				$donen_eleman_saklama_durumu[$eleman['eleman_saklama_durumu_id']] = $eleman['eleman_saklama_durumu'];
			}
			return $donen_eleman_saklama_durumu;
		}

		/**
		 * Formdan almış olduğumz değerleri database ekliyoruz
		 * @param array $formdan_gelen_bilgiler
		 * @return boolean
		 */
		public function eleman_bilgilerini_database_yaz($gelen_bilgi)
		{
			$eklenecek_veri = array(
									'eleman_kodu'=>$gelen_bilgi['eleman_kodu'], 'firma_id'=>$gelen_bilgi['firma_id'],
									'eleman_turu_id'=>$gelen_bilgi['eleman_turu_id'], 'kilif_id'=>$gelen_bilgi['kilif_id'],
									'ozellik'=>$gelen_bilgi['ozellik'], 'adet'=>$gelen_bilgi['adet'],
									'numune'=>$gelen_bilgi['numune'], 'eleman_saklama_durumu_id'=>$gelen_bilgi['eleman_saklama_durumu_id'],
									'depo_adet'=>$gelen_bilgi['depo_adet'], 'arge_adet'=>$gelen_bilgi['arge_adet']
									);

			if($this->db->insert('eleman', $eklenecek_veri)) {
				return true;
			}
			
		}
		/**
		 * Dropdown menüden girilen bilgiler, eleman_ekle_başarılı_sayfası için tekrar çekildi
		 * 
		 */
		public function firmaid_ismi($firma_id)
		{
			$this->db->select('firma_ismi');
			$this->db->where('firma_id', $firma_id);
			$query = $this->db->get('firma');
			return $query->result_array()[0]['firma_ismi'];
		}

		public function elemanid_turu($eleman_turu_id)
		{
			$this->db->select('eleman_turu');
			$this->db->where('id', $eleman_turu_id);
			$query = $this->db->get('eleman_turu');
			return $query->result_array()[0]['eleman_turu'];
		}

		public function kilifid_turu($kilif_turu_id)
		{
			$this->db->select('kilif_tipi');
			$this->db->where('id', $kilif_turu_id);
			$query = $this->db->get('kilif');
			return $query->result_array()[0]['kilif_tipi'];
		}



		/**
		 * Formdan gelen bilgiyi database içerisine yazmaya çalışıyoruz
		 * 
		 * @return boolean Sorgu başarılı bir şekilde database içerisine yazılmışsa true döndürüyor
		 */
		public function eleman_turu_bilgilerini_database_yaz($eleman_turu)
		{
			$this->db->set('eleman_turu', $eleman_turu);
			if($this->db->insert('eleman_turu')) {
				return true;
			}
		}

		/**
		 * Formdan gelen bilgiyi database içerisine yazmaya çalışıyoruz
		 * 
		 * @return boolean Sorgu başarılı bir şekilde database içerisine yazılmışsa true döndürüyor
		 */
		public function firma_bilgilerini_database_yaz($firma_bilgileri)
		{
			$eklenecek_veri = array(
									'firma_ismi'=>$firma_bilgileri['firma_ismi'], 'tel'=>$firma_bilgileri['tel'],
									'mail'=>$firma_bilgileri['mail'], 'adres'=>$firma_bilgileri['adres']
									);

			if($this->db->insert('firma', $eklenecek_veri)) {
				return true;
			}
		}

		/**
		 * Formdan gelen bilgiyi database içerisine yazmaya çalışıyoruz
		 * 
		 * @return boolean Sorgu başarılı bir şekilde database içerisine yazılmışsa true döndürüyor
		 */
		public function kilif_bilgilerini_database_yaz($kilif)
		{
			$this->db->set('kilif_tipi', $kilif);
			if($this->db->insert('kilif')) {
				return true;
			}
		}

		public function eleman_bilgilerini_goster()
		{
			$this->db->select('eleman_id,firma_ismi, eleman_kodu, eleman_turu, kilif_tipi, arge_adet, depo_adet, numune_mi, eleman_saklama_durumu');
			$this->db->from('eleman');
			$this->db->join('firma', 'eleman.firma_id = firma.firma_id');
			$this->db->join('eleman_turu', 'eleman.eleman_turu_id = eleman_turu.id');
			$this->db->join('kilif', 'eleman.kilif_id = kilif.id');
			$this->db->join('numune', 'eleman.numune = numune.numune');
			$this->db->join('eleman_saklama_durumu', 'eleman.eleman_saklama_durumu_id = eleman_saklama_durumu.eleman_saklama_durumu_id');


			$query = $this->db->get();
			return $query->result();
		}

		public function degistirilecek_eleman_bilgilerini_goster($eleman_id)
		{
			$this->db->where('eleman_id', $eleman_id);
			$query = $this->db->get('eleman');
			return $query->result();
		}

		public function eleman_bilgilerini_degistir($eleman_bilgileri)
		{

			$eklenecek_veri = array(
									'eleman_kodu'=>$eleman_bilgileri['eleman_kodu'], 'firma_id'=>$eleman_bilgileri['firma_id'],
									'eleman_turu_id'=>$eleman_bilgileri['eleman_turu_id'], 'kilif_id'=>$eleman_bilgileri['kilif_id'],
									'ozellik'=>$eleman_bilgileri['ozellik'], 'adet'=>$eleman_bilgileri['adet'],
									'numune'=>$eleman_bilgileri['numune']
									);

			$this->db->where('eleman_id', $eleman_bilgileri['eleman_id']);
 			
 			if($this->db->update('eleman', $eklenecek_veri)) {
 				return true;
 			}	
		}

		public function eleman_sil($eleman_id){
			
			return	$this->db->delete('eleman', array('eleman_id' => $eleman_id));
		}

		public function tum_eleman_bilgilerini_goster($eleman_id)
		{
			$this->db->select('eleman_id,firma_ismi, eleman_kodu, eleman_turu, kilif_tipi, arge_adet, depo_adet, numune_mi, eleman_saklama_durumu, ozellik');
			$this->db->from('eleman');
			$this->db->join('firma', 'eleman.firma_id = firma.firma_id');
			$this->db->join('eleman_turu', 'eleman.eleman_turu_id = eleman_turu.id');
			$this->db->join('kilif', 'eleman.kilif_id = kilif.id');
			$this->db->join('numune', 'eleman.numune = numune.numune');
			$this->db->join('eleman_saklama_durumu', 'eleman.eleman_saklama_durumu_id = eleman_saklama_durumu.eleman_saklama_durumu_id');
			$this->db->where('eleman_id', $eleman_id);


			$query = $this->db->get();
			return $query->result();
		}

		/**
		 * Database içerisinde bulunan projeleri göstermesi için, normalde proje_model 
		 * içerisinde yapmak daha doğru olsada, proje_model i import etmek istemiyorum..
		 * 
		 * @return array proje_bilgileri proje_id ve proje_ismi ni database yardımı ile çekiyoruz...
		 */
		public function proje_goster()
		{
			// foreach dongusunde kullanmak için boş array tanımladık
			$donen_proje_bilgileri = array();

			// databaseden sadece proje_id ve proje_ismi seçildi
			$this->db->select('proje_id, proje_ismi');

			// proje tablosundanda veriler alındı
			$query = $this->db->get('proje');

			// Sorgumuzdaki değerleri array içine attık
			$proje_isimleri = $query->result_array();

			// Dropdown liste için arraye atıldı
			foreach ($proje_isimleri as $proje) {
				$donen_proje_bilgileri[$proje['proje_id']] = $proje['proje_ismi'];
			}

			return $donen_proje_bilgileri;
		}
	} // Class sonu
/* End of the file: eleman_model.php */
/* Location: ./application/models/arge/ */