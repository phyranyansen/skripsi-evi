
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Registration Page (v2)</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url().'assets/bootstrap2/plugins/fontawesome-free/css/all.min.css';?>">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url().'assets/bootstrap2/plugins/icheck-bootstrap/icheck-bootstrap.min.css';?>">
   <!-- Select2 -->
   <link rel="stylesheet" href="<?= base_url().'assets/bootstrap2/plugins/select2/css/select2.min.css';?>">
  <link rel="stylesheet" href="<?= base_url().'assets/bootstrap2/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css';?>">
  
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url().'assets/bootstrap2/dist/css/adminlte.min.css';?>">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../../index2.html" class="h1"><b>S </b>M M</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form id="quickForm" action="<?= base_url().'sign-up'; ?>" method="post">
        <div class="input-group mb-3">
          <label for="username"></label>
          <input type="text" class="form-control" name="username" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="confpassword" class="form-control" placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <a href="<?= base_url().'sign-in'; ?>" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->


<!-- jQuery -->
<script src="<?= base_url().'assets/bootstrap2/plugins/jquery/jquery.min.js';?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url().'assets/bootstrap2/plugins/bootstrap/js/bootstrap.bundle.min.js';?>"></script>
<!-- Select2 -->
<script src="<?= base_url().'assets/bootstrap2/plugins/select2/js/select2.full.min.js';?>"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?= base_url().'assets/bootstrap2/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js';?>"></script>
<!-- InputMask -->
<script src="<?= base_url().'assets/bootstrap2/plugins/moment/moment.min.js';?>"></script>
<script src="<?= base_url().'assets/bootstrap2/plugins/inputmask/jquery.inputmask.min.js';?>"></script>
<!-- date-range-picker -->
<script src="<?= base_url().'assets/bootstrap2/plugins/daterangepicker/daterangepicker.js';?>"></script>
<!-- bootstrap color picker -->
<script src="<?= base_url().'assets/bootstrap2/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js';?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url().'assets/bootstrap2/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js';?>"></script>
<!-- Bootstrap Switch -->
<script src="<?= base_url().'assets/bootstrap2/plugins/bootstrap-switch/js/bootstrap-switch.min.js';?>"></script>
<!-- BS-Stepper -->
<script src="<?= base_url().'assets/bootstrap2/plugins/bs-stepper/js/bs-stepper.min.js';?>"></script>
<!-- dropzonejs -->
<script src="<?= base_url().'assets/bootstrap2/plugins/dropzone/min/dropzone.min.js';?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url().'assets/bootstrap2/dist/js/adminlte.min.js';?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url().'assets/bootstrap2/dist/js/demo.js';?>"></script>
<!-- Page specific script -->
<!-- bs-custom-file-input -->
<script src="<?= base_url().'assets/bootstrap2/plugins/bs-custom-file-input/bs-custom-file-input.min.js';?>"></script>
<!-- jquery-validation -->
<script src="<?= base_url().'assets/bootstrap2/plugins/jquery-validation/jquery.validate.min.js';?>"></script>
<script src="<?= base_url().'assets/bootstrap2/plugins/jquery-validation/additional-methods.min.js';?>"></script>
<script src="<?= base_url().'assets/bootstrap2/plugins/bootstrap/js/bootstrap.bundle.min.js';?>"></script>
<!-- DataTables  & Plugins -->
<script src="<?= base_url().'assets/bootstrap2/plugins/datatables/jquery.dataTables.min.js';?>"></script>
<script src="<?= base_url().'assets/bootstrap2/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js';?>"></script>
<script src="<?= base_url().'assets/bootstrap2/plugins/datatables-responsive/js/dataTables.responsive.min.js';?>"></script>
<script src="<?= base_url().'assets/bootstrap2/plugins/datatables-responsive/js/responsive.bootstrap4.min.js';?>"></script>
<script src="<?= base_url().'assets/bootstrap2/plugins/datatables-buttons/js/dataTables.buttons.min.js';?>"></script>
<script src="<?= base_url().'assets/bootstrap2/plugins/datatables-buttons/js/buttons.bootstrap4.min.js';?>"></script>
<script src="<?= base_url().'assets/bootstrap2/plugins/jszip/jszip.min.js';?>"></script>
<script src="<?= base_url().'assets/bootstrap2/plugins/pdfmake/pdfmake.min.js';?>"></script>
<script src="<?= base_url().'assets/bootstrap2/plugins/pdfmake/vfs_fonts.js';?>"></script>
<script src="<?= base_url().'assets/bootstrap2/plugins/datatables-buttons/js/buttons.html5.min.js';?>"></script>
<script src="<?= base_url().'assets/bootstrap2/plugins/datatables-buttons/js/buttons.print.min.js';?>"></script>
<script src="<?= base_url().'assets/bootstrap2/plugins/datatables-buttons/js/buttons.colVis.min.js';?>"></script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js'></script>
<script>
    $(document).ready(function() {
        var ctx = $("#chart-line");
        var myLineChart = new Chart(ctx, {
            type: 'radar',
            data: {
                labels: <?= $json_label; ?>,
                datasets: [{
                    data: <?= $json_data; ?>,
                    label: "Survey\n",
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgb(255, 99, 132)',
                    pointBackgroundColor: 'rgb(255, 99, 132)',
                    fill: true
                },]
            },
            options: {
                title: {
                    display: true,
                    text: 'Grafik Hasil Survey'
                },
            }
        });
    });
</script>

<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $("#survey").DataTable({
      "responsive": true, 
      "lengthChange": false, 
      "autoWidth": false,
      "buttons": [ "excel"]
    }).buttons().container().appendTo('#survey_wrapper .col-md-6:eq(0)');
    $("#hasil").DataTable({
      "responsive": true, 
      "lengthChange": false, 
      "searching": false,
      "autoWidth": false,
      "paging"   : false,
      "buttons": [ "excel"]
    }).buttons().container().appendTo('#hasil_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
  <script>
$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      alert( "Form successful submitted!" );
    }
  });
  $('#quickForm').validate({
    rules: {
      projectname: {
        required: true,
        projectname: true,
      },
      username: {
        required: true,
        username: true,
      },
      companyname: {
        required: true,
        companyname: true,
      },
      description: {
        required: true,
        description: true,
      },
      password: {
        required: true,
        minlength: 5
      },
      confpassword: {
        required: true,
        minlength: 5
      },
      company: {
        required: true
      },
      criteria: {
        required: true
      },
      session1: {
        required: true
      },
      session2: {
        required: true
      },
      question: {
        required: true
      },
      option1: {
        required: true
      },
      option2: {
        required: true
      },
      option3: {
        required: true
      },
      option4: {
        required: true
      },
      option5: {
        required: true
      },

    },
    messages: {
      projectname: {
        required: "Please enter the project name",
        // email: "Please enter a vaild email address"
      },
      question: {
        required: "Please input question file (xlsx, xls)",
        // email: "Please enter a vaild email address"
      },
      description: {
        required: "Please enter the description text",
        // email: "Please enter a vaild email address"
      },
      username: {
        required: "Please enter username text",
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
   
      company: "Please select the company name",
      criteria: "Please select the criteria name",
      session1: "Please select the session date",
      session2: "Please select the session date",
      option1: "Pleasr select your option!",
      option2: "Pleasr select your option!",
      option3: "Pleasr select your option!",
      option4: "Pleasr select your option!",
      option5: "Pleasr select your option!"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd-mm-yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm-dd-yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template")
  previewNode.id = ""
  var previewTemplate = previewNode.parentNode.innerHTML
  previewNode.parentNode.removeChild(previewNode)

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  })

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
  })

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
  })

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1"
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
  })

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0"
  })

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
  }
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true)
  }
  // DropzoneJS Demo Code End
</script>
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>
