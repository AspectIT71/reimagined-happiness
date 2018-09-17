@extends('layout')

@section('content')
    <section class="content">
        <div class="register">
            @include ('admin.errors')
            <h1>Регистрация</h1>
            <form action="/register" class="formRegistr" method="post">
                {{csrf_field()}}
                <div class="row">
                <input id="name" type="text" name="name" value="{{old('name')}}"   placeholder="Имя">
                </div>
                <div class="row">
                <input id="email" type="text" name="email" value="{{old('email')}}" placeholder="E-mail">
                </div>
                <div class="row">
                <input id="password" type="password" name="password"  placeholder="Пароль">
                </div>
                <button type="submit">Зарегестрироватся</button>
            </form>
        </div>
    </section>
@endsection