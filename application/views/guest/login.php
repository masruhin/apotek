<!DOCTYPE html>
<html>

<head>
  <title>Pharmacist</title>
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/stylesheets/style.css" />
  <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a81368914c.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>
  <img class="wave" src="<?php echo base_url() ?>assets/images/wave.png">
  <div class="container">
    <div class="img">
      <img src="<?php echo base_url() ?>assets/images/obat.svg">
    </div>
    <div class="login-content">
      <?php echo form_open('login/authlogin', ' id="Formulir" '); ?>
      <img src="<?php echo base_url() ?>assets/images/avatar.svg">
      <h2 class="title">Selamat Datang!</h2>
      <div class="input-div one">
        <div class="i">
          <i class="fas fa-user"></i>
        </div>
        <div class="div">
          <h5>Masukan Email / Username</h5>
          <input name="username" type="text" class="input">
        </div>
      </div>
      <div class="input-div pass">
        <div class="i">
          <i class="fas fa-lock"></i>
        </div>
        <div class="div">
          <h5>Masukan Password</h5>
          <input name="password" type="password" class="input">
        </div>
      </div>
      <button type="submit" class="btn btn-primary btn-block btn-lg" id="submitform">Login</button>

      </form>
    </div>
  </div>
  <script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor/pnotify/pnotify.custom.js"></script>
  <script src="<?php echo base_url() ?>assets/javascripts/theme.init.js"></script>
  <script>
    const inputs = document.querySelectorAll(".input");

    function addcl() {
      let parent = this.parentNode.parentNode;
      parent.classList.add("focus");
    }

    function remcl() {
      let parent = this.parentNode.parentNode;
      if (this.value == "") {
        parent.classList.remove("focus");
      }
    }


    inputs.forEach(input => {
      input.addEventListener("focus", addcl);
      input.addEventListener("blur", remcl);
    });
  </script>
  <script>
    document.getElementById("Formulir").addEventListener("submit", function(e) {
      blurForm();
      $('.help-block').hide();
      $('.form-group').removeClass('has-error');
      document.getElementById("submitform").setAttribute('disabled', 'disabled');
      $('#submitform').html('Loading ...');
      var form = $('#Formulir')[0];
      var formData = new FormData(form);
      var xhrAjax = $.ajax({
        type: 'POST',
        url: $(this).attr('action'),
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        dataType: 'json'
      }).done(function(data) {
        if (!data.success) {
          $('input[name=<?php echo $this->security->get_csrf_token_name(); ?>]').val(data.token);
          window.setTimeout(function() {
            document.getElementById("submitform").removeAttribute('disabled');
            $('#submitform').html('Login');
            var objek = Object.keys(data.errors);
            for (var key in data.errors) {
              if (data.errors.hasOwnProperty(key)) {
                var msg = '<div class="help-block" for="' + key + '">' + data.errors[key] + '</span>';
                $('.' + key).addClass('has-error');
                $('input[name="' + key + '"]').after(msg);
              }
            }
          }, 500);
          return false;
        } else {
          $('input[name=<?php echo $this->security->get_csrf_token_name(); ?>]').val(data.token);
          PNotify.removeAll();
          document.getElementById("submitform").removeAttribute('disabled');
          document.getElementById("Formulir").reset();
          $('#submitform').html('Login');
          new PNotify({
            title: 'Notifikasi',
            text: data.message,
            type: 'success'
          });
          window.location = '<?php echo base_url() ?>' + data.beranda;
        }
      }).fail(function(data) {
        document.getElementById("submitform").removeAttribute('disabled');
        $('#submitform').html('Login');
        new PNotify({
          title: 'Notifikasi',
          text: "Request gagal, browser akan direload",
          type: 'danger'
        });
        window.setTimeout(function() {
          location.reload();
        }, 2000);
      });
      e.preventDefault();
    });
  </script>
</body>

</html>