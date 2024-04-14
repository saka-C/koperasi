@extends('layout.app')

@section('pages')
    <div class="container-login">
        <div class="login-card">
            <h1>Login</h1>
            <form action="">
                <div class="form-group">
                    <fieldset>
                        <legend>Email</legend>
                        <input type="email" name="" id="" placeholder="e.g@example.com">
                    </fieldset>
                </div>
                <div class="form-group">
                    <fieldset>
                        <legend>Password</legend>
                        <input type="password" name="" id="" placeholder="6-character">
                    </fieldset>
                </div>
                <div class="form-group">
                    <button type="submit">Masuk</button>
                </div>
            </form>
        </div>
    </div>
@endsection