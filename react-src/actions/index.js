import axios from 'axios'
//Tipos de Acciones
export const REQUEST_CATALOG = 'REQUEST_CATALOG'
export const FILTER_CATALOG = 'FILTER_CATALOG'
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
                        catalogFiltered: [],
                        originalCatlog: response.data.catalog,
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

function filterCatalogByItem(filter,itemName,list){
    let auxList = []
    for( var voyage of list ){
        if(voyage.location.indexOf(filter) !== -1){
            auxList.push(voyage)
        }
    }
    return auxList
}

function searchThemeNeedle(needle, filteredList,originalList){
    let auxList = []
    console.log("needle"+needle)
    for( var voyage of originalList ){
        if(voyage.theme.indexOf(needle) !== -1){
            auxList.push(voyage)
        }
    }
    if(filteredList.length > 0){
        let sw
        for( var item of auxList){
            sw = false
            for (var foundItem of filteredList) {
                if(foundItem.index === item.index){
                    sw = true
                    break
                }
            }
            if(!sw){
                filteredList.push(item)
            }

        }
        return filteredList
    }
    return auxList
}

export function filterThemeCatalog(filter,add){
    return(dispatch,getState)=>{
        let original_state = getState().catalog
        let new_themes_actives
        if(add){
            new_themes_actives = add_filter(filter,original_state.theme_filters_active)
        }else{
            new_themes_actives = delete_filter(filter,original_state.theme_filters_active)
        }
        let newCatalog =  original_state.catalog
        console.log(original_state)
        if(new_themes_actives.length < 1 && original_state.location_filters_active.length < 1){
            newCatalog =  original_state.originalCatlog
        }else{
            newCatalog = searchThemeNeedle(filter, original_state.catalogFiltered, original_state.originalCatlog)
            console.log('se va mostrar es')
            console.log(newCatalog)
        }
        dispatch({
            type: FILTER_CATALOG,
            payload: newCatalog,
            originalCatlog: original_state.originalCatlog,
            catalogFiltered: newCatalog,            
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