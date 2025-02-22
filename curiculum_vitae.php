<?php
include 'config.php';
$url_publik = $_GET['id'];
$result = mysqli_query($mysqli, "SELECT * FROM msmhs WHERE url_publik='$url_publik'");
while ($data = mysqli_fetch_array($result)) {
    $nama = $data['NMMHSMSMHS'];
    $tempat_lahir = $data['TPLHRMSMHS'];
    $tanggal_lahir = date('d-m-Y', strtotime(date($data['TGLHRMSMHS'])));
    $alamat_sekarang = $data['ALAMATYOGYA'];
    $alamat_asal = $data['ALAMATLENGKAP'];
    $telp = $data['TELP'];
    $status_telp = $data['TELP_PUBLISH'];
    $email = $data['EMAIL'];
    $jk = $data['KDJEKMSMHS'];
    $th_masuk = $data['TAHUNMSMHS'];
    $th_keluar = $data['BTSTUMSMHS'];
    $th_lulus = substr($th_keluar, 0, -1);
    $tgl_trans = $data['tgl_lulus'];
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>RESUME - <?php echo $nama; ?>, A.Md</title>

        <!-- favicon -->
        <link href="favicon.png" rel=icon>

        <!-- web-fonts -->
        <link href="https://fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet">

        <!-- font-awesome -->
        <link href="public/css/font-awesome.min.css" rel="stylesheet">

        <!-- Bootstrap -->
        <link href="public/css/bootstrap.min.css" rel="stylesheet">

        <!-- Style CSS -->
        <link href="public/css/style.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body id="page-top" data-spy="scroll" data-target=".navbar">
        <div id="main-wrapper">
            <!-- Page Preloader -->
            <div id="preloader">
                <div id="status">
                    <div class="status-mes"></div>
                </div>
            </div>

            <div class="columns-block container">
                <div class="left-col-block blocks">
                    <header class="header theiaStickySidebar">
                        <?php
                        $hash = md5(strtolower(trim($email)));
                        $size = 350;
                        $grav_url = "https://www.gravatar.com/avatar/" . $hash . "?s=" . $size;
                        ?>
                        <div class="profile-img">
                            <img src="<?php echo $grav_url; ?>" class="img-responsive" alt=""/>
                        </div>
                        <div class="content">
                            <h2><?php echo $nama; ?>, A.Md</h2>
                            <span class="lead">Marketing Consultant</span>

                            <div class="about-text">
                                <p>
                                    Credibly embrace visionary internal or "organic" sources and business benefits. Collaboratively
                                    integrate efficient portals rather than customized customer service. Assertively deliver
                                    frictionless services via leveraged interfaces. Conveniently evisculate accurate sources and
                                    process-centric expertise.
                                </p>

                                <p>Energistically fabricate customized imperatives through cooperative catalysts for change.</p>


                                <p><img src="img/Signature.png" alt="" class="img-responsive"/></p>
                            </div>


                            <ul class="social-icon">
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-slack" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>

                    </header>
                    <!-- .header-->
                </div>
                <!-- .left-col-block -->


                <div class="right-col-block blocks">
                    <div class="theiaStickySidebar">
                        <section class="expertise-wrapper section-wrapper gray-bg">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="section-title">
                                            <h2>Expertise</h2>
                                        </div>
                                    </div>
                                </div>
                                <!-- .row -->

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="expertise-item">
                                            <h3>Professionally drive</h3>

                                            <p>
                                                Synergistically strategize customer directed resources rather than principle.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="expertise-item">
                                            <h3>Seamlessly leverage </h3>

                                            <p>
                                                Quickly repurpose reliable customer service with orthogonal ideas. Competently.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="expertise-item">
                                            <h3>Interactively incubate</h3>

                                            <p>
                                                Interactively myocardinate high standards in initiatives rather than next-generation.
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="expertise-item">
                                            <h3>Globally streamline</h3>

                                            <p>
                                                Dynamically initiate client-based convergence vis-a-vis performance based. </p>
                                        </div>
                                    </div>

                                </div>


                            </div>
                        </section>
                        <!-- .expertise-wrapper -->

                        <section class="section-wrapper skills-wrapper">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="section-title">
                                            <h2>Skills</h2>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="progress-wrapper">

                                            <div class="progress-item">
                                                <span class="progress-title">Marketing</span>

                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="62" aria-valuemin="0"
                                                         aria-valuemax="100" style="width: 62%"><span class="progress-percent"> 62%</span>
                                                    </div>
                                                </div>
                                                <!-- .progress -->
                                            </div>
                                            <!-- .skill-progress -->


                                            <div class="progress-item">
                                                <span class="progress-title">Market Research</span>

                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0"
                                                         aria-valuemax="100" style="width: 90%"><span class="progress-percent"> 90%</span>
                                                    </div>
                                                </div>
                                                <!-- /.progress -->
                                            </div>
                                            <!-- /.skill-progress -->


                                            <div class="progress-item">
                                                <span class="progress-title">Organisational Skills</span>

                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0"
                                                         aria-valuemax="100" style="width: 75%;"><span class="progress-percent"> 75%</span>
                                                    </div>
                                                </div>
                                                <!-- /.progress -->
                                            </div>
                                            <!-- /.skill-progress -->

                                            <div class="progress-item">
                                                <span class="progress-title">Communtcation Skills</span>

                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="55" aria-valuemin="0"
                                                         aria-valuemax="100" style="width: 55%;"><span class="progress-percent"> 55%</span>
                                                    </div>
                                                </div>
                                                <!-- /.progress -->
                                            </div>
                                            <!-- /.skill-progress -->
                                            <div class="progress-item">
                                                <span class="progress-title">Project Management</span>

                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="55" aria-valuemin="0"
                                                         aria-valuemax="100" style="width: 80%;"><span class="progress-percent"> 80%</span>
                                                    </div>
                                                </div>
                                                <!-- .progress -->
                                            </div>
                                            <!-- .skill-progress -->

                                        </div>
                                        <!-- /.progress-wrapper -->
                                    </div>
                                </div>
                                <!--.row -->
                            </div>
                            <!-- .container-fluid -->
                        </section>
                        <!-- .skills-wrapper -->

                        <section class="section-wrapper section-experience gray-bg">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="section-title"><h2>Work Experience</h2></div>
                                    </div>
                                </div>
                                <!--.row-->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="content-item">
                                            <small>2015 - Present</small>
                                            <h3>Head of market research</h3>
                                            <h4>Computer & Motor Ltd.</h4>

                                            <p>United Kingdom, London</p>
                                        </div>
                                        <!-- .experience-item -->
                                        <div class="content-item">
                                            <small>2012 - 2015</small>
                                            <h3>Media Analyst</h3>
                                            <h4>BizzNiss</h4>

                                            <p>United Kingdom, London</p>
                                        </div>
                                        <!-- .experience-item -->
                                        <div class="content-item">
                                            <small>2010 - 2012</small>
                                            <h3>Budget Administrator</h3>
                                            <h4>Somsom LLC</h4>

                                            <p>United Kingdom, London</p>
                                        </div>
                                        <!-- .experience-item -->
                                    </div>
                                </div>
                                <!--.row-->
                            </div>
                            <!-- .container-fluid -->

                        </section>
                        <!-- .section-experience -->

                        <section class="section-wrapper section-education">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="section-title"><h2>Education</h2></div>
                                    </div>
                                </div>
                                <!--.row-->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="content-item">
                                            <small>2010 - 2012</small>
                                            <h3>MA Product Design</h3>
                                            <h4>University of California</h4>

                                            <p>United Kingdom, London</p>
                                        </div>
                                        <!-- .experience-item -->
                                        <div class="content-item">
                                            <small>2007 - 2010</small>
                                            <h3>Business marketing course</h3>
                                            <h4>Royal Academy of Business</h4>

                                            <p>United Kingdom, London</p>
                                        </div>
                                        <!-- .experience-item -->
                                        <div class="content-item">
                                            <small>2002 - 2006</small>
                                            <h3>BA (Hons) Design</h3>
                                            <h4>University of Michigan</h4>

                                            <p>United Kingdom, London</p>
                                        </div>
                                        <!-- .experience-item -->
                                    </div>
                                </div>
                                <!--.row-->
                            </div>
                            <!-- .container-fluid -->

                        </section>
                        <!-- .section-education -->

                        <section class="section-wrapper section-interest gray-bg">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="section-title">
                                            <h2>Interest</h2>
                                        </div>
                                    </div>
                                </div>
                                <!-- .row -->

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="content-item">
                                            <h3>Books</h3>

                                            <p>Proactively extend market-driven e-tailers rather than enterprise-wide supply chains.
                                                Collaboratively embrace 24/7 processes rather than adaptive users. Seamlessly monetize
                                                alternative e-business.</p>
                                        </div>
                                        <div class="content-item">
                                            <h3>Sports</h3>

                                            <p>Assertively grow optimal methodologies after viral technologies. Appropriately develop
                                                frictionless technology for adaptive functionalities. Competently iterate functionalized
                                                networks for best-of-breed services.</p>

                                        </div>
                                        <div class="content-item">
                                            <h3>Art</h3>

                                            <p>Dramatically utilize superior infomediaries whereas functional core competencies.
                                                Enthusiastically repurpose synergistic vortals for customer directed portals. Interactively
                                                pursue sustainable leadership via.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- .row -->

                            </div>
                        </section>
                        <section class="section-contact section-wrapper gray-bg">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="section-title">
                                            <h2>Contact</h2>
                                        </div>
                                    </div>
                                </div>
                                <!--.row-->
                                <div class="row">
                                    <div class="col-md-12">
                                        <address>
                                            <strong>Address</strong><br>
                                            <?php echo $alamat_asal; ?>

                                        </address>
                                        <address>
                                            <strong>Phone Number</strong><br>
                                            <?php echo $telp; ?>
                                        </address>

                                        <address>
                                            <strong>Mobile Number</strong><br>
                                            <?php echo $telp; ?>
                                        </address>


                                        <address>
                                            <strong>Email</strong><br>
                                            <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
                                        </address>
                                    </div>
                                </div>
                                <!--.row-->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="feedback-form">
                                            <h2>Get in touch</h2>

                                            <form id="contactForm" action="sendemail.php" method="POST">
                                                <div class="form-group">
                                                    <label for="InputName">Name</label>
                                                    <input type="text" name="name" required="" class="form-control" id="InputName"
                                                           placeholder="Full Name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="InputEmail">Email address</label>
                                                    <input type="email" name="email" required="" class="form-control" id="InputEmail"
                                                           placeholder="Email">
                                                </div>
                                                <div class="form-group">
                                                    <label for="InputSubject">Subject</label>
                                                    <input type="text" name="subject" class="form-control" id="InputSubject"
                                                           placeholder="Subject">
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="control-label">Message</label>
                                                    <textarea class="form-control" rows="4" required="" name="message" id="message-text"
                                                              placeholder="Write message"></textarea>
                                                </div>

                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </form>
                                        </div>
                                        <!-- .feedback-form -->


                                    </div>
                                </div>
                            </div>
                            <!--.container-fluid-->
                        </section>
                        <!--.section-contact-->

                        <footer class="footer">
                            <div class="copyright-section">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="copytext">&copy; Resumex. All rights reserved | Design By: <a
                                                    href="https://themehippo.com">themehippo</a></div>
                                        </div>
                                    </div>
                                    <!--.row-->
                                </div>
                                <!-- .container-fluid -->
                            </div>
                            <!-- .copyright-section -->
                        </footer>
                        <!-- .footer -->
                    </div>
                    <!-- Sticky -->
                </div>
                <!-- .right-col-block -->
            </div>
            <!-- .columns-block -->
        </div>
        <!-- #main-wrapper -->

        <!-- jquery -->
        <script src="public/js/jquery-2.1.4.min.js"></script>

        <!-- Bootstrap -->
        <script src="public/js/bootstrap.min.js"></script>
        <script src="public/js/theia-sticky-sidebar.js"></script>
        <script src="public/js/scripts.js"></script>
    </body>
</html>
