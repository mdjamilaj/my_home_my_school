<?php
defined('BASEPATH') or exit('No direct script access allowed');

class api extends CI_Controller
{



    public function all_routine()
    {
        $token = $this->uri->segment(3);

        if ($token == 'ynT6AmjW') {

            $this->db->order_by("date_time", "asc");
            $result = $this->db->get('class_routine')->result_array();

            for ($i = 0; $i < count($result); $i++) {
                $class_id =  $result[$i]['class_id'];
                $sub_id =  $result[$i]['sub_id'];
                $class = $this->db->where('class_id', $class_id)->get('class_list')->row();
                $sub = $this->db->where('sub_id', $sub_id)->get('subject_list')->row();
                $cName = $class->class_name;
                $sName = $sub->sub_name;
                $result[$i]['class_name'] = $cName;
                $result[$i]['subject_name'] = $sName;
                $cNameBn = $class->class_name_bn;
                $sNameBn = $sub->sub_name_bn;
                $result[$i]['class_name_bn'] = $cNameBn;
                $result[$i]['subject_name_bn'] = $sNameBn;
            }

            $data['result'] = $result;
            echo json_encode($data);
        } else {
            $data['result'] = "Token Does't Matched";
            echo json_encode($data);
        }
    }


    public function daily_routine()
    {
        $token = $this->uri->segment(3);

        $date = date("Y-m-d");
        $nextdate = date('Y-m-d', strtotime(' +1 day'));
        $datetime = $date . ' 00:00';
        $nextdatetime = $nextdate . ' 00:00';

        if ($token == 'ynT6AmjW') {

            $this->db->order_by("id", "desc");
            $this->db->where('date_time >=', $datetime);
            $this->db->where('date_time <=', $nextdatetime);
            $result = $this->db->get('class_routine')->result();

            for ($i = 0; $i < count($result); $i++) {
                $class_id =  $result[$i]['class_id'];
                $sub_id =  $result[$i]['sub_id'];
                $class = $this->db->where('class_id', $class_id)->get('class_list')->row();
                $sub = $this->db->where('sub_id', $sub_id)->get('subject_list')->row();
                $cName = $class->class_name;
                $sName = $sub->sub_name;
                $result[$i]['class_name'] = $cName;
                $result[$i]['subject_name'] = $sName;
                $cNameBn = $class->class_name_bn;
                $sNameBn = $sub->sub_name_bn;
                $result[$i]['class_name_bn'] = $cNameBn;
                $result[$i]['subject_name_bn'] = $sNameBn;
            }


            $data['result'] = $result;
            echo json_encode($data);
        } else {
            $data['result'] = "Token Does't Matched";
            echo json_encode($data);
        }
    }


    public function routine_list()
    {
        $token = $this->uri->segment(4);
        $limit = $this->uri->segment(3);

        if ($token == 'ynT6AmjW') {

            $this->db->order_by("date_time", "asc");
            $this->db->limit($limit, 0);
            $result = $this->db->get('class_routine')->result_array();

            for ($i = 0; $i < count($result); $i++) {
                $class_id =  $result[$i]['class_id'];
                $sub_id =  $result[$i]['sub_id'];
                $class = $this->db->where('class_id', $class_id)->get('class_list')->row();
                $sub = $this->db->where('sub_id', $sub_id)->get('subject_list')->row();
                $cName = $class->class_name;
                $sName = $sub->sub_name;
                $result[$i]['class_name'] = $cName;
                $result[$i]['subject_name'] = $sName;
                $cNameBn = $class->class_name_bn;
                $sNameBn = $sub->sub_name_bn;
                $result[$i]['class_name_bn'] = $cNameBn;
                $result[$i]['subject_name_bn'] = $sNameBn;
            }

            $data['result'] = $result;
            echo json_encode($data);
        } else {
            $data['result'] = "Token Does't Matched";
            echo json_encode($data);
        }
    }


    public function singel_routine()
    {
        $token = $this->uri->segment(4);
        $id = $this->uri->segment(3);

        if ($token == 'ynT6AmjW') {

            $this->db->order_by("date_time", "desc");
            $this->db->where('id', $id);
            $result = $this->db->get('class_routine')->row();


            $class_id =  $result->class_id;
            $sub_id =  $result->sub_id;
            $class = $this->db->where('class_id', $class_id)->get('class_list')->row();
            $sub = $this->db->where('sub_id', $sub_id)->get('subject_list')->row();
            $cName = $class->class_name;
            $sName = $sub->sub_name;
            $result->class_name = $cName;
            $result->subject_name = $sName;
            $cNameBn = $class->class_name_bn;
            $sNameBn = $sub->sub_name_bn;
            $result->class_name_bn = $cNameBn;
            $result->subject_name_bn = $sNameBn;

            $data['result'] = $result;
            echo json_encode($data);
        } else {
            $data['result'] = "Token Does't Matched";
            echo json_encode($data);
        }
    }


    public function all_class()
    {
        $token = $this->uri->segment(3);

        if ($token == 'ynT6AmjW') {

            $this->db->order_by("class_id", "asc");
            $result = $this->db->get('class_list')->result_array();

            $data['result'] = $result;
            echo json_encode($data);
        } else {
            $data['result'] = "Token Does't Matched";
            echo json_encode($data);
        }
    }


    public function class_list()
    {
        $token = $this->uri->segment(4);
        $limit = $this->uri->segment(3);

        if ($token == 'ynT6AmjW') {

            $this->db->order_by("class_id", "desc");
            $this->db->limit($limit, 0);
            $result = $this->db->get('class_list')->result_array();

            $data['result'] = $result;
            echo json_encode($data);
        } else {
            $data['result'] = "Token Does't Matched";
            echo json_encode($data);
        }
    }


    public function singel_class()
    {
        $token = $this->uri->segment(4);
        $id = $this->uri->segment(3);

        if ($token == 'ynT6AmjW') {

            $this->db->order_by("class_id", "desc");
            $this->db->where('class_id', $id);
            $result = $this->db->get('class_list')->row();

            $data['result'] = $result;
            echo json_encode($data);
        } else {
            $data['result'] = "Token Does't Matched";
            echo json_encode($data);
        }
    }


    public function all_subject()
    {
        $token = $this->uri->segment(3);

        if ($token == 'ynT6AmjW') {

            $this->db->order_by("sub_id", "asc");
            $result = $this->db->get('subject_list')->result_array();

            $data['result'] = $result;
            echo json_encode($data);
        } else {
            $data['result'] = "Token Does't Matched";
            echo json_encode($data);
        }
    }



    public function subject_list()
    {
        $token = $this->uri->segment(4);
        $limit = $this->uri->segment(3);

        if ($token == 'ynT6AmjW') {

            $this->db->order_by("sub_id", "desc");
            $this->db->limit($limit, 0);
            $result = $this->db->get('subject_list')->result_array();

            $data['result'] = $result;
            echo json_encode($data);
        } else {
            $data['result'] = "Token Does't Matched";
            echo json_encode($data);
        }
    }


    public function singel_subject()
    {
        $token = $this->uri->segment(4);
        $id = $this->uri->segment(3);

        if ($token == 'ynT6AmjW') {

            $this->db->order_by("sub_id", "desc");
            $this->db->where('sub_id', $id);
            $result = $this->db->get('subject_list')->row();

            $data['result'] = $result;
            echo json_encode($data);
        } else {
            $data['result'] = "Token Does't Matched";
            echo json_encode($data);
        }
    }

    #http://bdroutine.jamil.onlinehost.itlab.solutions/api/classIdToFetchSub/Class_ID/TOKEN
    #http://bdroutine.jamil.onlinehost.itlab.solutions/api/classIdToFetchSub/1/ynT6AmjW



    public function classIdToFetchSub()
    {
        $token = $this->uri->segment(4);
        $class_id = $this->uri->segment(3);

        if ($token == 'ynT6AmjW') {

            $this->db->order_by("sub_id", "desc");
            $this->db->where('class_id', $class_id);
            $result = $this->db->get('subject_list')->result();

            $data['result'] = $result;
            echo json_encode($data);
        } else {
            $data['result'] = "Token Does't Matched";
            echo json_encode($data);
        }
    }


    #http://bdroutine.jamil.onlinehost.itlab.solutions/api/classIdAndSubIdToFetchRoutine/Class_ID/sub_ID/TOKEN
    #http://bdroutine.jamil.onlinehost.itlab.solutions/api/classIdAndSubIdToFetchRoutine/1/1/ynT6AmjW

    public function classIdAndSubIdToFetchRoutine()
    {
        $token = $this->uri->segment(5);
        $sub_id = $this->uri->segment(4);
        $class_id = $this->uri->segment(3);

        $date = date("Y-m-d");
        $datetime = $date . ' 00:00';

        if ($token == 'ynT6AmjW') {

            $this->db->order_by("id", "desc");
            $this->db->where('date_time >=', $datetime);
            $this->db->where('class_id', $class_id);
            if ($sub_id != 0) {
                $this->db->where('sub_id', $sub_id);
            }
            $result = $this->db->get('class_routine')->result_array();

            for ($i = 0; $i < count($result); $i++) {
                $class_id =  $result[$i]['class_id'];
                $sub_id =  $result[$i]['sub_id'];
                $class = $this->db->where('class_id', $class_id)->get('class_list')->row();
                $sub = $this->db->where('sub_id', $sub_id)->get('subject_list')->row();
                $cName = $class->class_name;
                $sName = $sub->sub_name;
                $result[$i]['class_name'] = $cName;
                $result[$i]['subject_name'] = $sName;
                $cNameBn = $class->class_name_bn;
                $sNameBn = $sub->sub_name_bn;
                $result[$i]['class_name_bn'] = $cNameBn;
                $result[$i]['subject_name_bn'] = $sNameBn;
            }

            $data['result'] = $result;
            echo json_encode($data);
        } else {
            $data['result'] = "Token Does't Matched";
            echo json_encode($data);
        }
    }

    #http://bdroutine.jamil.onlinehost.itlab.solutions/api/classIdToFetchRoutine/Class_ID/TOKEN
    #http://bdroutine.jamil.onlinehost.itlab.solutions/api/classIdAndTodayDateToFetchRoutine/Class_ID/ynT6AmjW

    public function classIdAndTodayDateToFetchRoutine()
    {
        $token = $this->uri->segment(4);
        $class_id = $this->uri->segment(3);

        $date = date("Y-m-d");
        $nextdate = date('Y-m-d', strtotime(' +1 day'));
        $datetime = $date . ' 00:00';
        $nextdatetime = $nextdate . ' 00:00';

        if ($token == 'ynT6AmjW') {

            $this->db->order_by("id", "desc");
            $this->db->where('date_time >=', $datetime);
            $this->db->where('date_time <=', $nextdatetime);
            if (strpos($class_id, '-') !== false) {

                $arr = explode("-", $class_id);
                $this->db->where_in('class_id', $arr);
            } else {
                $this->db->where('class_id', $class_id);
            }
            $result = $this->db->get('class_routine')->result_array();

            for ($i = 0; $i < count($result); $i++) {
                $class_id =  $result[$i]['class_id'];
                $sub_id =  $result[$i]['sub_id'];
                $class = $this->db->where('class_id', $class_id)->get('class_list')->row();
                $sub = $this->db->where('sub_id', $sub_id)->get('subject_list')->row();
                $cName = $class->class_name;
                $sName = $sub->sub_name;
                $result[$i]['class_name'] = $cName;
                $result[$i]['subject_name'] = $sName;
                $cNameBn = $class->class_name_bn;
                $sNameBn = $sub->sub_name_bn;
                $result[$i]['class_name_bn'] = $cNameBn;
                $result[$i]['subject_name_bn'] = $sNameBn;
            }

            $data['result'] = $result;
            echo json_encode($data);
        } else {
            $data['result'] = "Token Does't Matched";
            echo json_encode($data);
        }
    }




    public function classIdAndAnyDateToFetchRoutine()
    {
        $token = $this->uri->segment(5);
        $date = $this->uri->segment(4);
        $class_id = $this->uri->segment(3);
        $nextdate = date('Y-m-d', strtotime($date . ' +1 day'));
        $datetime = $date . ' 00:00';
        $nextdatetime = $nextdate . ' 00:00';

        if ($token == 'ynT6AmjW') {
            $this->db->order_by("id", "desc");
            $this->db->where('date_time >=', $datetime);
            $this->db->where('date_time <=', $nextdatetime);

            if (strpos($class_id, '-') !== false) {

                $arr = explode("-", $class_id);
                $this->db->where_in('class_id', $arr);
            } else {
                $this->db->where('class_id', $class_id);
            }

            $result = $this->db->get('class_routine')->result_array();

            for ($i = 0; $i < count($result); $i++) {
                $class_id =  $result[$i]['class_id'];
                $sub_id =  $result[$i]['sub_id'];
                $class = $this->db->where('class_id', $class_id)->get('class_list')->row();
                $sub = $this->db->where('sub_id', $sub_id)->get('subject_list')->row();
                $cName = $class->class_name;
                $sName = $sub->sub_name;
                $result[$i]['class_name'] = $cName;
                $result[$i]['subject_name'] = $sName;
                $cNameBn = $class->class_name_bn;
                $sNameBn = $sub->sub_name_bn;
                $result[$i]['class_name_bn'] = $cNameBn;
                $result[$i]['subject_name_bn'] = $sNameBn;
            }

            $data['result'] = $result;
            echo json_encode($data);
        } else {
            $data['result'] = "Token Does't Matched";
            echo json_encode($data);
        }
    }



    public function userDataStore()
    {
        $token = $this->uri->segment(3);
        $name = $this->input->post('name');
        $phone_no = $this->input->post('phone_no');
        $email = $this->input->post('email');

        if ($token == 'ynT6AmjW') {

            $data = array();
            $data = ['name' => $name, 'phone_no' => $phone_no, 'email' => $email];
            $this->db->insert('users_app', $data);

            if ($this->db->affected_rows() > 0) {
                $data['result'] = "Data Store SuccessFully";
                echo json_encode($data);
            }else{
                $data['result'] = "Data Insert Failed";
                echo json_encode($data);
            }

        } else {
            $data['result'] = "Token Does't Matched";
            echo json_encode($data);
        }
        
    }

    public function ratingDataStore()
    {
        $token = $this->uri->segment(3);
        $name = $this->input->post('name');
        $phone_no = $this->input->post('phone_no');
        $address = $this->input->post('address');
        $rating = $this->input->post('rating');
        $suggestion = $this->input->post('suggestion');


        if ($token == 'ynT6AmjW') {

            $data = array();
            $data = ['name' => $name, 'phone_no' => $phone_no, 'address' => $address, 'rating' => $rating, 'suggestion' => $suggestion];
            $this->db->insert('rating', $data);

            if ($this->db->affected_rows() > 0) {
                $data['result'] = "Data Store SuccessFully";
                echo json_encode($data);
            } else {
                $data['result'] = "Data Insert Failed";
                echo json_encode($data);
            }
        } else {
            $data['result'] = "Token Does't Matched";
            echo json_encode($data);
        }
    }


    public function versionControl()
    {
        $token = $this->uri->segment(3);

        if ($token == 'ynT6AmjW') {

            $this->db->order_by("id", "desc");
            $result = $this->db->get('app_info')->row();

            $data['result'] = $result;
            echo json_encode($data);
        } else {
            $data['result'] = "Token Does't Matched";
            echo json_encode($data);
        }
    }
}
