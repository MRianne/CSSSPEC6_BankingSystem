<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AccountTypeController extends BaseController {

	public function __construct() {
		parent::__construct();
	}

	public function create() {
		if (parent::is_user('admin')) {

			$current_user = parent::current_user();

			$this->form_validation->set_rules('type_id', 'ID', 'trim|required|is_unique[tbl_account_types.type_id]');
			$this->form_validation->set_rules('description', 'Name', 'trim|required');
			$this->form_validation->set_rules('initial_deposit', 'Initial Deposit', 'trim|required|decimal');
			$this->form_validation->set_rules('min_monthly_adb', 'Required Minimum Monthly ADB', 'trim|required|decimal');
			$this->form_validation->set_rules('req_daily_bal', 'Required Daily Balance to Earn Interest', 'trim|required|decimal');
			$this->form_validation->set_rules('interest_rate', 'Interest Rate (Per Annum)', 'trim|required|decimal');

			if ($this->form_validation->run()) {
				$this->account_type->insert([
					'type_id' => $this->utilities->create_random_string(),
					'description' => $this->input->post('description'),
					'initial_deposit' => $this->input->post('initial_deposit'),
					'min_monthly_adb' => $this->input->post('min_monthly_adb'),
					'req_daily_bal' => $this->input->post('req_daily_bal'),
					'interest_rate' => $this->input->post('interest_rate')
				]);
				return TRUE; // redirect to success
			}

			return FALSE; // render create form w/ errors
		} else {
			return FALSE; // return to page
		}
	}

	public function update($id) {
		if (parent::is_user('admin')) {

			$current_user = parent::current_user();
			$account_type = $this->account_type->get($id);
			
			$this->form_validation->set_rules('description', 'Name', 'trim|required');
			$this->form_validation->set_rules('initial_deposit', 'Initial Deposit', 'trim|required|decimal');
			$this->form_validation->set_rules('min_monthly_adb', 'Required Minimum Monthly ADB', 'trim|required|decimal');
			$this->form_validation->set_rules('req_daily_bal', 'Required Daily Balance to Earn Interest', 'trim|required|decimal');
			$this->form_validation->set_rules('interest_rate', 'Interest Rate (Per Annum)', 'trim|required|decimal');

			if ($this->form_validation->run()) {
				$this->account_type->update($id, [
					'description' => $this->input->post('description'),
					'initial_deposit' => $this->input->post('initial_deposit'),
					'min_monthly_adb' => $this->input->post('min_monthly_adb'),
					'req_daily_bal' => $this->input->post('req_daily_bal'),
					'interest_rate' => $this->input->post('interest_rate')
				]);
				return TRUE; // redirect to success
			}

			return FALSE; // render create form w/ errors
		} else {
			return FALSE; // return to page
		}
	}

	public function get_all() {
		return $this->account_type->get_all();
	}

	public function delete($id) {
		return $this->account_type->delete($id);
	}
}
