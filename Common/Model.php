<?php

namespace Common;


CLass Model extends Db
{
	public function __construct()
	{
		$this->connect();
		$this->where();
		$this->Col();
	}
}