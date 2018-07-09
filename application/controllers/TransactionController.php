<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TransactionController extends BaseController {

	public function __construct() {
		parent::__construct();
	}

	public function otc_deposit() {
		if(parent::is_user('teller') || parent::is_user('admin')) {

			$current_user = parent::current_user();

			$this->form_validation->set_rules('account_id', 'Account Number', 'trim|required|numeric|exact_length[12]');
			$this->form_validation->set_rules('amount', 'Deposit Amount', 'trim|required|decimal');

			if($this->form_validation->run()) {
				$id = $this->input->post('account_id');

				if(!$this->account->validate_account($id)) {
					$this->session->set_flashdata('error_message',  "No Account with that Account Number.");
					return redirect('transact/otc/deposit'); // render create form w/ errors
				}

				$account = $this->account->get_protected($id);
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

				$this->session->set_flashdata('message', 'Transaction Successful');
				return redirect('transact/otc/deposit'); // redirect to success
			}
	      	$data['error_message'] = validation_errors();
		    $data['error_message'] = explode("</p>", $data['error_message']);
		    $this->session->set_flashdata('error_message',  $data['error_message'][0]);

			return redirect('transact/otc/deposit'); // render create form w/ errors
		} else {
			return show_error("Forbidden Access", 403, "GET OUT OF HERE!!"); // return to page
		}
	}

	public function otc_withdrawal() {
		if(parent::is_user('teller') || parent::is_user('admin')) {
			$current_user = parent::current_user();
			$this->form_validation->set_rules('account_id', 'Account Number', 'trim|required|numeric|exact_length[12]');
			$this->form_validation->set_rules('amount', 'Deposit Amount', 'trim|required|decimal');

			if($this->form_validation->run()) {
				$id = $this->input->post('account_id');

				if(!$this->account->validate_account($id)) {
					$this->session->set_flashdata('error_message',  "No Account with that Account Number.");
					return redirect('transact/otc/withdraw'); // render create form w/ errors
				}

				if(!$this->account->validate_balance($id, $this->input->post('amount'))) {
					$this->session->set_flashdata('error_message',  "Insufficient Balance.");
					return redirect('transact/otc/withdraw'); // Insufficient Balance
				}

				$account = $this->account->get_protected($id);
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

				$this->session->set_flashdata('message', 'Transaction Successful');
				return redirect('transact/otc/withdraw'); // redirect to success
			}
	      	$data['error_message'] = validation_errors();
		    $data['error_message'] = explode("</p>", $data['error_message']);
		    $this->session->set_flashdata('error_message',  $data['error_message'][0]);

			return redirect('transact/otc/withdraw'); // render create form w/ errors
		} else {
			return show_error("Forbidden Access", 403, "GET OUT OF HERE!!"); // return to page
		}
	}

	public function otc_fund_transfer() {

		if(parent::is_user('teller') || parent::is_user('admin')) {
			$current_user = parent::current_user();

			$this->form_validation->set_rules('from_account_id', 'Sender Account Number', 'trim|required|numeric|exact_length[12]');
			$this->form_validation->set_rules('to_account_id', 'Receiver Account Number', 'trim|required|numeric|exact_length[12]');
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

	public function online_fund_transfer() {

		if(parent::is_user('user')) {
			$current_user = parent::current_user();

			$this->form_validation->set_rules('from_account_id', 'Sender Account Number', 'trim|required|numeric|exact_length[12]');
			$this->form_validation->set_rules('to_account_id', 'Receiver Account Number', 'trim|required|numeric|exact_length[12]');
			$this->form_validation->set_rules('amount', 'Amount', 'trim|required|decimal');
			$this->form_validation->set_rules('account_pin', 'PIN', 'trim|required|min_length[4]');

			if($this->form_validation->run()) {
				if(!($this->account->validate_account($this->input->post('from_account_id')) && $this->account->validate_account($this->input->post('to_account_id')))){

					$this->session->set_flashdata('error_message',  "No Sender or Receiver Account with that Account Number.");
					return redirect('transact/online/transfer'); // render create form w/ errors
				}
				if(!$this->balance_check($this->input->post('from_account_id'), $this->input->post('amount'))) {

					$this->session->set_flashdata('error_message',  "Insufficient Funds.");
					return redirect('transact/online/transfer'); // render create form w/ errors
				}
				if(!$this->account->get_by(['customer_id' => $current_user->customer_id, 'account_id' => $this->input->post('from_account_id')])) {

					$this->session->set_flashdata('error_message',  "Account not found.");
					return redirect('transact/online/transfer'); // render create form w/ errors
				}

				if(!$this->account->authenticate_account($this->input->post('from_account_id'), $this->input->post('account_pin'))){
					$this->session->set_flashdata('error_message',  "Invalid PIN.");
					return redirect('transact/online/transfer'); // render create form w/ errors
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
					'description' => ONLINE_TRANSFER,
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
					'description' => ONLINE_TRANSFER,
					'amount' => $this->input->post('amount'),
					'type' => CREDIT,
					'balance' => $updated_account['balance'],
					'status' => SUCCESSFUL,
					'person_id' => $current_user->person_id,
					'date' => $updated_account['date_updated']
				]);
				$this->session->set_flashdata('message', 'Transaction Successful');
				return redirect('transact/online/transfer'); // redirect to success
			}
	      	$data['error_message'] = validation_errors();
		    $data['error_message'] = explode("</p>", $data['error_message']);
		    $this->session->set_flashdata('error_message',  $data['error_message'][0]);

			return redirect('transact/online/transfer'); // render create form w/ errors
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

	public function viewTransactionHist($id) {
		if(parent::is_user('user')) {
			$transactions = $this->transaction->get_many_by(['account_id' => $id]);
			return parent::customerView('viewTransactionHist', ['account_id' => $id, 'transactions' => $transactions]);
		} else {
			return show_error("Forbidden Access", 403, "GET OUT OF HERE!!"); // return to page
		}
	}

	public function online_fund_transfer_view() {
		if(parent::is_user('user')) {
			$accounts = $this->account->protected_get_many_by(['customer_id' => parent::current_user()->customer_id]);
			return parent::customerView('transfer', ['accounts' => $accounts]);
		} else {
			return show_error("Forbidden Access", 403, "GET OUT OF HERE!!"); // return to page
		}
	}

	public function get_my_transactions() {
		if(parent::is_user('user')) {
			$customer = $this->customer->with('accounts')->get(parent::current_user()->customer_id);
			
			foreach ($customer['accounts'] as $account) {
				unset($account['account_pin']);
				$id[] = $account['account_id'];
			}

			$transactions = $this->transaction->get_many_by('account_id', $id);
			return $this->output->set_output(json_encode($transactions, JSON_PRETTY_PRINT));
		} else {
			return show_error("Forbidden Access", 403, "GET OUT OF HERE!!"); // return to page
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

	public function calculate_interest() {
		$accounts = $this->account->get_all_protected();
		print_r("This view is for simulation of the interest computation. The interest is accumulated daily and credited to the account of the user every end of the month.<br>");
		foreach ($accounts as $account) {
			$req_daily_bal = $account['account_type']['req_daily_bal'];
			$min_monthly_adb = $account['account_type']['min_monthly_adb'];
			$interest_rate = $account['account_type']['interest_rate']/100;
			$interest_earned = 0.00;
			
			$days = $this->get_days(date('n'));

			for($day = 1; $day <= $days; $day++) {
				$date = date('Y') . '-' . date('m');
				if($day < 10)
					$date .= '-0' . $day;
				else
					$date .= '-' .$day;

				$transaction = $this->transaction->order_by('date', 'DESC')->get_by(['account_id' => $account['account_id'], "DATE_FORMAT(date, '%Y-%m-%d') = '$date'"]);

				if($transaction==[])
					$transaction['balance'] = $this->check_previous($account, $date);
				if($transaction['balance'] >= $req_daily_bal)
					$interest_earned += $transaction['balance'] * ($interest_rate/365);
				print_r('Day ' .$day .': '.$interest_earned . " Balance: " . $transaction['balance'] ."<br>");
				
			}
			$tax_withheld = $interest_earned * 0.20;
			
			# add interest earned

			$temp_acc = $this->account->get_protected($account['account_id']);
			$this->account->update($account['account_id'], [
				'balance' => $temp_acc['balance'] + $interest_earned
			]);
			$updt_acc = $this->account->get_protected($account['account_id']);
			$this->transaction->insert([
				'transaction_id' => $this->utilities->create_random_string(),
				'account_id' => $account['account_id'],
				'description' => INTEREST,
				'amount' => $interest_earned,
				'type' => CREDIT,
				'balance' => $updt_acc['balance'],
				'status' => SUCCESSFUL,
				'person_id' => 'DpSO5zlN8cY',
				'date' => $updt_acc['date_updated']
			]);

			# deduct tax withheld
			
			$temp_acc = $this->account->get_protected($account['account_id']);
			$this->account->update($account['account_id'], [
				'balance' => $temp_acc['balance'] - $tax_withheld
			]);
			$updt_acc = $this->account->get_protected($account['account_id']);
			$this->transaction->insert([
				'transaction_id' => $this->utilities->create_random_string(),
				'account_id' => $account['account_id'],
				'description' => WITHTAX,
				'amount' => $tax_withheld,
				'type' => DEBIT,
				'balance' => $updt_acc['balance'],
				'status' => SUCCESSFUL,
				'person_id' => 'DpSO5zlN8cY',
				'date' => $updt_acc['date_updated']
			]);
		}
	}

	protected function check_previous($account, $date){
		$date = date('Y-m-d' ,strtotime('-1 day', strtotime($date)));
		$transaction = $this->transaction->order_by('date', 'DESC')->get_by(['account_id' => $account['account_id'], "DATE_FORMAT(date, '%Y-%m-%d') = '$date'"]);
		if($transaction==[])
			if($date >= $account['date_created'])
				return $this->check_previous($account, $date);
			else
				return 0;
		else
			return $transaction['balance'];
	}
	protected function get_days($month) {
		switch ($month) {
			case 1:
			case 3:
			case 5:
			case 7:
			case 8:
			case 10:
			case 12:
				return 31; break;
			case 4:
			case 6:
			case 9:
			case 11:
				return 30; break;
			case 2: return date('L', strtotime(date('Y').'-01-01')) ? 29 : 28; break;
			default:
				show_error('Invalid Month', 500);
				break;
		}
	}
	public function interest() {


	}
}
