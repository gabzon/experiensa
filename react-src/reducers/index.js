import { combineReducers } from 'redux'
import { showUsers} from './users'

const rootReducer = combineReducers({
    user: showUsers
})

export default rootReducer
// import items from './items'
// import filters from './filters'
// import catalog from './catalog'
// import filters from './filters'

// export default combineReducers({
  // items
	// catalog,
	// filters
// })
