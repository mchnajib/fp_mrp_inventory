<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
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
        $data['supplier'] = $this->inventory_model->get_data('tbl_supplier')->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/supplier/supplier', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/supplier/tambah_supplier');
        $this->load->view('templates/footer');
    }

    public function tambah_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = array(
                'nama_supplier' => $this->input->post('nama_supplier'),
                'alamat' => $this->input->post('alamat'),
                'no_telp' => $this->input->post('no_telp'),
            );

            $this->inventory_model->insert_data($data, 'tbl_supplier');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Berhasil Ditambahkan!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/supplier');
        }
    }

    public function edit_data($id)
    {
        $data['supplier'] = $this->db->query("SELECT * FROM tbl_supplier WHERE id_supplier='$id'")->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/supplier/edit_supplier', $data);
        $this->load->view('templates/footer');
    }

    public function edit_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = array(
                'nama_supplier' => $this->input->post('nama_supplier'),
                'alamat' => $this->input->post('alamat'),
                'no_telp' => $this->input->post('no_telp'),
            );

            $where = array(
                'id_supplier' => $this->input->post('id_supplier'),
            );

            $this->inventory_model->update_data('tbl_supplier', $data, $where);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Berhasil Diubah!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/supplier');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_supplier', 'Nama Supplier', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_telp', 'No Telp', 'required');
    }

    public function delete_data($id)
    {
        $where = array('id_supplier' => $id);

        $this->inventory_model->delete_data($where, 'tbl_supplier');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data Berhasil Dihapus!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/supplier');
    }
}

/* End of file Supplier.php */
