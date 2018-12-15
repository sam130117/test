/* actions - are called with "dispatch"
- for HTTP queries mostly,
- they also must call mutations after data is received */

let actions = {
    getCards: (context) => {
        axios.get(`/storage/cards`)
            .then((response) => {
                if (response.status === 200)
                    context.commit('getCards', response.data.cards.data);
            })
            .catch((error) => {
                console.error(error);
            });
    }
};

export default actions;
