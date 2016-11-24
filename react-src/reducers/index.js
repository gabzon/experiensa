import { combineReducers } from 'redux'
import { showUsers } from './users'
import { requestCatalog } from './catalog'

const rootReducer = combineReducers({
    user: showUsers,
    catalog: requestCatalog
})

export default rootReducer
