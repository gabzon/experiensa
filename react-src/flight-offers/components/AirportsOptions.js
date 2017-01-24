import React, {Component} from 'react';
import {Dropdown} from 'semantic-ui-react';
export default class AirportsOptions extends Component {
    constructor() {
        super();
    }
    createOptions(){
        let airports = this.props.airports.airports;
        let myOptions = airports.map((airport)=>{
            return {value:airport.code,text:airport.name}
        })
        return (myOptions);
    }
    render() {
        let myOptions = this.createOptions();
        return (
            <div>
                <Dropdown placeholder='Destination' search selection options={myOptions}/>
            </div>
        );
    }
}