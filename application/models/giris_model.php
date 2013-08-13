	<?php

	/** Kullanıcıların databasede olup olmadığını kontrol ediyoruz
	 * 
	 * Formdan gelen kullanıcı adı ve şifre controller kısmından çekiliyor
	 * 
	 * 
	 * 
	 * 
	 * @param  array $veri kullanıcı_adı ve sifre key'lerine sahip
	 * @return [type]       [description]
	 */
	class Giris_Model extends CI_Model
	{
		public function giris_Database_Kontrolu($veri)
	{	
			
	}



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
			$this->db->select("*")->
			where("kullanici_adi = '" . $kullaniciadi_sifre['kullanici_adi'] . "' AND sifre = '" . $kullaniciadi_sifre['sifre'] . "'" );
			$query = $this->db->get('kullanicilar');
			$databaseden_donen_bilgiler = $query->result();

			if($databaseden_donen_bilgiler) {
				return $databaseden_donen_bilgiler;
			} else {
				return false;
			}

		}
}

	