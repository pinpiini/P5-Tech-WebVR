document.addEventListener("DOMContentLoaded", function () {
    const enableButton = document.getElementById("enable-button");
    const disableButton = document.getElementById("disable-button");

    enableButton.addEventListener("click", function () {
      enableButton.setAttribute("material", "color", "blue");
      disableButton.setAttribute("material", "color", "red");
    });

    disableButton.addEventListener("click", function () {
      disableButton.setAttribute("material", "color", "blue");
      enableButton.setAttribute("material", "color", "red");
    });
  });