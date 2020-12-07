<?php 

	Class Database{

		private $server = "localhost";
		private $username = "root";
		private $password;
		private $db;
		private $conn;

		public function __construct($database){
			
			try {
				$this->db=$database;
				$this->conn = new mysqli($this->server,$this->username,$this->password,$this->db);
			} catch (Exception $e) {
				echo "connection failed" . $e->getMessage();
			}
		}

		public function insert($table, $data){


			$query = "INSERT INTO $table (naziv,sastojci,vremePripreme,tip) VALUES ('$data[naziv]','$data[sastojci]','$data[vremePripreme]','$data[tip]')";
			
			if ($sql = $this->conn->query($query)) {
				echo "<script>alert('recept je dodat');</script>";
				echo "<script>window.location.href = 'recepti2.php';</script>";
			}else{
				echo "<script>alert('failed');</script>";
				echo "<script>window.location.href = 'recepti2.php';</script>";
			}

		}           

		public function fetch(){
			$data = null;

			$query = "SELECT * , r.nazivKategorije FROM kolaci k LEFT JOIN kategorija r on (k.tip=r.tipID)
                       GROUP BY k.id  
                       ORDER BY id DESC";
			if ($sql = $this->conn->query($query)) {
				while ($row = mysqli_fetch_assoc($sql)) {
					$data[] = $row;
				}
			}
			return $data;
		}

		public function delete($table, $id, $id_value){

			$query="DELETE FROM $table WHERE $table.$id=$id_value";
			if ($sql = $this->conn->query($query)) {
				return true;
			}else{
				return false;
            }
            
        }
    

		public function edit($table, $id){

			$data = null;

			$query = "SELECT * FROM $table WHERE id = '$id'";
			if ($sql = $this->conn->query($query)) {
				while($row = $sql->fetch_assoc()){
					$data = $row;
				}
			}
			return $data;
		}

		public function update($table, $data){

			$query = "UPDATE $table SET naziv='$data[naziv]', sastojci='$data[sastojci]', vremePripreme='$data[vremePripreme]', tip='$data[tip]' WHERE id='$data[id] '";

			if ($sql = $this->conn->query($query)) {
				return true;
			}else{
				return false;
			}
		}
	}

 ?>