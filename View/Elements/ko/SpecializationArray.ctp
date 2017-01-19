 <!-- ko foreach:SpecializationArray -->
  <div class="form-group row">
    <div class="col-md-6"></div>
    <div class="col-md-6">
      <div class="input-group">
         <input disabled type="text" class="form-control"  data-bind='attr:{value:value}'>
         <span class="input-group-btn">
              <a class="btn btn-default" data-bind='click:function(e){AppModel.DelNewSpecializations(e);}'><i class='fa fa-minus'></i></a>
         </span>
      </div>
      <input name='data[SepcializationArray][][specialization_id]' class="form-control" type="hidden" data-bind='attr:{value:key}'>
    </div>
  </div> 
<!-- /ko -->