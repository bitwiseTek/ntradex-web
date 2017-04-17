/*
 *  Document   : base_pages_buy.js
 *  Author     : pixelcave
 *  Description: Custom JS code used in Buy/Sell Page
 */

var BasePagesBuy = function() {
    // Init Register Form Validation, for more examples you can check out https://github.com/jzaefferer/jquery-validation
    var initValidationBuy = function() {
        jQuery('.js-validation-buy').validate({
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
                'buy_currency': {
                    required: true
                },
                'buy_amount': {
                    required: true,
                    maxlength: 3
                }
                
            },
            messages: {
                'buy_currency': {
                    required: 'Please select eCurrency'
                },
                'buy_amount': {
                    required: 'Please enter an amount',
                    maxlength: 'Amount must not be more than 999'
                }
            }
        });
    };

    return {
        init: function () {
            // Init Register Form Validation
            initValidationBuy();
        }
    };
}();

// Initialize when page loads
jQuery(function(){ BasePagesBuy.init(); });