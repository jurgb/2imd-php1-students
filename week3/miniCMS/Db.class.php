<?php
	class Db
	{
		private $m_sHost = "localhost";
		private $m_sUser = "jurgb";
		private $m_sPassword = "1308JuBa";
		private $m_sDatabase = "php1";
		public $conn;


		public function __construct()
		{
			$this->conn = new mysqli($this->m_sHost, $this->m_sUser, $this->m_sPassword, $this->m_sDatabase);
		}
	}
?>