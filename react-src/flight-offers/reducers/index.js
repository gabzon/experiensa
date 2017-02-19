import { combineReducers } from 'redux'
import { requestAirports } from './airports'

const rootReducer = combineReducers({
    airports: requestAirports
});

export default rootReducer