import React from 'react';
import ReactDOM from 'react-dom';
import { Provider } from 'react-redux';
import { createStore, applyMiddleware } from 'redux';
import thunk from 'redux-thunk'

import reducers from './reducers';

import Catalog from './components/Catalog'

const createStoreWithMiddleware = applyMiddleware(thunk)(createStore);

let catalog_app = document.getElementById('catalog-app')
if(catalog_app != null ) {
    ReactDOM.render(
        <Provider store={createStoreWithMiddleware(reducers)}>
            <Catalog />
        </Provider>
        , catalog_app);
}