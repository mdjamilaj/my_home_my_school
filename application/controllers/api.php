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
        $datetime = $date. ' 00:00';
        $nextdatetime = $nextdate . ' 00:00'; 

        if ($token == 'ynT6AmjW') {

            $sql = "SELECT * FROM class_routine WHERE date_time >= '". $datetime . "' AND date_time < '" . $nextdatetime . "' ORDER BY `date_time` DESC";
            $result = $this->db->query($sql)->result_array();

            var_dump($result);

            // $data['result'] = $result;
            // echo json_encode($data);
        } else {
            $data['result'] = "Token Does't Matched";
            echo json_encode($data);
        }
    }


    public function routine_list()
    {
        $token = $this->uri->segment(4);
        $limit = $this->uri->segment(3);

        if($token == 'ynT6AmjW'){

            $this->db->order_by("date_time", "asc");
            $this->db->limit($limit, 0);
            $result = $this->db->get('class_routine')->result_array();

            $data['result'] = $result;
            echo json_encode($data);
        }else{
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


    #http://bdroutine.jamil.onlinehost.itlab.solutions/api/classIdToFetchRoutine/Class_ID/TOKEN
    #http://bdroutine.jamil.onlinehost.itlab.solutions/api/classIdToFetchRoutine/1/ynT6AmjW

    public function classIdToFetchRoutine()
    {
        $token = $this->uri->segment(4);
        $class_id = $this->uri->segment(3);

        if ($token == 'ynT6AmjW') {

            $this->db->order_by("id", "desc");
            $this->db->where('class_id', $class_id);
            $result = $this->db->get('class_routine')->result();

            $data['result'] = $result;
            echo json_encode($data);
        } else {
            $data['result'] = "Token Does't Matched";
            echo json_encode($data);
        }
    }


    #http://bdroutine.jamil.onlinehost.itlab.solutions/api/classIdToFetchRoutine/Class_ID/sub_ID/TOKEN
    #http://bdroutine.jamil.onlinehost.itlab.solutions/api/classIdToFetchRoutine/1/1/ynT6AmjW

    public function classIdAndSubIdToFetchRoutine()
    {
        $token = $this->uri->segment(5);
        $sub_id = $this->uri->segment(4);
        $class_id = $this->uri->segment(3);

        if ($token == 'ynT6AmjW') {

            $this->db->order_by("id", "desc");
            $this->db->where('class_id', $class_id);
            $this->db->where('sub_id', $sub_id);
            $result = $this->db->get('class_routine')->result();

            $data['result'] = $result;
            echo json_encode($data);
        } else {
            $data['result'] = "Token Does't Matched";
            echo json_encode($data);
        }
    }

    #http://bdroutine.jamil.onlinehost.itlab.solutions/api/classIdToFetchRoutine/Class_ID/TOKEN
    #http://bdroutine.jamil.onlinehost.itlab.solutions/api/classIdToFetchRoutine/1/ynT6AmjW

    public function classIdAndTodayDateToFetchRoutine()
    {
        $token = $this->uri->segment(4);
        $class_id = $this->uri->segment(3);

        $date = date("Y-m-d");
        $nextdate = date('Y-m-d', strtotime(' +1 day'));
        $datetime = $date . ' 00:00';
        $nextdatetime = $nextdate . ' 00:00';
        // echo $datetime;
        // echo $nextdatetime;

        if ($token == 'ynT6AmjW') {

            $sql = "SELECT * FROM class_routine WHERE date_time >= '" . $datetime . "' AND date_time < '" . $nextdatetime . "'AND class_id = '$class_id' ORDER BY `date_time` DESC";
            $result = $this->db->query($sql)->result_array();

            var_dump($result);
        } else {
            $data['result'] = "Token Does't Matched";
            echo json_encode($data);
        }
    }


    #http://bdroutine.jamil.onlinehost.itlab.solutions/api/classIdToFetchRoutine/Class_ID/TOKEN
    #http://bdroutine.jamil.onlinehost.itlab.solutions/api/classIdAndAnyDateToFetchRoutine/1/ynT6AmjW

    public function classIdAndAnyDateToFetchRoutine()
    {
        $token = $this->uri->segment(5);
        $date = $this->uri->segment(4);
        $class_id = $this->uri->segment(3);
echo $date;
        $nextdate = date('Y-m-d', strtotime(' +1 day'));
        $datetime = $date . ' 00:00';
        $nextdatetime = $nextdate . ' 00:00';
        echo $datetime;
        echo $nextdatetime;

        if ($token == 'ynT6AmjW') {
            

            $sql = "SELECT * FROM class_routine WHERE date_time >= '" . $datetime . "' AND date_time < '" . $nextdatetime . "'AND class_id = '$class_id' ORDER BY `date_time` DESC";
            $result = $this->db->query($sql)->result_array();

            var_dump($result);
        } else {
            $data['result'] = "Token Does't Matched";
            echo json_encode($data);
        }
    }



    public function token_generator()
    {
        $t = time();
        echo "<script>setInterval(function () { console.log('call me!');";
        echo "}, 200);</script>";
    }




}