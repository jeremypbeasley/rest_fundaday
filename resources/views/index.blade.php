@include('_partials/header')

<!-- END HEADER PARTIAL FILE -->

<header>
  <div class="Logo linked"><a href="/">...</a></div>
</header>

<section class="FundADay_Intro">
  <div class="row">
    <!-- <div class="BigPhoto Intro"></div> -->
    <div class="column col-xs-12 col-md-5 col-md-offset-7">
      <article class="CenterBlock">
        <h2 class="Serif">Seattle needs a safe place where a young woman can escape a life of exploitation.</h2>
      </article>
    </div>
  </div>
</section>
<section class="FundADay_BigPhoto">
</section>
<section class="FundADay_WhatIsERC">
  <div class="row">
    <div class="column col-xs-12 col-md-6 col-md-offset-0">
      <h2 class="SansSerif pb5 WeNeedYourHelp">We need your help to open our Emergency Receiving Center.</h2>
      <p>Last year, there were no beds available in King County for nearly 40% of women who contacted REST for a place to stay. </p>
      <p>The ERC will provide more than 2,500 nights of emergency shelter for survivors of sex trafficking and those seeking escape from the sex trade. Imagine when our 24-hour hotline rings with someone looking to escape a violent trafficker, having them hear, “There is a safe place for you to go tonight, and a team of people dedicated to helping you.” Imagine the impact of increased coordination between social service agencies and local police who have an immediate place to bring victims of human trafficking when rescued.</p>
      <h3 class="mb5 mt5">For $1,500, you can fund the new ERC for an entire day.</h3> 
      <p>It’s an expensive operation but a worthwhile one. Your generous donation will cover the daily operations cost: rent & utilities, 24/7 awake staff, daytime programming, case management, basic needs, etc.</p>
      <!-- <p class="underlined"><a onclick="ga('send', 'event', 'Learn more about ERC','click');" href="">Learn more about the ERC</a></p> -->
    </div>
    <div class="column col-xs-12 col-md-5 col-md-offset-1">
      <p><img class="BigChart" src="_img/chart2.svg"></p>
    </div>
  </div>
  <!-- <div class="row">
    <div class="column col-xs-12 col-md-4">
     <h2 class="Serif pb5">For $1,500, you can fund the new ERC for an entire day.</h2>
      <p>It’s an expensive operation but a worthwhile one. Your generous donation will cover the daily operations cost: rent & utilities, 24/7 awake staff, daytime programming, case management, basic needs, etc.</p> 
      </div>
    <div class="column col-xs-12 col-md-4">
      <p><img class="BigChart" src="_img/chart2.svg"></p>
    </div>
  </div> -->
</section>
<form id="form-donate">
  <section class="FundADay_WillYouBe NegativeBlock ">
    <div class="row">
      <div class="column col-xs-12 col-md-5 Question">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <h2 class="SansSerif mb2"><span id="js-total-days-funded">89</span> <!-- <span class="Superscript">of</span> -->of 365 days have been funded. Will you fund the <span id="js-total-days-funded-next">90th</span>?</h2>
      </div>
      <div class="column col-xs-12 col-md-5 col-md-offset-2 DateDiv">
        <div class="ChosenDay pb1">
          <!-- <div class="SansSerif DayDesc mt3 mr2 mb0 ml3">Next unfunded day:</div> -->
          <div class="SansSerif ActualDay ml3 mt3 mr3 mb0"><span id="js-next-unfunded-date-formatted"></span></div>
        </div>
        <input type="text" name="day" placeholder="00/00/0000" data-type="date" id="date-input" readonly/>
      </div>
    </div>
  </section>
  <section class="FundADay_BigForm">
    <div class="row">
      <div class="column col-xs-12 col-md-7">
        <div class="row">
          <div class="column col-xs-12 col-md-6">
            <label class="DateLabel">Personal Information</label>
            <div class="FormRow">
              <label for="input-first-name">First Name</label> <input class="FormUIInputText" id="input-first-name" name="first_name" required data-msg="Please enter a valid first name." type="text">
            </div>
            <div class="FormRow">
              <label for="input-last-name">Last Name</label> <input class="FormUIInputText" id="input-last-name" name="last_name" required data-msg="Please enter a valid last name." type="text">
            </div>
            <div class="FormRow">
              <label for="input-email">Email Address</label> <input class="FormUIInputText" id="input-email" name="email" required data-msg="Please enter a valid email." type="email">
            </div>
          </div>
          <div class="column col-xs-12 col-md-6">
            <label class="DateLabel">Payment</label>
            <div class="FormRow">
              <label for="input-ccnumber">Credit Card #</label> <input class="FormUIInputText" id="input-ccnumber" name="cc_number" required data-msg="Please enter a valid card." type="tel">
            </div>
            <div class="FormRow FormUIExpMonth">
              <label for="input-ccexpmonth">Exp. Month</label> <input class="FormUIInputText" id="input-ccexpmonth" name="cc_exp_month" required data-msg="Please enter a valid month." type="tel">
            </div>
            <div class="FormRow FormUIExpYear">
              <label for="expyear">Exp. Year</label> <input class="FormUIInputText" id="expyear" name="cc_exp_year" required data-msg="Please a valid year." type="tel">
            </div>
            <div class="FormRow">
              <label for="input-cvc">CVV (Security Code)</label> <input class="FormUIInputText" id="input-cvc" name="cvc" required data-msg="Please a valid CVV." type="tel">
            </div>
          </div>
          <div class="column col-xs-12">
            <div class="FormRow">
              <p class="mt1">Note: Once you submit, your card will be immediately charged for $1,500 USD, these funds will be used exclusively to fund the day you've chosen.</p>
              <div id="js-form-response" class="form-error-color"></div>
            </div>
            <div class="FormRow">
              <button class="FundADay_FormSubmit" type="submit">
                <div class="FormSubmitDefault">Give Now</div>
                <div class="FormSubmitIsLoading">Submitting</div>
              </button>
            </div>
            <label class="FormUICheckbox FormUICheckbox--checkbox mt4">
              I prefer not to have any public credit for my funding a day.
              <input type="checkbox" name="is_anonymous" value="1" id="js-checkbox-is-anonymous">
              <div class="FormUICheckbox__indicator">
                <label class="FormUICheckbox FormUICheckbox--checkbox mt4"></label>
              </div>
            </label>
          </div>
        </div>
      </div>
      <div class="column col-xs-12 col-md-4 col-md-offset-1 FundADay_Outro">
        <a onclick="ga('send', 'event', 'Understand The Problem','click');" href="https://iwantrest.com/">
        <h3 class="Serif">Understand the problem in Seattle.</h3></a>
        <hr>
        <a onclick="ga('send', 'event', 'Learn more about what we do', 'click');" href="https://iwantrest.com/services">
        <h3 class="Serif">Learn more about what we do.</h3></a>
        <p class="underlined">Learn more at <a onclick="ga('send', 'event', 'Learn more at iwantrest', 'click');" href="https://iwantrest.com/">iwantrest.com</a>.</p>
      </div>
    </div>
  </section>
</form>
<script src="/js/all.js"></script>

</body>
</html>