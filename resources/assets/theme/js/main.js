require('./bootstrap');



window.Vue = require('vue');

Vue.config.productionTip = false
Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('button-component', require('./components/ButtonComponent.vue'));

Vue.component('brands-list', require('./components/BrandsList.vue'));
Vue.component('breadcrumbs', require('./components/BreadcrumbsList.vue'));
Vue.component('categories-list', require('./components/CategoriesList.vue'));
Vue.component('colors-list', require('./components/ColorsList.vue'));
Vue.component('pagination-list', require('./components/PaginationList.vue'));
Vue.component('product', require('./components/ProductItem.vue'));
Vue.component('product-list', require('./components/ProductList.vue'));
Vue.component('sidebar-item', require('./components/SidebarItem.vue'));

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
    responsive: [
        {
            breakpoint:1025,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 1
            }
        },
        {
            breakpoint:769,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1
            }
        },
        {
            breakpoint:513,
            settings: {
                slidesToShow: 1
            }
        }
    ]
});

$('.new-slider .slick-next').html('<i class="fas fa-long-arrow-alt-right"></i>');
$('.new-slider .slick-prev').html('<i class="fas fa-long-arrow-alt-left"></i>');




// Brands Slider

$('.brands-slider').slick({
    infinite: true,
    slidesToShow: 5,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 4000,
    responsive: [
        {
            breakpoint:1025,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 1,
            }
        },
        {
            breakpoint:769,
            settings: {
                slidesToShow: 1
            }
        }
    ]
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



// gmaps

if ($('#map').length > 0) {

    var map = new GMaps({
        div:'#map',
        disableDefaultUI: false,
        lat:42.171641,
        lng: -82.818488,
    });

    map.addMarker({
        lat:42.171641,
        lng: -82.818488
    });
}




//email form
var form = $('.form');

$(form).submit(function(e) {
  e.preventDefault();

  var formData = new FormData($(this)[0]);

  $.ajax({
    type: 'post',
    url: $(this).attr('action'),
    data: formData,
    processData: false,
    contentType: false
  })
  .done(function (response) {
    $('input').val('');
    $('textarea').val('');
    $('<div class="alert is-success">Your Message Was Sent! We\'ll be in touch.</div>').insertAfter(form);
    
    console.log('success' + response);
  })
  .fail(function (data) {
    $('input').val('');
    $('textarea').val('');
    $('<div class="alert is-error">Oh no! Something went wrong, try again.</div>').insertAfter(form);
    
    console.log('fail' + data);
  })

});



// #OFF CANVAS
// =========================================================================

var offCanvasTrigger = document.querySelectorAll('.off-canvas-trigger');
var offCanvas = document.querySelectorAll('.off-canvas');
var navOffCanvas = document.querySelector('.nav-off-canvas');
var productsOffCanvas = document.querySelector('.products-off-canvas');

if (offCanvasTrigger) {
    offCanvasTrigger.forEach(trigger => {
        trigger.addEventListener('click', function () {

            if (trigger.classList.contains('main-nav')) {
                navOffCanvas.classList.add('is--open');
            } 

            if (trigger.classList.contains('products-nav')) {
                productsOffCanvas.classList.add('is--open');
            }
            
            overlay.classList.add('is--active');
        });
    })
    
}




// #KEY CONTROL
// =========================================================================

$(document).keyup(function(e) {
    if (e.keyCode === 27) {
        overlay.classList.remove('is--active');
    }
});

if (offCanvas) {

    $(document).keyup(function(e) {
        if (e.keyCode === 27) {
            offCanvas.forEach(canvas => {
                canvas.classList.remove('is--open');
            })
        }
    });

}




// #OVERLAY
// =========================================================================

var overlay = document.querySelector('.overlay');

if (overlay) {
    overlay.addEventListener('click', function () {
        this.classList.remove('is--active');
    });
}

if (overlay) {
    overlay.addEventListener('click', function () {
        offCanvas.forEach(canvas => {
            canvas.classList.remove('is--open');
        })
    });
}




// #PRODUCTS DISPLAY
// =========================================================================

$('.grid-display').on('click', function(){
    $('.list-display').removeClass('is--active');
    $('.products__container').removeClass('list').addClass('grid');
    $(this).addClass('is--active');
});

$('.list-display').on('click', function(){
    $('.grid-display').removeClass('is--active');
    $('.products__container').removeClass('grid').addClass('list');
    $(this).addClass('is--active');
});




// #MAGNIFIER
// =========================================================================

var featuredImage = $('.featured-image .image-wrapper');
var zoomImage = featuredImage.data('image');

featuredImage.zoom({url: zoomImage});

var featured = document.querySelector('.featured-image img');
var imageDisplay = document.querySelectorAll('.image-display img');

imageDisplay.forEach(trigger => {
    trigger.addEventListener('click', function () {
        var featuredSrc = featured.src;
        featured.src = this.src;
        zoomImage = this.src;
        featuredImage.zoom({url: zoomImage});
        this.src = featuredSrc;
    });
});