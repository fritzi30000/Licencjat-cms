@section('content')
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header title">{{ trans('app.lecture-edit') }} {{ $lecture->title }}</h1>
    </div>
  </div>
  @if(!empty($lecture))
    <div class="edit lecture">
      <div class="action-buttons">
        <a href="{{ URL::route('lecture.view', $lecture->id) }}" class="btn btn-default"><i class="fa fa-long-arrow-left"></i>{{ trans('common.back') }}</a>
      </div>
      {{ Form::open(array('route' => array('lecture.update', $lecture->id))) }}
      <div class="form-cluster">
        <div class="form-group">
          {{ Form::label('title', Lang::get('common.title'))}}
          {{ Form::text('title', $lecture->title) }}
          @if ($errors->has('title')) <p class="help-block">{{ $errors->first('title') }}</p> @endif
        </div>
        <div class="form-group">
          {{ Form::label('lead', Lang::get('common.lead'))}}
          {{ Form::text('lead', $lecture->lead) }}
          @if ($errors->has('lead')) <p class="help-block">{{ $errors->first('lead') }}</p> @endif
        </div>
        <div class="form-group">
          {{ Form::label('attachment', Lang::get('app.upload-attach'))}}
          {{ Form::file('attachment') }}
          <input id="img-isset" type="checkbox" name="img-isset" checked="checked" value="1"><label for="img-isset"><span>{{ trans('common.img-isset') }}</span></label>

        </div>
        <div class="form-group">
          {{ Form::label('attachment-description', Lang::get('app.attach-description'))}}
          {{ Form::text('attachment-description') }}
        </div>
        <div class="form-group">
          {{ Form::label('attachment-title', Lang::get('app.attach-title'))}}
          {{ Form::text('attachment-title') }}
        </div>

        <div class="form-group">
          {{ Form::label('content', Lang::get('common.content'))}}
          {{ Form::textarea('content', $lecture->content, array('id'=>'editor')) }}
        </div>
        <div class="form-group">
          {{ Form::label('courses', Lang::get('common.select-course')) }}
          {{ Form::select('courses', $courses, $lecture->course_id) }}
        </div>
        <div class="form-group">
          {{ Form::label('tags', Lang::get('common.tags-category')) }}
          {{ Form::select('tags[]', ($tags), ($lecture_tags), ['multiple'=>true,'class' => 'form-control margin']) }}
        </div>


                <!--tagi-->
        {{ Form::submit(Lang::get('common.submit')) }}
      </div>
      {{ Form::close() }}
    </div>
  @else
    <p class="no-result">{{ trans('no-such-lecture') }}</p>
  @endif
@stop
