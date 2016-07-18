

  

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
<header>
  <div class="Logo linked"><a href="/">...</a></div>
</header>

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
  </div>
</section>
<section class="ERCGallery">
  <div><img src="_img/slide4.jpg"></div>
  <div><img src="_img/slide3.jpg"></div>
  <div><img src="_img/slide2.jpg"></div>
  <div><img src="_img/slide1.jpg"></div>
  <!-- <div><img src="http://cdn2.dropmark.com/39456/f8652ba5ff68635386f1a26996c89d6cb42db0a4/198033.jpg"></div> -->
</section >
<section class="FundADay_FinancialCase NegativeBlock">
  <div class="row">
    <div class="column col-xs-12 col-md-6 col-md-offset-2">
      <h2 class="Serif pb5">For just $1,500, you can fund the ERC for an entire day.</h2>
    </div>
    <div class="column col-xs-12 col-md-4 first-md">
      <p>It’s an expensive operation but a worthwhile one.  Your generous donation will cover the daily cost of rent, 24/7 live-in staff, food, utlitities, phones, furniture, activities, etc.</p>
      <p class="underlined"><a href="">See the cost breakdown</a></p>
    </div>
  </div>
</section>
<form id="form-donate">
  <section class="FundADay_WillYouBe NegativeBlock ">
    <div class="row">
      <div class="column col-xs-12 col-md-6">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <h2 class="SansSerif mb2">89 <span class="Superscript">of</span> 365 days have been funded. Will you fund the 90th?</h2>
        <div class="ChosenDay mb2 mt4">
          <p class="SansSerif op50 mt1 mb0">The next unfunded day is</p>
          <p class="SansSerif">July 20, 2016</p>
        </div>
      </div>
      <div class="column col-xs-12 col-md-6 DateDiv">
        <input type="text" name="day" placeholder="00/00/0000" data-type="date" id="date-input" readonly/>
      </div>
    </div>
  </section>
  <section class="FundADay_BigForm">
    <div class="row">
      <div class="column col-xs-12 col-md-6">
        <label class="DateLabel">Personal Information </label>
        <div class="FormRow">
          <label for="d3">Full Name</label>
          <input id="d3" name="name" class="FormUIInputText" type="text" />
        </div>
        <div class="FormRow">
          <label for="d3">Email Address</label>
          <input id="d3" name="email" class="FormUIInputText" type="email" />
        </div>
        <label class="DateLabel">Payment </label>
        <div class="FormRow">
          <label for="d3">Credit Card #</label>
          <input id="d3" name="cc_number" class="FormUIInputText" type="tel" />
        </div>
        <div class="FormRow FormUIExpMonth">
          <label for="d3">Exp. Month</label>
          <input id="d3" name="cc_exp_month" class="FormUIInputText" type="tel" />
        </div>
        <div class="FormRow FormUIExpYear">
          <label for="d3">Exp. Year</label>
          <input id="expyear" name="cc_exp_year" class="FormUIInputText" type="tel" />
        </div>
        <div class="FormRow">
          <label for="d3">CVV (Security Code)</label>
          <input id="d3" name="cvc" class="FormUIInputText" type="tel" />
        </div>
        <div class="FormRow">
        <Br>
          <p>Note: Once you submit, your card will be immediately charged for $1,500.00 USD, these funds will be used exclusively to fund the day you've chosen.</p>
          <div id="js-form-response"></div>
        </div>
        <div class="FormRow">
         <button class="FundADay_FormSubmit" type="submit">Give Now</button>
        </div>
        <input name="is_anonymous" type="hidden" value="0">
        <label class="FormUICheckbox FormUICheckbox--checkbox mt4 ">I’d like my name not to be displayed publicly on this page.
          <input type="checkbox"/>
          <div class="FormUICheckbox__indicator"></div>
        </label>
      </div>
    </div>
  </section>
  <section class="FundADay_Outro">
    <a href="https://iwantrest.com/"><h2 class="Serif">Understand the problem in Seattle.</h2></a>
    <hr>
    <a href="https://iwantrest.com/services"><h2 class="Serif">Learn more about what we do.</h2></a>
    <p class="underlined">Learn more at <a href="https://iwantrest.com/">iwantrest.com</a>.</p>
  </section>
</form>
<script src="/js/all.js"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-29157146-3', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>