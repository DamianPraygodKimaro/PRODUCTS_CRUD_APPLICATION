<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Products Dashboard</title>
  @vite('resources/css/app.css')
  @vite('resources/js/app.js')
  <link rel="stylesheet" href="style.css" />
</head>
<body>

  <!-- Sidebar -->
  <aside class="sidebar">
    <div class="sidebar-logo">
      <span class="logo-dot"></span>
      <span>StoreHub</span>
    </div>
    <nav class="sidebar-nav">
      <a href="{{route('products.index')}}" class="nav-item active">
        <span class="nav-icon">▦</span> Products
      </a>
      <a href="{{route('products.create')}}" class="nav-item">
        <span class="nav-icon">＋</span> Add Product
      </a>
    </nav>
    <div class="sidebar-footer">Logged in as Admin</div>
  </aside>

  <!-- Main -->
  <main class="main">
    
      @if(session('success'))
    <div class="flash-success">
        <span class="flash-icon">✓</span>
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="flash-error">
        <span class="flash-icon">✕</span>
        {{ session('error') }}
    </div>
@endif

    <div class="topbar">
      <div>
        <h1 class="page-title">All Products</h1>
        <p class="page-sub">Manage your product inventory</p>
      </div>

      



      <a href="{{route('products.create')}}" class="btn-primary">+ Add Product</a>
    </div>

    <!-- Empty state -->
    <div class="empty-state">

    @if($stored_products_from_db->count() > 0)

     <table class="product-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price (TSh)</th>
                <th>Quantity</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($stored_products_from_db as $index => $product)
            <tr>
                <td>{{$index + 1}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->description}}</td>
                <td>{{number_format($product->price)}} </td>
                <td>{{$product->quantity}}</td>
                <td>{{$product->category}}</td>
                <td>
                    <div class="action-btns">
                    <a href="{{route('products.edit' , $product->id)}}" class="btn-edit">Edit</a>
                    <form action="{{route('products.destroy' , $product->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete">Delete</button>
                    </form>
                </div>
               </td>
            </tr>
            @endforeach
</tbody>
</table>
@else



      <div class="empty-icon">📦</div>
      <h2>No products yet</h2>
      <p>Once you add products, your inventory stats and product list will appear here.</p>
      <a href="{{route('products.create')}}" class="btn-primary">+ Add Your First Product</a>
       @endif
    </div>
   

  </main>

</body>
</html>