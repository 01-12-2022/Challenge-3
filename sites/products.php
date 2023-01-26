<div class="menu-box">

    <div class="container">

        <div class="row">

            <div class="col-lg-12">

                <div class="heading-title text-center">

                    <h2>Unsere Produkte</h2>

                    <p>Hier ist eine volle Auflistung unserer Produkte</p>

                </div>

            </div>

        </div>
		
        <div class="row">

            <div class="col-lg-12">

                <div class="special-menu text-center">

                    <div class="button-group filter-button-group">

                        <button class="active" data-filter="*">Alle</button>

                        <button data-filter=".1">Shirts</button>

                        <button data-filter=".2">Accessoires</button>

                        <button data-filter=".3">Jacken</button>

                    </div>

                </div>

            </div>

        </div>
        
        <script src="/js/main.js" type="text/javascript"></script>
        
        <div class="row special-list">
            <?php
				
            function getColorByStock($stock) {
            	if($stock < 5) {
            		return "red";
            	} else if($stock < 10) {
            		return "orange";
            	} else {
            		return "green";
            	}
            }
            
            	/**
            	 * load products from database
            	 */
            	
				$host = "localhost";
                $database = "tshitshop";
                $username = "itech";
                $password = "01122022";
                $port = 3306;
                
                // database connection using login data above
                $connection = new \mysqli($host, $username, $password, $database, $port);
                
                // if an error occoured, the error will be print on website
                if ($connection -> connect_errno) {
                	echo "Failed to connect to MySQL: " . $connection -> connect_error;
                	exit();
                }
                
                // sql statement
                $sql = "select item.itemID, item.itemName, item.itemDescription, item.itemPrice, item.itemCategorie, item.itemImage, item.itemBoxWidth, item.itemBoxHeight, item.itemHasSale, item.itemSalePrice, (SELECT currencySymbol FROM currencies WHERE currencyID = item.itemSaleCurrency) AS itemSaleCurrency, item.itemVisible, currencies.currencySymbol from item inner join currencies on item.itemCurrency = currencies.currencyId;";
                
                // get result from query of statement
                $result = $connection->query($sql);
				
                // close connection
               	

                #<img src='data:image/png;base64,'" .  $row['image'] . "' class='img-fluid' alt='Image'>
                # <img src='images/img-04.jpg' class='img-fluid' alt='Image'>
				
               	try {
               		while($entry = $result->fetch_assoc()) {
               			$itemId = $entry['itemID'];
               			$itemName = $entry['itemName']; // get name of product from database
               			$itemDescription = $entry['itemDescription']; // get description of product from database
               			$itemPrice = $entry['itemPrice']; // get price of product from database
               			
               			$currencySymbol = $entry['currencySymbol']; // get currency symbol from database, default '€'
               			
               			$itemCategorie = $entry['itemCategorie']; // filter option for types
               			
               			$itemImage = $entry['itemImage']; // product-image will be displayed on card
               			
               			$itemBoxWidth = $entry['itemBoxWidth']; // boxWidth
               			$itemBoxHeight = $entry['itemBoxHeight']; // boxHeight
               			
               			$itemHasSale = $entry['itemHasSale'];
               			$itemSalePrice = $entry['itemSalePrice'];
               			$itemSaleCurrency = $entry['itemSaleCurrency'];
               			$itemVisible = $entry['itemVisible'];
               			
               			if($itemVisible == 1) {
               			
               			?>
               			
               				<div style="border-radius: 15px;" class='col-lg-4 col-md-6 special-grid .<?php echo $itemCategorie; ?>'>
               					<div class='gallery-single fix'>
               						<img height='<?php echo $itemBoxHeight; ?>' width='<?php echo $itemBoxWidth; ?>px' src='data:image/png;base64,<?php echo $itemImage ?>' class='img-fluid' alt='Image'>
               						<?php 
               							if($itemHasSale == 1) {
               								echo '<img class="sale" src="images/sale.png">';
               							}
               						?>
               						<div class='why-text'>
               							<div class="item-row">
               								<div class="item-row">
               									<?php echo "<h4><a href='index.php?site=product&productId=" . $itemId . "'>" . $itemName . "</a></h4>"; ?>
               								</div>
               							</div>
               							<div class="item-row seperator col-description">
               								<?php 
               									if(strlen($itemDescription) > 92) {
               										$itemDescription = substr($itemDescription, 0, 80) . "...";
               									}
               									echo $itemDescription;
               									echo "<form method='get'>";
               									echo 	"<input type='hidden' name='site' value='product'></>";
               									echo 	"<input type='hidden' name='productId' value='" . $itemId . "'></>";
               									echo "</form>";
               									
               								?>
               							</div>
               							<div class="item-row">
               								<div class="item-cols">
               									<div class="item-col col-price">
               										
													<?php 
														if($itemHasSale == 1) {
															echo "<h5 style='color: red'>" . $itemSalePrice . " " . $itemSaleCurrency . "</h5>";
														} else {
															echo "<h5>" . $itemPrice . " " . $currencySymbol . "</h5>";	
														}
													?>
               									</div>
               									<div class="item-cols col-20 centered">
               										<?php
	               										$stmt_get_sizes = "select sizes.sizeID, sizeName, stock from sizes right join itemSize on sizes.sizeID = itemSize.sizeID where itemSize.itemID = " . $itemId . " order by sizeName;";
	               										
	               										$result_sizes = $connection->query($stmt_get_sizes);
	               										$count = 0;
	               										while($entry_size = $result_sizes->fetch_assoc()) {
	               											$sizeId = $entry_size['sizeID'];
	               											$sizeName = $entry_size['sizeName'];
	               											$stock = $entry_size['stock'];
	               											if($count == 0) {
	               												echo "<form method='get'><select name='size'>";
	               											}
	               											echo "<option style='color: " . getColorByStock($stock) . ";' value='" . $sizeId . "'>" . $sizeName . "</option>";
	               											$count++;
	               										}
	               										if($count != 0) {
	               											echo "</select></from>";
	               										}
               										?>
               									</div>
               									<div class="item-cols centered">
               										<form action="index.php">
               											<input class="buy-button" type="submit" value="In den Warenkorb">
               										</form>
               									</div>
               								
               								</div>
               							</div>
               							
               						</div>
               					</div>
               				</div>
						
               			<?php
               			}
               		}
               		
               	
                
                //echo "size: " . sizeof($items);
                
//                 foreach ($items as $item) {
//                 	echo $item->getName();
//                 	echo $item->getCard();
//                 }
                
               	} catch (Exception $ex) {
               		echo $ex->getTrace();
               	}
               	
               	$connection->close();
                
            ?>
        </div>

    </div>

</div>