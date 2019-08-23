/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue');

// Vue-router import
import VueRouter from "vue-router";
Vue.use(VueRouter);

// V-From
import { Form, HasError, AlertError } from "vform";
window.Form = Form;
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);

// Define routes
const routes = [
    {
        path: "/dashboard",
        component: require("./components/Dashboard.vue").default
    },
    {
        path: "/users",
        component: require("./components/Users.vue").default
    },
    {
        path: "/doctors",
        component: require("./components/Doctors.vue").default
    },
    {
        path: "/profile",
        component: require("./components/Profile.vue").default
    },
    {
        path: "/developer",
        component: require("./components/Developer.vue").default
    },
    {
        path: "page-not-found",
        component: require("./components/error/PageNotFound.vue").default
    },
    {
        path: "unauthorized-access",
        component: require("./components/error/UnauthorizedAccess.vue").default
    },
    {
        path: "*",
        component: require("./components/error/PageNotFound.vue").default
    }
];


Vue.filter('truncate', function (value, length) {
    let string = `${value}`;
    let till = `${length}`;
    return string.substring(0, till);
});

Vue.filter('toUSD', function (value) {
    return `$${value}`;
});

const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
});


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

new Vue({
    el: '#app',
    router,
});
