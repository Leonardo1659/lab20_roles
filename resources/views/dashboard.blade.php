<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    {{-- VISTA ADMINISTRADOR --}}
                    @if(Auth::user()->rol == 'admin')
                        <h3 style="font-size: 20px; font-weight: bold; color: #dc2626; margin-bottom: 5px;">Panel de Administrador </h3>
                        <p style="margin-bottom: 20px; color: #555;">Bienvenido al sistema de control, <b>{{ Auth::user()->name }}</b>.</p>
                        
                        <h4 style="font-weight: bold; margin-top: 20px; font-size: 16px;">Gestión ABM de Usuarios:</h4>
                        
                        <table style="width: 100%; border-collapse: collapse; margin-top: 10px; border: 1px solid #ddd;">
                            <thead>
                                <tr style="background-color: #f3f4f6; text-align: left;">
                                    <th style="padding: 10px; border: 1px solid #ddd;">ID</th>
                                    <th style="padding: 10px; border: 1px solid #ddd;">Nombre</th>
                                    <th style="padding: 10px; border: 1px solid #ddd;">Correo</th>
                                    <th style="padding: 10px; border: 1px solid #ddd;">Rol</th>
                                    <th style="padding: 10px; border: 1px solid #ddd; text-align: center;">Acciones (ABM)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($usuarios as $user)
                                <tr style="border-bottom: 1px solid #ddd;">
                                    <td style="padding: 10px; border: 1px solid #ddd;">{{ $user->id }}</td>
                                    <td style="padding: 10px; border: 1px solid #ddd;">{{ $user->name }}</td>
                                    <td style="padding: 10px; border: 1px solid #ddd;">{{ $user->email }}</td>
                                    <td style="padding: 10px; border: 1px solid #ddd; font-weight: bold; color: {{ $user->rol == 'admin' ? '#dc2626' : '#2563eb' }};">
                                        {{ $user->rol }}
                                    </td>
                                    <td style="padding: 10px; border: 1px solid #ddd; text-align: center;">
                                        <button style="background-color: #2563eb; color: white; padding: 4px 8px; border-radius: 4px; font-size: 12px; margin-right: 5px; border: none; cursor: pointer;">Editar</button>
                                        <button style="background-color: #dc2626; color: white; padding: 4px 8px; border-radius: 4px; font-size: 12px; border: none; cursor: pointer;">Eliminar</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <br>
                        <button style="background-color: #16a34a; color: white; padding: 8px 12px; border-radius: 4px; font-weight: bold; border: none; cursor: pointer;">+ Registrar Nuevo Usuario (Alta)</button>

                    {{-- VISTA USUARIO  --}}
                    @else
                        <h3 style="font-size: 20px; font-weight: bold; color: #2563eb; margin-bottom: 5px;">Perfil de Usuario </h3>
                        <p style="margin-bottom: 20px; color: #555;">Hola <b>{{ Auth::user()->name }}</b>, aquí puedes ver tus datos personales registrados en el sistema.</p>
                        
                        <div style="background-color: #f8fafc; padding: 20px; border-radius: 8px; border: 1px solid #e2e8f0; max-w: 400px;">
                            <p style="margin-bottom: 10px; font-size: 15px;"><b>Nombre Completo:</b> {{ Auth::user()->name }}</p>
                            <p style="margin-bottom: 10px; font-size: 15px;"><b>Correo Electrónico:</b> {{ Auth::user()->email }}</p>
                            <p style="margin-bottom: 0; font-size: 15px;"><b>Rol en el Sistema:</b> <span style="background-color: #dbeafe; color: #1e40af; padding: 3px 8px; border-radius: 4px; font-size: 13px; font-weight: bold;">{{ Auth::user()->rol }}</span></p>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>