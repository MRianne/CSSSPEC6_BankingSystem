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
				if($this->account->validate_balance($id))

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
