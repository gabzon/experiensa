import axios from 'axios';
import IC from 'iatacodes';
const ic = new IC('f48e20ba-d9bb-477e-855a-694b0c4a0ac9');

const iatacodesURL = 'https://iatacodes.org/api/v6/';
const airportsEndpoint = 'airports';
const iatacodesKey = 'f48e20ba-d9bb-477e-855a-694b0c4a0ac9';
const iratacodesArgs = {
    // method: 'get',
    // url: iatacodesURL+airportsEndpoint,
    params: {
        api_key: iatacodesKey
    },
    headers: {
        // 'X-Requested-With': 'XMLHttpRequest',
        'Access-Control-Allow-Origin': '*'
    },
};
//Action Types
export const AIRPORTS_LIST = 'AIRPORTS_LIST';
/*
 * Action Creations
 */
export function requestAirports() {
    return(dispatch,getState)=>{
        /*ic.api('airlines', {}, function(error, response) {
            console.log(error);
            console.log(response);
            let data = [];
            if(!error){
                data = response.response;
            }
            dispatch(
                {
                    type: AIRPORTS_LIST,
                    airports: data
                }
            )
        });*/
        let URL = 'http://iatacodes.org/api/v6/airports?api_key=f48e20ba-d9bb-477e-855a-694b0c4a0ac9';
        console.log(URL);
        axios.get(URL, iratacodesArgs)
            .then(function(response){
                console.log(response.data); // ex.: { user: 'Your User'}
                console.log(response.status); // ex.: 200
                dispatch(
                    {
                        type: AIRPORTS_LIST,
                        airports: response.response
                    }
                )
            })
            .catch(function(thrown) {
                if (axios.isCancel(thrown)) {
                    console.log('Request canceled', thrown.message);
                } else {
                    // handle error
                }
            });
        // axios.get(URL,iratacodesArgs)
        // .then((response)=>{
        //     console.log(response.response);
        //     dispatch(
        //         {
        //             type: AIRPORTS_LIST,
        //             airports: response.response
        //         }
        //     )
        // })
        /*.catch(function(res) {
            if(res instanceof Error) {
                console.log(res.message);
            } else {
                console.log(res.data);
            }
        });*/
    }
}
