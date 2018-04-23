require('./bootstrap');

window.Vue = require('vue');
import InstantSearch from 'vue-instantsearch'

Vue.config.productionTip = false

Vue.use(InstantSearch)

Vue.component('ad-upload', require('./components/AdUpload.vue'));
Vue.component('color-select', require('./components/ColorSelect.vue'));
Vue.component('image-upload', require('./components/ImageUpload.vue'));
Vue.component('multi-image-upload', require('./components/MultiImageUpload.vue'));
Vue.component('search-bar', require('./components/SearchBar.vue'));
Vue.component('variation-item', require('./components/variations/VariationItem.vue'));
Vue.component('variations-list', require('./components/variations/VariationsList.vue'));

const app = new Vue({
    el: '#app'
});




// #SIMPLE MDE
// =========================================================================

var mde = document.querySelectorAll('.mde')

if (mde) {

    mde.forEach(editor => {
        let simplemde = new SimpleMDE({ 
            element: editor,
            hideIcons: [
                'fullscreen',
                'side-by-side',
                'image'
            ]
        })
    })
}




// Alert
// =========================================================================

let notif = document.querySelector('.alert')

if (notif) {
    let notifClose = notif.querySelector('.alert-close')

    notifClose.addEventListener('click', e => {
        notif.classList.add('alert-closed')
    })
}




// #Tabs
// =========================================================================

let tabsSection = document.querySelectorAll('.tabs')

if (tabsSection) {

    tabsSection.forEach(tabs => {

        let nav = tabs.querySelector('.tabs-nav')
        let navLinks = nav.querySelectorAll('[data-tab]')
        let body = tabs.querySelector('.tabs-body')
        let content = body.querySelectorAll('.tabs-content')

        navLinks.forEach(link => {

            let thisTab = link.dataset.tab

            link.addEventListener('click', e => {

                navLinks.forEach(l => {
                    l.classList.remove('tabs-nav-active')
                })

                e.target.classList.add('tabs-nav-active')

                content.forEach(tab => {
                    tab.classList.remove('tabs-content-active')

                    if (tab.dataset.tab === thisTab) {
                        tab.classList.add('tabs-content-active')
                    }
                })

            })

        })

    })

}




// Select
// =========================================================================

var selectContainer = document.querySelectorAll('.select');

if (selectContainer) {

    selectContainer.forEach(function (select) {

        var input = select.querySelector('select');
        var selectMenu = select.querySelector('.select-menu');
        var selectInput = select.querySelector('.select-input');

        var options = input.options;

        document.addEventListener('click', function (e) {
            
            if (!select.contains(e.target)) {
                select.classList.remove('select-open');
            }
        });

        selectInput.addEventListener('click', function () {
            select.classList.add('select-open');
        });

        var template = ``;
        var inputTitle = '';

        for (let i = 0; i < options.length; i++) {
            var option = options[i];
            var optionValue = option.value;
            var optionTitle = option.innerText;

            if (option.hasAttribute('selected')) {
                inputTitle = optionTitle;
            }

            if (option.hasAttribute('value')) {
                template += `<li data-option="${optionValue}">${optionTitle}</li>`;
            }
            
        }

        selectInput.innerText = inputTitle;

        selectMenu.innerHTML = template;

        var selectMenuItems = select.querySelectorAll('[data-option]')
        
        selectMenuItems.forEach(function (item) {
            item.addEventListener('click', function () {

                var itemTitle = this.innerText;                
                var itemOption = this.dataset.option;
                var inputOption = select.querySelector(`option[value="${itemOption}"]`);

                var inputOptions = select.querySelectorAll('option');

                inputOptions.forEach(function (option) {
                    option.removeAttribute('selected');
                });
                
                inputOption.setAttribute('selected', 'selected');

                selectInput.innerText = itemTitle;

                select.classList.remove('select-open');

            });
        });

    });

}




// #MODAL
// =========================================================================

var modalTrigger = document.querySelectorAll('.modal-trigger');
var modal = document.querySelector('.modal');

var overlay = document.querySelector('.overlay');

if (modalTrigger) {
    modalTrigger.forEach(function (trigger) {
        trigger.addEventListener('click', function (e) {
            e.preventDefault();

            if (typeof trigger.dataset.modalid !== 'undefined') {
                let id  = trigger.dataset.modalid,
                    name = trigger.dataset.modalname,
                    baseAction = document.querySelector('.modal-form').action

                document.querySelector('.modal-form').action = `${baseAction}${id}`
                document.querySelector('.modal-name').innerHTML = name
            }

            modal.classList.toggle('modal-open');
            overlay.classList.toggle('overlay-active');
        });
    });
}


if (overlay) {
    overlay.addEventListener('click', function () {
        this.classList.remove('overlay-active');
    });
}

if (overlay && modal) {
    overlay.addEventListener('click', function () {
        modal.classList.remove('modal-open');
    });
}

if (modal) {

    $(document).keyup(function (e) {
        if (e.keyCode === 27) {
            modal.classList.remove('modal-open');
        }
    });

}

if (overlay) {

    $(document).keyup(function (e) {
        if (e.keyCode === 27) {
            overlay.classList.remove('overlay-active');
        }
    });

}




// Price
// =========================================================================

let featuredCheck = document.querySelector('input[name="featured"]')

if (featuredCheck) {
    let price = document.querySelector('.price-field')

    if (featuredCheck.checked) {
        price.classList.add('--is-visible')
    }

    featuredCheck.addEventListener('click', e => {
        price.classList.toggle('--is-visible')
    })

}





// #DASHBOARD CHARTS
// =========================================================================

// Sessions chart

let chart = document.getElementById('sessionsChart');

if (chart) {
var sessionsChartContainer = chart.getContext('2d');
var sessionsChart = new Chart(sessionsChartContainer, {
    type: 'line',
    data: {
        labels: $('.sessionsChart').data('labels'),
        datasets: [{
            data: $('.sessionsChart').data('values'),
            lineTension: .3,
            backgroundColor: '#ff878750',
            borderColor: '#c92a2a',
            responsive: true
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        },
        legend: {
            display: false
        }
    }
});



// New users chart
var newUsersContainer = document.getElementById('newUsersChart');
var newUsersChart = new Chart(newUsersContainer, {
    type: 'doughnut',
    data: {
        cutoutPercentage: 50,
        labels: $('.newUsersChart').data('labels'),
        datasets: [{
            data: $('.newUsersChart').data('values'),
            responsive: true,
            backgroundColor: [
                '#c92a2a',
                '#e03131',
                '#f03e3e',
                '#fa5252',
                '#ff6b6b',
                '#ff8787',
                '#ffa8a8',
                '#ffc9c9',
            ],
            borderColor: [
                '#c92a2a',
                '#e03131',
                '#f03e3e',
                '#fa5252',
                '#ff6b6b',
                '#ff8787',
                '#ffa8a8',
                '#ffc9c9',
            ]
        }]
    },
    options: {
        legend: {
            position:'right'
        },
        scales: {
            yAxes: [{
                display:false,
                ticks: {
                    display:false
                },
                gridLines: {
                    display:false
                }
            }],
            xAxes:[]
        }
    }
});
}
