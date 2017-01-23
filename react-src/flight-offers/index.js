import React from 'react';
import ReactDOM from 'react-dom';
import { Provider } from 'react-redux';
import { createStore, applyMiddleware } from 'redux';
import thunk from 'redux-thunk'

import reducers from './reducers';

import FlightOffersForm from './components/FlightOffersForm';

const createStoreWithMiddleware = applyMiddleware(thunk)(createStore);

let offerForm = document.getElementById('flight-offer-form');
if(offerForm != null ) {
    ReactDOM.render(
        <Provider store={createStoreWithMiddleware(reducers)}>
            <FlightOffersForm/>
        </Provider>,
        offerForm
    );
}