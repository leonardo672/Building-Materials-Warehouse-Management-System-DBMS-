@extends('layout')

@section('content')

<!-- Main Card with Updated Styling -->
<div class="card shadow-lg rounded card-bg">
    <div class="card-header header-bg">
        <h2><i class="fa fa-list-alt"></i> Materials Management</h2>
    </div>

    <div class="card-body">
        <!-- Button to Add New Material -->
        <a href="{{ route('materials.create') }}" class="btn btn-add-user mb-3" title="Add New Material">
            <i class="fa fa-plus-circle" aria-hidden="true" style="margin-right: 5px;"></i> Add New Material
        </a>
        
        <!-- Materials Table -->
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Stock Quantity</th>
                        <th>Price Per Unit</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($materials as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->category->name }}</td> <!-- Assuming `category` is a relation -->
                            <td>{{ $item->stock_quantity }}</td>
                            <td>{{ number_format($item->price_per_unit, 2) }}</td> <!-- Formatted Price -->
                            <td>
                                <!-- View Button -->
                                <a href="{{ route('materials.show', $item->id) }}" title="View Material">
                                    <button class="btn btn-view btn-sm">
                                        <i class="fa fa-eye" aria-hidden="true"></i> View
                                    </button>
                                </a>

                                <!-- Edit Button -->
                                <a href="{{ route('materials.edit', $item->id) }}" title="Edit Material">
                                    <button class="btn btn-edit btn-sm">
                                        <i class="fa fa-pencil" aria-hidden="true"></i> Edit
                                    </button>
                                </a>

                                <!-- Delete Button -->
                                <form method="POST" action="{{ route('materials.destroy', $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-delete btn-sm" title="Delete Material" onclick="return confirm('Are you sure you want to delete this material?')">
                                        <i class="fa fa-trash" aria-hidden="true"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- CSS Styling -->
<style>
    /* General Styles for Buttons */
    .btn {
    font-size: 14px;
    padding: 12px 22px;
    margin: 8px 5px;
    border-radius: 30px; /* Rounded buttons */
    font-weight: 600;
    cursor: pointer;
    border: 2px solid transparent;
    outline: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    text-transform: uppercase;
    letter-spacing: 1px;
    position: relative;
    transition: all 0.4s ease-in-out;
}

/* Add New Transaction Button */
.btn-add-user {
    background-color: #416a5d; /* Base color */
    color: white;
    box-shadow: 0 6px 15px rgba(65, 106, 93, 0.2);
}

.btn-add-user:hover {
    background-color: #2a4a3d; /* Hover color */
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(42, 74, 61, 0.3);
}

/* View Button */
.btn-view {
    background-color: #2a4a3d; /* Base color */
    color: white;
    box-shadow: 0 6px 15px rgba(42, 74, 61, 0.2);
}

.btn-view:hover {
    background-color: #14301f; /* Hover color */
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(20, 48, 31, 0.3);
}

/* Edit Button */
.btn-edit {
    background-color: #14301f; /* Base color */
    color: white;
    box-shadow: 0 6px 15px rgba(20, 48, 31, 0.2);
}

.btn-edit:hover {
    background-color: #416a5d; /* Hover color */
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(65, 106, 93, 0.3);
}

/* Delete Button */
.btn-delete {
    background-color: #416a5d; /* Base color */
    color: white;
    box-shadow: 0 6px 15px rgba(65, 106, 93, 0.2);
}

.btn-delete:hover {
    background-color: #2a4a3d; /* Hover color */
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(42, 74, 61, 0.3);
}

/* Table Styling */
.table {
    width: 100%;
    margin-bottom: 1rem;
    background-color: transparent;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
}

.table-striped tbody tr:nth-child(odd) {
    background-color: #f9f9f9;
}

.table-hover tbody tr:hover {
    background-color: #f7d1d1; /* Light Red on hover */
    color: white;
    cursor: pointer;
}

.table th, .table td {
    padding: 12px;
    text-align: center;
    font-size: 1rem;
    color: #555;
    border-bottom: 2px solid #ddd;
}

.table th {
    background-color: #416a5d; /* Soft Cyan */
    color: white;
    text-transform: uppercase;
}

.table-responsive {
    overflow-x: auto;
}

/* Media Queries for Responsiveness */
@media (max-width: 768px) {
    .table th, .table td {
        font-size: 0.9rem;
        padding: 10px;
    }

    .btn {
        font-size: 12px;
        padding: 8px 16px;
    }
}
</style>
@endsection
