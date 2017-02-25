<div class="form-horizontal">
    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
        {{ Form::label('name', 'Name', ['class' => 'required col-md-2 control-label']) }}
        <div class="col-md-10">
            {{ Form::text('name', $band->name, ['class' => 'form-control', 'autofocus']) }}
            <span id="name-help">@if($errors->has('name')){{ $errors->first('name') }}@endif</span>
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('start_date', 'Date Started', ['class' => 'col-md-2 control-label']) }}
        <div class="col-md-10">
            {{ Form::date('start_date', $band->start_date, ['class' => 'form-control']) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('website', 'Website', ['class' => 'col-md-2 control-label']) }}
        <div class="col-md-10">
            {{ Form::text('website', $band->website, ['class' => 'form-control']) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('still_active', 'Still Active', ['class' => 'col-md-2 control-label']) }}
        <div class="col-md-10">
            <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-radio {{ $band->still_active == 'Yes' ? 'btn-primary active' : 'btn-default' }}">
                    <input type="radio" value="1" name="still_active" id="option1" autocomplete="off" {{ $band->still_active == 'Yes' ? 'checked' : '' }}> Yes
                </label>
                <label class="btn btn-radio {{ $band->still_active == 'No' ? 'btn-primary active' : 'btn-default' }}">
                    <input type="radio" value="0" name="still_active" id="option2" autocomplete="off" {{ $band->still_active == 'No' ? 'checked' : '' }}> No
                </label>
            </div>
        </div>
    </div>
    
    <div class="form-group">
        <div class="col-md-2"></div>
        <div class="col-md-10">
            <button class="btn btn-primary">Save</button>
        </div>
    </div>
</div>

@push('js')
<script>
    $(".btn-radio")
//        .button('toggle')
        .click(function(){
            $(".btn-radio").removeClass('btn-primary').addClass('btn-default');
            $(this).addClass('btn-primary');
        });
</script>
@endpush