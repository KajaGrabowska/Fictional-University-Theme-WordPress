import $ from 'jquery';   //$ is short for jquery

class Search {
  // 1. describe and create/initiate our object
  constructor() {
    this.openButton = $(".js-search-trigger");
    this.closeButton = $(".search-overlay__close");
    this.searchOverlay = $(".search-overlay");
    this.events();    //makes sure the events are being listened to as soon as the page loads
    this.isOverlayOpen = false;
  }

  // 2. events
  events() {
    this.openButton.on("click", this.openOverlay.bind(this));
    this.closeButton.on("click", this.closeOverlay.bind(this));
    $(document).on("keydown", this.keyPressDispatcher.bind(this));
  }

  // 3. methods
  keyPressDispatcher(event) {
    if (event.keyCode == 83 && !this.isOverlayOpen) {
      this.openOverlay();
    }

    if (event.keyCode == 27 && this.isOverlayOpen) {
      this.closeOverlay();
    }
  }
  
  openOverlay() {
    this.searchOverlay.addClass("search-overlay--active");
    $("body").addClass("body-no-scroll");
    this.isOverlayOpen = true;
  }

  closeOverlay() {
    this.searchOverlay.removeClass("search-overlay--active");
    $("body").removeClass("body-no-scroll");
    this.isOverlayOpen = false;
  }
}

export default Search; 