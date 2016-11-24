import React from 'react';
import {Component} from 'react'
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
        return (
            <div className="ui container">
                <br/><br/><br/><br/>
                <CatalogFilterLayout themes={this.props.theme_filters} locations={this.props.location_filters}/>
                <br/><br/>
                <CatalogLayout voyages={this.props.catalog}/>
                <br/><br/>
            </div>
        );
    }
}

function mapStateToProps(state){
    return {
        catalog: state.catalog.catalog,
        theme_filters: state.catalog.theme_filters,
        location_filters: state.catalog.location_filters
    }
}

export default connect(mapStateToProps,{requestCatalog})(Catalog)