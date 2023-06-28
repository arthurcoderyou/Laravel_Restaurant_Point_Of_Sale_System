

<form action="/admin/menu/add_to_cart" method="post">
    @csrf

    <input type="hidden" name="menu_id" value="{{ $menuId }}">

    @auth
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
    @else
        <input type="hidden" name="user_id" value="2">
    @endauth

    <button type="submit" class="btn btn-{{ ($menuAvailable) ? 'warning' : 'dark disabled' }}" {{ ($menuAvailable) ? '' : 'disabled' }} data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Cart">
        <i class="zmdi zmdi-shopping-cart"></i>
    </button>
</form>  