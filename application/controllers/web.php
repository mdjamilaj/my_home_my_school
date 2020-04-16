<?php
defined('BASEPATH') or exit('No direct script access allowed');

class web extends CI_Controller
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

    public function ajax_req()
    {
        $limit = $this->input->post('limit');
        $offset = $this->input->post('offset');
        $table = $this->input->post('table');

        if ($limit == '' || $offset == '') {
            $limit = 10;
            $offset = 0;
        }
        if ($table == 'class_list') {
            $this->db->order_by("class_id", "desc");
        } elseif ($table == 'subject_list') {
            $this->db->order_by("sub_id", "desc");
        } elseif ($table == 'class_routine') {
            $this->db->order_by("date_time", "desc");
        }
        $result = $this->db->get($table, $offset, $limit)->result_array();
        $data['view'] = $result;
        echo json_encode($data);
    }


    public function fetch_subject()
    {
        $val = $this->input->post('val');
        $this->db->order_by("sub_id", "desc");
        $this->db->where("class_id", $val);

        $result = $this->db->get('subject_list')->result_array();
        $data['view'] = $result;
        echo json_encode($data);
    }



    public function index()
    {

        if (!$this->tank_auth->is_logged_in()) {                                // not logged in or not activated
            redirect('/auth/login/');
        } else {
            $this->load->view('admin/include/admin_header');
            $this->load->view('admin/include/admin_left_sidebar');

            $sn = $this->input->post('sn');
            $class_id = $this->input->post('class_id');
            $sub_id = $this->input->post('sub_id');
            $unite = $this->input->post('unite');
            $video_link = $this->input->post('video_link');
            $date_time = $this->input->post('date_time');


            if ($sn == '' && $class_id == '' && $sub_id == '' && $unite == '' && $video_link == '' && $date_time == '') {
                $this->db->from('class_routine');
                $this->db->order_by("date_time", "desc");
                $this->db->limit(10, 0);
                $data['details']  = $this->db->get()->result_array();
            } else {
                $this->db->from('class_routine');
                $this->db->order_by("date_time", "desc");
                if ($sn != '') {
                    $this->db->where("class_id", $sn);
                } elseif ($sub_id != '') {
                    $this->db->where("sub_id", $sub_id);
                } elseif ($class_id != '') {
                    $this->db->where("class_id", $class_id);
                } elseif ($unite != '') {
                    $this->db->where("unite", $unite);
                } elseif ($video_link != '') {
                    $this->db->where("video_link", $video_link);
                } elseif ($date_time != '') {
                    $this->db->where("date_time >=", $date_time);
                }
                $data['details']  = $this->db->get()->result_array();


                $data['sn']  = $sn;
                $data['class_id1']  = $class_id;
                $data['sub_id1']  = $sub_id;
                $data['unite1']  = $unite;
                $data['video_link1']  = $video_link;
                $data['date_time1']  = $date_time;
            }


            $totalarr = $this->db->get('class_routine')->result_array();
            $data['total'] = count($totalarr);



            $this->load->view('admin/setup/view', $data);


            $this->load->view('admin/include/admin_footer');

        }
    }




    public function class_routine_create()
    {

        if (!$this->tank_auth->is_logged_in()) {                                // not logged in or not activated
            redirect('/auth/login/');
        } else {
            $this->load->view('admin/include/admin_header');
            $this->load->view('admin/include/admin_left_sidebar');

            $data['data1'] = $this->db->get('class_list')->result_array();
            $data['data2'] = $this->db->get('subject_list')->result_array();
            $this->load->view('admin/setup/index', $data);


            $this->load->view('admin/include/admin_footer');
        }
    }



    public function class_routine_store()
    {

        if (!$this->tank_auth->is_logged_in()) {                                // not logged in or not activated
            redirect('/auth/login/');
        } else {

        $last_row = $this->db->select('id')->order_by('id', "desc")->limit(1)->get('class_routine')->row();
        if(empty($last_row)){
            $new_id = 1;
        }else{
            $new_id = $last_row->id + 1;
        }

		$_FILES['file']['name']       = $_FILES['attachment']['name'];
		$_FILES['file']['type']       = $_FILES['attachment']['type'];
		$_FILES['file']['tmp_name']   = $_FILES['attachment']['tmp_name'];
		$_FILES['file']['error']      = $_FILES['attachment']['error'];
		$_FILES['file']['size']       = $_FILES['attachment']['size'];

		$config['upload_path'] = './assets/images/uploads/';
		$config['allowed_types'] = 'gif|jpg|png|csv|xlsx|xlx|doc|docx';
		$config['max_size'] = '4000';
		$config['max_width']  = '2200';
		$config['max_height']  = '1800';
		$config['overwrite'] = TRUE;
		$config['encrypt_name'] = FALSE;
		$config['remove_spaces'] = TRUE;
		$name = $new_id;
		$dname = explode(".", $_FILES['file']['name']);
		$ext = end($dname);
		$new_name = $name . '.' . $ext;
		$config['file_name'] = $new_name;

		if (!is_dir($config['upload_path'])) die("THE UPLOAD DIRECTORY DOES NOT EXIST");
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('attachment')) {
			// echo $this->upload->display_errors();
			$attachment = $this->upload->display_errors();
		} else {
			$attachment = $ext;
		}

            $class_id = $this->input->post('class_id');
            $sub_id = $this->input->post('sub_id');
            $date_time = $this->input->post('date_time');
            $title = $this->input->post('title');
            $description = $this->input->post('description');
            $unite = $this->input->post('unite');
            $video_link = $this->input->post('video_link');


            $data = array();
            $data = ['class_id' => $class_id, 'sub_id' => $sub_id, 'title' => $title, 'unite' => $unite, 'details' => $description, 'video_link' => $video_link, 'attachment' => $attachment, 'date_time' => $date_time];
            $this->db->insert('class_routine', $data);

            $this->session->set_flashdata('msg', 'Class Routine Create Successfully !');
            redirect(base_url() . 'web/index');
        }
    }


    public function class_routine_edit()
    {
        if (!$this->tank_auth->is_logged_in()) {                                // not logged in or not activated
            redirect('/auth/login/');
        } else {
            $this->load->view('admin/include/admin_header');
            $this->load->view('admin/include/admin_left_sidebar');

            $edit_id = $this->input->get('edit');
            $query = $this->db->select('*')
                ->where('id', $edit_id)
                ->get('class_routine');
            $data['edit_data'] = $query->row();
            $data['data1'] = $this->db->get('class_list')->result_array();
            $data['data2'] = $this->db->get('subject_list')->result_array();
            $this->load->view('admin/setup/edit', $data);

            $this->load->view('admin/include/admin_footer');
        }
    }



    public function class_routine_update()
    {

        if (!$this->tank_auth->is_logged_in()) {                                // not logged in or not activated
            redirect('/auth/login/');
        } else {

            $new_id = $this->input->post('id');
            $old_attachment = $this->input->post('file_url');

            if ($_FILES['attachment']['name'] != '') {

            $path = FCPATH . "assets/images/uploads/" . $new_id . "." . $old_attachment;
            echo $path;
            unlink($path);

            $_FILES['file']['name']       = $_FILES['attachment']['name'];
            $_FILES['file']['type']       = $_FILES['attachment']['type'];
            $_FILES['file']['tmp_name']   = $_FILES['attachment']['tmp_name'];
            $_FILES['file']['error']      = $_FILES['attachment']['error'];
            $_FILES['file']['size']       = $_FILES['attachment']['size'];

            $config['upload_path'] = './assets/images/uploads/';
            $config['allowed_types'] = 'gif|jpg|png|csv|xlsx|xlx|doc|docx';
            $config['max_size'] = '4000';
            $config['max_width']  = '2200';
            $config['max_height']  = '1800';
            $config['overwrite'] = TRUE;
            $config['encrypt_name'] = FALSE;
            $config['remove_spaces'] = TRUE;
            $name = $new_id;
            $dname = explode(".", $_FILES['file']['name']);
            $ext = end($dname);
            $new_name = $name . '.' . $ext;
            $config['file_name'] = $new_name;

            if (!is_dir($config['upload_path'])) die("THE UPLOAD DIRECTORY DOES NOT EXIST");
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('attachment')) {
                // echo $this->upload->display_errors();
                $attachment = $this->upload->display_errors();
            } else {
                $attachment = $ext;
            }
        } else {
                $attachment = $old_attachment;
            }

            $class_id = $this->input->post('class_id');
            $sub_id = $this->input->post('sub_id');
            $date_time = $this->input->post('date_time');
            $title = $this->input->post('title');
            $description = $this->input->post('description');
            $unite = $this->input->post('unite');
            $video_link = $this->input->post('video_link');


            $data = array();
            $data = ['class_id' => $class_id, 'sub_id' => $sub_id, 'title' => $title, 'unite' => $unite, 'details' => $description, 'video_link' => $video_link, 'attachment' => $attachment, 'date_time' => $date_time];
            $id = $this->input->post('id');
            $this->db->where('id', $id);
            $this->db->update('class_routine', $data);

            $this->session->set_flashdata('msg', 'Class Routine Update Successfully !');
            redirect(base_url() . 'web/index');
        }
    }



    




    public function class_index()
    {

        if (!$this->tank_auth->is_logged_in()) {                                // not logged in or not activated
            redirect('/auth/login/');
        } else {


            $sn = $this->input->post('sn');
            $class_name = $this->input->post('class_name');
            $creator = $this->input->post('creator');

            $this->load->view('admin/include/admin_header');
            $this->load->view('admin/include/admin_left_sidebar');

            if ($sn == '' && $class_name == '' && $creator == '') {

                $this->db->from('class_list');
                $this->db->order_by("class_id", "desc");
                $this->db->limit(10, 0);
                $data['details']  = $this->db->get()->result_array();
                
            } else {
                $this->db->from('class_list');
                $this->db->order_by("class_id", "desc");
                if($sn != ''){
                    $this->db->where("class_id", $sn);
                }elseif($class_name != ''){
                    $this->db->where("class_name", $class_name);
                } elseif ($creator != '') {
                    $this->db->where("creator", $creator);
                }
                $data['details']  = $this->db->get()->result_array();


                $data['sn']  = $sn;
                $data['class_name1']  = $class_name;
                $data['creator1']  = $creator;
            
            }

            $totalarr = $this->db->get('class_list')->result_array();
            $data['total'] = count($totalarr);



            $this->load->view('admin/setup/class/view', $data);


            $this->load->view('admin/include/admin_footer');
        }
    }



    public function class_create()
    {

        if (!$this->tank_auth->is_logged_in()) {                                // not logged in or not activated
            redirect('/auth/login/');
        } else {
            $this->load->view('admin/include/admin_header');
            $this->load->view('admin/include/admin_left_sidebar');
            $this->load->view('admin/setup/class/index');
            $this->load->view('admin/include/admin_footer');
        }
    }




    public function class_store()
    {

        if (!$this->tank_auth->is_logged_in()) {                                // not logged in or not activated
            redirect('/auth/login/');
        } else {
            $class_name = $this->input->post('class_name');
            $status = $this->input->post('status');
            $user = $this->users->get_user_by_id($this->tank_auth->get_user_id(), TRUE);
            $creator = $user->firstname;


            $data = array();
            $data = ['class_name' => $class_name, 'class_status' => $status, 'creator' => $creator];
            $this->db->insert('class_list', $data);

            $this->session->set_flashdata('msg', 'Class Create Successfully !');
            redirect(base_url() . 'web/class_index');
        }
    }

    public function class_edit()
    {

        if (!$this->tank_auth->is_logged_in()) {                                // not logged in or not activated
            redirect('/auth/login/');
        } else {
            $this->load->view('admin/include/admin_header');
            $this->load->view('admin/include/admin_left_sidebar');

            $edit_id = $this->input->get('edit');
            $query = $this->db->select('*')
                ->where('class_id', $edit_id)
                ->get('class_list');
            $data['edit_data'] = $query->row();
            $this->load->view('admin/setup/class/edit', $data);

            $this->load->view('admin/include/admin_footer');
        }
    }

    

    public function class_update()
    {

        if (!$this->tank_auth->is_logged_in()) {                                // not logged in or not activated
            redirect('/auth/login/');
        } else {
            $class_name = $this->input->post('class_name');
            $status = $this->input->post('status');
            $id = $this->input->post('id');


            $data = array();
            $data = ['class_name' => $class_name, 'class_status' => $status];
            $this->db->where('class_id', $id);
		    $this->db->update('class_list', $data);

            $this->session->set_flashdata('msg', 'Class Update Successfully !');
            redirect(base_url() . 'web/class_index');
        }
    }




}