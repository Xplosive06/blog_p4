<body>

  <!-- Page Header -->
  <header class="new-header contact-header" style='background-image: url("<?php echo IMG.'contact-bg.jpg'?>")'>
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="page-heading page-heading-contact">
          <h1>Contactez moi</h1>
          <span class="subheading">Vous avez des questions ? J'ai des réponses.</span>
        </div>
      </div>
    </div>
  </div>
</header>
<hr>

<!-- Main Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      <p><strong>Vous voulez entrer en contact ? Remplissez le formulaire et je reviendrais vers vous dés que possible !</strong></p>
      <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
      <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
      <!-- To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
      <form name="sentMessage" id="contactForm" novalidate="">
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label>Nom</label>
            <input type="text" class="form-control" placeholder="Nom" id="name" required="" data-validation-required-message="Merci d'entrer votre nom.">
          </div>
        </div>
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label>Adresse e-mail</label>
            <input type="email" class="form-control" placeholder="Adresse e-mail" id="email" required="" data-validation-required-message="Merci d'entrer votre adresse e-mail.">
          </div>
        </div>
        <div class="control-group">
          <div class="form-group col-xs-12 floating-label-form-group controls">
            <label>Numéro de téléphone</label>
            <input type="tel" class="form-control" placeholder="Numéro de téléphone" id="phone" required="" data-validation-required-message="Merci d'entrer votre numéro de téléphone.">
          </div>
        </div>
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label>Message</label>
            <textarea rows="5" class="form-control" placeholder="Message" id="message" required="" data-validation-required-message="Merci d'entrer votre message."></textarea>
          </div>
        </div>
        <br>
        <div id="success"></div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary" id="sendMessageButton">Envoyer</button>
        </div>
      </form>
    </div>
  </div>
</div>

<hr>