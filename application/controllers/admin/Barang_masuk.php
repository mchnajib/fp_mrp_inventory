<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Barang_masuk extends CI_Controller
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
        $data['barang_masuk'] = $this->inventory_model->barang_masuk()->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/barang_masuk/barang_masuk', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['barang'] = $this->inventory_model->get_data('tbl_barang')->result();
        $data['supplier'] = $this->inventory_model->get_data('tbl_supplier')->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/barang_masuk/tambah_barang_masuk', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = array(
                'id_barang' => $this->input->post('id_barang'),
                'tanggal_masuk' => $this->input->post('tanggal_masuk'),
                'stok_masuk' => $this->input->post('stok_masuk'),
                'total' => $this->input->post('total'),
                'id_supplier' => $this->input->post('id_supplier'),
            );

            $this->inventory_model->insert_data($data, 'barang_masuk');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Berhasil Ditambahkan!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/barang_masuk');
        }
    }

    public function edit_data($id)
    {
        $data['barang_masuk'] = $this->db->query("SELECT * FROM barang_masuk WHERE id='$id'")->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/barang_masuk/edit_barang_masuk', $data);
        $this->load->view('templates/footer');
    }

    public function _rules()
    {
        $this->form_validation->set_rules('id_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('tanggal_masuk', 'Tanggal Masuk', 'required');
        $this->form_validation->set_rules('stok_masuk', 'Stok Masuk', 'required');
        $this->form_validation->set_rules('total', 'Total', 'required');
        $this->form_validation->set_rules('id_supplier', 'Supplier', 'required');
    }
}

/* End of file Barang_masuk.php */
