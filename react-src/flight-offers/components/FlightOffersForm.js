import React, {Component} from 'react';
import {connect} from 'react-redux';
import {requestAirports} from '../actions/airports';
import { Button, Checkbox, Dropdown,Form, Segment} from 'semantic-ui-react';
import DatePicker from 'react-datepicker';
import moment from 'moment';

const countryOptions = [ { value: 'af', flag: 'af', text: 'Afghanistan' }];

class FlightOffersForm extends Component {
    constructor(props, context) {
        super(props, context);
        this.state = {
            startDate: moment()
        }
    }
    componentWillMount(){
        this.props.requestAirports()
    }
    render() {
        return (
            <Segment vertical padded='very'>
                <Form>
                    <Form.Group>
                        <Dropdown placeholder='Destination' fluid search selection options={countryOptions} />
                        <DatePicker
                            selected={this.state.startDate}
                            placeholderText="Date" />
                        <Dropdown placeholder='Arrival' fluid search selection options={countryOptions} />
                        <DatePicker placeholderText="Arrival Date" />
                    </Form.Group>
                    <Button type='submit'>Submit</Button>
                </Form>
            </Segment>
        );
    }
}

function mapStateToProps(state){
    return {
        airport: state.airport
    }
}

export default connect(mapStateToProps,{requestAirports})(FlightOffersForm)