import React from 'react';
import VoyagePrice from './VoyagePrice'
import Experiensa_Resource from '../../resource'

export default class VoyageImage extends React.Component {
    constructor(){
        super()
    }
    render() {
        let voyageImage
        let imgSrc
        if(this.props.voyage.cover_image){
            let imageFeatureImage = this.props.voyage.cover_image.feature_image
            let imageGallery = this.props.voyage.cover_image.gallery
            if(imageFeatureImage){
                imgSrc = imageFeatureImage
                voyageImage = <img src={imgSrc}/>
            }else{
                if(typeof imageGallery !== 'undefined' && imageGallery.length > 0 ){
                    imgSrc = imageGallery[0]
                    voyageImage = <img src={imgSrc}/>
                }else{
                    imgSrc = Experiensa_Resource.stylesheet_directory_uri + '/assets/images/travel-no-image.jpg'
                    voyageImage = <img src={imgSrc}/>
                }
            }
        }else{
            imgSrc = Experiensa_Resource.stylesheet_directory_uri + '/assets/images/travel-no-image.jpg'
            voyageImage = <img src={imgSrc}/>
        }

        return (
            <div className="image">
                <VoyagePrice price={this.props.voyage.price}/>
                {voyageImage}
            </div>
        );
    }
}
