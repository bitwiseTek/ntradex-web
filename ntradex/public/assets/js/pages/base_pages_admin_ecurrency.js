/*
 *  Document   : base_pages_buy.js
 *  Author     : pixelcave
 *  Description: Custom JS code used in Admin eCurrency Add Page
 */

var BasePagesAdminCurrency = function() {
    // Init Register Form Validation, for more examples you can check out https://github.com/jzaefferer/jquery-validation
    var initValidationCurrency = function() {
        jQuery('.js-validation-admin-ecurrency').validate({
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
                'currency_name': {
                    required: true,
                    maxlength: 20
                },
                'buy_value': {
                    required: true,
                    maxlength: 5
                },
                'sell_value': {
                    required: true,
                    maxlength: 5
                },
                'alias': {
                    required: true,
                    maxlength: 3
                }, 
                'status': {
                    required: true
                }, 
                'min': {
                    required: true,
                    minlength: 1
                },
                
            },
            messages: {
                'currency_name': {
                    required: 'Please enter eCurrency Name',
                    maxlength: 'Characters must not be more than 20'
                },
                'buy_value': {
                    required: 'Please enter a buy value',
                    maxlength: 'Characters must not be more than 5'
                },
                'sell_value': {
                    required: 'Please enter a sell value',
                    maxlength: 'Characters must not be more than 5'
                },
                'alias': {
                    required: 'Please enter an alias',
                    maxlength: 'Characters must not be more than 3'
                },
                'status': {
                    required: 'Please select status'
                },
                'min': {
                    required: 'Please enter a minimum value',
                    maxlength: 'Characters must not be less than 1'
                }
            }
        });
    };

    return {
        init: function () {
            // Init Register Form Validation
            initValidationCurrency();
        }
    };
}();

// Initialize when page loads
jQuery(function(){ BasePagesAdminCurrency.init(); });