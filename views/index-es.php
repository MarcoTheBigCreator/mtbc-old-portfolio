<!DOCTYPE html>
<html lang="en">

<?php
// Require resources 
require_once '../config/conexion.php'; 

$genInfoQuery = "select * from geninfo where language = 'es'";
$genInfo = mysqli_query($conexion,$genInfoQuery);

$codeSkillsQuery= "select * from codingskills";
$codeSkills = mysqli_query($conexion,$codeSkillsQuery);

$designSkillsQuery= "select * from designskills where language = 'es'";
$designSkills = mysqli_query($conexion,$designSkillsQuery);

$frameworksQuery = "select * from frameworks";
$frameworks = mysqli_query($conexion, $frameworksQuery);

$educationQuery= "select * from education where language = 'es'";
$education = mysqli_query($conexion,$educationQuery); 

$experienceQuery= "select * from experience where language = 'es'";
$experience = mysqli_query($conexion,$experienceQuery); 

$servicesQuery= "select * from services where language = 'es'";
$services = mysqli_query($conexion,$servicesQuery);

$datafilterQuery= "select * from datafilter where language = 'es'";
$datafilter = mysqli_query($conexion,$datafilterQuery);

$portfolioQuery= "select * from portfolio where language = 'es'";
$portfolio = mysqli_query($conexion,$portfolioQuery);  



include 'head.php';
?>

<body class="theme-red">

    <!-- Back to top button -->
    <div class="btn-back_to_top">
        <span class="ti-arrow-up"></span>
    </div>

    <?php 
    include 'nav_es.php';
    ?>

    
        <!-- Caption header -->
        <div class="caption-header text-center wow zoomInDown">
            <h5 class="fw-normal">Bievenido</h5>
            <h1 class="fw-light mb-4">Soy <b class="fg-name">Marco</b> Rodríguez</h1>
            <div class="badge">Desarrollador de Software y Páginas Web</div>
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
                    <h1 class="fw-light">Marco Antonio Rodríguez Arreola</h1>
                    <h5 class="fg-theme mb-3">Desarrollador de Software y Páginas Web</h5>
                    <p class="text-muted">
                    <?php foreach($genInfo as $row){ ?>
                        <?php echo $row['description'];?>
                        </p>
                        <?php } ?>
                    <ul class="theme-list">
                        <li><b>De:</b>
                        <?php foreach($genInfo as $row){ ?>
                        <?php echo $row['location'];?>
                        </li>
                        <?php } ?>
                        <li><b>Vivo en:</b>
                        <?php foreach($genInfo as $row){ ?>
                        <?php echo $row['clocation'];?>
                        </li>
                        <?php } ?>
                        <li><b>Edad:</b>
                        <?php foreach($genInfo as $row){ ?>
                        <?php echo $row['age'];?>
                        </li>
                        <?php } ?>  
                        <li><b>Género:</b>
                        <?php foreach($genInfo as $row){ ?>
                        <?php echo $row['gender'];?>
                        </li>
                        <?php } ?>
                    </ul>
                    <a href="https://drive.google.com/uc?export=download&id=1WyXYdTDQ_9gwp0Mel3fHgvFQwuNZiS89">
                    <button class="btn btn-theme-outline">Descargar CV</button>
                    </a>
                </div>
            </div>
        </div>
        <!-- End Caption header -->
        <div class="container py-5">
            <h1 class="text-center fw-normal wow fadeIn">Mis Habilidades</h1>
            <div class="row py-3 mt-5">
                <div class="col-sm mt-3">
                    <div class="px-lg-3">
                        <h4 class="wow fadeInUp">Habilidades de Codificación</h4>
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
                        <h4 class="wow fadeInUp">Habilidades de Diseño</h4>
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
                        <h4 class="wow fadeInUp">Desarrollo Web</h4>
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
                    <h2 class="fw-normal">Educación</h2>
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
                    <h2 class="fw-normal">Experiencia</h2>
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
                <div class="badge badge-subhead">Servicios</div>
            </div>
            <h1 class="fw-normal text-center wow fadeInUp">¿Qué puedo hacer?</h1>
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
                <div class="badge badge-subhead">Portafolio</div>
            </div>
            <h1 class="text-center fw-normal wow fadeInUp">¡Explora mis proyectos!</h1>
            <div class="filterable-button py-3 wow fadeInUp" data-toggle="selected">
                <button class="btn btn-theme-outline selected" data-filter="*">Todo</button>
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
                <div class="badge badge-subhead">Contáctame</div>
            </div>
            <h1 class="text-center fw-normal wow fadeInUp">¡Ponte en contacto!</h1>
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
                            <h3>Correo</h3>
                            <span>marcotbcreator@gmail.com</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 pl-5 ml-5">
                    <form class="vg-contact-form" action="email_es.php" method="POST">
                        <div class="form-row">
                            <div class="col-12 mt-3 wow fadeInUp">
                                <input class="form-control" type="text" name="name" placeholder="Nombre" id="name">
                            </div>
                            <div class="col-6 mt-3 wow fadeInUp">
                                <input class="form-control" type="text" name="subject" placeholder="Asunto" id="subject">
                            </div>
                            <div class="col-6 mt-3 wow fadeInUp">
                                <input class="form-control" type="text" name="email" placeholder="Correo Electrónico" id="email">
                            </div>
                            <div class="col-12 mt-3 wow fadeInUp">
                                <textarea class="form-control" name="message" rows="6" placeholder="Escribe tu mensaje aquí..." id="message"></textarea>
                            </div>
                            <button type="submit" class="btn btn-theme mt-3 wow fadeInUp ml-1">Enviar Mensaje</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Contact -->

    <?php 
    include 'footer_es.php';
    ?>

    <?php 
    include 'js.php';
    ?>

</body>

</html>