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



  // edit photo sidebar

  $('.info-box-header').click(function () {


    $('.inside').slideToggle("fast");

    $('#toggle').toggleClass('glyphicon-menu-down glyphicon ', ' glyphicon-menu-up glyphicon');

  });




  // delete event photos.php


  $(".delete_link").click(function () {

    return confirm("are you sure you want to delete ?");
  });







}); // end of document ready


const all_check_boxes = document.querySelector('.checkboxes');
const check_per_image = document.querySelectorAll('.check_per_image');

const del_btn = document.querySelector('.del-btn');

all_check_boxes.addEventListener('click', function (e) {
  if (this.checked) {
    this.checked = true;
    del_btn.classList.remove('hidden');

  } else {
    this.checked = false;
    del_btn.classList.add('hidden');


  }
});
