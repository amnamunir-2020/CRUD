<?php


//Database connection class

class Model{
	
	
	private $db_host='localhost';
    private $db_username='root';
    private $db_password='';
    private $db_name='admin_db';	
	private $conn;
	
	
	//Construct function for connection Db
	public function __construct(){
		
		$this->conn=new mysqli($this->db_host,$this->db_username,$this->db_password,$this->db_name);
		if($this->conn->connect_error){
			
			echo "Connection Failed!";
		}
		
		else{
			//echo "Connection Success!";
			return $this->conn;
			
		}
		
	}//constructor close
	
	
	
	
	//function insert record
	public function insertRecords($post){
		//echo "Insert Function Call";
		$name=$post['name'];
		$email=$post['email'];
		$sql="insert into user_tb(name,email) values('$name','$email')";
		$result=$this->conn->query($sql);
		if($result){
			
			header('Location:index.php?msg=ins');
		
			
		}
		else{
			echo "Error Not Inserted" .$sql ."<br>" .$this->conn->error;
			}
		
		
	}
	
	
	
	//Function Display Records
	public function displayRecords(){
		$sql="select * from user_tb";
		$result=$this->conn->query($sql);
		if($result->num_rows>0){
			while($row=$result->fetch_assoc()){
				
				$data[]=$row;                                 //data in array form
				 
			}//while close
			
			return $data;
			
		}//if close
	
	
	}
	
	
	//Function Data By id cause Edit
	public function dataFetchById($editid){
		$sql="select * from user_tb where id='$editid' ";
		$result=$this->conn->query($sql);
		if($result->num_rows==1){
			$row=$result->fetch_assoc();
			return $row;
		}
		
		
	}
	
	
	//Function Update
		public function updateRecords($post){
		
		$name=$post['name'];
		$email=$post['email'];
		$editid=$post['hide'];
		$sql="update user_tb set name='$name' , email='$email' where id='$editid'";
		$result=$this->conn->query($sql);
		if($result){
			
			header('Location:index.php?msg=upd');
		
			
		}
		else{
			echo "Error Not Inserted" .$sql ."<br>" .$this->conn->error;
			}
		
		
	}
	
	
	
	//Function Delete
	public function deleteRecords($delid){
		$sql="delete from user_tb where id=$delid";
		$result=$this->conn->query($sql);
		if($result){
			
			header('Location:index.php?msg=del');
		}
	else{
		 echo "Error" .$sql ."<br>" .$this->conn->error;
	}
	
	
	}
	
	
	
	
	
}//class close




















?>