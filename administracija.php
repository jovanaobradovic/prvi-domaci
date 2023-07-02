<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <title>Grupni Treninzi</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <link rel="stylesheet" href="css/responsive.css">
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
   </head>
   <body>
        <?php
        include 'header.php';
        ?>

      <div class="about_section layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <h1 class="about_taital"><span>Grupni treninzi</span></h1>
               </div>
            </div>
             <div class="row">
                 <div class="col-md-4">
                     <h2>Unos treninga u raspored</h2>
                     <label for="dani">Izaberite dan</label>
                     <select class="form-control" id="dani">
                     </select>
                     <label for="trening">Izaberite trening</label>
                     <select class="form-control" id="trening">
                     </select>
                     <label for="termin">Izaberite termin</label>
                     <select class="form-control" id="termin">
                     </select>
                     <label for="trener">Trener</label>
                     <input type="text" id="trener" class="form-control">
                     <label for="napomena">Napomena</label>
                     <input type="text" id="napomena" class="form-control">
                     <hr/>
                     <button class="btn btn-primary" onclick="unesi()">Unesi u raspored</button>
                 </div>

                 <div class="col-md-4">
                     <h2>Izmena napomene treninga u rasporedu</h2>
                     <label for="rasporedIzmena">Izaberite raspored</label>
                     <select class="form-control" id="rasporedIzmena">
                     </select>
                     <label for="napomenaIzmena">Napomena</label>
                     <input type="text" id="napomenaIzmena" class="form-control">
                     <hr/>
                     <button class="btn btn-info" onclick="izmeni()">Izmeni napomenu</button>
                 </div>

                 <div class="col-md-4">
                     <h2>Brisanje rasporeda</h2>
                     <label for="rasporedBrisanje">Izaberite raspored</label>
                     <select class="form-control" id="rasporedBrisanje">
                     </select>
                     <hr/>
                     <button class="btn btn-danger" onclick="obrisi()">Obrisi raspored</button>
                 </div>
             </div>
            <div class="row" style="margin-top: 20px">
                <h3 id="rezultat"></h3>
            </div>
         </div>
      </div>

        <?php
        include 'footer.php';
        ?>

      <script>
          function vratiDane(){
              $.ajax({
                  url : 'server/vratiKomboDana.php',
                  success: function (data){
                      $("#dani").html(data);
                  }
              })
          }
          vratiDane();

          function vratiTermine(){
              $.ajax({
                  url : 'server/vratiKomboTermina.php',
                  success: function (data){
                      $("#termin").html(data);
                  }
              })
          }
          vratiTermine();

          function vratiTreninge(){
              $.ajax({
                  url : 'server/vratiKomboTreninga.php',
                  success: function (data){
                      $("#trening").html(data);
                  }
              })
          }
          vratiTreninge();

          function vratiRasporede(){
              $.ajax({
                  url : 'server/vratiKomboRasporeda.php',
                  success: function (data){
                      $("#rasporedIzmena").html(data);
                      $("#rasporedBrisanje").html(data);
                  }
              })
          }
          vratiRasporede();

          function unesi(){
              let dataUnos = {
                  dan: $("#dani").val(),
                  termin: $("#termin").val(),
                  trener: $("#trener").val(),
                  napomena: $("#napomena").val(),
                  trening: $("#trening").val()
              };

              $.ajax({
                  url : 'server/unesi.php',
                  method: "post",
                  data : dataUnos,
                  success: function (podaci){
                      $("#rezultat").html(podaci);
                      vratiRasporede();
                  }
              });
          }

          function izmeni(){
              let dataIzmena = {
                  raspored: $("#rasporedIzmena").val(),
                  napomena: $("#napomenaIzmena").val(),
              };

              $.ajax({
                  url : 'server/izmeni.php',
                  method: "post",
                  data : dataIzmena,
                  success: function (podaci){
                      $("#rezultat").html(podaci);
                      vratiRasporede();
                  }
              });
          }

          function obrisi(){
              let dataBrisanje = {
                  raspored: $("#rasporedBrisanje").val(),
              };

              $.ajax({
                  url : 'server/obrisi.php',
                  method: "post",
                  data : dataBrisanje,
                  success: function (podaci){
                      $("#rezultat").html(podaci);
                      vratiRasporede();
                  }
              });
          }

      </script>
   </body>
</html>

