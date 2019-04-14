<div class="form-group {!! ($errors->has('subscription_detail') ? 'has-error' : '') !!}">
    {!! Form::label('subscription_detail','Subscription Details', ['class' => 'control-label']) !!}
    {!! Form::select('subscription_detail', ['Basic' => 'Basic', 'Premium' => 'Premium'], null, ['class' => 'form-control' . ($errors->has('subscription_detail') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('subscription_detail', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-group {!! ($errors->has('subscription_payment') ? 'has-error' : '') !!}">
    {!! Form::label('subscription_payment','Subscription Payment', ['class' => 'control-label']) !!}
    {!! Form::select('subscription_payment', ['Paid' => 'Paid', 'Not Paid' => 'Not Paid'], null, ['class' => 'form-control' . ($errors->has('subscription_payment') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('subscription_payment', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-group {!! ($errors->has('subscription_period') ? 'has-error' : '') !!}">
    {!! Form::label('subscription_period','Subscription Period', ['class' => 'control-label']) !!}
    {!! Form::select('subscription_period', ['1 years' => '1 Year', '2 years' => '2 Years', '3 years' => '3 Years'], null, ['class' => 'form-control' . ($errors->has('subscription_period') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('subscription_period', '<span class="help-block">:message</span>') !!}
</div>


