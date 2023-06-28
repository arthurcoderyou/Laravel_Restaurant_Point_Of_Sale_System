
@php 
    $menu = DB::table('menus')->find($menuId);
@endphp

<td>
    <img src="{{ (!empty($menu->photo)) ? url('uploads/'.$menu->photo) : url('uploads/no_image.jpg') }}" alt="menu-photo" class="w-50" style="max-width:200px; min-width:100px;">
</td>
<td>{{ $menu->name }}</td>

<td><span style="font-weight: bold;" class="text-success">P</span> {{ $menu->price }}</td>

<td>{{ $menu->stocks }}</td>

<td class="">
    <h3>
    @if($menu->available)
        <span class="badge badge-light">available</span>
    @else
        <span class="badge badge-dark">unavailable</span>
    @endif
    </h3>
</td>

{{ $slot }}
