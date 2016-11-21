import React from 'react';

export default class FilterTheme extends React.Component {
    constructor(){
        super()
    }
    render() {
        return (
            <div className="column">
            	<h3 className="ui header">
            		<i className="soccer icon"></i>
				  	<div className="content">Theme</div>
            	</h3>
                <div className="ui buttons">
				  	<button className="ui compact button">One</button>
				  	<button className="ui compact button">Two</button>
			  		<button className="ui compact button">Three</button>
				</div>
            </div>
        );
    }
}
