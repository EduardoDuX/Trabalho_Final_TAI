@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Menu Principal') }}</div>

                  <div class="card-body" style="Display:inline; text-align:center">
                  <a href="/aviao" class="btn btn-primary" type="a" name="a">Aviões</a>
                  <a href="/voo" class="btn btn-primary" type="a" name="a">Voos</a>
                  <a href="/cliente" class="btn btn-primary" type="a" name="a">Clientes</a>
                  <a href="/passagem" class="btn btn-primary" type="a" name="a">Passagens</a>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
