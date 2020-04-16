<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class users_show extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('tank_auth');
		$this->load->library('session');
		$this->load->model('tank_auth/users');
	}

	function index()
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {
			$this->load->view('admin/include/admin_header');
			$this->load->view('admin/include/admin_left_sidebar');
			$email = $this->input->post('email');
			$actived = $this->input->post('actived');
			$banned = $this->input->post('banned');
			if ($email != '' || $actived != '' || $banned != '') {
				$data['email11'] = $email;
				$data['load_hide'] = 1;
				$this->db->from('users');
				$this->db->order_by("id", "asc");
				if ($email != '') {
					$this->db->Where('email', $email);
				}
				if ($actived != '') {
					$this->db->Where('activated', $actived);
				}
				if ($banned != '') {
					$this->db->Where('banned', $banned);
				}
				$data['details']  = $this->db->get()->result_array();
			} else {
				$this->db->from('users');
				$this->db->order_by("id", "asc");
				$this->db->order_by("admin", "asc");
				$this->db->limit(10, 0);
				$data['details']  = $this->db->get()->result_array();
			}

			$totalarr = $this->db->get('users')->result_array();
			$data['total'] = count($totalarr);

			$this->load->view('admin/setup/users/view', $data);


			$this->load->view('admin/include/admin_footer');
        }
	}
	
	public function edit()
	{
		$user = $this->users->get_user_by_id($this->tank_auth->get_user_id(), TRUE);
		
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		}elseif ($user->admin == 0) {
			echo "<script>alert('You Are Not A Admin This Page Just See a admin!!!')</script>";
			redirect('site');
		}else {
			$this->load->view('admin/include/admin_header');
			$this->load->view('admin/include/admin_left_sidebar');

			$edit_id = $this->input->get('edit');
			$query = $this->db->select('*')
				->where('id', $edit_id)
				->get('users');
			$data['edit_data'] = $query->result();

			// var_dump($data);
			// echo $data;
			$this->load->view('admin/setup/users/edit', $data);

			// $data['details'] = $this->db->get('common_details')->result_array();
			// $this->load->view('admin/setup/index', $data);
			$this->load->view('admin/include/admin_footer');
		}
	}

	public function update()
	{
		$user = $this->users->get_user_by_id($this->tank_auth->get_user_id(), TRUE);

		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} elseif ($user->admin == 0) {
			echo "<script>alert('You Are Not A Admin This Page Just See a admin!!!')</script>";
			redirect('site');
		} else {

			$data = array(
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'admin' => $this->input->post('admin'),
				'activated' => $this->input->post('activated'),
				'banned' => $this->input->post('banned'),
				'ban_reason' => $this->input->post('ban_reason'),
			);

			$this->db->where('id', $this->input->post('id'));
			$this->db->update('users', $data);

			$this->session->set_flashdata('msg', 'Update Successfully !');
			redirect(base_url() . 'users_show/index');

		}

	}

}