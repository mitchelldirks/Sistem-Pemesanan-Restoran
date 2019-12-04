<?php
include 'koneksi.php';
session_start();
$struk=mysqli_query($conn,"SELECT * from tbl_transaksi where id_transaksi = '".$_GET['id']."'");
$_GET['id'];
$tr=mysqli_fetch_array($struk);
?>

<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="asset/css/plugins/font-awesome.min.css"/>
    <title>Struk <?php echo $_GET['id']; ?></title>
    
    <style>
    *{
    	font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    .invoice-box {
        max-width: 600px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    .invoice-box table tr td:nth-child(3) {
        text-align: right;
    }

    .invoice-box table .none tr td:nth-child(2) {
        text-align: left;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: left;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>
    <script>
	function printPage(id)
	{
	   var html="<html>";
	   html+= document.getElementById(id).innerHTML;

	   html+="</html>";

	   var printWin = window.open('','','left=0,top=0,width=1,height=1,toolbar=0,scrollbars=0,status  =0');
	   printWin.document.write(html);
	   printWin.document.close();
	   printWin.focus();
	   printWin.print();
	   printWin.close();
	}
	</script>
</head>

<body>

<br>
<div class="col-lg-12">
<span class="pull-right"><a href="pesan.php" class="no-print btn btn-success"><i class="fa fa-exit"></i> Kembali ke menu pemesanan</a></span>
</div>
<br>

<center>
<input type="button" class="no-print btn btn-primary" value="Print Receipt <?php echo $_GET['id']; ?>" onclick="printPage('<?php echo $_GET['id']; ?>');">
</center>
<br>
    <div class="invoice-box" id="<?php echo $_GET['id']; ?>">
        <table cellpadding="0" cellspacing="0" onload="javascript:window.print()">
            <?php if($tr['status']=='Selesai'){ ?>
            <tr>
                <td colspan="3" align="center" style="background-color: #333;color: #eee">
                    <h1>PESANAN SELESAI</h1>
                </td>
            </tr>
        <?php } ?>
            <tr class="top">
                <td colspan="3">
                    <table class="none">
                        <tr>
                        	<td class="title float-right">
                            	<img src="img/logo.png" style="width:100px; max-width:300px;">
                            </td>
                            <td>
                                <b>Zahra_kueh</b><br>
                                Gg H. Misna No. 39,<br> Penggilingan, Jakarta Timur<br>
                                0877 7615 5561
                            </td>
                            <td>
                                <b># <?php echo $_GET['id']; ?></b><br>
                                <?php 
                                $tgl=$tr['tanggal_transaksi'];
                                $tgl = new DateTime($tgl);
                                echo date_format($tgl, "d F Y").'<br>'.date_format($tgl, "H:i:s"); ?>
                            </td>
                            
                            
                            
                        </tr>
                    </table>
                </td>
            </tr>
            
            <!-- <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                Zahra_kueh<br>
                                Gg H. Misna No. 39, Penggilingan,<br> Cakung, Jakarta Timur<br>
                                0877 7615 55661
                            </td>
                            
                            <td>
                                Acme Corp.<br>
                                John Doe<br>
                                john@example.com
                            </td>
                        </tr>
                    </table>
                </td>
            </tr> -->
            
            <!-- <tr class="heading">
                <td>
                    Payment Method
                </td>
                
                <td>
                    Check #
                </td>
            </tr> -->
            
            <!-- <tr class="details">
                <td>
                    Check
                </td>
                
                <td>
                    1000
                </td>
            </tr> -->
            
            <tr class="heading">
                <td>
                    Item
                </td>
                <td>Qty</td>
                <td>
                    Price
                </td>
            </tr>
            <?php $item=mysqli_query($conn,"SELECT * from tbl_pesanan where id_transaksi = '".$_GET['id']."'");
            	while ($row=mysqli_fetch_array($item)) {
            		$id_m=$row['id_menu'];
            		$qty=$row['qty'];
            		$price=$row['total'];
            		$menu=mysqli_query($conn,"SELECT * from tbl_menu where id_menu = '".$id_m."'");
            		$j=mysqli_fetch_array($menu);
            		$name=$j['nama_menu'];
            		$captain=$j['harga_menu'];
             ?>
            <tr class="item">
                <td>
                    <?php echo $name; ?>
                    

                </td>
                <td>@&nbsp;&nbsp;<?php echo number_format($captain); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $qty; ?></td>
                <td>
                    <?php echo number_format($price); ?>
                </td>
            </tr>
            <?php } ?>
            <tr>
            	<th colspan="2">
            		<span class="pull-right">Total</span>
            	</th>
            	<td>
            		<span class="pull-right">Rp. <?php echo number_format($tr['total']); ?></span>
            	</td>
            </tr>
            
        </table>
    </div>
    <br>
    <br>
    <center></center>
</body>
</html>