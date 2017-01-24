import React from 'react';
import VoyageImage2 from './voyages/layout2/VoyageImage2'
import CatalogVoyageTitle from './voyages/CatalogVoyageTitle'
import CatalogVoyageExcerpt from './voyages/CatalogVoyageExcerpt'
import CatalogVoyageContactDetailsLayout from './voyages/CatalogVoyageContactDetailsLayout'
import { Button} from 'semantic-ui-react'
export default class CatalogVoyageModel2 extends React.Component {
    constructor(){
        super()
    }
    render() {
        console.log(this.props.voyage);
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
                <VoyageImage2 voyage={this.props.voyage}/>
                <div className="content">
                    <div className="header">{voyage.title}</div>
                    <br/><strong>Duration: </strong>{voyage.duration}
                    <br/><strong>Theme: </strong>{voyage.theme}
                    <br/><strong>Places: </strong>{voyage.location}
                    <br/><strong>Country: </strong>{voyage.country}
                </div>
                <Button basic color='black' attached='bottom'>{price}</Button>
            </div>
        );
    }
}
