@extends('layout.app')

@section('pages')
    <div class="container-login">
        <div class="login-card">
            <h1>Login</h1>
            <form action="/login" method="post">
                @csrf
                <div class="form-group">
                    <fieldset>
                        <legend>Usename</legend>
                        <input type="text" name="username" id="" placeholder="usename" required>
                    </fieldset>
                </div>
                <div class="form-group">
                    <fieldset>
                        <legend>Password</legend>
                        <input type="password" name="password" id="" placeholder="6-character" required>
                    </fieldset>
                </div>
                <div class="form-group">
                    <button type="submit">Masuk</button>
                </div>
            </form>
        </div>
    </div>
@endsection