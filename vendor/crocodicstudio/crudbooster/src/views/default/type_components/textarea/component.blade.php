<div class='form-group {{$header_group_class}} {{$col_width?:'col-sm-10'}} {{ ($errors->first($name))?"has-error":"" }}' id='form-group-{{$name}}' style="{{@$form['style']}}">
							<label class='control-label'>{{$form['label']}} {!!($required)?"<span class='text-danger' title='This field is required'>*</span>":"" !!}</label>							
							<div class="">
							<textarea name="{{$form['name']}}" id="{{$name}}" {{$required}} {{$readonly}} {!!$placeholder!!} {{$disabled}} {{$validation['max']?"maxlength=$validation[max]":""}} class='form-control' rows='5'>{{ $value}}</textarea>
							<div class="text-danger">{!! $errors->first($name)?"<i class='fa fa-info-circle'></i> ".$errors->first($name):"" !!}</div>
							<p class='help-block'>{{ @$form['help'] }}</p>
							</div>
						</div>