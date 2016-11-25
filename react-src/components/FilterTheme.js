import React from 'react';
import CatalogFilterButton from './filters/CatalogFilterButton'

export default class FilterTheme extends React.Component {
    constructor(){
        super()
    }
    renderThemesButtons(){
        return this.props.themes.map((theme)=>{
            return(
                <CatalogFilterButton key={theme.id} id={theme.id} name={theme.name} filter_type="FILTER_THEME"/>
            )
        })
    }
    render() {
        return (
            <div className="column">
            	<h3 className="ui header">
            		<i className="soccer icon"></i>
				  	<div className="content">Theme</div>
            	</h3>
                <div className="ui items" style={{"display": "block"}}>
                    {this.renderThemesButtons()}
				</div>
            </div>
        );
    }
}
