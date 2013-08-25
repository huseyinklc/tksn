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
	}
/* End of the file: eleman_model.php */
/* Location: ./application/models/arge/ */