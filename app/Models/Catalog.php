<?php

namespace App\Models;

use App\Models\Resources\Offer;

class Catalog {
    
    protected $offerModel;
    
    public function __construct() {
        $this->offerModel = new Offer;
    }
    
    public function getAllOffers($elemEachPage = 0) {
        return $this->offerModel->getAllOffers($elemEachPage);
    }
    
    public function getOfferById($offerId) {
        return $this->offerModel->find($offerId);
    }
    
    public function getByFilters($filters) {
        $catalog = $this->getAllOffers();
        
        if (!is_null($filters["min_price"])) {
            $catalog = $catalog->where('prezzo', '>=', $filters["min_price"]);
        }
        if (!is_null($filters["max_price"])) {
            $catalog = $catalog->where('prezzo', '<=', $filters["max_price"]);
        }
        if (!is_null($filters["start_date"])) {
            $catalog = $catalog->where('disponibilita_fine', '>=', $filters["start_date"]);
        }
        if (!is_null($filters["end_date"])) {
            $catalog = $catalog->where('disponibilita_inizio', '<=', $filters["end_date"]);
        }
        if (!is_null($filters["posti_tot"])) {
            $catalog = $catalog->where('posti_tot', $filters["posti_tot"]);
        }
        if (array_key_exists("climatizzazione", $filters)) {
            $catalog = $catalog->where('climatizzazione', true);
        }
        if (array_key_exists("parcheggi", $filters)) {
            $catalog = $catalog->where('parcheggi', true);
        }
        if (array_key_exists("farmacia", $filters)) {
            $catalog = $catalog->where('farmacia', true);
        }
        if (array_key_exists("supermercato", $filters)) {
            $catalog = $catalog->where('supermercato', true);
        }
        if (array_key_exists("ristorazione", $filters)) {
            $catalog = $catalog->where('ristorazione', true);
        }
        if (array_key_exists("trasporti", $filters)) {
            $catalog = $catalog->where('trasporti', true);
        }
        if (array_key_exists("opzionabilita", $filters)) {
            $catalog = $catalog->where('opzionabilita', true);
        }
        
        if ($filters["tipologia"] === '0') {
            $catalog = $catalog->where('tipologia', 0);
            if (array_key_exists("sup_appartamento", $filters) && 
                    !is_null($filters["sup_appartamento"])) {
                $catalog = $catalog->where('sup_appartamento', $filters["sup_appartamento"]);
            }
            if (array_key_exists("num_camere", $filters) && 
                    !is_null($filters["num_camere"])) {
                $catalog = $catalog->where('num_camere', $filters["num_camere"]);
            }
            if (array_key_exists("cucina", $filters)) {
                $catalog = $catalog->where('cucina', true);
            }
            if (array_key_exists("locale_ricreativo", $filters)) {
                $catalog = $catalog->where('locale_ricreativo', true);
            }
            
        } elseif ($filters["tipologia"] === '1') {
            $catalog = $catalog->where('tipologia', 1);
            if (array_key_exists("sup_appartamento", $filters) && 
                    !is_null($filters["sup_camera"])) {
                $catalog = $catalog->where('sup_camera', $filters["sup_camera"]);
            }
            if (array_key_exists("posti_camera", $filters) && 
                    !is_null($filters["posti_camera"])) {
                $catalog = $catalog->where('posti_camera', $filters["posti_camera"]);
            }
            if (array_key_exists("angolo_studio", $filters)) {
                $catalog = $catalog->where('angolo_studio', true);
            }
        }
        
        return $catalog->get();
    }
    
}
