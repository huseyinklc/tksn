<?php

	class Arge_Index extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
		}
		public function index()
		{
			$this->load->view('arge/arge_index');
		}
	}