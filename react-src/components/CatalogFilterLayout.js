import React from 'react';

import FilterCategory from './FilterCategory'
import FilterLocation from './FilterLocation'
import FilterTheme from './FilterTheme'
import FilterIncluded from './FilterIncluded'

export default class CatalogFilterLayout extends React.Component {
    constructor(){
        super()
    }
    render() {
        return (
            <div className="ui four column stackable grid">
                <div className="stretched row">
                    <FilterLocation locations={this.props.locations}/>
                    <FilterTheme themes={this.props.themes}/>
                </div>
            </div>
        );
    }
}
