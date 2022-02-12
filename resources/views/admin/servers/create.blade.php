@extends('admin.layouts.admin')

@section('title', trans('admin.servers.create'))

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.servers.store') }}" method="POST" x-data="{type: ''}">

                @include('admin.servers._form')

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> {{ trans('messages.actions.save') }}
                </button>
            </form>
        </div>
    </div>
@endsection
