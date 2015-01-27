
@extends('layouts.main')
 <?php
    $breadcrumb_t = $course['course_name'];
$breadcrumb_p = General::commafy([$course['university']['university_name'],$course['university']['city'],$course['university']['region'],$course['university']['country']]);
  ?>

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
                            <img src="<?php if ($course['university']['logo_url'] <> '')
                            {
                                echo $course['university']['logo_url'];
                            } else
                            {
                                echo asset('images/no-thumb.png');
                            }?>" class="attachment-230x172 wp-post-image" alt="12-stat-fort-uni"/></figure>
                        <div class="text">


                            <div class="post-options" style="padding-left:10px">
                                <ul>

                                    <?php if ($course['course_duration'] <> '')
                                    {
                                        echo '<li><i class="fa fa-clock-o"></i><strong>Duration:</strong> <span>' . $course['course_duration'] . ' </span></li>';
                                    } ?>
                                    <?php if (isset($course['eligibility'][0]['exam_name']))
                                    {
                                        echo '<li><i class="fa fa-qrcode"></i><strong>Exam:</strong> <span>' . substr($course['eligibility'][0]['exam_name'], 0, 100) . ' </span></li>';
                                    } ?>
                                    <?php if ($course['fees_lakh_inr'] <> '')
                                    {
                                        echo '<li><i class="fa fa-money"></i><strong>1st Year Fee:</strong> <span><i class="fa fa-inr"></i>' . $course['fees_lakh_inr'] . ' Lacs</span></li>';
                                    } ?>
                                    <?php if ($course['university']['affiliation'] <> '')
                                    {
                                        echo '<li><i class="fa fa-paperclip"></i><strong>Affiliation:</strong> <span>' . strip_tags($course['university']['affiliation']) . ' </span></li>';
                                    } ?>


                                </ul>
                            </div>


                            <a class="btn cs-buynow cs-bgcolr bgcolr" href="#">Request Brochure</a>
                        </div>
                    </div>


                    <div class="tabs vertical">
                        <ul class="nav nav-tabs" id="myTab">
                            <li class=" active"><a data-toggle="tab" href="#tabOverview"><i class="fa fa-plus"></i>
                                    Overview</a></li>

                            <li class=" "><a data-toggle="tab" href="#tabEligibility"><i class="fa fa-plus"></i>
                                    Eligibility</a></li>
                            <?php if($course['university']['accomodation_details'] <> ''){ ?>
                            <li class=" "><a data-toggle="tab" href="#tabAccomodation"><i class="fa fa-plus"></i>
                                    Accomodation</a></li>
                            <?php } ?>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="tabOverview">
                                <strong>Course Description:</strong>
                                <?php echo $course['description']; ?>
                            </div>

                            <div class="tab-pane fade in " id="tabEligibility"><strong>Eligibity Criteia for this
                                    Course:</strong>

                                <table class='table table-condensed table_D3D3D3'>
                                    <thead>
                                    <tr>
                                        <th>S. No</th>
                                        <th>Exam Name</th>
                                        <th>Cutoff</th>
                                        <th>Max</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php for($i = 0;$i < count($course['eligibility']);$i++){?>
                                    <tr>
                                        <td><?php echo $i + 1; ?></td>
                                        <td><?php echo $course['eligibility'][$i]['exam_name']; ?></td>
                                        <td><?php echo $course['eligibility'][$i]['cut_off_marks']; ?></td>
                                        <td><?php echo $course['eligibility'][$i]['max_marks']; ?></td>
                                    </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                                <br>
                                <?php if($course['course_eligibility_additional_info'] <> ''){ ?>
                                <strong>Important: </strong> <?php echo $course['course_eligibility_additional_info']; ?>
                                <?php } ?>
                            </div>
                            <?php if($course['university']['accomodation_details'] <> ''){ ?>
                            <div class="tab-pane fade in "
                                 id="tabAccomodation"><?php echo $course['university']['accomodation_details']; ?>
                                <?php echo General::extLink($course['university']['accomodation_url'], 'Accomodation Details '); ?>
                                <br> <br>
                                <?php if($course['university']['cost_living'] <> ''){ ?>
                                <strong>Cost of Living (Monthly) in <?php echo $course['university']['city']; ?>
                                    , <?php echo $course['university']['region']; ?>
                                    :</strong> <?php echo $course['university']['cost_living_currency']; ?> <?php echo number_format($course['university']['cost_living']); ?>
                                <br>
                                <?php echo General::extLink($course['university']['cost_living_url'], 'Cost Details '); } ?>
                            </div>
                            <?php  } ?>

                        </div>

                    </div>


            </div>
        </div>

    </div>
    <!-- layout End -->
    <aside class="sidebar-right col-md-3">

        <div class="portfolio-detail-sidebar">
            <h6><?php echo $course['university']['university_name']; ?></h6>

            <p><?php echo $course['university']['university_highlights']; ?></p>

            <ul>
                <?php if($course['university']['email'] <> ''){ ?>
                <li>
                    <span class="icon-stack pull-left"><em class="icon-circle icon-stack-base"></em><em
                                class="fa fa-envelope-o"></em></span>

                    <div class="text">
                        <span>Email</span>

                        <p><?php echo $course['university']['email']; ?></p>
                    </div>
                </li>
                <?php } ?>
                <?php if($course['university']['contact_no'] <> ''){ ?>
                <li>
                    <span class="icon-stack pull-left"><em class="fa fa-phone"></em></span>

                    <div class="text">
                        <span>Phone</span>

                        <p><?php echo str_replace(',', '<br>', $course['university']['contact_no']); ?></p>
                    </div>
                </li>
                <?php } ?>
                <?php if($course['university']['address'] <> ''){ ?>
                <li>
                    <span class="icon-stack pull-left"><em class="fa fa-location-arrow"></em></span>

                    <div class="text">
                        <span>Address</span>

                        <p><?php echo $course['university']['address']; ?></p>
                    </div>
                </li>
                <?php } ?>

                <?php if($course['university']['established'] <> ''){ ?>
                <li>
                    <span class="icon-stack pull-left"><em class="fa fa-calendar"></em></span>

                    <div class="text">
                        <span>Established</span>

                        <p><?php echo $course['university']['established']; ?></p>
                    </div>
                </li>
                <?php } ?>
                <?php if($course['university']['univ_type'] <> ''){ ?>
                <li>
                    <span class="icon-stack pull-left"><em class="fa fa-asterisk"></em></span>

                    <div class="text">
                        <span>University Type</span>

                        <p><?php echo $course['university']['univ_type']; ?></p>
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