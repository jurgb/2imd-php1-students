<?php
		// De klasse blogpost
		include_once("Db.class.php");
		class blogpost
		{
			private $m_sTitle;
			private $m_sMessage;
			

			public function __set($p_sProperty,$p_vValue)
			{
				switch ($p_sProperty) 
				{
					case 'Title':
						$this->m_sTitle = $p_vValue;
						break;
					case 'Message':
						$this->m_sMessage = $p_vValue;
						break;
				}

			}


			public function __get($p_sProperty)
			{
				switch ($p_sProperty) 
				{
					case 'Title':
						return $this->m_sTitle;
						break;
					case 'Message':
						return $this->m_sMessage;
						break;
				}
			}

			public function __toString()
			{
				$result = "<p>" . $this->m_sTitle . " " . $this->m_sMessage . "</p>";
				return	$result;
			}

			public function Save()
			{
				
				$db = new Db();
				$sql = "insert into tblBlogpost (Title, Message)
							values(
								'". $db->conn->real_escape_string($this->m_sTitle) ."',
								'". $db->conn->real_escape_string($this->m_sMessage) ."'
								)";
				$db->conn->query($sql);
			}

			public function Load()
			{
				$db = new Db();
				$sql = "select * from tblBlogpost";
				$result = $db->conn->query($sql);
				return $result;
			}
		}
?>