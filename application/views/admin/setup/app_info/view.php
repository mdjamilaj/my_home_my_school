<script src="<?php echo base_url(); ?>assets/custom_js/custom_js_for_library.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/custom_css_for_library/custom_css_for_library.css">


<!-- page content -->
<div class="right_col" role="main">
    <div>
        <!-- start of body content -->
        <div class="page-title">
            <div class="title_left">
                <h3> Search App Info </h3>
            </div>
            <div class="title_right">
                <!-- <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">Go!</button>
            </span>
          </div>
        </div> -->
                <div class="col-md-12 col-sm-12 col-xs-12 form-group ">
                    <a href="<?php echo  base_url() ?>app_info_create" class="btn btn-primary btn-user btn-block">App Info Create</a>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2> Search <small></small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a>
                                    </li>
                                    <li><a href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <!--
							<li><a class="close-link"><i class="fa fa-close"></i></a>
							</li>
							-->
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div>
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <p class="bg-success text-center text-light"><?= $this->session->userdata('msg'); ?> </p>
                                </div>
                            </div>
                        </div>


                        <div class="container">

                            <div class="card o-hidden border-0 shadow-lg my-5">
                                <div class="card-body p-0">
                                    <!-- Nested Row within Card Body -->
                                    <div class="row justify-content-center">
                                        <div class="col-lg-12 justify-content-center">
                                            <div class="p-5">
                                                <form class="user mt-5" action="<?php echo base_url() ?>app_info/index" method="post" enctype="multipart/form-data">

                                                    <div class="form-group row">
                                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                                            <label class="control-label col-md-3 col-sm-2 col-xs-12 label-text-control">
                                                                <i class="fa fa-search"></i> SN <span class="required"></span>
                                                            </label>
                                                            <div class="col-md-9 col-sm-4 col-xs-12">
                                                                <input type="text" autocomplete="off" name="sn" class="form-control form-control-user" id="first_date" placeholder="Serial No ...">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                                            <label class="control-label col-md-4 col-sm-2 col-xs-12 label-text-control">
                                                                <i class="fa fa-search"></i> App Version Code<span class="required"></span>
                                                            </label>
                                                            <div class="col-md-8 col-sm-4 col-xs-12">
                                                                <input type="text" autocomplete="off" name="app_version_code" class="form-control form-control-user " id="last_date" placeholder="App Version Code ...">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-sm-12 mb-4 mb-sm-0">
                                                            <button type="submit" class="btn btn-primary btn-user btn-block">Search</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="x_content">
                    <div>
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <p>
                                    <?php if ($this->session->flashdata('msg')) : ?>
                                        <p class='bg-success text-center text-light' style='padding: 5px;'><?php echo $this->session->flashdata('msg'); ?></p>
                                    <?php endif; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <?php if (isset($sn) || isset($app_version_code1)) { ?> <p style="background: #000000; color: #ffffff;text-align: center;font-size: 16px;font-weight: 600;padding: 4px; width:550px; float: left; text-aling: center;"><?php if (isset($sn)) {
                                                                                                                                                                                                                                                    echo "Sn : " . $sn;
                                                                                                                                                                                                                                                }
                                                                                                                                                                                                                                                if (isset($app_version_code1)) {
                                                                                                                                                                                                                                                    echo "&nbsp;&nbsp;&nbsp; Class Name : " . $app_version_code1;
                                                                                                                                                                                                                                                }
                                                                                                                                                                                                                                            } ?> </p>
                            <p style="background: #000000; color: #ffffff;text-align: center;font-size: 16px;font-weight: 600;padding: 4px; width:90px; float: right; text-aling: center;">Total : <?php echo $total; ?> </p>
                            <table class="table table-bordered table-striped jambo_table">
                                <thead class="bg-dark">
                                    <tr>
                                        <th class="text-center">SN</th>
                                        <th class="text-center">App Version Code</th>
                                        <th class="text-center">App Version Name</th>
                                        <th class="text-center">App Version Detials</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <?php $i = 0;
                                    foreach ($details as $show_data) {
                                        $i++; ?>
                                        <tr>
                                            <td><?php echo  $show_data['id']; ?></td>
                                            <td class="text-center" style="font-weight: bold;"><?php echo $show_data['app_version_code']; ?></td>
                                            <td class="text-left" style="font-weight: bold;"><?php echo $show_data['app_version_name']; ?></td>
                                            <td class="text-left" style="font-weight: bold;"><?php echo $out = strlen($show_data['app_version_details']) > 40 ? substr($show_data['app_version_details'], 0, 40) . "..." : $show_data['app_version_details'] ?></td>
                                            <td class="edit_td" style="padding: 0 !important"><a href="<?php echo base_url(); ?>app_info/edit?edit=<?php echo $show_data['id'] ?>"><i class='fa fa-pencil-square-o'></i></a></td>
                                        </tr>
                                    <?php } ?>
                                <tbody class="text-center" id="load-more">

                                </tbody>
                                </tbody>
                            </table>
                    </div>
                </div>
                <?php if ($i == 0) { ?>
                    <div class="dropDiv classRed">
                        <p style="text-align:center; color:#FFF;">
                            Sorry ! No Information Found.
                        </p>
                    </div>
                <?php } ?>
                <button type="button" onclick="loadmore()" id="loadmore" class="btn btn-primary btn-user btn-block" style="width: 150px" value="loadmore">Load More</button>
            </div>
        </div>
    </div>

</div>
<input type="hidden" value="" id="length">


<script type="text/javascript">
    count = 0;
    var base_url = "<?php echo base_url(); ?>";

    function loadmore() {
        count += 1;
        $.ajax({
            url: "<?php echo base_url(); ?>web/ajax_req",
            type: "POST",
            data: {
                offset: 10 * count,
                limit: 10,
                table: "app_info"
            },
            cache: false,
            success: function(data) {
                var data = JSON.parse(data);
                console.log(data.view);
                var view = data.view;
                var check = $('#length').val();
                if (check == view.length) {
                    alert("No More Data ....");
                    $('#loadmore').hide();
                }
                $('#length').val(view.length);
                var string1 = 0;

                $.each(view, function(key, value) {
                    if (value['details'].length > 40) {
                        var str = value['details'].substring(0, 40) + "...";
                    } else {
                        var str = value['details'];
                    }
                    string1 = string1 + "<tr style='background: #fbe6e6'><td>" + value['id'] + "</td><td class='text-center' style='font-weight: bold;'>" + value['app_version_code'] + "</td><td class='text-left' style='font-weight: bold'>" + value['app_version_name'] + "</td><td class='text-left' style='font-weight: bold'>" + str + "</td><td class='edit_td' style='padding: 0 !important'><a href=" + base_url + "subject/edit?edit=" + value['id'] + "><i class='fa fa-pencil-square-o'></i></a></></tr>";

                });
                // console.log(string1)
                $("#load-more").html(string1);


            }
        })
    }
</script>