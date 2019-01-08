/* actions - are called with "dispatch"
- for HTTP queries mostly,
- they also must call mutations after data is received */

let actions = {
    addNewMessage: (context, params) => {
        context.commit('ADD_NEW_MESSAGE', params);
    },
    signIn(context, params)
    {
        axios.post(`/sign-in`, params)
            .then((response) => {
                console.log('respo');
                // if (response.status === 200) {
                //     this.mode = (this.mode === commonConstants.GENERAL_MODE) ? commonConstants.EDIT_MODE : commonConstants.GENERAL_MODE;
                // }
            })
            .catch((error) => {
                if (error.response) {
                    context.commit('SET_AUTH_ERRORS', error.response.data.errors);
                }
                console.error(error);
            });

        context.commit('SIGN_IN', params);
    },
    signUp(context, params)
    {
        axios.post(`/sign-up`, params)
            .then((response) => {
                if (response.status === 201 || response.status === 200)
                    context.commit('SET_AUTH_USER', response.data);

                context.commit('CLEAR_AUTH_ERRORS');
            })
            .catch((error) => {
                if (error.response)
                    context.commit('SET_AUTH_ERRORS', error.response.data.errors);
                console.error(error);
            });

        context.commit('SIGN_IN', params);
    },
};

export default actions;
