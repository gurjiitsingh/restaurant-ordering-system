jQuery(document).ready(function ($) {
  //alert("work");

  var cont = 0;
  var slotDataArray = []; // initialize an empty array
  var data_length = 1;

  //jQuery(".slot-box").click(function(){

  $(document).on("click", ".slot-box", function (e) {
    if (data_length == 0) {
      slotDataArray.length = 0;
    }
    var slot_id = $(this).attr("id");

    var myObject = {
      name: $("#name").val(),
      phone: $("#phone").val(),
      slot: $(this).data("slot"),
      table: $(this).data("table"),
      table_id: $(this).data("tableid"),
      date: $(this).data("date"),
    }; // create an object

    var dupli = 0;
    var index_count = 0;
    var dupli_index = 0;
    slotDataArray.forEach((element) => {
      index_count++;
      if (
        element["table_id"] == $(this).data("tableid") &&
        element["slot"] == $(this).data("slot")
      ) {
        //alert(element["table_id"]+" "+element["slot"]+" "+$(this).data("tableid")+" "+$(this).data("slot")+"du");
        //alert("Already selected");

        dupli_index = index_count;
        dupli = 1;
      }
    });

    if (dupli == 0) {
      data_length = 1;
      slotDataArray.push(myObject); // add the object to the array
      $("#" + slot_id).css("background-color", "red");
    } else {
      slotDataArray.splice(dupli_index - 1, 1);
      $("#" + slot_id).css("background-color", "#eee");
      $("#" + slot_id).css("color", "#222");
      alert("Table Slot Deselected");
    }

    if (slotDataArray.length > 0) {
      $(".save_booking").css("display", "block");
    } else {
      $(".save_booking").css("display", "none");
    }
  }); //end of slot click

  $(".save_booking").click(function () {
    // console.log(slotDataArray);

    var i = 0;
    $.ajax({
      url: ajax_object.ajaxurl,
      type: "post",
      data: { action: "save_value", data: slotDataArray },
      success: function (response) {
        // console.log(response);
        let obj = JSON.parse(response);

        for (let i = 0; i < obj.length; i++) {
          var slot_id_n = obj[i]["timeSlot"] + "-" + obj[i]["titleID"];

          let slot_id_s = slot_id_n.toString(slot_id_n);
          let ha = "#";
          let slot_id = ha.concat("", slot_id_s);

          $(slot_id).css("background-color", "#555");
          $(slot_id).css("color", "#eee");

          const button = document.getElementById(slot_id_s);
          button.setAttribute("disabled", "");
        }

        data_length = 0;
        $(".save_booking").css("display", "none");

        slotDataArray.length = 0;
      },
      error: function () {
        console.log("AJAX request failed");
      },
    });
  });

  $("#reset-but").click(function (e) {
    e.preventDefault();
    // slotDataArray.length = 0;
    // $(".save_booking").css("display", "none");
   
    location.reload();

  });

  $("#find-but").click(function (e) {
    e.preventDefault(); // Prevent the default form submit.
    slotDataArray.length = 0;

    var dValue = $("#date").val(); //alert($("#date").val());

    $.ajax({
      url: ajax_object.ajaxurl, // This variable is defined by WordPress and points to admin-ajax.php
      type: "post",
      data: {
        action: "find_booking_record", // The PHP function to execute
        dateValue: dValue,
      },
      success: function (response) {
        $("#post-list").html(response);
      },
      error: function () {
        console.log("AJAX request failed");
      },
    });

    $.ajax({
      url: ajax_object.ajaxurl, // This variable is defined by WordPress and points to admin-ajax.php
      type: "post",
      data: {
        action: "find_allready_booked", // The PHP function to execute
        dateValue: dValue,
      },
      success: function (response1) {
        var obj = JSON.parse(response1);
        //JSON.stringify(res, null, '  ').replace("\\r", " ")
        //  let obj =  obj1.replace(/\\n/g, '');

        //const json = theArray.map(el => JSON.stringify(el)).join(",\n");

        for (let i = 0; i < obj.length; i++) {
          if (dValue == obj[i]["bookDate"]) {
            var slot_id_n = obj[i]["timeSlot"] + "-" + obj[i]["titleID"];
            //if(slot_id_n != null){

            let slot_id_s = slot_id_n.toString(slot_id_n);
            let ha = "#";
            let slot_id = ha.concat("", slot_id_s);

            $(slot_id).css("background-color", "#555");
            $(slot_id).css("color", "#eee");
          }
        }

        setTimeout(function () {
          jQuery(document).ready(function ($) {
            for (let i = 0; i < obj.length; i++) {
              var slot_id_n = obj[i]["timeSlot"] + "-" + obj[i]["titleID"];
              //  console.log(slot_id_n);
              //   let slot_id_s = slot_id_n.toString(slot_id_n);
              //  const button = document.getElementById("13-2");
              const button = getElementsByClassName(already - booked);
              button.setAttribute("disabled", "");
            }
          });
        }, 1000);

        while (obj.length > 0) {
          obj.pop();
        }
      },
      error: function () {
        console.log("AJAX request failed");
      },
    });
  }); // end of data select
}); //end of main function





