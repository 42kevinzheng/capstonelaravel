@extends('layouts.main')

@section('content')
  <ol class="breadcrumb">
  	<li class="breadcrumb-item"><a href="/inventoryitems">Inventory Items</a></li>
  </ol>
  <div class="card">
  	<div class="card-header">Inventory Items</div>
  	<div class="card-body">
      <table class="table table-bordered" id="selectTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Name</th>
            <th>Type</th>
            <th>Price</th>
            <th>Count</th>
            <th>Description</th>
            @can('view', App\InventoryItem::class)
              <th></th>
            @endcan
          </tr>
        </thead>
        <tbody>
          @foreach ($items as $item)
            <tr>
              <td>{{ $item->name }}</td>
              <td>{{ DB::table('inventory_types')->where('id', $item->inventory_type_id)->value('name') }}</td>
              <td>{{ $item->price }}</td>
              <td>{{ $item->count }}</td>
              <td>{{ $item->description }}</td>
              @can('view', App\InventoryItem::class)
                <td><a class="btn btn-primary">Select</a></td>
              @endcan
            </tr>
          @endforeach
        </tbody>
      </table>
  	</div>
  </div>
@endsection

@section('additional')
  <script>
    $(document).ready( function () {
        $('#selectTable').DataTable({

        });
    });
  </script>
@endsection
