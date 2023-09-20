<?php

    // use this on my admin side product.php

/**
 * Check if a value exists in a column of a table
 *
 * @param mysqli $conn The database connection object
 * @param string $value The value to check
 * @param string $column The column name to check
 * @param string $table The table name to check
 * @return bool Returns true if the value exists in the column, false otherwise
 */
function is_existing(mysqli $conn, string $value, string $column, string $table): bool
{
    $value = mysqli_real_escape_string($conn, $value);
    $column = mysqli_real_escape_string($conn, $column);
    $table = mysqli_real_escape_string($conn, $table);

    $query = "SELECT COUNT(*) AS count FROM $table WHERE $column = '$value'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return ($row['count'] > 0);
    }

    return false;
}

function count_cart_items($conn, $user) {
    $sql = "SELECT COUNT(ORDER_ID) as cart FROM orders WHERE order_status='X' and user_id = ? ";
    $res = query($conn, $sql, array($user));
    foreach($res as $r){
        return $r['cart'];
    }
}

//this is to check if the user is logged. if not, it will be redirected to specific $location.
//@param $usertype = array('A','D')
function session_check($usertype, $loc){
    if(isset($_SESSION['user']['user_type'] )){
        if(!in_array($_SESSION['user']['user_type'], $usertype) ){
           header("location: $loc ");
        //   exit();
        }
    }
    else{
          header("location: $loc");
          // exit();
    }
}



// function encrypt_password($password, $salt ) {
//     $hash = hash('sha256', $password . $salt);
//     return $hash;
// }
// function verify_password($password, $hash, $salt) {
 
//     $hash_to_verify = hash('sha256', $password . $salt);
//     return $hash_to_verify === $hash;
// } 

//This function takes in a password and a hash (which would be retrieved from a database or other storage), adds the same salt string as the encryption function, and generates a hash using the SHA256 algorithm. It then compares this hash to the original hash, and returns true if they match, indicating that the password is correct.

function gen_private_key($len){
    $alpha_num=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','0','1','2','3','4','5','6','7','8','9','0');
    $key="";
    for ($i = 0; $i <= $len; $i++){
        if($i%2 == 0 && $i > 0){
           $key .= $alpha_num[rand(0,52)];
        }
        else{
             $key .= $alpha_num[rand(53,62)];
        }
     }
    return $key;
}
function gen_order_ref_number($len){
    $alpha_num=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','0','1','2','3','4','5','6','7','8','9','0');
    $key="";
    for ($i = 0; $i <= $len; $i++){
        if($i%2 == 0 && $i > 0){
           $key .= $alpha_num[rand(0,25)];
        }
        else{
             $key .= $alpha_num[rand(26,sizeof($alpha_num)-1)];
        }
     }
    return $key;
}

//function ni master edma
function display_tables($conn, $user, $status, $list, $loc) {
    $filter = '';
    if(!empty($list)) {
        $filter = "AND ";
        $count = 0;
        foreach($list as $value) {
            if($count == 0) {
                $filter .= "reservation_id = '$value'";
                $count++;
            } else {
                $filter .= " OR reservation_id = '$value'";
            }
        }
    }
    $user_filter = "AND u.user_id = '$user'";
    if(isset($_SESSION['user_type'])) {
        $user_type = $_SESSION['user_type'];
    }
    if($user_type == 'A') {
        $user_filter = '';
    }
        $sql = "SELECT i.item_id, 
                c.cat_id,
                u.user_id,
                p.price_id, 
                s.size_id,
                i.item_name, 
                i.item_file, 
                c.cat_file, 
                r.item_quantity, 
                r.order_ref_number AS order_ref_number, 
                (p.item_price * r.item_quantity) AS subtotal
                FROM reservation r
                JOIN user u ON r.user_id = u.user_id
                JOIN item i ON i.item_id = r.item_id
                JOIN category c ON c.cat_id = r.cat_id
                JOIN sizes s ON s.size_id = r.size_id
                JOIN price p ON p.price_id = r.price_id
                WHERE i.item_stats != 'I'
                AND c.cat_stats != 'I'
                AND u.user_stats != 'I'
                $user_filter 
                AND r.order_status = '$status'
                $filter";

    $result = query($conn, $sql);
    
    if(!empty($result)) {
        $start = "SELECT DISTINCT order_ref_number
                  FROM (";
        $end = ") AS customer_orders
                ORDER BY date_ordered";

        $ref_num_sql = "$start
                        $sql
                        $end";
        $ref_num_result = query($conn, $ref_num_sql);

        foreach($ref_num_result as $key => $row) {
            $ref_num = $row['order_ref_number'];
            //if confirmation
            if($list != '') {
                do {
                    $new_ref_num = gen_order_ref_num(16);
                } while($new_ref_num == $ref_num);
                $ref_num = $new_ref_num;
            }
            
            echo "
                <div class='row'>"; 
                //if not cart
            if($status != 'C' || $list != '') {
                if($ref_num != '') {
                    echo "
                    <div class='input-group mt-3 mb-1'>
                        <div class='input-group-prepend bg-warning '>
                            <span class='input-group-text' 
                                  id='ref_num'
                                  style='line-height: 30px;
                                         //background-color: #311C09;
                                         color: white;
                                         border-radius: 5px 0 0 5px;
                                         //border-color: #311C09;'>
                                Reference Number:
                            </span>
                        </div>
                        <input name='reference_number'
                               id='reference_number'
                               type='text'
                               value='" . $ref_num . "'
                               readonly='readonly'
                               class='form-control bg-warning'
                               style='float: right;
                                      //background-color: #FFEFC1;
                                      font-family: 'helvetica', sans-serif;
                                      font-size: 19px;
                                      padding-left: 14px;
                                      border-radius: 0 5px 5px 0;
                                      //border-color: #311C09;'
                               aria-describedby='ref_num'>
                    </div>";
                }
            }
            if($status == 'C' || $ref_num != '') {
                echo "
                    <table class='table'>
                        <thead valign='middle'>";
            //if cart
                if($status == 'C' && $list == '') {
                    echo "
                            <th></th>";
                }
                if($loc != "products") {
                    echo "
                            <th colspan='2'>";
                } else {
                    echo "
                            <th>";
                }
                echo "
                                Item Name
                            </th> 
                            <th>Category Name</th> 
                            <th>Size</th> 
                            <th>Price</th> 
                            <th>Item Quantity</th> 
                            <th>Subtotal</th>
                        </thead>";
            //if not cart and confirmation
                if($status != 'C') {
                    $start = "SELECT DISTINCT order_id,
                                              item_name,
                                              cat_file,
                                              item_price,
                                              item_quantity,
                                              subtotal
                              FROM (";
                    $end = ") AS customer_orders
                            WHERE order_ref_num = '$ref_num'";

                    $ref_num_orders_sql = "$start
                                           $sql
                                           $end";
                    $result = query($conn, $ref_num_orders_sql);
                }
                $total = 0;
            
                foreach($result as $key => $row) {
                    $reservation_id = $row['reservation_id'];
                    $cat_file = $row['cat_file'];
                    $item_name = $row['item_name'];
                    $item_price = $row['item_price'];
                    $item_quantity = $row['item_quantity'];
                    $subtotal = $row['subtotal'];

                    echo "
                        <tr valign='middle'>
                            <input name='reservation_id[]'
                                   id='" . $reservation_id . "'
                                   type='text'
                                   value='" . $reservation_id . "'
                                   hidden
                                   class='form-control'>";
                    //if cart
                    // if($status == 'C' && $list == '') {
                    //     echo "
                    //         <td>
                    //             <input name='checklist[]'
                    //                    type='checkbox'
                    //                    value='" . $order_id . "'
                    //                    class='table-data'>
                    //         </td>";
                    // }
                    if($loc != "products") {
                        echo "
                            <td>
                                <img src='" . $item_imgdir . "'
                                     width='60px'
                                     height='auto'>
                            </td>";
                    } 
                    echo "
                            <td class='table-data'>" . $item_name . "</td>
                            <td class='table-data'>
                                ₱" . $item_price . "
                            </td>
                            <td class='table-data'>" . $order_qty . "</td>
                            <td class='table-data'>
                                ₱" . number_format($subtotal, 2, '.', ',') . "
                            </td>
                        </tr>";
                    $total += $subtotal;
                }
                $total = number_format($total, 2, '.', ',');
                
                echo "
                        <tr valign='middle'>
                            <td colspan='4'
                                style='text-align: left;'>";
                
                $subloc = '';
                switch($user_type) {
                    case 'C':
                        switch ($status) {
                            case 'C':
                                if($filter == '') {
                                    $rbtn = 'Delete';
                                    $gbtn = 'Checkout';
                                } else {
                                    $rbtn = 'Cancel';
                                    $gbtn = 'Confirm';
                                }
                                break;
                            case 'P':
                                $rbtn = 'Cancel';
                                break;
                        }
                        break;
                    case 'A':
                        switch ($status) {
                            case 'P':
                                $rbtn = 'Reject';
                                $gbtn = 'Accept';
                                $subloc = 'pending';
                                break;
                            case 'B':
                                $gbtn = 'Ship';
                                $subloc = 'baking';
                        }
                        break;
                    case 'D':
                        if($status == 'S') {
                            $gbtn = 'Delivered';
                            $subloc = 'deliver';
                        }
                }
                if(isset($rbtn)) {
                    if($status == 'C' && $filter == '' && $rbtn == 'Delete') {
                        echo "
                                <input name='delete'
                                       value='" . $rbtn . "'
                                       type='submit'
                                       class='btn btn-danger'>";
                    } else if($status == 'C' && $filter != '' && $rbtn == 'Cancel') {
                        echo "
                                <input name='delete'
                                       value='" . $rbtn . "'
                                       type='submit'
                                       class='btn btn-danger'>";
                    } else {
                        echo "
                                <a class='btn btn-danger'
                                   href='order_action.php?order_ref_num=" . $ref_num . "&user_type=" . $user_type . "&order_status=" . $status . "&btn=" . $rbtn . "&subloc=" . $subloc . "'>
                                    " . $rbtn . "
                                </a>";
                    }
                }
                if(isset($gbtn)) {
                    if($status == 'C' && $filter == '' && $gbtn == 'Checkout') {
                        echo "
                                <input name='submit'
                                       value='" . $gbtn . "'
                                       type='submit'
                                       class='btn btn-success'>";
                    } else if($status == 'C' && $filter != '' && $gbtn == 'Confirm') {
                        echo "
                                <input name='submit'
                                       value='" . $gbtn . "'
                                       type='submit'
                                       class='btn btn-success'>";
                    } else {
                        echo "
                                    <a class='btn btn-success'
                                       href='order_action.php?order_ref_num=" . $ref_num . "&user_type=" . $user_type . "&order_status=" . $status . "&btn=" . $gbtn . "&subloc=" . $subloc . "'>
                                        " . $gbtn . "
                                    </a>
                                </td>";
                    }
                }
                if($status != 'C' || $filter != '') {
                    echo "
                                <td style='text-align: center;'>
                                    <span class='smtxt'>
                                        Total:
                                    </span>
                                    <br>
                                    <span class='dftxt'>
                                        ₱" . $total . "
                                    </span>
                                </td>";
                }
                echo "
                            </tr>
                    </table>";
            }
            echo "
            </div>";
        }
    } else {
        switch($user_type) {
            case 'C':
                switch ($status) {
                    case "C":
                        echo "No items were added to cart.";
                        break;
                    case "P":
                        echo "No orders requested.";
                        break;
                    case "B":
                        echo "No orders in progress.";
                        break;
                    case "S":
                        echo "No orders on the way.";
                        break;
                    case "D":
                        echo "No orders purchased yet.";
                        break;
                }
                break;
            case 'A':
                switch ($status) {
                    case "P":
                        echo "No orders requested.";
                        break;
                    case "B":
                        echo "No orders in progress.";
                        break;
                    case "S":
                        echo "No orders out for delivery.";
                        break;
                    case "D":
                        echo "No orders delivered.";
                        break;
                    case "X":
                        echo "No orders cancelled.";
                        break;
                }
                break;
            case 'D':
                switch ($status) {
                    case "S":
                        echo "No orders to deliver.";
                        break;
                    case "D":
                        echo "No orders delivered yet.";
                        break;
                }
                break;
        }
    }

}


function getSalesReportByDay($conn, $date) {
    
    // Perform the SQL query to retrieve items sold on the given day
    $query = "SELECT i.item_name, r.pickup_date, SUM(r.item_quantity) as total_quantity_sold, SUM(r.item_quantity * pr.item_price) as total_sales
                FROM reservation r
                JOIN item i ON r.item_id = i.item_id
                JOIN price pr ON r.price_id = pr.price_id
                WHERE r.order_status = 'D' AND DATE(r.pickup_date) >= '$start_date' AND DATE(r.pickup_date) <= '$end_date'
                GROUP BY i.item_name, r.pickup_date";
    $result = mysqli_query($conn, $query);

    // Perform the SQL query to retrieve the overall total sales for the given day
    $query2 = "SELECT SUM(r.item_quantity * pr.item_price) as overall_total_sales
                FROM reservation r
                JOIN item i ON r.item_id = i.item_id
                JOIN price pr ON r.price_id = pr.price_id
                WHERE r.order_status = 'D' AND DATE(r.pickup_date) >= '$start_date' AND DATE(r.pickup_date) <= '$end_date'";
               
    $result2 = mysqli_query($conn, $query2);
    $row2 = mysqli_fetch_assoc($result2);
    $overall_total_sales = $row2['overall_total_sales'];

    // Display the result in a table format
    if ($result && mysqli_num_rows($result) > 0) {
        echo "<table class='table table-bordered bg-transparent blur'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Item Name</th>";
        echo "<th>Pickup Date/th>";
        echo "<th>Total Quantity Sold</th>";
        echo "<th>Total Sales</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['item_name'] . "</td>";
            echo "<td>" . $row['pickup_date'] . "</td>";
            echo "<td>" . $row['total_qty'] . "</td>";
            echo "<td>" . $row['total_sales'] . "</td>";
            echo "</tr>";
        }
        echo "<tr>";
        echo "<td colspan='2'>Overall Total Sales:</td>";
        echo "<td>" . $overall_total_sales . "</td>";
        echo "</tr>";
        echo "</tbody>";
        echo "</table>";
    } else {
        // If there is no data, display a message
        echo "No sales data found for this day.";
    }
}


function getSalesReportByRange($conn, $start_date, $end_date) {
    // Perform the SQL query to retrieve items sold within the given date range
    $query = "SELECT i.item_name, r.pickup_date, SUM(r.item_quantity) as total_quantity_sold, SUM(r.item_quantity * pr.item_price) as total_sales
                FROM reservation r
                JOIN item i ON r.item_id = i.item_id
                JOIN price pr ON r.price_id = pr.price_id
                WHERE r.order_status = 'D' AND DATE(r.pickup_date)>= '$start_date' AND DATE(r.pickup_date)<= '$end_date'
                GROUP BY i.item_name, r.pickup_date";
    $result = mysqli_query($conn, $query);

    // Perform the SQL query to retrieve the overall total sales for the given date range
    $query2 = "SELECT SUM(r.item_quantity * pr.item_price) as overall_total_sales
                FROM reservation r
                JOIN item i ON r.item_id = i.item_id
                JOIN price pr ON r.price_id = pr.price_id
                WHERE r.order_status = 'D' AND DATE(r.pickup_date) >= '$start_date' AND DATE(r.pickup_date) <= '$end_date'";
    $row2 = mysqli_fetch_assoc($result2);
    $overall_total_sales = $row2['overall_total_sales'];

    // Display the result in a table format
    if ($result && mysqli_num_rows($result) > 0) {
        echo "<table class='table table-bordered bg-transparent blur'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Item Name</th>";
        echo "<th>Pickup Date</th>";
        echo "<th>Total Quantity Sold</th>";
        echo "<th>Total Sales</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['item_name'] . "</td>";
            echo "<td>" . $row['pickup_date'] . "</td>";
            echo "<td>" . $row['total_qty'] . "</td>";
            echo "<td>" . $row['total_sales'] . "</td>";
            echo "</tr>";
        }
        echo "<tr>";
        echo "<td colspan='2'>Overall Total Sales:</td>";
        echo "<td>" . $overall_total_sales . "</td>";
        echo "</tr>";
        echo "</tbody>";
        echo "</table>";
    } else {
        // If there is no data, display a message
        echo "No sales data found for this date range.";
    }
}

?>