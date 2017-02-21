import React from 'react';
import {connect} from 'react-redux'

import {requestCatalog} from '../actions'

import CatalogLayout from './CatalogLayout'
import CatalogFilterLayout from './CatalogFilterLayout'

class Catalog extends React.Component {
    constructor(){
        super()
    }
    componentWillMount(){
        this.props.requestCatalog()
    }
    render() {
        // console.log('voy a mostrar',this.props.catalog)
        return (
            <div className="ui container">
                <br/><br/><br/><br/>
                <CatalogFilterLayout themes={this.props.theme_filters} locations={this.props.location_filters} countries={this.props.country_filters}/>
                <br/><br/>
                <CatalogLayout voyages={this.props.catalog} options={this.props.options}/>
                <br/><br/>
            </div>
        );
    }
}

function mapStateToProps(state){
    return {
        catalog: state.catalog.catalog,
        theme_filters: state.catalog.theme_filters,
        location_filters: state.catalog.location_filters,
        country_filters: state.catalog.country_filters
    }
}

export default connect(mapStateToProps,{requestCatalog})(Catalog)