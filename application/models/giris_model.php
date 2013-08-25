	<?php

	class Giris_Model extends CI_Model
	{
	

		/**
		 * [kullanici_bilgileri_databaseden_cekme description
		 *
		 * Burdaki fonksiyona giris_database_kontrolu fonksiyonundan array biçiminde kullanıcı adı ve şifre alınıp tüm değerler çekiliyor..
		 *
		 * 
		 * @param  [array] $kullaniciadi_sifre [kullanıcının girdigi kullanıcı adi ve sifre]
		 * @return [array]                      [kullanici ile ilgili tum bilgiler]
		 */
		public function kullanici_bilgileri_databaseden_cekme($kullaniciadi_sifre)
		{
			print_r($kullaniciadi_sifre);
			$this->db->select("*")->
			where("kullanici_adi = '" . $kullaniciadi_sifre['kullanici_adi'] . "' AND sifre = '" . $kullaniciadi_sifre['sifre'] . "'" );
			$query = $this->db->get('kullanicilar');
			$databaseden_donen_bilgiler = $query->result();

			print_r($databaseden_donen_bilgiler);

			return $databaseden_donen_bilgiler;

		}
}

	