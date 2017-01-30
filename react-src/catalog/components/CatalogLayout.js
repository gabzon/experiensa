import React from 'react';
import CatalogVoyageCards from './CatalogVoyageCards'
import CatalogVoyageMinimalist from './CatalogVoyageMinimalist'
import CatalogVoyageMasonry from './voyages/layouts/masonry/CatalogVoyageMasonry'

export default class CatalogLayout extends React.Component {
    constructor(){
        super()
    }
    renderVoyages(){
        if(this.props.voyages) {
            return this.props.voyages.map((voyage) => {
                if (this.props.options.type == 'cards') {
                    return (
                        <CatalogVoyageCards voyage={voyage} key={voyage.index} options={this.props.options}/>
                    )
                } else {
                    return (
                        <CatalogVoyageMinimalist voyage={voyage} key={voyage.index} options={this.props.options}/>
                    )
                }
            })
        }else{
            return(<h1>No Voyages Available</h1>);
        }
    }
    renderMasonryVoyages(){
        if(this.props.voyages) {
            return this.props.voyages.map((voyage) => {
                return (
                    <CatalogVoyageMasonry voyage={voyage} key={voyage.index} options={this.props.options}/>
                )
            })
        }else{
            return(<h1>No Voyages Available</h1>);
        }
    }
    render() {
        if(this.props.options.type == 'masonry') {
            return (
                <div className="ui three column doubling stackable masonry grid">
                    {this.renderMasonryVoyages()}
                </div>
            );
        }else{
            return (
                <div className="ui four stackable cards">>
                    {this.renderVoyages()}
                </div>
            );
        }
    }
}
