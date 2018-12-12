/* state - shared data for multiple components */

import {TYPE_CREDIT, TYPE_DEBIT} from "../constants/cards";

let state = {
    cards: [],
    cases: [
        {title: 'test title', client_email: '3333@fff.cc', website: 'google.com', country: 'USA', user_id: null}
    ]
};

export default state;
