function togglePassword(inputId, button) {
  let input = document.getElementById(inputId);

  if (input.type === "password") {
    input.type = "text";
    button.innerHTML = `<i class="ri-lock-unlock-fill"></i>`; // Ícone para indicar que está visível
  } else {
    input.type = "password";
    button.innerHTML = `<i class="ri-lock-fill"></i>`; // Ícone para indicar que está oculto
  }
}
console.log("form.js loaded");
