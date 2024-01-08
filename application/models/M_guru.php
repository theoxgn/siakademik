<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_guru extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->table = "guru";
	}

	public function getguruByUsername($username)
	{
		return $this->db->get_where($this->table, ["NIP" => $nip])->row();
	}

}