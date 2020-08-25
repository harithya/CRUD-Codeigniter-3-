<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MahasiswaModel extends CI_Model
{
    public function all()
    {
        return $this->db->get('mahasiswa')
            ->result_array();
    }

    public function find($id)
    {
        return $this->db->where(['id' => $id])
            ->get('mahasiswa')->row_array();
    }
}

/* End of file MahasiswaModel.php */
