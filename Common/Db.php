<?php

namespace Common;

use PDO;
Class Db
{
	public $db;
	public $column;
	public $tablename;
	public $where;
	public $result;
	public $save;
	public  function connect()
	{
		try{
			$dsn = config("DB_TYPE").":host=".config("DB_HOST").";dbname=".config("DB_NAME");
			$user = config("DB_USER");
			$pwd = config("DB_PASSWORD");
			$this->db = new PDO($dsn,$user,$pwd);
			return $this->db;
		}catch(\PDOException $e){
			echo "connection failed reason ".$e->getMessage();die;
		}
		
	}
	//设置要查找的列
	public function Col($columns = [])
	{
		if(empty($columns)){
			$this->column = "*";
		}else{
			$str = implode(',', $columns);
			$this->column = $str;
		}

		return $this;
	}
	//设置查找的条件
	public function where($key = 1 ,$prepare = "=",$value = 1)
	{
		$this->where = $key.$prepare."'$value'";

		return $this;
	}

	//设置要查找的表名

	public function table($tablename)
	{
		$this->tablename = $tablename;

		return $this;
	}


	//单条获取
	public function get()
	{
		$sql = "select ".$this->column." from ".$this->tablename." where ".$this->where;
	//	dd($sql);
	//	$this->result = $this->db->query($sql);
		$res = $this->db->query($sql)->fetch();

		return $res;
	}

	//多条获取
	public function select()
	{
		$sql = "select ".$this->column." from ".$this->tablename." where ".$this->where;
	//	$this->result = $this->db->query($sql);
		$res = $this->db->query($sql)->fetchAll();

		return $res;
	}


	//删除操作

	public function del()
	{
		$sql = "delete from ".$this->tablename." where ".$this->where;

		$res = $this->db->exec($sql);

		return $res;
	}


	public function delAll()
	{

	}

	public function save()
	{
		$sql = "update ".$this->tablename." set ".$this->save." where ".$this->where ;

		$re = $this->db->exec($sql);

		return $re;
	}

	public function insert($arr)
	{
		$keys = '';
		$values = '';
		foreach ($arr as $key => $value) {
			$keys .= ",".$key;
			$values .=",'".$value."'";
		}
		$key = substr($keys,1);
		$value = substr($values,1);
		$sql = "insert into ".$this->tablename." (".$key.") values (".$value.")";
		$re = $this->db->exec($sql);

		return $re;
	}


	public function insertAll()
	{
		
	}


	public function savedata($data){
		$str = '';
		foreach ($data as $key => $value) {
			$str .=",".$key."="."'$value'";
		}
		$this->save = substr($str, 1);

		return $this;
	}


}