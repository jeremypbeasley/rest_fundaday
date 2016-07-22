<!DOCTYPE html>
<html>
<head>
  <title>REST</title>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1.0, user-scalable=no" name="viewport">
  <meta property="og:site_name" content="REST – Real Escape from the Sex Trade"/>
  <meta property="og:type" content="website"/>
  <link href="/css/master.css" rel="stylesheet">
</head>
<body>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-29157146-3', 'auto');
  ga('send', 'pageview');
</script>

<header>
  <div class="Logo linked"><a href="/">...</a></div>
</header>

<div class="GuideGuide"></div>

<!-- END HEADER PARTIAL FILE -->

<section class="FundADay_Intro">
  <div class="row">
    <!-- <div class="BigPhoto Intro"></div> -->
    <div class="column col-xs-12 col-md-5 col-md-offset-7">
      <article class="CenterBlock">
        <h2 class="Serif">Seattle needs a place where a girl can safely escape a life that abuses or exploits her.</h2>
      </article>
    </div>
  </div>
</section>
<section class="FundADay_BigPhoto">
</section>
<section class="FundADay_WhatIsERC">
  <div class="row">
    <div class="column col-xs-12 col-md-6">
      <article class="CenterBlock">
        <h2 class="SansSerif pb5 WeNeedYourHelp"></h2>
        <p>Last year, there were no beds available in King County for nearly 40% of women who contacted REST for a place to stay. </p>
        <p>The ERC will provide up to 7 girls 30 days of emergency housing, intensive case management, and daytime programming to help guests begin to stabilize and consider what life free from exploitation looks and feels like.</p>
        <p class="underlined"><a href="">Learn more about the ERC</a></p>
      </article>
    </div>
    <div class="column col-xs-12 col-md-5 col-md-offset-1">
      <div class="ERCGalleryBig"></div>
    </div>
  </div>
</section>
<section class="ERCGallerySmall">
  <div><img src="_img/slide4.jpg"></div>
  <div><img src="_img/slide3.jpg"></div>
  <div><img src="_img/slide2.jpg"></div>
  <div><img src="_img/slide1.jpg"></div>
  <!-- <div><img src="http://cdn2.dropmark.com/39456/f8652ba5ff68635386f1a26996c89d6cb42db0a4/198033.jpg"></div> -->
</section >
<section class="FundADay_FinancialCase  ">
  <div class="row">
    <div class="column col-xs-12 col-md-4 col-md-offset-4">
      <h2 class="Serif pb5">For $1,500, you can fund the new ERC for an entire day.</h2>
    </div>
    <div class="column col-xs-12 col-md-3 col-md-offset-1">
      <p class="mt8">It’s an expensive operation but a worthwhile one.  Your generous donation will cover the daily cost of rent, 24/7 live-in staff, food, utlitities, phones, furniture, activities, etc.</p>
      <p class="underlined"><a href="">See the cost breakdown</a></p>
    </div>
    <div class="column col-xs-12 col-md-3 col-md-offset-2 first-md">
      <!-- <p>It’s an expensive operation but a worthwhile one.  Your generous donation will cover the daily cost of rent, 24/7 live-in staff, food, utlitities, phones, furniture, activities, etc.</p>
      <p class="underlined"><a href="">See the cost breakdown</a></p> -->
    </div>
  </div>
</section>
<form id="form-donate">
  <section class="FundADay_WillYouBe NegativeBlock ">
    <div class="row">
      <div class="column col-xs-12 col-md-5 Question">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <h2 class="SansSerif mb2"><span id="js-total-days-funded">89</span> <!-- <span class="Superscript">of</span> -->of 365 days have been funded. Will you fund the <span id="js-total-days-funded-next">90th</span>?</h2>
        <div class="ChosenDay mb2 mt5">
          <p class="SansSerif op50 mt1 mb0">The next unfunded day is</p>
          <p class="SansSerif"><span id="js-next-unfunded-date-formatted">August 1, 2016</span></p>
        </div>
      </div>
      <div class="column col-xs-12 col-md-4 col-md-offset-2 DateDiv">
        <input type="text" name="day" placeholder="00/00/0000" data-type="date" id="date-input" readonly/>
      </div>
    </div>
  </section>
  <section class="FundADay_BigForm">
    <div class="row">
      <div class="column col-xs-12 col-md-6">
        <div class="row">
          <div class="column col-xs-12 col-md-6">
            <label class="DateLabel">Personal Information</label>
            <div class="FormRow">
              <label for="input-first-name">First Name</label> <input class="FormUIInputText" id="input-first-name" name="first_name" required data-msg="*" type="text">
            </div>
            <div class="FormRow">
              <label for="input-last-name">Last Name</label> <input class="FormUIInputText" id="input-last-name" name="last_name" required data-msg="*" type="text">
            </div>
            <div class="FormRow">
              <label for="input-email">Email Address</label> <input class="FormUIInputText" id="input-email" name="email" required data-msg="*" type="email">
            </div>
          </div>
          <div class="column col-xs-12 col-md-6">
            <label class="DateLabel">Payment</label>
            <div class="FormRow">
              <label for="input-ccnumber">Credit Card #</label> <input class="FormUIInputText" id="input-ccnumber" name="cc_number" required data-msg="*" type="tel">
            </div>
            <div class="FormRow FormUIExpMonth">
              <label for="input-ccexpmonth">Exp. Month</label> <input class="FormUIInputText" id="input-ccexpmonth" name="cc_exp_month" required data-msg="*" type="tel">
            </div>
            <div class="FormRow FormUIExpYear">
              <label for="expyear">Exp. Year</label> <input class="FormUIInputText" id="expyear" name="cc_exp_year" required data-msg="*" type="tel">
            </div>
            <div class="FormRow">
              <label for="input-cvc">CVV (Security Code)</label> <input class="FormUIInputText" id="input-cvc" name="cvc" required data-msg="*" type="tel">
            </div>
          </div>
          <div class="column col-xs-12">
            <div class="FormRow">
              <br>
              <p>Note: Once you submit, your card will be immediately charged for $1,500.00 USD, these funds will be used exclusively to fund the day you've chosen.</p>
              <div id="js-form-response"></div>
            </div>
            <div class="FormRow">
              <button class="FundADay_FormSubmit" type="submit">Give Now</button>
            </div><input name="is_anonymous" type="hidden" value="0"> <label class="FormUICheckbox FormUICheckbox--checkbox mt4">I’d like my name not to be displayed publicly on this page. <input type="checkbox"></label>
            <div class="FormUICheckbox__indicator">
              <label class="FormUICheckbox FormUICheckbox--checkbox mt4"></label>
            </div>
          </div>
        </div>
      </div>
      <div class="column col-xs-12 col-md-4 col-md-offset-1 FundADay_Outro">
        <a href="https://iwantrest.com/">
        <h3 class="Serif">Understand the problem in Seattle.</h3></a>
        <hr>
        <a href="https://iwantrest.com/services">
        <h3 class="Serif">Learn more about what we do.</h3></a>
        <p class="underlined">Learn more at <a href="https://iwantrest.com/">iwantrest.com</a>.</p>
      </div>
    </div>
  </section>
</form>
<script src="/js/all.js"></script>

</body>
</html>