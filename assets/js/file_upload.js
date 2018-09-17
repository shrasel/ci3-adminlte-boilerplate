Dropzone.autoDiscover = false;

    
    $('#payment_file').dropzone({

        url: base_url+"/upload/files",
        addRemoveLinks: true,
        maxFiles: 1,
        autoProcessQueue: false,
        enqueueForUpload: false,
        // uploadMultiple: true,
        autoDiscover: false,
        // parallelUploads: 5,
        clickable: true,
        maxFilesize: 2,
        dictDefaultMessage: "Drop files here or click to upload.",
        acceptedFiles: "image/*,application/pdf",

        success: function (file, response) {
            var imgName = response;
            file.previewElement.classList.add("dz-success");
            $('#save_payment').closest('form').append('<input type="hidden" name="attachment" value="'+imgName+'" >');
            console.log("Successfully uploaded :" + imgName);
        },

        init: function () {
            // e.preventDefault();
            var myDropzone = this;
            // console.log(myDropzone);

            myDropzone.on("maxfilesexceeded", function (file) {
                this.removeFile(file);
            });

            var submitButton = document.querySelector("#save_payment");

            submitButton.addEventListener("click", function (e) {

                if (myDropzone.getQueuedFiles().length > 0) {

                    var submitfiles = false;

                    if (submitfiles === true) {
                        submitfiles = false;
                        return;
                    }

                     e.preventDefault();
                     e.stopPropagation();
           

                    myDropzone.on('sending', function (data, xhr, formData) {
                        formData.append("payment_source", $('#payment_source').val());
                        formData.append("order_id", $('#order_id').val());
                    });

                    myDropzone.processQueue();

                    myDropzone.on("complete", function () {
                        submitfiles = true;
                        $('#save_payment').trigger('click');
                    });

                }
            });
        }
    });