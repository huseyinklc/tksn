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
			$data = array();

			// Eleman türü sayfamızdaki tüm verileri çektik
			$query = $this->db->get('eleman_turu');

			// Sorgumuzdaki değerleri array içine attık
			$eleman_turu = $query->result_array();
			
			// Dropdown liste
			foreach ($eleman_turu as $eleman) {
				$data[$eleman['id']] = $eleman['eleman_turu'];
			}
			return $data;
		}
	}
/* End of the file: eleman_model.php */
/* Location: ./application/models/arge/ */