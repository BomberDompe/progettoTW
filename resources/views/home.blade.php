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
              <h2>I nostri servizi</h2>
              <p>Host Cloud is a professional Bootstrap 4 template by TemplateMo for your hosting company websites. There are 4 HTML pages included in this template. You can feel free to customize anything. Please share this template to your friends. Thank you.</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="service-item">
                <img src="assets/images/apartment.png" alt="image app">
              <h4>Miglior appartamenti</h4>
              <p>Aenean sit amet leo vitae tellus vehicula tincidunt vel sed lorem. Nullam tincidunt commodo magna, id aliquam sapien sollicitudin id.</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="service-item">
                <img src="assets/images/bedroom.png" alt="image app">
              <h4>Possibilità affitto singola stanza</h4>
              <p>You are not allowed to re-distribute this template as a downloadable ZIP file on any template collection website.</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="service-item">
                <img src="assets/images/messages.png" alt="image app">
              <h4>Contatti diretti con i locatori</h4>
              <p>Aenean sit amet leo vitae tellus vehicula tincidunt vel sed lorem. Nullam tincidunt commodo magna, id aliquam sapien sollicitudin id.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Services Ends Here -->
   <!-- Features Starts Here -->
    <div class="features-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <span>Miglior guppo 30elode</span>
              <h2>Team - Gruppo 24</h2>
            </div>
          </div>
          <div class="col-md-6">
            <div class="feature-item">
              <div class="icon">
                <img src="assets/images/feature-01.png" alt="">
              </div>
              <h4>Lorenzo Tamburrini - Relatore</h4>
              <p>Nulla nisl ex, vehicula in urna nec, commodo consectetur augue. Vivamus nec metus mauris. Praesent lacinia tempus urna.Pino devo scrive qualcosa.</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="feature-item">
              <div class="icon">
                <img src="assets/images/feature-01.png" alt="">
              </div>
              <h4>Jhonatan Scaraglia - Operatore speciale</h4>
              <p>Lorem ipsum dolor ame taxidermy sriracha cardigan salvia actually vice migas en pin sustainable carry scenester. Pino devo scrive qulcosa.</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="feature-item">
              <div class="icon">
                <img src="assets/images/feature-01.png" alt="">
              </div>
              <h4>Lorenzo Di Alessandro - Op. come si opera?</h4>
              <p>Lorem ipsum dolor ame taxidermy sriracha cardigan salvia actually vice migas en pin sustainable carry scenester.</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="feature-item">
              <div class="icon">
                <img src="assets/images/feature-01.png" alt="">
              </div>
              <h4>Adrian Taras - Op. come si scarica?</h4>
              <p>Lorem ipsum dolor ame taxidermy sriracha cardigan salvia actually vice migas en pin sustainable carry scenester.</p>
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
              <span>dove ci trovi?</span>
              <h2>Contattaci!</h2>
            </div>
          </div>
             <div class="col-md-6 no-overlap">
                <div class="left-content">
                 <iframe width="450" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.it/maps?f=q&amp;source=s_q&amp;hl=it&amp;geocode=&amp;q=Via+Brecce+Bianche,+12,+Ancona&amp;aq=0&amp;sll=41.442726,12.392578&amp;sspn=23.377375,53.657227&amp;ie=UTF8&amp;hq=&amp;hnear=Via+Brecce+Bianche,+12,+60131+Ancona,+Marche&amp;z=14&amp;ll=43.581248,13.515684&amp;output=embed"></iframe><br /><small><a href="http://maps.google.it/maps?f=q&amp;source=embed&amp;hl=it&amp;geocode=&amp;q=Via+Brecce+Bianche,+12,+Ancona&amp;aq=0&amp;sll=41.442726,12.392578&amp;sspn=23.377375,53.657227&amp;ie=UTF8&amp;hq=&amp;hnear=Via+Brecce+Bianche,+12,+60131+Ancona,+Marche&amp;z=14&amp;ll=43.581248,13.515684" style="color:#0000FF;text-align:left">Visualizzazione ingrandita della mappa</a></small>
                  </div>
             </div>
          <div class="col-md-6">
            <div class="right-content">
              <div class="section-heading">
                <h2>Contattaci al ...</h2>
                <p>Duis sit amet nibh non sapien tincidunt bibendum. Curabitur rutrum justo id leo ornare, suscipit lobortis augue volutpat. Sed ligula arcu, interdum eu magna eget, tristique aliquet nibh.</p>
              </div>
              
              
            </div>
          </div>
        </div>
      </div>
    </div>
      
    <!-- Info Ends Here -->
@endsection


