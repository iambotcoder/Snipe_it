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
        <h3 class="box-title">Research Papers</h3>
        <div class="box-tools pull-right">
          <a href="{{ route('researchpapers.create') }}" class="btn btn-primary">Add New</a>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>ID</th>
              <th>Title</th>
              <th>Authors</th>
              <th>Publication Date</th>
              <th>User ID</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($researchPapers as $researchPaper)
            <tr>
              <td>{{ $researchPaper->id }}</td>
              <td>{{ $researchPaper->title }}</td>
              <td>{{ $researchPaper->authors }}</td>
              <td>{{ $researchPaper->publication_date }}</td>
              <td>{{ $researchPaper->user_id }}</td>
              <td>
                <a href="{{ route('researchpapers.edit', $researchPaper->id) }}" class="btn btn-primary">Edit</a>
                <a href="{{ route('researchpapers.show', $researchPaper->id) }}" class="btn btn-info">View</a>
                <form action="{{ route('researchpapers.destroy', $researchPaper->id) }}" method="POST" style="display: inline;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </div>
  <!-- /.col-md-12 -->
</div>
<!-- /.row -->
@stop
