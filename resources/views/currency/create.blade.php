@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">Add Item</div>                       
                    </div>
                   
                </div>
           
                
                <div class="panel-body">
                    {{ Form::open(["route" => "currency.store", "id" => "itemForm", "autocomplete" => "off", "data-toggle"=>"validator"]) }}
     
                    <div class="form-group">
                        <label for="name" class="control-label">Currency Name</label>
                            {{ \Form::text("name", Input::get("name"), 
                      ["placeholder" => 'Currency Name', 
                   "class" => "form-control" ,
                       'required' ]) }}
                           
                    </div>
                    
                     <div class="form-group">
                        <label for="code" class="control-label">Currency Code</label>
                            {{ \Form::text("code", Input::get("code"), 
                      ["placeholder" => 'Currency Code', 
                   "class" => "form-control" ,                    
                       'required' ]) }}                          
                    </div>
                    
                    <div class="form-group">
                        <label for="rate" class="control-label">Currency Conversion Rate</label>
                            {{ \Form::text("rate", Input::get("rate"), 
                      ["placeholder" => 'Currency Conversion Rate', 
                   "class" => "form-control" ,                    
                       'required' ]) }}                          
                    </div>
                    
                    <div class="form-group">        
                        {{ Form::submit('submit', array('class' => 'button registration-button-blue')) }}
                       
                    </div>
                    {{ Form::close() }}
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
  
    });
    </script>
    @endsection