@extends('admin.layouts.modal')

{{-- Content --}}
@section('content')
<!-- Tabs -->
<ul class="nav nav-tabs">
	<li class="active">
		<a href="#tab-general" data-toggle="tab"> {{ Lang::get("admin/modal.general") }}</a>
	</li>
</ul>
<!-- ./ tabs -->
<form class="form-horizontal" enctype="multipart/form-data" method="post" 
	action="@if(isset($videoalbum)){{ URL::to('admin/videoalbum/'.$videoalbum->id.'/edit') }}
	        @else{{ URL::to('admin/videoalbum/create') }}@endif"
    autocomplete="off">
	<!-- CSRF Token -->
	<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
	<!-- ./ csrf token -->
	<!-- Tabs Content -->
	<div class="tab-content">
		<!-- General tab -->
		<div class="tab-pane active" id="tab-general">
            <div class="tab-pane active" id="tab-general">
                <div class="form-group {{{ $errors->has('language_id') ? 'error' : '' }}}">
                <div class="col-md-12">
                    <label class="control-label" for="language_id">{{ Lang::get("admin/admin.language") }}</label>
                    <select style="width: 100%"name="language_id" id="language_id" class="form-control">
                        @foreach($languages as $item)
                            <option value="{{$item->id}}"
                                @if(!empty($language))
                                        @if($item->id==$language)
                                            selected="selected"
                                        @endif
                                @endif
                                >{{$item->name}}</option>
                        @endforeach
                        </select>
                </div>
            </div>
			<div class="form-group {{{ $errors->has('title') ? 'has-error' : '' }}}">
				<div class="col-md-12">
					<label class="control-label" for="name"> {{ Lang::get("admin/modal.title") }}</label>
					<input class="form-control" type="text" name="name" id="name" value="{{{ Input::old('name', isset($videoalbum) ? $videoalbum->name : null) }}}" />
					{!!$errors->first('title', '<span class="help-block">:message </span>')!!}
				</div>
			</div>
			<div class="form-group">
                <div class="col-md-12">
                    <label class="control-label" for="description">{{ Lang::get("admin/video.description") }}</label>
                    <textarea class="form-control full-width wysihtml5" name="description" rows="10">{{{ Input::old('description', isset($videoalbum) ? $videoalbum->description : null) }}}</textarea>
                </div>
            </div>

		</div>
		<!-- ./ general tab -->
	</div>
	<!-- ./ tabs content -->

	<!-- Form Actions -->
	
	<div class="form-group">
		<div class="col-md-12">
			<button type="reset" class="btn btn-sm btn-warning close_popup">
				<span class="glyphicon glyphicon-ban-circle"></span>  {{ Lang::get("admin/modal.cancel") }}
			</button>
			<button type="reset" class="btn btn-sm btn-default">
				<span class="glyphicon glyphicon-remove-circle"></span>  {{ Lang::get("admin/modal.reset") }}
			</button>
			<button type="submit" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-ok-circle"></span> @if (isset($videoalbum))  {{ Lang::get("admin/modal.edit") }} @else  {{ Lang::get("admin/modal.create") }} @endif
			</button>
		</div>
	</div>
	<!-- ./ form actions -->
</form>
@stop