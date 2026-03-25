<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Edit Product</title>
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

    <div class="topbar">
      <div>
        <h1 class="page-title">Edit Product</h1>
        <p class="page-sub">Review current details then update below</p>
      </div>
      <a href="{{route('products.index')}}" class="btn-outline">← Back to Products</a>
    </div>

    <div class="single-form">

      <!-- Current product details (read only display) -->
      <div class="form-card product-preview">
        <h2 class="card-title">Current Product Details</h2>
        <div class="preview-grid">
          <div class="preview-block">
            <span class="preview-label">Product Name</span>
            <span class="preview-value">{{ old('name', $product_fetched_to_edit->name)}}</span>
          </div>
          <div class="preview-block">
            <span class="preview-label">Category</span>
            <span class="preview-value">{{ old('category', $product_fetched_to_edit->category)}}</span>
          </div>
          <div class="preview-block">
            <span class="preview-label">Price</span>
            <span class="preview-value">{{ old('price', $product_fetched_to_edit->price)}}</span>
          </div>
          <div class="preview-block">
            <span class="preview-label">Stock</span>
            <span class="preview-value">{{ old('quantity', $product_fetched_to_edit->quantity)}}</span>
          </div>
          <div class="preview-block full-width">
            <span class="preview-label">Description</span>
            <span class="preview-value">{{ old('description', $product_fetched_to_edit->description)}}</span>
          </div>
        </div>
      </div>

      <!-- Edit banner -->
      <div class="edit-banner">
        ✏️ Make your changes below and click Save Edits when done.
      </div>

      <!-- Edit form -->
      <div class="form-card">
        <h2 class="card-title">Update Details</h2>
        <form action="{{route('products.update', $product_fetched_to_edit->id)}}" method="post">
            @csrf
            @method('PUT')

        <div class="field">
          <label>Product Name</label>
          <input type="text" name="name" value="{{ old('name', $product_fetched_to_edit->name)}}" />
        </div>

        <div class="field">
          <label>Description</label>
          <textarea name="description" rows="5" >{{ old('description', $product_fetched_to_edit->description)}}</textarea>
        </div>

        <div class="field-row">
          <div class="field">
            <label>Price (TSh)</label>
            <input type="number" name="price" value="{{ old('price', $product_fetched_to_edit->price)}}" />
          </div>
          <div class="field">
            <label>Stock Quantity</label>
            <input type="number" name="quantity" value="{{ old('quantity', $product_fetched_to_edit->quantity)}}" />
          </div>
        </div>

        <div class="field">
          <label>Category</label>
          <select name="category" >
            <option value="">Select category</option>
            <option value="electronics" {{ old('category', $product_fetched_to_edit->category) == 'electronics' ? 'selected' : ''}}>Electronics</option>
            <option value="food" {{ old('category', $product_fetched_to_edit->category)== 'food' ? 'selected' : ''}}>Food</option>
            <option value="clothing" {{ old('category', $product_fetched_to_edit->category)== 'clothing' ? 'selected' : ''}}>Clothing</option>
            <option value="furniture" {{ old('category', $product_fetched_to_edit->category)== 'furniture' ? 'selected' : ''}}>Furniture</option>
            <option value="other" {{ old('category', $product_fetched_to_edit->category)== 'other' ? 'selected' : ''}}>Other</option>
          </select>
        </div>

        <div class="form-actions">
          <a href="{{route('products.index')}}" class="btn-outline">Cancel</a>
          
            <button type="submit" class="btn-primary">Save Edits</button>
          
          
        </div>

      </div>
      </form>

      <!-- Danger zone -->
      <div class="form-card danger-card">
        <h2 class="card-title danger-title">Danger Zone</h2>
        <p class="danger-text">Deleting this product is permanent and cannot be undone.</p>
        <a href="#" class="btn-danger">Delete This Product</a>
      </div>

    </div>

  </main>

</body>
</html>