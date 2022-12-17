function header_dropdownFun() {
  console.log("2");
  document.querySelector("#header-dropdown").classList.toggle("show");
}

const dropdown = document.getElementById("header-userDiv");

window.onclick = function (event) {
  //   console.log(event.target.matches(#header-user));
  if (dropdown.contains(event.target)) {
    header_dropdownFun();
  } else {
    document.querySelector("#header-dropdown").classList.remove("show");
  }
};
