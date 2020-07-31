		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 95%;"><div class="sidebar-scroll" style="overflow: hidden; width: auto; height: 95%;">
				<nav>
					<ul class="nav">
                        <li><a href="{{ route('dashboard') }}"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
                        @if (Auth()->user()->role == 'pg')
                            <li>
							<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-layers"></i> <span>Barang</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages" class="collapse ">
								<ul class="nav">
									<li><a href="{{ route('pg.cb.index') }}" class="">Cek Barang</a></li>
									<li><a href="{{ route('pg.bm.index') }}" class="">Barang Masuk</a></li>
									<li><a href="{{ route('pg.bk.index') }}" class="">Barang Keluar</a></li>
									<li><a href="{{ route('pg.br.index') }}" class="">Request Barang</a></li>
								</ul>
							</div>
                        </li>
                        @elseif(Auth()->user()->role == 'admin')
                        <li><a href="{{ route('admin.supplier.index') }}" class=""><i class="lnr lnr-user"></i> <span>Supplier</span></a></li>
                        <li><a href="{{ route('admin.kategori.index') }}" class=""><i class="lnr lnr-list"></i> <span>Kategori</span></a></li>
                        <li><a href="{{ route('admin.pemesanan.index') }}" class=""><i class="lnr lnr-cart"></i> <span>Pemesanan</span></a></li>
                        <li><a href="{{ route('admin.br.index') }}" class=""><i class="lnr lnr-sync"></i> <span>Permintaan</span></a></li>
                        <li><a href="#" class=""><i class="lnr lnr-users"></i> <span>Pembelian</span></a></li>
                        @elseif(Auth()->user()->role == 'supplier')
                        <li><a href="{{ route('supplier.pesanan.index') }}" class=""><i class="lnr lnr-cart"></i> <span>Pesanan</span></a></li>
                        <li><a href="{{ route('supplier.produk.index') }}" class=""><i class="lnr lnr-dice"></i> <span>Produk</span></a></li>
                        @elseif(Auth()->user()->role == 'pemilik')
                        <li><a href="{{ route('pemilik.laporan.index') }}" class=""><i class="lnr lnr-file-empty"></i> <span>Laporan</span></a></li>
                        @endif
						{{-- <li><a href="elements.html" class=""><i class="lnr lnr-code"></i> <span>Elements</span></a></li>
						<li><a href="charts.html" class=""><i class="lnr lnr-chart-bars"></i> <span>Charts</span></a></li>
						<li><a href="panels.html" class=""><i class="lnr lnr-cog"></i> <span>Panels</span></a></li>
						<li><a href="notifications.html" class=""><i class="lnr lnr-alarm"></i> <span>Notifications</span></a></li>
						<li>
							<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Pages</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages" class="collapse ">
								<ul class="nav">
									<li><a href="page-profile.html" class="">Profile</a></li>
									<li><a href="page-login.html" class="">Login</a></li>
									<li><a href="page-lockscreen.html" class="">Lockscreen</a></li>
								</ul>
							</div>
                        </li>
						<li><a href="tables.html" class=""><i class="lnr lnr-dice"></i> <span>Tables</span></a></li>
						<li><a href="typography.html" class=""><i class="lnr lnr-text-format"></i> <span>Typography</span></a></li>
						<li><a href="icons.html" class=""><i class="lnr lnr-linearicons"></i> <span>Icons</span></a></li> --}}
					</ul>
				</nav>
			</div><div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 761px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
		</div>
		<!-- END LEFT SIDEBAR -->
