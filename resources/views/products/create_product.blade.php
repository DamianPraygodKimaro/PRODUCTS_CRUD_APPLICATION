<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Add Product</title>
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
      <a href="{{route('products.index')}}" class="nav-item">
        <span class="nav-icon">▦</span> Products
      </a>
      <a href="{{route('products.create')}}" class="nav-item active">
        <span class="nav-icon">＋</span> Add Product
      </a>
    </nav>
    <div class="sidebar-footer">Logged in as Admin</div>
  </aside>

  <!-- Main -->
  <main class="main">
    

    <div class="topbar">
      <div>
        <h1 class="page-title">Add New Product</h1>
        <p class="page-sub">Fill in the details to create a new product</p>
      </div>
      <a href="{{route('products.index')}}" class="btn-outline">← Back to Products</a>
    </div>

    <div class="single-form">
      <div class="form-card">
        <h2 class="card-title">Product Information</h2>
         <form action="{{route('products.store')}}" method="post">
    @csrf

        <div class="field">
          <label>Product Name</label>
          <input type="text" name="name" placeholder="e.g. Samsung TV 55 inch" />
        </div>

        <div class="field">
          <label>Description</label>
          <textarea name="description" rows="5" placeholder="Describe the product..."></textarea>
        </div>

        <div class="field-row">
          <div class="field">
            <label>Price (TSh)</label>
            <input type="number" name="price" placeholder="e.g. 1200000" />
          </div>
          <div class="field">
            <label>Stock Quantity</label>
            <input type="number" name="quantity" placeholder="e.g. 50" />
          </div>
        </div>

        <div class="field">
          <label>Category</label>
          <select name="category">
            <option value="">Select category</option>
            <option value="electronics">Electronics</option>
            <option value="food">Food</option>
            <option value="clothing">Clothing</option>
            <option value="furniture">Furniture</option>
            <option value="other">Other</option>
          </select>
        </div>

        <div class="field">
          <label>Product Image</label>
          <div class="image-upload-box">
            <div class="upload-icon">📷</div>
            <p>Click to upload product image</p>
            <span>JPG, PNG up to 2MB</span>
            <input type="file" name="image" accept="image/*" />
          </div>
        </div>

        <div class="form-actions">
          <a href="{{route('products.index')}}" class="btn-outline">Cancel</a>
         
   
    <button type="submit" class="btn-primary">Save Product</button>
</form>
        </div>

      </div>
    </div>

  </main>

</body>
</html>
