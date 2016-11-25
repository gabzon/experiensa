import React from 'react';
import {connect} from 'react-redux'
import {filterThemeCatalog, filterLocationCatalog} from '../../actions'

class CatalogFilterButton extends React.Component {
    constructor(){
        super()
        this.state = {
            isActive: false,
            customClass: "ui compact button"
        }
        // this.handleClick = this.handleClick.bind(this)
    }
    handleClick(){
        if(this.state.isActive){
            this.setState({
                isActive: false,
                customClass: "ui compact button"
            })
        }else{
            this.setState({
                isActive: true,
                customClass: "ui active compact button"
            })
        }
        switch(this.props.filter_type){
            case 'FILTER_THEME':
                this.props.filterThemeCatalog(this.props.name,!this.state.isActive)
                break
            default:
                this.props.filterLocationCatalog(this.props.name,!this.state.isActive)
                break
        }

    }
    render() {
        return (
            <button className={this.state.customClass} key={this.props.id} style={{"margin":"3px"}} onClick={() => this.handleClick()}>{this.props.name}</button>
        );
    }
}
function mapStateToProps(state){
    return {
        isActive: false,
        customClass: "ui compact button"/*,
        catalog: state.catalog.catalog,
        theme_filters: state.catalog.theme_filters,
        location_filters: state.catalog.location_filters*/
    }
}

export default connect(mapStateToProps,{filterThemeCatalog,filterLocationCatalog})(CatalogFilterButton)