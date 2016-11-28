import React from 'react';

import FilterLocation from './FilterLocation'
import FilterTheme from './FilterTheme'

export default class CatalogFilterLayout extends React.Component {
    constructor(){
        super()
    }
    render() {
        return (
            <div className="ui two column stackable grid">
                <div className="stretched row">
                    <FilterLocation locations={this.props.locations}/>
                    <FilterTheme themes={this.props.themes}/>
                </div>
            </div>
        );
    }
}
