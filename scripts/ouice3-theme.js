(function($) {
  // module example
  ;
  (function(container, $, doc, undefined) {

    function createModule() {
      var init = function() {
          // non DOM ready code here 
          $(function() {
            // DOM ready code here
            //showAlert();
            jQuery(function() {
              activeContext();
              persistNav();
            });

            // Used to replace a link with strong - so context menu item is highlighted.


            function activeContext() {
              $("div.ou-context-nav a.active").each(function() {
                text = $(this).text();
                $(this).replaceWith("<strong>" + $(this).text() + "</strong>");
              });

              $("div.ou-full-nav a.active").each(function() {
                text = $(this).text();
                $(this).replaceWith("<strong>" + $(this).text() + "</strong>");
              });
            }

            function persistNav() {
              $("ul.ou-sections li.active-trail a").addClass('ou-selected');
            }

          });

          }(); // self invoking

      function anotherMethod() {
        // remains private if not added to contract object
      }

      function showAlert(elem) {
        alert("Module init");
      } // end showAlert()
      // public methods
      var contract = {
        //showAlert: showAlert,
      };

      // Public interface (properties and methods)
      return contract;

    } // end module
    // Public API (assigns to my namespace)
    container.example = createModule(); // creates ou.example namespace
  })(this.ou || (this.ou = {}), this.Zepto || this.jQuery, document);
})(jQuery);