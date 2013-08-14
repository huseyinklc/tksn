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
			$kisa_proje_tanimi = $formdan_suzulen_veriler['kisa_proje_tanimi'];
			$eklenen_resmin_ismi = $formdan_suzulen_veriler['upload_edilen_resmin_ismi'];

			

		}

	}
