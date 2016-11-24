import React from 'react'
import {Component} from 'react'
import {connect} from 'react-redux'
import {showUsers, requestCatalog} from '../actions'

class App extends Component{
    componentWillMount(){
        this.props.showUsers()
        this.props.requestCatalog()
    }
    renderUsersList(){
        return this.props.users.map((user)=>{
            return(
                <li key={user.id}>{user.name}</li>
            )
        })
    }
    renderCatalogList(){
        return this.props.catalog.map((voyage)=>{
            return(
                <li key={voyage.index}>{voyage.title}</li>
            )
        })
    }
    render(){
        return(
            <div>
                <h2>User list</h2>
                <ul>
                    {this.renderCatalogList()}
                </ul>
            </div>
        )
    }
}

function mapStateToProps(state){
    return {
        users: state.user.list,
        catalog: state.catalog.catalog
    }
}

export default connect(mapStateToProps,{showUsers,requestCatalog})(App)
