require('./bootstrap');



window.Vue = require('vue');

Vue.config.productionTip = false
Vue.component('example-component', require('./components/ExampleComponent.vue'));

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