<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends BaseController {

	public function __construct() {
		parent::__construct();
	}

	public function create($id=null) {
		if (parent::is_user('admin') || parent::is_user('teller')) {

			$current_user = parent::current_user();

			$this->form_validation->set_rules('first_name', 'First name', "trim|required|regex_match[/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/u]");
			$this->form_validation->set_rules('middle_name', 'Middle name', "trim|required|regex_match[/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/u]");
			$this->form_validation->set_rules('last_name', 'Last name', "trim|required|regex_match[/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/u]");
			$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|max_length[50]|alpha_numeric');
			$this->form_validation->set_rules('email', 'E-mail address', 'trim|required|valid_email|is_unique[tbl_users.email]');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[30]');
			// $this->form_validation->set_rules('passconf', 'Confirm Password', 'trim|required|matches[password]');
			$this->form_validation->set_rules('user_type', 'User Type', 'trim|required');

			if ($this->form_validation->run()) {
				if($id==null) {
					$person_id = parent::create_person([
						'first_name' => $this->input->post('first_name'),
						'middle_name' => $this->input->post('middle_name'),
						'last_name' => $this->input->post('last_name')
					]);
				} else {
					$person_id = $this->customer->get($id)['person_id'];
				}

				$this->user->insert([
					'username' => $this->input->post('username'),
					'password' => $this->encryption->encrypt($this->input->post('password')),
					'email' => $this->input->post('email'),
					'person_id' => $person_id,
					'user_type' => $this->input->post('user_type'),
					'last_login' => null,
					'login_attempts' => 0,
					'last_password_change' => date('Y-m-d H:i:s'),
					'status' => OK
				]);

				if($this->customer->get_by(['person_id' => $person_id])) {
					$this->customer_user->insert(['username' => $this->input->post('username'), 'customer_id' => $id]);
				}
				$this->session->set_flashdata('message', 'Account Successfully Created');
				return redirect('user/create'); // redirect to success
			}

	      	$data['error_message'] = validation_errors();
		    //$data['error_message'] = explode("</p>", $data['error_message']);
		    $this->session->set_flashdata('error_message',  $data['error_message']);
		    
			return redirect('user/create'); // render create form w/ errors
		} else {
			return show_error("Forbidden Access", 403, "GET OUT OF HERE!!"); // return to page
		}
	}

	public function update($id) {
		if (parent::is_user('admin') || parent::is_user('teller')) {
			$user = $this->user->get($id);
			$current_user = parent::current_user();

			$this->form_validation->set_rules('first_name', 'First name', 'trim|required|alpha');
			$this->form_validation->set_rules('middle_name', 'Middle name', 'trim|required|alpha');
			$this->form_validation->set_rules('last_name', 'Last name', 'trim|required|alpha');
			$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|max_length[50]');
			if($user['email'] === $this->input->post('email'))
				$this->form_validation->set_rules('email', 'E-mail address', 'trim|required|valid_email');
			else	
				$this->form_validation->set_rules('email', 'E-mail address', 'trim|required|valid_email|is_unique[tbl_users.email]');
			$this->form_validation->set_rules('user_type', 'User Type', 'trim|required|callback_type_check');

			if ($this->form_validation->run()) {
				parent::upate_person($user['person_id'], [
					'first_name' => $this->input->post('first_name'),
					'middle_name' => $this->input->post('middle_name'),
					'last_name' => $this->input->post('last_name')
				]);

				$this->user->update($id, [
					'username' => $this->input->post('username'),
					'email' => $this->input->post('email'),
					'user_type' => $this->input->post('user_type'),
				]);
				return TRUE; // redirect to success
			}

			return FALSE; // render create form w/ errors
		} else {
			return FALSE; // return to page
		}
	}

	public function get_all() {
		if(parent::is_user('admin') || parent::is_user('teller'))
			return $this->user->get_all();
		return FALSE;
	}

	public function delete($id) {
		if(parent::is_user('admin'))
			return $this->user->delete($id);
		return FALSE;
	}

	public function type_check($str) {

		return parent::is_user('admin') ? in_array($str, ['admin', 'teller', 'user']) : $str === 'user';
	}

	public function createCustomerView($id) {
		$person = $this->customer->with('person')->get_by(['person_id' => $id]);
		foreach ($person['person'] as $key => $value) {
			$person[$key] = $value;
		}
		$person['username'] = explode('@', $person['email'])[0];
		unset($person['person']);
		return parent::view('createUserAccount', $person);
	}

	public function changePass() {
		$this->form_validation->set_rules('oldPassword', 'Old Password', 'trim|required|min_length[8]|max_length[30]');
		$this->form_validation->set_rules('password', 'New Password', 'trim|required|min_length[8]|max_length[30]');
		$this->form_validation->set_rules('passconf', 'Verify Password', 'trim|required|matches[password]');

		if ($this->form_validation->run()) {
			if($this->user->authenticate_user(parent::current_user()->username, $this->input->post('oldPassword'))) {
				$this->user->update(parent::current_user()->username,[
					'password' => $this->encryption->encrypt($this->input->post('password')),
					'last_password_change' => date('Y-m-d H:i:s')
				]);
				$this->session->set_flashdata('message', 'Password Successfully Updated');
				return redirect('user/changePass'); // redirect to success
			}
			$this->session->set_flashdata('error_message',  'Invalid Credentials');
			return redirect('user/changePass'); // render create form w/ errors
		}
		$data['error_message'] = validation_errors();
	    $this->session->set_flashdata('error_message',  $data['error_message']);
	    
		return redirect('user/changePass'); // render create form w/ errors
	}

	public function t_dashboard() {
		if(parent::is_user('teller') || parent::is_user('admin')) {
			$tellers = count($this->user->get_many_by(['user_type' => 'teller']));
			$customers = count($this->customer->get_all());
			$accounts = count($this->account->get_all_protected());
			parent::view('t_profile', ['accounts' => $accounts, 'tellers' => $tellers, 'customers' => $customers]);
		
    	} else {
	      show_error("Forbidden Access", 403, "GET OUT OF HERE!!");
	    }
	}

	public function login() {
		if (!parent::current_user()) {
			$username = $_POST['username'] ?? null;
			$password = $_POST['password'] ?? null;

			if (!$this->user->authenticate_user($username, $password)) {
				return TRUE; // render login page
			}
		}
		return FALSE; // render dashboard
	}

	public function logout() {
		$this->session->unset_userdata("user");
		return TRUE; // render landing page
	}

}
