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
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
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
                        <div class="form-group">
                            <strong>Detalles:</strong>
                            <textarea class="form-control" style="height:150px" name="detalles" placeholder="Detalles"></textarea>
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