
 
 <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
 <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
 
 
 <link rel="stylesheet" href="css/style.css" />
 
 <?php
 session_start();
 
         include('delete.php'); 
         include('update.php');
         $totall = [];  
         $i = 0; 
         $total = 0;
         $totalcount = 0; 
         $app = new delete(); 
         $update = new update();
         $reqMethod = $_SERVER['REQUEST_METHOD'];
         if($reqMethod=='GET')
         {
             if (isset($_GET['action'])=='delete'){ 
                 $app->unsett($_GET['deleteid']);  
                                                      
             }
             else if (isset($_GET['actionn'])=='update'){ 
                 $update->update($_GET['updateid']);
             }
         }
        
 ?>
 
 <div class="maindiv">
     <div class="row">
         <div class="col-xs-8">
             <div class="panel panel-info">
                 <div class="panel-heading">
                     <div class="panel-title">
                         <div class="row">
                             <div class="col-xs-6">
                                 <h5><span class="glyphicon glyphicon-shopping-cart"></span> Sepetim </h5>
                             </div>
                             <div class="col-xs-6">
                                 <a href="productindex.php"<button type="submit" class="btn btn-primary btn-sm btn-block">
                                     <span class="glyphicon glyphicon-share-alt"></span> Alışverişe Devam Et
                                 </button></a>
                             </div>
                         </div>
                     </div>
                 </div>
                 <?php foreach($_SESSION['data'] as $data) 
            {    
                ?>
                 
                     <div class="row margin marginleft">
                         <div class="col-xs-2">
                         </div>
                         <div class="col-xs-4">
                             <h4 class="product-name"><strong><?php echo $data['product_name']; ?></strong></h4><h4><small><?php echo $data['product_currency']; ?></small></h4>
                         </div>
                         <div class="col-xs-6">
                             <div class="col-xs-6 text-right">
                                 <h5><strong><?php echo $data['product_price']; ?> <span class="text-muted">x</span></strong></h5>
                             </div>
                             <form action="Basket.php" method="GET">
                             <div class="col-xs-4">
                                 <input type="text" name='updatedata' class="form-control input-sm" value="<?php echo $data['product_count']; ?>">
                             </div>
                             <?php
                              $totall[$i]=$data['product_price'] * $data['product_count'];
                              ?>
                              <?php $totalcount = $totalcount + $data['product_count'];?>
                              <?php $total = $total + (float)$totall[$i];?>
                                 <?php $i++; ?>
                             <div class="margin col-xs-4">
                             
                             <input type="hidden" value='update' name='actionn'/>
                             <input type="hidden" name='updateid' value="<?php echo $data['product_id']; ?>"/>
                                </form>
                             </div>	
                             <div class="col-xs-2">
                             <form action="Basket.php" method="GET"> 
                                <input type="hidden" value="delete" name="action" /> 
                                <input name="deleteid" type="hidden" id="" value="<?php echo $data['product_id'];?>" />
                             </form>
                             </div>
                             
                         </div>
                     </div>
                     <hr>
                     <?php } ?>
                             </div>
                             <div class="col-xs-2">
                                 <button type="button" class="btn btn-link btn-xs">
                                     <span class="glyphicon glyphicon-trash"> </span>
                                 </button>
                             </div>
                         </div>
                     </div>
            <br>
                     </div>
                     </div>-->
                 <div class="panel-footer">
                     <div class="row text-center">
                         <div class="col-xs-8">
                             <h4 class="text-right">Genel Toplam : <strong><?php echo($total); ?></strong></h4>
                         </div>
                         <div class="col-xs-2">
                         <h4>Toplam Ürününüz :</h4> 
                         </div>
                         <div class="col-xs-1">
                         <button type="submit" class="inline btn btn-green"><h4><?php echo($totalcount); ?></h4>
                            
                          </button>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>