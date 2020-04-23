<?php
defined('BASEPATH') or exit('No direct script access allowed');

class app_info extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('security');
        $this->load->library('tank_auth');
        $this->lang->load('tank_auth');
    }



    public function index()
    {

        if (!$this->tank_auth->is_logged_in()) {                                // not logged in or not activated
            redirect('/auth/login/');
        } else {


            $sn = $this->input->post('sn');
            $app_version_code = $this->input->post('app_version_code');


            $this->load->view('admin/include/admin_header');
            $this->load->view('admin/include/admin_left_sidebar');

            if ($sn == '' && $app_version_code == '') {

                $this->db->from('app_info');
                $this->db->order_by("id", "desc");
                $this->db->limit(10, 0);
                $data['details']  = $this->db->get()->result_array();
            } else {
                $this->db->from('app_info');
                $this->db->order_by("id", "desc");
                if ($sn != '') {
                    $this->db->where("id", $sn);
                } elseif ($app_version_code != '') {
                    $this->db->where("sub_name", $app_version_code);
                }
                $data['details']  = $this->db->get()->result_array();


                $data['sn']  = $sn;
                $data['app_version_code1']  = $app_version_code;
            }

            $totalarr = $this->db->get('app_info')->result_array();
            $data['total'] = count($totalarr);



            $this->load->view('admin/setup/app_info/view', $data);


            $this->load->view('admin/include/admin_footer');
        }
    }



    public function create()
    {

        if (!$this->tank_auth->is_logged_in()) {                                // not logged in or not activated
            redirect('/auth/login/');
        } else {
            $this->load->view('admin/include/admin_header');
            $this->load->view('admin/include/admin_left_sidebar');

            $data['data1'] = $this->db->get('class_list')->result_array();
            $this->load->view('admin/setup/app_info/index', $data);


            $this->load->view('admin/include/admin_footer');
        }
    }


    public function store()
    {

        if (!$this->tank_auth->is_logged_in()) {                                // not logged in or not activated
            redirect('/auth/login/');
        } else {
            $app_version_code = $this->input->post('app_version_code');
            $app_version_name = $this->input->post('app_version_name');
            $app_version_details = $this->input->post('app_version_details');

            $data = array();
            $data = ['app_version_code' => $app_version_code, 'app_version_name' => $app_version_name, 'app_version_details' => $app_version_details];
            $this->db->insert('app_info', $data);

            $this->session->set_flashdata('msg', 'App Info Create Successfully !');
            redirect(base_url() . 'app_info/index');
        }
    }

    public function edit()
    {

        if (!$this->tank_auth->is_logged_in()) {                                // not logged in or not activated
            redirect('/auth/login/');
        } else {
            $this->load->view('admin/include/admin_header');
            $this->load->view('admin/include/admin_left_sidebar');

            $edit_id = $this->input->get('edit');
            $query = $this->db->select('*')
                ->where('id', $edit_id)
                ->get('app_info');
            $data['edit_data'] = $query->row();
            $this->load->view('admin/setup/app_info/edit', $data);

            $this->load->view('admin/include/admin_footer');
        }
    }



    public function update()
    {

        if (!$this->tank_auth->is_logged_in()) {                                // not logged in or not activated
            redirect('/auth/login/');
        } else {
            $app_version_code = $this->input->post('app_version_code');
            $app_version_name = $this->input->post('app_version_name');
            $app_version_details = $this->input->post('app_version_details');
            $id = $this->input->post('id');

            $data = array();
            $data = ['app_version_code' => $app_version_code, 'app_version_name' => $app_version_name, 'app_version_details' => $app_version_details];
            $this->db->where('id', $id);
            $this->db->update('app_info', $data);

            $this->session->set_flashdata('msg', 'App Info Update Successfully !');
            redirect(base_url() . 'app_info/index');
        }
    }
}
