import React from 'react';
import ReactDOM from 'react-dom';

import Catalog from './components/Catalog';
var catalog_app = document.getElementById('catalog-app');
if (typeof(catalog_app) != 'undefined' && catalog_app != null){
	ReactDOM.render(<Catalog />, catalog_app);
}
