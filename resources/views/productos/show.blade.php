<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight uppercase">
            {{ __('Ver Producto') }}
        </h2>
    </x-slot>

    @section('content')

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg my-4 p-4">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-right">
                        <a class="btn btn-primary mb-3" href="{{ route('productos.index') }}"> Volver</a>
                    </div>
                </div>
            </div>
        
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nombre:</strong>
                        {{ $producto->nombre }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Detalles:</strong>
                        {{ $producto->detalles }}
                    </div>
                </div>
            </div>
        </div>

    @endsection

</x-app-layout>