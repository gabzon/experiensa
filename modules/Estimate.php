<?php namespace Experiensa\Modules;
/**
 * Class Estimate
 * @package Experiensa\Modules
 */

class Estimate
{
    private $voyages;
    function __construct($id)
    {
        $voyages = get_post_meta($id,'estimate_voyages');
        $this->voyages = $voyages[0];
    }
    public function getVoyages(){
        return $this->voyages;
    }
    public function getVoyageAmount(){
        return count($this->voyages);
    }
    public function getTitle($index){
        $title = $this->voyages[$index]['estimate_title'];
        return (!empty($title)?$title:'');
    }
    public function getNumberOfPeople($index){
        $peoples = $this->voyages[$index]['estimate_people'];
        return (!empty($peoples)?$peoples:'0');
    }
    public function getDays($index){
        $days = $this->voyages[$index]['estimate_days'];
        return (!empty($days)?$days:'0');
    }
    public function getNights($index){
        $nights = $this->voyages[$index]['estimate_nights'];
        return (!empty($nights)?$nights:'0');
    }
    public function getCurrency($index){
        return $this->voyages[$index]['estimate_currency'];
    }
    public function getExpiryDate($index){
        $date = $this->voyages[$index]['estimate_expiry_date'];
        return (!empty($date)?$date:'');
    }
    public function getSlogan($index){
        $slogan = $this->voyages[$index]['estimate_slogan'];
        return (!empty($slogan)?$slogan:'');
    }
    public function getExtraInfo($index){
        $extra = $this->voyages[$index]['estimate_information_conditions'];
        return (!empty($extra)?$extra:'');
    }
    public function getImages($index){
        return $this->voyages[$index]['estimate_gallery'];
    }
    public function getFlights($index){
        return $this->voyages[$index]['flights_group'];
    }
    public function getAccommodations($index){
        return $this->voyages[$index]['accomodations_group'];
    }
    public function checkVoyagesTitle(){
        $voyages = $this->voyages;
        $exist = false;
        foreach ($voyages as $voyage){
            if( !empty($voyage['estimate_title'])){
                $exist = true;
                break;
            }
        }
        return $exist;
    }
    public function checkEmptyImages($index){
        $exist = false;
        $images = $this->voyages[$index]['estimate_gallery'];
        if(!empty($images) && !empty($images[0]))
            $exist = true;
        return $exist;
    }
}