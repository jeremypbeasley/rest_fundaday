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
  <div class="logo linked"><a href="/">...</a></div>
</header>

<!-- END HEADER PARTIAL FILE -->

<section class="FundADay_Intro">
  <div class="row">
    <!-- <div class="BigPhoto Intro"></div> -->
    <div class="column col-xs-12 col-md-8">
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
    <div class="column col-xs-12">
      <article class="CenterBlock">
        <h2 class="SansSerif pb5 WeNeedYourHelp"></h2>
        <p>Last year, there were no beds available in King County for nearly 40% of women who contacted REST for a place to stay. </p>
        <p>The ERC will provide up to 7 girls 30 days of emergency housing, intensive case management, and daytime programming to help guests begin to stabilize and consider what life free from exploitation looks and feels like.</p>
        <p class="underlined"><a href="">Learn more about the ERC</a></p>
      </article>
    </div>
  </div>
</section>
<section class="FundADay_FinancialCase NegativeBlock">
  <div class="row">
    <div class="column col-xs-12 col-md-6 col-md-offset-5">
      <article class="CenterBlock">
        <h2 class="Serif pb5">For just $1,500, you can fund the ERC for an entire day.</h2>
        <p>It’s an expensive operation but a worthwhile one.  Your generous donation will cover the daily cost of rent, 24/7 live-in staff, food, utlitities, phones, furniture, activities, etc.</p>
        <p class="underlined"><a href="">See the cost breakdown</a></p>
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
<form id="form-donate" data-id="donate">
  <section class="FundADay_WillYouBe NegativeBlock ">
    <div class="row">
      <div class="column col-xs-12 col-md-6 col-md-offset-3 DateDiv">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <h2 class="SansSerif mb4"><span id="js-total-days-funded">89</span> <span class="Superscript">of</span> 365 days have been funded. Will you fund the <span id="js-total-days-funded-next">90th</span>?</h2>
        <!-- <label class="DateLabel">Choose A Day </label> -->
          <input type="text" name="day" placeholder="00/00/0000" data-type="date" id="date-input" readonly/>
      </div>
    </div>
  </section>
  <section class="FundADay_BigForm">
    <div class="row">
      <div class="column col-xs-12">
        <label class="DateLabel">Personal Information </label>
        <div class="FormRow">
          <label for="input-name">Full Name</label>
          <input id="input-name" name="name" class="FormUIInputText" type="text" required />
        </div>
        <div class="FormRow">
          <label for="input-email">Email Address</label>
          <input id="input-email" name="email" class="FormUIInputText" type="text" required />
        </div>
        <label class="DateLabel">Payment </label>
        <div class="FormRow">
          <label for="input-ccnumber">Credit Card #</label>
          <input id="input-ccnumber" name="cc_number" class="FormUIInputText" type="text" required />
        </div>
        <div class="FormRow FormUIExpMonth">
          <label for="input-ccexpmonth">Exp. Month</label>
          <input id="input-ccexpmonth" name="cc_exp_month" class="FormUIInputText" type="text" required />
        </div>
        <div class="FormRow FormUIExpYear">
          <label for="expyear">Exp. Year</label>
          <input id="expyear" name="cc_exp_year" class="FormUIInputText" type="text" required />
        </div>
        <div class="FormRow">
          <label for="input-cvc">CVV (Security Code)</label>
          <input id="input-cvc" name="cvc" class="FormUIInputText" type="text" required />
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
</body>
</html>