@extends('adminlte::page')

@section('title', 'School')

@section('content_header')
    <h1>School</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.home.index') }}"><i class="fa fa-dashboard"></i>Home</a></li>
        <li>School</li>
    </ol>
@stop

@section('content')
<div class="row">
    
    <div class="col-md-12">
         @include('flash::message')
    </div>
   
    <div class="col-md-12">
        <div class="box box-info pad">
            <div class="box-header with-border">
                <i class="fa fa-list"></i>
                <h4 class="box-title">List FAQS</h4>
                <div class="box-tools pull-right">
                    <a href="{{ route('admin.school.index') }}" class="btn btn-default btn-sm">
                        <i class="fa fa-arrow-left"></i> <b>BACK</b>
                    </a>
                </div>
            </div>

            <div class="box-body">
                <div class="faq-container">
                    @include('admin.school.faq.table')
                </div>
            </div>

        </div>
        <!-- /.box -->

        <div class="box box-success pad">
            <div class="box-header with-border">
                <i class="fa fa-plus"></i>
                <h4 class="box-title">Create FAQ</h4>
            </div>

            <div class="box-body">

                {!! Form::open(['method' => 'POST', 'route' => ['admin.school.faq.store',$school->id], 'class' => 'faq-form' ]) !!}
        
                    <div class="form-group{{ $errors->has('question') ? ' has-error' : '' }}">
                        {!! Form::label('question', 'Question') !!}
                        {!! Form::text('question', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        <small class="text-danger">{{ $errors->first('question') }}</small>
                    </div>

                    <div class="form-group{{ $errors->has('answer') ? ' has-error' : '' }}">
                        {!! Form::label('answer', 'Answer') !!}
                        {!! Form::textarea('answer', null, ['class' => 'form-control', 'required' => 'required','rows' => '3']) !!}
                        <small class="text-danger">{{ $errors->first('answer') }}</small>
                    </div>
                
                        {!! Form::reset("Cancelar", ['class' => 'btn btn-warning']) !!}
                        {!! Form::submit("Save", ['class' => 'btn btn-success']) !!}
                
                {!! Form::close() !!}
                      
            </div>

        </div>
        <!-- /.box -->

    </div>

</div>

@stop

@section('js')
<script>


$("form.faq-form").submit(function(e) {
    e.preventDefault();
    var obj = $(this);

    if (obj.hasClass("disabled")) {
        return false;
    }
    obj.addClass("disabled");
    $.ajax({
        url: obj.attr("action"),
        type: 'post',
        dataType: 'html',
        data: obj.serialize(),
        success: function(r) {

            // console.log(r);
            // var msgobj = obj.find(".alert");
            // if (r.indexOf("Success") >= 0) {
            //     msgobj.removeClass("alert-error");
            //     msgobj.addClass("alert-success");
            // } else {
            //     msgobj.removeClass("alert-success");
            //     msgobj.addClass("alert-error");
            // }
            // msgobj.text(r);
            // msgobj.fadeIn();
            
            $('div.faq-container').empty();
            $('div.faq-container').html(r);
            obj.removeClass("disabled");
            obj[0].reset();
        }
    });
});

</script>
@stop