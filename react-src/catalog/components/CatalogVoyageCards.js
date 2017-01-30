import React from 'react';
import VoyageImage from './voyages/VoyageImage'
import CatalogVoyageTitle from './voyages/CatalogVoyageTitle'
import CatalogVoyageExcerpt from './voyages/CatalogVoyageExcerpt'
import CatalogVoyageContactDetailsLayoutCards from './voyages/layouts/CatalogVoyageContactDetailsLayoutCards'

export default class CatalogVoyageCards extends React.Component {
    constructor(){
        super()
    }
    render() {
        let titleComponent;
        if(this.props.voyage.title){
            titleComponent = <CatalogVoyageTitle title={this.props.voyage.title} price={this.props.voyage.price}/>
        }else{
            titleComponent = <div></div>
        }
        let excerptComponent;
        if(this.props.voyage.excerpt){
            excerptComponent = <CatalogVoyageExcerpt excerpt={this.props.voyage.excerpt}/>
        }else{
            excerptComponent = <div></div>
        }
        return (
            <div className="ui card">
                <VoyageImage voyage={this.props.voyage}/>
                {titleComponent}
                {excerptComponent}
                <CatalogVoyageContactDetailsLayoutCards voyage={this.props.voyage}/>
            </div>
        );
    }
}
