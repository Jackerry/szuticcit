<?php

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "http://apis.haoservice.com/lifeservice/gold/shfuture?&key=076539866d234823ae35a842b15cf6d8",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    $J = json_decode($response);
   // print_r( $J->result[0]);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row clearfix">
        <div class="col-md-12 column">
            <table class="table">
                <thead>
                <tr>
                    <th>
                        名称
                    </th>
                    <th>
                        最新价
                    </th>
                    <th>
                        涨跌
                    </th>
                    <th>
                        买价
                    </th>
                    <th>
                        买量
                    </th>
                    <th>
                        卖价
                    </th>
                    <th>
                        卖量
                    </th>
                    <th>
                        成交量
                    </th>

                </tr>
                </thead>
                <?php
                    for($i = 0;$i < count($J->result);$i++){
                ?>
                <tbody>
                <tr>
                    <td>
                        <?php echo $J->result[$i]->name; ?>
                    </td>
                    <td>
                        <?php echo $J->result[$i]->latestpri; ?>
                    </td>
                    <td>
                        <?php echo $J->result[$i]->change; ?>
                    </td>
                    <td>
                        <?php echo $J->result[$i]->buypri; ?>
                    </td>
                    <td>
                        <?php echo $J->result[$i]->buyvol; ?>
                    </td>
                    <td>
                        <?php echo $J->result[$i]->sellpri; ?>
                    </td>
                    <td>
                        <?php echo $J->result[$i]->sellvol; ?>
                    </td>
                    <td>
                        <?php echo $J->result[$i]->tradvol; ?>
                    </td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>