<?php

	class proje_model extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function proje_ekledeki_bilgileri_database_aktarma($formdan_suzulen_veriler)
		{	
			// formdan gelen kontrol edilmiş array biçimindeki değişkenler ayrıştırılıyor
			$proje_ismi = $formdan_suzulen_veriler['proje_ismi'];
			$proje_tanimi = $formdan_suzulen_veriler['proje_tanimi'];
			$proje_resmi = $formdan_suzulen_veriler['proje_resmi'];

			// database eklenecek bilgiler array içerisine aktarılıyor
			$database_eklenecek_veriler = array('proje_ismi'=>"$proje_ismi",'proje_resmi'=>"$proje_resmi", 'proje_tanimi'=>"$proje_tanimi");
			
			// database insert etme işlemi başarılı ise true döndürüyoruz
			if ($this->db->insert('proje', $database_eklenecek_veriler)) {
				return true;
			}

		}

		public function proje_resmi_upload_ozellikleri()
		{
			$proje_resmi_upload_ozellikleri['upload_path'] = './asset/image/proje_resimleri/';
			$proje_resmi_upload_ozellikleri['allowed_types'] = 'gif|jpg|png|jpeg';
			$proje_resmi_upload_ozellikleri['max_size']	= '2048';
			$proje_resmi_upload_ozellikleri['max_width']  = '1024';
			$proje_resmi_upload_ozellikleri['max_height']  = '768';

			return $proje_resmi_upload_ozellikleri;
		}

		/**
		 * proje_goster sayfası için liste biçiminde gösterebilmek için proje_id ve proje_ismi çekildi
		 * 
		 */
		public function proje_liste_bilgileri()
		{
			// proje_id ve proje_ismi seçildi
			$this->db->select('proje_id, proje_ismi');

			// proje tablosundan seçildi
			$query = $this->db->get('proje');

			// sonuçlar geri döndürüldü
			return $query->result();
		}

		/**
		 * Proje tablosundaki tüm bilgileri databaseden çekiyoruz..
		 * @return array proje bilgilerini array içine atıyoruz..
		 */
		public function proje_bilgilerini_databaseden_cek()
		{
			$query =  $this->db->get('proje');

			return $query->result();
		}


		public function proje_detay($proje_id)
		{
			$this->db->where('proje_id', $proje_id);
			$query = $this->db->get('proje');


			return $query->result();
		}

		public function maksimum_id(){
			$this->db->select_max('proje_id');
			$query = $this->db->get('proje');

			return $query->result();
		}

		/**
		 * fonksiyona verilen proje_id değerindeki proje databaseden silinecek!!
		 * @param  int $proje_id silinecek proje_id numarası
		 * @return bool eğer başarılı ise true değeri...
		 */
		public function proje_sil($proje_id)
		{
			return	$this->db->delete('proje', array('proje_id' => $proje_id));
		}
	}
