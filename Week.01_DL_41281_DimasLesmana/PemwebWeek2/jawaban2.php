<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Week-01 | Dimas Lesmana (41281)</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap.min.css">

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">[IF635] Web Programming</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="#products">Products</a></li>
            </ul>
        </div>
    </nav>

    <div id="products" style="margin: auto; width: 85%; padding: 10px;">
        <table id="table" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Product Name</th>
                    <th>Quantity per Unit</th>
                    <th>Price</th>
                    <th>Stock</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $products = array(
                    "Chai" => array(
                        "Qty" => "10 boxes x 20 bags",
                        "Price" => 18,
                        "Stock" => 39
                    ),
                    "Chang" => array(
                        "Qty" => "24 - 12 oz bottles",
                        "Price" => 19,
                        "Stock" => 17
                    ),
                    "Aniseed Syrup" => array(
                        "Qty" => "12 - 550 ml bottles",
                        "Price" => 10,
                        "Stock" => 13
                    ),
                    "Chef Anton's Cajun Seasoning" => array(
                        "Qty" => "48 - 6 oz jars",
                        "Price" => 22,
                        "Stock" => 53
                    ),
                    "Chef Anton's Gumbo Mix" => array(
                        "Qty" => "36 boxes",
                        "Price" => 21.35,
                        "Stock" => 0
                    ),
                    "Grandma's Boysenberry Spread" => array(
                        "Qty" => "12 - 8 oz jars",
                        "Price" => 25,
                        "Stock" => 120
                    ),
                    "Uncle Bob's Organic Dried Pears" => array(
                        "Qty" => "12 - 1 lb pkgs.",
                        "Price" => 30,
                        "Stock" => 15
                    ), "Northwoods Cranberry Sauce" => array(
                        "Qty" => "12 - 12 oz jars",
                        "Price" => 40,
                        "Stock" => 6
                    ),
                    "Mishi Kobe Niku" => array(
                        "Qty" => "18 - 500 g pkgs.",
                        "Price" => 97,
                        "Stock" => 29
                    ),
                    "Ikura" => array(
                        "Qty" => "12 - 200 ml jars",
                        "Price" => 31,
                        "Stock" => 31
                    ),
                );
                
                $idx = 1;
                foreach ($products as $key => $value) {
                    $html = '<tr>';
                    $html .= '<td>' . $idx . '</td>';
                    $html .= '<td>' . $key . '</td>';
                    $html .= '<td>' . $value['Qty'] . '</td>';
                    $html .= '<td>' . $value['Price'] . '</td>';
                    $html .= '<td>' . $value['Stock'] . '</td>';
                    $html .= '</tr>';
                    echo $html;
                    $idx++;
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>Product Name</th>
                    <th>Quantity per Unit</th>
                    <th>Price</th>
                    <th>Stock</th>
                </tr>
            </tfoot>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script>
</body>

</html>