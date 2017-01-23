import {AIRPORTS_LIST} from '../actions/airports';

const initialState = {
    airports: []
};

export function requestAirports(state = initialState,action) {
    switch (action.type) {
        case AIRPORTS_LIST:
            return Object.assign({}, state, {
                airports: action.airports
            });
            break;
        default:
            return state
    }
}