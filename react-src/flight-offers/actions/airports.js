import axios from 'axios';

//Action Types
export const AIRPORTS_LIST = 'AIRPORTS_LIST';
/*
 * Action Creations
 */
export function requestAirports() {
    return(dispatch,getState)=>{
        let URL = sage_vars.siteurl + '/wp-json/wp/v2/airports';
        axios.get(URL)
        .then((response)=>{
            dispatch(
                {
                    type: AIRPORTS_LIST,
                    airports: response.data.response
                }
            )
        })
        .catch(function(res) {
            if(res instanceof Error) {
                console.log(res.message);
            } else {
                console.log(res.data);
            }
        });
    }
}
