$(document).ready(function() {
  // Form Validation
  $(function() {
    $("input#submit").on("click", function(e) {
      var form = $("#CertForm")[0];
      var isValid = form.checkValidity();
      console.log("checked");
      if (!isValid) {
        e.preventDefault();
        e.stopPropagation();
        console.log("failed");
        form.classList.add('was-validated');
      } else {
        $.ajax({
          type: "POST",
          url: "process.php", //
          data: $('form.contact').serialize(),
          success: function(msg) {
            $("#thanks").html(msg)
            $("#form-content").modal('hide');
          },
          // Email send error
          error: function() {
            alert("Email send error");
            return form;
          }
        });
        console.log("passed");
        // Activatte Response Modal
        $('#form-content')
            .modal('hide')
            .on('hidden.bs.modal', function(e) {
              $('#response').modal('show');

              $(this).off('hidden.bs.modal') // Remove the 'on' event binding
                .find('form')[0].reset();
            });
        console.log("sent");
      }
    });
  });

  // First Modal action with one modal
  // $('.modal').on('hidden.bs.modal', function() {
  //   $(this).find('form')[0].reset();
  // });

  // // Second Modal Action
  // $('#thanks').click(function(e) {
  //   e.preventDefault();
  //
  //   $('#form-content')
  //     .modal('hide')
  //     .on('hidden.bs.modal', function(e) {
  //       $('#response').modal('show');
  //
  //       $(this).off('hidden.bs.modal') // Remove the 'on' event binding
  //         .find('form')[0].reset();
  //     });
  // });

  // $("#form-content").change(function () {
  //       $("#response").modal("hide");
  //       $("#input#submit").modal("show");
  //
  //   });

});
