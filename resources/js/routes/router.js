import Vue       from 'vue';
import VueRouter from "vue-router";

Vue.use(VueRouter);
import Users     from '../components/Users';
import Cards     from '../components/cards/Cards';
import Cases     from '../components/Cases';
import Case      from '../components/Case';
import EmailForm from '../components/EmailForm';
import Chat      from '../components/Chat';
import Login     from "../components/auth/Login";
import Register  from "../components/auth/Register";


export const router = new VueRouter({
    mode  : 'history',
    routes: [
        {
            path     : '/sign-in',
            name     : 'sign-in',
            component: Login
        },
        {
            path     : '/sign-up',
            name     : 'sign-up',
            component: Register
        },
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

router.beforeEach((to, from, next) => {
    // redirect to login page if not logged in and trying to access a restricted page
    const publicPages = ['/sign-in', '/sign-up'];
    const authRequired = !publicPages.includes(to.path);
    const loggedIn = localStorage.getItem('authUser');

    if (authRequired && !loggedIn) {
        console.log(authRequired,  to.path);
        return next('/sign-in');
    }

    next();
});
