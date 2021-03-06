		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
		    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 95%;">
		        <div class="sidebar-scroll" style="overflow: hidden; width: auto; height: 95%;">
		            <nav>
		                <ul class="nav">
                            <li><a href="{{ route('dashboard') }}"><i class="lnr lnr-home"></i> <span>Dashboard</span></a>
                            @if (Auth()->User()->role == 'admin')
                                <li><a href="{{ route('user.index') }}"><i class="lnr lnr-users"></i> <span>Users</span></a>
                                <li><a href="{{ route('kategori.index') }}" class=""><i class="lnr lnr-list"></i><span>Kategori</span></a></li>
                                <li><a href="{{ route('produk.index') }}" class=""><i class="lnr lnr-dice"></i><span>Produk</span></a></li>
                            @elseif(Auth()->User()->role == 'pg')
                                <li>
		                            <a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-layers"></i><span>Barang</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
		                            <div id="subPages" class="collapse ">
		                                <ul class="nav">
		                                    <li><a href="{{ route('barang.cek') }}" class="">Cek Barang</a></li>
		                                    <li><a href="{{ route('barang.masuk') }}" class="">Barang Masuk</a></li>
		                                    <li><a href="{{ route('barang.index') }}" class="">Request Barang</a></li>
		                                </ul>
		                            </div>
                                </li>
                            @elseif(Auth()->user()->role == 'pc')
		                    <li><a href="{{ route('permintaan.index') }}" class=""><i class="lnr lnr-cart"></i><span>Order</span></a></li>
                            <li><a href="{{ route('supplier.index') }}" class=""><i class="lnr lnr-user"></i><span>Supplier</span></a></li>
                            <li><a href="{{ route('pengembalian.barang') }}" class=""><i class="lnr lnr-undo"></i><span>Pengembalian</span></a></li>
                            @elseif(Auth()->user()->role == 'pemilik')
                                <li><a href="{{ route('pemilik.laporan') }}" class=""><i class="lnr lnr-file-empty"></i><span>Laporan</span></a></li>
                            @endif
		                </ul>
		            </nav>
		        </div>
		        <div class="slimScrollBar"
		            style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 761px;">
		        </div>
		        <div class="slimScrollRail"
		            style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;">
		        </div>
		    </div>
		</div>
		<!-- END LEFT SIDEBAR -->
