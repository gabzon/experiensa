import React, {Component} from 'react';
import {connect} from 'react-redux';

import {requestAirports} from '../actions/airports';

import { Button, Form, Segment} from 'semantic-ui-react';

import AirportsOptions from './AirportsOptions';


class FlightOffersForm extends Component {
    constructor() {
        super();
    }
    componentWillMount(){
        this.props.requestAirports()
    }
    render() {
        return (
            <Segment vertical padded='very'>
                <Form>
                    <Form.Group>
                        <AirportsOptions airports={this.props.airports}/>
                    </Form.Group>
                    <Button type='submit'>Submit</Button>
                </Form>
            </Segment>
        );
    }
}

function mapStateToProps(state){
    return {
        airports: state.airports
    }
}

export default connect(mapStateToProps,{requestAirports})(FlightOffersForm)