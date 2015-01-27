<?php $breadcrumb_t = $course->course_name;
$breadcrumb_p = $course->college->college_name . ', ' . $course->college->city_name; ?>
@extends('layouts.main')
@section('content')
    <!-- Row Start -->
    <div class="row">
        <!--Left Sidebar Starts-->
        <!--Left Sidebar End-->
        <div class="content-left col-md-9">
            <div class="element_size_100">
                <div class="event  event-detail">
                    <article>
                        <div class="detail_figure"></div>
                        <div class="detail_inner">
                            <figure>
                                <img src="<?php if ($course->college->college_logo <> '')
                                {
                                    echo $course->college->college_logo;
                                } else
                                {
                                    echo asset('images/no-thumb.png');
                                }?>" class="attachment-230x172 wp-post-image" alt="{{ $course->college->college_name }}"/></figure>
                            <div class="text">
                                <div class="post-options">
                                    <ul>
                                        <li>
                                            <i class="fa fa-clock-o"></i><strong>Duration:</strong><span> <?php if ($course->detail->duration <> '')
                                                {
                                                    echo $course->detail->duration;
                                                } else if ($course->detail->course_duration <> '')
                                                {
                                                    echo $course->detail->course_duration;
                                                }?></span></li>
                                        <?php if ($course->detail->exam_required <> '')
                                        {
                                            echo '<li><i class="fa fa-qrcode"></i><strong>Exam:</strong> <span>' . substr($course->detail->exam_required, 0, 100) . ' </span></li>';
                                        } ?>
                                        <?php if ($course->detail->total_fee <> '')
                                        {
                                            echo '<li><i class="fa fa-money"></i><strong>Fee:</strong> <span><i class="fa fa-inr"></i>' . $course->detail->total_fee . ' </span></li>';
                                        } ?>
                                        <?php if ($course->detail->affiliation <> '')
                                        {
                                            echo '<li><i class="fa fa-paperclip"></i><strong>Affiliation:</strong> <span>' . strip_tags($course->detail->affiliation) . ' </span></li>';
                                        } ?>
                                    </ul>
                                </div>
                                <a class="btn cs-buynow cs-bgcolr bgcolr" href="#">Request Brochure</a>
                            </div>
                        </div>
                    </article>
                    <div class="tabs vertical">
                        <ul class="nav nav-tabs" id="myTab">
                            <li class=" active"><a data-toggle="tab" href="#tabOverview"><i class="fa fa-plus"></i>
                                    Overview</a></li>
                            <?php $i = 0; foreach($course->features as $feature){ ?>
                            <li class=" "><a data-toggle="tab" href="#tab<?php echo $i; ?>"><i
                                            class="fa fa-plus"></i> <?php echo $feature->feature_title; ?></a></li>
                            <?php $i++; } ?>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="tabOverview">
                                <?php if ($course->detail->eligibility <> ''){ ?>
                                <div class="row course_section">
                                    <div class="col-md-5"><h5 style="margin:0px"><i class="fa fa-check-square-o"></i>
                                            Eligibility:</h5></div>
                                    <div class="col-md-7">
                                        <div class="scrollable"><?php echo strip_tags($course->detail->eligibility,'<p><b><strong>'); ?></div>
                                    </div>
                                </div>
                                <?php } ?>
                                <?php if ($course->detail->admission_procedure <> ''){ ?>
                                <div class="row course_section">
                                    <div class="col-md-5"><h5 style="margin:0px"><i class="fa fa-list-alt"></i>
                                            Admission Procedure:</h5></div>
                                    <div class="col-md-7">
                                        <div class="scrollable"><?php echo strip_tags($course->detail->admission_procedure,'<p><b><strong><br>'); ?></div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>

                        <?php $i = 0; foreach($course->features as $feature){ ?>
                        <div class="tab-pane fade in "
                             id="tab<?php echo $i; ?>"><?php echo $feature->feature_content; ?></div>
                        <?php $i++; } ?>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- layout End -->
    <aside class="sidebar-right col-md-3">
        <div class="portfolio-detail-sidebar">
            <h6><?php echo $course->college->college_name; ?></h6>

            <p><?php echo $course->college->why_join; ?></p>
            <ul>
                <?php if($course->college->college_email <> ''){ ?>
                <li>
                        <span class="icon-stack pull-left"><em class="icon-circle icon-stack-base"></em><em
                                    class="fa fa-envelope-o"></em></span>

                    <div class="text">
                        <span>Email</span>

                        <p><?php echo $course->college->college_email; ?></p>
                    </div>
                </li>
                <?php } ?>
                <?php if($course->college->college_phone <> ''){ ?>
                <li>
                    <span class="icon-stack pull-left"><em class="fa fa-phone"></em></span>

                    <div class="text">
                        <span>Phone</span>

                        <p><?php echo str_replace(',', '<br>', $course->college->college_phone); ?></p>
                    </div>
                </li>
                <?php } ?>
                <?php if($course->college->college_address <> ''){ ?>
                <li>
                    <span class="icon-stack pull-left"><em class="fa fa-location-arrow"></em></span>

                    <div class="text">
                        <span>Address</span>

                        <p><?php echo $course->college->college_address; ?></p>
                    </div>
                </li>
                <?php } ?>
                <?php if($course->college->college_contact_person <> ''){ ?>
                <li>
                    <span class="icon-stack pull-left"><em class="fa fa-user"></em></span>

                    <div class="text">
                        <span>Contact Person</span>

                        <p><?php echo $course->college->college_contact_person; ?></p>
                    </div>
                </li>
                <?php } ?>
                <?php if($course->college->college_established <> ''){ ?>
                <li>
                    <span class="icon-stack pull-left"><em class="fa fa-calendar"></em></span>

                    <div class="text">
                        <span>College Established</span>

                        <p><?php echo $course->college->college_established; ?></p>
                    </div>
                </li>
                <?php } ?>
                <?php if($course->college->college_rating > 0){ ?>
                <li>
                    <span class="icon-stack pull-left"><em class="fa fa-asterisk"></em></span>

                    <div class="text">
                        <span>Rating</span>

                        <p><?php echo General::giveStars($course->college->college_rating); ?></p>
                    </div>
                </li>
                <?php } ?>
                <li><a class="btn cs-buynow cs-bgcolr bgcolr" href="#">Request Contact Info</a></li>
            </ul>
        </div>


    </aside>

    </div>
    <!-- Row End -->
@stop