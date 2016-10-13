@include('_partials/header')

<!-- END HEADER PARTIAL FILE -->

<section class="">
  <h2 class="Serif">REST Admin</h2>
</section>

@if(Session::has('admin-error'))
<div style="background:red;color:white;padding:10px;text-align:center">
  Oh no! {{Session::get('admin-error')}}
</div>
@endif
@if(Session::has('admin-success'))
<div style="background:green;color:white;padding:10px;text-align:center">
  Congrats! {{Session::get('admin-success')}}
</div>
@endif
<div class="row">

<div class="column col-xs-12 col-md-12">
    

<section class="">
  
  <h3 style="padding-bottom:20px">Funded Days</h3>
  <table style="width:100%">
    <thead>
      <tr>
        <th style="text-align:left">Day</th>
        <th style="text-align:left">Name</th>
        <th style="text-align:left">Email</th>
        <th style="text-align:left">Payment</th>
        <th style="text-align:left">Created</th>
        <th style="text-align:left">&nbsp;</th>
      </tr>
    </thead>
    <tbody>
      @if($days && $days->count())
      @foreach($days as $day)
      <tr style="padding:0 0 10px">
        <td style="padding:5px 0">{{$day->day}}</td>
        <td style="padding:5px 0">{{$day->donor_name}} 
          @if($day->is_anonymous)
          <em>(anonymous)</em>
          @endif
        </td>
        <td style="padding:5px 0">{{$day->donor_email}}</td>
        <td style="padding:5px 0">{{$day->stripe_charge_id == 'CHECK' ? 'Check':'Credit Card'}}</td>
        <td style="padding:5px 0">{{$day->created_at}}</td>
        <td style="padding:5px 0">
          @if($day->stripe_charge_id == 'CHECK')
          <form method="POST" class="js-form-delete-day" action="{{route('admin.days.destroy',$day->id)}}">
            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
            <input name="_method" type="hidden" value="DELETE">
            <button style="background:red;color:white; padding:4px;" type="submit">Delete?</button>
          </form>
          @endif
        </td>
      </tr>
      @endforeach
      @endif
    </tbody>
  </table>


</section>


  </div>




  <div class="column col-xs-12 col-md-12">
<form method="POST" action="{{route('admin.days.store')}}" id="form-create">
  <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
  <section class="FundADay_BigForm">
      <h3>Add a new Day</h3>

    <div class="row">
      <div class="column col-xs-12 col-md-12">
        <div class="row">
          <div class="column col-xs-12 col-md-12">
            <label class="DateLabel">Day (like 2016-12-31)</label>
            <div class="FormRow">
              <label for="input-first-name"></label> <input class="FormUIInputText" id="input-first-name" name="day" required data-msg="Please enter a valid day." type="text">
            </div>
            <label class="DateLabel">Donor Name</label>
            <div class="FormRow">
              <label for="input-first-name"></label> <input class="FormUIInputText" id="input-first-name" name="name" required data-msg="Please enter a valid name." type="text">
            </div>
            <label class="DateLabel">Donor Email (optional)</label>

            <div class="FormRow">
              <label for="input-email"></label> <input class="FormUIInputText" id="input-email" name="email" type="email">
            </div>
          </div>
          <div class="column col-xs-12">
            <label class="FormUICheckbox FormUICheckbox--checkbox mt4">
              Check if this donor wishes to be Anonymous
              <input type="checkbox" name="is_anonymous" value="1" id="js-checkbox-is-anonymous">
              <div class="FormUICheckbox__indicator">
                <label class="FormUICheckbox FormUICheckbox--checkbox mt4"></label>
              </div>
            </label>
            <div class="FormRow">
              <button class="FundADay_FormSubmit" type="submit">
                <div class="FormSubmitDefault">Add Day</div>
                <div class="FormSubmitIsLoading">Submitting</div>
              </button>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </section>
</form>

  </div>

  

</div>


<section>
  <p style="text-align:center" class="underlined">Back to <a href="/">fund-a-day.iwantrest.com</a>.</p>
</section>




</body>
</html>