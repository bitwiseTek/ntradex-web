/*
 *  Document   : base_pages_sell.js
 *  Author     : pixelcave
 *  Description: Custom JS code used in Buy/Sell Page
 */

var BasePagesSell = function() {
    // Init Register Form Validation, for more examples you can check out https://github.com/jzaefferer/jquery-validation
    var initValidationSell = function() {
        jQuery('.js-validation-sell').validate({
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
                'sell_currency': {
                    required: true
                },
                'sell_amount': {
                    required: true,
                    maxlength: 3
                }
                
            },
            messages: {
                'sell_currency': {
                    required: 'Please select eCurrency'
                },
                'sell_amount': {
                    required: 'Please enter an amount',
                    maxlength: 'Amount must not be more than 999'
                }
            }
        });
    };

    return {
        init: function () {
            // Init Register Form Validation
            initValidationSell();
        }
    };
}();

// Initialize when page loads
jQuery(function(){ BasePagesSell.init(); });