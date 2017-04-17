<?php

namespace App;

use DB;

use Cache;

use Input;

use Session;

use stdClass;

use Validator;

use App;

class UserModel {


     //Get Summary Data
    public static function getSummaryData($user_id)
    {
        $cache_key = 'getUserSummary'.$user_id;
        $data = [];
        
        $transactions = Cache::remember($cache_key,5,function() use($user_id){
            $transactions = DB::table('transactions')
                                ->where('user_id',$user_id)
                                ->where('status', '<>', 'Initiated')
                                ->select('id','currency','amount','status','currency_val','exchange_val','created_at','type','ref_no', 'statement')
                                ->take(5)
                                ->orderBy('created_at','DESC')
                                ->get();

            return $transactions;
        });

        $user_country = DB::table('users')
                            ->join('countries', 'users.country_id', '=', 'countries.id')
                            ->join('states', 'users.state_id', '=', 'states.id')
                            ->where('users.id',$user_id)
                            ->select('states.state', 'countries.country')
                            ->get();

        $total_transactions = count(DB::table('transactions')
                                ->where('user_id',$user_id)
                                ->where('status', '<>', 'Initiated')
                                ->orderBy('created_at','DESC')
                                ->get());

        $total_buy_transactions = count(DB::table('transactions')
                                ->where('user_id',$user_id)
                                ->where('status', '<>', 'Initiated')
                                ->where('type', 'Buy')
                                ->orderBy('created_at','DESC')
                                ->get());

        $total_sell_transactions = count(DB::table('transactions')
                                ->where('user_id',$user_id)
                                ->where('status', '<>', 'Initiated')
                                ->where('type', 'Sell')
                                ->orderBy('created_at','DESC')
                                ->get());

        $total_failed_transactions = count(DB::table('transactions')
                                ->where('user_id',$user_id)
                                ->where('status', 'Failed')
                                ->orderBy('created_at','DESC')
                                ->get());

        $currencies = DB::table('currencies')
                                     ->where('status','enabled')
                                     ->select('buy_value','sell_value','currency_name','alias')
                                     ->get();                  

        $notifications = DB::table('notifications')
                                     ->where('user_id',$user_id)
                                     ->select('notices','added')
                                     ->get();

        $data['first_name'] = Session::get('first_name');
        $data['last_name'] = Session::get('last_name');
        $data['last_login'] = Session::get('last_login');
        $data['userCountry'] = $user_country;
        $data['transactions'] = $transactions;
        $data['transactionsTotal'] = $total_transactions;
        $data['transactionsBuy'] = $total_buy_transactions;
        $data['transactionsSell'] = $total_sell_transactions;
        $data['transactionsFailed'] = $total_failed_transactions;
        $data['currencies'] = $currencies;
        $data['messages'] = $notifications;

        return $data;
    }

    //Process Buy
    public static function buy()
    {
        $data = Input::all();
        $user_id = Session::get('user_id');
        $currency = DB::table('currencies')
                                ->where('currency_name',Input::get('buy_currency'))
                                ->select('currency_name','buy_value')
                                ->first();

        $amount = Input::get('buy_amount');                       
        $exchange = Input::get('buy_amount') * $currency->buy_value;
        $exchange_kobo = $exchange * 100;
        $ref_no = $user_id.time();

        
        $site_redirect = 'https://web.ntradex.com/users/payment-summary';
        $product_id = '6218';
        $pay_item_id = '101';
        $web_pay_currency = '566';
        $mac_key = '642AD5855E9E3CA9C8D83BCBD73944BBC9F20FA75D02C0FF04F4A6A99A191CF36249A5C414D85ACDBB173C7DAFB993F70E778373FBE130D9132EBE43B91BF676';
        $hash_val = hash('sha512', $ref_no.$product_id.$pay_item_id.$exchange_kobo.$site_redirect.$mac_key);
                            
        DB::table('transactions')
                            ->insert(
                                    array(
                                            'user_id'=> $user_id,
                                            'currency'=> $currency->currency_name,
                                            'currency_val'=> $currency->buy_value,
                                            'amount'=> Input::get('buy_amount'),
                                            'exchange_val'=> $exchange,
                                            'type'  =>  'Buy',
                                            'status' => 'Pending',
                                            'ref_no' => $ref_no,
                                            'statement' => '',
                                            'created_at'=>date('Y-m-d H:i:s')
                                          )
                                    );

        Cache::forget('getUserSummary'.$user_id);
        Cache::forget('getUserTransactions'.$user_id);
        Cache::forget('getTransactions');
        
        return [
                'ref_no' => $ref_no,
                'mac_key' => $mac_key,
                'hash_val' => $hash_val,
                'redirect_url' => $site_redirect,
                'product_id' => $product_id,
                'pay_item_id' => $pay_item_id,
                'currency'   => $web_pay_currency
        ];
        
     }

    //Buy Review
    public static function buyReview($others)
    {
        $data = Input::all();
        $user_id = Session::get('user_id');
        $first_name = Session::get('first_name');
        $last_name = Session::get('last_name');
        $email = Session::get('email');
        $currency_name = strtolower(Input::get('buy_currency'));
        
        $currency = DB::table('currencies')
                                ->where('currency_name',Input::get('buy_currency'))
                                ->select('currency_name','buy_value')
                                ->first();

        $amount = Input::get('buy_amount') * $currency->buy_value;
        $amount_kobo = $amount * 100; //convert to kobo


        $currency_set = DB::table('currencies_selected')
                                    ->where('user_id',$user_id)
				                    ->select('*')
                                    ->first();


        if (!is_null($currency_set) && (!isset($currency_set->$currency_name))) {
                $data['status'] = true;
                $data['user_id'] = $user_id;
                $data['amount_summary'] = $amount;
                $data['amount'] = $amount_kobo;
                $data['currency_name'] = $currency_name;
                $data['currency_amount'] = Input::get('buy_amount');
                $data['first_name'] = $first_name;
                $data['last_name'] = $last_name;
                $data['email'] = $email;
                $data['ref_no'] = $others['ref_no'];
                $data['mac_key'] = $others['mac_key'];
                $data['hash_val'] = $others['hash_val'];
                $data['redirect_url'] = $others['redirect_url'];
                $data['product_id'] = $others['product_id'];
                $data['pay_item_id'] = $others['pay_item_id'];
                $data['currency'] = $others['currency'];
            
            return $data;
        }

        $data['status'] = false;
        return $data;
     }


    public static function getPaymentDetails($user_id, $ref_no)
   {
     $details = DB::table('transactions')
                                ->where('user_id',$user_id)
                                ->where('ref_no',$ref_no)
                                ->first();
      return $details;

   }

   public static function updatePayment($user_id, $ref_no, $status, $event, $payment_method, $payment_ref = null, $response_code)
   {
     $details = DB::table('transactions')
                                ->where('user_id',$user_id)
                                ->where('ref_no',$ref_no)
                                ->update(
                                      array('status' => $status, 'statement' => $event, 'payment_method' => $payment_method, 'payment_ref' => $payment_ref, 'response_code' => $response_code)       
                                 );  
       if ($details) {
            $details = DB::table('transactions')
                                    ->where('user_id',$user_id)
                                    ->where('ref_no',$ref_no)
                                    ->first();

         $data['user_id'] = Session::get('user_id');
         $data['first_name'] = Session::get('first_name');
         $data['last_name'] = Session::get('last_name');
         $data['email'] = Session::get('email');
         $data['currency_name'] = $details->currency;
         $data['amount'] = $details->exchange_val;
         $data['currency_amount'] = $details->amount;
         $data['ref_no'] = $ref_no;
         $data['event'] = $event;
         $data['payment_ref'] = $payment_ref;
         $data['payment_method'] = $payment_method;
         $data['response_code'] = $response_code;
        
         Cache::forget('getUserSummary'.$user_id);
         Cache::forget('getUserTransactions'.$user_id);
         Cache::forget('getTransactions');
         Cache::forget('getTransaction'. $details->id);
         return $data;
        } else {
          return null;
        }
   }

     //Process Sell
     public static function sell()
    {
        $data = Input::all();
        $user_id = Session::get('user_id');
        $currency = DB::table('currencies')
                                ->where('currency_name', Input::get('sell_currency'))
                                ->select('currency_name', 'sell_value')
                                ->first();

        $exchange = Input::get('sell_amount') * $currency->sell_value;
        $ref_no = $user_id.time();
                            
        DB::table('transactions')
                            ->insert(
                                    array(
                                            'user_id'=>$user_id,
                                            'currency'=>$currency->currency_name,
                                            'currency_val'=>$currency->sell_value,
                                            'amount'=> Input::get('sell_amount'),
                                            'exchange_val'=> $exchange,
                                            'type'  =>  'Sell',
                                            'status' => 'Pending',
                                            'ref_no' => $ref_no,
                                            'created_at'=>date('Y-m-d H:i:s')
                                          )
                                    );

        Cache::forget('getUserSummary'.$user_id);
        Cache::forget('getUserTransactions'.$user_id);

        return $ref_no;
     }

    //Sell review data
     public static function getSellDetails()
    {
        $data = Input::all();
        $currency_name = strtolower(Input::get('sell_currency'));
        $user_id = Session::get('user_id');
        $currency = DB::table('currencies')
                                ->where('currency_name', Input::get('sell_currency'))
                                ->select('currency_name', 'sell_value')
                                ->first();

        $currency_set = DB::table('currencies_selected')
                                    ->where('user_id',$user_id)
                                    ->first();

         if (!is_null($currency_set) && (!isset($currency_set->$currency_name))) {
          return [
             'currency' => $currency,
             'input' => $data,
             'status' => true
          ];
       }
        return [
          'status' => false
        ];
     }

    //Validate Buy
    public static function validateBuy()
    {
        $rules = array(
                        'buy_currency' => 'required',
                        'buy_amount' => 'required|max:3|min:2'
                      );

        $validator = Validator::make(Input::all(),$rules);
        return $validator;
    }

    //Validate Sell
    public static function validateSell()
    {
        $rules = array(
                        'sell_currency' => 'required',
                        'sell_amount' => 'required|max:3|min:2'
                        );

        $validator = Validator::make(Input::all(),$rules);
        return $validator;
    }

    //Get Currency
    public static function getCurrencies()
    {
        $currencies = DB::table('currencies')
                                     ->where('status','enabled')
                                     ->select('id','currency_name','buy_value','sell_value','image')
                                     ->get();
        return $currencies;
    }

    //Get Transactions
    public static function getTransactions($user_id)
    {

        $cache_key = 'getUserTransactions'.$user_id;
        $data = Cache::remember($cache_key,5,function() use($user_id)
        {
            $data = DB::table('transactions')
                                ->where('user_id',$user_id)
                                ->where('status', '<>', 'Initiated')
                                ->select('id','currency','amount','currency_val','exchange_val','created_at','type','ref_no','status')
                                ->orderBy('created_at','DESC')
                                ->limit(20)
                                ->get();
            return $data;
        });
        return $data; 
    }

    //Get Transaction
    public static function getTransaction($user_id, $transaction_id)
    {
        $data = DB::table('transactions')
                                ->where('user_id',$user_id)
                                ->where('status','<>', 'Initiated')
                                ->where('id',$transaction_id)
                                ->select('currency','amount','currency_val','exchange_val','created_at','type','ref_no','status', 'statement', 'payment_method', 'payment_ref')
                                ->orderBy('created_at','DESC')
                                ->first();
        return $data;
    }

    //Get User Data
    public static function getUserData($user_id)
    {
        $user = DB::table('users')
                            ->where('id',$user_id)
                            ->select('first_name', 'username', 'country_id', 'state_id', 'sex', 'dob', 'address', 'last_name','email','phone_no','bank_account','bank_name','account_name','bank_sort','bank_swift','bank_iban')
                            ->first();

        $user_country = DB::table('users')
                            ->join('countries', 'users.country_id', '=', 'countries.id')
                            ->join('states', 'users.state_id', '=', 'states.id')
                            ->where('users.id',$user_id)
                            ->select('states.state', 'countries.country')
                            ->get();

       $currencies = DB::table('currencies_selected')
                                    ->where('user_id',$user_id)
                                    ->first();

        $banks = DB::table('banks')
                                    ->select('id', 'bank_name')
                                    ->where('status', 'enabled')
                                    ->get();

        $total_transactions = count(DB::table('transactions')
                                ->where('user_id',$user_id)
                                ->where('status', '<>', 'Initiated')
                                ->orderBy('created_at','DESC')
                                ->get());

        $total_buy_transactions = count(DB::table('transactions')
                                ->where('user_id',$user_id)
                                ->where('status', '<>', 'Initiated')
                                ->where('type', 'Buy')
                                ->orderBy('created_at','DESC')
                                ->get());

        $total_sell_transactions = count(DB::table('transactions')
                                ->where('user_id',$user_id)
                                ->where('status', '<>', 'Initiated')
                                ->where('type', 'Sell')
                                ->orderBy('created_at','DESC')
                                ->get());

        $total_failed_transactions = count(DB::table('transactions')
                                ->where('user_id',$user_id)
                                ->where('status', 'Failed')
                                ->orderBy('created_at','DESC')
                                ->get());

        if(is_null($currencies))
        {
            $currencies = new stdClass;
            $currencies->payza = "";
            $currencies->payza_email = "";
            $currencies->solidtrust = ""; 
            $currencies->solidtrust_email = "";
            $currencies->bitcoin_email = ""; 
            $currencies->bitcoin_address = "";
            $currencies->neteller = ""; 
            $currencies->neteller_email = "";
            $currencies->egopay = ""; 
            $currencies->egopay_email = "";
            $currencies->okpay = ""; 
            $currencies->okpay_acct = "";
            $currencies->binary_email = ""; 
            $currencies->binary_acct = "";
            $currencies->perfectmoney_email = "";
            $currencies->perfectmoney_acct = ""; 
            $currencies->webmoney = ""; 
            $currencies->webmoney_acct = "";
        }

        $data['info'] = $user;
        $data['currencies'] = $currencies;
        $data['userCountry'] = $user_country;
        $data['transactionsTotal'] = $total_transactions;
        $data['banks'] = $banks;
        $data['transactionsBuy'] = $total_buy_transactions;
        $data['transactionsSell'] = $total_sell_transactions;
        $data['transactionsFailed'] = $total_failed_transactions;
        return $data;
    }

    //Edit User Information
    public static function editUserInfo($user_id)
    {

        $update_data = array(
                         'first_name' => Input::get('first_name'),
                         'last_name' => Input::get('last_name'),
                         'phone_no' => Input::get('phone_no'),
                         'dob' => Input::get('dob'),
                         'address' => Input::get('address'),
                         'email' => Session::get('email'),
                         'username' => Session::get('username')
                        );

       $update = DB::table('users')
                    ->where('id',$user_id)
                    ->update($update_data);  

        Session::put('first_name',Input::get('first_name'));
        Session::put('last_name',Input::get('last_name'));
        Session::put('phone_no',Input::get('phone_no'));
        Session::put('dob',Input::get('dob'));
        Session::put('address',Input::get('address'));
        Session::put('email',Session::get('email'));
        Session::put('username',Session::get('username'));

        return $update_data;
    }

     //Validate User Information
    public static function validateInfo()
    {
        $rules = array(
                        'first_name'=>'required|alpha|max:20|min:3',
                        'last_name'=>'required|alpha|max:20|min:3',
                        'phone_no'=>'required|max:20|min:11',
                        'dob'=>'required',
                        'address'=>'required|max:50|min:10'
                      );

        $data = Input::except('email','edit_info','username');
        $validator = Validator::make($data,$rules);
        return $validator;
    }

    //Edit Password
    public static function editPassword($user_id)
    {
    
        $new_password = Input::get('new_password');
        $old_password = Input::get('old_password');

        $get_password = DB::table('users')->where('id',$user_id)->select('password')->first();

        $update_data = array(
                         'password' =>md5($new_password),
                         'first_name' => Session::get('first_name'),
                         'last_name' => Session::get('last_name'),
                         'email' => Session::get('email')
                        );

        if(md5($old_password)==$get_password->password)
        {
            $update = DB::table('users')->where('id',$user_id)->update($update_data);
            return true; 
        }
        else
        {
            return false;
        }

        Session::put('email',Session::get('email'));
        Session::put('first_name',Session::get('first_name'));
        Session::put('last_name',Session::get('last_name'));
    }

    //Edited Password
    public static function editedPassword($user_id)
    {
        $updated_data = array(
                         'first_name' => Session::get('first_name'),
                         'last_name' => Session::get('last_name'),
                         'email' => Session::get('email')
                        );

        $update = DB::table('users')->where('id',$user_id)->update($updated_data); 

        Session::put('email',Session::get('email'));
        Session::put('first_name',Session::get('first_name'));
        Session::put('last_name',Session::get('last_name'));

        return $updated_data;
    }

    //Validate Password
    public static function validatePassword()
    {
        $rules = array(
                        'old_password'=>'required',
                        'new_password'=>'required|min:8|max:20',
                      );

        $validator = Validator::make(Input::all(),$rules);
        return $validator;

    }

    //Edit EWallets
    public static function editECurrencies($user_id)
    {
        
        $check = DB::table('currencies_selected')->where('user_id',$user_id)->first();
        $update_data = array(
                                                    'payza' => Input::get('payza'),
                                                    'payza_email' => Input::get('payza_email'),
                                                    'solidtrust' => Input::get('solidtrust'),
                                                    'solidtrust_email' => Input::get('solidtrust_email'),
                                                    'bitcoin_email' => Input::get('bitcoin_email'),
                                                    'bitcoin_address' => Input::get('bitcoin_address'),
                                                    'neteller' => Input::get('neteller'),
                                                    'neteller_email' => Input::get('neteller_email'),
                                                    'egopay' => Input::get('egopay'),
                                                    'egopay_email' => Input::get('egopay_email'),
                                                    'okpay' => Input::get('okpay'),
                                                    'okpay_acct' => Input::get('okpay_acct'),
                                                    'binary_email' => Input::get('binary_email'),
                                                    'binary_acct' => Input::get('binary_acct'),
                                                    'perfectmoney_email' => Input::get('perfectmoney_email'),
                                                    'perfectmoney_acct' => Input::get('perfectmoney_acct'),
                                                    'webmoney' => Input::get('webmoney'),
                                                    'webmoney_acct' => Input::get('webmoney_acct')
                                                 );
        $insert_data = array(
                                                    'user_id' => $user_id,
                                                    'payza' => Input::get('payza'),
                                                    'payza_email' => Input::get('payza_email'),
                                                    'solidtrust' => Input::get('solidtrust'),
                                                    'solidtrust_email' => Input::get('solidtrust_email'),
                                                    'bitcoin_email' => Input::get('bitcoin_email'),
                                                    'bitcoin_address' => Input::get('bitcoin_address'),
                                                    'neteller' => Input::get('neteller'),
                                                    'neteller_email' => Input::get('neteller_email'),
                                                    'egopay' => Input::get('egopay'),
                                                    'egopay_email' => Input::get('egopay_email'),
                                                    'okpay' => Input::get('okpay'),
                                                    'okpay_acct' => Input::get('okpay_acct'),
                                                    'binary_email' => Input::get('binary_email'),
                                                    'binary_acct' => Input::get('binary_acct'),
                                                    'perfectmoney_email' => Input::get('perfectmoney_email'),
                                                    'perfectmoney_acct' => Input::get('perfectmoney_acct'),
                                                    'webmoney' => Input::get('webmoney'),
                                                    'webmoney_acct' => Input::get('webmoney_acct'),
                                                 );
        if(!is_null($check))
        {
            $update = DB::table('currencies_selected')
                                ->join('users', 'currencies_selected.user_id', '=', 'users.id')
                                ->where('user_id',$user_id)
                                ->update($update_data);
        }
        else
        {
            $insert = DB::table('currencies_selected')
                                ->insert($insert_data);
        }

        return $update_data;

    }

    //Validate EWallets
    public static function validateECurrencies()
    {
        
        $rules = array(
                        'egopay_email'=>'email',
                        'bitcoin_email'=>'email', 
			            'bitcoin_address'=>'alpha_num',
                        'neteller_email'=>'email',
                        'payza_email'=>'email',
                        'solidtrust_email'=>'email',
                        'okpay_acct'=>'alpha_num',
			            'binary_email'=>'email',
                        'binary_acct'=>'alpha_num',
			            'perfectmoney_email'=>'email',
                        'perfectmoney_acct'=>'alpha_num',
                        'webmoney_acct'=>'alpha_num'
                      );
	$validator = Validator::make(Input::all(),$rules);
       	 return $validator;

    }


    //Edit Bank Details
    public static function editBankDetails($user_id)
    {
        $bank_account = Input::get('bank_account');

        $account_name = Input::get('account_name');

        $bank_sort = Input::get('bank_sort');

        $bank_swift = Input::get('bank_swift');

        $bank_iban = Input::get('bank_iban');

        $update_data = array(
                                            'bank_name' => Input::get('bank_name'),
                                            'bank_account' => Input::get('bank_account'), 
                                            'account_name' => Input::get('account_name'),
                                            'bank_sort' => Input::get('bank_sort'), 
                                            'bank_iban' => Input::get('bank_iban'), 
                                            'bank_swift' => Input::get('bank_swift'),
                                            'first_name' => Session::get('first_name'),
                                            'last_name' => Session::get('last_name'), 
                                            'email' => Session::get('email'), 
                                         );

        $get_bank_account = DB::table('users')
                                ->where('id',$user_id)
                                ->select('bank_account','bank_name','account_name','bank_sort','bank_swift','bank_iban')
                                ->first();

         
        $update = DB::table('users')
                        ->where('id',$user_id)
                        ->update($update_data);

        Session::put('email',Session::get('email'));
        Session::put('first_name',Session::get('first_name'));
        Session::put('last_name',Session::get('last_name'));
        Session::put('bank_name',Session::get('bank_name'));
        Session::put('bank_account',Session::get('bank_account'));

        return $update_data;
    }

    //Validate Banks
    public static function validateBankDetails()
    {
        
        $rules = array(
        	   		'bank_account'=>'required|min:8|max:16',
                    'bank_name'=>'required|min:4|max:30', 
            		'bank_iban'=>'alpha_num', 
                    'bank_swift'=>'alpha_num');

        $validator = Validator::make(Input::all(), $rules);
        return $validator;

    }

}
