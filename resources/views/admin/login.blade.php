@include('_partials/header')

<!-- END HEADER PARTIAL FILE -->

<section class="">
  <h2 class="Serif">REST Admin Login</h2>
</section>

@if(Session::has('admin-error'))
<div style="background:red;color:white;padding:10px;text-align:center">
  {{Session::get('admin-error')}}
</div>
@endif
<form method="POST">
  <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
  <section class="FundADay_BigForm">
    <div class="row">
      <div class="column col-xs-12 col-md-6">
        <div class="row">
          <div class="column col-xs-12 col-md-12">
            <label class="DateLabel">User</label>
            <div class="FormRow">
              <label for="input-first-name"></label> <input class="FormUIInputText" id="input-user" name="user" required data-msg="Please enter a valid user." type="text">
            </div>
            <label class="DateLabel">Password</label>
            <div class="FormRow">
              <label for="input-last-name"></label> <input class="FormUIInputText" id="input-pass" name="pass" required data-msg="Please enter a valid password." type="password">
            </div>
            <div class="FormRow">
              <button class="FundADay_FormSubmit" type="submit">
                <div class="FormSubmitDefault">Login</div>
                <div class="FormSubmitIsLoading">Submitting</div>
              </button>
            </div>
          </div>
        </div>
        

      </div>
    </div>
  </section>
</form>
</body>
</html>