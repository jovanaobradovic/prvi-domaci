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
                 <div class="col-md-5">
                     <select class="form-control" id="dani">
                         <option value="0">Svi dani</option>
                     </select>
                 </div>
                 <div class="col-md-5">
                     <select class="form-control" id="sort">
                         <option value="asc">Ujutru ka uvece</option>
                         <option value="desc">Uvece ka ujutru</option>
                     </select>
                 </div>

                 <div class="col-md-2">
                     <button class="btn btn-primary" onclick="pretrazi()">Pretrazi</button>
                 </div>
             </div>
            <div class="row" id="rezultat" style="margin-top: 20px">

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
                      $("#dani").append(data);
                      pretrazi();
                  }
              })
          }
          vratiDane();

          function pretrazi(){
              let dan = $("#dani").val();
              let sort = $("#sort").val();
              $.ajax({
                  url : 'server/pretrazi.php',
                  method: "GET",
                  data: {
                      dan : dan,
                      sort: sort
                  },
                  success: function (data){
                      $("#rezultat").html(data);
                  }
              })
          }
      </script>
   </body>
</html>

