require('./bootstrap');

window.Vue = require('vue');

Vue.config.productionTip = false

Vue.component('title-field', require('./components/TitleField.vue'));

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

        console.log(content)

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
