/* jshint ignore:start */
(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){

( function( ElementAPI, Views ) {

    'use strict';

	app.on( 'before:start', function() {

		// Register the views, behaviours etc..
	} );

	// Do something when the element renders
	ElementAPI.onRender( 'tailor_custom_wrapper', function( atts, model ) {
		console.log( 'Do something with or to the element when it renders' );
		console.log( atts );
		console.log( model );
		console.log( this.el ); // The element node
		console.log( this.$el );
    } );

} ) ( window.Tailor.Api.Element, Tailor.Views || {} );
},{}]},{},[1]);

( function( SettingAPI, $ ) {
	'use strict';
	// console.log("hola aqui estoy!!!!");
	SettingAPI.onChange( 'tailor_experiensa_grid:posttype', function( to, from ) {
		console.log("se cambio eso");
	} );
	/*SettingAPI.onChange( 'element:custom_setting', function( to, from, model ) {
		// Perform an action when an element setting changes using the to and from values of the setting
	} );*/
} ) ( window.Tailor.Api.Setting, jQuery );