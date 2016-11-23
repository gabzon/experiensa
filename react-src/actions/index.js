import axios from 'axios'
//Tipos de Acciones
// export const REQUEST_CATALOG = 'REQUEST_CATALOG'
// export const REQUEST_THEME_FILTER = 'REQUEST_THEME_FILTER'
// export const REQUEST_LOCATION_FILTER = 'REQUEST_LOCATION_FILTER'
// export const FILTER_CATALOG_THEME = 'FILTER_CATALOG_THEME'
// export const FILTER_CATALOG_LOCATION = 'FILTER_CATALOG_LOCATION'
export const SHOW_USERS = 'SHOW_USERS'

export function showUsers(){
    return(dispatch,getState)=>{
      axios.get('http://jsonplaceholder.typicode.com/users')
        .then((response) => {
          console.log(response.data)
          dispatch({type:SHOW_USERS,payload:response.data})
        })
    }
}
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
 // export function requestCatalog(catalog) {
 //   return {
 // 	 type: REQUEST_CATALOG,
 // 	 catalog
 // 	}
 // }


// export const requestCatalog = catalog => ({
// 	type: REQUEST_CATALOG,
// 	catalog
// })
