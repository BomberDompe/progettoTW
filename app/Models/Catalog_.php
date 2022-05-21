<?php

namespace App\Models;

use App\Models\Resources\Offer;

class Catalog_ {
    
    public function getByFilters($filters) {
        $catalog = new Offer;
        
        
        return $catalog;
    }
    
    public function getByPrice($catalog, $min_price, $max_price){
        return $catalog::where('prezzo', '>=', $min_price)
                ->andWhere('prezzo', '<=', $max_price);
    }
    
    public function getByOfferType($catalog, $offerType){
        return $catalog::where('tipologia', $offerType);
    }
    
    public function getByTotBedNumber($catalog, $min_bed, $max_bed) {
        return $catalog::where('posti_tot', '>=', $min_bed)
                ->andWhere('posti_tot','<=', $max_bed);
    }
    
    public function getByApartmentArea($catalog, $min_area, $max_area) {
        return $catalog::where('sup_appartamento', '>=', $min_area)
                ->andWhere('sup_appartamento', '<=', $max_area);
    }
    
    public function getByRoomNumber($catalog, $min_room, $max_room) {
        return $catalog::where('num_camere', '>=', $min_room)
                ->andWhere('num_camere', '<=', $max_room);
    }
    
    public function getByCucina($catalog, $cucina) {
        return $catalog::where('cucina', $cucina);
    }
    
    public function getByLocaleRicreativo($catalog, $localeRicreativo) {
        return $catalog::where('locale_ricreativo', $localeRicreativo);
    }
    
    public function getByRoomArea($catalog, $min_area, $max_area) {
        return $catalog::where('sup_camera', '>=', $min_area)
                ->andWhere('sup_camera', '<=', $max_area);
    }
    
    public function getByRoomType($catalog, $roomType) {
        return $catalog::where('posti_camera', $roomType);
    }
    
    public function getByAngoloStudio($catalog, $angoloStudio) {
        return $catalog::where('angolo_studio', $angoloStudio);
    }
    
    public function getByPeriod($catalog, $start_date, $end_date){
        return $catalog::where('disponibilita_inizio', '<=', $end_date)
                ->andWhere('disponibilita_fine', '>=', $start_date);
    }
}