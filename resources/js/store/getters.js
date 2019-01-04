/* getters - do not change data */

let getters = {
    // getCardsTotalValueSum: state => {
    //     return state.cards.reduce(function (prev, current) {
    //         return prev + current.total_value;
    //     }, 0);
    // },
    messageList: state => {
        return state.messages;
    },
    isUserLoggedIn: state => {
        return state.authUser;
    },
};
export default getters;
