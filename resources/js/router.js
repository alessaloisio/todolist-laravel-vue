import Vue from "vue";
import Router from "vue-router";

import Header from "./layouts/Header";
import Footer from "./layouts/Footer";

import Landing from "./views/Landing";

Vue.use(Router);

export default new Router({
    linkExactActiveClass: "active",
    routes: [
        {
            path: "/",
            name: "Home",
            components: {
                header: Header,
                default: Landing,
                footer: Footer
            }
        }
    ]
});
