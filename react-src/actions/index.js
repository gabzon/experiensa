import axios from 'axios'
//import Experiensa_Resource from '../resource'
// console.log(Experiensa_Resource)
//Tipos de Acciones
export const REQUEST_CATALOG = 'REQUEST_CATALOG'
// export const REQUEST_THEME_FILTER = 'REQUEST_THEME_FILTER'
// export const REQUEST_LOCATION_FILTER = 'REQUEST_LOCATION_FILTER'
// export const FILTER_CATALOG_THEME = 'FILTER_CATALOG_THEME'
// export const FILTER_CATALOG_LOCATION = 'FILTER_CATALOG_LOCATION'
export const SHOW_USERS = 'SHOW_USERS'

/*
 * otras constantes
 */
//
// export const VisibilityFilters = {
//   SHOW_ALL: 'SHOW_ALL',
//   SHOW_COMPLETED: 'SHOW_COMPLETED',
//   SHOW_ACTIVE: 'SHOW_ACTIVE'
// }
/*
 * creadores de acciones
 */
export function showUsers(){
    return(dispatch,getState)=>{
        axios.get('http://jsonplaceholder.typicode.com/users')
            .then((response) => {
                console.log(response.data)
                dispatch({type:SHOW_USERS,payload:response.data})
            })
    }
}

export function requestCatalog() {
    return(dispatch,getState)=>{
        let localApiCatalogURL = sage_vars.siteurl + '/wp-json/wp/v2/catalog'
        axios.get(localApiCatalogURL)
            .then((response)=>{
                dispatch(
                    {
                        type:REQUEST_CATALOG,
                        payload:response.data.catalog,
                        themes: response.data.theme_filter,
                        locations: response.data.location_filter
                    }
                )
            })
    }
 }
