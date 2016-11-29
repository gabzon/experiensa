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
    handleClick(filter_type){
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
        switch(filter_type){
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
            <button className={this.state.customClass} key={this.props.id} style={{"margin":"3px"}} onClick={() => this.handleClick(this.props.filter_type)}>{this.props.name}</button>
        );
    }
}
function mapStateToProps(state){
    return {
        isActive: false,
        customClass: "ui compact button"
    }
}

export default connect(mapStateToProps,{filterThemeCatalog,filterLocationCatalog})(CatalogFilterButton)