<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>How to Upload Files with Drag 'n' Drop and Image preview in Laravel 7</title>


    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/min/dropzone.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/dropzone.js"></script>

    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js">
    </script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js">
    </script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

           <style>
        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #9C27B0;
            color: white;
            text-align: center;
        }

        body {
            background-color: #EDF7EF
        }

    </style>
  </head>
  <body>
    <div class="row mb-3">
        <div class="col-lg-12 margin-tb">
            <div class="text-center">
                <h2>Laravel 7 File Upload </h2> 
            </div>
        </div>
    </div>

    <div class="container">
    <div class="row">

    </div>        
    <form method="post" action="<?php echo e(route('files.store')); ?>" enctype="multipart/form-data"
          class="dropzone" id="dropzone">
        <?php echo csrf_field(); ?>
        </form>
    </div>
       <div class="row mt-3">
        <div class="col-lg-12 margin-tb">
            <div class="text-center">
                <a class="btn btn-success" href="<?php echo e(route('files.index')); ?>" title="return to index"> <i class="fas fa-backward fa-2x"></i>
                </a>
            </div>
        </div>
    </div>

        <div class="text-center footer">
        <h4>subhampandey831@gmail.com</h4>
        <h4>Github: www.github.com/SHUBHAM-P4NDEY</h4>

    </div>

    <script type="text/javascript">
    Dropzone.options.dropzone =
    {
        maxFilesize: 12,
        resizeQuality: 1.0,
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        addRemoveLinks: true,
        timeout: 60000,
        init: function() { // Use the 'init' callback
            this.on("removedfile", function(file) {
                var name = file.name;

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    type: 'POST',
                    url: '<?php echo e(url("files/destroy")); ?>',
                    data: {filename: name},
                    success: function (data){
                        console.log("File has been successfully removed!!");
                    },
                    error: function(e) {
                        console.log(e);
                    }
                });
            });
        },
        success: function (file, response) {
            console.log(response);
        },
        error: function (file, response) {
            return false;
        }
    };
</script>

  </body>
</html><?php /**PATH C:\Users\shubh\OneDrive\Desktop\TEST1\blog\resources\views/files/create.blade.php ENDPATH**/ ?>