import axios from 'axios'
//Tipos de Acciones
export const REQUEST_CATALOG = 'REQUEST_CATALOG'
// export const REQUEST_THEME_FILTER = 'REQUEST_THEME_FILTER'
// export const REQUEST_LOCATION_FILTER = 'REQUEST_LOCATION_FILTER'
export const FILTER_CATALOG_THEME_ACTIVE = 'FILTER_CATALOG_THEME_ACTIVE'
export const FILTER_CATALOG_THEME_OFF = 'FILTER_CATALOG_THEME_OFF'
/*
 * creadores de acciones
 */
export function requestCatalog() {
    return(dispatch,getState)=>{
        let localApiCatalogURL = sage_vars.siteurl + '/wp-json/wp/v2/catalog'
        axios.get(localApiCatalogURL)
            .then((response)=>{
                dispatch(
                    {
                        type: REQUEST_CATALOG,
                        payload: response.data.catalog,
                        themes: response.data.theme_filter,
                        themes_actives: [],
                        locations: response.data.location_filter,
                        locations_active: []
                    }
                )
            })
    }
 }
function check_name_exist(name, list) {

    let found = false
    if(list.length > 0) {
        for (var item of list) {
            if (item.name === name) {
                found = true
                break
            }
        }
    }
    return found
}
function add_filter(name,filters){
    if(!check_name_exist(name,filters)){
        filters.push(name)
    }
    return filters;
}
function delete_filter(name,filters){
    var index = filters.indexOf(name)
    if(index > -1)
        return filters.splice(index,1)
    return filters
}
export function filterThemeCatalog(filter,add){
    return(dispatch,getState)=>{
        let original_state = getState().catalog;
        console.log(original_state)
        let new_themes_actives
        console.log("el valor de add es "+add)
        if(add){
            new_themes_actives = add_filter(filter,original_state.theme_filters_active)
        }else{
            new_themes_actives = delete_filter(filter,original_state.theme_filters_active)
        }
        dispatch({
            type: FILTER_CATALOG_THEME_ACTIVE,
            payload: original_state.catalog,
            themes: original_state.theme_filters,
            themes_actives: new_themes_actives,
            locations: original_state.location_filters,
            locations_active: original_state.location_filters_active
        })
    }
}

export function filterLocationCatalog(filter,add){
    return(dispatch,getState)=>{
        let original_state = getState().catalog;
        console.log(original_state)
        console.log("el valor de add es "+add)
        let new_locations_actives
        if(add){
            new_locations_actives = add_filter(filter,original_state.location_filters_active)
        }else{
            new_locations_actives = delete_filter(filter,original_state.location_filters_active)
        }

        dispatch({
            type: FILTER_CATALOG_THEME_ACTIVE,
            payload: original_state.catalog,
            themes: original_state.theme_filters,
            themes_actives: original_state.theme_filters_active,
            locations: original_state.location_filters,
            locations_active: new_locations_actives
        })
    }
}