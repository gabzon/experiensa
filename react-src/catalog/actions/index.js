require('es6-promise').polyfill();
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
var arrayUnique = (array) =>{
    return array.filter((elem,pos,arr)=>{
        return arr.indexOf(elem) == pos;
    })
}
function getFilteredCatalog(catalog,filters,object_name){
    // console.log('estoy en getFilteredCatalog')
    // console.log('el catalogo',catalog)
    // console.log('filtros',filters)
    // console.log('mi object_name',object_name)
    let auxList = []
    let sw
    for (var voyage of catalog) {
        sw = true
        for (var filter of filters) {
            if (voyage[object_name].indexOf(filter) === -1) {
                sw = false
                break
            }
        }
        if (sw) {
            auxList.push(voyage)
        }
    }
    // console.log('retorno de getFilteredCatalog',auxList)
    return auxList
}
function searchOnCatalogAND(catalog,themes,locations,countries){
    let auxList = []
    let returnAuxList = []
    // console.log('estoy en searchOnCatalogAND')
    // console.log('themes',themes,'locations',locations,'countries',countries)
    if(themes.length > 0) {
        // console.log('1 voy por themes',catalog)
        let nAuxList = getFilteredCatalog(catalog,themes,'theme')
        auxList.push(...nAuxList)
        if(auxList.length > 0 && locations.length > 0){
            // console.log('2 voy por locations',auxList)
            nAuxList = getFilteredCatalog(auxList,locations,'location');
            if(nAuxList.length > 0) {
                auxList.push(...nAuxList)
                auxList = arrayUnique(auxList)
            }else{
                auxList = []
            }
            if(auxList.length > 0 && countries.length > 0){
                // console.log('3 voy por country',auxList)
                nAuxList = getFilteredCatalog(auxList,countries,'country');
                returnAuxList.push(...nAuxList)
            }else{
                returnAuxList = auxList
            }
        }else{
            if(auxList.length > 0 && countries.length > 0){
                nAuxList = getFilteredCatalog(auxList,countries,'country');
                if(nAuxList.length > 0) {
                    returnAuxList.push(...nAuxList)
                }else{
                    returnAuxList = []
                }
            }else{
                returnAuxList = auxList
            }
        }

    }else{
        if(locations.length > 0){
            // console.log('1 voy por location', catalog)
            let nAuxList = getFilteredCatalog(catalog,locations,'location')
            auxList.push(...nAuxList)
            if(auxList.length > 0 && countries.length > 0){
                // console.log('2 voy por country',auxList)
                nAuxList = getFilteredCatalog(auxList,countries,'country');
                // returnAuxList.push(...nAuxList)
                if(nAuxList.length > 0) {
                    returnAuxList.push(...nAuxList)
                    returnAuxList = arrayUnique(returnAuxList)
                }else{
                    returnAuxList = []
                }
            }else{
                returnAuxList = auxList
            }
        }else{
            if(countries.length > 0){
                // console.log('1 voy por country')
                let nAuxList = getFilteredCatalog(catalog,countries,'country');
                returnAuxList.push(...nAuxList)
                // console.log('voy a regresar ',auxList)
                // returnAuxList = auxList
            }else{
                // console.log('1 voy por nada')
                returnAuxList = auxList
            }
        }
    }
    // console.log('el filtrado final es',returnAuxList)
    return returnAuxList
}
/*
 * Action Creations
 */
export function requestCatalog() {
    return(dispatch,getState)=>{
        let localApiCatalogURL = sage_vars.siteurl + '/wp-json/wp/v2/catalog'
        // console.log(localApiCatalogURL)
        axios.get(localApiCatalogURL,{timeout: 30000})
            .then((response)=>{
                // console.log(response);
                dispatch(
                    {
                        type: REQUEST_CATALOG,
                        payload: response.data.catalog,
                        catalogFiltered: [],
                        originalCatalog: response.data.catalog,
                        themes: response.data.theme_filter,
                        themes_actives: [],
                        locations: response.data.location_filter,
                        locations_active: [],
                        countries: response.data.country_filter,
                        countries_active: []
                    }
                )
            })
            .catch((error)=>{
                console.log('Error',error)
            })
    }
 }

export function filterThemeCatalog(filter,add){
    return(dispatch,getState)=>{
        let original_state = getState().catalog
        let originalCatalog = original_state.originalCatalog

        let location_actives = original_state.location_filters_active
        let countries_actives = original_state.country_filters_active

        let themes_actives
        if(add){
            themes_actives = add_filter(filter,original_state.theme_filters_active)
        }else{
            themes_actives = delete_filter(filter,original_state.theme_filters_active)
        }
        let newCatalog
        if(themes_actives.length < 1 && location_actives.length < 1 && countries_actives.length < 1){
            newCatalog =  original_state.originalCatalog
        }else{
            newCatalog = searchOnCatalogAND(originalCatalog, themes_actives,location_actives,countries_actives)
        }
        dispatch({
            type: FILTER_CATALOG,
            payload: newCatalog,
            originalCatalog: original_state.originalCatalog,
            themes: original_state.theme_filters,
            themes_actives: themes_actives,
            locations: original_state.location_filters,
            locations_active: location_actives,
            countries: original_state.country_filters,
            countries_actives: countries_actives
        })
    }
}

export function filterLocationCatalog(filter,add){
    // console.log('filter',filter)
    // console.log('filter')
    return(dispatch,getState)=>{
        let original_state = getState().catalog
        let originalCatalog = original_state.originalCatalog

        let themes_actives = original_state.theme_filters_active
        let countries_actives = original_state.country_filters_active
        // console.log('themes_actives',themes_actives)
        // console.log('countries_actives',countries_actives)
        let location_actives
        if(add){
            location_actives = add_filter(filter,original_state.location_filters_active)
        }else{
            location_actives = delete_filter(filter,original_state.location_filters_active)
        }
        // console.log('location_actives',location_actives)
        let newCatalog
        if(themes_actives.length < 1 && location_actives.length < 1 && countries_actives.length < 1){
            newCatalog =  original_state.originalCatalog
        }else{
            newCatalog = searchOnCatalogAND(originalCatalog, themes_actives,location_actives,countries_actives)
        }
        dispatch({
            type: FILTER_CATALOG,
            payload: newCatalog,
            originalCatalog: original_state.originalCatalog,
            themes: original_state.theme_filters,
            themes_actives: themes_actives,
            locations: original_state.location_filters,
            locations_active: location_actives,
            countries: original_state.country_filters,
            countries_actives: countries_actives
        })
    }
}
export function filterCountryCatalog(filter, add){
    return(dispatch,getState)=>{
        let original_state = getState().catalog
        let originalCatalog = original_state.originalCatalog

        let themes_actives = original_state.theme_filters_active
        let location_actives = original_state.location_filters_active

        let countries_actives
        if(add){
            countries_actives = add_filter(filter,original_state.country_filters_active)
        }else{
            countries_actives = delete_filter(filter,original_state.country_filters_active)
        }
        let newCatalog
        if(themes_actives.length < 1 && location_actives.length < 1 && countries_actives.length < 1){
            newCatalog =  original_state.originalCatalog
        }else{
            newCatalog = searchOnCatalogAND(originalCatalog, themes_actives,location_actives,countries_actives)
        }
        dispatch({
            type: FILTER_CATALOG,
            payload: newCatalog,
            originalCatalog: original_state.originalCatalog,
            themes: original_state.theme_filters,
            themes_actives: themes_actives,
            locations: original_state.location_filters,
            locations_active: location_actives,
            countries: original_state.country_filters,
            countries_actives: countries_actives
        })
    }
}