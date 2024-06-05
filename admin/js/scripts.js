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

  let photo_id;

  $(".modal_thumbnails").click(function () {

    $("#set_user_image").prop('disabled', false);

    user_href = $("#user_id").prop('href');
    user_href_splitted = user_href.split('=');
    user_id = user_href_splitted[user_href_splitted.length - 1];


    image_src = $(this).prop("src");
    image_href_splitted = image_src.split('/');
    image_name = image_href_splitted[image_href_splitted.length - 1];


    photo_id = $(this).attr("data");

    $.ajax({
      url: "includes/ajax_code.php",
      data: {
        photo_id: photo_id,
      },
      type: "POST",
      success: function (data) {
        if (!data.error) {
          $('#modal_sidebar').html(data);
        }
      }
    });
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

          $(".user_image_box form-group a img").prop("src", data);
        }
      }
    });
  });


});

const actions = document.querySelector('.checkboxes');
const all_imgs = document.querySelector('.check_per_img');

actions.addEventListener('click', function (e) {


  all_imgs.forEach(function(btn){
    btn.addEventListener('click', function (e) {
      console.log("clicked");
    });
  })


});

