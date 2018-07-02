<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TransactionController extends BaseController {

	public function __construct() {
		parent::__construct();
	}

	public function otc_deposit($id) {
		if(parent::is_user('teller')) {

			$current_user = parent::current_user();
			$account = $this->account->get_protected($id);
			$this->form_validation->set_rules('amount', 'Deposit Amount', 'trim|required|decimal');

			if($this->form_validation->run()) {
				$this->account->update($id, [
					'balance' => $account['balance'] + $this->input->post('amount')
				]);

				$updated_account = $this->account->get_protected($id);
				$this->transaction->insert([
					'transaction_id' => $this->utilities->create_random_string(),
					'account_id' => $id,
					'description' => OTC_DEPOSIT,
					'amount' => $this->input->post('amount'),
					'type' => CREDIT,
					'balance' => $updated_account['balance'],
					'status' => SUCCESSFUL,
					'person_id' => $current_user->person_id,
					'date' => $updated_account['date_updated']
				]);

				return TRUE;
			}
			return FALSE;
		} else {
			return FALSE;
		}
	}

	public function otc_withdrawal($id) {
		if(parent::is_user('teller')) {
			$current_user = parent::current_user();
			$account = $this->account->get_protected($id);
			$this->form_validation->set_rules('amount', 'Deposit Amount', 'trim|required|decimal');

			if($this->form_validation->run()) {
				if($this->account->validate_balance($id)) {

					$this->account->update($id, [
						'balance' => $account['balance'] - $this->input->post('amount')
					]);

					$updated_account = $this->account->get_protected($id);
					$this->transaction->insert([
						'transaction_id' => $this->utilities->create_random_string(),
						'account_id' => $id,
						'description' => OTC_WITHDRAWAL,
						'amount' => $this->input->post('amount'),
						'type' => DEBIT,
						'balance' => $updated_account['balance'],
						'status' => SUCCESSFUL,
						'person_id' => $current_user->person_id,
						'date' => $updated_account['date_updated']
					]);

					return TRUE; // redirect to success
				} else {
					return FALSE; // insufficient balance
				}
			}
			return FALSE; // render create form w/ errors
		} else {
			return FALSE; // return to page
		}
	}

	public function otc_fund_transfer() {

		if(parent::is_user('teller') || parent::is_user('admin')) {
			$current_user = parent::current_user();

			$this->form_validation->set_rules('from_account_id', 'Account ID', 'trim|required|numeric|exact_length[12]');
			$this->form_validation->set_rules('to_account_id', 'Account ID', 'trim|required|numeric|exact_length[12]');
			$this->form_validation->set_rules('amount', 'Amount', 'trim|required|decimal');
			
			if($this->form_validation->run()) {
				if(!($this->account->validate_account($this->input->post('from_account_id')) && $this->account->validate_account($this->input->post('to_account_id')))){

					$this->session->set_flashdata('error_message',  "No Sender or Receiver Account with that Account Number.");
					return redirect('transact/transfer'); // render create form w/ errors
				}
				if(!$this->balance_check($this->input->post('from_account_id'), $this->input->post('amount'))) {

					$this->session->set_flashdata('error_message',  "Insufficient Funds.");
					return redirect('transact/transfer'); // render create form w/ errors
				}
				// Sender Account
				$account = $this->account->get_protected($this->input->post('from_account_id'));
				$this->account->update($this->input->post('from_account_id'), [
					'balance' => $account['balance'] - $this->input->post('amount')
				]);
				$updated_account = $this->account->get_protected($_POST['from_account_id']);
				$this->transaction->insert([
					'transaction_id' => $this->utilities->create_random_string(),
					'account_id' => $this->input->post('from_account_id'),
					'description' => OTC_TRANSFER,
					'amount' => $this->input->post('amount'),
					'type' => DEBIT,
					'balance' => $updated_account['balance'],
					'status' => SUCCESSFUL,
					'person_id' => $current_user->person_id,
					'date' => $updated_account['date_updated']
				]);

				// Receiver Account
				$account = $this->account->get_protected($this->input->post('to_account_id'));
				$this->account->update($this->input->post('to_account_id'), [
					'balance' => $account['balance'] + $this->input->post('amount')
				]);
				$updated_account = $this->account->get_protected($this->input->post('to_account_id'));
				$this->transaction->insert([
					'transaction_id' => $this->utilities->create_random_string(),
					'account_id' => $this->input->post('to_account_id'),
					'description' => OTC_TRANSFER,
					'amount' => $this->input->post('amount'),
					'type' => CREDIT,
					'balance' => $updated_account['balance'],
					'status' => SUCCESSFUL,
					'person_id' => $current_user->person_id,
					'date' => $updated_account['date_updated']
				]);
				$this->session->set_flashdata('message', 'Transaction Successful');
				return redirect('transact/transfer'); // redirect to success
			}
	      	$data['error_message'] = validation_errors();
		    $data['error_message'] = explode("</p>", $data['error_message']);
		    $this->session->set_flashdata('error_message',  $data['error_message'][0]);

			return redirect('transact/transfer'); // render create form w/ errors
		} else {
			return show_error("Forbidden Access", 403, "GET OUT OF HERE!!"); // return to page
		}
	}

	public function balance_check($id, $amount) {
		$account = $this->account->get_protected($id);
		if($account['balance'] >= $amount)
			return TRUE;
		else {
			return FALSE;	
		}
	}

	public function get_all() {
		if(parent::is_user('admin') || parent::is_user('teller'))
			return $this->transaction->get_all();
		return FALSE;
	}

	public function delete($id) {
		if(parent::is_user('admin'))
			return $this->transaction->delete($id);
		return FALSE;
	}
}
