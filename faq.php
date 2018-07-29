<!DOCTYPE html>
<html lang="en">
<?php
session_start();
require 'includes/header.php';
?>
<!-- Accordion refereence: 
https://getbootstrap.com/docs/3.3/javascript/ -->    
<div class="container faq-main">
    
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-info">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          FAQ #1 What is our objective
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        The problem of food wastage is a huge issue of concern as we see a lot food being wasted
daily. There are many people who are underprivileged and suffer from hunger. The goal
of our project is to defeat hunger by saving the food which is likely to get wasted. Our
application would have a wide range of users staring from an individual who is in
genuine need of food to an organization that can further distribute food to shelters,
homeless and international students. Donors can post about the available food with the
help of a form and anyone who is need of food can get access to that food by clicking on
the post and following further instructions. Our application aims at filling the gap
between the food donors and the food seekers
      </div>
    </div>
  </div>
  <div class="panel panel-info">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          FAQ #2 How can I donate
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">
        To donate or seek food items, both the donor or the seeker must be registered on our website. Our website will be very simple and easy to use and does not require any prerequisites or specific knowledge. However, familiarity with Google Maps will be beneficial. Our website will be fully responsive and will be accessible via phone, tablet, laptop or pc.
      </div>
    </div>
  </div>
  <div class="panel panel-info">
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          FAQ #3 What can I donate
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">
        You can donate any kind of food including vegetables, meat, fruits, juices or any other soft drinks.
      </div>
    </div>
  </div>
  <div class="panel panel-info">
    <div class="panel-heading" role="tab" id="headingSix">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
          FAQ #4 Can I create an events page
        </a>
      </h4>
    </div>
    <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
      <div class="panel-body">
        A user can see the events on clicking the Events page also a user can create a new Event page.
      </div>
    </div>
  </div>
  <div class="panel panel-info">
    <div class="panel-heading" role="tab" id="headingFour">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
          FAQ #5 I cannot see my event created
        </a>
      </h4>
    </div>
    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
      <div class="panel-body">
        On successful posting of the event, it will be first verified from us and only after verification it will be made available to the user
      </div>
    </div>
  </div>

  <div class="panel panel-info">
    <div class="panel-heading" role="tab" id="headingFive">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseTwo">
          FAQ #6 How can I contact the Defeat Hunger?
        </a>
      </h4>
    </div>
    <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
      <div class="panel-body">
        Post any query from the Contact Us from the bottom of the page. We will get back to you in short time.
      </div>
    </div>
  </div>
</div>
</div>
<?php include 'includes/footer.php';?>
</body>
</html>