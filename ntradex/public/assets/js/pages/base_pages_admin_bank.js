/*
 *  Document   : base_pages_buy.js
 *  Author     : pixelcave
 *  Description: Custom JS code used in Admin Bank Add Page
 */

var BasePagesAdminBank = function() {
    // Init Register Form Validation, for more examples you can check out https://github.com/jzaefferer/jquery-validation
    var initValidationBank = function() {
        jQuery('.js-validation-admin-bank').validate({
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
                'bank_name': {
                    required: true,
                    maxlength: 40
                },
                'status': {
                    required: true
                }
                
            },
            messages: {
                'bank_name': {
                    required: 'Please enter Bank Name',
                    maxlength: 'Characters must not be more than 40'
                },
                'status': {
                    required: 'Please select status'
                }
            }
        });
    };

    return {
        init: function () {
            // Init Register Form Validation
            initValidationBank();
        }
    };
}();

// Initialize when page loads
jQuery(function(){ BasePagesAdminBank.init(); });