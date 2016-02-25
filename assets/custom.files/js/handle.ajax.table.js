jQuery(document).ready(function($) {
  $('.wrx-next-page').on('click', function() {
    var table = table_class.createNew();
    table.getNextPage();
  });

  $('.wrx-prev-page').on('click', function() {
    var table = table_class.createNew();
    table.getPrevPage();
  });
});



var table_class = {



  createNew: function() {

    var table = {};

    table.check = function() {

    }

    table.jsonHandler = function(json) {

      var data = null;

      try

      {

        data = eval('(' + json + ')');

      } catch (e)

      {

        data = new Array();

        data["result_type"] = "js";

      }

      return data;

    }

    table.reload = function(ex_data, page) {
      var type = $("#wrx-table-type").val();
      var url = $("#ajax_url").val();
      $.ajax({

        type: "POST",

        url: url,

        data: "type=weixin_ajax_load_table&data=" + type + "&page=" + page + "&" + ex_data,

        datatype: "json",

        beforeSend: function() {
          $(".wrx-table-body").html('加载中');
          $('.wrx-next-page').addClass('disabled');
          $('.wrx-prev-page').addClass('disabled');
        },

        success: function(data) {
          var json = table.jsonHandler(data);
          table.showTable(json, data);
        },

        complete: function(XMLHttpRequest, textStatus) {

        },

        error: function() {

        },

      });
    }

    table.showTable = function(json, data) {
     
          if (json.data == null) {
            console.log(data);
            return;
          }
          if (json.data.current == json.data.total_page) {
            $('.wrx-next-page').removeClass('disabled')
            $('.wrx-next-page').addClass('disabled');
          } else {
            $('.wrx-next-page').removeClass('disabled')
          }

          if (json.data.current != 1) {
            $('.wrx-prev-page').removeClass('disabled')
          } else {
            $('.wrx-prev-page').removeClass('disabled')
            $('.wrx-prev-page').addClass('disabled');
          }
          $(".wrx-total-item").html(json.data.total);
          $(".wrx-table-body").html(json.data.rows);
          $(".wrx-cur-page").val(json.data.current);
          if (json.data.total == 0) {
            $(".wrx-start-id").html(0);
          } else {
            $(".wrx-start-id").html(json.data.start_id);
          }
          $(".wrx-end-id").html(json.data.end_id);
    }

    table.getNextPage = function() {
      var type = $("#wrx-table-type").val();
      var next = 1 + parseInt($(".wrx-cur-page").val());
      var url = $("#ajax_url").val();
      $.ajax({

        type: "POST",

        url: url,

        data: "type=weixin_ajax_load_table&data=" + type + "&page=" + next,

        datatype: "json",

        beforeSend: function() {
          $(".wrx-table-body").html('加载中');
          $('.wrx-next-page').addClass('disabled');
          $('.wrx-prev-page').addClass('disabled');
        },

        success: function(data) {
          var json = table.jsonHandler(data);
          if (json.data == null) {
             console.log(data);
            return;
          }
          if (json.data.current == json.data.total_page) {
            $('.wrx-next-page').removeClass('disabled')
            $('.wrx-next-page').addClass('disabled');
          } else {
            $('.wrx-next-page').removeClass('disabled')
          }

          if (json.data.current != 1) {
            $('.wrx-prev-page').removeClass('disabled')
          } else {
            $('.wrx-prev-page').removeClass('disabled')
            $('.wrx-prev-page').addClass('disabled');
          }
          $(".wrx-total-item").html(json.data.total);
          $(".wrx-table-body").html(json.data.rows);
          $(".wrx-cur-page").val(json.data.current);
          if (json.data.total == 0) {
            $(".wrx-start-id").html(0);
          } else {
            $(".wrx-start-id").html(json.data.start_id);
          }
          $(".wrx-end-id").html(json.data.end_id);
        },

        complete: function(XMLHttpRequest, textStatus) {

        },

        error: function() {

        },

      });
    }


    table.getPrevPage = function() {
      var type = $("#wrx-table-type").val();
      var next = -1 + parseInt($(".wrx-cur-page").val());
      var url = $("#ajax_url").val();
      $.ajax({

        type: "POST",

        url: url,

        data: "type=weixin_ajax_load_table&data=" + type + "&page=" + next,

        datatype: "json",

        beforeSend: function() {
          $(".wrx-table-body").html('加载中');
          $('.wrx-next-page').addClass('disabled');
          $('.wrx-prev-page').addClass('disabled');
        },

        success: function(data) {
          var json = table.jsonHandler(data);
          if (json.data == null) {
             console.log(data);
            return;
          }
          if (json.data.current == json.data.total_page) {
            $('.wrx-next-page').removeClass('disabled')
            $('.wrx-next-page').addClass('disabled');
          } else {
            $('.wrx-next-page').removeClass('disabled')
          }

          if (json.data.current != 1) {
            $('.wrx-prev-page').removeClass('disabled')
          } else {
            $('.wrx-prev-page').removeClass('disabled')
            $('.wrx-prev-page').addClass('disabled');
          }
          $(".wrx-total-item").html(json.data.total);
          $(".wrx-table-body").html(json.data.rows);
          $(".wrx-cur-page").val(json.data.current);
          if (json.data.total == 0) {
            $(".wrx-start-id").html(0);
          } else {
            $(".wrx-start-id").html(json.data.start_id);
          }
          $(".wrx-end-id").html(json.data.end_id);
        },

        complete: function(XMLHttpRequest, textStatus) {

        },

        error: function() {

        },

      });
    }
    return table;
  }
}