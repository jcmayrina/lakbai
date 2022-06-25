$(document).ready(function () {
  $('[data-toggle="tooltip"]').tooltip();
  var actions = $("table td:last-child").html();
  // Append table with add row form on add new button click
  $("a[href='#bottom']").click(function () {
    $("html, body").animate({ scrollTop: $(document).height() }, "slow");
    document.getElementById("addTourTable").style.display = "block";
    return false;
  });
  // Delete row on delete button click
  $(document).on("click", ".delete", function () {
    $(this).parents("tr").remove();
    $(".add-new").removeAttr("disabled");
  });
});

// show tours
$(document).on("click", ".showtour", function () {
  document.getElementById("tour").style.display = "block";
  document.getElementById("user").style.display = "none";
  document.getElementById("feedback").style.display = "none";
});

// show users
$(document).on("click", ".showuser", function () {
  document.getElementById("user").style.display = "block";
  document.getElementById("tour").style.display = "none";
  document.getElementById("feedback").style.display = "none";
});

// show feedbacks
$(document).on("click", ".showfeed", function () {
  document.getElementById("feedback").style.display = "block";
  document.getElementById("user").style.display = "none";
  document.getElementById("tour").style.display = "none";
});

// Add row on add button click
/*
  $(document).on("click", ".add", function () {
    var empty = false;
    var input = $(this).parents("tr").find('input[type="text"]');
    input.each(function () {
      if (!$(this).val()) {
        $(this).addClass("error");
        empty = true;
      } else {
        $(this).removeClass("error");
      }
    });
    $(this).parents("tr").find(".error").first().focus();
    if (!empty) {
      input.each(function () {
        $(this).parent("td").html($(this).val());
      });
      $(this).parents("tr").find(".add, .edit").toggle();
      $(".add-new").removeAttr("disabled");
    }
  });*/
// Edit row on edit button click
/*
  $(document).on("click", ".edit", function () {
    $(this)
      .parents("tr")
      .find("td:not(:last-child)")
      .each(function () {
        $(this).html(
          '<input type="text" class="form-control" value="' +
            $(this).text() +
            '">'
        );
      });
    $(this).parents("tr").find(".add, .edit").toggle();
    $(".add-new").attr("disabled", "disabled");
  });*/
