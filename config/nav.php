<!-- WEBSITE OPERATED BY NEFFTZY.DEV | TELEGRAM : @zeccto -->
<body class="header-dark sidebar-dark">
<div class="header" style="background:<?=$bentancoder['color'];?>">
		<div class="header-left">
			<div class="menu-icon dw dw-menu"></div>
			<div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
			<div class="header-search" style="background:<?=$bentancoder['color'];?>">
                <form action="/" method="post">
					<div class="form-group mb-0">
						<i class="dw dw-search2 search-icon"></i>
						<input type="text" class="form-control search-input" placeholder="Search Here">
						<div class="dropdown">
							<a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
								<i class="ion-arrow-down-c"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<div class="form-group row">
									<label class="col-sm-12 col-md-2 col-form-label">From</label>
									<div class="col-sm-12 col-md-10">
										<input class="form-control form-control-sm form-control-line" type="text">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-12 col-md-2 col-form-label">To</label>
									<div class="col-sm-12 col-md-10">
										<input class="form-control form-control-sm form-control-line" type="text">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-12 col-md-2 col-form-label">Subject</label>
									<div class="col-sm-12 col-md-10">
										<input class="form-control form-control-sm form-control-line" type="text">
									</div>
								</div>
								<div class="text-right">
									<button class="btn btn-primary">Search</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="header-right">
			<div class="dashboard-setting user-notification">
				<div class="dropdown">
					<a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
						<i class="dw dw-settings2"></i>
					</a>
				</div>
			</div>
			<div class="user-notification">
				<div class="dropdown">
					<a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
						<i class="icon-copy dw dw-notification"></i>
						<span class="badge notification-active"></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<div class="notification-list mx-h-350 customscroll">
							<ul>
								
								<li>
									<a href="#">
										<img src="https://telegra.ph/file/dea0538d264a1456821a1.jpg" alt="Nefftzy">
										<h3>Ditzzy</h3>
										<p>Welcome to <?=$bentancoder['ten_web'];?></p>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			
				<?php if(!isset($_SESSION['username'])){ ?>
			<div class="user-info-dropdown">
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span class="user-icon">
							<img src="https://telegra.ph/file/dea0538d264a1456821a1.jpg" alt="">
						</span>
						<span class="user-name">Guest</span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
						<a class="dropdown-item" href="/login"><i class="dw dw-user1"></i> Login</a>
						<a class="dropdown-item" href="/reg"><i class="micon dw dw-add-user"></i> Register</a>
					</div>
				</div>
			</div>
			<?php }else{ ?>
			<div class="user-info-dropdown">
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span class="user-icon">
							<img src="https://telegra.ph/file/dea0538d264a1456821a1.jpg" alt="">
						</span>
						<span class="user-name"><?=$username;?></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
						<a class="dropdown-item" href="/profile"><i class="dw dw-user1"></i> Profile</a>
						<a class="dropdown-item" href="/logout"><i class="dw dw-logout"></i> Logout</a>
					</div>
				</div>
			</div>
			<?php } ?>
			<div class="github-link">
				<a href="https://nefftzy.dev" target="_blank"><img src="/assets/vendors/images/github.svg" alt=""></a>
			</div>
		</div>
	</div>


	<div class="left-side-bar" style="background:<?=$bentancoder['color'];?>">
		<div class="brand-logo">
				<a href="/">
                    <h3 class="mtext text-center text-uppercase text-light"><b><?=$bentancoder['ten_web'];?></b></h3>
                  
          
				</a>
		
			<div class="close-sidebar" data-toggle="left-sidebar-close">
				<i class="ion-close-round"></i>
			</div>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
                    <?php if(!isset($_SESSION['username'])){ ?>
                    <li>
                        <a href="login" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-user1"></span><span class="mtext">Login</span>
                        </a>
                    </li>
                    <li>
                        <a href="reg" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-add-user"></span><span class="mtext">Register</span>
                        </a>
                    </li>
                    <?php }else{ ?>
                    <li>
                        <a class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-money-2"></span><span class="mtext">Balance : <b>Rp. <?=number_format($user['money']);?></b></span>
                        </a>
                    </li>
                     
                    <?php } ?>
                    
                                        <li>
                        <div class="dropdown-divider"></div>
                    </li>
					<li>
						<a href="/" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-house-1"></span><span class="mtext">Customer Page</span>
						</a>
					</li>
					
					<?php if($bentancoder['trangthaimua'] == '0'){ ?>    
			<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-computer-1"></span><span class="mtext">Hosting Service</span>
						</a>
						<ul class="submenu">
						    <?php if($bentancoder['status_muahost'] == 'ON'){ ?>	
							<li><a href="/host">Order Hosting</a></li>
							<?php } ?>
							<li><a href="/quan-ly-host">Hosting Management</a></li>
												</ul>
					</li>
<?php } ?>
	
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-browser"></span><span class="mtext">Source Code Store</span>
						</a>
						<ul class="submenu">
							
							<li><a href="/kho-code-web">Order Source Code</a></li>
							<li><a href="/quan-ly-code">Code Management</a></li>
							
					
							
						</ul>
					</li>
					
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-money"></span><span class="mtext">Recharge</span>
						</a>
						<ul class="submenu">
							<li><a href="/napatm">Top Up With ATM, E-Wallet</a></li>
						</ul>
					</li>
					
				
			   <?php if($user['level'] == '810'){ ?>
                    <li>
                        <a href="/admin" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-settings2"></span>
                            <span class="mtext">Admin</span>
                        </a>
                    </li>
	<?php
					}
					?>
                </ul>
            </div>
        </div>
    </div>
   
	<div class="mobile-menu-overlay"></div>
	<!-- WEBSITE OPERATED BY NEFFTZY.DEV | TELEGRAM : @zeccto -->
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>