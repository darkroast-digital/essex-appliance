require('./bootstrap');

window.Vue = require('vue');
import InstantSearch from 'vue-instantsearch'

Vue.config.productionTip = false

Vue.use(InstantSearch)

Vue.component('image-upload', require('./components/ImageUpload.vue'));
Vue.component('color-select', require('./components/ColorSelect.vue'));
Vue.component('search-bar', require('./components/SearchBar.vue'));

const app = new Vue({
    el: '#app'
});




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
