<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight uppercase">
            {{ __('nuevo producto') }}
        </h2>
    </x-slot>
  
    @section('content')
    
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg m-4 p-4">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-right">
                        <a class="btn btn-primary my-3" href="{{ route('productos.index') }}"> Volver</a>
                    </div>
                </div>
            </div>
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Lo siento!</strong> Debes revisar los campos.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <form action="{{ route('productos.store') }}" method="POST">
                @csrf
            
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group pb-4">
                            <strong>Nombre:</strong>
                            <input type="text" name="nombre" class="form-control" placeholder="Nombre">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group pb-4">
                            <strong>Fecha:</strong>
                            <input type="date" name="fecha" class="form-control" placeholder="Nombre">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Cantidad:</strong>
                            <input type="text" name="cantidad" class="form-control" placeholder="Cantidad">
                        </div>
                        <div class="form-group">
                            <strong>Categoria:</strong>
                            <input type="text" name="categoria" class="form-control" placeholder="Categoria">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-4">
                        <button type="submit" class="text-black btn btn-primary">Enviar</button>
                    </div>
                </div>    
            </form>
        </div>    

    @endsection

</x-app-layout>