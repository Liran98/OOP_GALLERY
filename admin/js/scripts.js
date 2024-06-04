$(document).ready(function () {
  $('#summernote').summernote({
    height: 300
  });

  let user_href;
  let user_href_splitted;
  let user_id;

  let image_src;
  let image_href_splitted;
  let image_name;

  $(".modal_thumbnails").click(function () {

    $("#set_user_image").prop('disabled', false);

    user_href = $("#user_id").prop('href');
    user_href_splitted = user_href.split('=');
    console.log(user_href_splitted);
    user_id = user_href_splitted[user_href_splitted.length - 1];
    console.log(user_id);
    // console.log(user_href);
    // console.log(user_href_splitted);

    image_src = $(this).prop("src");
    image_href_splitted = image_src.split('/');
    image_name = image_href_splitted[image_href_splitted.length - 1];

    // alert(image_name);
    // console.log(image_src);
    // console.log(image_href_splitted);
    // console.log(image_name);
    // alert(image_name);

  });



  $("#set_user_image").click(async function () {

    $.ajax({
      url: "includes/ajax_code.php",
      data: {
        image_name: image_name,
        user_id: user_id
      },
      type: "POST",
      success: function (data) {
        if (!data.error) {
          location.reload(true);
        }
      }
    });
  });















});
