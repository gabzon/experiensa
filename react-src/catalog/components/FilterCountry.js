import React from 'react';
import CatalogFilterButton from './filters/CatalogFilterButton'

export default class FilterCountry extends React.Component {
    constructor(){
        super()
    }
    renderCountryButtons(){
        if(this.props.countries) {
            return this.props.countries.map((country) => {
                return (
                    <CatalogFilterButton key={country.id} id={country.id} name={country.name}
                                         filter_type="FILTER_COUNTRY" options={this.props.options}/>
                )
            })
        }else{
            return (<h3>No Country Filters</h3>)
        }
    }
    render() {
        return (
            <div className="column">
                <h3 className="ui header">
                    <i className="world icon"/>
                    <div className="content catalog-title">Country</div>
                </h3>
                <div className="ui items" style={{"display": "block"}}>
                    {this.renderCountryButtons()}
                </div>
            </div>
        );
    }
}
