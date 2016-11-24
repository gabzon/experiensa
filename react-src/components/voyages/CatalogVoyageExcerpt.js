import React from 'react';

export default class CatalogVoyageExcerpt extends React.Component {
    constructor(){
        super()
    }
    render() {
        return (
            <div className="extra content">
                <p dangerouslySetInnerHTML={{__html: this.props.excerpt}} />
            </div>
        );
    }
}
