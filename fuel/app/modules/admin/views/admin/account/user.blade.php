@extends('admin/default/template')

@section('content')
    <h1 class="title">Informations du compte</h1>

    @if(Session::get_flash('update_success', false, true))
        <div class="notification is-success">
            Compte mit à jour avec succès !
        </div>
    @endif

    @if(Session::get_flash('update_fail', false, true))
        <div class="notification is-danger">
            Erreur lors de la mise à jour du compte...
        </div>
    @endif

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