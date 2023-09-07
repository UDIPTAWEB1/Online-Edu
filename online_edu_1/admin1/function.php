<?php
class connection{
	protected $con;
	function __construct()
	{
		$this->con=mysqli_connect("localhost","root","");
		mysqli_select_db($this->con,'online_edu') or die(mysqli_error($this->con));
	}
}
	class Helper extends connection{
	private $table;

	// Inserting data into a table
	public function insert_data($data_Array){
		$this->table=$data_Array['table_name'];
		return $this->save_data($data_Array[0]);
	}

	private function save_data($data){
		$sql="INSERT INTO `".$this->table."`(";
		$sql1="(";
		$i=0;
		foreach($data as $field=>$val){
			if($i>0){
			$sql.=",";
			$sql1.=",";
			}
			if(is_array($val)){
				$sql.="`".$field."`";
				$sql1.="'".implode(",",$val)."'";
			}
			else{
				$sql.="`".$field."`";
				$sql1.="'".$val."'";
			}
			$i++;
		}
		$sql.=") VALUES ".$sql1.")";
		$res=mysqli_query($this->con,$sql) or die(mysqli_error($this->con));
		return $res;
		}
		public function view_data($data_Array){
		$this->table=$data_Array['table_name'];
		$src="SELECT * FROM `".$this->table."`";
		$rs=mysqli_query($this->con,$src) or die(mysqli_error($this->con));
		return $rs;
	}
	public function delete_rec($data_Array){
		$this->table=$data_Array['table_name'];
		$del="DELETE FROM `".$this->table."` WHERE `tid`=".$data_Array[0]['id'];
		$res=mysqli_query($this->con,$del) or die(mysqli_error($this->con));
		return $res;
	}
	// Searching Record
	public function search_data($data_Array){
		$this->table=$data_Array['table_name'];
		//print_r($data_Array);
		$src="SELECT * FROM `".$this->table."`";
		$src1="WHERE ";
		$i=0;
		foreach($data_Array[0] as $field=>$val){
			if($i>0){
				$src1.=" AND ";
			}
			$src1.="`".$field."`='".$val."'";
			$i++;
		}
		$src.=$src1;
		$rs=mysqli_query($this->con,$src) or die(mysqli_error($this->con));
		return $rs;
	}
public function update_data($data_Array){
		$this->table=$data_Array['table_name'];
		return $this->save_changes($data_Array);

	}
	private function save_changes($data){
		$upd="UPDATE `".$this->table."` SET ";
		$i=0;
		foreach($data[0] as $field=>$val){
			if($i>0){
				$upd.=", ";
			}
			$upd.="`".$field."`= '".$val."'";
			$i++;
		}
		end($data[1]);
		$attr=key($data[1]);
		$upd.=" WHERE `".$attr."`=".$data[1][$attr];
		$res=mysqli_query($this
			->con,$upd) or die(mysqli_error($this->con));
		return $res;

	}
	public function type1($data_array){
		$sql="SELECT tname FROM type order by tname";
		$res=mysqli_query($this
			->con,$sql) or die(mysqli_error($this->con));
		return $res;
	}
	public function find_approve_document(){
		$src=mysqli_query($this->con,"SELECT d.*, u.fname, u.lname ,t.tname, app.status, dw.nofd FROM document d INNER JOIN user u ON d.uid=u.uid INNER JOIN approve app ON d.did=app.did INNER JOIN type t ON d.tid=t.tid INNER JOIN download dw ON d.did=dw.did  WHERE app.status='Y'") or die(mysqli_error($this->con));
		return $src;		
	}
	public function find_suspended_document(){
		$src=mysqli_query($this->con,"SELECT d.*, u.fname, u.lname ,t.tname, app.status FROM document d INNER JOIN user u ON d.uid=u.uid INNER JOIN approve app ON d.did=app.did INNER JOIN type t ON d.tid=t.tid WHERE app.status='S'") or die(mysqli_error($this->con));
		return $src;
	}
	
	public function find_new_document(){
		$src=mysqli_query($this->con,"SELECT d.*, u.fname, u.lname ,t.tname, app.status FROM document d INNER JOIN user u ON d.uid=u.uid INNER JOIN approve app ON d.did=app.did INNER JOIN type t ON d.tid=t.tid WHERE app.status='N'") or die(mysqli_error($this->con));
		return $src;
	}
}
?>