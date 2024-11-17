{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<x-backpack::menu-item title="Products" icon="la la-store-alt" :link="backpack_url('product')" />
<x-backpack::menu-item title="Categories" icon="la la-braille" :link="backpack_url('category')" />
<x-backpack::menu-item title="Coupons" icon="la la-ticket-alt" :link="backpack_url('coupon')" />
<x-backpack::menu-item title="Bills" icon="la la-money-bill" :link="backpack_url('bill')" />
<x-backpack::menu-item title="Chat" icon="la la-comment-alt" :link="backpack_url('chat')" />
<x-backpack::menu-item title="Events" icon="la la-star-half-alt" :link="backpack_url('event')" />