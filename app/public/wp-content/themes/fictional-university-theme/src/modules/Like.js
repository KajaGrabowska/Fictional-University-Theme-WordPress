import $ from "jquery";

class Like {
  constructor() {
    this.events();
  }

  events() {
    $(".like-box").on("click", this.ourClickDispatcher.bind(this));
  }

  // methods
  ourClickDispatcher(event) {
    var currentLikeBox = $(event.target).closest(".like-box"); //closets looks for the closest parent element that matches the class like-box

    if (currentLikeBox.data("exists") == "yes") {
      this.deleteLike(currentLikeBox);
    } else {
      this.createLike(currentLikeBox);
    }
  }

  createLike(currentLikeBox) {
    $.ajax({
      url: universityData.root_url + "/wp-json/university/v1/manageLike",
      type: "POST",
      data: {'professorId': currentLikeBox.data('professor')},
      success: (response) => {
        console.log(response);
      },
      error: (response) => {
        console.log(response);
      },
    });
  }

  deleteLike() {
    $.ajax({
      url: universityData.root_url + "/wp-json/university/v1/manageLike",
      type: "DELETE",
      success: (response) => {
        console.log(response);
      },
      error: (response) => {
        console.log(response);
      },
    });
  }
}

export default Like;