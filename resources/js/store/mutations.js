/* mutations - are called with "commit"
- change data in state & affects all components that use it */
let mutations = {
    ADD_NEW_MESSAGE : (state, data) => {
        let message = data.message;
        let user = data.user;
        state.messages[new Date().toLocaleString()] = {user: user, message: message};
    }
};
export default mutations;
