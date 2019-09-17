
<?php include('../includes/db/connection_db.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
        <?php include('../includes/head_link.php');?>

    </head>
    <body class="fixed-top">

        <!-- wrapper -->
        <div id="wrapper">
            <!-- BEGIN HEADER -->
             <?php include('../includes/nav_header.php');?>
            <!-- END HEADER -->
            <!-- BEGIN HEADER & CONTENT DIVIDER -->
            <div class="clearfix"> </div>
            <!-- END HEADER & CONTENT DIVIDER -->

            <!-- BEGIN CONTAINER -->
            <div class="page-container">

                <?php include('../includes/left_sidebar.php');?>

                <!-- BEGIN CONTENT BODY -->
                <div class="page-content-wrapper">
                    <div class="content-wrapper container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title">
                                    <div class="row">
                                        <!-- <h4 class="pull-left">Add Subject</h4> -->
                                    </div>
                                </div>
                            </div>
                        </div><!-- end .page title-->
                        <div><?php
                        if(isset($_SESSION['alert'])){
                        echo '<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$_SESSION['alert'].'</div>';
                        unset($_SESSION['alert']);
                        }
                        ?></div>
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="panel panel-card margin-b-30">
                                    <!-- Start .panel -->
                                    <div class="panel-heading">
                                      Assign Teacher Form
                                    </div>
                                    <div class="panel-body">

                                        <!-- form -->
                                    <form class="form-horizontal" method="post" action="<?=$base?>/sql/insert_sql.php">

                                            <div class="form-group">
                                            <label class="col-lg-3 col-md-3 control-label">Select Teacher</label>
                                            <div class="col-lg-9 col-md-9">
                                                <select name="teacher" class="form-control teacher">
                                                <option value="">Select</option>
                                                <?php
                                                    $sql = "SELECT * from teacher where status = 1";
                                                    $result = $conn->query($sql);
                                                    while($data = $result->fetch_assoc()){
                                                        echo '<option value="'.$data['teacher_id'].'">'.$data['teacher_id'].'('.$data['name'].')</option>';
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                            </div>
                                         
                                            <div class="form-group">
                                                <label class="col-lg-3 col-md-3 control-label">Select Session</label>
                                                <div class="col-lg-9 col-md-9">
                                                    <select name="session" class="form-control">
                                                    <option value="">Select</option>
                                                    <?php
                                                        $sql = "SELECT * from session where status = 1";
                                                        $result = $conn->query($sql);
                                                        while($data = $result->fetch_assoc()){
                                                            echo '<option value="'.$data['id'].'">'.$data['session_name'].'('.$data['year'].')</option>';
                                                        }
                                                    ?>
                                                    </select>
                                                </div>
                                            </div>

                                            
                                    
                                            <div class="form-group">
                                                <label class="col-lg-3 col-md-3 control-label">Select Subjects</label>
                                                <div class="col-lg-9 col-md-9">
                                                    <select name="subject[]" class="form-control subject" multiple>
                                                    <?php
                                                        $sql = "SELECT * from subject where status = 1";
                                                        $result = $conn->query($sql);
                                                        while($data = $result->fetch_assoc()){
                                                            echo '<option value="'.$data['id'].'">'.$data['subject_name'].' </option>';
                                                        }
                                                    ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-offset-3 col-lg-9">
                                                    <input type="submit" class="btn btn-sm btn-primary" name="assign_teacher" value="submit">
                                               
                                                </div>
                                            </div>
                                     
                                        </form>
                                        <!-- form -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                <div class="clearfix"></div>
                  <?php include('../includes/footer.php');?>
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTAINER -->
        </div>
        <!-- /wrapper -->


        <!-- SCROLL TO TOP -->
        <a href="#" id="toTop"></a>


        <!-- PRELOADER -->
        <div id="preloader">
            <div class="inner">
                <span class="loader"></span>
            </div>
        </div><!-- /PRELOADER -->


    <!-- JAVASCRIPT FILES -->
          <?php include('../includes/footer_link.php');?>

          <script>
          $('.session').select2({'placeholder':'Select Session'});
          $('.subject').select2({'placeholder':'Select Subjects'});
          </script>

    </body>
</html>