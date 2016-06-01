<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $pageTitle; ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

 


    <!-- Page Content -->
    <div class="container">

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">
            <div class="well text-center" style="background:rgba(255, 214, 0, 0.61);border:1px solid #000;">
                <h1>
                   Cities in the World
                </h1>
            </div>    
            </div>
            <div class="col-lg-12">
                            <p class="text-center">Below is a list of all the top cities in the world.Feel free to browse.</p>
            </div>                
            <div class="content">
            <?php if (!empty($data)) { ?>
            	<?php foreach ($data as $row) {  ?>
            <div class="col-md-4" >
                <div class="panel panel-default" style="height: 100px;border:none;">
                    <div class="panel-body">
                        <h4><?php echo $row[1].','.$row[4]; ?></h4>
                        <p>L<?php echo $row[2]; ?></p>
                    </div>
                </div>
            </div> 
                    <?php } ?>
            <?php } else { ?>
					<div>No records found</div>
			<?php } ?>  
            </div>          
        </div>
        <!-- /.row -->
        <div class="pagi">
        <?php echo $pagerNav; ?>
        </div>

            
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $(document).on('click','.pagi ul li a', function () {
                $(this).html("Loading...") ;
                var page = $(this).attr("data-num");
                $.ajax({
                    type: 'GET',
                    url: "ajaxPost.php?p="+page+"",
                    success: function(data) {
                       // var obj = $.parseJSON(data);
                       $(".content").html(data.content);
                       $(".pagi").html(data.pagination);                                            // if()


                    },
                    error: function() {
                        alert("error in alert");
                    }
                });
                return false;
            });
        });

    </script>

    
</body>

</html>
