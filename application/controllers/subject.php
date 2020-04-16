<?php
defined('BASEPATH') or exit('No direct script access allowed');

class subject extends CI_Controller
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
            $class_id = $this->input->post('class_id');
            $sub_name = $this->input->post('sub_name');
            $creator = $this->input->post('creator');

            $this->load->view('admin/include/admin_header');
            $this->load->view('admin/include/admin_left_sidebar');

            if ($sn == '' && $class_id == '' && $sub_name == '' && $creator == '') {

                $this->db->from('subject_list');
                $this->db->order_by("sub_id", "desc");
                $this->db->limit(10, 0);
                $data['details']  = $this->db->get()->result_array();
                
            } else {
                $this->db->from('subject_list');
                $this->db->order_by("class_id", "desc");
                if($sn != ''){
                    $this->db->where("class_id", $sn);
                }elseif($sub_name != ''){
                    $this->db->where("sub_name", $sub_name);
                } elseif ($class_id != '') {
                    $this->db->where("class_id", $class_id);
                }
                elseif ($creator != '') {
                    $this->db->where("creator", $creator);
                }
                $data['details']  = $this->db->get()->result_array();


                $data['sn']  = $sn;
                $data['class_id1']  = $class_id;
                $data['sub_name1']  = $sub_name;
                $data['creator1']  = $creator;
            
            }

            $totalarr = $this->db->get('subject_list')->result_array();
            $data['total'] = count($totalarr);



            $this->load->view('admin/setup/subject/view', $data);


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
            $this->load->view('admin/setup/subject/index', $data);


            $this->load->view('admin/include/admin_footer');
        }
    }


    public function store()
    {

        if (!$this->tank_auth->is_logged_in()) {                                // not logged in or not activated
            redirect('/auth/login/');
        } else {
            $class_id = $this->input->post('class_id');
            $sub_name = $this->input->post('sub_name');
            $status = $this->input->post('status');
            $user = $this->users->get_user_by_id($this->tank_auth->get_user_id(), TRUE);
            $creator = $user->firstname;


            $data = array();
            $data = ['class_id' => $class_id, 'sub_name' => $sub_name, 'sub_status' => $status, 'creator' => $creator];
            $this->db->insert('subject_list', $data);

            $this->session->set_flashdata('msg', 'Subject Create Successfully !');
            redirect(base_url() . 'subject/index');
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
                ->where('sub_id', $edit_id)
                ->get('subject_list');
            $data['edit_data'] = $query->row();
            $data['data1'] = $this->db->get('class_list')->result_array();
            $this->load->view('admin/setup/subject/edit', $data);

            $this->load->view('admin/include/admin_footer');
        }
    }

    

    public function update()
    {

        if (!$this->tank_auth->is_logged_in()) {                                // not logged in or not activated
            redirect('/auth/login/');
        } else {
            $class_id = $this->input->post('class_id');
            $sub_name = $this->input->post('sub_name');
            $status = $this->input->post('status');
            $id = $this->input->post('id');


            $data = array();
             $data = ['class_id' => $class_id, 'sub_name' => $sub_name, 'sub_status' => $status, 'creator' => $creator];
            $this->db->where('sub_id', $id);
		    $this->db->update('subject_list', $data);

            $this->session->set_flashdata('msg', 'Subject Update Successfully !');
            redirect(base_url() . 'subject/index');
        }
    }




}