	<?php

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
	class Giris_Model extends CI_Model
	{
		public function girisDatabaseKontrolu($veri)
	{	
		
	}

		public function kullanici_adi($kullanici_adi)
		{
			$this->db->select("kullanici_adi")->where("kullanici_adi = '$kullanici_adi'");
			$query = $this->db->get('kullanicilar');
			$databaseden_donen_kullanici_adi = $query->result();
			
			if($databaseden_donen_kullanici_adi){
				return $databaseden_donen_kullanici_adi[0]->kullanici_adi;
			} else {
				return false;
			}
		
		}	

		public function sifre($sifre)
		{
			$this->db->select("sifre")->where("sifre = '$sifre'");
			$query = $this->db->get('kullanicilar');
			$databaseden_donen_sifre = $query->result();
			
			if($databaseden_donen_sifre){
				return $databaseden_donen_sifre[0]->sifre;
			} else {
				return false;
			}
		}
		public function user_id($kullaniciadi_sifre)
		{
			$kullanici_adi = $kullaniciadi_sifre['kullanici_adi'] ;
			$sifre = $kullaniciadi_sifre['sifre'] ;

			$this->db->select("user_id")->where("kullanici_adi = '$kullanici_adi' AND sifre ='$sifre'");
			$query = $this->db->get('kullanicilar');
			$databaseden_donen_user_id = $query->result();

			if($databaseden_donen_user_id){
				return $databaseden_donen_user_id[0]->user_id;
			} else {
				return false;
			}
		}

		public function uyelik_turu($kullaniciadi_sifre)
		{
			$kullanici_adi = $kullaniciadi_sifre['kullanici_adi'] ;
			$sifre = $kullaniciadi_sifre['sifre'] ;

			$this->db->select("uyelik_turu")->where("kullanici_adi = '$kullanici_adi' AND sifre ='$sifre'");
			$query = $this->db->get('kullanicilar');
			$databaseden_donen_uyelik_turu = $query->result();

			if($databaseden_donen_uyelik_turu) {
				return $databaseden_donen_uyelik_turu[0]->uyelik_turu;
			} else {
				return false;
			}
			
		}

		public function kullaniciadi_sifre_kontrol($kullaniciadi_sifre)
		{
			$this->db->select("kullanici_adi, user_id")->
			where("kullanici_adi = '" . $kullaniciadi_sifre['kullanici_adi'] . "' AND sifre = '" . $kullaniciadi_sifre['sifre'] . "'" );
			$query = $this->db->get('kullanicilar');
			$databaseden_donen_kullaniciadi_sifre = $query->result();

			if($databaseden_donen_kullaniciadi_sifre) {
				return true;
			} else {
				return false;
			}

		}
}

	