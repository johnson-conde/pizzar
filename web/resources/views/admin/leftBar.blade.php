<!-- LEFT SIDEBAR -->
		<div id="left-sidebar" class="left-sidebar ">
      <div class="sidebar-minified js-toggle-minified">
				<i class="fa fa-exchange"></i>
			</div>
			<!-- main-nav -->
			<div class="sidebar-scroll">
				<nav class="main-nav">
					<ul class="main-menu">
            <li  class="active">
              <a href="/pizzarias/dashboard">
                <i class="fa fa-dashboard fa-fw"></i>
                <span class="text">Painel de Contolo</span>
              </a>
            </li>
            @if (Auth::guard("pizzaria")->check())
              <li>
                  <a href="#" class="js-sub-menu-toggle">
                    <i class="fa fa-dashboard fa-fw"></i>
                    <span class="text">Produtos</span>
                    <i class="toggle-icon fa fa-angle-down"></i>
                  </a>
                  <ul class="sub-menu" role="menu">
                      <li>
                          <a href="{{ route('produtos.create.get') }}">Adicionar</a>
                      </li>
                      <li>
                          <a href="{{ route('produtos.index') }}">Ver Todos</a>
                      </li>
                  </ul>
              </li>
              <li>
                  <a href="#" class="js-sub-menu-toggle">
                    <i class="fa fa-dashboard fa-fw"></i>
                    <span class="text">Encomendas</span>
      							<i class="toggle-icon fa fa-angle-down"></i>
                  </a>
                  <ul class="sub-menu" role="menu">
                      <li>
                          <a href="{{ route('encomendas.index') }}">Ver Todas</a>
                      </li>
                  </ul>
              </li>
						<li>
							<a href="page-inbox.html">
								<i class="fa fa-envelope-o"></i>
								<span class="text">Inbox <span class="badge red-bg">32</span></span>
						  </a>
						</li>
						<li>
							<a href="page-inbox.html">
								<i class="fa fa-file-o"></i>
								<span class="text">Reportes </span>
							</a>
						</li>
					  @endif
					</ul>
				</nav>
				<!-- /main-nav -->
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
