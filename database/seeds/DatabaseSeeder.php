<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder {

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {

        DB::table('faqs')->insert([
            ['faq_id' => 1, 'domanda' => 'Come faccio ad aggiungere le mie offerte al catalogo ApartRent?', 
                'risposta' => 'Per poter aggiungere le proprie offerte bisogna aver effettuato l\'accesso in un account'
                . ' di tipo \"Locatore\". Successivamente al login o alla registrazione, apparirà nel menù in alto (barra di'
                . ' navigazione) la voce \"Area Riservata". Dall\'Area Riservata, tra le altre funzionalità, vi è anche quella di inserire'
                . ' nuove offerte. Ogni offerta è visibile a tutti gli utenti del sito.'],
            ['faq_id' => 2, 'domanda' => 'Come faccio a contattare il proprietario di un\'alloggio?', 
                'risposta' => 'ApartRent prevede un sistema interno di messaggistica. Questo è tuttavia realizzato in modo'
                . ' che la comunicazione tra due utenti possa avvenire soltanto in relazione all\'opzionamento di un\'offerta.'
                . ' Per poter scrivere al proprietario di un\'offerta è pertanto necessario possedere un account di tipo \"Locatario\",'
                . ' recarsi nel Catalogo, visualizzare i Dettagli dell\'offerta a cui si è interessati e cliccare su \"Opziona\". Facendo'
                . ' ciò, si aprirà nella Bacheca Messaggi una nuova conversazione con l\'utente che ha inserito l\'offerta, con un'
                . ' messaggio predefinito.'],
            ['faq_id' => 3, 'domanda' => 'Sono presenti offerte di vendita di appartamenti?', 
                'risposta' => 'No. Il sito contiene soltanto offerte di appartamenti e posti letto in affitto per studenti. Non è'
                . ' possibile inserire offerte di vendita di alloggi.'],
            ['faq_id' => 4, 'domanda' => 'Il catalogo presenta la funzionalità di filtraggio delle offerte?', 
                'risposta' => 'Sì, tuttavia gli utenti non registrati, pur potendo visualizzare tutte le offerte, non hanno accesso'
                . ' alla funzionalità di filtraggio. Suddetta funzionalità è disponibile esclusivamente per utenti di tipo \"Locatario\".'],
            ['faq_id' => 5, 'domanda' => 'Come faccio a cancellare il mio profilo ApartRent e i miei dati personali?',
                'risposta' => 'Per cancellare il tuo profilo ApartRent, accedi al tuo account inserendo username e password, scelti al'
                . ' momento della registrazione. Dal menu in alto, clicca sulla voce \"Area Riservata\". In fondo alla pagina troverai il'
                . ' tasto \"Elimina account\". Una volta eliminato, il tuo profilo non potrà più essere riattivato e dovrai effettuare'
                . ' una nuova registrazione.'],
            ['faq_id' => 6, 'domanda' => 'Come posso accettare un proposta di uno studente a una mia offerta?', 
                'risposta' => 'Per poter accettare una proposta fatta da uno studente in cerca di alloggio bisogna, dopo aver effettuato'
                . ' l\'accesso al proprio account di tipo \"Locatore\",recarsi nell\'Area Riservata. Da lì, clicca su \"Gestisci le tue'
                . ' offerte" per andare alla lista delle offerte da te inserite precedentemente. Per tutte le offerte per cui hai ricevuto'
                . ' almeno una proposta, un pulsante \"Accetta un proposta\" ti permetterà di scegliere con chi stipulare il contratto. Si'
                . ' noti che così facendo, l\'offerta sarà automaticamente resa non più opzionabile (tuttavia è possibile modificare'
                . ' l\'opzionabilità delle proprie offerte anche manualmente).'
                . ' nuove offerte. Ogni offerta è visibile a tutti gli utenti del sito.'],
        ]);

        /**
         * genere_locatario: 0 -> Uomo, 1 -> Donna
         * tipologia: 0 -> Appartamento, 1 -> Posto Letto
         * 
         */
        DB::table('offerte')->insert([
            ['offerta_id'  => 1,
                'username_id'  => 'lorelore',
                'titolo' => 'Affittasi posto letto Ancona zona Tavernelle',
                'descrizione'  => 'Affittasi posto letto in camera doppia, per studentesse, in appartamento con due camere doppie in'
                . 'zona Tavernelle in ottime condizioni, completamente ristrutturato recentemente e con mobilia nuova, dotato di'
                . 'condizionatori a pompa di calore (caldo/freddo) nelle stanze, al prezzo di 200,00 euro al mese.',
                'prezzo'  => 200.00,
                'immagine'  => '[INSERIRE URL]',
                'citta'  => 'Ancona',
                'via'  => 'Via Francesco Petrarca',
                'civico'  => '45',
                'eta_max'  => 30,
                'eta_min'  => null,
                'genere_locatario'  => 1,
                'disponibilita_inizio'  => Carbon::parse('2022-03-01'),
                'disponibilita_fine'  => Carbon::parse('2023-03-01'),
                'posti_tot'  => 4,
                'tipologia'  => 1,
                'sup_appartamento'  => null,
                'num_camere'  => null,
                'cucina'  => true,
                'locale_ricreativo'  => true,
                'climatizzazione' => true,
                'parcheggi'  => true,
                'farmacia'  => false,
                'supermercato'  => true,
                'ristorazione'  => true,
                'trasporti'  => true,
                'angolo_studio'  => false,
                'sup_camera'  => 20,
                'posti_camera'  => 2,
                'opzionabilita'  => true,
                'data_inserimento'  => Carbon::parse('2022-02-17'),
                'data_assegnazione'  => null
            ],
            ['offerta_id'  => 2,
                'username_id'  => 'lorelore',
                'titolo' => 'Posto letto per studenti in appartamento periferia Fermo',
                'descrizione'  => 'Si affitta posto letto in stanza singola a Fermo zona San Lorenzo. L\'alloggio è composto da tre camere singole'
                . ' arredate, cucina abitabile, bagno luminoso, e si trova al terzo piano senza ascensore. Non si accettano animali. Condiviso con'
                . ' altre due ragazze. Prezzo €180 mensili con spese condominiali a parte.',
                'prezzo'  => 180.00,
                'immagine'  => '[INSERIRE URL]',
                'citta'  => 'Ancona',
                'via'  => 'Via Francesco Petrarca',
                'civico'  => '7',
                'eta_max'  => 27,
                'eta_min'  => null,
                'genere_locatario'  => 1,
                'disponibilita_inizio'  => Carbon::parse('2022-09-10'),
                'disponibilita_fine'  => Carbon::parse('2023-06-10'),
                'posti_tot'  => 3,
                'tipologia'  => 1,
                'sup_appartamento'  => null,
                'num_camere'  => null,
                'cucina'  => true,
                'locale_ricreativo'  => false,
                'climatizzazione' => true,
                'parcheggi'  => false,
                'farmacia'  => false,
                'supermercato'  => true,
                'ristorazione'  => true,
                'trasporti'  => true,
                'angolo_studio'  => true,
                'sup_camera'  => 16,
                'posti_camera'  => 1,
                'opzionabilita'  => true,
                'data_inserimento'  => Carbon::parse('2022-01-18'),
                'data_assegnazione'  => null
            ],
            ['offerta_id'  => 3,
                'username_id'  => 'lorelore',
                'titolo' => 'Camera singola a Urbino',
                'descrizione'  => 'Camera singola, completamente arredata in appartamento con disimpegno, bagno, cucina e salotto molto luminoso.'
                . ' Lavatrice, televisione, balcone grande. L\'appartamento è composto da 2 camere singole. Una singola è già occupata da un ragazzo,'
                . ' cerco quindi un altro ragazzo per completare la casa. Contratto da settembre a giugno (inclusi).',
                'prezzo'  => 250.00,
                'immagine'  => '[INSERIRE URL]',
                'citta'  => 'Urbino',
                'via'  => 'Via Muzio Oddi',
                'civico'  => '10',
                'eta_max'  => 28,
                'eta_min'  => 20,
                'genere_locatario'  => 0,
                'disponibilita_inizio'  => Carbon::parse('2022-09-01'),
                'disponibilita_fine'  => Carbon::parse('2023-06-30'),
                'posti_tot'  => 2,
                'tipologia'  => 1,
                'sup_appartamento'  => null,
                'num_camere'  => null,
                'cucina'  => true,
                'locale_ricreativo'  => true,
                'climatizzazione' => true,
                'parcheggi'  => false,
                'farmacia'  => false,
                'supermercato'  => true,
                'ristorazione'  => false,
                'trasporti'  => true,
                'angolo_studio'  => true,
                'sup_camera'  => 22,
                'posti_camera'  => 1,
                'opzionabilita'  => true,
                'data_inserimento'  => Carbon::parse('2022-05-04'),
                'data_assegnazione'  => null
            ],
            ['offerta_id'  => 4,
                'username_id'  => 'lorelore',
                'titolo' => 'Appartamento grande in centro a Macerata',
                'descrizione'  => '5 camere singole libere dal 1° settembre in appartamento poco fuori le mura (via Don Mario Lerda n.17). Le'
                . ' camere sono molto ampie (come visibile in foto), luminose e ben arredate. Sono provviste di letti ad una piazza e mezza ed'
                . ' alcune anche di balconi. L\'appartamento è molto grande (130mq), è dotato di ampio ingresso, 2 bagni (uno con doccia)'
                . ' e una cucina abitabile con balcone. Il canone mensile è di 620 euro, costi di condominio esclusi. Provvisto di'
                . ' connessione in fibra ottica. L\'appartamento è interamente ammobiliato, dotato di lavatrice e caldaia a condensazione di ultima'
                . ' generazione che garantisce bassi consumi. Il centro storico si raggiunge in 8 minuti a piedi attraverso percorsi pedonali. La'
                . ' zona è residenziale, silenziosa e alberata e anche molto comoda perché, oltre ad essere servita da negozi e supermercati, è'
                . ' raggiungibile comodamente a piedi dalla stazione.',
                'prezzo'  => 750.00,
                'immagine'  => '[INSERIRE URL]',
                'citta'  => 'Macerata',
                'via'  => 'Viale Piave',
                'civico'  => '38',
                'eta_max'  => 28,
                'eta_min'  => 22,
                'genere_locatario'  => null,
                'disponibilita_inizio'  => Carbon::parse('2022-09-01'),
                'disponibilita_fine'  => Carbon::parse('2023-03-01'),
                'posti_tot'  => 5,
                'tipologia'  => 0,
                'sup_appartamento'  => 130,
                'num_camere'  => 5,
                'cucina'  => true,
                'locale_ricreativo'  => true,
                'climatizzazione' => true,
                'parcheggi'  => false,
                'farmacia'  => true,
                'supermercato'  => true,
                'ristorazione'  => true,
                'trasporti'  => true,
                'angolo_studio'  => null,
                'sup_camera'  => null,
                'posti_camera'  => null,
                'opzionabilita'  => true,
                'data_inserimento'  => Carbon::parse('2022-06-30'),
                'data_assegnazione'  => null
            ],
            ['offerta_id'  => 5,
                'username_id'  => 'lorelore',
                'titolo' => 'Appartamento con balcone panoramico',
                'descrizione'  => 'Appartamento al secondo piano di una piccola palazzina in zona residenziale sud a Macerata. Il soggiorno è'
                . ' molto luminoso ed ampio, con balcone panoramico da cui osservare le colline marchigiane. La cucina è abitabile con veranda. L\''
                . ' appartamento è poi costituito di una camera doppia e una singola ed un bagno finestrato. Il parcheggio è esterno nella corte'
                . ' condominiale. Pavimentazione in parquet, aria condizionata.',
                'prezzo'  => 620.00,
                'immagine'  => '[INSERIRE URL]',
                'citta'  => 'Macerata',
                'via'  => 'Via Giovanni Verga',
                'civico'  => '18',
                'eta_max'  => null,
                'eta_min'  => 20,
                'genere_locatario'  => null,
                'disponibilita_inizio'  => Carbon::parse('2022-09-01'),
                'disponibilita_fine'  => Carbon::parse('2023-03-01'),
                'posti_tot'  => 3,
                'tipologia'  => 0,
                'sup_appartamento'  => 80,
                'num_camere'  => 2,
                'cucina'  => true,
                'locale_ricreativo'  => false,
                'climatizzazione' => true,
                'parcheggi'  => true,
                'farmacia'  => false,
                'supermercato'  => true,
                'ristorazione'  => false,
                'trasporti'  => true,
                'angolo_studio'  => null,
                'sup_camera'  => null,
                'posti_camera'  => null,
                'opzionabilita'  => true,
                'data_inserimento'  => Carbon::parse('2022-07-14'),
                'data_assegnazione'  => null
            ],
            ['offerta_id'  => 6,
                'username_id'  => 'lorelore',
                'titolo' => 'Appartamento in via Garibaldi a Ancona',
                'descrizione'  => 'Immerso nel cuore della città di Ancona, a due passi dal suggestivo Teatro delle Muse e dal porto, in'
                . ' C. so Garibaldi, proponiamo in affitto appartamento al quarto piano di un elegante edificio storico, completamente'
                . ' restaurato, con ascensore. La proprietà di circa 130 mq si compone di 6 ambienti oltre a un antibagno. Il'
                . ' meticoloso lavoro di ristrutturazione ha permesso di ottenere un’ampia zona living con cucina in stile mediterraneo a vista'
                . ' e tre spaziose camere doppie. Estremamente luminoso e con affacci sul corso principale, l’appartamento è dotato di ogni tipo di'
                . ' comfort (Tv 60” full HD, asciugatrice, lavastoviglie, lavatrice, wifi, aria condizionata regolabile singolarmente in ogni stanza).',
                'prezzo'  => 840,
                'immagine'  => '[INSERIRE URL]',
                'citta'  => 'Ancona',
                'via'  => 'Corso Garibaldi',
                'civico'  => '119',
                'eta_max'  => null,
                'eta_min'  => 20,
                'genere_locatario'  => null,
                'disponibilita_inizio'  => Carbon::parse('2022-09-15'),
                'disponibilita_fine'  => Carbon::parse('2023-07-15'),
                'posti_tot'  => 6,
                'tipologia'  => 0,
                'sup_appartamento'  => 150,
                'num_camere'  => 3,
                'cucina'  => true,
                'locale_ricreativo'  => true,
                'climatizzazione' => true,
                'parcheggi'  => true,
                'farmacia'  => true,
                'supermercato'  => true,
                'ristorazione'  => true,
                'trasporti'  => true,
                'angolo_studio'  => null,
                'sup_camera'  => null,
                'posti_camera'  => null,
                'opzionabilita'  => true,
                'data_inserimento'  => Carbon::parse('2022-05-02'),
                'data_assegnazione'  => null
            ],
        ]);

        DB::table('utenti')->insert([
            ['username_id' => 'lorelore',
                'password' => Hash::make('Cz6LW7t4'),
                'nome' => 'Mario',
                'cognome' => 'Rossi',
                'genere' => 0, // Uomo
                'data_nascita' => Carbon::parse('2000-10-27'),
                'comune_residenza' => 'Urbisaglia (MC)',
                'telefono' => '3492814204',
                'tipologia' => 2, // Locatore
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")],
            ['username_id' => 'lariolario',
                'password' => Hash::make('Cz6LW7t4'),
                'nome' => 'Giuseppe',
                'cognome' => 'Verdi',
                'genere' => 0, // Uomo
                'data_nascita' => Carbon::parse('2000-10-27'),
                'comune_residenza' => 'Urbisaglia (MC)',
                'telefono' => '3482994204',
                'tipologia' => 3, // Locatario
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")],
            ['username_id' => 'adminadmin',
                'password' => Hash::make('Cz6LW7t4'),
                'tipologia' => 4, // Amministratore
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")],
        ]);
    }

}
