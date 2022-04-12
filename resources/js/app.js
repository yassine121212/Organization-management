require("./bootstrap");

window.Vue = require("vue").default;
import Vue from "vue";
import VueRouter from "vue-router";
import { routes } from "./routes";

Vue.use(VueRouter);

Vue.component(
    "employees-index",
    require("./components/employees/Index.vue").default
);
//Vue.component('pagination', require('laravel-vue-pagination'));


const router = new VueRouter({
    mode: "history",
    routes: routes
});

const app = new Vue({
    el: "#app",
    router: router
});
