import React from 'react';
import {connect} from 'react-redux'
import {filterThemeCatalog, filterLocationCatalog, filterCountryCatalog} from '../../actions'
import { Button } from 'semantic-ui-react'
import $ from 'jquery';

class CatalogFilterButton extends React.Component {
    constructor(){
        super()
        this.state = {
            isActive: false,
            classValue: 'catalog-button'
        }
        this.handleClick = this.handleClick.bind(this)
        // this.getStyles = /this.getStyles.bind(this)
    }
    handleClick(e,filter_type){
        console.log('handleCLick',e.currentTarget.style)
        // e.currentTarget.style.backgroundColor = '#ccc';
        const active = !this.state.isActive
        const value = active?'active catalog-button': 'catalog-button'
        this.setState({
            isActive: active,
            classValue: value
        })
        switch(filter_type){
            case 'FILTER_THEME':
                this.props.filterThemeCatalog(this.props.name,!this.state.isActive)
                break
            case 'FILTER_LOCATION':
                this.props.filterLocationCatalog(this.props.name,!this.state.isActive)
                break
            default:
                this.props.filterCountryCatalog(this.props.name,!this.state.isActive)
                break
        }
    }
    getStyles(){
        // console.log('mis props',this.props)
        // console.log('mis states son',this.state)
        // let bg = this.props.options.btn_color + '!important'
        // if(this.state.isActive)
        //     bg = this.props.options.btn_color_active+' !important'
        let style = {
            margin: "3px"//,
            // background: bg
        }
        // console.log('mi nuevo estilo es',style)
        return (style)
    }
    render() {
        // console.log('mis propsx',this.props)
        let styles = this.getStyles()
        return (
            <Button
                toggle
                compact
                className={this.state.classValue}
                key={this.props.id}
                style={styles}
                onClick={(e) => this.handleClick(e,this.props.filter_type)}
            >
                {this.props.name}
            </Button>
        );
    }
}
function mapStateToProps(state){
    return {
        isActive: false,
        customClass: "ui compact button"
    }
}

export default connect(mapStateToProps,
    {
        filterThemeCatalog,
        filterLocationCatalog,
        filterCountryCatalog
    })(CatalogFilterButton)