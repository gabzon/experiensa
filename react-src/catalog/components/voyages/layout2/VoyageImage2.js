import React from 'react';

export default class VoyageImage2 extends React.Component {
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
                    imgSrc = sage_vars.stylesheet_directory_uri + '/assets/images/travel-no-image.jpg'
                    voyageImage = <img src={imgSrc}/>
                }
            }
        }else{
            imgSrc = sage_vars.stylesheet_directory_uri + '/assets/images/travel-no-image.jpg'
            voyageImage = <img src={imgSrc}/>
        }

        return (
            <div className="image catalog-image">
                {voyageImage}
            </div>
        );
    }
}
