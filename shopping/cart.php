<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>
<?php 

  $products = $conn->query("SELECT * FROM cart  WHERE user_id = '$_SESSION[user_id]'");
  $products->execute();

  $allProducts = $products->fetchAll(PDO::FETCH_OBJ);
  

?>
    <div class="row d-flex justify-content-center align-items-center h-100 mt-5 mt-5">
      <div class="col-12">
        <div class="card card-registration card-registration-2" style="border-radius: 15px;">
          <div class="card-body p-0">
            <div class="row g-0">
              <div class="col-lg-8">
                <div class="p-5">
                  <div class="d-flex justify-content-between align-items-center mb-5">
                    <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>
                    <h6 class="mb-0 text-muted">2 items</h6>
                  </div>


                  <table class="table" height="190" >
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">update</th>
                        <th scope="col"><a href="#" class="btn btn-danger text-white">Clear</a></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($allProducts as $product) : ?>
                      <tr class="mb-4">
                        <th scope="row">1</th>

                        <td><img width="100" height="100" src="../images/<?php echo $product->pro_image; ?>" class = "img-fluid rounded-3" alt="Cotton T-shirt">
                        </td>
                        <td><?php echo $product->pro_name; ?></td>
                        <td>$<?php echo $product->pro_price; ?></td>
                        <td><input id="form1" min="1" name="quantity" value="<?php echo $product->pro_amount; ?>" type="number"
                        class="form-control form-control-sm pro_amount" /></td>
                        <td><?php echo isset($product->pro_price) ? $product-> pro_price * $product->pro_amount : 'NqA'; ?></td>                        <td><a button class ="btn btn-warning text-white"><i class="fas fa-pen"></i> </button></td>
                        <td><a button class ="btn btn-danger text-white"><i class="fas fa-trash-alt"></i> </button></td>
                      </tr>
                      
                      <?php  endforeach; ?>

                    </tbody>
                  </table>
                  <a href="#" class="btn btn-success text-white"><i class="fas fa-arrow-left"></i>  Continue Shopping</a>
                </div>
              </div>
              <div class="col-lg-4 bg-grey">
                <div class="p-5">
                  <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                  <hr class="my-4">

                  

                  <div class="d-flex justify-content-between mb-5">
                    <h5 class="text-uppercase">Total price</h5>
                    <h5>€ 137.00</h5>
                  </div>

                  <button type="button" class="btn btn-dark btn-block btn-lg"
                    data-mdb-ripple-color="dark">Checkout</button>

                </div>
              </div>
            </div>
          </div>
        </div>
       
      </div>

    </div>
    <?php require "../includes/footer.php"; ?>  
    <script>
    $(document).ready(function() {
       
      $(".pro_amount").mouseup(function () {
                  
                  var $el = $(this).closest('tr');

        

                  var pro_amount = $el.find(".pro_amount").val();
                  var pro_price = $el.find(".pro_price").html();

                  var total = pro_amount * pro_price;
                  $el.find(".total_price").html("");        

                  $el.find(".total_price").append(total+'$');

                //  $(".btn-update").on('click', function(e) {

                //      var id = $(this).val();
                    

                //      $.ajax({
                //        type: "POST",
                //        url: "update-item.php",
                //        data: {
                //          update: "update",
                //          id: id,
                //          product_amount: pro_amount
                //        },

                //        success: function() {
                //          alert("done");
                //          reload();
                //        }
                //      })
                //    });
                 
                
         //  fetch();     
      });

    //   fetch();

    //   function fetch() {

    //     setInterval(function () {
    //              var sum = 0.0;
    //               $('.total_price').each(function()
    //               {
    //                  sum += parseFloat($(this).text());
    //              });
    //              $(".full_price").html(sum+"$");
    //    }, 4000);
    //  } 
      
    //   function reload()
    //   }
       {

       
            $("body").load("cart.php")
       
      }
    });
</script>


