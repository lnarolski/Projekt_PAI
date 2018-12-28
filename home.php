<?php

?>
<!-- parallax scrolling -->
<div class="parallax"></div>

<!-- KARUZELA -->
<div id="myCarousel" class="carousel slide text-center" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img class="imageCarusel" src="1.jpg" alt="Komputery" style="width:50%;display:block;margin-left:auto;margin-right:auto;">
      </div>
      <div class="item">
        <img class="imageCarusel" src="2.jpeg" alt="Laptopy" style="width:50%;display:block;margin-left:auto;margin-right:auto;">
      </div>
      <div class="item">
        <img class="imageCarusel" src="3.jpg" alt="Podzespoły" style="width:50%;display:block;margin-left:auto;margin-right:auto;">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Poprzedni</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Następny</span>
    </a>
  </div>
</div>


<!-- AKORDEON -->
<!-- Latest compiled and minified Bootstrap CSS -->
<link rel="https://s3-us-west-2.amazonaws.com/s.cdpn.io/11219/woorks-style.css">

<div class = "container">
  <div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
            <span class="glyphicon glyphicon-flag text-success"></span>GWARANCJA JAKOŚCI
            <span class="glyphicon glyphicon-chevron-down pull-right"></span>
          </a>
        </h4>
      </div>
      <div id="collapseOne" class="panel-collapse collapse in">
        <div class="panel-body">Nasze produkty objęte są 2-letnią gwarancją.</div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
            <span class="glyphicon glyphicon-flag text-info"></span>GWARANCJA NAJNIŻSZEJ CENY
            <span class="glyphicon glyphicon-chevron-down pull-right"></span>
          </a>
        </h4>
      </div>
      <div id="collapseTwo" class="panel-collapse collapse">
        <div class="panel-body">Jeśli znajdziesz nasze produkty w niższych cenach to zwrócimy różnicę.</div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
            <span class="glyphicon glyphicon-flag text-danger"></span>WSPARCIE PROFESJONALISTÓW
            <span class="glyphicon glyphicon-chevron-down pull-right"></span>
          </a>
        </h4>
      </div>
      <div id="collapseThree" class="panel-collapse collapse">
        <div class="panel-body">Wyszkolona kadra rozwiąże każdy problem.</div>
      </div>
    </div>
  </div>
  
  
</div> <!-- end container -->

<!-- Latest compiled and minified JavaScript -->
<script src="https://use.fontawesome.com/df678b889c.js"></script>