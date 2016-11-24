import React from 'react';

export default class CatalogVoyageContactDetailsLayout extends React.Component {
    constructor(){
        super()
    }
    render() {
        return (
            <div className="ui two bottom attached buttons">
                <a href="mailto:?subject= Offre Costa Croisière Diadema" className="ui blue button">
                    <i className="mail outline icon"></i>Contact us
                </a>
                <div className="right floated">
                    <button id="modal-card-details" className="ui green button" type="submit" name="select" style={{"width": "100%","height": "100%"}}>
                        <i className="eye icon"></i>Details</button>
                </div>
            </div>
        );
    }
}
