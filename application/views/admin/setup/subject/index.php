<!-- page content -->
<div class="right_col" role="main">
    <div>
        <!-- start of body content -->
        <div class="page-title">
            <div class="title_left">
                <h3> Subject Create </h3>
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
                    <a href="<?php echo  base_url() ?>subject_list" class="btn btn-primary btn-user btn-block">Subject List</a>
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
                                        <div class="col-lg-8 justify-content-center x_panel">
                                            <div class="p-5">
                                                <form class="user" action="<?php echo base_url() ?>subject/store" method="post" enctype="multipart/form-data">
                                                    <div class="form-group row">
                                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                                            <label for="#"><i class="fa fa-exclamation-circle"></i> Select Class :</label>
                                                            <select class="form-control" name="class_id">
                                                                <option value="" selected>Select once</option>
                                                                <?php foreach ($data1 as $key => $show_data) { ?>
                                                                    <option value="<?php echo $show_data['class_id']; ?>"><?php echo $show_data['class_name']; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                                            <label for="#"><i class="fa fa-exclamation-circle"></i> Status :</label>
                                                            <select class="form-control" name="status">
                                                                <option value="1" selected>Active</option>
                                                                <option value="0">Inactive</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                                            <label for="#"><i class="fa fa-exclamation-circle"></i> Subject Name English :</label>
                                                            <input type="text" autocomplete="off" name="sub_name" class="form-control form-control-user" required id="notice_date" placeholder="Enter Subject Name English ..">
                                                        </div>
                                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                                            <label for="#"><i class="fa fa-exclamation-circle"></i> Subject Name Bangla :</label>
                                                            <input type="text" autocomplete="off" name="sub_name_bn" class="form-control form-control-user" required id="notice_date" placeholder="Enter Subject Name Bangla ..">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-primary btn-user btn-block">Save</button>
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
            </div>
        </div>
    </div>
</div>