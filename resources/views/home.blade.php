@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                 <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6"> Currency Conversion</div>
                          <div class="col-md-6 text-right">
                              <a href="/currency">Currency Management</a></div>
                    </div>
                   
                </div>
                
                <div class="panel-body">
                   <table  class="table table-striped infinite-table">
                        <thead>
                          <tr>
                            
                            <th>From</th>
                            <th>To($)</th>
                          <th>Input</th>
                          <th>Conversion</th>
                          </tr>
                        </thead>
                        <tbody>
                           
                           
                          <tr>
                           
                           <td> {{ Form::select('currentcy_1', $list, null ,['id' => 'currency_1_val'])}}</td>
                           <td> {{ Form::select('currentcy_2', [1 => 'US Dollar'], null ,['id' => 'currency_2_val'])}}</td>
                           <td>    {{ Form::text('input_val', '', ['id' => 'input_val']) }}  </td>
                           <td><div id="output_val"></div> </td>
                          </tr>
                            
                         

                        </tbody>
                      </table>
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer_js')
@parent
<script>
    
    $(document).ready(function () {       
  $('#input_val').keyup(function() {
        if($.isNumeric($(this).val()) && $(this).val() != 0)
        {
            $.ajax({
			url: "{{route('currency.convert')}}",
			type: "POST",
			data:  { input_val :$(this).val(),
                            _token : "{{ csrf_token() }}",
                        from :$("#currency_1_val option:selected").val(),
                        to: $("#currency_2_val option:selected").val()},
			beforeSend: function(){
			  
			},
			complete: function(){
			  
			},
			success: function(data){
			$("#output_val").html(data.val);
			},
			error: function(){} 	        
	   });
        }
});
    });
    </script>
    @endsection