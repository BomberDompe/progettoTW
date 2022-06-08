<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Progetto TWeb">
        <meta name="author" content="Gruppo 24">


        <title>ApartRent - Contratto</title>

        <!-- Icona -->
        <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

        <!-- CSS Files -->
        <link rel="stylesheet" href="{{ asset('assets/css/styleContract.css') }}">

    </head>

    <body>
        <div class="block">
            <br>

            <h1>Contratto d'affito</h1>

            <br>

            <h2>TRA</h2>
            <p>
                @if($dataLore->genere == 'Uomo')
                Il Sig. {{ $dataLore->name }} {{ $dataLore->surname }} nato a ……………………… il {{ date('d-m-Y',strtotime($dataLore->data_nascita)) }} , residente a {{ $dataLore->comune_residenza}}
                di seguito denominato, per brevità, “Locatore”.
                @else
                La Sig.ra {{ $dataLore->name }} {{ $dataLore->surname }} nata a ……………………… il {{ date('d-m-Y',strtotime($dataLore->data_nascita)) }} , residente a {{ $dataLore->comune_residenza}}
                di seguito denominata, per brevità, “Locatore”.
                @endif
            </p>

            <br>

            <p>
                @if($dataLario->genere == 'Uomo')
                Il Sig. {{ $dataLario->name }} {{ $dataLario->surname }} nato a ……………………… il {{ date('d-m-Y',strtotime($dataLario->data_nascita))}} , residente a {{ $dataLario->comune_residenza}}
                di seguito denominato, per brevità, “Locatario”.
                @else
                La Sig.ra {{ $dataLario->name }} {{ $dataLario->surname }} nata a ……………………… il {{ date('d-m-Y',strtotime($dataLario->data_nascita))}} , residente a {{ $dataLario->comune_residenza}}
                di seguito denominata, per brevità, “Locatario”.    
                @endif
            </p>

            <br>

            <h2>
                SI CONVIENE E SI STIPULA QUANTO SEGUE
            </h2>

            <br>

            <p>
                Il Locatore concede in locazione al Conduttore l’immobile ad uso abitativo di sua esclusiva proprietà sito in 
                {{$dataOffer->citta}} in {{$dataOffer->via}}, {{$dataOffer->civico}}.
                L’immobile viene consegnato come visto e piaciuto tra le parti all’atto della consegna del bene.         
            </p>

            <br>

            <p>
                L’immobile sarà adibito ad uso esclusivo del Locatore.
                <br>
                La locazione è regolata dalle seguenti concordate pattuizioni:
            </p>

            <br>

            <h3>1) DURATA</h3>

            <br>

            <p>
                La durata della locazione è dal {{ date('d-m-Y', strtotime($dataOffer->disponibilita_inizio)) }} al {{ date('d-m-Y', strtotime($dataOffer->disponibilita_fine)) }}.
            </p>

            <h3>2) RECESSO DEL CONDUTTORE</h3>

            <br>

            <p>
                Il Locatore riconosce espressamente al Locatario la facoltà di recedere in qualsiasi momento e per
                qualsiasi motivo dal contratto anche prima della scadenza stabilita, dandone avviso al Locatore mediante
                lettera raccomandata da inviarsi con un preavviso di almeno 10 giorni dalla data in cui il recesso deve avere
                esecuzione. I giorni di preavviso saranno conteggiati a partire dalla data di invio della raccomandata A.R.
            </p>

            <br>

            <h3>3) CANONE</h3>


            <p>
                Il canone mensile di locazione, escluse le spese di condominio ordinarie e di riscaldamento, viene
                consensualmente determinato tra le parti in euro: {{$dataOffer->prezzo }}€, mensili che il Locatore si obbliga a
                corrispondere entro il giorno 5 di ogni mese, mediante bonifico bancario da effettuarsi sul conto corrente con
                codice IBAN …………………………………………………………………………………… , in essere presso la Banca ……………………………………………… intestato al Locatore.
                Sono a carico del Locatario la tassa comunale di smaltimento rifiuti nonché le utenze di luce, gas, acqua e
                telefono.
            </p>

            <br>

            <h3>4) DEPOSITO CAUZIONALE</h3>

            <p>
                A garanzia delle obbligazioni tutte che assume con il contratto, il Conduttore rilascia al Locatore un deposito
                cauzionale, fruttifero di interessi legali, per l’importo di {{$dataOffer->prezzo * 3 }}€ ( pari a tre mensilità). Il deposito cauzionale come sopra
                costituito sarà restituito al termine della locazione entro 48 ore dalla riconsegna dell’immobile, previa verifica
                dello stato dell’immobile e dell'osservanza di ogni obbligazione contrattuale.
            </p>

            <br>

            <h3>5) STATO LOCATIVO</h3>

            <p>
                Il Locatario dichiara di avere visitato l’immobile locato e di riceverlo in consegna con il ritiro delle chiavi e
                dichiara inoltre che l’immobile è in buono stato locativo ed idoneo all’uso convenuto. Si impegna, altresì, a
                rispettare e far rispettare da propri familiari o domestici le norme del regolamento dello stabile, ove esistenti,
                che il Locatore si impegna a consegnare al momento della stipula del contratto. Si impegna inoltre ad
                osservare le deliberazioni dell'assemblea dei condomini formalmente comunicate dal Locatore.
                Il Locatore dichiara che l’appartamento è in regola con la normativa edilizia ed urbanistica e gli impianti sono
                conformi alla normativa vigente. Eventuali vizi dell’immobile e/o dei suoi impianti dovranno essere comunicati
                per iscritto, dal Locatario al Locatore, entro 30 (trenta) giorni dalla consegna dell’immobile, ovvero dalla
                loro scoperta ove occulti.
                L'unità immobiliare viene consegnata pulita e in ottima condizione. La stessa verrà restituita al termine della
                locazione nello stesso stato in cui è stata consegnata, salvo il normale deperimento legato all’uso e senza
                obbligo per il Locatario di tinteggiatura e di effettuazione di interventi di qualsivoglia natura a meno che i
                danni riportati non siano notevoli.
            </p>

            <br>

            <h3>6) MUTAMENTO DI DESTINAZIONE E MODIFICHE</h3>

            <p>
                L’immobile è locato ad esclusivo uso di abitazione del Locatario che si obbliga a non mutarne la
                destinazione anche solo parzialmente o temporaneamente. Ogni aggiunta o modifica che non possa essere
                eliminata senza danneggiare l’immobile non potrà essere effettuata dal Locatario senza la preventiva
                autorizzazione scritta del Locatore e comunque resterà a beneficio dell’immobile senza che nulla sia dovuto
                al Locatario, neanche a titolo di rimborso spese.
            </p>

            <br>

            <h3>7) RIPARAZIONI ORDINARIE E STRAORDINARIE E MANUTENZIONE</h3>

            <p>
                Le riparazioni di cui all’art. 1576 cod. civ. (Mantenimento della cosa locata in buono stato locativo) e 1609
                cod. civ. (Piccole riparazioni a carico dell’inquilino) sono a carico del Locatario.
                Se il Locatario non provvederà tempestivamente potrà provvedervi il Locatore ed il relativo costo dovrà
                essergli rimborsato entro 30 (trenta) giorni dall’avvenuta riparazione.
                Qualora l’immobile locato dovesse necessitare di riparazioni che non sono a carico del Locatario, secondo
                le norme del codice civile e della prassi locativa, questi è tenuto a darne avviso scritto al Locatore. Se si
                tratta di riparazioni urgenti il Locatario può eseguirle direttamente, salvo rimborso, purché ne dia
                contemporaneamente avviso al Locatore.
            </p>

            <br>
            <br>

            <p>
                Letto, approvato e sottoscritto
                Fatto in triplice originale in data …………………………, luogo ………………………… .
            </p>

            <br>
            <br>


            <div class="row">

                <div class="col-md-6">
                    IL LOCATORE
                </div>

                <div class="col-md-6">
                    IL LOCATARIO
                </div>

            </div>




            <p style="text-align: center;">
                Ai sensi degli artt. 1341 e 1342 codice civile le parti approvano specificatamente i seguenti punti: 3 (Recesso
                del Conduttore):
            </p>

            <br>


            <div class="row">

                <div class="col-md-6">
                    IL LOCATORE
                </div>

                <div class="col-md-6">
                    IL LOCATARIO
                </div>

            </div>

        </div>




        <footer>
            <hr>
            <p>
                Inviare tramite posta ordinaria all'indirizzo del Locatore. <br>
                A cura dello staff di ApartRent 
            </p>

        </footer>
    </body>


</html>