import React from 'react';

import FilterLocation from './FilterLocation'
import FilterTheme from './FilterTheme'
import FilterCountry from './FilterCountry'

export default class CatalogFilterLayout extends React.Component {
    constructor(){
        super()
    }
    render() {
        return (
            <div className="ui two column stackable grid">
                <div className="stretched row">
                    <FilterCountry countries={this.props.countries} options={this.props.options}/>
                    <FilterTheme themes={this.props.themes} options={this.props.options}/>
                </div>
            </div>
        );
    }
}
