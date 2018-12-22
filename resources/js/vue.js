import Vue       from 'vue'
import VueRouter from 'vue-router'
import Tabs      from 'vue-tabs-component';
import VModal    from 'vue-js-modal';


Vue.use(VueRouter);
Vue.use(Tabs);
Vue.use(VModal, {dynamic: true, injectModalsContainer: true});

import App       from './components/App'
import Users     from './components/Users'
import Cards     from './components/cards/Cards'
import Cases     from './components/Cases'
import Case      from './components/Case'
import EmailForm from './components/EmailForm'
import Chat      from './components/Chat'

import store from './store/index'

const router = new VueRouter({
    mode  : 'history',
    routes: [
        {
            path     : '/users',
            name     : 'users',
            component: Users
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
            path     : '/',
            name     : 'cards',
            component: Cards,
        },
        {
            path     : '/email',
            name     : 'email',
            component: EmailForm,
        },
        {
            path     : '/chat',
            name     : 'chat',
            component: Chat,
        }
    ],
});

const app = new Vue({
    el        : '#app',
    components: {App},
    store     : store,
    router,
});
