import React from 'react';
import ReactDOM from 'react-dom';
import { Provider } from 'react-redux';
import { createStore, applyMiddleware } from 'redux';

import App from './components/app';
import reducers from './reducers';
import thunk from 'redux-thunk'

var experiensaResource = {
    url: sage_vars.siteurl
}
const createStoreWithMiddleware = applyMiddleware(thunk)(createStore);

ReactDOM.render(
  <Provider store={createStoreWithMiddleware(reducers)}>
    <App />
  </Provider>
  , document.getElementById('catalog-app'));
// import React from 'react';
// import { render } from 'react-dom';
// import { createStore, applyMiddleware } from 'redux'
// import { Provider } from 'react-redux';
// import thunk from 'redux-thunk'
// import createLogger from 'redux-logger'
// import reducer from './reducers';

// import Catalog from './components/Catalog';

// const middleware = [ thunk ]
//if (process.env.NODE_ENV !== 'production') {
  // middleware.push(createLogger())
//}
//
// const store = createStore(
//   reducer,
//   applyMiddleware(...middleware)
// )
//
// var catalog_app = document.getElementById('catalog-app');
// if (typeof(catalog_app) != 'undefined' && catalog_app != null){
// 	render(
// 	  <Provider store={store}>
// 	    <Catalog />
// 	  </Provider>,
// 	  catalog_app
// 	)
// }

// var catalog_app = document.getElementById('catalog-app');
// if (typeof(catalog_app) != 'undefined' && catalog_app != null){
// 	ReactDOM.render(<Catalog />, catalog_app);
// }

//let store = createStore(reducer);
