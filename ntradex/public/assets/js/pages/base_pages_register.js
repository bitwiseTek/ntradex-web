/*
 *  Document   : base_pages_register.js
 *  Author     : pixelcave
 *  Description: Custom JS code used in Register Page
 */

var BasePagesRegister = function() {
    // Init Register Form Validation, for more examples you can check out https://github.com/jzaefferer/jquery-validation
    var initValidationRegister = function() {
        jQuery('.js-validation-register').validate({
            errorClass: 'help-block text-right animated fadeInDown',
            errorElement: 'div',
            errorPlacement: function(error, e) {
                jQuery(e).parents('.form-group > div').append(error);
            },
            highlight: function(e) {
                jQuery(e).closest('.form-group').removeClass('has-error').addClass('has-error');
                jQuery(e).closest('.help-block').remove();
            },
            success: function(e) {
                jQuery(e).closest('.form-group').removeClass('has-error');
                jQuery(e).closest('.help-block').remove();
            },
            rules: {
                'username': {
                    required: true,
                    minlength: 5
                },
                'first_name': {
                    required: true,
                    maxlength: 12
                },
                'last_name': {
                    required: true,
                    maxlength: 12
                },
                'phone_no': {
                    required: true,
                    maxlength: 16
                },
                'sex': {
                    required: true
                },
                'country_id': {
                    required: true
                },
                'state_id': {
                    required: true
                },
                'address': {
                    required: true,
                    maxlength: 50
                },
                'dob': {
                    required: true,
                    date: true
                },
                'email': {
                    required: true,
                    email: true
                },
                'email_confirmation': {
                    required: true,
                    equalTo: '#email'
                },
                'password': {
                    required: true,
                    minlength: 8
                },
                'password_confirmation': {
                    required: true,
                    equalTo: '#password'
                },
                'register-terms': {
                    required: true
                }
            },
            messages: {
                'username': {
                    required: 'Please enter a username',
                    minlength: 'Your username must consist of at least 5 characters'
                },
                'first_name': {
                    required: 'Please enter a first name',
                    maxlength: 'Your first name must not be more than 12 characters'
                },
                'last_name': {
                    required: 'Please enter a last name',
                    maxlength: 'Your last name must not be more than 12 characters'
                },
                'phone_no': {
                    required: 'Please enter a phone number',
                    maxlength: 'Your phone number must not be more than 16 characters'
                },
                'sex': {
                    required: 'Please select a sex'
                },
                'country_id': {
                    required: 'Please select a country'
                },
                'state_id': {
                    required: 'Please select a state'
                },
                'address': {
                    required: 'Please enter an address',
                    maxlength: 'Your address must not be more than 30 characters'
                },
                'dob': {
                    required: 'Please enter a Date of Birth'
                },
                'email': 'Please enter a valid email address',
                'email_confirmation': {
                    required: 'Please enter a valid email address',
                    equalTo: 'Please enter the same email address as above'
                },
                'password': {
                    required: 'Please provide a password',
                    minlength: 'Your password must be at least 8 characters long'
                },
                'password_confirmation': {
                    required: 'Please provide a password',
                    minlength: 'Your password must be at least 8 characters long',
                    equalTo: 'Please enter the same password'
                },
                'register-terms': 'You must agree to the service terms!'
            }
        });
    };

    return {
        init: function () {
            // Init Register Form Validation
            initValidationRegister();
        }
    };
}();

// Initialize when page loads
jQuery(function(){ BasePagesRegister.init(); });