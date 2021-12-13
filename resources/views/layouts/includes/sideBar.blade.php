<nav class="active" id="sidebar">
    <ul class="list-unstyled lead">
        <li class="active">
            <a href=""><i class="fa fa-home fa-lg"></i>หน้าหลัก</a>
        </li>
        <li>
            <a href="{{route('orders')}}"><i class="fa fa-box fa-lg"></i> ออเดอร์</a>
        </li>
        <li>
            <a href="{{route('transactions.index')}}"><i class="fa fa-money-bill fa-lg"></i> การซื้อขาย</a>
        </li>
        <li>
            <a href="{{route('products')}}"><i class="fa fa-truck fa-lg"></i> สินค้า</a>
        </li>
    </ul>
</nav>


<style>
    #sidebar ul.lead {
        border-bottom: 1px solid #29C2C9;
        width: fit-content;
    }

    #sidebar ul li a {
        padding: 10px;
        font-size: 1.1em;
        display: block;
        width: 30vh;
        color: #29C2C9;
        text-decoration: none;
    }

    #sidebar ul li a:hover {

        color: #fff;
        background: #29C2C9;
        text-decoration: none !important;


    }

    #sidebar ul li a i {
        margin-right: 10px;
    }

    #sidebar ul li.active>a,
    a[aria-expanded="true"] {
        color: #fff;
        background: #29C2C9;
    }

    
</style>