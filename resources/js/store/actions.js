/* actions - are called with "dispatch"
- for HTTP queries mostly,
- they also must call mutations after data is received */

let actions = {
    addNewMessage: (context, params) => {
        context.commit('ADD_NEW_MESSAGE', params);
    },
};

export default actions;
