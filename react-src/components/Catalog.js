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
        // console.log("mi props es: ")
        // console.log(this.props.catalog.length)
        // if(this.props.catalog.length < 1){
        //     console.log("entro aqui")
        //     return (
        //         <div className="ui segment">
        //             <div className="ui active inverted dimmer">
        //                 <div className="ui text loader">Loading Catalog</div>
        //             </div>
        //         </div>
        //     )
        // }else {
            return (
                <div className="ui container">
                    <br/><br/><br/><br/>
                    <CatalogFilterLayout themes={this.props.theme_filters} locations={this.props.location_filters}/>
                    <br/><br/>
                    <CatalogLayout voyages={this.props.catalog}/>
                    <br/><br/>
                </div>
            );
        // }
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