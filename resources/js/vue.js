import Vue         from 'vue'
import Tabs        from 'vue-tabs-component';
import VModal      from 'vue-js-modal';
import VueSocketIO from 'vue-socket.io';

Vue.use(Tabs);
Vue.use(VModal, {dynamic: true, injectModalsContainer: true});

import App      from './components/App';
import store    from './store/index';
import {router} from './routes/router';

Vue.use(new VueSocketIO({
    debug     : true,
    connection: 'http://localhost:3000',
    // vuex: {
    // store,
    // actionPrefix  : 'SOCKET_',
    // mutationPrefix: 'SOCKET_',
    // }
}));

const app = new Vue({
    el        : '#app',
    components: {App},
    store,
    router,
});
