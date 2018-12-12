/* mutations - are called with "commit"
- change data in state & affects all components that use it */
let mutations = {
    getCards: (state, cards) => {
        state.cards = cards;
    },

    reduceTotalValue: (state, amount) => {
        state.cards.forEach(card => {
            card.total_value -= amount;
        })
    }
};
export default mutations;
