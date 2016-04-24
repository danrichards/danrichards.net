@extends ($layout)

@section ('content')
                @include ('...templates.clean-blog.components.notice-or-errors')
                <p>Want to get in touch with me? Fill out the form below to send me a message and I will try to get back to you within 24 hours!</p>
                {{ Form::open(['url'=>'contact', 'method' => 'post']) }}
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            {{ Form::label('name', "name") }}
                            {{ Form::text('name', Input::get('name'), [
                                'class' => "form-control",
                                'placeholder'=>"Name",
                                'id' => "name",
                                'required data-validation-required-message'=>"Please enter your name."
                            ]) }}
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            {{ Form::label('email', "Email Address") }}
                            {{ Form::text('email', Input::get('email'), [
                                'class' => "form-control",
                                'placeholder'=>"Email Address",
                                'id' => "email",
                                'required data-validation-required-message'=>"Please enter your email address."
                            ]) }}
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            {{ Form::label('phone', "Phone Number") }}
                            {{ Form::text('phone', Input::get('phone'), [
                                'class' => "form-control",
                                'placeholder'=>"Phone Number",
                                'id' => "phone"
                            ]) }}
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Message</label>
                            {{ Form::label('message', "Message") }}
                            {{ Form::textarea('message', Input::get('message'), [
                                'rows' => '5',
                                'class' => "form-control",
                                'placeholder'=>"Message",
                                'id' => "message",
                                 'required data-validation-required-message' => "Please enter a message."
                            ]) }}
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <br />
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            {{ Form::captcha(['theme' => 'clean']) }}
                        </div>
                    </div>
                    <br />
                    <div id="success"></div>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <button type="submit" class="btn btn-default">Send</button>
                        </div>
                    </div>
                </form>
@endsection