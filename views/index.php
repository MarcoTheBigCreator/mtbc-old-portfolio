<!DOCTYPE html>
<html lang="en">

<?php
// Require resources 
require_once '../config/conexion.php'; 

$genInfoQuery = "select * from geninfo where language = 'en'";
$genInfo = mysqli_query($conexion,$genInfoQuery);

$codeSkillsQuery= "select * from codingskills";
$codeSkills = mysqli_query($conexion,$codeSkillsQuery);

$designSkillsQuery= "select * from designskills where language = 'en'";
$designSkills = mysqli_query($conexion,$designSkillsQuery);

$frameworksQuery = "select * from frameworks";
$frameworks = mysqli_query($conexion, $frameworksQuery);

$educationQuery= "select * from education where language = 'en'";
$education = mysqli_query($conexion,$educationQuery); 

$experienceQuery= "select * from experience where language = 'en'";
$experience = mysqli_query($conexion,$experienceQuery); 

$servicesQuery= "select * from services where language = 'en'";
$services = mysqli_query($conexion,$servicesQuery);

$datafilterQuery= "select * from datafilter where language = 'en'";
$datafilter = mysqli_query($conexion,$datafilterQuery);

$portfolioQuery= "select * from portfolio where language = 'en'";
$portfolio = mysqli_query($conexion,$portfolioQuery);  



include 'head.php';
?>

<body class="theme-red">

    <div class="preloader">
        <div class="loader"></div>
    </div>

    <!-- Back to top button -->
    <div class="btn-back_to_top">
        <span class="ti-arrow-up"></span>
    </div>

    <?php 
    include 'nav.php';
    ?>

    
        <!-- Caption header -->
        <div class="caption-header text-center wow zoomInDown">
            <h5 class="fw-normal">Hi, welcome</h5>
            <h1 class="fw-light mb-4">I'm <b class="fg-name">Marco</b> Rodriguez</h1>
            <div class="badge">Web & Software Developer</div>
        </div>
        <!-- End Caption header -->
        <div class="floating-button"><span class="ti-mouse"></span></div>
    </div>
    <!-- Caption header -->
    <div class="vg-page page-about" id="about">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-4 py-3">
                    <div class="img-place wow fadeInUp">
                        <img src="../public/assets/img/profile.jpg " alt="">
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-1 wow fadeInRight">
                    <h1 class="fw-light">Marco Antonio Rodriguez Arreola</h1>
                    <h5 class="fg-theme mb-3">Web & Software Developer</h5>
                    <p class="text-muted">
                    <?php foreach($genInfo as $row){ ?>
                        <?php echo $row['description'];?>
                        </p>
                        <?php } ?>
                    <ul class="theme-list">
                        <li><b>From:</b>
                        <?php foreach($genInfo as $row){ ?>
                        <?php echo $row['location'];?>
                        </li>
                        <?php } ?>
                        <li><b>Lives In:</b>
                        <?php foreach($genInfo as $row){ ?>
                        <?php echo $row['clocation'];?>
                        </li>
                        <?php } ?>
                        <li><b>Age:</b>
                        <?php foreach($genInfo as $row){ ?>
                        <?php echo $row['age'];?>
                        </li>
                        <?php } ?>  
                        <li><b>Gender:</b>
                        <?php foreach($genInfo as $row){ ?>
                        <?php echo $row['gender'];?>
                        </li>
                        <?php } ?>
                    </ul>
                    <a href="https://drive.google.com/uc?export=download&id=1aVwYBINs6-ODay_qqQaNROz1T6Xib0TM">
                    <button class="btn btn-theme-outline">Download CV</button>
                    </a>
                </div>
            </div>
        </div>
        <!-- End Caption header -->
        <div class="container py-5">
            <h1 class="text-center fw-normal wow fadeIn">My Skills</h1>
            <div class="row py-3 mt-4">
                <div class="col-sm mt-3">
                    <div class="px-lg-3">
                        <h4 class="wow fadeInUp">Coding Skills</h4>
                        <div class="progress-wrapper wow fadeInUp">
                            <?php foreach($codeSkills as $row){ ?>
                            <span class="caption"><?php echo $row['language'];?></span>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: <?php echo $row['percentage'];?>%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"><?php echo $row['percentage'];?>%</div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm mt-3">
                    <div class="px-lg-3">
                        <h4 class="wow fadeInUp">Design Skills</h4>
                        <div class="progress-wrapper wow fadeInUp">
                            <?php foreach($designSkills as $row){ ?>
                            <span class="caption"><?php echo $row['skill'];?></span>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: <?php echo $row['percentage'];?>%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"><?php echo $row['percentage'];?>%</div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm mt-3">
                    <div class="px-lg-3">
                        <h4 class="wow fadeInUp">Web Development</h4>
                        <div class="progress-wrapper wow fadeInUp">
                            <?php foreach($frameworks as $row){ ?>
                            <span class="caption"><?php echo $row['framework'];?></span>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: <?php echo $row['percentage'];?>%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"><?php echo $row['percentage'];?>%</div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container pt-5">
            <div class="row">
                <div class="col-md-6 wow fadeInRight">
                    <h2 class="fw-normal">Education</h2>
                    <ul class="timeline mt-4 pr-md-5">
                        <?php foreach($education as $row){ ?>
                            <li>
                                <div class="title"><?php echo $row['date'];?></div>
                                <div class="details">
                                    <h5><?php echo $row['title'];?></h5>
                                    <small class="fg-theme"><?php echo $row['nameschool'];?></small>
                                    <p><?php echo $row['description'];?></p>
                                </div>
                        <?php } ?>
                            </li>
                    </ul>
                </div>
                <div class="col-md-6 wow fadeInRight" data-wow-delay="200ms">
                    <h2 class="fw-normal">Experience</h2>
                    <ul class="timeline mt-4 pr-md-5">
                        <?php foreach($experience as $row){ ?>
                            <li>
                                <div class="title"><?php echo $row['date'];?></div>
                                <div class="details">
                                    <h5><?php echo $row['title'];?></h5>
                                    <small class="fg-theme"><?php echo $row['namejob'];?></small>
                                    <p><?php echo $row['description'];?></p>
                                </div>
                        <?php } ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="vg-page page-service">
        <div class="container">
            <div class="text-center wow fadeInUp">
                <div class="badge badge-subhead">Service</div>
            </div>
            <h1 class="fw-normal text-center wow fadeInUp">What can I do?</h1>
            <div class="row mt-5">
                    <?php foreach($services as $row){ ?>
                        <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="card card-service wow fadeInUp">
                            <div class="icon">
                                <span class="<?php echo $row['icon'];?>"></span>
                            </div>
                            <div class="caption">
                                <h4 class="fg-theme"><?php echo $row['service'];?></h4>
                                <p><?php echo $row['description'];?></p>
                            </div>
                        </div>
                        </div>
                    <?php } ?>
            </div>
        </div>
    </div>

    <!-- Portfolio page -->
    <div class="vg-page page-portfolio" id="portfolio">
        <div class="container">
            <div class="text-center wow fadeInUp">
                <div class="badge badge-subhead">Portfolio</div>
            </div>
            <h1 class="text-center fw-normal wow fadeInUp">See my work!</h1>
            <div class="filterable-button py-3 wow fadeInUp" data-toggle="selected">
                <button class="btn btn-theme-outline selected" data-filter="*">All</button>
                <?php foreach($datafilter as $row){ ?>
                    <button class="btn btn-theme-outline" data-filter="<?php echo $row['class'];?>">
                    <?php echo $row['filter'];?>
                    <?php } ?>
                </button>
            </div>

            <div class="gridder my-3">
                    <?php foreach($portfolio as $row){ ?>
                        <div class="grid-item <?php echo $row['class'];?> wow zoomIn zoom">
                        <a href="<?php echo $row['link'];?>" target="blank">
                        <div class="img-place">
                            <img src="<?php echo $row['imgroute'];?>" alt="">
                            <div class="img-caption">
                                <h5 class="fg-theme"><?php echo $row['name'];?></h5>
                                <p><?php echo $row['description'];?></p>
                            </div>
                        </div>
                        </a>
                        </div>
                    <?php } ?>
            </div>
            <!-- End gridder -->

            <!--<div class="text-center wow fadeInUp">
                <a href="javascript:void(0)" class="btn btn-theme">Load More</a>
            </div>-->
        </div>
    </div>
    <!-- End Portfolio page -->

    <!-- Contact -->
    <div class="vg-page page-contact" id="contact">
        <div class="container">
            <div class="text-center wow fadeInUp">
                <div class="badge badge-subhead">Contact</div>
            </div>
            <h1 class="text-center fw-normal wow fadeInUp">Get in touch!</h1>
            <div class="row py-5">
                <div class="col-lg-5 pl-5 mr-5 wow fadeInUp">
                    <div class="col-lg-5 contactme" style="display: flex;">
                        <div>
                            <i class="fa fa-whatsapp fa-3x iconc"></i>
                        </div>
                        <div style="padding-top: 3px;">
                            <h3>WhatsApp</h3>
                            <span>(+52) 618 265 1796</span>
                        </div>
                    </div>
                    <div class="col-lg-5 contactme" style="display: flex;">
                        <div>
                            <i class="fa fa-google fa-3x iconc"></i>
                        </div>
                        <div>
                            <h3>Email</h3>
                            <span>marcotbcreator@gmail.com</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 pl-5 ml-5">
                    <form class="vg-contact-form" action="email.php" method="POST">
                        <div class="form-row">
                            <div class="col-12 mt-3 wow fadeInUp">
                                <input class="form-control" type="text" name="name" placeholder="Your Name" id="name">
                            </div>
                            <div class="col-6 mt-3 wow fadeInUp">
                                <input class="form-control" type="text" name="subject" placeholder="Subject" id="subject">
                            </div>
                            <div class="col-6 mt-3 wow fadeInUp">
                                <input class="form-control" type="text" name="email" placeholder="Email Address" id="email">
                            </div>
                            <div class="col-12 mt-3 wow fadeInUp">
                                <textarea class="form-control" name="message" rows="6" placeholder="Enter message here..." id="message"></textarea>
                            </div>
                            <button type="submit" class="btn btn-theme mt-3 wow fadeInUp ml-1">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Contact -->

    <?php 
    include 'footer.php';
    ?>

    <?php 
    include 'js.php';
    ?>

</body>

</html>