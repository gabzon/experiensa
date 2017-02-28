import React from 'react'
import ReactDOM from 'react-dom'
import { Provider } from 'react-redux'
import { createStore, applyMiddleware } from 'redux'
import thunk from 'redux-thunk'

import Catalog from './containers/Catalog'

let catalog_app = document.getElementById('catalog-app')
if(catalog_app != null ) {
    ReactDOM.render(
        <Catalog/>
        , catalog_app);
}