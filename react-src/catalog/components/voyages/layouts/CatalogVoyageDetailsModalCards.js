import React from 'react'
import { Button, Header, Image, Modal, Icon, Grid } from 'semantic-ui-react'

export default class CatalogVoyageDetailsModalCards extends React.Component {
    state = { modalOpen: false }

    handleOpen = (e) => this.setState({
        modalOpen: true,
    })

    handleClose = (e) => this.setState({
        modalOpen: false,
    })

    constructor(){
        super()
    }
    render() {
        let voyage = this.props.voyage
        let price = () =>{
            let value = ""
            if(voyage.price){
                value = "<b>Price</b>: "+ voyage.price+" "
                if(voyage.currency)
                    value += voyage.currency
                value += "<br/>"
            }
            return value
        }
        let duration = () =>{
            return (voyage.duration?"<b>Duration</b>: " + voyage.duration+"<br/>":"")
        }
        let country = () =>{
            return (voyage.country?"<b>Country</b>: " + voyage.country+"<br/>":"")
        }
        let location = () =>{
            return (voyage.location?"<b>Location</b>: " + voyage.location+"<br/>":"")
        }
        let theme = () =>{
            return (voyage.theme?"<b>Theme</b>: " + voyage.theme+"<br/>":"")
        }
        let voyageImage = () => {
            let image = voyage.cover_image
            let imageSrc
            if(!image.feature_image && image.gallery.length < 1){
                imageSrc = sage_vars.stylesheet_directory_uri + '/assets/images/travel-no-image.jpg'
            }else{
                if(image.feature_image){
                    imageSrc = image.feature_image
                }else{
                    imageSrc = image.gallery[0]
                }
            }
            return imageSrc
        }
        let itinerary_title = () => {
            let title = ''
            if(voyage.itinerary && voyage.itinerary !== "")
                title = "Itinerary"
            return title
        }
        return (
            <Modal trigger={<Button id="modal-card-details" onClick={this.handleOpen} className="ui green button catalog-button" type="submit" name="select" style={{"width": "100%","height": "100%"}}><Icon name='eye' />Details</Button>}
                   open={this.state.modalOpen}
                   onClose={this.handleClose}
            >
                <Modal.Header>
                    <h2>{voyage.title}</h2>
                </Modal.Header>
                <Modal.Content>
                    <Grid stackable columns={2}>
                        <Grid.Column width={6}>
                            <div dangerouslySetInnerHTML={{__html: price()}}/>
                            <div dangerouslySetInnerHTML={{__html: duration()}}/>
                            <div dangerouslySetInnerHTML={{__html: country()}}/>
                            <div dangerouslySetInnerHTML={{__html: location()}}/>
                            <div dangerouslySetInnerHTML={{__html: theme()}}/>
                            <br/>
                            <p dangerouslySetInnerHTML={{__html: voyage.excerpt}}></p>
                        </Grid.Column>
                        <Grid.Column width={10}>
                            <Image src={voyageImage()}/>
                        </Grid.Column>
                    </Grid>
                </Modal.Content>
                <Modal.Content>
                    <h3>{itinerary_title()}</h3>
                    <Modal.Description dangerouslySetInnerHTML={{__html: voyage.itinerary}}>
                    </Modal.Description>
                </Modal.Content>
                <Modal.Actions>
                    <Button color="black" onClick={this.handleClose}>Close</Button>
                    <a className="ui positive right labeled icon button">
                        Contact us
                        <Icon name='checkmark' />
                    </a>
                </Modal.Actions>
            </Modal>
        );
    }
}
