/* actions - are called with "dispatch"
- for HTTP queries mostly,
- they also must call mutations after data is received */

let actions = {
    getCards: (context) => {
        axios.get(`/cards`)
            .then(function (response) {
                context.commit('getCards', response.cards);
            })
            .catch(function (error) {
                console.error(error);
            });
    }
};

export default actions;
