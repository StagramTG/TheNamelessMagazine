@extends('admin/default/template')

@section('content')
    <h1 class="title">Informations du compte</h1>

    {{-- Navigation --}}
    <div class="tabs is-boxed">
        <ul>
            <li class="{{ $tab == 'general' ? 'is-active' : '' }}">
                <a href="/admin/account/user">
                    <span>Général</span>
                </a>
            </li>
            <li class="{{ $tab == 'email' ? 'is-active' : '' }}">
                <a href="/admin/account/useremail">
                    <span>Email</span>
                </a>
            </li>
            <li class="{{ $tab == 'password' ? 'is-active' : '' }}">
                <a href="/admin/account/userpassword">
                    <span>Mot de passe</span>
                </a>
            </li>
        </ul>
    </div>

    @yield('tabcontent')
@endsection