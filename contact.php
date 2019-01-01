<!-- Podstrona "Kontakt" -->
<meta charset="UTF-8">
<div id="contact" class="container-fluid bg-grey">
  <h2 class="text-center">Kontakt</h2>
  <div class="row">
    <div class="col-sm-5">
      <p>Dane kontaktowe:</p>
      <p><span class="glyphicon glyphicon-map-marker"></span> Gdańsk, PL</p>
      <p><span class="glyphicon glyphicon-phone"></span> +48 123456789</p>
      <p><span class="glyphicon glyphicon-envelope"></span> sklepkomputerowy@wp.pl</p>
    </div>
    <div class="col-sm-7 slideanim">
        <form action="mailto:sklepkomputerowy@wp.pl" method="post" enctype="text/plain">
            <div class="row">
                <div class="col-sm-6 form-group">
                <input class="form-control" id="name" name="nazwa" placeholder="Nazwa" type="text" required>
                </div>
                <div class="col-sm-6 form-group">
                <input class="form-control" id="email" name="email" placeholder="E-mail" type="email" required>
                </div>
            </div>
            <textarea class="form-control" id="wiadomosc" name="wiadomosc" placeholder="Wiadomość" rows="5"></textarea><br>
            <div class="row">
                <div class="col-sm-12 form-group">
                <button class="btn btn-default pull-right" type="submit">Wyślij</button>
                </div>
        </form>
      </div>
    </div>
  </div>
</div>