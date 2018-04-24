(function($) {
    'use strict';

    var woocommerce = {};
    mkd.modules.woocommerce = woocommerce;

    woocommerce.mkdInitQuantityButtons = mkdInitQuantityButtons;
    woocommerce.mkdInitSelect2 = mkdInitSelect2;
	woocommerce.mkdProductImagesMinHeight = mkdProductImagesMinHeight;

    woocommerce.mkdOnDocumentReady = mkdOnDocumentReady;
    woocommerce.mkdOnWindowLoad = mkdOnWindowLoad;
    woocommerce.mkdOnWindowResize = mkdOnWindowResize;
    woocommerce.mkdOnWindowScroll = mkdOnWindowScroll;

    $(document).ready(mkdOnDocumentReady);
    $(window).load(mkdOnWindowLoad);
    $(window).resize(mkdOnWindowResize);
    $(window).scroll(mkdOnWindowScroll);

    /*
     All functions to be called on $(document).ready() should be in this function
     */
    function mkdOnDocumentReady() {
        mkdInitQuantityButtons();
        mkdInitSelect2();
        mkdReInitSelect2CartAjax();
		mkdProductImagesMinHeight();
        mkdAddingToCart();
        mkdInitSingleProductLightbox();
    }

    /*
     All functions to be called on $(window).load() should be in this function
     */
    function mkdOnWindowLoad() {

    }

    /*
     All functions to be called on $(window).resize() should be in this function
     */
    function mkdOnWindowResize() {
		mkdProductImagesMinHeight();
    }

    /*
     All functions to be called on $(window).scroll() should be in this function
     */
    function mkdOnWindowScroll() {

    }

    /*
     ** Init quantity buttons to increase/decrease products for cart
     */
    function mkdInitQuantityButtons() {

        $(document).on( 'click', '.mkd-quantity-minus, .mkd-quantity-plus', function(e) {
            e.stopPropagation();

            var button = $(this),
                inputField = button.siblings('.mkd-quantity-input'),
                step = parseFloat(inputField.attr('step')),
                max = parseFloat(inputField.attr('max')),
                minus = false,
                inputValue = parseFloat(inputField.val()),
                newInputValue;

            if (button.hasClass('mkd-quantity-minus')) {
                minus = true;
            }

            if (minus) {
                newInputValue = inputValue - step;
                if (newInputValue >= 1) {
                    inputField.val(newInputValue);
                } else {
                    inputField.val(1);
                }
            } else {
                newInputValue = inputValue + step;
                if ( max === undefined ) {
                    inputField.val(newInputValue);
                } else {
                    if ( newInputValue >= max ) {
                        inputField.val(max);
                    } else {
                        inputField.val(newInputValue);
                    }
                }
            }

            inputField.trigger( 'change' );
        });
    }

    /*
     ** Init select2 script for select html dropdowns
     */
    function mkdInitSelect2() {

        if ($('.woocommerce-ordering .orderby').length ||  $('#calc_shipping_country').length ) {

            $('.woocommerce-ordering .orderby').select2({
                minimumResultsForSearch: Infinity
            });

            $('#calc_shipping_country').select2();
        }
    }

    /*
     ** Re Init select2 script for select html dropdowns
     */
    function mkdReInitSelect2CartAjax() {

        $(document).ajaxComplete(function() {
            if ($('#calc_shipping_country').length) {

                $('#calc_shipping_country').select2();
            }
        });
    }


	function mkdProductImagesMinHeight(){
		var hh = $('.mkd-woo-single-page .product .images a.woocommerce-main-image').height();
		$('.mkd-woo-single-page .product .images').css({'min-height':hh});
	}

    function mkdAddingToCart() {
        var addToCartBtns = $('.ajax_add_to_cart:not(.added)');

        if (addToCartBtns.length) {
            addToCartBtns.each(function(){
                var addToCartBtn = $(this);

                addToCartBtn.on('click', function(){
                    addToCartBtn.text(mkdGlobalVars.vars.mkdAddingToCartMsg);
                });
            });
        }
    }

    /*
     ** Init Product Single Pretty Photo attributes
     */
    function mkdInitSingleProductLightbox() {
        var item = $('.mkd-woo-single-page .images .woocommerce-product-gallery__image');

        if(item.length) {
            item.children('a').attr('data-rel', 'prettyPhoto[product-gallery]');

            if (typeof mkd.modules.common.mkdPrettyPhoto === "function") {
                mkd.modules.common.mkdPrettyPhoto();
            }
        }
    }

})(jQuery);