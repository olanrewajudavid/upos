<div class="well sidebar-nav">
                     <ul class="nav nav-list">
              <li class="dashboard"><a href="index.php"><i class="icon-dashboard icon-2x"></i> Dashboard </a></li> 
			<li class="sales"><a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>"><i class="icon-shopping-cart icon-2x"></i> Enter Sales</a>  </li>             
			<li class="products"><a href="products.php"><i class="icon-list-alt icon-2x"></i> Products</a>                                     </li>
			<li class="customers"><a href="customer.php"><i class="icon-group icon-2x"></i> Customers</a>                                    </li>
            <?php 
				$grant=$_SESSION['SESS_GRANT_ACCESS'];
				 if($grant ==='2') {?>
			<li class="suppliers"><a href="supplier.php"><i class="icon-group icon-2x"></i> Suppliers</a>                                    </li>
			<!--<li class="sales-report"><a href="salesreport.php?d1=0&d2=0"><i class="icon-bar-chart icon-2x"></i> Sales Report</a>                </li>-->
            <li class="sales-inventory"><a href="sales_inventory2.php"><i class="icon-table icon-2x"></i> Sales Inventory</a>                </li>
            <?php } ?>
			<br><br><br><br><br><br>		
			<li>
			 <div class="hero-unit-clock">
		
			<form name="clock">
			<font color="white">Time: <br></font>&nbsp;<input style="width:160px; background-color:#da4f49 !important; color:#fff !important; font-size:22px; border:none !important" type="button" class="trans" name="face" value="" >
			</form>
			  </div>
			</li>
				</ul>                               
          </div>