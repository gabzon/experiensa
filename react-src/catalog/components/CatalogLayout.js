import React from 'react';
import CatalogVoyage from './CatalogVoyage'
import CatalogVoyageModel2 from './CatalogVoyageModel2'

export default class CatalogLayout extends React.Component {
    constructor(){
        super()
    }
    renderVoyages(){
        if(this.props.voyages) {
            return this.props.voyages.map((voyage) => {
                return (
                    <CatalogVoyageModel2 voyage={voyage} key={voyage.index}/>
                )
            })
        }else{
            return(<h1>No Voyages Available</h1>);
        }
    }
    render() {
        return (
            <div className="ui four stackable cards">
                {this.renderVoyages()}
            </div>
        );
    }
}
