import React from 'react';
import CatalogVoyageDetailsModal from './CatalogVoyageDetailsModal'

export default class CatalogVoyageContactDetailsLayout extends React.Component {
    constructor(){
        super()
    }
    render() {
        return (
            <div className="ui two bottom attached buttons">
                <a href="mailto:?subject= Offre Costa Croisière Diadema" className="ui blue button">
                    <i className="mail outline icon"></i>Contact us
                </a>
                <div className="right floated">
                    <CatalogVoyageDetailsModal voyage={this.props.voyage}/>
                </div>
            </div>
        );
    }
}
