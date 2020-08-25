<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MahasiswaModel', 'mahasiswa');
    }

    public function index()
    {
        $data['mahasiswa'] = $this->mahasiswa->all();

        $this->load->view('layout/header');
        $this->load->view('mahasiswa/index', $data);
        $this->load->view('mahasiswa/modal');
        $this->load->view('layout/footer');
        $this->load->view('mahasiswa/script');
    }

    public function create()
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'alamat' => $this->input->post('alamat')
        ];

        $create = $this->db->insert('mahasiswa', $data);
        $message = ($create) ? 'Berhasil menambahkan data' : 'Gagal menambahkan data';
        $this->session->set_flashdata('message', $message);

        redirect('/', 'refresh');
    }

    public function delete($id = null)
    {
        $delete = $this->db->where(['id' => $id])
            ->delete('mahasiswa');

        $message = ($delete) ? 'Berhasil menghapus data' : 'Gagal menghapus data';
        $this->session->set_flashdata('message', $message);

        redirect('/', 'refresh');
    }

    public function show($id = null)
    {
        $get = $this->mahasiswa->find($id);
        // mengubah data array jadi json
        $this->output->set_content_type('application/json')
            ->set_output(json_encode($get));
    }

    public function update()
    {
        $id = $this->input->post('id');

        $data = [
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'alamat' => $this->input->post('alamat')
        ];

        $update = $this->db->where(['id' => $id])
            ->update('mahasiswa', $data);

        $message = ($update) ? 'Berhasil mengubah data' : 'Gagal mengubah data';
        $this->session->set_flashdata('message', $message);

        redirect('/', 'refresh');
    }
}
