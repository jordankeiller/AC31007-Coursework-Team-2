<!DOCTYPE html>
<html lang="en-US">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
  <title>Quiz - Questionnaire Extraordinare</title>
  <link rel="stylesheet" href="assets/css/main.css">
  <link rel="stylesheet" href="assets/css/consentStyleSheet.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container px-4">
    <a class="navbar-brand" href="index.html">Questionnaire Extraordinare</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.html">Home</a>
        </li>
		<li class="nav-item">
          <a class="nav-link" aria-current="page" href="createquestionnaire.php">Quiz Creator</a>
        </li>
      </ul>
      <div class="d-flex">
        <a class="btn btn-outline-light" href="login.php">Log In</a>
      </div>
    </div>
  </div>
</nav>
  <?php
include "assets/php/GLOBAL_CONFIG.php";
?>
<div class="container bg-white px-4">
    <div class="row">
        <div class="col">
            <h1 class="text-primary fw-bold mt-3 mb-0">Understanding Subtitle Usage</h1>
            <form class="px-1" action="assets/php/questionnaire_processing.php" method="post">
                <?php include "assets/php/questionnaire_questions.php" ?>
                <input id="submit" name="submit" class="btn btn-lg btn-primary my-4" type="submit" value="Submit">
            </form>
        </div>
    </div>
</div>
<div id="overlay">
    <div class="container px-4">
        <div class="row">
            <div class="col">
                <h1 class="text-primary fw-bold">Consent Form</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore
                    magna
                    aliqua. Nisi est sit amet facilisis magna. Aliquet risus feugiat in ante metus. Enim praesent
                    elementum
                    facilisis
                    leo
                    vel fringilla est ullamcorper. Tempus iaculis urna id volutpat. Consequat id porta nibh venenatis
                    cras sed
                    felis.
                    Eu
                    volutpat odio facilisis mauris. Arcu vitae elementum curabitur vitae nunc sed velit. Dui sapien eget
                    mi proin
                    sed
                    libero enim. Maecenas ultricies mi eget mauris pharetra. Sagittis nisl rhoncus mattis rhoncus urna
                    neque
                    viverra
                    justo. Eu scelerisque felis imperdiet proin fermentum. Cum sociis natoque penatibus et magnis dis
                    parturient
                    montes.
                    Blandit turpis cursus in hac habitasse platea. Netus et malesuada fames ac turpis egestas integer
                    eget.

                    Accumsan tortor posuere ac ut. Lorem donec massa sapien faucibus et molestie ac feugiat. A arcu
                    cursus vitae
                    congue
                    mauris rhoncus aenean vel elit. Sed velit dignissim sodales ut. Nisl tincidunt eget nullam non nisi
                    est sit
                    amet
                    facilisis. Amet risus nullam eget felis. Viverra nibh cras pulvinar mattis nunc sed blandit libero
                    volutpat.
                    Eget
                    arcu
                    dictum varius duis at consectetur lorem donec massa. Mattis aliquam faucibus purus in massa tempor
                    nec
                    feugiat.
                    Vestibulum lectus mauris ultrices eros in. Sed vulputate odio ut enim. Fusce id velit ut tortor
                    pretium.

                    Iaculis eu non diam phasellus. Lorem ipsum dolor sit amet consectetur. Nunc aliquet bibendum enim
                    facilisis
                    gravida
                    neque convallis a. Justo nec ultrices dui sapien eget. Ut porttitor leo a diam. Eleifend donec
                    pretium
                    vulputate
                    sapien nec sagittis aliquam malesuada. Elementum nibh tellus molestie nunc. Non nisi est sit amet
                    facilisis
                    magna
                    etiam. Rhoncus dolor purus non enim praesent elementum facilisis leo vel. Egestas sed tempus urna et
                    pharetra
                    pharetra
                    massa. Ligula ullamcorper malesuada proin libero nunc consequat interdum varius sit. Non diam
                    phasellus
                    vestibulum
                    lorem sed risus. Ipsum dolor sit amet consectetur adipiscing elit duis. Euismod in pellentesque
                    massa placerat
                    duis
                    ultricies lacus sed turpis. Magna fermentum iaculis eu non diam phasellus vestibulum lorem.

                    Tincidunt arcu non sodales neque sodales ut. Consectetur adipiscing elit duis tristique sollicitudin
                    nibh sit
                    amet.
                    Purus in massa tempor nec feugiat nisl pretium fusce id. Sem integer vitae justo eget. Congue
                    quisque egestas
                    diam
                    in.
                    Non consectetur a erat nam at lectus urna duis. Sagittis nisl rhoncus mattis rhoncus urna. Libero
                    justo
                    laoreet
                    sit
                    amet cursus sit amet dictum sit. Eget egestas purus viverra accumsan in nisl nisi scelerisque eu.
                    Fringilla
                    urna
                    porttitor rhoncus dolor purus non. Mattis ullamcorper velit sed ullamcorper. Feugiat in fermentum
                    posuere
                    urna.
                    Faucibus interdum posuere lorem ipsum dolor. Dui ut ornare lectus sit amet est placerat in egestas.
                    Quis
                    hendrerit
                    dolor magna eget est lorem ipsum dolor sit.

                    Ac ut consequat semper viverra nam. In iaculis nunc sed augue lacus viverra vitae. Mi bibendum neque
                    egestas
                    congue
                    quisque egestas diam in. Tincidunt vitae semper quis lectus nulla at volutpat. Tincidunt augue
                    interdum velit
                    euismod
                    in. Commodo odio aenean sed adipiscing diam donec. Montes nascetur ridiculus mus mauris. Nisl
                    suscipit
                    adipiscing
                    bibendum est ultricies integer. Magna fermentum iaculis eu non diam phasellus. Amet porttitor eget
                    dolor
                    morbi.
                    Platea
                    dictumst vestibulum rhoncus est pellentesque elit. Vitae tortor condimentum lacinia quis. Massa
                    sapien
                    faucibus
                    et
                    molestie ac feugiat sed lectus vestibulum. Sit amet commodo nulla facilisi nullam. Pellentesque
                    pulvinar
                    pellentesque
                    habitant morbi tristique senectus et netus. Purus semper eget duis at. Dictum non consectetur a
                    erat.
                    Consequat
                    id
                    porta nibh venenatis cras.</p>
            </div>
        </div>
        <div class="row">
            <div class="col d-flex justify-content-center">
                <button class="btn btn-primary my-4" onclick="hideOverlay('overlay')">I agree to these terms and
                    conditions</button>
            </div>
        </div>
    </div>
</div>
  <script src="https://unpkg.com/@popperjs/core@2.4.0/dist/umd/popper.min.js"></script>
  <script src="assets/js/bootstrap.js"></script>
  <script src="assets/js/hideOverlay.js"></script>
</body>

</html>