@extends('layout')

@section('content')
    <div class="col-span-3">
        <div class="h-16 w-16 bg-red-50 dark:bg-red-800/20 flex items-center justify-center rounded-full">
            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <path d="M7 8H21M7 12H21M7 16H21M3 8H3.01M3 12H3.01M3 16H3.01" stroke="#ef4444" stroke-width="2"
                          stroke-linecap="round" stroke-linejoin="round"></path>
                </g>
            </svg>
        </div>
        <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Trucks List</h2>
        <p>Explore our comprehensive Trucks List, where we showcase a diverse range of powerful and reliable trucks
            designed to meet various needs. From heavy-duty workhorses built for rugged terrain to versatile pickups
            ideal for everyday use, our curated list features top-notch models from leading manufacturers
        </p>
        @if ($message = Session::get('success'))
            <div class="alert-success mt-16">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="mt-16 text-center">
            <thead>
            <th>Unit number</th>
            <th>Year</th>
            <th>Notes</th>
            <th>Created</th>
            <th>Action</th>
            </thead>
            <body>
            @forelse($trucks as $truck)
                <tr>
                    <td>{{ $truck->unit_number }}</td>
                    <td>{{ $truck->year }}</td>
                    <td>{{ Str::limit($truck->notes, 20, '...') }}</td>
                    <td>{{ $truck->created_at->format('d-m-Y') }}</td>
                    <td class="action-column">
                        <a href="{{ route('trucks.edit', ['truck' => $truck]) }}" class="edit-button">Edit</a>
                        <form action="{{ route('trucks.destroy', $truck) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td>There is no trucks, you can create it <a href="{{ route('trucks.create') }}" class="color-red">here</a></td>
                </tr>
            @endforelse
            </body>
        </table>
        {{ $trucks->links() }}
    </div>
    <div class="col-span-3 mt-16" style="display:flex;justify-content:space-between">
        <a href="{{ route('home') }}" class="color-red">Back</a>
    </div>
@endsection

<style>
    table {
        width: 100%;
        & tr {
            border: 1px solid #d5d5d5;
        }
        & td.action-column {
            display: flex;
            justify-content: space-around;
            & .edit-button {
                color: green;
            }
            & .delete-button {
                color: red;
            }
        }
    }
    nav {
        display: flex;
        justify-content: space-between;

        & a.relative {
            padding-left: 10px;
        }
    }
    form {
        padding: 0;
        margin: 0;
    }
    .alert-success {
        background-color: #b2f0b2;
        border-radius: 3px;
        color: green;
    }
</style>
