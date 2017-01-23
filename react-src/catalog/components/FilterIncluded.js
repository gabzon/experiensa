import React from 'react';

export default class FilterIncluded extends React.Component {
    constructor(){
        super()
    }
    render() {
        return (
            <div className="column">
            	<h3 className="ui header">
            		<i className="bar icon"></i>
				  	<div className="content">Included</div>
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
