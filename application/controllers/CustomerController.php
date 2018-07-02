<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CustomerController extends BaseController {

	public function __construct() {
		parent::__construct();
	}

	public function create() {
		if (parent::is_user('admin') || parent::is_user('teller')) {

			$current_user = parent::current_user();

			$this->form_validation->set_rules('first_name', 'First name', 'trim|required|alpha');
			$this->form_validation->set_rules('middle_name', 'Middle name', 'trim|required|alpha');
			$this->form_validation->set_rules('last_name', 'Last name', 'trim|required|alpha');
			$this->form_validation->set_rules('gender', 'Gender', 'trim|required');
			$this->form_validation->set_rules('present_address', 'Present Address', 'trim|required|max_length[200]');
			$this->form_validation->set_rules('permanent_address', 'Permanent Address', 'trim|required|max_length[200]');
			$this->form_validation->set_rules('email', 'E-mail address', 'trim|required|valid_email|is_unique[tbl_customers.email]');
			$this->form_validation->set_rules('contact_no', 'Contact no.', 'trim|required');
			$this->form_validation->set_rules('birth_date', 'Date of Birth', 'trim|required');
			$this->form_validation->set_rules('birth_place', 'Place of Birth', 'trim|required');
			$this->form_validation->set_rules('nationality', 'nationality', 'trim|required|alpha');
			$this->form_validation->set_rules('citizenship', 'citizenship', 'trim|required|alpha');
			$this->form_validation->set_rules('sss_no', 'sss_no', 'trim|required|exact_length[10]');
			$this->form_validation->set_rules('tin_no', 'tin_no', 'trim|required|exact_length[9]');
			$this->form_validation->set_rules('employment_status', 'employment_status', 'trim|required|alpha');
			$this->form_validation->set_rules('nature_of_employment', 'nature_of_employment', 'trim|required|alpha');
			$this->form_validation->set_rules('source_of_funds', 'source_of_funds', 'trim|required|alpha');
					
			if ($this->form_validation->run()) {
				$person_id = parent::create_person([
					'first_name' => $this->input->post('first_name'),
					'middle_name' => $this->input->post('middle_name'),
					'last_name' => $this->input->post('last_name')
				]);
				$customer_id = $this->utilities->create_random_string();
				$this->customer->insert([
					'customer_id' => $customer_id,
					'person_id' => $person_id,
					'gender' => $this->input->post('gender'),
					'present_address' => $this->input->post('present_address'),
					'permanent_address' => $this->input->post('permanent_address'),
					'email' => $this->input->post('email'),
					'contact_no' => $this->input->post('contact_no'),
					'birth_date' => $this->input->post('birth_date'),
					'birth_place' => $this->input->post('birth_place'),
					'nationality' => $this->input->post('nationality'),
					'citizenship' => $this->input->post('citizenship'),
					'sss_no' => $this->input->post('sss_no'),
					'tin_no' => $this->input->post('tin_no'),
					'employment_status' => $this->input->post('employment_status'),
					'nature_of_employment' => $this->input->post('nature_of_employment'),
					'source_of_funds' => $this->input->post('source_of_funds') 
				]);
				$this->session->set_flashdata('message', 'Customer Information Saved');
				return redirect('account/create/' . $customer_id); // redirect to success
			}
	      	$data['error_message'] = validation_errors();
		    $data['error_message'] = explode("</p>", $data['error_message']);
		    $this->session->set_flashdata('error_message',  $data['error_message'][0]);

			return redirect('customer/create'); // render create form w/ errors
		} else {
			return show_error("Forbidden Access", 403, "GET OUT OF HERE!!"); // return to page
		}
	}

	public function update($id) {
		if (parent::is_user('admin') || parent::is_user('teller')) {
			$customer = $this->customer->get($id);
			$current_user = parent::current_user();

			$this->form_validation->set_rules('first_name', 'First name', 'trim|required|alpha');
			$this->form_validation->set_rules('middle_name', 'Middle name', 'trim|required|alpha');
			$this->form_validation->set_rules('last_name', 'Last name', 'trim|required|alpha');
			$this->form_validation->set_rules('gender', 'Gender', 'trim|required');
			$this->form_validation->set_rules('present_address', 'Present Address', 'trim|required|max_length[200]');
			$this->form_validation->set_rules('permanent_address', 'Permanent Address', 'trim|required|max_length[200]');
			$this->form_validation->set_rules('email', 'E-mail address', 'trim|required|valid_email|is_unique[tbl_customers.email]');
			$this->form_validation->set_rules('contact_no', 'Contact no.', 'trim|required');
			$this->form_validation->set_rules('birth_date', 'Date of Birth', 'trim|required');
			$this->form_validation->set_rules('birth_place', 'Place of Birth', 'trim|required');
			$this->form_validation->set_rules('nationality', 'nationality', 'trim|required|alpha');
			$this->form_validation->set_rules('citizenship', 'citizenship', 'trim|required|alpha');
			$this->form_validation->set_rules('sss_no', 'sss_no', 'trim|required|exact_length[10]');
			$this->form_validation->set_rules('tin_no', 'tin_no', 'trim|required|exact_length[9]');
			$this->form_validation->set_rules('employment_status', 'employment_status', 'trim|required|alpha');
			$this->form_validation->set_rules('nature_of_employment', 'nature_of_employment', 'trim|required|alpha');
			$this->form_validation->set_rules('source_of_funds', 'source_of_funds', 'trim|required|alpha');
					
			if ($this->form_validation->run()) {
				parent::update($customer['person_id'], [
					'first_name' => $this->input->post('first_name'),
					'middle_name' => $this->input->post('middle_name'),
					'last_name' => $this->input->post('last_name')
				]);

				$this->customer->update($id, [
					'gender' => $this->input->post('gender'),
					'present_address' => $this->input->post('present_addres'),
					'permanent_address' => $this->input->post('permanent_address'),
					'email' => $this->input->post('email'),
					'contact_no' => $this->input->post('contact_no'),
					'birth_date' => $this->input->post('birth_date'),
					'birth_place' => $this->input->post('birth_place'),
					'nationality' => $this->input->post('nationality'),
					'citizenship' => $this->input->post('citizenship'),
					'sss_no' => $this->input->post('sss_no'),
					'tin_no' => $this->input->post('tin_no'),
					'employment_status' => $this->input->post('employment_status'),
					'nature_of_employment' => $this->input->post('nature_of_employment'),
					'source_of_funds' => $this->input->post('source_of_funds') 
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
			return $this->customer->get_all();
		return FALSE;
	}

	public function delete($id) {
		if(parent::is_user('admin'))
			return $this->customer->delete($id);
		return FALSE;
	}
}
