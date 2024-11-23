<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Isaac Serhane Portfolio</title>
    <link rel="stylesheet" href="assets/ressources/themify-icons/css/themify-icons.css">
	<link rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" type="computer/png" href="assets/imgs/android-chrome-512x512.png">
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">

    <!-- Page Navbar -->
    <nav class="custom-navbar" data-spy="affix" data-offset-top="20">
        <div class="container">
            <a class="logo" href="#">>_is@ac</a>         
            <ul class="nav">
                <li class="item">
                    <a class="link" href="#home">Home</a>
                </li>
                <li class="item">
                    <a class="link" href="#about">About me</a>
                </li>
                <li class="item">
                    <a class="link" href="#projects">Projects</a>
                </li>
             
                <li class="item">
                    <a class="link" href="#contact">Contact</a>
                </li>
            </ul>
            <a href="javascript:void(0)" id="nav-toggle" class="hamburger hamburger--elastic">
                <div class="hamburger-box">
                  <div class="hamburger-inner"></div>
                </div>
            </a>
        </div>          
    </nav><!-- End of Page Navbar -->

    <!-- page header -->
    <header id="home" class="header">
        <div class="overlay"></div>
        <div class="header-content container">
            <h1 class="header-title">
                <span class="up">Hi, my name is</span>
                <span class="down">Isaac Serhane.</span>
            </h1>
            <p class="header-subtitle">I'm a Web Developer.</p>            

            <a class="btn btn-primary" href="#about">Get started</a>

        </div>              
    </header><!-- end of page header -->

    <section class="section pt-0" id="about">
    <div class="container">
        <div class="row align-items-center">
            <!-- Avatar -->
            <div class="col-md-6">
                <div class="about-avatar text-center">
                    <img src="assets/imgs/real-avatar.png" alt="Avatar" class="avatar-isaac">
                </div>
            </div>
            <!-- Texte -->
            <div class="col-md-6">
                <div class="about-caption">
                    <p class="section-subtitle">Who Am I ?</p>
                    <h2 class="section-title mb-3">About Me</h2>
                    <p>
                    Hello, my name is Isaac Serhane, I'm 19 years old and I am a third year bachelor's student in web development (BUT MMI) at the IUT of Cergy Pontoise (France).
                    I like front-end and back-end programming, I made websites, games and much more...
                    <br><br>
                    In high school, with the Numerics and Computer Science specialization, I also did several projects in this field, which enabled me to put my knowledge into practice and develop my skills.
                     </p>
<a href="assets/pdf/CV_Isaac_SERHANE_Développeur_full_stack.pdf" class="btn-rounded btn btn-outline-primary mt-4" download="CV_Isaac_SERHANE_Développeur_full_stack.pdf" target="_blank">My resume &#x1f1eb;&#x1f1f7;</a>

                </div>
            </div>
        </div>
    </div>

    <section class="section" id="projects">
    <div class="container text-center">
        <h6 class="section-title mb-6">Projects</h6>
        <!-- row -->
        <div class="row">
            <?php
            // Inclure le fichier de connexion à la base de données
            include_once("admin/mysqli_connect.php");
            
            // Récupérer les projets depuis la base de données
            $sql = "SELECT * FROM projects";
            $result = mysqli_query($link, $sql);

            // Vérifier s'il y a des projets à afficher
            if (mysqli_num_rows($result) > 0) {
                // Afficher chaque projet
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="col-md-4">
                 <div class="portfolio-card">
             <a href="<?php echo $row['project_link']; ?>" target="_blank">
                 <img src="<?php echo $row['project_image']; ?>" class="portfolio-card-img" alt="<?php echo $row['project_langages']; ?>">
            <div class="portfolio-card-overlay">
                <div class="portfolio-card-caption">
                    <!-- Afficher les détails du projet -->
                    <h4><?php echo $row['project_langages']; ?></h4>
                    <p class="font-weight-normal"><?php echo $row['project_description']; ?></p>
                </div>
            </div>
        </a>
    </div>
</div>

            <?php 
                }
            } else {
                // Si aucun projet n'est trouvé dans la base de données
                echo "<p>Aucun projet trouvé.</p>";
            }
            ?>
        </div><!-- end of row -->
    </div><!-- end of container -->
</section><!-- end of portfolio section -->


<?php
// Initialisation des variables
$name = isset($_POST['name']) ? $_POST['name'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$message = isset($_POST['message']) ? $_POST['message'] : '';
$confirmation_message = '';

// Traitement du formulaire lorsqu'il est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Envoyer un e-mail de confirmation
    $to = $email;
    $subject = "Confirmation de réception de votre message";
    $confirm_message = "Bonjour $name,\n\nJ'ai bien reçu votre message. Je vous contacterai sous peu.\n\nBien cordialement,\nIsaac Serhane";
    $headers = "From: isaacserhane95@gmail.com";
    mail($to, $subject, $confirm_message, $headers);

    // Envoyer le message reçu par e-mail à votre adresse e-mail
    $to = "isaacserhane95@gmail.com"; // Votre adresse e-mail de réception
    $subject = "Nouveau message de la part de $name";
    $email_message = "Nom: $name\n";
    $email_message .= "E-mail: $email\n";
    $email_message .= "Message:\n$message";
    $headers = "From: $email";

    // Envoyer l'e-mail avec le message reçu
    if (mail($to, $subject, $email_message, $headers)) {
        // Afficher un message de confirmation
        $confirmation_message = "Votre message a été envoyé avec succès.";
    } else {
        // Afficher un message d'erreur si l'envoi d'e-mail échoue
        $confirmation_message = "Une erreur s'est produite lors de l'envoi de votre message. Veuillez réessayer.";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Contactez-moi</title>
    <!-- Vos liens CSS et autres ressources ici -->
</head>
<body>
    <section class="section" id="contact">
        <div class="container text-center">
            <h6 class="section-title mb-5">Contact me</h6>
            <?php if (!empty($confirmation_message)) : ?>
                <!-- Afficher le message de confirmation -->
                <div class="alert alert-success"><?php echo $confirmation_message; ?></div>
            <?php endif; ?>
            <form action="" class="contact-form col-md-10 col-lg-8 m-auto" method="post">
                <div class="form-row">
                    <div class="form-group col-sm-6">
                        <input type="text" size="50" class="form-control" placeholder="Votre Nom" required name="name" value="<?php echo htmlspecialchars($name); ?>">                 
                    </div>
                    <div class="form-group col-sm-6">
                        <input type="email" class="form-control" placeholder="Entrez votre E-mail" required name="email" value="<?php echo htmlspecialchars($email); ?>">                 
                    </div>
                    <div class="form-group col-sm-12">
                        <textarea name="message" id="message" rows="6" class="form-control" placeholder="Écrivez quelque chose"><?php echo htmlspecialchars($message); ?></textarea>
                    </div>
                    <div class="form-group col-sm-12 mt-3">
                        <input type="submit" value="Envoyer le Message" class="btn btn-outline-primary rounded">                  
                    </div>
                </div>  
            </form>
        </div>
    </section>
</body>
</html>

    <!-- footer -->
 <!-- footer -->
 <?php 
// Inclure le fichier de connexion à la base de données
include_once("admin/mysqli_connect.php");

// Récupérer les données des réseaux sociaux depuis la base de données
$sql = "SELECT * FROM social_media";
$result = mysqli_query($link, $sql);

// Vérifier s'il y a des données à afficher
if (mysqli_num_rows($result) > 0) {
    // Stocker les données des réseaux sociaux dans un tableau
    $socialLinks = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $socialLinks[] = array($row['url'], $row['icon_class']);
    }
} 
?>

<div class="container">
    <footer class="footer">       
        <p class="mb-0">Copyright <script>document.write(new Date().getFullYear())</script> &copy; Isaac Serhane</a></p>
        <div class="social-links text-right"> <!-- Nouvelle division pour les liens sociaux -->
            <?php foreach ($socialLinks as $link) { ?>
                <a href="<?php echo $link[0]; ?>" class="link" target="_blank"><i class="<?php echo $link[1]; ?>"></i></a>
                &nbsp; 
            <?php } ?>
        </div>
    </footer>
</div>


	
	<!-- core  -->
    <script src="assets/ressources/jquery/jquery-3.4.1.js"></script>
    <script src="assets/ressources/bootstrap/bootstrap.bundle.js"></script>

    <!-- bootstrap 3 affix -->
	<script src="assets/ressources/bootstrap/bootstrap.affix.js"></script>

    <!-- Script js -->
    <script src="assets/js/script.js"></script>

</body>
</html>
