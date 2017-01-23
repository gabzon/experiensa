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

function searchOnCatalogOR(catalog,themes,locations){
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
        if(nAuxList.length > 0) {
            return nAuxList
        }
        return []
    }
    return auxList
}
function searchOnCatalogAND(catalog,themes,locations){
    let auxList = []
    let returnAuxList = []
    let sw
    if(themes.length > 0) {
        for (var voyage of catalog) {
            sw = true
            for (var filter of themes) {
                if (voyage.theme.indexOf(filter) === -1) {
                    sw = false
                    break
                }
            }
            if (sw) {
                auxList.push(voyage)
            }
        }
        if(auxList.length > 0 && locations.length > 0){
            for (var voyage of auxList) {
                sw = true
                for (var filter of locations) {
                    if (voyage.location.indexOf(filter) === -1) {
                        sw = false
                        break
                    }
                }
                if (sw) {
                    returnAuxList.push(voyage)
                }
            }
        }else{
            if(auxList.length > 0)
                returnAuxList = auxList
        }

    }else{
        if(locations.length > 0){
            for (var voyage of catalog) {
                sw = true
                for (var filter of locations) {
                    if (voyage.location.indexOf(filter) === -1) {
                        sw = false
                        break
                    }
                }
                if (sw) {
                    returnAuxList.push(voyage)
                }
            }
        }
    }
    return returnAuxList
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
            newCatalog = searchOnCatalogAND(originalCatalog, themes_actives,location_actives)
            // newCatalog = searchOnCatalogOR(originalCatalog, themes_actives,location_actives)
        }
        dispatch({
            type: FILTER_CATALOG,
            payload: newCatalog,
            originalCatalog: original_state.originalCatalog,
            themes: original_state.theme_filters,
            themes_actives: themes_actives,
            locations: original_state.location_filters,
            locations_active: location_actives
        })
    }
}

export function filterLocationCatalog(filter,add){
    return(dispatch,getState)=>{
        let original_state = getState().catalog
        let originalCatalog = original_state.originalCatalog
        let themes_actives = original_state.theme_filters_active
        let location_actives
        if(add){
            location_actives = add_filter(filter,original_state.location_filters_active)
        }else{
            location_actives = delete_filter(filter,original_state.location_filters_active)
        }
        let newCatalog
        if(themes_actives.length < 1 && location_actives.length < 1){
            newCatalog =  original_state.originalCatalog
        }else{
            newCatalog = searchOnCatalogAND(originalCatalog, themes_actives,location_actives)
        }
        dispatch({
            type: FILTER_CATALOG,
            payload: newCatalog,
            originalCatalog: original_state.originalCatalog,
            themes: original_state.theme_filters,
            themes_actives: themes_actives,
            locations: original_state.location_filters,
            locations_active: location_actives
        })
    }
}