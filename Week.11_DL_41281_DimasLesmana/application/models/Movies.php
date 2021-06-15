<?php

	defined('BASEPATH') OR exit('No direct script access allowed !');

	class Movies extends CI_Model {
		private $table = "tblmovie";

		public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}

		public function ShowData()
		{
			return $this->db->get($this->table)->result_array();
		}

		public function ShowDetail($id)
		{
			$this->db->trans_begin();
			$query = $this->db->get_where($this->table, ['MovieID' => $id]);
			$this->db->trans_complete();

			if($this->db->trans_status() === FALSE)
			{
				$this->db->trans_rollback();
				return FALSE;
			}else
			{
				$this->db->trans_commit();
				return $query->result_array();
			}
		}

		public function AddData($data)
		{
			$this->db->insert($this->table, $data);
		}

		public function UpdateData($id, $data)
		{
			$this->db->update($this->table, $data, ['MovieID' => $id]);
		}
	}
