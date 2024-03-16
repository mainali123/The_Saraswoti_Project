console.log('Loaded')
$(function () {
    $('#uploadBook').on('submit', (event) => {
        event.preventDefault();
        let fileInput = $("#pdfFile")[0];
        if (fileInput && fileInput.files && fileInput.files.length > 0) {
            let file_data = fileInput.files[0];
            console.log("Selected file:", file_data);

            // Create FormData and append the file
            let formData = new FormData();
            if (formData instanceof FormData) { // Check if formData is an instance of FormData
                formData.append('file', file_data);
                console.log("File appended to FormData:", formData);
                $.ajax({
                    url: 'backend/postHandler.php',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: formData,
                    type:'POST',
                    success: (response) => {
                        let parsedResponse = JSON.parse(response)
                        console.log(parsedResponse)

                        // console.log(response);
                        alert('Response:' + parsedResponse);
                    },
                    error: (error) => {
                        alert('Error:' + error)
                    }
                })
                // Now you can proceed with your FormData object
            } else {
                console.error("formData is not an instance of FormData.");
            }
        } else {
            console.error("No file selected.");
        }

        //
        //
        // $.ajax({
        //     url: 'backend/postHandler.php',
        //     cache: false,
        //     contentType: true,
        //     processData: true,
        //     data: formData,
        //     type:'POST',
        //     success: (response) => {
        //
        //         console.log(response);
        //         alert('Response:' + response);
        //     },
        //     error: (error) => {
        //         alert('Error:' + error)
        //     }
        // })
    })
})
