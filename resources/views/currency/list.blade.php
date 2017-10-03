@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6"> Currency Management</div>
                        </div>

                </div>
                <div class="panel-body" >
                    {{ Form::open(["route" => "currency.store", "id" => "currency_add", "autocomplete" => "off", "data-toggle"=>"validator"]) }}

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
                        {{ Form::submit('Add', array('class' => 'button registration-button-blue')) }}

                    </div>
                    {{ Form::close() }}
                </div>

                <div class="panel-body right" style="float: right;">
                   
                    {{ Form::open(["route" => "currency.delete.all", "id" => "currency_add", "autocomplete" => "off", "data-toggle"=>"validator"]) }}

                    {{ Form::submit('Reset', array('class' => 'button registration-button-blue')) }}
                    {{ Form::close() }} 
                </div>
                <div class="panel-body infinite-div">
                    
                    <table  class="table table-striped infinite-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>

                                <th>Code</th>
                                <th>Rate</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($list as $row)
                            <tr>
                                <td> {{ $row->id}}</td>
                                <td> {{ $row->name}}</td>

                                <td>  {{ $row->code}}</td>
                                <td> {{ $row->rate}}
                                </td>
                            </tr>
                            @endforeach

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
@endsection