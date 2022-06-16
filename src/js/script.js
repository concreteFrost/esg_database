//Display data on success
const showData = () => {
  $.ajax({
    url: "src/php/getUser.php",
    method: "GET",
    success: (e) => {
      e.data.forEach((element) => {
        const data = `<tr><td>${element.name}</td><td>${element.email}</td><td>${element.password}</td></tr>`;
        $("#details").append(data);
      });
    },
    error: (e) => {},
  });
};
//Show modal on load
$(document).ready(() => {
  $("#modalLoginForm").modal({
    show: true,
    backdrop: "static",
    keyboard: false,
  });
  $("#modalRegForm").modal({
    show: false,
    backdrop: "static",
    keyboard: false,
  });
});

//Toggle register/login
$("#register-switch").on("click", () => {
  $("#modalLoginForm").modal("hide");
  $("#modalRegForm").modal("show");
});
$("#login-switch").on("click", () => {
  $("#modalRegForm").modal("hide");
  $("#modalLoginForm").modal("show");
});

//Register
$("#register-btn").on("click", () => {
  $.ajax({
    url: "src/php/addUser.php",
    method: "POST",
    data: {
      name: $("#reg-name").val(),
      password: $("#reg-pass").val(),
      email: $("#reg-email").val(),
    },
    success: function (e) {
      alert("Thank you for your registration!");
      $("#modalRegForm").modal("hide");
      showData();
    },
    error: (e) => {
      $("#reg-error").text(e.responseText);
    },
  });
});

//Login
$("#login-btn").on("click", () => {
  $.ajax({
    url: "src/php/login.php",
    method: "POST",
    data: {
      password: $("#log-pass").val(),
      email: $("#log-email").val(),
    },
    success: function (e) {
      $("#modalLoginForm").modal("hide");
      showData();
    },
    error: (e) => {
        $("#log-error").text(e.responseText);
    },
  });
});
