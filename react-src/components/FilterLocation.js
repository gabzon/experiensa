import React from 'react';

export default class FilterLocation extends React.Component {
    constructor(){
        super()
    }
    renderLocationButtons(){
        return this.props.locations.map((location)=>{
            return(
                <button className="ui compact button" key={location.id} style={{"margin":"3px"}}>{location.name}</button>
            )
        })
    }
    render() {
        return (
            <div className="column">
            	<h3 className="ui header">
            		<i className="world icon"></i>
				  	<div className="content">Location</div>
            	</h3>
                <div className="ui items" style={{"display": "block"}}>
                    {this.renderLocationButtons()}
				</div>
            </div>
        );
    }
}
