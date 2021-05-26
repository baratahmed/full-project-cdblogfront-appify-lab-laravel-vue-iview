require('./bootstrap');

window.Vue = require('vue')
import common from './common'
Vue.mixin(common)
Vue.component('search', require('./components/Search.vue').default)
Vue.component('comment', require('./components/Comment.vue').default)
Vue.component('write-comment', require('./components/WriteComment.vue').default)

const app = new Vue({
    el : '#app',

})