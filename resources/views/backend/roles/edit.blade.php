@extends('layouts.master')
@section('title', $title)
@section('content')
    @component('components.card',['type' => 'info'])
        @slot('header')
            <h3 class="card-title">{{ __('Edit User Role: :roleName', ['roleName' => $role->name]) }}</h3>
            <div class="card-tools right">
                <a href="{{ route('roles.index') }}" class="btn btn-info btn-sm back-button"><i class="fa fa-reply"></i> </a>
            </div>
        @endslot


        {{ Form::open(['route'=>['roles.update',$role->id], 'method'=>'PUT','class'=> 'roles-form']) }}
        @include('backend.roles._form',['buttonText'=>__('Update')])
        {{ Form::close() }}
    @endcomponent
@endsection

@section('script')
    <script src="{{ asset('vendor/cvalidator/cvalidator.js') }}"></script>
    <script src="{{ asset('backend/assets/js/role_manager.js') }}"></script>

    <script>
        $(document).ready(function () {
            $(document).on('ifChecked', '.module', function () {
                $('.module_action_' + $(this).attr('data-id')).iCheck('check');
            });
            $(document).on('ifUnchecked', '.module', function () {
                $('.module_action_' + $(this).attr('data-id')).iCheck('uncheck');
            });

            $(document).on('ifChecked', '.task', function () {
                $('.task_action_' + $(this).attr('data-id')).iCheck('check');
            });

            $(document).on('ifUnchecked', '.task', function () {
                $('.task_action_' + $(this).attr('data-id')).iCheck('uncheck');
            });

            $(document).ready(function () {
                $('.roles-form').cValidate({});
            });
        });
    </script>
@endsection
