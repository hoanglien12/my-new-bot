<ul class="nav" id="side-menu">
    @php 
        $segment = Request::segment(2);
    @endphp
    <li>
        <a href="{{ route('indexAdmin') }}" ><i class="fa fa-dashboard fa-fw"></i>Dashboard</a>
    </li>
    
    <li>
        <h4 class="dashboard">QUẢN TRỊ NỘI DUNG</h4>
    </li>
    <li>
        <a href="{{ route('site_config.index') }} " class="{{ ($segment == 'site-config') ? 'active' : '' }}" ><i class="fa fa-gear"></i>Site Config </a>
    </li>
    <li>
        <a href="{{ route('product_category.show') }}" class="{{ ($segment == 'product-category') ? 'active' : '' }}"><i class="fa fa-cube"></i>Product Category</a>
    </li>
    <li>
        <a href="{{ route('product.show') }}" class="{{ ($segment == 'product') ? 'active' : '' }}"><i class="fa fa-cubes"></i>Products</a>
    </li>
    <li>
        <a href="{{ route('dog_category.index') }}" class="{{ ($segment == 'dog-category') ? 'active' : '' }}"><i class="fa fa-object-group"></i>Dog Category</a>
    </li>
    <li>
        <a href="{{ route('dog.index') }}" class="{{ ($segment == 'dog') ? 'active' : '' }}"><i class="fa fa-object-ungroup"></i>Dogs</a>
    </li>
    <li>
        <a href="{{ route('order.index') }}" class="{{ ($segment == 'order') ? 'active' : '' }}"><i class="fa fa-shopping-cart"></i>Orders <span>({{ $orders_waiting }})</span></a>
    </li>
    <li>
        <a href="{{ route('post.index') }}" class="{{ ($segment == 'post') ? 'active' : '' }}"><i class="fa fa-file-text"></i>Posts</a>
    </li>
    <li>
        <a href="{{ route('user.index') }}" class="{{ ($segment == 'user') ? 'active' : '' }}"><i class="fa fa-users"></i></i>Users</a>
    </li>
    <li>
        <a href="{{ route('comment.index') }}" class="{{ ($segment == 'comment') ? 'active' : '' }}"><i class="fa fa-commenting"></i></i>Comments</a>
    </li>
    
</ul>

