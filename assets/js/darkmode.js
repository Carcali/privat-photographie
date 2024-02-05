const checkbox = document.querySelector("#checkbox");
const mainBody = document.querySelector("body");
checkbox.addEventListener("click", () => mainBody.classList.toggle("darkBg"));
