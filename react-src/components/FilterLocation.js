import React from 'react';
import CatalogFilterButton from './filters/CatalogFilterButton'

export default class FilterLocation extends React.Component {
    constructor(){
        super()
    }
    renderLocationButtons(){
        return this.props.locations.map((location)=>{
            return(
                <CatalogFilterButton key={location.id} id={location.id} name={location.name} filter_type="FILTER_LOCATION"/>
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
