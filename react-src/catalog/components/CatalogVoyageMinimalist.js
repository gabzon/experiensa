import React from 'react';
import Minimalist from './voyages/layouts/VoyageImageMinimalist'
import CatalogVoyageDetailsModalMinimalist from './voyages/layouts/CatalogVoyageDetailsModalMinimalist'
import { Button} from 'semantic-ui-react'

export default class CatalogVoyageMinimalist extends React.Component {
    constructor(){
        super()
    }
    createTitleRow(value,show){
        if(show){
            return(
                <div className="header catalog-title">{value}</div>
            )
        }
        return(<div></div>)
    }
    createDataRow(title,value,show){
        if(show) {
            return (
                <div className="catalog-content">
                    <br/><strong>{title}: </strong>{value}
                </div>
            );
        }
        return(<div></div>);
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
                    {this.createTitleRow(voyage.title,this.props.options.title)}
                    {this.createDataRow('Duration',voyage.duration,this.props.options.duration)}
                    {this.createDataRow('Theme',voyage.theme,this.props.options.themes)}
                    {this.createDataRow('Places',voyage.location,this.props.options.location)}
                    {this.createDataRow('Country',voyage.country,this.props.options.country)}
                </div>
                <CatalogVoyageDetailsModalMinimalist voyage={this.props.voyage} price={price} options={this.props.options}/>
            </div>
        );
    }
}
