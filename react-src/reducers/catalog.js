import {REQUEST_CATALOG} from '../actions'

const initialState = {
  catalog: [],
  theme_filters: [],
  location_filters: []
}
export function requestCatalog(state = initialState,action){
  switch (action.type) {
    case REQUEST_CATALOG:
      // console.log(action.themes)
      // console.log(action.locations)
      return Object.assign({}, state, {
        catalog: action.payload,
        theme_filters: action.themes,
        location_filters: action.locations
      })
      break;
    default:
      return state
  }
}
