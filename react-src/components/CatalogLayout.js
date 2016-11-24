import React from 'react';
import CatalogVoyage from './CatalogVoyage'

export default class CatalogLayout extends React.Component {
    constructor(){
        super()
    }
    renderVoyages(){
        return this.props.voyages.map((voyage)=>{
            return(
                <CatalogVoyage voyage={voyage} key={voyage.index}/>
            )
        })
    }
    render() {
        return (
            <div className="ui four stackable cards">
                {this.renderVoyages()}
            </div>
        );
    }
}
