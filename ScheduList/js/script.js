$(document).ready(function(){
  console.log("starts")
  let taskid;
  // ****************************************
  // Notification Time
  let hrsR;
  let minR;
  let dayR;
  let monthR;
  let yearR;
  let intervalId;
  let delay = 1000;
  let audioElement = document.createElement('audio');
  let isPlay = true;



  // calls function to load immediateley
  loadTasks();
  // calls time notifaction
  time();


  //setting interval for updating time and date set
  let interval = setInterval(function() {
    time();
  }, delay);

  // removes text from input fieldss
  $('#close').click(function(event) {
    $('.mb-3 input, .mb-3 textarea').val('');
    $(".addtask-notif").css('display', 'none');

  });
  $('#closeedit').click(function(event) {
    $('.mb-3 input, .mb-3 textarea').val('');
    $(".edittask-notif").css('display', 'none');
  });



  //logout
  $('#logout').click(function(event) {
    console.log('title');
    event.preventDefault();
    $.ajax({
        url: 'php/logout.php',
        type: 'POST'
      })
      .done(function() {
        window.location.replace('/ScheduList');
        console.log("success");
      })
      .fail(function(xhr, status, error) {
        console.log("error " + xhr.responseText + xhr.status + error);
      })
  });

  // ***************************************************
  //add task modal
  $('#addtask').click(function(event) {
    /* Act on the event */
      $("#error").css('opacity', '0').text('');
      $(".addtask-notif").css('display', 'flex');

  });
  // add a task AjAx
  $('#addTask').submit(function(event) {
    event.preventDefault();
    $.ajax({
        url: 'php/addTask.php',
        type: 'POST',
        dataType: 'JSON',
        data: {
          task: $('#task').val(),
          date: $('#date').val(),
          time: $('#time').val()
        }
      })
      .done(function(data) {
        //remove current content
        // then calls loadTask to load new task immediatly after creating new task
        if (data[0] == "emptyfields") {
          $("#error").css('opacity', '1').text('Please fill in all the fields');
        } else if (data[0] == "success") {
          $("#error").css('opacity', '0').text('');
          $('.mb-3 input, .mb-3 textarea').val('');
          $(".addtask-notif").css('display', 'none');
          $('tbody tr.except').html("");
          loadTasks();
        }

      })
      .fail(function(xhr, status, error) {
        console.log("error " + xhr.responseText + xhr.status + error);
      })
  });
  // ***************************************************
  //edit task modal
  $('tbody').on('click', '#editBtn', function(e) {
    //get row id
      $("#error").css('opacity', '0').text('');
      taskid = $(this).parents("tr").find('td.id').text();
      let taskdesc = $(this).parents("tr").find('td.taskdesc').text();
      let date = $(this).parents("tr").find('td.date').text();
      let time = $(this).parents("tr").find('td.time').text();

      let timeFormattedForInput = date +", "+time;

    /* Act on the event */
    $(".edittask-notif").css('display', 'flex');
    $('#taskedit').val(taskdesc)
    $('#dateedit').val(dateFormat(date,"yyyy-mm-dd"))
    $('#timeedit').val(dateFormat(timeFormattedForInput, "HH:MM:ss"))
  });
  // edit a task AjAx
  $('#edittask').submit(function(event) {
    event.preventDefault();
    $.ajax({
        url: 'php/updateTask.php',
        type: 'POST',
        dataType: 'JSON',
        data: {
          taskid: taskid,
          taskdesc: $('#taskedit').val(),
          date: $('#dateedit').val(),
          time: $('#timeedit').val()
        }
      })
      .done(function(data) {
        //remove current content
        // then calls loadTask to load new task immediatly after creating new task
        if (data == "emptyfields") {
          $("#error").css('opacity', '1').text('Please fill in all the fields');
        } else if (data== "success") {
          $("#error").css('opacity', '0').text('');
          $('.mb-3 input, .mb-3 textarea').val('');
          $(".edittask-notif").css('display', 'none');
          $('tbody tr.except').html("");
          loadTasks();
        }
      })
      .fail(function(xhr, status, error) {
        console.log("error " + xhr.responseText + xhr.status + error);
      });
  });
  //delete a task ajax
  $('tbody').on('click', '#delete', function(e) {
    taskid = $(this).parents("tr").find('td.id').text();
    $.ajax({
        url: 'php/deleteTask.php',
        type: 'POST',
        data: {
          taskid: taskid
        }
      })
      .done(function() {
        //remove current content
        $('tbody tr.except').html("");
        loadTasks();
      })
      .fail(function(xhr, status, error) {
        console.log("error " + xhr.responseText + xhr.status + error);
      })
  });

  //dismisses sound
  $('#stop').click(function(event) {
    /* Act on the event */
    $(".container-notif").css('display', 'none');
    audioElement.pause();
    audioElement.currentTime = 0;
    isPlay = false;
  });


  // functions
  // ajax called for loading all task by user
  function loadTasks() {
    $.ajax({
        url: 'php/loadTask.php',
        type: 'POST',
        dataType: 'JSON',
      })
      .done(function(data) {
        $.map(data, function(val, index) {
          let date = val.date;
          //added date because formatter cannot take time by itself
          let time = val.date + ", " + val.time;

          $('tbody').append('<tr class="except"> '+
           '<td class="id">' + val.taskid + '</td>' +
            '<td class="taskdesc">' + val.taskdesc + '</td>' +
            '<td class="date">' + dateFormat(date, "mmmm dd, yyyy") + '</td>' +
            '<td class="time">' + dateFormat(time, "h:MM TT") + '</td>' +
            '<td><button type="button" class="btn btn-secondary edit" id="editBtn" >Edit</button>'+
            '<button type="button" class="btn btn-danger del" id="delete">Delete</button></td></tr>'
          );
        });
      })
      .fail(function(xhr, status, error) {
        console.log("error " + xhr.responseText + xhr.status);
      })
  }





  //load notifaction
  function time() {
    $.ajax({
        url: 'php/getTime.php',
        type: 'POST',
        dataType: 'JSON',
      })
      .done(function(data) {
        $.map(data, function(val, index) {

          let date = val.date + ", " + val.time;
          let d = new Date(date);
          hrsR = d.getHours();
          minR = d.getMinutes();
          dayR = d.getDate();
          monthR = d.getMonth();
          yearR = d.getYear();

          let string = val.taskdesc;
          if (string.length > 20) {
            string = string.substring(0, 19) + "...";
          }
          $('.cust-notif p').html(string);
          $('.cust-notif h3').html(dateFormat(date, "mmmm-dd-yyyy, h:MM TT"));
          playWhenReady();
        });
      })
      .fail(function(xhr, status, error) {
        console.log("error " + xhr.responseText + xhr.status + error);
      });

  }


  // funciton for playing sound
  function playWhenReady() {
    //for current date and time
    let currDate = new Date();
    let hrs = currDate.getHours();
    let min = currDate.getMinutes();
    let day = currDate.getDate();
    let month = currDate.getMonth();
    let year = currDate.getYear();
    //checks if current time is same with set time
    if (hrs === hrsR && min === minR && day === dayR && month === monthR && year === yearR) {
      if (isPlay == true && audioElement.paused) {
        $(".container-notif").css('display', 'flex');
        playSound('notif.mp3');
      }
    } else {
      isPlay = true;
    }
  }

  function playSound(soundFile) {
    audioElement.setAttribute('src', soundFile);
    audioElement.play();

  }


  // Date Formatter library
  var dateFormat = function() {
    var token = /d{1,4}|m{1,4}|yy(?:yy)?|([HhMsTt])\1?|[LloSZ]|"[^"]*"|'[^']*'/g,
      timezone = /\b(?:[PMCEA][SDP]T|(?:Pacific|Mountain|Central|Eastern|Atlantic) (?:Standard|Daylight|Prevailing) Time|(?:GMT|UTC)(?:[-+]\d{4})?)\b/g,
      timezoneClip = /[^-+\dA-Z]/g,
      pad = function(val, len) {
        val = String(val);
        len = len || 2;
        while (val.length < len) val = "0" + val;
        return val;
      };

    // Regexes and supporting functions are cached through closure
    return function(date, mask, utc) {
      var dF = dateFormat;

      // You can't provide utc if you skip other args (use the "UTC:" mask prefix)
      if (arguments.length == 1 && Object.prototype.toString.call(date) == "[object String]" && !/\d/.test(date)) {
        mask = date;
        date = undefined;
      }

      // Passing date through Date applies Date.parse, if necessary
      date = date ? new Date(date) : new Date;
      if (isNaN(date)) throw SyntaxError("invalid date");

      mask = String(dF.masks[mask] || mask || dF.masks["default"]);

      // Allow setting the utc argument via the mask
      if (mask.slice(0, 4) == "UTC:") {
        mask = mask.slice(4);
        utc = true;
      }

      var _ = utc ? "getUTC" : "get",
        d = date[_ + "Date"](),
        D = date[_ + "Day"](),
        m = date[_ + "Month"](),
        y = date[_ + "FullYear"](),
        H = date[_ + "Hours"](),
        M = date[_ + "Minutes"](),
        s = date[_ + "Seconds"](),
        L = date[_ + "Milliseconds"](),
        o = utc ? 0 : date.getTimezoneOffset(),
        flags = {
          d: d,
          dd: pad(d),
          ddd: dF.i18n.dayNames[D],
          dddd: dF.i18n.dayNames[D + 7],
          m: m + 1,
          mm: pad(m + 1),
          mmm: dF.i18n.monthNames[m],
          mmmm: dF.i18n.monthNames[m + 12],
          yy: String(y).slice(2),
          yyyy: y,
          h: H % 12 || 12,
          hh: pad(H % 12 || 12),
          H: H,
          HH: pad(H),
          M: M,
          MM: pad(M),
          s: s,
          ss: pad(s),
          l: pad(L, 3),
          L: pad(L > 99 ? Math.round(L / 10) : L),
          t: H < 12 ? "a" : "p",
          tt: H < 12 ? "am" : "pm",
          T: H < 12 ? "A" : "P",
          TT: H < 12 ? "AM" : "PM",
          Z: utc ? "UTC" : (String(date).match(timezone) || [""]).pop().replace(timezoneClip, ""),
          o: (o > 0 ? "-" : "+") + pad(Math.floor(Math.abs(o) / 60) * 100 + Math.abs(o) % 60, 4),
          S: ["th", "st", "nd", "rd"][d % 10 > 3 ? 0 : (d % 100 - d % 10 != 10) * d % 10]
        };

      return mask.replace(token, function($0) {
        return $0 in flags ? flags[$0] : $0.slice(1, $0.length - 1);
      });
    };
  }();

  // Some common format strings
  dateFormat.masks = {
    "default": "ddd mmm dd yyyy HH:MM:ss",
    shortDate: "m/d/yy",
    mediumDate: "mmm d, yyyy",
    longDate: "mmmm d, yyyy",
    fullDate: "dddd, mmmm d, yyyy",
    shortTime: "h:MM TT",
    mediumTime: "h:MM:ss TT",
    longTime: "h:MM:ss TT Z",
    isoDate: "yyyy-mm-dd",
    isoTime: "HH:MM:ss",
    isoDateTime: "yyyy-mm-dd'T'HH:MM:ss",
    isoUtcDateTime: "UTC:yyyy-mm-dd'T'HH:MM:ss'Z'"
  };

  // Internationalization strings
  dateFormat.i18n = {
    dayNames: [
      "Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat",
      "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"
    ],
    monthNames: [
      "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec",
      "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"
    ]
  };

  // For convenience...
  Date.prototype.format = function(mask, utc) {
    return dateFormat(this, mask, utc);
  };
}); //end of $(document).ready
