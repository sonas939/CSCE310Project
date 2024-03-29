<!--Written by Sona Shah-->

<?php
    //displays each item on order page
    function component($productname, $productdesc, $productprice, $productid) {
        $element= '
        <div class="col-md-3 col-sm-6 my-3 my-md-0">
                    <form action="order.php" method="post">
                        <div class="card shadow">
                            <div class="card-body">
                                <h5 class="cart-title">'.$productname.'</h5>
                                <p class="card-text">'.$productdesc.'</p>
                                <h5>
                                    <span class="price">'.'$'.$productprice.'</span> 
                                </h5>
                                <button type="submit" class="btn btn-warning my-3"  name="add">Add to Cart<i class="fas fa-shopping-cart"></i></button>
                                <input type="hidden" name="product_id" value='.$productid.'>
                            </div>
                        </div>
                    </form>
                </div>
        ';
        echo $element;
    }

    //displays each item in cart
    function cartElement($productname,$productprice,$productdesc,$productid,$quantity) {
        $element = '<form action="cart.php?action=remove&id='.$productid.'" method="post" class="cart-items">
                            <div class="border rounded">
                                <div class="row bg-white">
                                    <div class="col-md-3">
                                        <h5 class="pt-2">'.$productname.'</h5>
                                        <h5 class="pt-2">'.'$'.$productprice.'</h5>
                                    </div> 
                                    <div class="col-md-3">
                                        <h6 class="pt-4">'.$productdesc.'</h6>
                                    </div>
                                    <div class="col-md-3 py-5">
                                        <input type="text" value="'.$quantity.'" class="form-control w-25 d-inline">
                                        <button type="submit" class="btn btn-danger mx-2" name="remove">Remove</button>
                                    </div>
                                </div>
                            </div>
                        </form>';
        echo $element;
    }

    function validateDate($date, $format = 'Y-m-d'){
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) === $date;
    }

    function isTimeValid($time) {
        return is_object(DateTime::createFromFormat('h:i a', $time));
    }
?>
<!--End code from Sona Shah-->