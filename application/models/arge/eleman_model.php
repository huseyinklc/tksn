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
									'numune'=>$gelen_bilgi['numune']
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
	}
/* End of the file: eleman_model.php */
/* Location: ./application/models/arge/ */