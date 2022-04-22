<?php

    session_start();

    $classes_redirect = "../classes/";

    require_once $classes_redirect."__WebAppConfig.php";

    require_once $app_conf->get_inc_file("", "auth_func");

    require_once $classes_redirect."FeedbackView.php";

    $feedback_view_instance = new FeedbackView();

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>All Feedbacks | JustBuy Admin </title>

        <?php require_once $app_conf->get_inc_file("", "meta_tags"); ?>

        <?php require_once $app_conf->get_inc_file("", "stylesheets"); ?>
    </head>
    <body>
        <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">

            <?php include_once $app_conf->get_view("header"); ?>

            <div class="app-main">

                <?php include_once $app_conf->get_view("sidebar"); ?>

                <div class="app-main__outer">

                    <div class="app-main__inner">

                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                        <i class="pe-7s-car icon-gradient bg-mean-fruit">
                                        </i>
                                    </div>
                                    <div>
                                        All feedbacks
                                        <div class="page-title-subheading">
                                            This shows all feedbacks
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-header">
                                        Feedbacks
                                    </div>
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">S/N</th>
                                                    <th>Full Name</th>
                                                    <th>Subject</th>
                                                    <th>Message</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                    $feedbacks = $feedback_view_instance->GetFeedbacks();

                                                    $counter = 0;

                                                    foreach ($feedbacks as $feedback) {

                                                        $counter++;
                                                        ?>
                                                        <tr>
                                                            <td class="text-center"><?php echo $counter; ?></td>
                                                            <td><?php echo $feedback["FullName"]; ?></td>
                                                            <td><?php echo $feedback["Subject"]; ?></td>
                                                            <td><?php echo $feedback["Message"]; ?></td>
                                                        </tr>
                                                        <?php

                                                    }

                                                    if($counter == 0){

                                                        ?>
                                                        <tr>
                                                            <td class="text-center" colspan="4">No feedbacks</td>
                                                        </tr>
                                                        <?php

                                                    }

                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <?php include_once $app_conf->get_inc_file("", "javascripts"); ?>
    </body>
</html>
