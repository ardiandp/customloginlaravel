@extends('pegawai.layouts')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Dashboard Pegawai</div>
            <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        {{ $message }}
                    </div>
                @else
                    <div class="alert alert-success">
                        You are logged in! klik disni untuk keluar 
                        <a class="dropdown-item" href="{{ route('pegawai/logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"
                            >Logout</a>
                            <form id="logout-form" action="{{ route('pegawai/logout') }}" method="POST">
                                @csrf
                            </form>
                    </div>       
                @endif                
            </div>
        </div>
    </div>    
</div>
    
@endsection