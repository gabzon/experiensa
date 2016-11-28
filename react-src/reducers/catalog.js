import {REQUEST_CATALOG, FILTER_CATALOG} from '../actions'

const initialState = {
  catalog: [],
  originalCatalog: [],
  // catalogFiltered: [],
  theme_filters: [],
  location_filters: [],
  theme_filters_active: [],
  location_filters_active: []
}
export function requestCatalog(state = initialState,action){
    switch (action.type) {
        case REQUEST_CATALOG:
            console.log("mi action es REQUEST_CATALOG: ")
            console.log(action)
            return Object.assign({}, state, {
                catalog: action.payload,
                originalCatalog: action.originalCatalog,
                // catalogFiltered: action.catalogFiltered,
                theme_filters: action.themes,
                location_filters: action.locations,
                theme_filters_active: [],
                location_filters_active: []
            })
            break;
        case FILTER_CATALOG:
            console.log("mi action es FILTER_CATALOG: ")
            console.log(action)
            return Object.assign({}, state, {
                catalog: action.payload,
                originalCatalog: action.originalCatalog,
                // catalogFiltered: action.catalogFiltered,
                theme_filters: action.themes,
                theme_filters_active: action.themes_actives,
                location_filters: action.locations,
                location_filters_active: action.locations_active
            })
        default:
            return state
    }
}
