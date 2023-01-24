<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('inventory_model');

        if ($this->session->userdata('role') != 'admin') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Anda belum login!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('auth');
        }
    }

    public function index()
    {
        $data['barang'] = $this->inventory_model->get_barang()->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/barang/barang', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['kategori'] = $this->inventory_model->get_data('tbl_kategori')->result();
        $data['supplier'] = $this->inventory_model->get_data('tbl_supplier')->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/barang/tambah_barang', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = array(
                'nama_barang' => $this->input->post('nama_barang'),
                'kategori' => $this->input->post('kategori'),
                'harga' => $this->input->post('harga'),
                'stok' => $this->input->post('stok'),
                'id_supplier' => $this->input->post('id_supplier'),
            );

            $this->inventory_model->insert_data($data, 'tbl_barang');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Berhasil Ditambahkan!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/barang');
        }
    }

    public function edit_data($id)
    {
        $data['kategori'] = $this->inventory_model->get_data('tbl_kategori')->result();
        $data['supplier'] = $this->inventory_model->get_data('tbl_supplier')->result();
        $data['barang'] = $this->db->query("SELECT * FROM tbl_barang WHERE id_barang='$id'")->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/barang/edit_barang', $data);
        $this->load->view('templates/footer');
    }

    public function edit_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = array(
                'nama_barang' => $this->input->post('nama_barang'),
                'kategori' => $this->input->post('kategori'),
                'harga' => $this->input->post('harga'),
                'stok' => $this->input->post('stok'),
                'id_supplier' => $this->input->post('id_supplier'),
            );

            $where = array(
                'id_barang' => $this->input->post('id_barang'),
            );

            $this->inventory_model->update_data('tbl_barang', $data, $where);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Berhasil Diubah!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/barang');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('id_kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
        $this->form_validation->set_rules('stok', 'Stok', 'required');
        $this->form_validation->set_rules('id_supplier', 'Supplier', 'required');
    }

    public function delete_data($id)
    {
        $where = array('id_barang' => $id);

        $this->inventory_model->delete_data($where, 'tbl_barang');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data Berhasil Dihapus!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/barang');
    }
}

/* End of file Barang.php */
