/* mutations - are called with "commit"
- change data in state & affects all components that use it */
let mutations = {
    ADD_NEW_MESSAGE : (state, data) => {
        state.messages.push(data);
    }
};
export default mutations;
