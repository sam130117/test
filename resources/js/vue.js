import Vue       from 'vue'
import VueRouter from 'vue-router'
import Tabs      from 'vue-tabs-component';

Vue.use(VueRouter);
Vue.use(Tabs);

import App   from './components/App'
import Home  from './components/Home'
import Users from './components/Users'
import Cards from './components/Cards'
import Card  from './components/Card'
import Cases from './components/Cases'
import Case  from './components/Case'

import store from './store/index'


//TODO: create store with vuex, add CRUD functionality for cards, cases, users
const router = new VueRouter({
    mode  : 'history',
    routes: [
        {
            path     : '/users',
            name     : 'users',
            component: Users
        },
        {
            path     : '/',
            name     : 'home',
            component: Home
        },
        {
            path     : '/cases',
            name     : 'cases',
            component: Cases
        },
        {
            path     : '/cases/:caseId',
            name     : 'case',
            component: Case
        },
        {
            path     : '/cards/:cardId',
            name     : 'card',
            component: Card
        },
        {
            path     : '/cards',
            name     : 'cards',
            component: Cards,
        }
    ],
});

const app = new Vue({
    el        : '#app',
    components: {App},
    store     : store,
    router,
});
