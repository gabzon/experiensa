import React from 'react';

export default class FilterCategory extends React.Component {
    constructor(){
        super()
    }
    render() {
        return (
            <div className="column">
            	<h3 className="ui header">
            		<i className="edit icon"></i>
				  	<div className="content">Category</div>
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
