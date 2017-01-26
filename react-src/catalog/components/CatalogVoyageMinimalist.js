import React from 'react';
import Minimalist from './voyages/layouts/VoyageImageMinimalist'
import CatalogVoyageDetailsModalMinimalist from './voyages/layouts/CatalogVoyageDetailsModalMinimalist'
import { Button} from 'semantic-ui-react'

export default class CatalogVoyageMinimalist extends React.Component {
    constructor(){
        super()
    }
    render() {
        // console.log(this.props.voyage);
        let voyage = this.props.voyage;
        let currency = "USD";
        if(voyage.currency!=null)
            currency = voyage.currency;
        let price = "No Available";
        if(voyage.price != '')
            price = voyage.price;
        if(price != 'No Available')
            price = currency+' '+price;
        return (
            <div className="ui card">
                <Minimalist voyage={this.props.voyage}/>
                <div className="content">
                    <div className="header">{voyage.title}</div>
                    <br/><strong>Duration: </strong>{voyage.duration}
                    <br/><strong>Theme: </strong>{voyage.theme}
                    <br/><strong>Places: </strong>{voyage.location}
                    <br/><strong>Country: </strong>{voyage.country}
                </div>
                <CatalogVoyageDetailsModalMinimalist voyage={this.props.voyage} price={price}/>
            </div>
        );
    }
}
