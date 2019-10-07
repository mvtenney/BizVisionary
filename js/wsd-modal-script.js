//default modal options
var modalScript = function (settings) {
  var modal = "#defaultModal";
  var closeButton = jQuery(".wsd-modal-close");
  var modalElement = jQuery(modal);
  var modalContent = jQuery(modal + " .wsd-modal-content");
  var modalCSS = "";

  var options = {
    // What kind of content is using the modal window ->
    "modalType": {
      "ajax": false,
      "image": false,
      "gallery": false,
      "video": false,
      "content": true
      // "mount":false
    },
    //Where should the modal window appear ->
    "display": {
      "top": false,
      "right": false,
      "bottom": false,
      "left": false,
      "center": false
    },
    // "animation": {
    //   "fadeInOut": false,
    //   "slideInOut": false,
    //   "zoomInOut": false,
    //   "jackInTheBox": false,
    //   "pulse": false
    // },
    "events": {
      preLoad: (function () {}),
      onLoad: (function () {}),
      preClose: (function () {}),
      onClose: (function () {}),
    },
    //what should the modal window target ->
    "target": "",
    "href": "",
    //Delete modal onClose
    "destroy":false,
    "maxWidth":false,
    "borderRadius": false,
    "ajaxData": {},
    "id": ""
  };

  //clear option values before load
  function clearOptions() {
    for (option in options) {
      if (option == 'target' || option == 'href') {
        options[option] = false;
        continue;
      }
      for (subOption in options[option]) {
        //provide blank function if event.
        if (option == "events") {
          options[option][subOption] = function () {};
        } else {
          options[option][subOption] = false;
        }
      }
    }
    applyDefaultValues();
  };

  function applyDefaultValues() {
    options.modalType.content = true;
    options.display.center = true;
  };

  var checkTarget = function (thisSetting) {
    thisSettingLower = thisSetting.toLowerCase();
    //if argument is a url
    if (thisSettingLower.startsWith("/") || thisSettingLower.startsWith("./") || thisSettingLower.startsWith("../") || thisSettingLower.startsWith("http")) {
      options.href = thisSetting;
      if (!thisSettingLower.startsWith("http")) {
        options.modalType.ajax = true;
      };
      modal = "#functionTarget";
      return "href";
      //if argument is an id
    } else if (thisSetting.startsWith("#")) {
      options.target = thisSetting;
      modal = thisSetting;
      jQuery('.wsd-modal-content').css('animation', 'zoomIn .3s ease-in-out');
      return "id";
    } else {
      return false;
    };
  };

  if (typeof settings === "string" && arguments.length > 1) {
    for (setting in arguments) {
      //Check if setting is an element id or a href and apply it
      var foundTarget = checkTarget(arguments[setting]);
      if (foundTarget) {
        continue;
      };
      //if setting is destroy
      if (arguments[setting] == "destroy") {
        options.destroy = true;
        continue;
      };
      //if modalType contains setting, apply it
      if (arguments[setting] in options.modalType) {
        options.modalType[arguments[setting]] = true;
        continue;
      };
      //if display contains setting, apply it
      if (arguments[setting] in options.display) {
        options.display[arguments[setting]] = true;
        modalCSS += arguments[setting] + " ";
        continue;
      };
    };
  } else if (typeof settings === "string" && arguments.length === 1) {
    checkTarget(settings);
    applyDefaultValues();
  } else if (typeof settings === "object") {
    settingsKeys = Object.keys(settings);
    settingsValues = Object.values(settings);
    for (setting in settingsKeys) {
      if (settingsKeys[setting] in options) {
        if (settingsKeys[setting] === "target"){
          modal = settingsValues[setting];
          continue;
        }
        options[settingsKeys[setting]] = settingsValues[setting];
        continue;
      } else if (settingsKeys[setting] in options.modalType) {
        options.modalType[settingsKeys[setting]] = true;
        continue;
      } else if (settingsKeys[setting] in options.display) {
        options.display[settingsKeys[setting]] = true;
        modalCSS += settingsKeys[setting] + " ";
      } else if (settingsKeys[setting] in options.events) {
        options.events[settingsKeys[setting]] = settingsValues[setting];
      };
    };
  } else {
    console.log("Modal Window Script called without parameters. exiting.");
  };

  options.events.preLoad();
  var windowOpened = true;

  //If modalType is video
  if (options.modalType.video) {
    options.href = options.href.replace("//youtu.be/", "//www.youtube.com/embed/");
    if (options.target.length > 1) {
      var modalWindow = '<iframe src="' + options.href + '" frameborder="0" height="100%" width="100%" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'
      modalContent.append(modalWindow);
    } else {
      var modalWindow = '<div id="' + modal.substring(1) + '" class="wsd-modal wsd-modal-video ' + modalCSS + '"><div class="wsd-modal-content"><span class="btn-x wsd-modal-close">&times;</span><iframe src="' + options.href + '" frameborder="0"  height="100%" width="100%" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div></div>';
      jQuery("body").append(modalWindow);
    };
    jQuery(modal).css('display', 'flex');
  } else if (options.modalType.ajax) {
  //If modalScript is performing an Ajax call

    if (options.id){
      if(options.id.charAt(0) !== "#"){
        options.id = "#" + options.id;
      }
      modal = options.id;
    }
    var modalWindow = '<div id="' + modal.substring(1) + '" class="wsd-modal ' + modalCSS + '"><div class="wsd-modal-content"><span class="btn-x wsd-modal-close">&times;</span><div class="ajaxContent"><i class="fa fa-3x fa-spinner fa-pulse"></i></div></div></div>';
    jQuery("body").append(modalWindow);

    jQuery('.wsd-modal-close').hide();
    jQuery(modal).css('display', 'flex');
    jQuery(modal + " .ajaxContent").load(options.href, options.ajaxData, function (response, status, xhr) {
      if (status == "success") {
        // Display modal on ajax success
        jQuery('.wsd-modal-content').css('animation', 'zoomIn .3s ease-in-out');
        setTimeout(getOnLoad, 200);
      } else if (status == "error") {
        console.log("Ajax request failed - error msg: " + error);
      };
    });
  // } else if (options.modalType.mount) {
  //   var modalWindow = '<div id="' + modal.substring(1) + 'Container" class="wsd-modal wsd-modal-video ' + modalCSS + '"><div class="wsd-modal-content"><span class="btn-x wsd-modal-close">&times;</span></div></div>'
  //   jQuery("body").append(modalWindow);
  //   jQuery(modal.substring(1) + 'Container').css('display', 'flex');
  //   jQuery(modal).appendTo(modal.substring(1) + 'Container');
  } else if (options.target !== "defaultModal") {
    jQuery(modal).css('display', 'flex');
    jQuery(modal).addClass(modalCSS);
    jQuery('.wsd-modal-content').css('animation', 'zoomIn .3s ease-in-out');
  };
  if (options.maxWidth.length > 1){
    jQuery('.wsd-modal-content').css('max-width', options.maxWidth);
  }
  if (options.borderRadius.length > 1){
    jQuery('.wsd-modal-content').css('border-radius', options.borderRadius);
  }

  // When the user clicks on the close button, or outside, close the modal
  jQuery(modal).on('click', function (e) {
    if (e.target !== this && !e.target.classList.contains("wsd-modal-close")) {
      return;
    } else {
      options.events.preClose();
      jQuery(modal).css('display', 'none');
      setTimeout(modalCleanup, 100);
    };
  });

  //close on Escape
  jQuery(document).keyup(function(e) {
    if (e.key === "Escape") {
      options.events.preClose();
      jQuery(modal).css('display', 'none');
      setTimeout(modalCleanup, 100);
    }
  });
  // Fire after modal is fully loaded
  function getOnLoad() {
    options.events.onLoad();
    jQuery('.wsd-modal-close').show();
  };

  var modalCleanup = function() {
    options.events.onClose();
    if (options.destroy){
      jQuery(modal).remove();
    }
    // if (options.modalType.mount){
    //   jQuery(modal).appendTo("#hiddenModals");
    // }
    clearOptions();
  };
  // console.log(options);
};