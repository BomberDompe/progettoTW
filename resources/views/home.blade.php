@extends('layouts.public')

@section('title', 'Home')

<!-- inizio sezione prodotti -->
@section('content')
<!-- Banner Starts Here -->
<div class="banner">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="header-text caption">
                    <h1>ApartRent</h1>
                    <h3>L'appartamento per te</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner Ends Here -->

<!-- Services Starts Here -->
<div class="services-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2><center>I nostri servizi</center></h2>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="service-item">
                    <img src="assets/images/apartment.png" alt="image app">
                    <h4>Appartamenti certificati</h4>
                    <p>La qualità per noi è fondamentale. Ispezioniamo ogni appartamento prima che venga caricato sul sito</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="service-item">
                    <img src="assets/images/bedroom.png" alt="image app">
                    <h4>Possibilità affitto singola stanza</h4>
                    <p>Puoi condividere l'appartamento con altri coinquilini affittando una sola stanza</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="service-item">
                    <img src="assets/images/messages.png" alt="image app">
                    <h4>Contatti diretti con i locatori</h4>
                    <p>Il nostro sito ti permette di contattare direttamente con i locatori per qualsiasi evenienza</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Services Ends Here -->

<!-- Access Options Start -->
<div class="access-options">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="accessoptions-heading">
                    <h2><center>Modalità di accesso</center></h2>
                </div>
            </div>
            <div class="col-md-12 ">
                <div class="accessoptions-item">


                    <p>
                        Per usufruire dei servizi ApartRent in primo luogo è necessario
                        <a href="{{ route('register') }}" style="text-decoration:none;">registrarsi</a> indicando nell'apposita sezione
                        se si è Locatore o un poteziale Locatario. Si prega di conservare username e password inserite al momento della
                        registrazione con le quali l'utente potrà effettuare l'<a href="{{ route('login') }}" style="text-decoration:none;">accesso</a>
                    </p>
                    <p>
                        consultare il catalogo delle offerte filtrandolo per i suoi requisiti di locazione desiderata 
                        nel caso in cui sia interessato ad un offerta ha la possibiltà selezionarla premendo il pulsante OPZIONA in fondo
                        alla pagina "Dettagli dell'offerta"
                        ("Offerta nel catalogo"-&gt;"Bottone Dettagli"-&gt;"Dettagli offerta"-&gt;"Opziona").Selezionando un'offerta si metterà 
                        in contatto con il locatore, nella chat interna 
                        (raggiungingibile dal menù laterale, bottone "Messaggi", nell'area account).
                        Tutte le offerte selezionate potranno essere visualizzate dal locatario nella pagina "Le tue opzioni"
                        ("Account"-&gt;"Offerte selezionate").In tale area avrà anche la possiblità di rimuovere le offerte selezionate, visualizzarne i dettagli e
                        vedere se è stata aggiuticata.
                    </p>
                    <p>
                        L'utente che accede come Locatore potrà usufruire dei seguenti servizi:
                    </p>
                    <p>
                        può gestire le sue offerte nell'area account nella pagina "Le tue offerte"
                        ("Account"-&gt;"Le tue offerte"). In quetsa pagina potrà aggiungere una nuova offerta
                        cliccando sul riquadro "Nuova Offerta" e modificare o rimuovere offerte precedentemente inserite.
                        Per ogni singola offerta, attravesto il bottone "Proposte", ha la possibilità 
                        di accedere alla lista di tutti i locatori interessati.
                        Premendo il bottone "Accetta" posto a fianco ai dati del locatario scelto, può aggiudicare l'offerta.
                        Ad affare concluso, premendo il pulsante "Contratto", potrà accederre alle informazioni relative al 
                        contratto d'affitto (mancante di coordinate bancarie e firme).
                    </p>
                    <p>
                        Un utente non registrato potrà visualizzare la home-page, il catalogo, le f.a.q. ed il regolamento.
                    </p>
                </div>
            </div> 
        </div>
    </div>
</div>
<!-- Access Options End -->
<!-- Features Starts Here -->
<div class="features-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="margin-bottom: 20px;">
                <div class="section-heading">
                    <h1>Chi siamo</h1>
                </div>
            </div>
            <div class="col-md-12" style="margin-bottom: 80px;">
                <div class="section-heading">
                    <p>
                        ApartRent è un nuovo portale di annunci immobiliari lanciato nel 2022 in Italia che fornisce la possibilità di 
                        dare e prendere in affitto case e alloggi nel territorio marchigiano. Su ApartRent puoi trovare ogni giorno migliaia di nuovi 
                        annunci pubblicati da privati e agenzie immobiliari. Offriamo assistenza e consulenza su locazione di immobili e stanze con diverse 
                        destinazioni d'uso. Il nostro obbiettivo è principalmente quello di soddisfare al meglio le esigenze del cliente mettendo a disposizione 
                        la nostra professionalità e competenza.
                        La nostra missione è quella di lavorare con innovazione, dedizione e trasparenza, ai fini di instaurare e mantenere rapporti 
                        di fiducia con il cliente; offrire un servizio flessibile per guidare gli 
                        utenti nella ricerca della soluzione che rispecchi al meglio i loro desideri .
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="feature-item">
                    <div class="icon">
                        <img src="assets/images/feature-01.png" alt="">
                    </div>
                    <h4>Lorenzo Tamburi - Editor text</h4>
                    <p>Studente di Ing. Informatica e dell'Automazione </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="feature-item">
                    <div class="icon">
                        <img src="assets/images/feature-01.png" alt="">
                    </div>
                    <h4>Joshua Sgariglia - Database developer</h4>
                    <p>Studente di Ing. Informatica e dell'Automazione</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="feature-item">
                    <div class="icon">
                        <img src="assets/images/feature-01.png" alt="">
                    </div>
                    <h4>Lorenzo Di Alessandro - Main producer</h4>
                    <p>Studente di Ing. Informatica e dell'Automazione</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="feature-item">
                    <div class="icon">
                        <img src="assets/images/feature-01.png" alt="">
                    </div>
                    <h4>Adrian Corneliu Taras - Editor text</h4>
                    <p>Studente di Ing. Informatica e dell'Automazione</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Features Ends Here -->


<!-- Info Starts Here -->
<div class="info-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h1> Dove puoi trovarci? </h1>
                </div>
            </div>
            <div class="col-md-12 no-overlap">
                <div class="map-content">
                    <iframe width="1000" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="50%" src="https://maps.google.it/maps?f=q&amp;source=s_q&amp;hl=it&amp;geocode=&amp;q=Via+Brecce+Bianche,+12,+Ancona&amp;aq=0&amp;sll=41.442726,12.392578&amp;sspn=23.377375,53.657227&amp;ie=UTF8&amp;hq=&amp;hnear=Via+Brecce+Bianche,+12,+60131+Ancona,+Marche&amp;z=14&amp;ll=43.581248,13.515684&amp;output=embed"></iframe>
                </div>
            </div>
            <div class="col-md-12">
                <div class="right-content">
                    <div class="section-heading">

                        <p style="font-size: 30px;">Questa è la nostra sede in Via Brecce Bianche, 12 ai seguenti orari:</p>
                        <br>
                        <p style="font-size: 30px;">Lunedì-Venerdì    9:00-13:00 / 16:00-19:00</p>
                        <br>
                        <p style="font-size: 30px;">Puoi contattarci via e-mail: <a style="text-decoration: none;" href="mailto:assistenza.clienti@apartarent.it">assistenza.clienti@apartarent.it</a>
                            <br>  <br> oppure chiamandoci al 071-555878 <br>  <br> <a style="text-decoration: none;" href="{{asset('DocumentazioneProgetto.pdf')}}" target="_blank">Documentazione sito PDF</a>
                        </p>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>

<!-- Info Ends Here -->
@endsection


