@extends('layout')

@section('content')
    <section class="content">
        <div class="register">
            @if (session('status'))
                <div class="alert alert-danger">
                    {{session('status')}}
                </div>
            @endif
            <h1>Авторизация</h1>
            <form action="/login" class="formRegistr" method="post">
                {{csrf_field()}}
                <div class="row">
                    <input id="email" type="text" name="email" value="{{old('email')}}"   placeholder="Email">
                </div>
                {{--<div class="row">
                    <input id="email" type="text" name="email" value="{{old('email')}}" placeholder="E-mail">
                </div>--}}
                <div class="row">
                    <input id="password" type="password" name="password"  placeholder="Пароль">
                </div>
                <button type="submit">Войти</button>
            </form>
                <a href="/register" class="registrForm">Регистрация</a>
        </div>
    </section>
@endsection