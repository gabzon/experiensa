import React from 'react';
import CatalogVoyageDetailsModalCards from './CatalogVoyageDetailsModalCards'

export default class CatalogVoyageContactDetailsLayoutCards extends React.Component {
    constructor(){
        super()
    }
    render() {
        let mailData = "mailto:?subject= Offer "+this.props.voyage.title;
        return (
            <div className="ui two bottom attached buttons catalog-button">
                <a href={mailData} className="ui blue button">
                    <i className="mail outline icon"/>Contact us
                </a>
                <div className="right floated">
                    <CatalogVoyageDetailsModalCards voyage={this.props.voyage}/>
                </div>
            </div>
        );
    }
}
