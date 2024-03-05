@extends('layouts.default')

{{-- Page title --}}
@section('title')
{{ trans('general.ResearchPapers') }}
@parent
@stop

{{-- Page content --}}
@section('content')

<div class="row">
  <div class="col-md-12">

    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">Add New Research Paper</h3>
        <div class="box-tools pull-right">
          <a href="{{ route('researchpapers.index') }}" class="btn btn-default">Back</a>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <form action="{{ route('researchpapers.store') }}" method="POST">
          @csrf
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
          </div>
          <div class="form-group">
            <label for="authors">Authors</label>
            <input type="text" class="form-control" id="authors" name="authors" value="{{ old('authors') }}" required>
          </div>
          <div class="form-group">
            <label for="publication_date">Publication Date</label>
            <input type="date" class="form-control" id="publication_date" name="publication_date" value="{{ old('publication_date') }}" required>
          </div>
          {{-- Add more input fields as needed --}}
          <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </div>
  <!-- /.col-md-12 -->
</div>
<!-- /.row -->
@stop
