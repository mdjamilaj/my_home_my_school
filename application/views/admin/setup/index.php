<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/themes/dark.css">
<style>
    input.flatpickr-input {
        width: 75%;
        height: 33px;
    }
</style>
<!-- page content -->
<div class="right_col" role="main">
    <div>
        <!-- start of body content -->
        <div class="page-title">
            <div class="title_left">
                <h3> Class Routine Create </h3>
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
                    <a href="<?php echo  base_url() ?>" class="btn btn-primary btn-user btn-block">Routine List</a>
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
                                                <form class="user" action="<?php echo base_url() ?>web/class_routine_store" method="post" enctype="multipart/form-data">

                                                    <div class="form-group row">
                                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                                            <label for="#"><i class="fa fa-arrow-circle-right"></i> Select Class :</label>
                                                            <select required class="form-control" name="class_id" id="class">
                                                                <option value="" selected>Select once</option>
                                                                <?php foreach ($data1 as $key => $show_data) { ?>
                                                                    <option value="<?php echo $show_data['class_id']; ?>"><?php echo $show_data['class_name']; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                                            <label for="#"><i class="fa fa-arrow-circle-right"></i> Select Subject :</label>
                                                            <select required class="form-control" name="sub_id" id="subject">
                                                                <option value="" selected>Select once</option>
                                                                <?php foreach ($data2 as $key => $show_data) { ?>
                                                                    <option value="<?php echo $show_data['sub_id']; ?>"><?php echo $show_data['sub_name']; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                                            <label for="#"><i class="fa fa-arrow-circle-right"></i> Title English :</label>
                                                            <input type="text" autocomplete="off" name="title" class="form-control form-control-user" required id="title" placeholder="Title English ..">
                                                        </div>
                                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                                            <label for="#"><i class="fa fa-arrow-circle-right"></i> Title Bangla :</label>
                                                            <input type="text" autocomplete="off" name="title_bn" class="form-control form-control-user" required id="title_bn" placeholder="Title Bangla ..">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                                            <label for="#"><i class="fa fa-arrow-circle-right"></i> Unite English :</label>
                                                            <input type="text" autocomplete="off" name="unite" class="form-control form-control-user" required id="notice_date" placeholder="Unite English ..">
                                                        </div>
                                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                                            <label for="#"><i class="fa fa-arrow-circle-right"></i> Unite Bangla:</label>
                                                            <input type="text" autocomplete="off" name="unite_bn" class="form-control form-control-user" required id="unite_bn" placeholder="Unite Bangla ..">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                                            <label for="#"><i class="fa fa-arrow-circle-right"></i> Description English :</label>
                                                            <textarea type="text" autocomplete="off" name="description" class="form-control form-control-user des_english" required id="description" placeholder="Description English"></textarea>
                                                        </div>
                                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                                            <label for="#"><i class="fa fa-arrow-circle-right"></i> Description Bangla :</label>
                                                            <textarea type="text" autocomplete="off" name="description_bn" class="form-control form-control-user des_english" required id="description_bn" placeholder="Description Bangla"></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                                            <label for="#"><i class="fa fa-arrow-circle-right"></i> Video Link :</label>
                                                            <input type="text" autocomplete="off" name="video_link" class="form-control form-control-user" required id="notice_date" placeholder="Video Link ..">
                                                        </div>
                                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                                            <label for="#"><i class="fa fa-arrow-circle-right"></i> Attachment :</label>
                                                            <input type="file" id="fileinput" style="padding-top: 2px !important; padding-bottom: 20px !important;" accept="image/*" name="attachment" class="form-control form-control-user pb-5">
                                                        </div>
                                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                                            <label for="#"><i class="fa fa-arrow-circle-right"></i> Date Time :</label>
                                                            <div class="flatpickr" id="rangeDate" class="form-control form-control-user">
                                                                <input type="text" placeholder="Select Date.." required name="date_time" data-input> <!-- input is mandatory -->

                                                                <a class="input-button" title="toggle" data-toggle>
                                                                    <i class="fa fa-calendar fa-2x" style="color: #03c376;margin-left: 5px;"></i>
                                                                </a>

                                                                <a class="input-button" title="clear" data-clear>
                                                                    <i class="fa fa-close fa-2x" style="color: red;margin-left: 5px;"></i>
                                                                </a>
                                                            </div>
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



<script>
    var editor = CKEDITOR.replace('description');
    editor.on('required', function(evt) {
        editor.showNotification('This field is required.', 'warning');
        evt.cancel();
    });

    var editor1 = CKEDITOR.replace('description_bn');
    editor1.on('required', function(evt) {
        editor.showNotification('This field is required.', 'warning');
        evt.cancel();
    });
</script>



<script>
    $('#class').on('change', function() {
        var val = $('#class').val();
        $.ajax({
            url: "<?php echo base_url(); ?>web/fetch_subject",
            type: "POST",
            data: {
                val: val,
            },
            cache: false,
            success: function(data) {
                var data = JSON.parse(data);
                var view = data.view;
                console.log(data);
                var string1 = 0;
                var data = $('#subject').html();
                $('#subject').html('');

                $.each(view, function(key, value) {
                    string1 = string1 + "<option value='" + value['sub_id'] + "'>" + value['sub_name'] + "</option>";
                });
                console.log(string1)
                $("#subject").html(string1);
            }
        })
    });
</script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!--  Flatpickr  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.js"></script>

<script>
    $("#rangeDate").flatpickr({
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        wrap: true,
        allowInput: true,
    });
</script>