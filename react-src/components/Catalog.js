import React from 'react';

import CatalogLayout from './CatalogLayout'
import CatalogFilterLayout from './CatalogFilterLayout'

export default class Catalog extends React.Component {
    constructor(){
        super()
    }
    render() {
        return (
            <div className="ui container">
                <CatalogFilterLayout/>
                <CatalogLayout/>
            </div>
        );
    }
}
