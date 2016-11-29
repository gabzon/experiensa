import axios from 'axios'
//Action Types
export const REQUEST_CATALOG = 'REQUEST_CATALOG'
export const FILTER_CATALOG = 'FILTER_CATALOG'
export const FILTER_CATALOG_THEME_OFF = 'FILTER_CATALOG_THEME_OFF'
/**
 * Helper functions
 */
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
    let new_filters = []
    for(var i = 0; i < filters.length; i++){
        if(filters[i] !== name){
            new_filters.push(filters[i])
        }
    }
    return new_filters
}

function filterCatalogByItem(filter,itemName,list){
    let auxList = []
    for( var voyage of list ){
        if(voyage.location.indexOf(filter) !== -1){
            auxList.push(voyage)
        }
    }
    return auxList
}

function searchOnCatalog(catalog,themes,locations){
    let auxList = []
    for(var filter of themes){
        for(var voyage of catalog){
            if(voyage.theme.indexOf(filter) !== -1){
                auxList.push(voyage)
            }
        }
    }
    for(var filter of locations){
        for(var voyage of catalog){
            if(voyage.location.indexOf(filter) !== -1){
                auxList.push(voyage)
            }
        }
    }
    if(auxList.length > 1){
        let nAuxList = auxList.filter(function(elem,pos){
            return auxList.indexOf(elem) == pos
        })
        if(nAuxList.length > 0)
            return nAuxList
        return []
    }
    return auxList
}
/*
 * Action Creations
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
                        catalogFiltered: [],
                        originalCatalog: response.data.catalog,
                        themes: response.data.theme_filter,
                        themes_actives: [],
                        locations: response.data.location_filter,
                        locations_active: []
                    }
                )
            })
    }
 }

export function filterThemeCatalog(filter,add){
    return(dispatch,getState)=>{
        let original_state = getState().catalog
        let originalCatalog = original_state.originalCatalog
        let themes_actives
        let location_actives = original_state.location_filters_active
        if(add){
            themes_actives = add_filter(filter,original_state.theme_filters_active)
        }else{
            themes_actives = delete_filter(filter,original_state.theme_filters_active)
        }
        let newCatalog
        if(themes_actives.length < 1 && location_actives.length < 1){
            newCatalog =  original_state.originalCatalog
        }else{
            newCatalog = searchOnCatalog(originalCatalog, themes_actives,location_actives)
        }
        dispatch({
            type: FILTER_CATALOG,
            payload: newCatalog,
            originalCatalog: original_state.originalCatalog,
            // catalogFiltered: newCatalog,
            themes: original_state.theme_filters,
            themes_actives: themes_actives,
            locations: original_state.location_filters,
            locations_active: original_state.location_filters_active
        })
    }
}

export function filterLocationCatalog(filter,add){
    return(dispatch,getState)=>{
        let original_state = getState().catalog;
        //console.log(original_state)
        //console.log("el valor de add es "+add)
        let new_locations_actives
        if(add){
            new_locations_actives = add_filter(filter,original_state.location_filters_active)
        }else{
            new_locations_actives = delete_filter(filter,original_state.location_filters_active)
        }
        let newCatalog = filterCatalogByItem(filter,'location',original_state.catalog)
        dispatch({
            type: FILTER_CATALOG,
            payload: newCatalog,
            themes: original_state.theme_filters,
            themes_actives: original_state.theme_filters_active,
            locations: original_state.location_filters,
            locations_active: new_locations_actives
        })
    }
}