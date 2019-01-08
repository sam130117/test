/* mutations - are called with "commit"
- change data in state & affects all components that use it */
let mutations = {
    ADD_NEW_MESSAGE  : (state, data) => {
        state.messages.push(data);
    },
    SIGN_IN          : (state, data) => {


        // state.messages.push(data);
    },
    SET_AUTH_ERRORS  : (state, data) => {
        state.authErrors = data;
    },
    CLEAR_AUTH_ERRORS: (state, data) => {
        state.authErrors = {};
    },
    SET_AUTH_USER: (state, data) => {
        console.log(data.user, 8877);
        state.authUser = data.user;
    }
};
export default mutations;
