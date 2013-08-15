<?php

	class proje_ekle_model extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}

		function proje_ekledeki_bilgileri_database_aktarma($formdan_suzulen_veriler)
		{	
			$proje_ismi = $formdan_suzulen_veriler['proje_ismi'];
			$proje_tanimi = $formdan_suzulen_veriler['kisa_proje_tanimi'];
			$proje_resmi = $formdan_suzulen_veriler['upload_edilen_resmin_ismi'];


			$database_eklenecek_veriler = array('proje_ismi'=>"$proje_ismi",'proje_resmi'=>"$proje_resmi", 'proje_tanimi'=>"$proje_tanimi");
			if ($this->db->insert('proje', $database_eklenecek_veriler)) {
				return true;
			}

		}

	}
