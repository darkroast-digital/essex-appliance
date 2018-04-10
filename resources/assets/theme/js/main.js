require('./bootstrap');



window.Vue = require('vue');

Vue.config.productionTip = false
Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('product', require('./components/ProductItem.vue'));
Vue.component('product-list', require('./components/ProductList.vue'));
Vue.component('breadcrumbs', require('./components/BreadcrumbsList.vue'));
Vue.component('pagination-list', require('./components/PaginationList.vue'));

const app = new Vue({
    el: '#app'
});




// #SLIDERS
// =========================================================================

// Hot Buys Slider

$('.hot-buys-slider').slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 4000
});

$('.hot-buys-slider .slick-next').html('<i class="fas fa-chevron-right"></i>');
$('.hot-buys-slider .slick-prev').html('<i class="fas fa-chevron-left"></i>');




// What's New Slider

$('.new-slider').slick({
    infinite: true,
    slidesToShow: 5,
    slidesToScroll: 5,
    autoplay: true,
    autoplaySpeed: 4000,
});

$('.new-slider .slick-next').html('<i class="fas fa-long-arrow-alt-right"></i>');
$('.new-slider .slick-prev').html('<i class="fas fa-long-arrow-alt-left"></i>');




// Brands Slider

$('.brands-slider').slick({
    infinite: true,
    slidesToShow: 5,
    slidesToScroll: 5,
    autoplay: true,
    autoplaySpeed: 4000,
});

$('.brands-slider .slick-next').html('<i class="fas fa-long-arrow-alt-right"></i>');
$('.brands-slider .slick-prev').html('<i class="fas fa-long-arrow-alt-left"></i>');




// #PRODUCTS TABS
// =========================================================================

$('li[data-tab], .tabs__content').first().addClass('is--active');
$('.tabs__content').first().addClass('is--active');

$('li[data-tab]').click(function() {
    var thisTab = $(this).attr('data-tab');
    var tab = $('.tabs__content' + '[data-tab="' + thisTab + '"]');

    $('li[data-tab]').removeClass('is--active');
    $(this).addClass('is--active');
    $('.tabs__content').removeClass('is--active');
    tab.addClass('is--active');
});