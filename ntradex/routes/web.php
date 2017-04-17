<?php
/*
|**************************************** HOME PAGE ROUTES **************************************************************************|
*/	
		//Index Route
		Route::get('/',array('uses'=>'HomeController@index'));
		
		//How-to Route
		Route::get('/how-it-works',array('uses'=>'HomeController@howItWorks'));

		//About route
		Route::get('/about-us',array('uses'=>'HomeController@aboutUs'));

		//FAQs route
		Route::get('/faqs',array('uses'=>'HomeController@faqs'));

		//contact Route
		Route::get('/contact-us',array('uses'=>'HomeController@contactUs'));

		//Register View
		Route::get('/register', array('uses'=>'HomeController@registerView'));

		//Process register
		Route::post('/register',array('uses'=>'HomeController@register'));

		//After registration is complete (success message)
		Route::get('/register/success',array('uses'=>'HomeController@registerSuccess'));

		//login View
		Route::get('/login',array('uses'=>'HomeController@loginView'));

		//processing login
		Route::post('/login',array('uses'=>'HomeController@logIn'));

		//processing log-out
		Route::get('/log-out',array('uses'=>'HomeController@logOut'));

		//privacy policy Route
		Route::get('/privacy-policy',array('uses'=>'HomeController@privacyPolicy'));

		//terms and condition Route
		Route::get('/terms-and-conditions',array('uses'=>'HomeController@termsCondition'));

		//anti-money policy Route
		Route::get('/anti-money-policy',array('uses'=>'HomeController@antiMoneyPolicy'));

		//Password recovery View
		Route::get('/login/password-recovery',array('uses'=>'HomeController@passwordRecovery'));

		//Password recovery Check token
		Route::get('/login/token/check',array('uses'=>'HomeController@checkToken'));

		//Password recovery generate Token
		Route::post('/login/password-recovery',array('uses'=>'HomeController@getToken'));

		//Password recovery Change password View
 		Route::get('/login/password-recovery/new-password',array('uses'=>'HomeController@newPasswordView'));

		//Password recovery Change password
		Route::post('/login/password-recovery/new-password',array('uses'=>'HomeController@newPassword'));

		//Password recovery status
		Route::get('/login/password-recovery/status',array('uses'=>'HomeController@recoveryStatus'));

        Route::get('/sitemap',array('uses'=>'HomeController@sitemap'));

		Route::get('/robots',array('uses'=>'HomeController@robots'));
		
/*
|******************************************UTILITY ROUTES***********************************************************************|
*/
		//Currency drop down
		Route::get('/utility/currency-drop-down',array('uses'=>'HomeController@getCurrencyDropDown'));

		//Banks drop down
		Route::get('/utility/get-banks',array('uses'=>'HomeController@getBanks'));
                
        //States drop down
        Route::get('/ajax-states',array('uses'=>'HomeController@statesView'));

/*
|**************************************** USER ROUTES **************************************************************************|
*/

		//Summary View
		Route::get('/users/summary',array('uses'=>'UserController@summary'));

		//Buy and Sell View
		Route::get('/users/exchange-currencies',array('uses'=>'UserController@buySellView'));

		//Buy Review
		Route::post('/users/exchange-currencies/buy/confirm',array('uses'=>'UserController@buyReview'));

		//Sell Review
		Route::post('/users/exchange-currencies/sell/confirm',array('uses'=>'UserController@sellReview'));

		//Sell - post
		Route::post('/users/exchange-currencies/sell',array('uses'=>'UserController@sell'));

		//Transactions View
		Route::get('/users/transactions',array('uses'=>'UserController@transactions'));

		//Transaction view
		Route::get('/users/transactions/{id}',array('uses'=>'UserController@viewTransaction'))->where(array('id'=>'[0-9]+'));

		//Settings view
		Route::get('/users/settings',array('uses'=>'UserController@userSettingsView'));

		//Edit Bio Data - post
		Route::post('/users/settings/info',array('uses'=>'UserController@editInfo'));

		//Edit Password - Post
		Route::post('/users/settings/password',array('uses'=>'UserController@editPassword'));

		//Edit e-currency - Post
		Route::post('/users/settings/e-wallets',array('uses'=>'UserController@editECurrencies'));

		//Edit bank account - Post
		Route::post('/users/settings/bank-details',array('uses'=>'UserController@editBankDetails'));

		//Payment Processing
		Route::post('/users/payment-summary', array('uses'=>'UserController@paymentSummary'));

		//Search View
		Route::post('/users/search',array('uses'=>'UserController@userSearch'));

		//Search View
		Route::get('/users/search',array('uses'=>'UserController@userSearchView'));


/*
|**************************************** ADMIN ROUTES **************************************************************************|
*/

		//Summary
		Route::get('/admin/summary',array('uses'=>'AdminController@summary'));

		//Transactions View
		Route::get('/admin/transactions/',array('uses'=>'AdminController@transactions'));

                //query interswitch
		Route::get('/admin/query-payment-status/{id}',array('uses'=>'AdminController@queryInterSwitch'))->where(array('id'=>'[0-9]+'));

		//Transaction
		Route::get('/admin/transactions/{id}',array('uses'=>'AdminController@viewTransaction'))->where(array('id'=>'[0-9]+'));

		//Transaction Process - post
		Route::post('/admin/transactions/process',array('uses'=>'AdminController@processTransaction'));

		//Transaction Cancel - post
		Route::post('/admin/transactions/cancel/{id}',array('uses'=>'AdminController@createWorkChop'))->where(array('id'=>'[0-9]+'));

		//Users
		Route::get('/admin/users',array('uses'=>'AdminController@users'));

		//View User
		Route::get('/admin/users/{id}',array('uses'=>'AdminController@viewUser'))->where(array('id'=>'[0-9]+'));

		//Disable User
		Route::post('/admin/users/block/{id}',array('uses'=>'AdminController@changeUserStatus'))->where(array('id'=>'[0-9]+'));

		//User Account Status
		Route::post('/admin/users/status/',array('uses'=>'AdminController@createAdView'));

		//Reports View
		Route::get('/admin/reports/',array('uses'=>'AdminController@reports'));

		//Reports view by date
		Route::post('/admin/reports/view',array('uses'=>'AdminController@deleteAd'));

		//Config Page
		Route::get('/admin/currencies/',array('uses'=>'AdminController@getCurrencies'));

		Route::get('/admin/currencies/view/{id}',array('uses'=>'AdminController@viewCurrency'))->where(array('id'=>'[0-9]+'));

		Route::get('/admin/currencies/delete/{id}',array('uses'=>'AdminController@deleteCurrency'))->where(array('id'=>'[0-9]+'));

		Route::post('/admin/currencies/edit/{id}',array('uses'=>'AdminController@editCurrency'))->where(array('id'=>'[0-9]+'));

		Route::get('/admin/currencies/add',array('uses'=>'AdminController@addCurrencyView'));

		Route::post('/admin/currencies/add',array('uses'=>'AdminController@addCurrency'));
     
        Route::get('/admin/bank-accounts/edit/{id}',array('uses'=>'AdminController@editBankView'))->where(array('id'=>'[0-9]+'));

		Route::get('/admin/bank-accounts/delete/{id}',array('uses'=>'AdminController@deleteBank'))->where(array('id'=>'[0-9]+'));

		Route::post('/admin/bank-accounts/edit/{id}',array('uses'=>'AdminController@editBank'))->where(array('id'=>'[0-9]+'));

		Route::get('/admin/bank-accounts/add',array('uses'=>'AdminController@addBankView'));

		Route::post('/admin/bank-accounts/add',array('uses'=>'AdminController@addBank'));
		
        //Settings view
		Route::get('/admin/settings',array('uses'=>'AdminController@settings'));

		//Edit Bio Data - post
		Route::post('/admin/settings/info',array('uses'=>'AdminController@editInfo'));

		//Edit Password - Post
		Route::post('/admin/settings/password',array('uses'=>'AdminController@editPassword'));

		//Search View
		Route::post('/admin/search',array('uses'=>'AdminController@adminSearch'));


  // *********************************************************************************************************************************


	
