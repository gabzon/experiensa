import React from 'react';

export default class FilterTheme extends React.Component {
    constructor(){
        super()
    }
    renderThemesButtons(){
        return this.props.themes.map((theme)=>{
            return(
                <button className="ui compact button" key={theme.id}>{theme.name}</button>
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
                <div className="ui buttons">
                    {this.renderThemesButtons()}
				</div>
            </div>
        );
    }
}
