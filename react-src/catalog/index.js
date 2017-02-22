import React from 'react';
import ReactDOM from 'react-dom';
import $ from 'jquery';
import { Provider } from 'react-redux';
import { createStore, applyMiddleware } from 'redux';
import thunk from 'redux-thunk'

import reducers from './reducers';

import Catalog from './components/Catalog'

const createStoreWithMiddleware = applyMiddleware(thunk)(createStore);
let catalog_app = document.getElementById('catalog-app')
if(catalog_app != null ) {
    let catalog_props = $('#catalog-props');
    let title = true;
    let price = true;
    let button = true;
    let location = true;
    let duration = true;
    let themes = true;
    let country = true;
    let type = 'minimalist';
    let btn_color = '#fff';
    let btn_color_active = '#fff';
    let btn_color_hover = '#fff';
    if(catalog_props.length > 0){
        title = (catalog_props.data('title') == 'title');
        price = (catalog_props.data('price') == 'price');
        button = catalog_props.data('button') == 'button';
        location = catalog_props.data('location') == 'location';
        duration = catalog_props.data('duration') == 'duration';
        themes = catalog_props.data('themes') == 'themes';
        country = catalog_props.data('country') == 'country';
        type = catalog_props.data('type');
        btn_color = catalog_props.data('button_bg_color');
        btn_color_active = catalog_props.data('button_bg_hover_color');
        btn_color_hover = catalog_props.data('button_bg_active_color');
    }
    let options = {
        title: title,
        price: price,
        button: button,
        location: location,
        duration: duration,
        themes: themes,
        country: country,
        type: type,
        btn_color: btn_color,
        btn_color_active: btn_color_active,
        btn_color_hover: btn_color_hover
    }
    ReactDOM.render(
        <Provider store={createStoreWithMiddleware(reducers)}>
            <Catalog options={options}/>
        </Provider>
        , catalog_app);
}