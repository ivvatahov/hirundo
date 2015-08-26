function displayMessage(message) {
  return  '<li> '+
          '<div class="direction-r" id="div1">' +
          '<div class="flag-wrapper">' +
          '<span class="flag">'+ message.publisher + '</span>' +
          '<span class="time-wrapper"><span class="time">' + message.publicationDate + '</span></span>' +
          '</div>' +
          '<div class="desc">'+ message.content + '</div>' +
          '</div>' +
          '</li>';
}

function getLatestMessages(lastDate){
  var newDate = lastDate;
  $.ajax({
    url: "",
    type: 'GET',
    data: { date: lastDate,
            rt: "latestMessages"},
    beforeSend: function(x) {
      if(x && x.overrideMimeType) {
        x.overrideMimeType("application/j-son;charset=UTF-8");
      }
    },
    dataType: "json",
    success: function(data){
      if (data[0] != null) {
        newDate = data[0].publicationDate;
      }
      
      $.each(data, function(i, message) {
        $("#timeline").prepend(displayMessage(message));
      });
    },
    complete: function() {
      // Schedule the next request when the current one's complete
      setTimeout(function() { 
        getLatestMessages(newDate); 
      }, 5000);
    }
  });
}

function getPreviewsMessages(firstDate){
  var newDate = firstDate;
  var scrollFunction = function(){
      var mostOfTheWayDown = ($(document).height() - $(window).height()) * 2 / 3;
      if ($(window).scrollTop() >= mostOfTheWayDown) {
          $(window).unbind("scroll");
          $.ajax({
              url: "",
              type: 'GET',
              data: { date: newDate,
                      rt: "previewsMessages"},
              beforeSend: function(x) {
                if(x && x.overrideMimeType) {
                  x.overrideMimeType("application/j-son;charset=UTF-8");
                }
              },
              dataType: "json",
              success: function(data){
                  if (data[data.length-1] != null) {
                    newDate = data[data.length-1].publicationDate;
                  }

                  $.each(data, function(i, message) {
                    $("#timeline").append(displayMessage(message));
                  });
              },
              complete: function() {
                $(window).scroll(scrollFunction);
              }
          });
      }
  };
  $(window).scroll(scrollFunction);
}