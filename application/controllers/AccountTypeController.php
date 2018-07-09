<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AccountTypeController extends BaseController {

	public function __construct() {
		parent::__construct();
	}

	public function create() {
		if (parent::is_user('admin')) {

			$current_user = parent::current_user();

			// $this->form_validation->set_rules('type_id', 'ID', 'trim|required|is_unique[tbl_account_types.type_id]');
			$this->form_validation->set_rules('description', 'Name', 'trim|required|alpha_numeric_spaces');
			$this->form_validation->set_rules('initial_deposit', 'Initial Deposit', 'trim|required|numeric');
			$this->form_validation->set_rules('min_monthly_adb', 'Required Minimum Monthly ADB', 'trim|required|numeric');
			$this->form_validation->set_rules('req_daily_bal', 'Required Daily Balance to Earn Interest', 'trim|required|numeric');
			$this->form_validation->set_rules('interest_rate', 'Interest Rate (Per Annum)', 'trim|required|numeric');

			if ($this->form_validation->run()) {
				$this->account_type->insert([
					'type_id' => $this->utilities->create_random_string(),
					'description' => $this->input->post('description'),
					'initial_deposit' => $this->input->post('initial_deposit'),
					'min_monthly_adb' => $this->input->post('min_monthly_adb'),
					'req_daily_bal' => $this->input->post('req_daily_bal'),
					'interest_rate' => $this->input->post('interest_rate')
				]);
				
				$this->session->set_flashdata('message', 'Account Type Successfully Added');
				return redirect('account/type/create'); // redirect to success
			}
	      	$data['error_message'] = validation_errors();
		    //$data['error_message'] = explode("</p>", $data['error_message']);
		    $this->session->set_flashdata('error_message',  $data['error_message']);

			return redirect('account/type/create'); // render create form w/ errors
		} else {
			return show_error("Forbidden Access", 403, "GET OUT OF HERE!!"); // return to page
		}
	}

	public function update($id) {
		if (parent::is_user('admin')) {

			$current_user = parent::current_user();
			$account_type = $this->account_type->get($id);
			
			$this->form_validation->set_rules('description', 'Account Name', 'trim|required|alpha_numeric_spaces');
			$this->form_validation->set_rules('initial_deposit', 'Initial Deposit', 'trim|required|numeric');
			$this->form_validation->set_rules('min_monthly_adb', 'Required Minimum Monthly ADB', 'trim|required|numeric');
			$this->form_validation->set_rules('req_daily_bal', 'Required Daily Balance to Earn Interest', 'trim|required|numeric');
			$this->form_validation->set_rules('interest_rate', 'Interest Rate (Per Annum)', 'trim|required|numeric');

			if ($this->form_validation->run()) {
				$this->account_type->update($id, [
					'description' => $this->input->post('description'),
					'initial_deposit' => $this->input->post('initial_deposit'),
					'min_monthly_adb' => $this->input->post('min_monthly_adb'),
					'req_daily_bal' => $this->input->post('req_daily_bal'),
					'interest_rate' => $this->input->post('interest_rate')
				]);
				
				$this->session->set_flashdata('message', 'Account Type Successfully Updated.');
				return redirect('account/type/edit/'.$id); // redirect to success
			}
	      	$data['error_message'] = validation_errors();
		    //$data['error_message'] = explode("</p>", $data['error_message']);
		    $this->session->set_flashdata('error_message',  $data['error_message']);

			return redirect('account/type/edit/'.$id); // render create form w/ errors
		} else {
			return show_error("Forbidden Access", 403, "GET OUT OF HERE!!"); // return to page
		}
	}

	public function listAccountTypes() {
		if(parent::is_user('admin')) {
			$account_types = $this->account_type->get_all();
			return parent::view('listAccountTypes', ['account_types' => $account_types]);
		} else {
			return show_error("Forbidden Access", 403, "GET OUT OF HERE!!"); // return to page
		}
	}

	public function viewAccountType($id) {
		if(parent::is_user('admin')) {
			$account_type = $this->account_type->get($id);
			return parent::view('viewAccountType', $account_type);
		} else {
			return show_error("Forbidden Access", 403, "GET OUT OF HERE!!"); // return to page
		}
	}

	public function editAccountType($id) {
		if(parent::is_user('admin')) {
			$account_type = $this->account_type->get($id);
			return parent::view('editAccountType', $account_type);
		} else {
			return show_error("Forbidden Access", 403, "GET OUT OF HERE!!"); // return to page
		}
	}

	public function get_all() {
		if(parent::is_user('admin'))
			return $this->account_type->get_all();
		return FALSE;
	}

	public function delete($id) {
		if(parent::is_user('admin')){
			$this->account_type->delete($id);
			$this->session->set_flashdata('message', 'Account Type Successfully Deleted.');
			return redirect('account/type/view'); // redirect to success

		} else {
			return show_error("Forbidden Access", 403, "GET OUT OF HERE!!"); // return to page
		}
	}
}
