<div class="container_contact">
  <div class="contact-form">
    <div class="contact-loading"></div>
    <div class="contact-title">Formulaire de contact 
    </div>
    <form action="" method="">
      <fieldset class="field">
        <label for="name">Nom*</label>
        <input data-input="contact" type="text" id="name" name="nom" required/>
      </fieldset>
      <fieldset class="field">
        <label for="name">Prénom*</label>
        <input data-input="contact" type="text" id="name" name="prenom" required/>
      </fieldset>
      <fieldset class="field">
        <label for="email">Email*</label>
        <input data-input="contact" type="text" id="email" name="email" required/>
      </fieldset>
      <fieldset class="field">
        <label for="telephone">Téléphone*</label>
        <input data-input="contact" type="text" id="email" name="telephone" required/>
      </fieldset>
      <fieldset class="field">
        <label for="msg">Message*</label>
        <textarea data-input="contact" type="text" id="msg" name="message" required></textarea>
      </fieldset>
      <button class="btn-send" type="button"><span>Envoyer</span></button>
    </form>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
    $(document).ready(function() {
  var Contact = function(settings) {
    this.sendBtn = $(settings.btn);
    this.overlay = $(settings.overlay);
    this.form = $(settings.form);
    this.inputs = $('[data-input="contact"]');
  };

  Contact.prototype = {
    constructor: Contact,
    init: function() {
      this.eventManager()
    },
    deleteMsg: function() {
      var msg = $('.success');
      if (msg) {
        var delTimeout = setTimeout(function() {
          msg.remove();
          clearTimeout(delTimeout);
        }, 2000);
      }
    },
    eventManager: function() {
      var _this = this;
      var sendTimeout;
      this.sendBtn.on('click', onBtnClickHandler);

      function onBtnClickHandler(evt) {
        var $this = $(this);
        var $success = _this.form.find('.success');
        if ($success.length) {
          $success.remove();
        }

        $this.addClass('sending');
        _this.form.addClass('sending');
        _this.overlay.addClass('show');
        if (sendTimeout) {
          clearTimeout(sendTimeout);
        };
        sendTimeout = setTimeout(function() {
          $('<p class="success">Message envoyé. Merci.</p>').insertBefore($this);
          $this.removeClass('sending');
          _this.form.removeClass('sending');
          _this.overlay.removeClass('show');
          _this.inputs.val('')
          _this.deleteMsg();

        }, 4000);
      };
    }
  }

  var contact = new Contact({
    btn: '.btn-send',
    overlay: '.contact-loading',
    form: '.contact-form'
  }).init();
});
</script>
