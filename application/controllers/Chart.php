<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Chart extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Struktur Carta Organisasi';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('chart/index', $data);
        $this->load->view('templates/footer');
    }

    public function chartdetail()
    {
        $data['title'] = 'Struktur Carta Organisasi';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('chart/chartdetail', $data);
        $this->load->view('templates/footer');
    }
    public function charttambah()
    {
        $data['title'] = 'Menambah Struktur Carta Organisasi';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('chart/charttambah', $data);
        $this->load->view('templates/footer');
    }
}
