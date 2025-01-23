jQuery(document).ready(function($) {
    /*
    * Show images on load
    */
    let attachment_string = $("#images-input").val();
    let attachment_array = attachment_string.split(",");

    for (var i = 0; i < attachment_array.length; i++) {
        if (attachment_array[i] != "") {
            $(".images").append(
                '<li class="image-item"><img src="' +
                attachment_array[i] +
                '"></li>'
            )
        }
    }


    /*
    * Add images
    */
    $(".button-secondary.upload").click(function () {
        let custom_uploader = (wp.media.frames.file_frame = wp.media({
            multiple: true,
        }));

        custom_uploader.on("select", function () {
            let selection = custom_uploader.state().get("selection");
            let attachments = [];
            selection.map(function (attachment) {
                attachment = attachment.toJSON();
                $(".images").append(
                    "<li class='image-item'><img src='" +
                    attachment.url +
                    "'></li>"
                );
                attachments.push(attachment.url);
            });
            let previous = $("#images-input").val() ? "," + $("#images-input").val() : ""; // get rid of trailing commas
            let attachment_string = attachments.join() + previous;
            $("#images-input").val(attachment_string).trigger("change");
        });
        custom_uploader.open();
    });


    /*
    * Remove images when you click on an image
    */
    $(".images").click(function (e) {
        let img_url = $(e.target).find("img").attr("src");
        $(e.target).closest("li").remove();
        let attachment_string = $("#images-input").val();
        attachment_string = attachment_string.replace(img_url, "");
        attachment_string = attachment_string.replaceAll(",,", ","); // get rid of duplicate commas
        attachment_string = attachment_string.replace(/^,+|,+$/g, ""); // get rid of leading or trailing commans
        $("#images-input").val(attachment_string).trigger("change");
    });

    /*
    * Add suggested images when clicked
    */
    $(".suggested-images").click(function(e){
        let img_url = $(e.target).find("img").attr("src");
        let attachment_string = $("#images-input").val();
        attachment_string += ",";
        attachment_string += img_url;
        attachment_string = attachment_string.replace(/^,+|,+$/g, ""); // get rid of leading or trailing commans
        $(".images").append(
            "<li class='image-item'><img src='" +
            img_url +
            "'></li>"
        );
        $("#images-input").val(attachment_string).trigger("change");
    })
})