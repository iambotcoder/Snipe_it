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
                    <h3 class="box-title">{{ $researchPaper->title }}</h3>
                    <div class="box-tools pull-right">
                        <a href="{{ route('researchpapers.index') }}" class="btn btn-default">Back</a>
                        <a href="{{ route('researchpapers.edit', $researchPaper->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('researchpapers.destroy', $researchPaper->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                        </form>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $researchPaper->id }}</td>
                            </tr>
                            <tr>
                                <th>Title</th>
                                <td>{{ $researchPaper->title }}</td>
                            </tr>
                            <tr>
                                <th>Authors</th>
                                <td>{{ $researchPaper->authors }}</td>
                            </tr>
                            <tr>
                                <th>Publication Date</th>
                                <td>{{ $researchPaper->publication_date }}</td>
                            </tr>
                            <tr>
                                <th>User ID</th>
                                <td>{{ $researchPaper->user_id }}</td>
                            </tr>
                            {{-- Add more fields as needed --}}
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
